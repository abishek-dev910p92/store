<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['cid']) || empty($_SESSION['cid'])) {
    header('Location: login.php');
    exit();
}

// Include authentication check
require_once 'includes/auth.php';
// Connect to database using config/db.php ($conn is the DB connection)
require_once 'config/db.php';

// Fetch billing data
$invoices = [];
$totalRevenue = 0;
$monthlyRevenue = 0;
$pendingAmount = 0;
$paidAmount = 0;

if ($conn) {
    $cid = $_SESSION['cid'];
    $search = $_GET['search'] ?? '';
    $status = $_GET['status'] ?? '';
    $month = $_GET['month'] ?? '';
    
    // Get invoices
    $query = "SELECT o.*, c.name as customer_name, c.email as customer_email 
              FROM orders o 
              LEFT JOIN customers c ON o.customer_id = c.id 
              WHERE o.cid = ?";
    $params = [$cid];
    $types = "s";
    
    if (!empty($search)) {
        $query .= " AND (o.order_id LIKE ? OR c.name LIKE ? OR c.email LIKE ?)";
        $searchTerm = "%$search%";
        $params = array_merge($params, [$searchTerm, $searchTerm, $searchTerm]);
        $types .= "sss";
    }
    
    if (!empty($status)) {
        $query .= " AND o.status = ?";
        $params[] = $status;
        $types .= "s";
    }
    
    if (!empty($month)) {
        $query .= " AND DATE_FORMAT(o.created_at, '%Y-%m') = ?";
        $params[] = $month;
        $types .= "s";
    }
    
    $query .= " ORDER BY o.created_at DESC LIMIT 50";
    
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $invoices[] = $row;
        }
        $stmt->close();
    }
    
    // Calculate totals
    $stmt = $conn->prepare("SELECT SUM(total_amount) as total FROM orders WHERE cid = ?");
    if ($stmt) {
        $stmt->bind_param("s", $cid);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $totalRevenue = $row['total'] ?? 0;
        $stmt->close();
    }
    
    // Monthly revenue
    $currentMonth = date('Y-m');
    $stmt = $conn->prepare("SELECT SUM(total_amount) as total FROM orders WHERE cid = ? AND DATE_FORMAT(created_at, '%Y-%m') = ?");
    if ($stmt) {
        $stmt->bind_param("ss", $cid, $currentMonth);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $monthlyRevenue = $row['total'] ?? 0;
        $stmt->close();
    }
    
    // Pending and paid amounts
    $stmt = $conn->prepare("SELECT SUM(total_amount) as total FROM orders WHERE cid = ? AND status = 'Pending'");
    if ($stmt) {
        $stmt->bind_param("s", $cid);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $pendingAmount = $row['total'] ?? 0;
        $stmt->close();
    }
    
    $stmt = $conn->prepare("SELECT SUM(total_amount) as total FROM orders WHERE cid = ? AND status = 'Delivered'");
    if ($stmt) {
        $stmt->bind_param("s", $cid);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $paidAmount = $row['total'] ?? 0;
        $stmt->close();
    }
}

// Demo data fallback
if (empty($invoices)) {
    $invoices = [
        ['id' => 1, 'order_id' => 'INV-2024-001', 'customer_name' => 'John Smith', 'customer_email' => 'john@example.com', 'total_amount' => 299.99, 'status' => 'Delivered', 'created_at' => '2024-01-20', 'payment_method' => 'Credit Card'],
        ['id' => 2, 'order_id' => 'INV-2024-002', 'customer_name' => 'Sarah Johnson', 'customer_email' => 'sarah@example.com', 'total_amount' => 149.50, 'status' => 'Pending', 'created_at' => '2024-01-19', 'payment_method' => 'PayPal'],
        ['id' => 3, 'order_id' => 'INV-2024-003', 'customer_name' => 'Mike Wilson', 'customer_email' => 'mike@example.com', 'total_amount' => 89.99, 'status' => 'Delivered', 'created_at' => '2024-01-18', 'payment_method' => 'Bank Transfer'],
        ['id' => 4, 'order_id' => 'INV-2024-004', 'customer_name' => 'Lisa Brown', 'customer_email' => 'lisa@example.com', 'total_amount' => 199.99, 'status' => 'Cancelled', 'created_at' => '2024-01-17', 'payment_method' => 'Credit Card'],
        ['id' => 5, 'order_id' => 'INV-2024-005', 'customer_name' => 'David Lee', 'customer_email' => 'david@example.com', 'total_amount' => 349.99, 'status' => 'Delivered', 'created_at' => '2024-01-16', 'payment_method' => 'Credit Card']
    ];
    $totalRevenue = 1089.46;
    $monthlyRevenue = 1089.46;
    $pendingAmount = 149.50;
    $paidAmount = 739.97;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minitzgo Store - Billing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.3s ease-out',
                        'pulse-slow': 'pulse 3s infinite',
                        'bounce-slow': 'bounce 2s infinite'
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <!-- Mobile Header -->
    <header class="md:hidden bg-white shadow-lg border-b sticky top-0 z-50 glass-effect">
        <div class="flex items-center justify-between px-4 py-3">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-credit-card text-white text-sm"></i>
                </div>
                <h1 class="text-lg font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Billing</h1>
            </div>
            <div class="flex items-center space-x-3">
                <button class="p-2 text-gray-600 hover:bg-gray-100 rounded-full relative">
                    <i class="fas fa-bell text-lg"></i>
                    <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
                </button>
                <div class="w-8 h-8 bg-gradient-to-r from-green-400 to-blue-500 rounded-full flex items-center justify-center">
                    <span class="text-white font-semibold text-sm">SO</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Desktop Sidebar -->
    <div class="hidden md:flex md:fixed md:inset-y-0 md:left-0 md:w-64 md:z-50">
        <div class="flex flex-col flex-grow pt-5 overflow-y-auto bg-white shadow-xl">
            <div class="flex items-center flex-shrink-0 px-6 pb-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-store text-white"></i>
                    </div>
                    <h1 class="text-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Minitzgo Store</h1>
                </div>
            </div>
            <nav class="flex-1 px-4 space-y-2">
                <a href="dashboard.php" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="orders.php" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                    <i class="fas fa-shopping-cart mr-3"></i>
                    Orders
                </a>
                <a href="products.php" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                    <i class="fas fa-box mr-3"></i>
                    Products
                </a>
                <a href="users.php" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                    <i class="fas fa-users mr-3"></i>
                    Users
                </a>
                <a href="billing.php" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white group flex items-center px-4 py-3 text-sm font-medium rounded-xl shadow-lg">
                    <i class="fas fa-credit-card mr-3"></i>
                    Billing
                </a>
                <a href="notifications.php" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                    <i class="fas fa-bell mr-3"></i>
                    Notifications
                </a>
                <a href="profile.php" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                    <i class="fas fa-user mr-3"></i>
                    Profile
                </a>
            </nav>
            <div class="flex-shrink-0 border-t border-gray-200 p-4">
                <a href="logout.php" class="text-red-600 hover:bg-red-50 hover:text-red-700 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Logout
                </a>
            </div>
        </div>
    </div>

        <!-- Main content -->
        <div class="md:ml-64 flex-1 p-4 md:p-6 pt-20 md:pt-6 pb-24 md:pb-6 mobile-safe-area">
            <div class="max-w-7xl mx-auto">
                <!-- Page Header -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 animate-fade-in">
                    <h1 class="text-2xl font-semibold text-gray-900 mb-4 md:mb-0">
                        <i class="fas fa-credit-card mr-3 text-green-500 animate-bounce-slow"></i>
                        Billing & Invoices
                    </h1>
                    <div class="flex space-x-3">
                        <button onclick="generateReport()" class="bg-white px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none transition-all duration-200">
                            <i class="fas fa-file-export mr-2"></i> Export Report
                        </button>
                        <button onclick="createInvoice()" class="bg-gradient-to-r from-blue-600 to-indigo-600 px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white hover:from-blue-700 hover:to-indigo-700 focus:outline-none transition-all duration-200">
                            <i class="fas fa-plus mr-2"></i> New Invoice
                        </button>
                    </div>
                </div>

                <!-- Revenue Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                    <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white animate-bounce-in">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <i class="fas fa-dollar-sign text-2xl opacity-80"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium opacity-80">Total Revenue</p>
                                <p class="text-2xl font-bold">$<?= number_format($totalRevenue, 2) ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white animate-bounce-in" style="animation-delay: 0.1s">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <i class="fas fa-calendar-month text-2xl opacity-80"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium opacity-80">This Month</p>
                                <p class="text-2xl font-bold">$<?= number_format($monthlyRevenue, 2) ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-500 rounded-xl shadow-lg p-6 text-white animate-bounce-in" style="animation-delay: 0.2s">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <i class="fas fa-clock text-2xl opacity-80"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium opacity-80">Pending</p>
                                <p class="text-2xl font-bold">$<?= number_format($pendingAmount, 2) ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white animate-bounce-in" style="animation-delay: 0.3s">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <i class="fas fa-check-circle text-2xl opacity-80"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium opacity-80">Paid</p>
                                <p class="text-2xl font-bold">$<?= number_format($paidAmount, 2) ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Revenue Chart -->
                <div class="bg-white rounded-xl shadow-md p-4 border border-gray-100 mb-6 animate-slide-up">
                    <h2 class="text-lg font-medium text-gray-900 mb-4">
                        <i class="fas fa-chart-line mr-2 text-blue-500"></i>
                        Revenue Trend
                    </h2>
                    <div class="h-64">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>

                <!-- Filters -->
                <div class="bg-white rounded-xl shadow-md p-4 border border-gray-100 mb-6 animate-slide-up" style="animation-delay: 0.1s">
                    <form method="GET" class="flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-4">
                        <div class="flex-1">
                            <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                                <input type="text" name="search" id="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" 
                                       class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-lg" 
                                       placeholder="Search invoices...">
                            </div>
                        </div>
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select id="status" name="status" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-lg">
                                <option value="">All Statuses</option>
                                <option value="Pending" <?= ($_GET['status'] ?? '') === 'Pending' ? 'selected' : '' ?>>Pending</option>
                                <option value="Delivered" <?= ($_GET['status'] ?? '') === 'Delivered' ? 'selected' : '' ?>>Paid</option>
                                <option value="Cancelled" <?= ($_GET['status'] ?? '') === 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
                            </select>
                        </div>
                        <div>
                            <label for="month" class="block text-sm font-medium text-gray-700 mb-1">Month</label>
                            <input type="month" id="month" name="month" value="<?= htmlspecialchars($_GET['month'] ?? '') ?>" 
                                   class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-lg">
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="bg-indigo-600 px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none transition-all duration-200">
                                <i class="fas fa-filter mr-2"></i>
                                Filter
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Invoices Table -->
                <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden animate-slide-up" style="animation-delay: 0.2s">
                    <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            <i class="fas fa-file-invoice mr-2 text-indigo-500"></i>
                            Recent Invoices
                        </h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Invoice</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php foreach ($invoices as $invoice): ?>
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900"><?= htmlspecialchars($invoice['order_id']) ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"><?= htmlspecialchars($invoice['customer_name']) ?></div>
                                        <div class="text-sm text-gray-500"><?= htmlspecialchars($invoice['customer_email']) ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">$<?= number_format($invoice['total_amount'], 2) ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php 
                                        $statusColors = [
                                            'Pending' => 'bg-yellow-100 text-yellow-800',
                                            'Delivered' => 'bg-green-100 text-green-800',
                                            'Cancelled' => 'bg-red-100 text-red-800'
                                        ];
                                        $statusColor = $statusColors[$invoice['status']] ?? 'bg-gray-100 text-gray-800';
                                        ?>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= $statusColor ?>">
                                            <?= $invoice['status'] ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"><?= date('M d, Y', strtotime($invoice['created_at'])) ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"><?= $invoice['payment_method'] ?? 'N/A' ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" onclick="viewInvoice(<?= $invoice['id'] ?>)" class="text-indigo-600 hover:text-indigo-900 mr-3">View</a>
                                        <a href="#" onclick="downloadInvoice(<?= $invoice['id'] ?>)" class="text-gray-600 hover:text-gray-900">Download</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                        <div class="flex justify-between items-center">
                            <div class="text-sm text-gray-700">
                                Showing <span class="font-medium">1</span> to <span class="font-medium"><?= count($invoices) ?></span> of <span class="font-medium"><?= count($invoices) ?></span> results
                            </div>
                            <div class="flex space-x-2">
                                <button type="button" class="bg-white px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                    Previous
                                </button>
                                <button type="button" class="bg-white px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Mobile Footer Navigation -->
        <div class="md:hidden fixed bottom-0 left-0 right-0 z-50 bg-white border-t border-gray-200 glass-effect">
            <div class="flex justify-around items-center p-2" style="padding-bottom: calc(0.5rem + env(safe-area-inset-bottom, 0px));">
                <a href="dashboard.php" class="flex flex-col items-center p-2 text-gray-600">
                    <i class="fas fa-tachometer-alt text-lg"></i>
                    <span class="text-xs mt-1">Dashboard</span>
                </a>
                <a href="orders.php" class="flex flex-col items-center p-2 text-gray-600">
                    <i class="fas fa-shopping-cart text-lg"></i>
                    <span class="text-xs mt-1">Orders</span>
                </a>
                <a href="products.php" class="flex flex-col items-center p-2 text-gray-600">
                    <i class="fas fa-box text-lg"></i>
                    <span class="text-xs mt-1">Products</span>
                </a>
                <a href="billing.php" class="flex flex-col items-center p-2 text-blue-600">
                    <div class="relative">
                        <i class="fas fa-credit-card text-lg"></i>
                        <span class="absolute -top-1 -right-1 w-2 h-2 bg-blue-600 rounded-full"></span>
                    </div>
                    <span class="text-xs mt-1">Billing</span>
                </a>
                <a href="profile.php" class="flex flex-col items-center p-2 text-gray-600">
                    <i class="fas fa-user text-lg"></i>
                    <span class="text-xs mt-1">Profile</span>
                </a>
            </div>
        </div>
    </div>

    <script>
        // Demo data for Revenue Chart
        const chartLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        const chartData = [4500, 3800, 5200, 4800, 7500, 8200, 9100, 8700, 9500, 10200, 11500, 12800];
        
        // Revenue Chart
        const ctx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartLabels,
                datasets: [{
                    label: 'Revenue',
                    data: chartData,
                    backgroundColor: 'rgba(79, 70, 229, 0.2)',
                    borderColor: 'rgba(79, 70, 229, 1)',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Demo data for invoices
        const invoices = [
            {
                id: 1,
                order_id: '#INV-2023-001',
                customer_name: 'John Smith',
                customer_email: 'john@example.com',
                total_amount: 1200.00,
                status: 'Paid',
                created_at: '2023-05-12',
                payment_method: 'Credit Card'
            },
            {
                id: 2,
                order_id: '#INV-2023-002',
                customer_name: 'Sarah Johnson',
                customer_email: 'sarah@example.com',
                total_amount: 850.00,
                status: 'Paid',
                created_at: '2023-05-14',
                payment_method: 'PayPal'
            },
            {
                id: 3,
                order_id: '#INV-2023-003',
                customer_name: 'Michael Brown',
                customer_email: 'michael@example.com',
                total_amount: 2400.00,
                status: 'Pending',
                created_at: '2023-05-15',
                payment_method: 'Bank Transfer'
            },
            {
                id: 4,
                order_id: '#INV-2023-004',
                customer_name: 'Emily Davis',
                customer_email: 'emily@example.com',
                total_amount: 1750.00,
                status: 'Overdue',
                created_at: '2023-05-18',
                payment_method: 'Credit Card'
            },
            {
                id: 5,
                order_id: '#INV-2023-005',
                customer_name: 'David Wilson',
                customer_email: 'david@example.com',
                total_amount: 3200.00,
                status: 'Paid',
                created_at: '2023-05-20',
                payment_method: 'PayPal'
            }
        ];

        // Populate the table with demo data
        document.addEventListener('DOMContentLoaded', function() {
            const tableBody = document.querySelector('tbody');
            tableBody.innerHTML = '';
            
            invoices.forEach(invoice => {
                const statusColors = {
                    'Pending': 'bg-yellow-100 text-yellow-800',
                    'Paid': 'bg-green-100 text-green-800',
                    'Overdue': 'bg-red-100 text-red-800',
                    'Cancelled': 'bg-red-100 text-red-800'
                };
                
                const statusColor = statusColors[invoice.status] || 'bg-gray-100 text-gray-800';
                const date = new Date(invoice.created_at);
                const formattedDate = date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
                
                const row = document.createElement('tr');
                row.className = 'hover:bg-gray-50 transition-colors duration-200';
                row.innerHTML = `
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">${invoice.order_id}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">${invoice.customer_name}</div>
                        <div class="text-sm text-gray-500">${invoice.customer_email}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">$${invoice.total_amount.toFixed(2)}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusColor}">
                            ${invoice.status}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">${formattedDate}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">${invoice.payment_method || 'N/A'}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" onclick="viewInvoice(${invoice.id})" class="text-indigo-600 hover:text-indigo-900 mr-3">View</a>
                        <a href="#" onclick="downloadInvoice(${invoice.id})" class="text-gray-600 hover:text-gray-900">Download</a>
                    </td>
                `;
                
                tableBody.appendChild(row);
            });
        });

        // Functions
        function viewInvoice(id) {
            alert('View invoice: ' + id);
            // Implement view functionality
        }

        function downloadInvoice(id) {
            alert('Download invoice: ' + id);
            // Implement download functionality
        }

        function generateReport() {
            alert('Generating report...');
            // Implement report generation
        }

        function createInvoice() {
            alert('Creating new invoice...');
            // Implement invoice creation
        }
        
        // Mobile app-like animations
        document.addEventListener('DOMContentLoaded', function() {
            // Add touch feedback to buttons and links
            const interactiveElements = document.querySelectorAll('button, a, .hover\\:bg-gray-50');
            interactiveElements.forEach(el => {
                el.addEventListener('touchstart', function() {
                    this.classList.add('active-touch');
                });
                el.addEventListener('touchend', function() {
                    this.classList.remove('active-touch');
                });
            });
            
            // Add pull-to-refresh animation (visual only)
            let startY;
            document.addEventListener('touchstart', function(e) {
                startY = e.touches[0].clientY;
            });
            
            document.addEventListener('touchmove', function(e) {
                const y = e.touches[0].clientY;
                const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
                
                if (scrollTop === 0 && y > startY) {
                    document.body.classList.add('pull-refresh');
                    e.preventDefault();
                }
            });
            
            document.addEventListener('touchend', function() {
                if (document.body.classList.contains('pull-refresh')) {
                    document.body.classList.remove('pull-refresh');
                }
            });
        });
    </script>
    
    <style>
        /* Mobile app-like styles */
        .active-touch {
            transform: scale(0.97);
            opacity: 0.8;
            transition: transform 0.1s, opacity 0.1s;
        }
        
        .pull-refresh {
            transition: transform 0.2s;
        }
        
        /* Hide scrollbar for Chrome, Safari and Opera */
        ::-webkit-scrollbar {
            display: none;
        }
        
        /* Hide scrollbar for IE, Edge and Firefox */
        body {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
            overscroll-behavior-y: contain;
        }
        
        /* Smooth transitions between pages */
        a {
            transition: all 0.2s;
        }
    </style>
</body>
</html>