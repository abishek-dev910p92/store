<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Read incoming JSON
$input = json_decode(file_get_contents('php://input'), true);

// Validate input
if (!$input || !isset($input['endpoint'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
    exit;
}

$endpoint = $input['endpoint'];
$cid = $input['cid'] ?? ($_SESSION['cid'] ?? null);

if (!$cid) {
    http_response_code(400);
    echo json_encode(['error' => 'CID is missing']);
    exit;
}

$apiConfigs = [
    'total_sales' => [
        'url' => 'https://www.minitzgo.com/api/total_sale.php',
        'api_key' => '7620f8aea22da44c728c8bd48a87707d4da3d6eef5b271d1d99231b1ef5c4c04'
    ],
    'total_products' => [
        'url' => 'https://www.minitzgo.com/api/total_products.php',
        'api_key' => 'a0c75839fca1668ac6cf45e464a22f4a16f4d2dcbc1e2a5aea4948df42e688ea'
    ],
    'total_orders' => [
        'url' => 'https://www.minitzgo.com/api/total_orders.php',
        'api_key' => '507ba0c2db06231a1a2ce2524f3e12b57d3bc6c0e9d47c5752f5fb9b8f87a3e8'
    ],
    'todays_orders' => [
        'url' => 'https://www.minitzgo.com/api/todays_orders.php',
        'api_key' => '0205ea9956f56240b724f596b0347048cbc5a64621283ddc13621e7d26a027c0'
    ]
];

if (!isset($apiConfigs[$endpoint])) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid endpoint']);
    exit;
}

$config = $apiConfigs[$endpoint];

// Prepare outbound request
$outgoingBody = json_encode(['cid' => $cid]);

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $config['url'],
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $outgoingBody,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'X-API-Key: ' . $config['api_key']
    ],
    CURLOPT_TIMEOUT => 15,
    CURLOPT_SSL_VERIFYPEER => false
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

if ($error) {
    http_response_code(500);
    echo json_encode(['error' => 'cURL error: ' . $error]);
    exit;
}

if ($httpCode !== 200) {
    http_response_code($httpCode);
    echo json_encode(['error' => 'API error, HTTP ' . $httpCode]);
    exit;
}

// Forward API response
echo $response;
?>