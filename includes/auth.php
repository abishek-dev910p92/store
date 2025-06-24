<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['cid']) || empty($_SESSION['cid'])) {
    // User is not logged in, redirect to login page
    header('Location: login.php');
    exit;
}

// Optional: Check if session is still valid (you can add timestamp validation here)
// For now, we'll just ensure the basic session variables exist
if (!isset($_SESSION['name']) || !isset($_SESSION['email']) || !isset($_SESSION['role'])) {
    // Session data is incomplete, destroy session and redirect to login
    session_destroy();
    header('Location: login.php');
    exit;
}

// User is authenticated, continue with the page
?>