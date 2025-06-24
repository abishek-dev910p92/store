<?php
// Simple router for PHP built-in server
$request_uri = $_SERVER['REQUEST_URI'];
$path = parse_url($request_uri, PHP_URL_PATH);
$path = ltrim($path, '/');

// Debug logging
error_log("Router: {$_SERVER['REQUEST_METHOD']} {$path}");

// Handle API proxy requests directly
if ($path === 'api_proxy.php') {
    error_log("Routing to api_proxy.php");
    // Set proper headers to prevent redirects
    header('Cache-Control: no-cache, must-revalidate');
    header('Pragma: no-cache');
    include __DIR__ . '/api_proxy.php';
    exit;
}

// Handle other specific files
if (file_exists($path) && !is_dir($path)) {
    return false; // Let PHP serve the file directly
}

// Default routing
switch ($path) {
    case '':
    case 'index.php':
        include 'login.php';
        break;
    case 'dashboard.php':
        include 'dashboard.php';
        break;
    case 'login.php':
        include 'login.php';
        break;
    case 'logout.php':
        include 'logout.php';
        break;
    case 'test_api.php':
        include 'test_api.php';
        break;
    default:
        http_response_code(404);
        echo '404 Not Found';
        break;
}
?>