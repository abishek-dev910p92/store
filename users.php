<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minitzgo Store - Users</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/togglerSwitch.css">
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
                    <i class="fas fa-users text-white text-sm"></i>
                </div>
                <h1 class="text-lg font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Users</h1>
            </div>
            <div class="flex items-center space-x-3">
                <?php include "includes/header_toggle.php"; ?>
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
                <a href="users.php" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white group flex items-center px-4 py-3 text-sm font-medium rounded-xl shadow-lg">
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
                        <input type="text" id="desktop-search" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="Search users...">
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

        <!-- Main Users Content -->
        <main class="flex-1 overflow-y-auto mobile-safe-area">
            <div class="p-4 md:p-6">
                <!-- Page Header -->
                <div class="mb-6 animate-fade-in">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">User Management 👥</h1>
                    <p class="text-gray-600">Manage your team members and staff accounts</p>
                </div>

                <!-- Mobile Search & Filters -->
                <div class="md:hidden mb-4 space-y-3">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" id="mobile-search" class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Search users...">
                    </div>
                    <div class="flex space-x-2 overflow-x-auto pb-2">
                        <button class="filter-btn active flex-shrink-0 px-4 py-2 bg-blue-500 text-white rounded-full text-sm font-medium" data-role="all">
                            All Users
                        </button>
                        <button class="filter-btn flex-shrink-0 px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium" data-role="admin">
                            Admin
                        </button>
                        <button class="filter-btn flex-shrink-0 px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium" data-role="staff">
                            Staff
                        </button>
                        <button class="filter-btn flex-shrink-0 px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium" data-role="manager">
                            Manager
                        </button>
                    </div>
                </div>

                <!-- Desktop Filters -->
                <div class="hidden md:flex md:items-center md:justify-between md:mb-6">
                    <div class="flex space-x-4">
                        <select class="px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">All Roles</option>
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                            <option value="manager">Manager</option>
                        </select>
                        <select class="px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <button id="add-user-btn" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-2 rounded-xl hover:shadow-lg transition-all duration-200">
                        <i class="fas fa-plus mr-2"></i>
                        Add User
                    </button>
                </div>

                <!-- User Stats Cards (Mobile) -->
                <div class="md:hidden grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-4 text-white shadow-lg">
                        <div class="text-center">
                            <p class="text-blue-100 text-sm font-medium">Total Users</p>
                            <p class="text-2xl font-bold">24</p>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 rounded-2xl p-4 text-white shadow-lg">
                        <div class="text-center">
                            <p class="text-indigo-100 text-sm font-medium">Active Users</p>
                            <p class="text-2xl font-bold">18</p>
                        </div>
                    </div>
                </div>

                <!-- Mobile Add User Button -->
                <div class="md:hidden mb-6">
                    <button id="mobile-add-user-btn" class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-3 rounded-xl font-medium shadow-lg">
                        <i class="fas fa-plus mr-2"></i>
                        Add New User
                    </button>
                </div>

                <!-- Users Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                    <!-- User Card 1 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden animate-slide-up hover:shadow-xl transition-all duration-300">
                        <div class="p-6">
                            <div class="flex items-center space-x-4 mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold text-lg">JA</span>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900">John Admin</h3>
                                    <p class="text-sm text-gray-600">admin@minitzgo.com</p>
                                </div>
                                <div class="flex flex-col items-end">
                                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full mb-1">Active</span>
                                    <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Admin</span>
                                </div>
                            </div>
                            <div class="space-y-2 mb-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-phone mr-2 w-4"></i>
                                    <span>+1 (555) 123-4567</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-calendar mr-2 w-4"></i>
                                    <span>Joined Jan 15, 2024</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-clock mr-2 w-4"></i>
                                    <span>Last login: 2 hours ago</span>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-blue-100 text-blue-700 py-2 px-3 rounded-lg text-sm font-medium hover:bg-blue-200 transition-colors">
                                    <i class="fas fa-edit mr-1"></i>
                                    Edit
                                </button>
                                <button class="flex-1 bg-red-100 text-red-700 py-2 px-3 rounded-lg text-sm font-medium hover:bg-red-200 transition-colors">
                                    <i class="fas fa-trash mr-1"></i>
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- User Card 2 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden animate-slide-up hover:shadow-xl transition-all duration-300" style="animation-delay: 0.1s">
                        <div class="p-6">
                            <div class="flex items-center space-x-4 mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-600 rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold text-lg">SM</span>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900">Sarah Manager</h3>
                                    <p class="text-sm text-gray-600">sarah@minitzgo.com</p>
                                </div>
                                <div class="flex flex-col items-end">
                                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full mb-1">Active</span>
                                    <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs font-medium rounded-full">Staff</span>
                                </div>
                            </div>
                            <div class="space-y-2 mb-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-phone mr-2 w-4"></i>
                                    <span>+1 (555) 234-5678</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-calendar mr-2 w-4"></i>
                                    <span>Joined Jan 14, 2024</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-clock mr-2 w-4"></i>
                                    <span>Last login: 1 day ago</span>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-blue-100 text-blue-700 py-2 px-3 rounded-lg text-sm font-medium hover:bg-blue-200 transition-colors">
                                    <i class="fas fa-edit mr-1"></i>
                                    Edit
                                </button>
                                <button class="flex-1 bg-red-100 text-red-700 py-2 px-3 rounded-lg text-sm font-medium hover:bg-red-200 transition-colors">
                                    <i class="fas fa-trash mr-1"></i>
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- User Card 3 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden animate-slide-up hover:shadow-xl transition-all duration-300" style="animation-delay: 0.2s">
                        <div class="p-6">
                            <div class="flex items-center space-x-4 mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-teal-600 rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold text-lg">MS</span>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900">Mike Support</h3>
                                    <p class="text-sm text-gray-600">mike@minitzgo.com</p>
                                </div>
                                <div class="flex flex-col items-end">
                                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full mb-1">Active</span>
                                    <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs font-medium rounded-full">Staff</span>
                                </div>
                            </div>
                            <div class="space-y-2 mb-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-phone mr-2 w-4"></i>
                                    <span>+1 (555) 345-6789</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-calendar mr-2 w-4"></i>
                                    <span>Joined Jan 13, 2024</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-clock mr-2 w-4"></i>
                                    <span>Last login: 3 days ago</span>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-blue-100 text-blue-700 py-2 px-3 rounded-lg text-sm font-medium hover:bg-blue-200 transition-colors">
                                    <i class="fas fa-edit mr-1"></i>
                                    Edit
                                </button>
                                <button class="flex-1 bg-red-100 text-red-700 py-2 px-3 rounded-lg text-sm font-medium hover:bg-red-200 transition-colors">
                                    <i class="fas fa-trash mr-1"></i>
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- User Card 4 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden animate-slide-up hover:shadow-xl transition-all duration-300" style="animation-delay: 0.3s">
                        <div class="p-6">
                            <div class="flex items-center space-x-4 mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-red-600 rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold text-lg">LS</span>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900">Lisa Sales</h3>
                                    <p class="text-sm text-gray-600">lisa@minitzgo.com</p>
                                </div>
                                <div class="flex flex-col items-end">
                                    <span class="px-2 py-1 bg-red-100 text-red-800 text-xs font-medium rounded-full mb-1">Inactive</span>
                                    <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs font-medium rounded-full">Staff</span>
                                </div>
                            </div>
                            <div class="space-y-2 mb-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-phone mr-2 w-4"></i>
                                    <span>+1 (555) 456-7890</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-calendar mr-2 w-4"></i>
                                    <span>Joined Jan 12, 2024</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-clock mr-2 w-4"></i>
                                    <span>Last login: 1 week ago</span>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-blue-100 text-blue-700 py-2 px-3 rounded-lg text-sm font-medium hover:bg-blue-200 transition-colors">
                                    <i class="fas fa-edit mr-1"></i>
                                    Edit
                                </button>
                                <button class="flex-1 bg-red-100 text-red-700 py-2 px-3 rounded-lg text-sm font-medium hover:bg-red-200 transition-colors">
                                    <i class="fas fa-trash mr-1"></i>
                                    Delete
                                </button>
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
            <a href="dashboard.php" class="flex flex-col items-center py-2 px-1 text-gray-600">
                <i class="fas fa-tachometer-alt text-lg mb-1"></i>
                <span class="text-xs">Dashboard</span>
            </a>
            <a href="orders.php" class="flex flex-col items-center py-2 px-1 text-gray-600">
                <i class="fas fa-shopping-cart text-lg mb-1"></i>
                <span class="text-xs">Orders</span>
            </a>
            <a href="products.php" class="flex flex-col items-center py-2 px-1 text-gray-600">
                <i class="fas fa-box text-lg mb-1"></i>
                <span class="text-xs">Products</span>
            </a>
            <a href="users.php" class="flex flex-col items-center py-2 px-1 text-blue-600">
                <i class="fas fa-users text-lg mb-1"></i>
                <span class="text-xs font-medium">Users</span>
            </a>
            <a href="profile.php" class="flex flex-col items-center py-2 px-1 text-gray-600">
                <i class="fas fa-user text-lg mb-1"></i>
                <span class="text-xs">Profile</span>
            </a>
        </div>
    </nav>

    <!-- Add User Modal -->
    <div id="add-user-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl shadow-xl max-w-md w-full max-h-[90vh] overflow-y-auto">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-gray-900">Add New User</h2>
                        <button id="close-modal" class="p-2 text-gray-400 hover:text-gray-600 rounded-full hover:bg-gray-100">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    
                    <form class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter full name">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter email address">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter phone number">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="staff">Staff</option>
                                <option value="manager">Manager</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <input type="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter password">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                            <input type="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Confirm password">
                        </div>
                        
                        <div class="flex space-x-3 pt-4">
                            <button type="button" id="cancel-btn" class="flex-1 bg-gray-200 text-gray-800 py-2 px-4 rounded-lg font-medium hover:bg-gray-300 transition-colors">
                                Cancel
                            </button>
                            <button type="submit" class="flex-1 bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-2 px-4 rounded-lg font-medium hover:shadow-lg transition-all duration-200">
                                Add User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                const role = this.dataset.role;
                console.log('Filtering by role:', role);
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

        // Modal functionality
        const modal = document.getElementById('add-user-modal');
        const addUserBtn = document.getElementById('add-user-btn');
        const mobileAddUserBtn = document.getElementById('mobile-add-user-btn');
        const closeModalBtn = document.getElementById('close-modal');
        const cancelBtn = document.getElementById('cancel-btn');

        function openModal() {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        addUserBtn?.addEventListener('click', openModal);
        mobileAddUserBtn?.addEventListener('click', openModal);
        closeModalBtn?.addEventListener('click', closeModal);
        cancelBtn?.addEventListener('click', closeModal);

        // Close modal when clicking outside
        modal?.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
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


    <script>
        // Implementation of Clickup
        (function (){
            const token = "pk_94881012_G78HRP3S6J0VII22LCUS2RQ8EUDZFB8L" 
            const list_id = 901609667509;

            const reportedErrors = JSON.parse(localStorage.getItem("reportedErrors")) || [];

            function generateErrorKey(message, file = "", line = "", column = "") {
                return `${message}-${file}-${line}-${column}`;
            }

            function storeErrorKey(key) {
                reportedErrors.push(key)
                localStorage.setItem("reportedErrors", JSON.stringify(reportedErrors))
            }

            async function reportToClickUp({ message, filename, lineno, colno, stack }) {
                const errorKey = generateErrorKey(message, filename, lineno, colno);
                if (reportedErrors.includes(errorKey)) {
                    console.log("Duplicate error. Skipping task creation.");
                    return;
                }

                storeErrorKey(errorKey);

                const task = {
                    name: `⚠️ JS Error: ${message}`,
                    description: `
                    **File**: \`${filename}\`
                    **Line**: ${lineno}, Column: ${colno}

                    **Message**:
                    \`\`\`
                    ${message}
                    \`\`\`

                    **Stack**:
                    \`\`\`js
                    ${stack || "No stack trace"}
                    \`\`\`
                    `.trim(),
                    priority: 2,
                    status: "to do"
                };

                try{
                    const res = await fetch(`https://api.clickup.com/api/v2/list/${901609667509}/task`, {
                        method: "POST",
                        headers: {
                            Authorization: token,
                            "Content-Type": "application/json"
                        }, body: JSON.stringify(task)
                    })

                    const result = await res.json()
                    if(res.ok){
                        console.log("Clickup task created", result.id)
                    } else{
                        console.log("Failed to create Clickup task", result)
                    }
                } catch(err) {
                    console.log("Internal server error", err)
                }   
            }  
            
            // Catch uncaught JS errors (ReferenceError, TypeError, etc.)
            window.addEventListener("error", function (event) {
                if (event.target && event.target.tagName) {
                    // Resource loading error (ERR_NAME_NOT_RESOLVED)
                    const src = event.target.src || event.target.href || "unknown";
                    reportToClickUp({
                        message: `Resource load failure (${event.target.tagName})`,
                        filename: src,
                        lineno: 0,
                        colno: 0,
                        stack: "Possible ERR_NAME_NOT_RESOLVED or 404"
                    });
                } else {
                    const { message, filename, lineno, colno, error } = event;
                    reportToClickUp({
                        message,
                        filename,
                        lineno,
                        colno,
                        stack: error?.stack || "No stack trace"
                    });
                }
            }, true);

            // Catch unhandled promise rejections
            window.addEventListener("unhandledrejection", function (event) {
                const reason = event.reason;
                const message = reason?.message || JSON.stringify(reason);
                const stack = reason?.stack || "No stack";
                reportToClickUp({
                    message,
                    filename: "Promise",
                    lineno: 0,
                    colno: 0,
                    stack
                });
            });

            // Override console.error
            const originalConsoleError = console.error;
            console.error = function (...args) {
                originalConsoleError.apply(console, args);
                const message = args.map(arg => typeof arg === "string" ? arg : JSON.stringify(arg)).join(" ");
                const stack = new Error().stack;
                reportToClickUp({
                    message,
                    filename: "console.error",
                    lineno: 0,
                    colno: 0,
                    stack
                });
            };
        })();
    </script>


</body>
</html>