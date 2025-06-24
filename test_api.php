<?php
// Simple test to check if API proxy works
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    echo json_encode([
        'status' => 'success',
        'message' => 'Test API working',
        'received_data' => $input,
        'timestamp' => date('Y-m-d H:i:s')
    ]);
} else {
    echo json_encode(['error' => 'Only POST method allowed']);
}
?>