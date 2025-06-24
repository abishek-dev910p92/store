<?php
session_start();

// Set content type to JSON
header('Content-Type: application/json');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

try {
    // Get JSON input
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    
    // Validate required fields
    if (!isset($data['cid']) || !isset($data['name']) || !isset($data['email'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Missing required fields: cid, name, email']);
        exit;
    }
    
    // Save session variables as specified
    $_SESSION['cid'] = $data['cid'];
    $_SESSION['name'] = $data['name']; // Already formatted as 'first_name last_name' from login.php
    $_SESSION['email'] = $data['email'];
    $_SESSION['role'] = 'admin'; // for now
    
    // Return success response
    http_response_code(200);
    echo json_encode(['success' => true, 'message' => 'Session saved successfully']);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Internal server error']);
}
?>