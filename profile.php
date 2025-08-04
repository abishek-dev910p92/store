<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Profile - Minitzgo Store</title>
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
                        'pulse-slow': 'pulse 3s infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'bounce-slow': 'bounce 3s infinite'
                    },
                    colors: {
                        'primary': {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        'accent': {
                            100: '#FFF1DC',
                            200: '#FFE4B8',
                            300: '#FFD489',
                            400: '#FFC55A',
                            500: '#FFB84D',
                            600: '#FFA41F',
                            700: '#FF9500',
                        },
                        'dark': {
                            100: '#3a3a3a',
                            200: '#2a2a2a',
                            300: '#1f1f1f',
                        },
                        'light': {
                            100: '#ffffff',
                            200: '#f9f9f9',
                            300: '#f6f6f6',
                        }
                    },
                    keyframes: {
                        float: {
                          '0%, 100%': { transform: 'translateY(0)' },
                          '50%': { transform: 'translateY(-10px)' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Professional styling */
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #f6f6f6 0%, #f0f0f0 100%);
            background-attachment: fixed;
        }
        
        .card-shadow {
            box-shadow: 0 10px 20px -3px rgba(0, 0, 0, 0.1), 0 4px 8px -2px rgba(0, 0, 0, 0.05);
        }
        
        .card-hover:hover {
            transform: translateY(-3px);
            transition: all 0.3s ease-in-out;
            box-shadow: 0 15px 30px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .gradient-text {
            background: linear-gradient(90deg, #1f1f1f 0%, #3a3a3a 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .gradient-bg {
            background: linear-gradient(90deg, #1f1f1f 0%, #3a3a3a 100%);
        }
        
        .accent-gradient-bg {
            background: linear-gradient(135deg, #FFD489 0%, #FFB84D 100%);
        }
        
        .section-title {
            position: relative;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 40px;
            background: linear-gradient(90deg, #FFD489 0%, #FFB84D 100%);
            border-radius: 3px;
        }
        
        /* Toggle switch styling - iPhone style */
        .toggle-checkbox {
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            transform: translateX(0);
            border-color: transparent;
            box-shadow: 0 1px 3px rgba(0,0,0,0.2);
        }
        .toggle-checkbox:checked {
            transform: translateX(100%);
            border-color: transparent;
        }
        .toggle-label {
            transition: background-color 0.3s ease;
            background-color: #e5e7eb;
        }
        .toggle-checkbox:checked + .toggle-label {
            background-color: #FFD489;
        }
        
        /* Mobile menu */
        .mobile-menu-hidden {
            transform: translateX(-100%);
        }
        .mobile-menu-visible {
            transform: translateX(0);
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f6f6f6;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #FFD489;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #FFB84D;
        }
        
        /* Platinum card styling */
        .platinum-card {
            background: linear-gradient(135deg,rgb(5, 101, 190) 0%,rgb(0, 38, 85) 100%);
            color: white;
            border-radius: 16px;
            overflow: hidden;
            position: relative;
        }
        
        .platinum-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 100%);
            z-index: 1;
        }
        
        .platinum-card-header {
            background: linear-gradient(90deg, #2a2a2a 0%, #1f1f1f 100%);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .platinum-card-chip {
            background: linear-gradient(135deg, #FFD489 0%, #FFB84D 50%, #FFD489 100%);
            border-radius: 4px;
            height: 40px;
            width: 50px;
            position: relative;
            overflow: hidden;
        }
        
        .platinum-card-chip::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: rgba(0,0,0,0.2);
        }
        
        .platinum-card-chip::after {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 1px;
            background: rgba(0,0,0,0.2);
        }
        
        .platinum-card-content {
            position: relative;
            z-index: 2;
        }
        
        .platinum-card-badge {
            background: linear-gradient(135deg, #FFD489 0%, #FFB84D 50%, #FFD489 100%);
            color: #1f1f1f;
            font-weight: bold;
        }
        
        .platinum-card-hologram {
            position: absolute;
            bottom: 20px;
            right: 20px;
            height: 40px;
            width: 40px;
            background: linear-gradient(135deg, rgba(255,255,255,0.4) 0%, rgba(255,255,255,0.1) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: rgba(255,255,255,0.8);
            box-shadow: 0 0 10px rgba(255,255,255,0.2);
            animation: pulse-slow 3s infinite;
        }
        
        /* Equal height cards */
        .equal-height {
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .equal-height > div {
            flex-grow: 1;
        }
        
        /* Cover banner */
        .cover-banner {
            height: 150px;
            background: linear-gradient(135deg, #1f1f1f 0%, #3a3a3a 100%);
            position: relative;
            overflow: hidden;
        }
        
        .cover-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgcGF0dGVyblRyYW5zZm9ybT0icm90YXRlKDQ1KSI+PHJlY3QgaWQ9InBhdHRlcm4tYmFja2dyb3VuZCIgd2lkdGg9IjQwMCUiIGhlaWdodD0iNDAwJSIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjAzKSI+PC9yZWN0PjxjaXJjbGUgZmlsbD0icmdiYSgyNTUsMjEyLDEzNywwLjEpIiBjeD0iMjAiIGN5PSIyMCIgcj0iMSI+PC9jaXJjbGU+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCBmaWxsPSJ1cmwoI3BhdHRlcm4pIiBoZWlnaHQ9IjEwMCUiIHdpZHRoPSIxMDAlIj48L3JlY3Q+PC9zdmc+');
            opacity: 0.8;
        }
        
        /* Profile picture */
        .profile-picture {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 10;
            margin-top: -60px;
            background-color: #f6f6f6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            font-weight: bold;
            color: #1f1f1f;
        }
        
        /* Upgrade card */
        .upgrade-card {
            background: linear-gradient(135deg, #FFD489 0%, #FFB84D 100%);
            border-radius: 16px;
            overflow: hidden;
            position: relative;
        }
        
        .upgrade-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgcGF0dGVyblRyYW5zZm9ybT0icm90YXRlKDQ1KSI+PHJlY3QgaWQ9InBhdHRlcm4tYmFja2dyb3VuZCIgd2lkdGg9IjQwMCUiIGhlaWdodD0iNDAwJSIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjApIj48L3JlY3Q+PGNpcmNsZSBmaWxsPSJyZ2JhKDI1NSwyNTUsMjU1LDAuMSkiIGN4PSIyMCIgY3k9IjIwIiByPSIxIj48L2NpcmNsZT48L3BhdHRlcm4+PC9kZWZzPjxyZWN0IGZpbGw9InVybCgjcGF0dGVybikiIGhlaWdodD0iMTAwJSIgd2lkdGg9IjEwMCUiPjwvcmVjdD48L3N2Zz4=');
            opacity: 0.8;
        }
        
        /* Analytics card */
        .analytics-card {
            border-radius: 12px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .analytics-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* Achievement badge */
        .achievement-badge {
            background-color: white;
            border-radius: 12px;
            padding: 1rem;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .achievement-badge:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }
        
        .badge-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 1.5rem;
            color: white;
        }
        
        /* Gradient icons */
        .gradient-icon {
            background: linear-gradient(135deg, #FFD489 0%, #FFB84D 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        /* Button styles */
        .btn-primary {
            background: linear-gradient(135deg, #FFD489 0%, #FFB84D 100%);
            color: #1f1f1f;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }
        
        /* Customer review card */
        .review-card {
            background-color: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .review-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-light-300">
  <!-- Mobile Header -->
    <header class="md:hidden bg-white shadow-lg border-b sticky top-0 z-50 glass-effect">
        <div class="flex items-center justify-between px-4 py-3">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-user text-white text-sm"></i>
                </div>
                <h1 class="text-lg font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Profile</h1>
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

    <!-- Mobile Menu (Hidden by default) -->
    <div id="mobile-menu" class="fixed inset-0 z-50 transform transition-transform duration-300 ease-in-out mobile-menu-hidden md:hidden">
        <div class="absolute inset-0 bg-gray-600 opacity-75" id="mobile-menu-overlay"></div>
        <div class="absolute inset-y-0 left-0 max-w-xs w-full bg-gray-50 shadow-xl transform transition-all">
            <div class="flex items-center justify-between px-4 py-3 border-b">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-primary-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-store text-white text-sm"></i>
                    </div>
                    <h1 class="text-lg font-bold text-primary-600">Minitzgo</h1>
                </div>
                <button id="close-mobile-menu" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <nav class="mt-4 px-4 space-y-3">
                <a href="dashboard.php" class="flex items-center space-x-3 px-3 py-3 rounded-lg text-gray-600 hover:bg-blue-50 hover:text-primary-700 group">
                    <i class="fas fa-tachometer-alt text-gray-400 group-hover:text-primary-500"></i>
                    <span>Dashboard</span>
                </a>
                <a href="orders.php" class="flex items-center space-x-3 px-3 py-3 rounded-lg text-gray-600 hover:bg-blue-50 hover:text-primary-700 group">
                    <i class="fas fa-shopping-cart text-gray-400 group-hover:text-primary-500"></i>
                    <span>Orders</span>
                </a>
                <a href="products.php" class="flex items-center space-x-3 px-3 py-3 rounded-lg text-gray-600 hover:bg-blue-50 hover:text-primary-700 group">
                    <i class="fas fa-box text-gray-400 group-hover:text-primary-500"></i>
                    <span>Products</span>
                </a>
                <a href="billing.php" class="flex items-center space-x-3 px-3 py-3 rounded-lg text-gray-600 hover:bg-blue-50 hover:text-primary-700 group">
                    <i class="fas fa-credit-card text-gray-400 group-hover:text-primary-500"></i>
                    <span>Billing</span>
                </a>
                <a href="notifications.php" class="flex items-center space-x-3 px-3 py-3 rounded-lg text-gray-600 hover:bg-blue-50 hover:text-primary-700 group">
                    <i class="fas fa-bell text-gray-400 group-hover:text-primary-500"></i>
                    <span>Notifications</span>
                    <span class="ml-auto bg-red-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">3</span>
                </a>
                <a href="profile.php" class="flex items-center space-x-3 px-3 py-3 rounded-lg bg-blue-100 text-primary-700 group">
                    <i class="fas fa-user text-primary-500"></i>
                    <span>Profile</span>
                </a>
            </nav>
        </div>
    </div>

    <div class="flex min-h-screen">
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
                <a href="billing.php" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                    <i class="fas fa-credit-card mr-3"></i>
                    Billing
                </a>
                <a href="notifications.php" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200">
                    <i class="fas fa-bell mr-3"></i>
                    Notifications
                </a>
                 <a href="profile.php" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white group flex items-center px-4 py-3 text-sm font-medium rounded-xl shadow-lg">
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
        <div class="md:pl-64 flex flex-col flex-1">
            <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none pb-6">
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
                    <div class="flex items-center">
        <?php include "includes/header_toggle.php"; ?>
    </div>
                    <button class="p-2 text-gray-400 hover:text-gray-500 relative">
                        <i class="fas fa-bell text-lg"></i>
                        <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
                    </button>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gradient-to-r from-green-400 to-blue-500 rounded-full flex items-center justify-center">
                            <span class="text-white font-semibold text-sm">SO</span>
                        </div>
                        <span class="text-sm font-medium text-gray-700"> <?php echo $_SESSION['name']; ?></span>
                    </div>
                </div>
            </div>
        </header>

                <!-- Store Status Toggle -->
                <div class="px-4 py-4 sm:px-6 lg:px-8 bg-white md:bg-transparent md:pt-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <h2 class="text-xl font-bold text-gray-900 md:hidden">Seller Profile</h2>
                        
                    </div>
                </div>

                <div class="px-4 sm:px-6 lg:px-8 mt-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 w-full max-w-full">
                        <!-- Left Column: Seller Card & Store Details -->
                        <div class="space-y-6 w-full equal-height">
                            <!-- Seller Verification Card - Platinum Style -->
                            <div class="platinum-card card-shadow transition-all duration-300 card-hover equal-height">
                                <div class="platinum-card-header px-6 py-4">
                                    <div class="flex justify-between items-center">
                                        <h3 class="text-lg font-semibold text-white">PLATINUM SELLER</h3>
                                        <span class="px-2 py-1 platinum-card-badge text-xs font-bold rounded-full flex items-center">
                                            <i class="fas fa-check-circle mr-1"></i> VERIFIED
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6 platinum-card-content">
                                    <div class="flex items-center mb-6">
                                        <div class="platinum-card-chip mr-4"></div>
                                        <div>
                                            <p class="text-xs text-gray-300 uppercase">SELLER SINCE</p>
                                            <p class="text-sm font-bold text-white">01/2023</p>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-6">
                                        <h3 class="text-xl font-bold text-white tracking-wider mb-1">JOHN DOE</h3>
                                        <p class="text-sm text-gray-300">PREMIUM ACCOUNT</p>
                                    </div>
                                    
                                    <div class="space-y-3 mb-6">
                                        <div class="flex items-center text-sm text-gray-300">
                                            <i class="fas fa-envelope w-5"></i>
                                            <span class="ml-2">johndoe@example.com</span>
                                        </div>
                                        <div class="flex items-center text-sm text-gray-300">
                                            <i class="fas fa-phone w-5"></i>
                                            <span class="ml-2">+91 9876543210</span>
                                        </div>
                                        <div class="flex items-center text-sm text-gray-300">
                                            <i class="fas fa-map-marker-alt w-5"></i>
                                            <span class="ml-2">Mumbai, India</span>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-5 pt-4 border-t border-gray-700">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <p class="text-xs text-gray-400 px-1 uppercase">STORE RATING</p>
                                                <div class="flex items-center">
                                                    <div class="flex text-yellow-400">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star-half-alt"></i>
                                                    </div>
                                                    <span class="ml-1 text-sm font-medium text-white">4.6/5 </span>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="platinum-card-hologram">
                                        <i class="fas fa-check text-yellow-200"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <!-- Middle Column: Store Details -->
                        <div class="w-full">
                            <!-- Store Details -->
                            <div class="bg-white rounded-xl card-shadow overflow-hidden transition-all duration-300 card-hover equal-height">
                                <div class="bg-primary-600 px-6 py-4">
                                    <h3 class="text-lg font-semibold text-white">Store Details</h3>
                                </div>
                                <div class="p-6 flex flex-col h-full">
                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4">
                                        <div>
                                            <p class="text-xs text-gray-500 font-medium">Store Name</p>
                                            <p class="text-base font-medium">Minitzgo Fashion</p>
                                        </div>
                                        <span class="mt-2 sm:mt-0 px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                                            Fashion & Apparel
                                        </span>
                                    </div>
                                    
                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4">
                                        <div>
                                            <p class="text-xs text-gray-500 font-medium">Store Status</p>
                                            <div class="flex items-center">
                                                <span class="inline-block h-2 w-2 rounded-full bg-green-500 mr-2"></span>
                                                <span class="text-sm font-medium">Active</span>
                                            </div>
                                        </div>
                                        

                                    </div>
                                    
                                    <div class="pt-4 border-t border-gray-200 mt-auto">
                                        <div class="flex justify-between items-center mb-3">
                                            <div>
                                                <p class="text-xs text-gray-500 font-medium">Products</p>
                                                <p class="text-sm font-medium">128</p>
                                            </div>
                                            <div>
                                                <p class="text-xs text-gray-500 font-medium">Orders</p>
                                                <p class="text-sm font-medium">1,024</p>
                                            </div>
                                            <div>
                                                <p class="text-xs text-gray-500 font-medium">Revenue</p>
                                                <p class="text-sm font-medium">₹4.2L</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
            <a href="notifications.php" class="flex flex-col items-center py-2 px-1 text-gray-600 relative">
                <i class="fas fa-bell text-lg mb-1"></i>
                <span class="text-xs">Alerts</span>
                <span class="absolute -top-1 right-2 w-4 h-4 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
            </a>
            <a href="profile.php" class="flex flex-col items-center py-2 px-1 text-blue-600">
                <i class="fas fa-user text-lg mb-1"></i>
                <span class="text-xs ">Profile</span>
            </a>
        </div>
    </nav>
                        <!-- Right Column: Profile Information -->
                        <div class="w-full">
                            <!-- Profile Info Form -->
                            <div class="bg-white p-6 rounded-xl card-shadow transition-all duration-300 card-hover equal-height">
                                <h3 class="section-title text-lg font-semibold flex items-center">
                                    <i class="fas fa-user-circle text-primary-500 mr-2"></i> Profile Information
                                </h3>
                                <div class="space-y-4 mt-4 h-full">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 w-full">
                                        <div class="bg-gray-50 p-3 rounded-lg border border-gray-100 w-full">
                                            <p class="text-xs font-medium text-gray-500 mb-1">First Name</p>
                                            <p class="text-sm font-semibold text-gray-800">John</p>
                                        </div>
                                        <div class="bg-gray-50 p-3 rounded-lg border border-gray-100 w-full">
                                            <p class="text-xs font-medium text-gray-500 mb-1">Last Name</p>
                                            <p class="text-sm font-semibold text-gray-800">Doe</p>
                                        </div>
                                    </div>
                                    <div class="bg-gray-50 p-3 rounded-lg border border-gray-100">
                                        <p class="text-xs font-medium text-gray-500 mb-1">Email Address</p>
                                        <p class="text-sm font-semibold text-gray-800">johndoe@example.com</p>
                                    </div>
                                    <div class="bg-gray-50 p-3 rounded-lg border border-gray-100">
                                        <p class="text-xs font-medium text-gray-500 mb-1">Phone Number</p>
                                        <p class="text-sm font-semibold text-gray-800">+91 9876543210</p>
                                    </div>
                                    <div class="bg-gray-50 p-3 rounded-lg border border-gray-100">
                                        <p class="text-xs font-medium text-gray-500 mb-1">Address</p>
                                        <p class="text-sm font-semibold text-gray-800">123 Main Street, Mumbai, Maharashtra, India - 400001</p>
                                    </div>
                                    <div class="bg-gray-50 p-3 rounded-lg border border-gray-100">
                                        <p class="text-xs font-medium text-gray-500 mb-1">Bio</p>
                                        <p class="text-sm font-semibold text-gray-800">Passionate entrepreneur with 5+ years of experience in fashion retail. Dedicated to providing quality products and excellent customer service.</p>
                                    </div>
                                    <div class="flex justify-end mt-2">
                                        <div class="inline-flex items-center px-3 py-2 bg-primary-50 text-primary-600 rounded-lg text-sm">
                                            <i class="fas fa-check-circle mr-1"></i> Profile Verified
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Upgrade Ad Card -->
                        <div class="w-full">
                            <div class="upgrade-card card-shadow p-6 relative overflow-hidden">
                                <div class="flex flex-col md:flex-row items-center justify-between relative z-10">
                                    <div class="mb-4 md:mb-0 md:mr-6">
                                        <h3 class="text-xl font-bold text-dark-300 mb-2">Get More Orders with Minitzgo Premium</h3>
                                        <p class="text-dark-300 mb-4">Promote your store and reach more customers with our premium seller program!</p>
                                        <button class="btn-primary hover:shadow-lg transform transition hover:-translate-y-1">
                                            Upgrade Now
                                        </button>
                                    </div>
                                    <div class="w-32 h-32 flex-shrink-0 flex items-center justify-center">
                                        <div class="w-24 h-24 rounded-full bg-white/20 flex items-center justify-center animate-float">
                                            <i class="fas fa-crown text-dark-300 text-4xl"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <!-- Achievements Section -->
                    <div class="mt-6 w-full">
                        <h2 class="section-title text-xl font-bold text-dark-300">Achievements</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Top Rated Seller Badge -->
                            <div class="achievement-badge">
                                <div class="badge-icon" style="background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%)">
                                    <i class="fas fa-award"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-dark-300">Top Rated Seller</h3>
                                    <p class="text-sm text-gray-500">Maintained 4.8+ rating for 6 months</p>
                                </div>
                            </div>
                            
                            <!-- Fast Shipper Badge -->
                            <div class="achievement-badge">
                                <div class="badge-icon" style="background: linear-gradient(135deg, #00C9FF 0%, #0084FF 100%)">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-dark-300">Fast Shipper</h3>
                                    <p class="text-sm text-gray-500">Average shipping time under 24 hours</p>
                                </div>
                            </div>
                            
                            <!-- Power Seller Badge -->
                            <div class="achievement-badge">
                                <div class="badge-icon" style="background: linear-gradient(135deg, #FF416C 0%, #FF4B2B 100%)">
                                    <i class="fas fa-bolt"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-dark-300">Power Seller</h3>
                                    <p class="text-sm text-gray-500">Over 1,000 successful orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                     <br>
                     <br>
                     <br>
                        <!-- Security Information Column -->
                        <div class="w-full">
                            <!-- Security Settings -->
                            <div class="bg-white p-6 rounded-xl card-shadow transition-all duration-300 card-hover equal-height">
                                <h3 class="section-title text-lg font-semibold flex items-center">
                                    <i class="fas fa-shield-alt text-primary-500 mr-2"></i> Security Information
                                </h3>
                                <div class="space-y-4 mt-4 h-full">
                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between p-3 bg-gray-50 rounded-lg border border-gray-100">
                                        <div>
                                            <p class="text-sm font-medium text-gray-700">Password Status</p>
                                            <p class="text-xs text-gray-500 mt-1">Last updated 30 days ago</p>
                                        </div>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 mt-2 sm:mt-0 self-start sm:self-auto">
                                            <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5"></span>
                                            Strong
                                        </span>
                                    </div>
                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between p-3 bg-gray-50 rounded-lg border border-gray-100">
                                        <div>
                                            <p class="text-sm font-medium text-gray-700">Two-Factor Authentication</p>
                                            <p class="text-xs text-gray-500 mt-1">Enhanced account security</p>
                                        </div>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 mt-2 sm:mt-0 self-start sm:self-auto">
                                            <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5"></span>
                                            Enabled
                                        </span>
                                    </div>
                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between p-3 bg-gray-50 rounded-lg border border-gray-100">
                                        <div>
                                            <p class="text-sm font-medium text-gray-700">Login Activity</p>
                                            <p class="text-xs text-gray-500 mt-1">Last login from Mumbai, India</p>
                                        </div>
                                        <span class="text-xs text-gray-500 mt-2 sm:mt-0 self-start sm:self-auto">2 hours ago</span>
                                    </div>
                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between p-3 bg-gray-50 rounded-lg border border-gray-100">
                                        <div>
                                            <p class="text-sm font-medium text-gray-700">Account Status</p>
                                            <p class="text-xs text-gray-500 mt-1">Your account is in good standing</p>
                                        </div>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 mt-2 sm:mt-0 self-start sm:self-auto">
                                            <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5"></span>
                                            Active
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const closeMobileMenuButton = document.getElementById('close-mobile-menu');
            const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
            const mobileMenu = document.getElementById('mobile-menu');
            
            mobileMenuButton?.addEventListener('click', function() {
                mobileMenu.classList.remove('mobile-menu-hidden');
                mobileMenu.classList.add('mobile-menu-visible');
            });
            
            function closeMenu() {
                mobileMenu.classList.remove('mobile-menu-visible');
                mobileMenu.classList.add('mobile-menu-hidden');
            }
            
            closeMobileMenuButton?.addEventListener('click', closeMenu);
            mobileMenuOverlay?.addEventListener('click', closeMenu);
            
           // JavaScript
const storeStatus = document.getElementById('storeStatus');
const statusText = document.getElementById('statusText');

// ✅ Restore toggle state from localStorage on page load
window.addEventListener('DOMContentLoaded', () => {
  const savedStatus = localStorage.getItem('storeStatus');
  console.log('Saved status:', savedStatus); // Debug line

  const isOnline = savedStatus === 'online';
  storeStatus.checked = isOnline;
  updateStatusText(isOnline);
});

// ✅ Update localStorage and text when toggled
storeStatus?.addEventListener('change', function () {
  const isOnline = this.checked;
  localStorage.setItem('storeStatus', isOnline ? 'online' : 'offline');
  updateStatusText(isOnline);
});

// ✅ Function to update status text and color
function updateStatusText(isOnline) {
  console.log('Toggle is:', isOnline ? 'Online' : 'Offline'); // Debug line
  if (isOnline) {
    statusText.textContent = 'Online';
    statusText.classList.remove('text-red-500');
    statusText.classList.add('text-green-500');
  } else {
    statusText.textContent = 'Offline';
    statusText.classList.remove('text-green-500');
    statusText.classList.add('text-red-500');
  }
  
  // Send the updated status to the API
  updateClientStatus(statusText.textContent);
}            
            // Load user data from localStorage
            function loadUserData() {
                try {
                    const userData = localStorage.getItem('dbuser');
                    if (userData) {
                        const user = JSON.parse(userData);
                        console.log('User data loaded:', user);
                        updateProfileWithUserData(user);
                    } else {
                        console.log('No user data found in localStorage');
                    }
                } catch (error) {
                    console.error('Error loading user data:', error);
                }
            }
            
            // Update profile elements with user data
            function updateProfileWithUserData(user) {
                // Update profile picture initials
                const profilePicElements = document.querySelectorAll('.rounded-full span');
                const initials = getInitials(user.first_name, user.last_name);
                profilePicElements.forEach(el => {
                    if (el.textContent === 'SO' || el.textContent === 'JS') {
                        el.textContent = initials;
                    }
                });
                
                // Update name in header
                const headerNameElement = document.querySelector('header .text-sm.font-medium.text-gray-700');
                if (headerNameElement) {
                    headerNameElement.textContent = user.first_name + ' ' + user.last_name;
                }
                
                // Update platinum card name
                const platinumCardName = document.querySelector('.platinum-card-content h3.text-xl.font-bold.text-white');
                if (platinumCardName) {
                    platinumCardName.textContent = (user.first_name + ' ' + user.last_name).toUpperCase();
                }
                
                // Update platinum card contact info
                const platinumCardEmail = document.querySelector('.platinum-card-content .fas.fa-envelope + span');
                if (platinumCardEmail) {
                    platinumCardEmail.textContent = user.email;
                }
                
                const platinumCardPhone = document.querySelector('.platinum-card-content .fas.fa-phone + span');
                if (platinumCardPhone) {
                    platinumCardPhone.textContent = user.phone;
                }
                
                const platinumCardAddress = document.querySelector('.platinum-card-content .fas.fa-map-marker-alt + span');
                if (platinumCardAddress) {
                    platinumCardAddress.textContent = user.address;
                }
                
                // Update seller ID
                const sellerIdElement = document.querySelector('.platinum-card-content .text-sm.font-medium.text-white');
                if (sellerIdElement) {
                    sellerIdElement.textContent = 'Seller ID-' + user.cid;
                }
                
                // Update store details
                const storeNameElement = document.querySelector('.bg-white.rounded-xl .text-base.font-medium');
                if (storeNameElement) {
                    storeNameElement.textContent = user.shop_name || 'Minitzgo Store';
                }
                
                // Update profile information
                updateProfileInfoField('First Name', user.first_name);
                updateProfileInfoField('Last Name', user.last_name);
                updateProfileInfoField('Email Address', user.email);
                updateProfileInfoField('Phone Number', user.phone);
                updateProfileInfoField('Address', user.address);
                
                // Update GST, PAN, UPI, etc. if those fields exist
                if (user.gst) {
                    addProfileInfoField('GST Number', user.gst);
                }
                
                if (user.panid) {
                    addProfileInfoField('PAN ID', user.panid);
                }
                
                if (user.upi) {
                    addProfileInfoField('UPI ID', user.upi);
                }
                
                if (user.ifsc) {
                    addProfileInfoField('IFSC Code', user.ifsc);
                }
                
                if (user.account) {
                    addProfileInfoField('Account Number', user.account);
                }
            }
            
            // Helper function to get initials from name
            function getInitials(firstName, lastName) {
                const firstInitial = firstName ? firstName.charAt(0).toUpperCase() : '';
                const lastInitial = lastName ? lastName.charAt(0).toUpperCase() : '';
                return firstInitial + lastInitial;
            }
            
            // Helper function to update profile information fields
            function updateProfileInfoField(label, value) {
                if (!value) return;
                
                const fields = document.querySelectorAll('.bg-gray-50.p-3.rounded-lg');
                for (const field of fields) {
                    const labelElement = field.querySelector('.text-xs.font-medium.text-gray-500');
                    if (labelElement && labelElement.textContent === label) {
                        const valueElement = field.querySelector('.text-sm.font-semibold.text-gray-800');
                        if (valueElement) {
                            valueElement.textContent = value;
                        }
                        break;
                    }
                }
            }
            
            // Helper function to add new profile information fields
            function addProfileInfoField(label, value) {
                if (!value) return;
                
                const profileInfoContainer = document.querySelector('.space-y-4.mt-4.h-full');
                if (!profileInfoContainer) return;
                
                // Check if field already exists
                const existingFields = profileInfoContainer.querySelectorAll('.text-xs.font-medium.text-gray-500');
                for (const field of existingFields) {
                    if (field.textContent === label) return; // Field already exists
                }
                
                // Create new field
                const newField = document.createElement('div');
                newField.className = 'bg-gray-50 p-3 rounded-lg border border-gray-100';
                newField.innerHTML = `
                    <p class="text-xs font-medium text-gray-500 mb-1">${label}</p>
                    <p class="text-sm font-semibold text-gray-800">${value}</p>
                `;
                
                // Insert before the last div (which contains the 'Profile Verified' text)
                const lastDiv = profileInfoContainer.querySelector('.flex.justify-end.mt-2');
                if (lastDiv) {
                    profileInfoContainer.insertBefore(newField, lastDiv);
                } else {
                    profileInfoContainer.appendChild(newField);
                }
            }
            
            // Load user data when the page loads
            loadUserData();
        });
    </script>


    <script>
        // Implementation of Clickup
        (function (){
            const token = "pk_94881012_G78HRP3S6J0VII22LCUS2RQ8EUDZFB8L" 
            const list_id = 901609669032;

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
                    const res = await fetch(`https://api.clickup.com/api/v2/list/${901609669032}/task`, {
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
<script>
    // Function to get cid from LocalStorage
    function getCidFromLocalStorage() { 
        const dbuser = JSON.parse(localStorage.getItem('dbuser')); // Fetch 'dbuser' 
        if (!dbuser || !dbuser.cid) { 
            console.error('CID not found in local storage'); 
            return null; 
        } 
        return dbuser.cid; // Return only cid 
    } 
    
    // Function to update client status in the database
    function updateClientStatus(status) {
        console.log("Sending status to API:", status);
        
        fetch('https://minitzgo.com/api/client_status.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'x-api-key': '47700d1bb2b874b5fb55ff536c0f9d627feb023f8ed228652f364762a41f7690',
            },
            body: JSON.stringify({
                cid: getCidFromLocalStorage(),
                client_status: status
            }),
        })
        .then(response => response.json())
        .then(data => {
            console.log('API Response:', data);
        })
        .catch(error => {
            console.error('API Error:', error);
        });
    }
    
    // Initial status check on page load
    document.addEventListener('DOMContentLoaded', () => {
        const savedStatus = localStorage.getItem('storeStatus');
        console.log('Initial saved status:', savedStatus);
        
        // Initialize the storeToggle button
        const storeToggle = document.getElementById('storeToggle');
        if (storeToggle) {
            // Set initial state based on the same status as storeStatus
            storeToggle.checked = savedStatus === 'online';
            
            // Add event listener for storeToggle
            storeToggle.addEventListener('change', function() {
                // Sync the storeStatus toggle with this toggle
                if (storeStatus) {
                    storeStatus.checked = this.checked;
                    // Trigger the change event on storeStatus to update everything
                    storeStatus.dispatchEvent(new Event('change'));
                }
            });
        }
    });

    </script>  
</body>
</html>
