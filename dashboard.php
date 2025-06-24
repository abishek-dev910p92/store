<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minitzgo Store - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.3s ease-out',
                        'bounce-in': 'bounceIn 0.6s ease-out'
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
        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); opacity: 1; }
        }
        .mobile-safe-area {
            padding-bottom: env(safe-area-inset-bottom, 80px);
        }
        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.9);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <!-- Mobile Header -->
    <header class="md:hidden bg-white shadow-lg border-b sticky top-0 z-50 glass-effect">
        <div class="flex items-center justify-between px-4 py-3">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-store text-white text-sm"></i>
                </div>
                <h1 class="text-lg font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Minitzgo</h1>
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
                <a href="dashboard.php" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white group flex items-center px-4 py-3 text-sm font-medium rounded-xl shadow-lg">
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
                <a href="billing.php" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
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

    <!-- Main Content -->
    <div class="md:pl-64 flex flex-col flex-1">
        <!-- Desktop Header -->
        <header class="hidden md:block bg-white shadow-sm border-b">
            <div class="flex items-center justify-between px-6 py-4">
                <div class="flex-1 max-w-lg">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="Search...">
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="p-2 text-gray-400 hover:text-gray-500 relative">
                        <i class="fas fa-bell text-lg"></i>
                        <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
                    </button>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gradient-to-r from-green-400 to-blue-500 rounded-full flex items-center justify-center">
                            <span class="text-white font-semibold text-sm">SO</span>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Store Owner</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Dashboard Content -->
        <main class="flex-1 overflow-y-auto mobile-safe-area">
            <!-- Welcome Section -->
            <div class="p-4 md:p-6">
                <div class="mb-6 animate-fade-in">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Welcome back, Store Owner! 👋</h1>
                    <p class="text-gray-600">Here's what's happening with your store today.</p>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-4 text-white shadow-lg animate-bounce-in">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-blue-100 text-sm font-medium">Total Sales</p>
                                <p class="text-2xl font-bold">$89,650</p>
                                <p class="text-blue-200 text-xs mt-1">+12% from last month</p>
                            </div>
                            <div class="bg-white bg-opacity-20 rounded-xl p-3">
                                <i class="fas fa-dollar-sign text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-2xl p-4 text-white shadow-lg animate-bounce-in" style="animation-delay: 0.1s">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-green-100 text-sm font-medium">Products</p>
                                <p class="text-2xl font-bold">156</p>
                                <p class="text-green-200 text-xs mt-1">+5 new this week</p>
                            </div>
                            <div class="bg-white bg-opacity-20 rounded-xl p-3">
                                <i class="fas fa-box text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl p-4 text-white shadow-lg animate-bounce-in" style="animation-delay: 0.2s">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-purple-100 text-sm font-medium">Orders</p>
                                <p class="text-2xl font-bold">1,247</p>
                                <p class="text-purple-200 text-xs mt-1">+8% this week</p>
                            </div>
                            <div class="bg-white bg-opacity-20 rounded-xl p-3">
                                <i class="fas fa-shopping-cart text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-r from-orange-500 to-red-500 rounded-2xl p-4 text-white shadow-lg animate-bounce-in" style="animation-delay: 0.3s">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-orange-100 text-sm font-medium">Today</p>
                                <p class="text-2xl font-bold">23</p>
                                <p class="text-orange-200 text-xs mt-1">New orders today</p>
                            </div>
                            <div class="bg-white bg-opacity-20 rounded-xl p-3">
                                <i class="fas fa-calendar-day text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <!-- Sales Chart -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 animate-slide-up" style="height: 350px;">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Daily Sales Trend</h3>
                            <div class="flex space-x-2">
                                <span class="w-3 h-3 bg-blue-500 rounded-full"></span>
                                <span class="text-sm text-gray-600">Sales</span>
                            </div>
                        </div>
                        <div class="h-full flex-1 flex items-center">
                            <canvas id="salesChart" style="width:100% !important; height:250px !important; max-height:250px;"></canvas>
                        </div>
                    </div>
                    
                    <!-- Order Status Chart -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 animate-slide-up" style="animation-delay: 0.1s; height: 350px;">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Order Status</h3>
                            <div class="flex space-x-4 text-sm">
                                <div class="flex items-center space-x-1">
                                    <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                                    <span class="text-gray-600">Delivered</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <span class="w-3 h-3 bg-yellow-500 rounded-full"></span>
                                    <span class="text-gray-600">Pending</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                                    <span class="text-gray-600">Cancelled</span>
                                </div>
                            </div>
                        </div>
                        <div class="h-full flex-1 flex items-center">
                            <canvas id="orderChart" style="width:100% !important; height:250px !important; max-height:250px;"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-2xl shadow-lg p-6 animate-slide-up" style="animation-delay: 0.2s">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Activity</h3>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4 p-3 bg-gray-50 rounded-xl">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-shopping-cart text-green-600"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">New order #1234 received</p>
                                <p class="text-xs text-gray-500">2 minutes ago</p>
                            </div>
                            <span class="text-sm font-semibold text-green-600">$89.99</span>
                        </div>
                        
                        <div class="flex items-center space-x-4 p-3 bg-gray-50 rounded-xl">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-box text-blue-600"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">Product "Wireless Headphones" updated</p>
                                <p class="text-xs text-gray-500">15 minutes ago</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-4 p-3 bg-gray-50 rounded-xl">
                            <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-purple-600"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">New customer registered</p>
                                <p class="text-xs text-gray-500">1 hour ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Mobile Bottom Navigation -->
    <nav class="md:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 shadow-lg z-50 glass-effect">
        <div class="grid grid-cols-5 py-2">
            <a href="dashboard.php" class="flex flex-col items-center py-2 px-1 text-blue-600">
                <i class="fas fa-tachometer-alt text-lg mb-1"></i>
                <span class="text-xs font-medium">Dashboard</span>
            </a>
            <a href="orders.php" class="flex flex-col items-center py-2 px-1 text-gray-600">
                <i class="fas fa-shopping-cart text-lg mb-1"></i>
                <span class="text-xs">Orders</span>
            </a>
            <a href="products.php" class="flex flex-col items-center py-2 px-1 text-gray-600">
                <i class="fas fa-box text-lg mb-1"></i>
                <span class="text-xs">Products</span>
            </a>
            <a href="notifications.php" class="flex flex-col items-center py-2 px-1 text-gray-600 relative">
                <i class="fas fa-bell text-lg mb-1"></i>
                <span class="text-xs">Alerts</span>
                <span class="absolute -top-1 right-2 w-4 h-4 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
            </a>
            <a href="profile.php" class="flex flex-col items-center py-2 px-1 text-gray-600">
                <i class="fas fa-user text-lg mb-1"></i>
                <span class="text-xs">Profile</span>
            </a>
        </div>
    </nav>

    <script>
        // Demo data for charts
        const salesData = {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Daily Sales',
                data: [1200, 1900, 3000, 5000, 2000, 3000, 4500],
                borderColor: 'rgb(59, 130, 246)',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                tension: 0.4,
                fill: true
            }]
        };

        const orderData = {
            labels: ['Delivered', 'Pending', 'Cancelled'],
            datasets: [{
                data: [850, 320, 77],
                backgroundColor: [
                    'rgb(34, 197, 94)',
                    'rgb(234, 179, 8)',
                    'rgb(239, 68, 68)'
                ],
                borderWidth: 0
            }]
        };

        // Initialize charts
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        new Chart(salesCtx, {
            type: 'line',
            data: salesData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        const orderCtx = document.getElementById('orderChart').getContext('2d');
        new Chart(orderCtx, {
            type: 'doughnut',
            data: orderData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                cutout: '60%'
            }
        });

        // Add touch feedback for mobile
        document.addEventListener('touchstart', function(e) {
            if (e.target.closest('a, button')) {
                e.target.closest('a, button').style.transform = 'scale(0.95)';
            }
        });

        document.addEventListener('touchend', function(e) {
            if (e.target.closest('a, button')) {
                setTimeout(() => {
                    e.target.closest('a, button').style.transform = 'scale(1)';
                }, 100);
            }
        });
    </script>
</body>
</html>