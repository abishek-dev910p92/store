<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minitzgo Store - Orders</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                <h1 class="text-lg font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Orders</h1>
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
                <a href="orders.php" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white group flex items-center px-4 py-3 text-sm font-medium rounded-xl shadow-lg">
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
                        <input type="text" id="desktop-search" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="Search orders...">
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

        <!-- Main Orders Content -->
        <main class="flex-1 overflow-y-auto mobile-safe-area">
            <div class="p-4 md:p-6">
                <!-- Page Header -->
                <div class="mb-6 animate-fade-in">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Orders Management 📦</h1>
                    <p class="text-gray-600">Track and manage all your store orders</p>
                </div>

                <!-- Mobile Search & Filters -->
                <div class="md:hidden mb-4 space-y-3">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" id="mobile-search" class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Search orders...">
                    </div>
                    <div class="flex space-x-2 overflow-x-auto pb-2">
                        <button class="filter-btn active flex-shrink-0 px-4 py-2 bg-blue-500 text-white rounded-full text-sm font-medium" data-status="all">
                            All Orders
                        </button>
                        <button class="filter-btn flex-shrink-0 px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium" data-status="pending">
                            Pending
                        </button>
                        <button class="filter-btn flex-shrink-0 px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium" data-status="delivered">
                            Delivered
                        </button>
                        <button class="filter-btn flex-shrink-0 px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium" data-status="cancelled">
                            Cancelled
                        </button>
                    </div>
                </div>

                <!-- Desktop Filters -->
                <div class="hidden md:flex md:items-center md:justify-between md:mb-6">
                    <div class="flex space-x-4">
                        <select class="px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">All Status</option>
                            <option value="pending">Pending</option>
                            <option value="delivered">Delivered</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                        <input type="date" class="px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <button class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-2 rounded-xl hover:shadow-lg transition-all duration-200">
                        <i class="fas fa-download mr-2"></i>
                        Export
                    </button>
                </div>

                <!-- Orders Stats Cards (Mobile) -->
                <div class="md:hidden grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-4 text-white shadow-lg">
                        <div class="text-center">
                            <p class="text-blue-100 text-sm font-medium">Total Orders</p>
                            <p class="text-2xl font-bold">1,247</p>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-2xl p-4 text-white shadow-lg">
                        <div class="text-center">
                            <p class="text-green-100 text-sm font-medium">Today's Orders</p>
                            <p class="text-2xl font-bold">23</p>
                        </div>
                    </div>
                </div>

                <!-- Orders List -->
                <div class="space-y-4 md:space-y-0">
                    <!-- Mobile Order Cards -->
                    <div class="md:hidden space-y-4" id="mobile-orders">
                        <!-- Order Card 1 -->
                        <div class="bg-white rounded-2xl shadow-lg p-4 animate-slide-up">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-shopping-cart text-blue-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">#ORD-001</p>
                                        <p class="text-sm text-gray-500">John Doe</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">Delivered</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-lg font-bold text-gray-900">$299.99</p>
                                    <p class="text-xs text-gray-500">Jan 15, 2024</p>
                                </div>
                                <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-full">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Order Card 2 -->
                        <div class="bg-white rounded-2xl shadow-lg p-4 animate-slide-up" style="animation-delay: 0.1s">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-clock text-yellow-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">#ORD-002</p>
                                        <p class="text-sm text-gray-500">Jane Smith</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">Pending</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-lg font-bold text-gray-900">$149.50</p>
                                    <p class="text-xs text-gray-500">Jan 15, 2024</p>
                                </div>
                                <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-full">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Order Card 3 -->
                        <div class="bg-white rounded-2xl shadow-lg p-4 animate-slide-up" style="animation-delay: 0.2s">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-times text-red-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">#ORD-003</p>
                                        <p class="text-sm text-gray-500">Mike Johnson</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-red-100 text-red-800 text-xs font-medium rounded-full">Cancelled</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-lg font-bold text-gray-900">$89.99</p>
                                    <p class="text-xs text-gray-500">Jan 14, 2024</p>
                                </div>
                                <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-full">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Desktop Table -->
                    <div class="hidden md:block bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-001</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">John Doe</div>
                                                <div class="text-sm text-gray-500">john@example.com</div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold">$299.99</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Delivered</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jan 15, 2024</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                                            <button class="text-green-600 hover:text-green-900">Edit</button>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-002</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">Jane Smith</div>
                                                <div class="text-sm text-gray-500">jane@example.com</div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold">$149.50</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jan 15, 2024</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                                            <button class="text-green-600 hover:text-green-900">Edit</button>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-003</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">Mike Johnson</div>
                                                <div class="text-sm text-gray-500">mike@example.com</div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold">$89.99</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Cancelled</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jan 14, 2024</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                                            <button class="text-green-600 hover:text-green-900">Edit</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Mobile Bottom Navigation -->
    <nav class="md:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 shadow-lg z-50 glass-effect">
        <div class="grid grid-cols-5 py-2">
            <a href="dashboard.php" class="flex flex-col items-center py-2 px-1 text-gray-600">
                <i class="fas fa-tachometer-alt text-lg mb-1"></i>
                <span class="text-xs">Dashboard</span>
            </a>
            <a href="orders.php" class="flex flex-col items-center py-2 px-1 text-blue-600">
                <i class="fas fa-shopping-cart text-lg mb-1"></i>
                <span class="text-xs font-medium">Orders</span>
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
        // Filter functionality
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('.filter-btn').forEach(b => {
                    b.classList.remove('active', 'bg-blue-500', 'text-white');
                    b.classList.add('bg-gray-200', 'text-gray-700');
                });
                
                // Add active class to clicked button
                this.classList.add('active', 'bg-blue-500', 'text-white');
                this.classList.remove('bg-gray-200', 'text-gray-700');
                
                // Filter logic would go here
                const status = this.dataset.status;
                console.log('Filtering by status:', status);
            });
        });

        // Search functionality
        function handleSearch(searchTerm) {
            console.log('Searching for:', searchTerm);
            // Search logic would go here
        }

        document.getElementById('mobile-search')?.addEventListener('input', function(e) {
            handleSearch(e.target.value);
        });

        document.getElementById('desktop-search')?.addEventListener('input', function(e) {
            handleSearch(e.target.value);
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