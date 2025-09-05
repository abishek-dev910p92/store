<?php 

include "config/db.php";
include "backend/dashboard.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minitzgo Store - Orders</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/togglerSwitch.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    /* upgrade to preuim add card style Starts */
    /* Hide card on screens wider than 768px (typical desktop) */
@media (min-width: 768px) {
  .upgrade-card {
    display: none !important; /* forcefully remove it */
  }
}

        .ads {
  margin: 0;
   
  display: flex;
  align-items: center;
  justify-content: center;
 
  font-family: 'Segoe UI', sans-serif;
}
    .upgrade-card {
        
      background-color: #ffe169;
      width: 340px;
      height: 215px;
      border-radius: 30px 50px 30px 50px;
      padding: 25px 30px;
      color: #111;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
      position: relative;
      overflow: hidden;
      display:block;
    }

    .upgrade-card h4 {
      margin: 0;
      font-size: 1rem;
      color: #333;
    }

    .upgrade-card .top {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-weight: 500;
      margin-bottom: 15px;
    }

    .upgrade-card .total {
      font-size: 1.1rem;
      color: #111;
    }

    .upgrade-card .amount {
      font-size: 2rem;
      font-weight: bold;
      color: #000;
      margin: 5px 0;
    }

    .upgrade-card .action {
      margin-top: 20px;
    }

    .upgrade-card .btn-upgrade {
      background: #111;
      color: #fff;
      padding: 10px 20px;
      border-radius: 25px;
      text-decoration: none;
      font-weight: bold;
      transition: all 0.3s ease;
      display: inline-block;
    }

    .upgrade-card .btn-upgrade:hover {
      background: #333;
      transform: translateY(-2px);
    }

    .upgrade-card .image-stack {
      position: absolute;
      bottom: 10px;
      right: 10px;
      height: 80px;
      display: flex;
      gap: 5px;
    }

    .upgrade-card .image-stack img {
      height: 100%;
      border-radius: 10px;
      object-fit: cover;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    /* upgrade to preuim add card style ends */
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
        
        /* Pagination styles */
        #prevPageBtn:disabled, #nextPageBtn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        
        /* Table row animation */
        tr.animate-fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }
        
        /* Live Orders Card Improvements */
        #live-orders-container {
            scrollbar-width: thin;
            scrollbar-color: #cbd5e0 #f7fafc;
            padding: 16px;
            gap: 16px;
        }
        
        #live-orders-container::-webkit-scrollbar {
            height: 8px;
        }
        
        #live-orders-container::-webkit-scrollbar-track {
            background: #f7fafc;
            border-radius: 4px;
        }
        
        #live-orders-container::-webkit-scrollbar-thumb {
            background: #cbd5e0;
            border-radius: 4px;
        }
        
        #live-orders-container::-webkit-scrollbar-thumb:hover {
            background: #a0aec0;
        }
        
        /* Card hover effects */
        .live-order-card {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            margin: 0 8px;
            border: 1px solid rgba(0,0,0,0.05);
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            background: linear-gradient(to bottom, #ffffff, #f9fafb);
            position: relative;
            overflow: hidden;
        }
        
        .live-order-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
        }
        
        .live-order-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(to right, #3b82f6, #6366f1);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .live-order-card:hover::after {
            opacity: 1;
        }
        
        /* Button improvements */
        .live-order-card button {
            transition: all 0.2s ease-in-out;
            position: relative;
            overflow: hidden;
            font-weight: 600;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .live-order-card button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }
        
        .live-order-card button:active {
            transform: translateY(0);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        /* Text truncation improvements */
        .truncate-text {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            max-width: 100%;
            display: block;
        }
        
        /* Grid layout improvements */
        #desktop-live-orders-container {
            min-height: 200px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 24px;
            padding: 8px 4px;
        }
        
        /* Responsive layout improvements */
        @media (max-width: 1280px) {
            #desktop-live-orders-container {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                gap: 20px;
            }
        }
        
        @media (max-width: 1024px) {
            #desktop-live-orders-container {
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
                gap: 16px;
            }
        }
        
        /* Mobile card width consistency */
        @media (max-width: 768px) {
            .live-order-card {
                width: 300px !important;
                min-width: 300px !important;
                flex-shrink: 0;
                margin-right: 4px;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
                border-radius: 16px;
            }
            
            #live-orders-container {
                display: flex;
                padding: 8px 0;
                gap: 16px;
                overflow-x: auto;
                scroll-snap-type: x mandatory;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: none; /* Firefox */
                -ms-overflow-style: none; /* IE and Edge */
                padding-bottom: 16px;
            }
            
            #live-orders-container::-webkit-scrollbar {
                display: none; /* Chrome, Safari and Opera */
            }
            
            #live-orders-container .live-order-card {
                scroll-snap-align: start;
                position: relative;
            }
            
            #live-orders-container .live-order-card::after {
                border-radius: 0 0 16px 16px;
            }
        }
        
        /* Card content improvements */
        .live-order-card .rounded-xl {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .live-order-card .rounded-xl:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.12);
        }
        
        /* Status badge improvements */
        .live-order-card .rounded-full {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-weight: 600;
            letter-spacing: 0.02em;
            padding: 0.35rem 0.75rem;
        }
        
        /* Price and time display improvements */
        .live-order-card .font-bold {
            color: #1a202c;
            font-size: 1.05rem;
        }
        
        /* Improve card spacing */
        .live-order-card {
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
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
                        <span class="text-sm font-medium text-gray-700"> <?php echo $_SESSION['name']; ?></span>
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
                    <div id="mobileStatusFilter" class="flex space-x-2 overflow-x-auto pb-2">
                        <button class="filter-btn active flex-shrink-0 px-4 py-2 bg-blue-500 text-white rounded-full text-sm font-medium" value="all">
                            All Orders
                        </button>
                        <button class="filter-btn flex-shrink-0 px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium" value="pending">
                            Pending
                        </button>
                        <button class="filter-btn flex-shrink-0 px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium" value="delivered">
                            Delivered
                        </button>
                        <button class="filter-btn flex-shrink-0 px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium" value="rejected">
                            Cancelled
                        </button>
                    </div>
                </div>

                <!-- Desktop Filters -->
                <div class="hidden md:flex md:items-center md:justify-between md:mb-6">
                    <div class="flex space-x-4">
                        <select id="statusFilter" class="px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="all">All Status</option>
                            <option value="pending">Pending</option>
                            <option value="delivered">Delivered</option>
                            <option value="rejected">Cancelled</option>
                        </select>
                        <input type="date" class="px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <button id="export-btn" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-2 rounded-xl hover:shadow-lg transition-all duration-200">
                        <i class="fas fa-download mr-2"></i>
                        Export CSV
                    </button>
                </div>

                <!-- Live Orders Section (Mobile Only) -->
                <div class="md:hidden mb-6 animate-fade-in">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <h2 class="text-xl font-bold text-gray-900">Live Orders</h2>
                            <span class="ml-2 flex h-5 w-5 relative">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-5 w-5 bg-red-500"></span>
                            </span>
                        </div>
                        <span class="px-3 py-1 bg-gradient-to-r from-red-500 to-red-600 text-white text-xs font-medium rounded-full shadow-sm">LIVE</span>
                    </div>
                    
                    <!-- Live Orders Horizontal Scroll with improved scrolling -->
                    <div class="overflow-x-auto pb-4 -mx-4 px-4">
                        <div class="flex space-x-4 min-h-[180px] snap-x snap-mandatory" id="live-orders-container">
                            <!-- Live orders will be loaded here dynamically -->
                            <div id="mobile-live-orders-loading" class="flex items-center justify-center w-full py-8">
                                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-500"></div>
                                <span class="ml-2 text-gray-600">Loading live orders...</span>
                            </div>
                        </div>
                    </div>
                </div>
                
             
                    
    <div class ="ads">                 
           
  <div class="upgrade-card">
    <div class="top">
      <h4>Upgrade to Premium</h4>
      <span>Best plan</span>
    </div>

    <div class="total">Makae your store visible</div>
    <div class="amount">@199/m</div>

    <div class="action">
      <a href="#" class="btn-upgrade">Upgrade Now</a>
    </div>

    <div class="image-stack">
       
      <img src="https://www.svgrepo.com/show/327548/storefront.svg" alt="Service 2">
    </div>
  </div>
    </div>
<br>
<br>
                <!-- Orders List -->

                <div class="space-y-4 md:space-y-0">
                    
                    <!-- Mobile Order Cards -->
                    <div class="md:hidden space-y-4" id="mobile-orders">
                        <div id="mobile-orders-loading" class="flex items-center justify-center w-full py-8">
                            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-500"></div>
                            <span class="ml-2 text-gray-600">Loading orders...</span>
                        </div>
                        <!-- Orders will be loaded here dynamically -->
                    </div>
                    
                    <!-- Mobile Pagination Controls -->
                    <div class="md:hidden mt-6 mb-8" id="mobile-pagination-controls">
                        <div class="bg-white rounded-2xl shadow-lg p-4">
                            <div class="flex flex-col space-y-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-sm text-gray-600">Show</span>
                                        <select id="mobile-orders-per-page" class="text-sm border rounded px-2 py-1">
                                            <option value="3">3</option>
                                            <option value="5" selected>5</option>
                                            <option value="10">10</option>
                                        </select>
                                        <span class="text-sm text-gray-600">per page</span>
                                    </div>
                                    <div class="flex items-center space-x-1">
                                        <span id="mobile-total-orders-count" class="text-sm font-semibold">0 orders</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-center space-x-2">
                                    <button id="mobile-prev-page" class="px-3 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <span id="mobile-current-page-display" class="px-3 py-1 bg-white border text-sm">1 of 1</span>
                                    <button id="mobile-next-page" class="px-3 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>



                    
                    <!-- Desktop Live Orders Section -->
                    <div class="hidden md:block mb-6 animate-fade-in">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <h2 class="text-xl font-bold text-gray-900">Total Live Orders</h2>
                                <span class="ml-2 flex h-5 w-5 relative">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-5 w-5 bg-red-500"></span>
                                </span>
                            </div>
                            <span class="px-3 py-1 bg-gradient-to-r from-red-500 to-red-600 text-white text-xs font-medium rounded-full shadow-sm">Live Orders Preview</span>
                        </div>
                        
                        <!-- Live Orders Grid with improved responsive layout -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4" id="desktop-live-orders-container">
                            <!-- Live Order Card 1 -->
                            <div class="live-order-card bg-white rounded-2xl shadow-lg p-5 animate-bounce-in relative flex flex-col h-full">
                                <span class="absolute top-4 right-4 px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">Processing</span>
                                <div class="flex items-start space-x-4 mb-4 flex-grow">
                                    <div class="w-16 h-16 rounded-xl overflow-hidden bg-gray-50 shadow-sm">
                                        <img src="https://via.placeholder.com/150" alt="Product" class="w-full h-full object-contain">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="font-semibold text-gray-900 truncate">#ORD-005</p>
                                        <p class="text-sm text-gray-600 mb-1">Alex Rivera</p>
                                        <div class="flex items-center justify-between mt-2">
                                            <p class="font-bold text-gray-900">$129.99</p>
                                            <p class="text-xs text-gray-500 bg-gray-50 px-2 py-1 rounded-full">Just now</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex space-x-3 mt-2">
                                    <button class="flex-1 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl shadow-sm hover:shadow-md transition-all duration-200 text-sm font-medium flex items-center justify-center">
                                        <i class="fas fa-check mr-2"></i>Complete
                                    </button>
                                    <button class="flex-1 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl shadow-sm hover:shadow-md transition-all duration-200 text-sm font-medium flex items-center justify-center reject-order" data-oid="005">
                                        <i class="fas fa-times mr-2"></i>Reject
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Live Order Card 2 -->
                            <div class="live-order-card bg-white rounded-2xl shadow-lg p-5 animate-bounce-in relative flex flex-col h-full" style="animation-delay: 0.1s">
                                <span class="absolute top-4 right-4 px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">Processing</span>
                                <div class="flex items-start space-x-4 mb-4 flex-grow">
                                    <div class="w-16 h-16 rounded-xl overflow-hidden bg-gray-50 shadow-sm">
                                        <img src="https://via.placeholder.com/150" alt="Product" class="w-full h-full object-contain">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="font-semibold text-gray-900 truncate">#ORD-006</p>
                                        <p class="text-sm text-gray-600 mb-1">Sarah Chen</p>
                                        <div class="flex items-center justify-between mt-2">
                                            <p class="font-bold text-gray-900">$79.50</p>
                                            <p class="text-xs text-gray-500 bg-gray-50 px-2 py-1 rounded-full">2 mins ago</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex space-x-3 mt-2">
                                    <button class="flex-1 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl shadow-sm hover:shadow-md transition-all duration-200 text-sm font-medium flex items-center justify-center">
                                        <i class="fas fa-check mr-2"></i>Complete
                                    </button>
                                    <button class="flex-1 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl shadow-sm hover:shadow-md transition-all duration-200 text-sm font-medium flex items-center justify-center reject-order" data-oid="006">
                                        <i class="fas fa-times mr-2"></i>Reject
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Live Order Card 3 -->
                            <div class="live-order-card bg-white rounded-2xl shadow-lg p-5 animate-bounce-in relative flex flex-col h-full" style="animation-delay: 0.2s">
                                <span class="absolute top-4 right-4 px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">Processing</span>
                                <div class="flex items-start space-x-4 mb-4 flex-grow">
                                    <div class="w-16 h-16 rounded-xl overflow-hidden bg-gray-50 shadow-sm">
                                        <img src="https://via.placeholder.com/150" alt="Product" class="w-full h-full object-contain">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="font-semibold text-gray-900 truncate">#ORD-007</p>
                                        <p class="text-sm text-gray-600 mb-1">David Wilson</p>
                                        <div class="flex items-center justify-between mt-2">
                                            <p class="font-bold text-gray-900">$199.00</p>
                                            <p class="text-xs text-gray-500 bg-gray-50 px-2 py-1 rounded-full">5 mins ago</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex space-x-3 mt-2">
                                    <button class="flex-1 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl shadow-sm hover:shadow-md transition-all duration-200 text-sm font-medium flex items-center justify-center">
                                        <i class="fas fa-check mr-2"></i>Complete
                                    </button>
                                    <button class="flex-1 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl shadow-sm hover:shadow-md transition-all duration-200 text-sm font-medium flex items-center justify-center reject-order" data-oid="007">
                                        <i class="fas fa-times mr-2"></i>Reject
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Desktop Table Total orders-->
                    <div class="hidden md:block bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment mode</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="ordersTableBody" class="bg-white divide-y divide-gray-200">
                                    <!-- Rows will be added here -->
                                    <tr>
                                        <td colspan="7" class="text-center py-4">Get delivery in minitz.</td>
                                    </tr>
                                   
                                </tbody>
                                <tfoot>
        <tr id="totalOrdersCount"></tr>
    </tfoot>
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
        // Enhanced filter functionality
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
                
                // Filter logic
                const status = this.dataset.status;
                console.log('Filtering by status:', status);
                
                // Filter total orders
                if (originalOrders.length === 0 && allOrders.length > 0) {
                    originalOrders = [...allOrders];
                }
                
                if (status === 'all' || !status) {
                    allOrders = [...originalOrders];
                } else {
                    allOrders = originalOrders.filter(order => 
                        order.product_status?.toLowerCase() === status.toLowerCase()
                    );
                }
                
                currentPage = 1;
                mobileCurrentPage = 1;
                displayDesktopOrders();
                displayMobileOrders();
                
                // Filter live orders
                const liveOrderCards = document.querySelectorAll('.live-order-card');
                
                if (liveOrderCards.length > 0) {
                    console.log(`Filtering ${liveOrderCards.length} live order cards by status: ${status}`);
                    
                    liveOrderCards.forEach(card => {
                        if (status === 'all' || !status) {
                            card.style.display = '';
                        } else {
                            const statusElement = card.querySelector('span.rounded-full');
                            const cardStatus = statusElement ? statusElement.textContent.toLowerCase() : '';
                            
                            if (cardStatus.includes(status.toLowerCase())) {
                                card.style.display = '';
                            } else {
                                card.style.display = 'none';
                            }
                        }
                    });
                } else {
                    console.warn('No live order cards found for status filtering');
                }
            });
        });
        
        // CSV Export functionality
        document.getElementById('export-btn')?.addEventListener('click', async function() {
            const button = this;
            const originalText = button.innerHTML;
            
            // Show loading state
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Exporting...';
            button.disabled = true;
            
            try {
                // Get live orders data
                const liveOrdersData = [];
                const liveOrderCards = document.querySelectorAll('.live-order-card');
                
                liveOrderCards.forEach(card => {
                    if (card.style.display !== 'none') {
                        // More specific selectors to ensure we get the right elements
                        const orderIdElement = card.querySelector('p.font-semibold.text-gray-900');
                        const customerElement = card.querySelector('p.text-xs.text-gray-500.truncate-text');
                        const amountElement = card.querySelector('p.font-bold.text-gray-900');
                        const statusElement = card.querySelector('span.rounded-full');
                        const timeElements = card.querySelectorAll('p.text-xs.text-gray-500');
                        const timeElement = timeElements.length > 1 ? timeElements[1] : null;
                        
                        if (orderIdElement && customerElement && amountElement) {
                            liveOrdersData.push({
                                type: 'Live Order',
                                orderId: orderIdElement.textContent.trim().replace(/["]/g, '""'),
                                customer: customerElement.textContent.trim().replace(/["]/g, '""'),
                                amount: amountElement.textContent.trim().replace(/["]/g, '""'),
                                status: statusElement ? statusElement.textContent.trim().replace(/["]/g, '""') : 'Processing',
                                time: timeElement ? timeElement.textContent.trim().replace(/["]/g, '""') : 'Just now',
                                date: new Date().toLocaleDateString().replace(/["]/g, '""')
                            });
                        }
                    }
                });
                
                
                // Combine live orders and total orders
                const combinedData = [
                    ...liveOrdersData,
                    ...allOrders.map(order => ({
                        type: 'Total Order',
                        orderId: order.oid || order.order_id || 'N/A',
                        customer: order.customer_name || 'N/A',
                        product: order.product_title || 'N/A',
                        amount: order.product_price || '0',
                        status: order.product_status || 'N/A',
                        paymentMode: order.payment_mode || 'N/A',
                        date: order.date || 'N/A'
                    }))
                ];
                
                if (combinedData.length === 0) {
                    alert('No data to export');
                    return;
                }
                
                // Create CSV content with proper escaping for all fields
                const headers = ['Type', 'Order ID', 'Customer/Product', 'Amount', 'Status', 'Payment Mode', 'Date'];
                const csvContent = [
                    headers.join(','),
                    ...combinedData.map(row => [
                        row.type,
                        row.orderId,
                        row.customer || row.product || 'N/A',
                        row.amount,
                        row.status,
                        row.paymentMode || 'N/A',
                        row.date
                    ].map(field => {
                        // Ensure field is a string and properly escape double quotes
                        const safeField = String(field || '').replace(/"/g, '""');
                        return `"${safeField}"`;
                    }).join(','))
                ].join('\n');
                
                // Add BOM for UTF-8 encoding to handle special characters
                const BOM = '\uFEFF';
                const csvContentWithBOM = BOM + csvContent;
                
                // Create and download file
                const blob = new Blob([csvContentWithBOM], { type: 'text/csv;charset=utf-8;' });
                const url = URL.createObjectURL(blob);
                
                const link = document.createElement('a');
                link.setAttribute('href', url);
                link.setAttribute('download', `orders_export_${new Date().toISOString().split('T')[0]}.csv`);
                link.style.visibility = 'hidden';
                
                // Append to body, click, then remove
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                
                // Revoke the URL to free up memory
                setTimeout(() => URL.revokeObjectURL(url), 100);
                
                // Show success message
                button.innerHTML = '<i class="fas fa-check mr-2"></i>Exported!';
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.disabled = false;
                }, 2000);
                
            } catch (error) {
                console.error('Export error:', error);
                alert('Error exporting data. Please try again.');
                button.innerHTML = originalText;
                button.disabled = false;
            }
        });

        // Enhanced search functionality for both live orders and total orders
        let originalOrders = [];
        let originalLiveOrders = [];
        
        function handleSearch(searchTerm) {
            console.log('Searching for:', searchTerm);
            
            if (!searchTerm.trim()) {
                // If search is empty, restore original data
                if (originalOrders.length > 0) {
                    allOrders = [...originalOrders];
                    displayDesktopOrders();
                    displayMobileOrders();
                }
                return;
            }
            
            // Search in total orders
            if (originalOrders.length === 0 && allOrders.length > 0) {
                originalOrders = [...allOrders];
            }
            
            const filteredOrders = originalOrders.filter(order => {
                const searchFields = [
                    order.oid,
                    order.order_id,
                    order.product_title,
                    order.customer_name,
                    order.product_status,
                    order.payment_mode,
                    order.product_price?.toString(),
                    order.date
                ].filter(Boolean);
                
                return searchFields.some(field => 
                    field.toLowerCase().includes(searchTerm.toLowerCase())
                );
            });
            
            allOrders = filteredOrders;
            currentPage = 1;
            mobileCurrentPage = 1;
            displayDesktopOrders();
            displayMobileOrders();
            
            // Search in live orders (filter displayed cards)
            const liveOrderCards = document.querySelectorAll('.live-order-card');
            
            if (liveOrderCards.length > 0) {
                console.log(`Searching ${liveOrderCards.length} live order cards for: ${searchTerm}`);
                
                liveOrderCards.forEach(card => {
                    const cardText = card.textContent.toLowerCase();
                    const searchTermLower = searchTerm.toLowerCase();
                    
                    // Check if card contains the search term
                    if (cardText.includes(searchTermLower)) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            } else {
                console.warn('No live order cards found for search');
            }
        }

        document.getElementById('mobile-search')?.addEventListener('input', function(e) {
            handleSearch(e.target.value);
        });

        document.getElementById('desktop-search')?.addEventListener('input', function(e) {
            handleSearch(e.target.value);
        });
        
        // Date filtering functionality
        document.querySelector('input[type="date"]')?.addEventListener('change', function(e) {
            const selectedDate = e.target.value;
            console.log('Filtering by date:', selectedDate);
            
            if (!selectedDate) {
                // If no date selected, restore original data
                if (originalOrders.length > 0) {
                    allOrders = [...originalOrders];
                    displayDesktopOrders();
                    displayMobileOrders();
                }
                return;
            }
            
            // Filter total orders by date
            if (originalOrders.length === 0 && allOrders.length > 0) {
                originalOrders = [...allOrders];
            }
            
            const filteredOrders = originalOrders.filter(order => {
                if (!order.date) return false;
                
                // Convert order date to YYYY-MM-DD format for comparison
                const orderDate = new Date(order.date);
                const selectedDateObj = new Date(selectedDate);
                
                return orderDate.toDateString() === selectedDateObj.toDateString();
            });
            
            allOrders = filteredOrders;
            currentPage = 1;
            mobileCurrentPage = 1;
            displayDesktopOrders();
            displayMobileOrders();
            
            // Filter live orders by date (hide all since live orders are typically today)
            const liveOrderCards = document.querySelectorAll('.live-order-card');
            const today = new Date().toDateString();
            const selectedDateStr = new Date(selectedDate).toDateString();
            
            liveOrderCards.forEach(card => {
                if (selectedDateStr === today) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
        
        // Desktop status filter functionality
        document.querySelector('select')?.addEventListener('change', function(e) {
            const selectedStatus = e.target.value;
            console.log('Filtering by status:', selectedStatus);
            
            // Filter total orders
            if (originalOrders.length === 0 && allOrders.length > 0) {
                originalOrders = [...allOrders];
            }
            
            if (!selectedStatus || selectedStatus === '') {
                allOrders = [...originalOrders];
            } else {
                allOrders = originalOrders.filter(order => 
                    order.product_status?.toLowerCase() === selectedStatus.toLowerCase()
                );
            }
            
            currentPage = 1;
            mobileCurrentPage = 1;
            displayDesktopOrders();
            displayMobileOrders();
            
            // Filter live orders
            const liveOrderCards = document.querySelectorAll('.live-order-card');
            
            if (liveOrderCards.length > 0) {
                console.log(`Filtering ${liveOrderCards.length} live order cards by status: ${selectedStatus}`);
                
                liveOrderCards.forEach(card => {
                    if (!selectedStatus || selectedStatus === '') {
                        card.style.display = '';
                    } else {
                        const statusElement = card.querySelector('span.rounded-full');
                        const cardStatus = statusElement ? statusElement.textContent.toLowerCase() : '';
                        
                        if (cardStatus.includes(selectedStatus.toLowerCase())) {
                            card.style.display = '';
                        } else {
                            card.style.display = 'none';
                        }
                    }
                });
            } else {
                console.warn('No live order cards found for desktop status filtering');
            }
        });
        
        // Live Orders Functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Get references to containers
            const mobileLiveOrdersContainer = document.getElementById('live-orders-container');
            const desktopLiveOrdersContainer = document.getElementById('desktop-live-orders-container');
            const mobileOrdersContainer = document.getElementById('mobile-orders');
            const desktopOrdersTable = document.querySelector('.hidden.md\\:block table tbody');
            
            // Get customer ID from localStorage
            let dbUser = localStorage.getItem('dbuser');
            let cid = dbUser ? JSON.parse(dbUser)?.cid : null;
            
            // Handle Mark Complete button clicks for mobile
            if (mobileLiveOrdersContainer) {
                mobileLiveOrdersContainer.addEventListener('click', handleMarkComplete);
            }
            
            // Handle Mark Complete button clicks for desktop
            if (desktopLiveOrdersContainer) {
                desktopLiveOrdersContainer.addEventListener('click', handleMarkComplete);
            }
            
            // Function to handle Mark Complete button clicks
            function handleMarkComplete(e) {
                // Check if the clicked element is a Mark Complete button
                if (e.target.closest('button') && e.target.closest('button').textContent.includes('Complete')) {
                    // Get the order card element (using the live-order-card class for consistency)
                    const liveOrderCard = e.target.closest('.live-order-card');
                    
                    if (liveOrderCard) {
                        console.log('Mark Complete clicked for card:', liveOrderCard);
                        
                        // Get the button and disable it to prevent multiple clicks
                        const button = e.target.closest('button');
                        button.disabled = true;
                        button.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Processing...';
                        
                        // Extract the order ID from the data attribute if available, otherwise from the text
                        const orderIDElement = liveOrderCard.querySelector('p.font-semibold.text-gray-900.text-sm');
                        let orderIDText = '';
                        if (orderIDElement) {
                            orderIDText = orderIDElement.textContent.trim();
                            console.log('Found orderIDText:', orderIDText);
                        }
                        
                        // Extract just the number part from "Order #123"
                        let orderID = null;
                        const orderIDMatch = orderIDText.match(/#([\d]+)/);
                        if (orderIDMatch && orderIDMatch[1]) {
                            orderID = orderIDMatch[1];
                            console.log('Extracted orderID from text:', orderID);
                        }
                        
                        // Try to get the order ID from the reject button's data-oid attribute as fallback
                        const rejectButton = liveOrderCard.querySelector('.reject-order');
                        let dataOid = null;
                        if (rejectButton) {
                            dataOid = rejectButton.getAttribute('data-oid');
                            console.log('Found data-oid attribute:', dataOid);
                        }
                        
                        // Try to get the order ID from the complete button's data-oid attribute as another fallback
                        const completeButton = liveOrderCard.querySelector('.complete-order');
                        let completeDataOid = null;
                        if (completeButton) {
                            completeDataOid = completeButton.getAttribute('data-oid');
                            console.log('Found complete button data-oid attribute:', completeDataOid);
                        }
                        
                        // Try to get the order ID from the card's data-oid attribute as another fallback
                        const cardDataOid = liveOrderCard.getAttribute('data-oid');
                        if (cardDataOid) {
                            console.log('Found card data-oid attribute:', cardDataOid);
                        }
                        
                        const finalOrderID = orderID || dataOid || completeDataOid || cardDataOid || Math.floor(Math.random() * 1000).toString().padStart(3, '0');
                        console.log('Final orderID to use:', finalOrderID);
                        
                        // Extract customer name
                        const customerElement = liveOrderCard.querySelector('p.text-xs.text-gray-500.truncate-text');
                        const customerName = customerElement ? customerElement.textContent.trim() : 'Customer';
                        console.log('Extracted customerName:', customerName);
                        
                        // Extract amount
                        const amountElement = liveOrderCard.querySelector('p.font-bold.text-gray-900.text-sm');
                        const amount = amountElement ? amountElement.textContent.trim() : '₹0';
                        console.log('Extracted amount:', amount);
                        
                        // Extract product image
                        const imgElement = liveOrderCard.querySelector('img');
                        const productImage = imgElement ? imgElement.src : 'https://via.placeholder.com/150/FF5733/FFFFFF?text=Product';
                        console.log('Extracted productImage:', productImage);
                        
                        // Make API call to mark order as complete
                        fetch('https://minitzgo.com/api/complete_live_order.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-API-Key': 'd0145238fabc26381f3e493ef5103144c6c496280d015bf23cef9ae3b09e87aa'
                            },
                            body: JSON.stringify({
                                product_status: 'delivered',
                                cid: cid,
                                oid: finalOrderID
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log('Complete order API response:', data);
                            
                            // Add to mobile orders list
                            if (mobileOrdersContainer) {
                                // Create a new order card for the completed order (mobile)
                                const completedMobileCard = document.createElement('div');
                                completedMobileCard.className = 'bg-white rounded-2xl shadow-lg p-4 animate-slide-up';
                                completedMobileCard.innerHTML = `
                                    <div class="flex items-center justify-between mb-3">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-12 h-12 bg-gray-50 rounded-lg overflow-hidden">
                                                <img src="${productImage}" alt="Product" class="w-full h-full object-contain">
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-900 truncate-text">${orderIDText}</p>
                                                <p class="text-xs text-gray-500 truncate-text">${customerName}</p>
                                            </div>
                                        </div>
                                        <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">Delivered</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="font-bold text-gray-900">${amount}</p>
                                            <p class="text-xs text-gray-500">${new Date().toLocaleDateString()}</p>
                                        </div>
                                        <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-full">
                                            <i class="fas fa-chevron-right"></i>
                                        </button>
                                    </div>
                                `;
                                
                                // Add the completed order to the mobile orders container at the top
                                mobileOrdersContainer.insertBefore(completedMobileCard, mobileOrdersContainer.firstChild);
                            }
                            
                            // Add to desktop orders table
                            if (desktopOrdersTable) {
                                // Create a new table row for the completed order (desktop)
                                const newRow = document.createElement('tr');
                                newRow.className = 'hover:bg-gray-50 animate-fade-in';
                                newRow.innerHTML = `
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${orderIDText}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 bg-gray-50 rounded-md overflow-hidden mr-3">
                                                <img src="${productImage}" alt="Product" class="h-full w-full object-contain">
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">${customerName}</div>
                                                <div class="text-sm text-gray-500">${customerName.toLowerCase().replace(' ', '.')}@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold">${amount}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Delivered</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${new Date().toLocaleDateString()}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                                        <button class="text-green-600 hover:text-green-900">Edit</button>
                                    </td>
                                `;
                                
                                // Add the new row to the table at the top
                                if (desktopOrdersTable.firstChild) {
                                    desktopOrdersTable.insertBefore(newRow, desktopOrdersTable.firstChild);
                                } else {
                                    desktopOrdersTable.appendChild(newRow);
                                }
                            }
                            
                            // Remove the live order card with animation
                            liveOrderCard.style.opacity = '0';
                            liveOrderCard.style.transform = 'translateY(-20px)';
                            liveOrderCard.style.transition = 'opacity 0.3s, transform 0.3s';
                            
                            setTimeout(() => {
                                liveOrderCard.remove();
                            }, 300);
                            
                            // Update order counters
                            updateOrderCounters();
                            
                            // Refresh live orders
                            setTimeout(() => {
                                fetchLiveOrders();
                            }, 1000);
                        })
                        .catch(error => {
                            console.error('Error completing order:', error);
                            alert('Error completing order. Please try again.');
                            // Reset button state
                            button.disabled = false;
                            button.innerHTML = '<i class="fas fa-check mr-1"></i>Complete';
                        });
                    }
                }
            }
            
            // Function to update order counters
            function updateOrderCounters() {
                // Get the total orders counter element (mobile)
                const totalOrdersCounter = document.querySelector('.text-blue-100.text-sm.font-medium + p.text-2xl.font-bold');
                
                if (totalOrdersCounter) {
                    // Parse the current count and increment it
                    let currentCount = parseInt(totalOrdersCounter.textContent.replace(/,/g, ''));
                    currentCount++;
                    
                    // Format the count with commas and update the display
                    totalOrdersCounter.textContent = currentCount.toLocaleString();
                }
            }
            
            // Function to fetch live orders from API
            function fetchLiveOrders() {
                // Show loading indicators
                if (mobileLiveOrdersContainer) {
                    mobileLiveOrdersContainer.innerHTML = `
                        <div id="mobile-live-orders-loading" class="flex items-center justify-center w-full py-8">
                            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-500"></div>
                            <span class="ml-2 text-gray-600">Loading live orders...</span>
                        </div>
                    `;
                }
                
                if (!cid) {
                    console.error("CID not found in localStorage.");
                    if (mobileLiveOrdersContainer) {
                        mobileLiveOrdersContainer.innerHTML = `
                            <div class="w-full py-8 text-center">
                                <span class="text-gray-600">User not logged in. Cannot fetch live orders.</span>
                            </div>
                        `;
                    }
                    return;
                }
                
                // Make API call to fetch live orders
                fetch('https://minitzgo.com/api/fetch_live_orders.php', { 
                    method: 'POST', 
                    headers: { 
                        'Content-Type': 'application/json', 
                        'x-api-key': '9fbcd848f047c400b3f4398655c8c9ac80addaefca5d4f7f40bdfdc749e2c0dd', 
                    }, 
                    body: JSON.stringify({ cid: cid }), 
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Live orders data:', data);
                    
                    // Clear loading indicators
                    if (mobileLiveOrdersContainer) {
                        mobileLiveOrdersContainer.innerHTML = '';
                    }
                    if (desktopLiveOrdersContainer) {
                        desktopLiveOrdersContainer.innerHTML = '';
                    }
                    
                    // Handle different data formats - API returns either an array directly or {count, data} object
                    let ordersData = data;
                    if (!Array.isArray(data) && data.data && Array.isArray(data.data)) {
                        ordersData = data.data;
                    }
                    
                    // Check if data is an array and has items
                    if (Array.isArray(ordersData) && ordersData.length > 0) {
                        // Display live orders in mobile view
                        if (mobileLiveOrdersContainer) {
                            console.log('Creating mobile live order cards for', ordersData.length, 'orders');
                            console.log('Creating mobile live order cards for', ordersData.length, 'orders');
                            ordersData.forEach((order, index) => {
                                const newMobileCard = document.createElement('div');
                                newMobileCard.className = 'live-order-card bg-white rounded-2xl shadow-lg p-5 animate-bounce-in relative hover:shadow-xl transition-all duration-200';
                                newMobileCard.style.animationDelay = `${index * 0.1}s`;
                                
                                // Determine status class and text
                                let status = order.status || order.product_status || 'processing';
                                status = status.toLowerCase();
                                
                                const statusClass = status === 'processing' ? 'bg-yellow-100 text-yellow-800' : 
                                                  status === 'pending' ? 'bg-blue-100 text-blue-800' : 
                                                  status === 'rejected' ? 'bg-red-100 text-red-800' :
                                                  status === 'delivered' ? 'bg-green-100 text-green-800' :
                                                  'bg-gray-100 text-gray-800';
                                                  
                                const statusText = status.charAt(0).toUpperCase() + status.slice(1);
                                
                                // Use order image if available, otherwise use placeholder
                                const imgSrc = order.product_image && order.product_image.trim() !== '' ? 
                                              order.product_image : 
                                              'https://via.placeholder.com/150/FF5733/FFFFFF?text=Product';
                                
                                // Extract order ID properly - prioritize existing IDs
                                let orderId;
                                if (order.oid) {
                                    orderId = order.oid;
                                } else if (order.id) {
                                    orderId = order.id;
                                } else {
                                    orderId = Math.floor(Math.random() * 1000).toString().padStart(3, '0');
                                }
                                console.log('Mobile order ID extracted:', orderId, 'from order:', order);
                                
                                // Set data-oid attribute on the card itself
                                newMobileCard.setAttribute('data-oid', orderId);
                                
                                newMobileCard.innerHTML = `
                                    <span class="absolute top-2 right-2 mt-2 ${statusClass} text-xs ml-4 font-medium rounded-full">${statusText}</span>
                                    <div class="flex items-start space-x-4 mb-4 p-2">
                                        <div class="w-12 h-16 rounded-xl overflow-hidden bg-gray-50 flex-shrink-0">
                                            <img src="${imgSrc}" alt="Product" class="w-full h-full object-contain">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="font-semibold text-gray-900 text-xs truncate-text">Order #${orderId}</p>
                                            <p class="text-xs text-gray-500 truncate-text mt-4">${order.customer_name || order.product_title || 'Customer'}</p>
                                            <div class="flex items-center justify-between">
                                                <p class="font-bold text-gray-900 text-xs">₹${order.amount || order.product_price || '0'}</p>
                                                <p class="text-xs text-gray-500 ml-4">${order.order_time || order.date || 'Just now'}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex space-x-3 px-2 pb-2">
                                        <button class="flex-1 py-1 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl hover:shadow-lg transition-all duration-200 text-xs font-medium reject-order" data-oid="${orderId}">
                                            <i class="fas fa-times mr-1"></i>Reject
                                        </button>
                                    </div>
                                `;
                                
                                mobileLiveOrdersContainer.appendChild(newMobileCard);
                            });
                        }
                        
                        // Display live orders in desktop view
                        if (desktopLiveOrdersContainer) {
                            console.log('Creating desktop live order cards for', ordersData.length, 'orders');
                            console.log('Creating desktop live order cards for', ordersData.length, 'orders');
                            ordersData.forEach((order, index) => {
                                const newDesktopCard = document.createElement('div');
                                newDesktopCard.className = 'live-order-card bg-white rounded-2xl shadow-lg p-5 animate-bounce-in relative flex flex-col h-full min-h-[200px] hover:shadow-xl transition-all duration-200';
                                newDesktopCard.style.animationDelay = `${index * 0.1}s`;
                                
                                // Determine status class and text
                                let status = order.status || order.product_status || 'processing';
                                status = status.toLowerCase();
                                
                                const statusClass = status === 'processing' ? 'bg-yellow-100 text-yellow-800' : 
                                                  status === 'pending' ? 'bg-blue-100 text-blue-800' : 
                                                  status === 'rejected' ? 'bg-red-100 text-red-800' :
                                                  status === 'delivered' ? 'bg-green-100 text-green-800' :
                                                  'bg-gray-100 text-gray-800';
                                                  
                                const statusText = status.charAt(0).toUpperCase() + status.slice(1);
                                
                                // Use order image if available, otherwise use placeholder
                                const imgSrc = order.product_image && order.product_image.trim() !== '' ? 
                                              order.product_image : 
                                              'https://via.placeholder.com/150/FF5733/FFFFFF?text=Product';
                                
                                // Extract order ID properly - prioritize existing IDs
                                let orderId;
                                if (order.oid) {
                                    orderId = order.oid;
                                } else if (order.id) {
                                    orderId = order.id;
                                } else {
                                    orderId = Math.floor(Math.random() * 1000).toString().padStart(3, '0');
                                }
                                console.log('Desktop order ID extracted:', orderId, 'from order:', order);
                                
                                // Set data-oid attribute on the card itself
                                newDesktopCard.setAttribute('data-oid', orderId);
                                
                                newDesktopCard.innerHTML = `
                                    <span class="absolute top-4 right-4 px-2 py-1 ${statusClass} text-xs font-medium rounded-full">${statusText}</span>
                                    <div class="flex items-start space-x-4 mb-4 flex-grow p-6">
                                        <div class="w-16 h-16 rounded-xl overflow-hidden bg-gray-50 flex-shrink-0">
                                            <img src="${imgSrc}" alt="Product" class="w-full h-full object-contain">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="font-semibold text-gray-900 text-sm truncate-text">Order #${orderId}</p>
                                            <p class="text-xs text-gray-500 truncate-text mt-1">${order.customer_name || order.product_title || 'Customer'}</p>
                                            <div class="flex items-center justify-between">
                                                <p class="font-bold text-gray-900 text-sm">₹${order.amount || order.product_price || '0'}</p>
                                                <p class="text-xs text-gray-500">${order.order_time || order.date || 'Just now'}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex space-x-3 mt-auto px-2 pb-2">
                                        <button class="flex-1 py-1 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl hover:shadow-lg transition-all duration-200 text-sm font-medium reject-order" data-oid="${orderId}">
                                            <i class="fas fa-times mr-1"></i>Reject
                                        </button>
                                    </div>
                                `;
                                
                                desktopLiveOrdersContainer.appendChild(newDesktopCard);
                            });
                        }
                    } else {
                        // No live orders found
                        if (mobileLiveOrdersContainer) {
                            mobileLiveOrdersContainer.innerHTML = `
                                <div class="w-full py-8 text-center">
                                    <span class="text-gray-600">No live orders at the moment.</span>
                                </div>
                            `;
                        }
                        if (desktopLiveOrdersContainer) {
                            desktopLiveOrdersContainer.innerHTML = `
                                <div class="col-span-3 py-8 text-center bg-white rounded-2xl shadow-lg">
                                    <span class="text-gray-600">No live orders at the moment.</span>
                                </div>
                            `;
                        }
                    }
                    
                    // Log detailed information for debugging
                    console.log('Data structure:', {
                        isArray: Array.isArray(data),
                        hasDataProperty: data && typeof data === 'object' && 'data' in data,
                        dataLength: Array.isArray(data) ? data.length : (data && data.data ? data.data.length : 0),
                        ordersDataLength: Array.isArray(ordersData) ? ordersData.length : 0,
                        sampleOrder: ordersData && ordersData.length > 0 ? ordersData[0] : null
                    });
                })
                .catch(error => {
                    console.error('Error fetching live orders:', error);
                    
                    // Show error message
                    if (mobileLiveOrdersContainer) {
                        mobileLiveOrdersContainer.innerHTML = `
                            <div class="w-full py-8 text-center">
                                <span class="text-red-600">Error loading live orders. Please try again later.</span>
                            </div>
                        `;
                    }
                    if (desktopLiveOrdersContainer) {
                        desktopLiveOrdersContainer.innerHTML = `
                            <div class="col-span-3 py-8 text-center bg-white rounded-2xl shadow-lg">
                                <span class="text-red-600">Error loading live orders. Please try again later.</span>
                            </div>
                        `;
                    }
                });
            }
            
            // Add reject order functionality
            document.addEventListener('click', function(e) {
                if (e.target.closest('.reject-order')) {
                    const button = e.target.closest('.reject-order');
                    const oid = button.getAttribute('data-oid');
                    
                    if (!oid) {
                        alert('Order ID not found');
                        return;
                    }
                    
                    const confirmReject = confirm("Are you sure you want to reject this order?");
                    
                    if (confirmReject) {
                        // Show loading state
                        button.disabled = true;
                        button.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Rejecting...';
                        
                        fetch('https://minitzgo.com/api/cancel_live_order.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-API-Key': 'd0145238fabc26381f3e493ef5103144c6c496280d015bf23cef9ae3b09e87aa'
                            },
                            body: JSON.stringify({
                                product_status: 'rejected',
                                cid: cid,
                                oid: oid
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === true) {
                                // Remove the order card with animation
                                const orderCard = button.closest('.bg-white');
                                if (orderCard) {
                                    orderCard.style.opacity = '0';
                                    orderCard.style.transform = 'translateY(-20px)';
                                    orderCard.style.transition = 'opacity 0.3s, transform 0.3s';
                                    
                                    setTimeout(() => {
                                        orderCard.remove();
                                    }, 300);
                                }
                                
                                // Refresh live orders
                                fetchLiveOrders();
                            } else {
                                alert('Failed to reject order');
                                // Reset button state
                                button.disabled = false;
                                button.innerHTML = '<i class="fas fa-times mr-1"></i>Reject';
                            }
                        })
                        .catch(error => {
                            console.error('Error rejecting order:', error);
                            alert('Error rejecting order. Please try again.');
                            // Reset button state
                            button.disabled = false;
                            button.innerHTML = '<i class="fas fa-times mr-1"></i>Reject';
                        });
                    }
                }
            });
            
            // Initial fetch of live orders
            fetchLiveOrders();
            
            // Refresh live orders every 30 seconds
            setInterval(fetchLiveOrders, 30000);
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
document.addEventListener("DOMContentLoaded", () => {
    let dbUser = localStorage.getItem('dbuser');
    let cid = JSON.parse(dbUser)?.cid;

    let currentPage = 1;
    let mobileCurrentPage = 1;
    let ordersPerPage = 7; // Default to 7 orders per page for desktop (can be 5-9)
    let mobileOrdersPerPage = 5; // Default to 5 orders per page for mobile
    let allOrders = [];
    let filteredOrders = []; // stores filtered orders
    let currentStatusFilter = 'all'; // shared between desktop & mobile

    console.log("cid", cid);

    if (!cid) {
        console.error("CID not found in localStorage");
        document.getElementById('totalOrdersCount').innerHTML = `<td colspan="8">User not logged in</td>`;
        document.getElementById('mobile-orders').innerHTML = `<div class="w-full py-8 text-center text-gray-600">User not logged in. Cannot fetch orders.</div>`;
        return;
    }

    function TotalOrders() {
        const mobileOrdersContainer = document.getElementById('mobile-orders');
        if (mobileOrdersContainer) {
            mobileOrdersContainer.innerHTML = `<div class="flex justify-center py-8"><div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-500"></div> <span class="ml-2 text-gray-600">Loading orders...</span></div>`;
        }

        fetch('https://minitzgo.com/api/fetch_total_orders.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'x-api-key': 'f32e401354228431eeedbe468055f9ed7abcbe3348bf96304e977a2d70af6ab8',
            },
            body: JSON.stringify({ cid: cid }),
        })
        .then((response) => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Network response was not ok');
            }
        })
        .then((data) => {
            console.log("Total Orders Response:", data);
            allOrders = Array.isArray(data) ? [...data].reverse() : [];
            applyFilter(currentStatusFilter); // ensures both desktop & mobile honor same filter
            renderPaginationControls();
        })
        .catch(error => {
            console.error(error);
            document.getElementById('totalOrdersCount').innerHTML = `<td colspan="8">Error loading orders</td>`;
            document.getElementById('mobile-orders').innerHTML = `<div class="w-full py-8 text-center text-red-600">Error loading orders. Please try again later.</div>`;
        });
    }

    function renderPaginationControls() {
        const totalRow = document.getElementById('totalOrdersCount');
        const totalOrders = filteredOrders.length;

        if (totalRow) {
            const totalPages = Math.ceil(totalOrders / ordersPerPage);
            totalRow.innerHTML = `
                <td colspan="8" class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-t shadow-sm">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-600">Show</span>
                            <select id="ordersPerPageSelect" class="text-sm border rounded px-2 py-1">
                                <option value="5" ${ordersPerPage===5?'selected':''}>5</option>
                                <option value="6" ${ordersPerPage===6?'selected':''}>6</option>
                                <option value="7" ${ordersPerPage===7?'selected':''}>7</option>
                                <option value="8" ${ordersPerPage===8?'selected':''}>8</option>
                                <option value="9" ${ordersPerPage===9?'selected':''}>9</option>
                            </select>
                            <span class="text-sm text-gray-600">per page</span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center space-x-1">
                                <button id="prevPageBtn" class="px-3 py-1 bg-gray-200 text-gray-700 rounded-l hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <span id="currentPageDisplay" class="px-3 py-1 bg-white border text-sm">${currentPage} of ${totalPages}</span>
                                <button id="nextPageBtn" class="px-3 py-1 bg-gray-200 text-gray-700 rounded-r hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                            <div class="flex justify-end items-center space-x-2">
                                <span class="text-base font-semibold">Total Orders:</span>
                                <span id="totalOrdersCountSpan" class="text-lg font-bold text-blue-600">${totalOrders}</span>
                            </div>
                        </div>
                    </div>
                </td>
            `;

             // Add event listeners for desktop pagination controls
            document.getElementById('prevPageBtn').addEventListener('click', () => {
                if (currentPage>1) { 
                    currentPage--; 
                    displayDesktopOrders(); 
                    updatePaginationDisplay();
                }
            });
            document.getElementById('nextPageBtn').addEventListener('click', () => {
                if (currentPage < Math.ceil(filteredOrders.length / ordersPerPage)) { 
                    currentPage++; 
                    displayDesktopOrders(); 
                    updatePaginationDisplay()
                }
            });
            document.getElementById('ordersPerPageSelect').addEventListener('change', e => {
                ordersPerPage = parseInt(e.target.value);
                currentPage = 1;
                displayDesktopOrders();
            });

            document.getElementById('statusFilter').addEventListener('change', e => {
            const status = e.target.value.toLowerCase();
            applyFilter(status);
            });

        }
    }

    function updatePaginationDisplay() {
        const totalPages = Math.ceil(filteredOrders.length / ordersPerPage) || 1;
        const currentPageDisplay = document.getElementById('currentPageDisplay');
        const prevBtn = document.getElementById('prevPageBtn');
        const nextBtn = document.getElementById('nextPageBtn');

        if (currentPageDisplay) currentPageDisplay.textContent = `${currentPage} of ${totalPages}`;
        if (prevBtn) prevBtn.disabled = currentPage <= 1;
        if (nextBtn) nextBtn.disabled = currentPage >= totalPages;
    }

    function updateTotalOrdersCount() {
        const totalOrdersSpan = document.getElementById('totalOrdersCountSpan');
        if (totalOrdersSpan) totalOrdersSpan.textContent = filteredOrders.length;
    }
    
    function applyFilter(status) {
        currentStatusFilter = status; // update shared variable
        filteredOrders = status === 'all'
            ? [...allOrders]
            : allOrders.filter(o => (o.product_status || '').toLowerCase() === status);

        currentPage = 1;
        mobileCurrentPage = 1;

        updateTotalOrdersCount();
        displayDesktopOrders();
        displayMobileOrders();

        // --- Sync Desktop Dropdown ---
        const desktopSelect = document.getElementById('statusFilter');
        if (desktopSelect) {
            desktopSelect.value = currentStatusFilter;
        }

        // --- Sync Mobile Buttons ---
        const mobileStatusFilter = document.getElementById('mobileStatusFilter');
        if (mobileStatusFilter) {
            const buttons = mobileStatusFilter.querySelectorAll('.filter-btn');
            buttons.forEach(btn => {
                if (btn.value === currentStatusFilter) {
                    btn.classList.add('bg-blue-500', 'text-white');
                    btn.classList.remove('bg-gray-200', 'text-gray-700');
                } else {
                    btn.classList.remove('bg-blue-500', 'text-white');
                    btn.classList.add('bg-gray-200', 'text-gray-700');
                }
            });
        }
    }

    function displayDesktopOrders() {
        const tbody = document.getElementById('ordersTableBody');
        if (!tbody) return;
        tbody.innerHTML = ''; // Clear existing rows
        if (!filteredOrders.length) {
            tbody.innerHTML = `<tr><td colspan="8" class="text-center py-4">No orders found</td></tr>`;
            return;
        }

        const totalPages = Math.ceil(filteredOrders.length / ordersPerPage);
        const startIndex = (currentPage-1)*ordersPerPage;
        const endIndex = Math.min(startIndex+ordersPerPage, filteredOrders.length);
        const ordersToShow = filteredOrders.slice(startIndex, endIndex);

        ordersToShow.forEach(order => {
            const row = document.createElement('tr');
            row.className = 'hover:bg-gray-50';
            const statusClass = order.product_status==='rejected'?'text-red-500':order.product_status==='delivered'?'text-green-600':'text-yellow-500';
            const isValidImage = (url) => {
                if (!url || typeof url !== 'string') return false;
                try {
                    const u = new URL(url);
                    // Optional: Only allow specific hosts like your domain
                    return u.protocol.startsWith("http");
                } catch {
                    return false;
                }
            };

            const imgSrc = isValidImage(order.product_image)
                ? order.product_image
                : 'assets/img/no-image.png';

            row.innerHTML = `
                <td class="px-4 py-3 font-medium text-gray-900">ODR${order.oid || '#ORD-' + Math.floor(Math.random()*1000)}</td>
                <td class="px-4 py-3">${order.date}</td>
                <td class="px-4 py-3 capitalize">${order.product_title || '—'}</td>
                <td class="px-4 py-3 font-semibold text-green-600">₹${order.product_price || '0'}</td>
                <td class="px-4 py-3"><span class="px-2 py-1 rounded-full text-xs font-semibold ${statusClass}">${order.product_status}</span></td>
                <td class="px-4 py-3">${order.payment_mode || 'N/A'}</td>
                <td class="px-4 py-3"><div class="w-12 h-12 bg-gray-50 rounded-md overflow-hidden"><img src="${imgSrc}" class="w-full h-full object-contain"></div></td>
                <td class="px-4 py-3"><button class="flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white text-xs font-semibold px-3 py-2 rounded-lg shadow-sm transition-all-duration-200">
                <i class="fas fa-exclamation-triangle"></i>Cancel</button></td>
            `;
            // Add class for animation
            row.classList.add('animate-fade-in');

            tbody.appendChild(row);
        });
        updateTotalOrdersCount();
    }

    function displayMobileOrders() {
        const mobileContainer = document.getElementById('mobile-orders');
        if (!mobileContainer) return;
        mobileContainer.innerHTML = '';

        // Add status filtering for mobile

        const mobileStatusFilter = document.getElementById('mobileStatusFilter');
        const filterButtons = mobileStatusFilter.querySelectorAll('.filter-btn');

        let mobileCurrentPage = 1;

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                filterButtons.forEach(btn => {
                    btn.classList.remove('bg-blue-500', 'text-white');
                    btn.classList.add('bg-gray-200', 'text-gray-700');
                });

                button.classList.add('bg-blue-500', 'text-white');
                button.classList.remove('bg-gray-200', 'text-gray-700');

                const status = button.value;
                mobileCurrentPage = 1;
                applyFilter(status);
            });
        });

        if (!filteredOrders.length) {
            mobileContainer.innerHTML = `<div class="w-full py-8 text-center text-gray-600">No orders found</div>`;
            return;
        }

        const totalPages = Math.ceil(filteredOrders.length / mobileOrdersPerPage);
        const startIndex = (mobileCurrentPage-1)*mobileOrdersPerPage;
        const endIndex = Math.min(startIndex+mobileOrdersPerPage, filteredOrders.length);
        const ordersToShow = filteredOrders.slice(startIndex, endIndex);

        ordersToShow.forEach((order, index) => {
            const card = document.createElement('div');
            card.className = 'bg-white rounded-2xl shadow-lg p-4 animate-slide-up';
            card.style.animationDelay = `${index*0.1}s`;
            let statusClass = order.product_status==='rejected'?'text-red-800':order.product_status==='delivered'?'text-green-800':'text-yellow-800';
            let statusBg = order.product_status==='rejected'?'bg-red-100':order.product_status==='delivered'?'bg-green-100':'bg-yellow-100';
            let statusIcon = order.product_status==='rejected'?'<i class="fas fa-times text-red-600"></i>':order.product_status==='delivered'?'<i class="fas fa-check text-green-600"></i>':'<i class="fas fa-clock text-yellow-600"></i>';
            const isValidImage = (url) => {
                if (!url || typeof url !== 'string') return false;
                try {
                    const u = new URL(url);
                    return u.protocol.startsWith("http");
                } catch {
                    return false;
                }
            };

            const imgSrc = isValidImage(order.product_image)
                ? order.product_image
                : 'assets/img/no-image.png';

            card.innerHTML = `
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 ${statusBg} rounded-full flex items-center justify-center">${statusIcon}</div>
                        <div>
                            <p class="font-semibold text-gray-900">ODR${order.oid || '???'}</p>
                            <p class="text-sm text-gray-500 capitalize">${order.product_title || 'Product'}</p>
                        </div>
                    </div>
                    <span class="px-3 py-1 ${statusBg} ${statusClass} text-xs font-medium rounded-full">${order.product_status || 'Unknown'}</span>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-lg font-bold text-gray-900">₹${order.product_price || '0'}</p>
                        <p class="text-xs text-gray-500">${order.date || 'Unknown date'}</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-12 h-12 bg-gray-50 rounded-md overflow-hidden"><img src="${imgSrc}" class="w-full h-full object-contain" /></div>
                        <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-full"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            `;
            mobileContainer.appendChild(card);
        });
    }

    TotalOrders();
});
</script>
 
<script>
    // Implementation of Clickup 
    (function () {
        const token = "pk_94881012_G78HRP3S6J0VII22LCUS2RQ8EUDZFB8L";
        const list_id = 901609643559;

        const reportedErrors = JSON.parse(localStorage.getItem("reportedErrors")) || [];

        function generateErrorKey(message, file = "", line = "", column = "") {
            return `${message}-${file}-${line}-${column}`;
        }

        function storeErrorKey(key) {
            reportedErrors.push(key);
            localStorage.setItem("reportedErrors", JSON.stringify(reportedErrors));
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

            try {
                const res = await fetch(`https://api.clickup.com/api/v2/list/${901609643559}/task`, {
                    method: "POST",
                    headers: {
                        Authorization: token,
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(task)
                });

                const result = await res.json();
                if (res.ok) {
                    console.log("ClickUp task created:", result.id);
                } else {
                    console.error("Failed to create ClickUp task:", result);
                }
            } catch (err) {
                console.error("Internal server error:", err);
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