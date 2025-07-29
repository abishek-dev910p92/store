<?php
session_start();
include "config/db.php";
 

$cid = $_SESSION['cid'];
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ensure $conn is set before running
if (!isset($conn) || !$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//own code goes here

//function to get total orders
function fetchTotalOrders($conn, $cid) {
    // Use a prepared statement to avoid SQL injection
    $stmt = mysqli_prepare($conn, "SELECT COUNT(*) as total_orders FROM orders WHERE cid = ?");
    if (!$stmt) {
        return null; // or log error
    }

    mysqli_stmt_bind_param($stmt, 'i', $cid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        return (int)$row['total_orders'];
    } else {
        return 0; // default to 0 if no orders
    }
}
//$totalOrders = fetchTotalOrders($conn, $cid);
//echo"total products", $totalOrders;
//echo "cid", $cid;

 
//Total sales function
function totalSale($conn, $cid){
        // Use a prepared statement to avoid SQL injection
    $stmt = mysqli_prepare($conn, "SELECT SUM(product_price) as totalsale FROM orders WHERE cid = ? AND product_status = 'finding delivery boy'");
    if (!$stmt) {
        return null; // or log error
    }

    mysqli_stmt_bind_param($stmt, 'i', $cid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        return (int)$row['totalsale'];
    } else {
        return 0; // default to 0 if no orders
    }
}
//echo "total sale", totalSale($conn, $cid);


// Total products function
function fetchProducts($conn, $cid) {
    $stmt = mysqli_prepare($conn, "
        SELECT COUNT(*) as total_products
        FROM product
        WHERE cid = ?");
        
    mysqli_stmt_bind_param($stmt, 'i', $cid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($result && $row = mysqli_fetch_assoc($result)) {
        return (int)$row['total_products'];
    }
    
    return 0;
}

// Usage
//echo fetchProducts($conn, $cid);

//function to show how many products to add for better orders.
function getRandomNumberBelow5($cid) {
    // Create a unique seed using cid and today's date
    $seed = $cid . date('Y-m-d');
    $hash = crc32($seed); // Deterministic hash
    return ($hash % 5) + 1; // Range: 1 to 5
}


// Your existing function updated
function randomNumbers($conn, $cid) {
    $productCount = fetchProducts($conn, $cid);

    if ($productCount < 2) {
        echo "+3 more products";
    } elseif ($productCount > 6) {
        echo "+" . getRandomNumberBelow5($cid) . " New products today.";
    } elseif ($productCount >= 5) {
        echo "+2 more today";
    } else {
        echo "Please add some products";
    }
}

 


//echo randomnumbers($conn, $cid);

// Reusable function to get order count between two dates
function getOrderCountBetweenDates($conn, $cid, $startDate, $endDate) {
    $stmt = mysqli_prepare($conn, "SELECT COUNT(*) AS order_count FROM product WHERE cid = ? AND date BETWEEN ? AND ?");
    
    if (!$stmt) return 0;

    mysqli_stmt_bind_param($stmt, 'iss', $cid, $startDate, $endDate);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        return (int)$row['order_count'];
    }

    return 0;
}

//finction for todays orders.

function todaysOrders($conn, $cid) {
    $today_date = date('Y-m-d'); // Use full year (Y), not short year (y)

    $stmt = mysqli_prepare($conn, "SELECT COUNT(*) AS todays_orders FROM product WHERE cid = ? AND date = ?");
    
    if (!$stmt) {
        return 0; // Or log an error
    }

    mysqli_stmt_bind_param($stmt, 'is', $cid, $today_date); // 'i' for int, 's' for string
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        return (int)$row['todays_orders'];
    }

    return 0;
}

//echo "todays", todaysOrders($conn, $cid);

 

// Function to check this week's orders and display message
function checkThisWeekOrders($conn, $cid) {
    $start = date('Y-m-d', strtotime('monday this week'));
    $end = date('Y-m-d'); // today

    $thisWeekOrders = getOrderCountBetweenDates($conn, $cid, $start, $end);

    if ($thisWeekOrders === 0) {
        echo "Slow start this week. Promote your products to drive more orders!<br>";
    } else {
        echo "🚀 You've received <strong>$thisWeekOrders</strong> orders this week. Keep it up!<br>";
    }
}
//echo checkThisWeekOrders($conn, $cid);



?>
