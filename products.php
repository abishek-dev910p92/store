<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minitzgo Store - Products</title>
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
<body class="bg-gradient-to-br from-purple-50 to-pink-100 min-h-screen">
    <!-- Mobile Header -->
    <header class="md:hidden bg-white shadow-lg border-b sticky top-0 z-50 glass-effect">
        <div class="flex items-center justify-between px-4 py-3">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-box text-white text-sm"></i>
                </div>
                <h1 class="text-lg font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Products</h1>
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
                <a href="products.php" class="bg-gradient-to-r from-purple-500 to-pink-600 text-white group flex items-center px-4 py-3 text-sm font-medium rounded-xl shadow-lg">
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
                        <input type="text" id="desktop-search" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200" placeholder="Search products...">
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

        <!-- Main Products Content -->
        <main class="flex-1 overflow-y-auto mobile-safe-area">
            <div class="p-4 md:p-6">
                <!-- Page Header -->
                <div class="mb-6 animate-fade-in">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Product Management 📦</h1>
                    <p class="text-gray-600">Manage your store inventory and products</p>
                </div>

                <!-- Mobile Search & Filters -->
                <div class="md:hidden mb-4 space-y-3">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" id="mobile-search" class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="Search products...">
                    </div>
                    <div class="flex space-x-2 overflow-x-auto pb-2">
                        <button class="filter-btn active flex-shrink-0 px-4 py-2 bg-purple-500 text-white rounded-full text-sm font-medium" data-category="all">
                            All Products
                        </button>
                        <button class="filter-btn flex-shrink-0 px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium" data-category="electronics">
                            Electronics
                        </button>
                        <button class="filter-btn flex-shrink-0 px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium" data-category="clothing">
                            Clothing
                        </button>
                        <button class="filter-btn flex-shrink-0 px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium" data-category="home">
                            Home & Kitchen
                        </button>
                    </div>
                </div>

                <!-- Desktop Filters -->
                <div class="hidden md:flex md:items-center md:justify-between md:mb-6">
                    <div class="flex space-x-4">
                        <select class="px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500">
                            <option value="">All Categories</option>
                            <option value="electronics">Electronics</option>
                            <option value="clothing">Clothing</option>
                            <option value="home">Home & Kitchen</option>
                        </select>
                        <select class="px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="out_of_stock">Out of Stock</option>
                        </select>
                    </div>
                    <button id="add-product-btn" class="bg-gradient-to-r from-purple-500 to-pink-600 text-white px-6 py-2 rounded-xl hover:shadow-lg transition-all duration-200">
                        <i class="fas fa-plus mr-2"></i>
                        Add Product
                    </button>
                </div>

                <!-- Product Stats Cards (Mobile) -->
                <div class="md:hidden grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl p-4 text-white shadow-lg">
                        <div class="text-center">
                            <p class="text-purple-100 text-sm font-medium">Total Products</p>
                            <p class="text-2xl font-bold total-products-count">0</p>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-pink-500 to-pink-600 rounded-2xl p-4 text-white shadow-lg">
                        <div class="text-center">
                            <p class="text-pink-100 text-sm font-medium">Low Stock</p>
                            <p class="text-2xl font-bold" id="low-stock-count">0</p>
                        </div>
                    </div>
                </div>

                <!-- Mobile Add Product Button -->
                <div class="md:hidden mb-6">
                    <button id="mobile-add-product-btn" class="w-full bg-gradient-to-r from-purple-500 to-pink-600 text-white py-3 rounded-xl font-medium shadow-lg">
                        <i class="fas fa-plus mr-2"></i>
                        Add New Product
                    </button>
                </div>

                <!-- Products Grid -->
                <div id="products-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6">
                    <!-- Products will be dynamically loaded here -->
                    <div class="col-span-full text-center py-10">
                        <div class="animate-pulse flex flex-col items-center">
                            <div class="rounded-full bg-gray-200 h-12 w-12 mb-4"></div>
                            <div class="h-4 bg-gray-200 rounded w-48 mb-2"></div>
                            <div class="h-3 bg-gray-200 rounded w-32"></div>
                        </div>
                        <p class="text-gray-500 mt-4">Loading products...</p>
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
            <a href="products.php" class="flex flex-col items-center py-2 px-1 text-purple-600">
                <i class="fas fa-box text-lg mb-1"></i>
                <span class="text-xs font-medium">Products</span>
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

    <!-- Add Product Modal -->
    <div id="add-product-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl shadow-xl max-w-md w-full max-h-[90vh] overflow-y-auto">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-gray-900">Add New Product</h2>
                        <button id="close-modal" class="p-2 text-gray-400 hover:text-gray-600 rounded-full hover:bg-gray-100">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    
                    <form id="add-product-form" class="space-y-4">
                        <div id="upload-status" class="hidden bg-blue-100 text-blue-700 p-3 rounded-lg mb-4">
                            <p id="status-message">Uploading product...</p>
                        </div>

                        <!-- Store & Client Info (Auto-filled) -->
                        <div class="bg-gray-50 p-3 rounded-lg mb-2">
                            <p class="text-sm text-gray-500 mb-2">Store Information (Auto-filled)</p>
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Client ID</label>
                                    <input type="text" id="cid" class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-100" readonly>
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Client Name</label>
                                    <input type="text" id="client_name" class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-100" readonly>
                                </div>
                                <div class="col-span-2">
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Coordinates</label>
                                    <input type="text" id="cordinates" class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-100" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Product Details -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Product Title</label>
                                <input type="text" id="product_title" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Enter product title">
                            </div>
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Product Name</label>
                                <input type="text" id="product_name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Enter product name">
                            </div>
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                <textarea id="product_discription" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" rows="3" placeholder="Enter product description"></textarea>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                                <input type="number" id="product_price" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="0.00">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Stock</label>
                                <input type="number" id="product_stock" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="0">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                                <select id="category" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    <option value="">Select Category</option>
                                    <option value="electronics">Electronics</option>
                                    <option value="clothing">Clothing</option>
                                    <option value="home">Home & Kitchen</option>
                                    <option value="beauty">Beauty</option>
                                    <option value="toys">Toys</option>
                                    <option value="sports">Sports</option>
                                    <option value="grocery">Grocery</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Brand</label>
                                <input type="text" id="product_brand" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Enter brand name">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Size</label>
                                <input type="text" id="product_size" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="e.g. S, M, L, XL">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Material</label>
                                <input type="text" id="material" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="e.g. Cotton, Plastic">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Ratings</label>
                                <input type="number" id="product_ratings" min="0" max="5" step="0.1" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="0.0 - 5.0">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Offers</label>
                                <input type="text" id="offers" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="e.g. 10% OFF">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Color 1</label>
                                <input type="text" id="product_color1" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="e.g. Red">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Color 2</label>
                                <input type="text" id="product_color2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="e.g. Blue">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Color 3</label>
                                <input type="text" id="product_color3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="e.g. Green">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Color 4</label>
                                <input type="text" id="product_color4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="e.g. Yellow">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Product Images</label>
                            <div class="grid grid-cols-2 gap-3 mb-2">
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Image 1 (Main)</label>
                                    <input type="file" id="product_image1" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Image 2</label>
                                    <input type="file" id="product_image2" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Image 3</label>
                                    <input type="file" id="product_image3" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Image 4</label>
                                    <input type="file" id="product_image4" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex space-x-3 pt-4">
                            <button type="button" id="cancel-btn" class="flex-1 bg-gray-200 text-gray-800 py-2 px-4 rounded-lg font-medium hover:bg-gray-300 transition-colors">
                                Cancel
                            </button>
                            <button type="submit" id="submit-product" class="flex-1 bg-gradient-to-r from-purple-500 to-pink-600 text-white py-2 px-4 rounded-lg font-medium hover:shadow-lg transition-all duration-200">
                                Add Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        console.log('Products page JavaScript loaded');
        // Global variable to store products
        let allProducts = [];
        let filteredProducts = [];
        
        // Fetch products from API
        async function fetchProducts() {
            try {
                // Get client ID from localStorage or use default
                const userData = JSON.parse(localStorage.getItem('dbuser')) || {};
                const cid = userData.cid || '183287';
                
                const response = await fetch('https://minitzgo.com/api/fetch_products.php', { 
                    method: "POST", 
                    headers: { 
                        'Content-Type': 'application/json', 
                        "x-api-key": "2637338988c5f3bbf8d4934dc458b966a21a1d2d56931390f97ce7c4641a2677" 
                    }, 
                    body: JSON.stringify({ 
                        'cid': cid 
                    }) 
                });
                
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                
                const data = await response.json();
                console.log('API Response:', data);
                
                if (data && data.data) {
                    allProducts = data.data;
                    filteredProducts = [...allProducts];
                    renderProducts(filteredProducts);
                    updateProductCount(data.count);
                }
            } catch (error) {
                console.error('Error fetching products:', error);
            }
        }
        
        // Update product count in the UI
        function updateProductCount(count) {
            const totalProductsElements = document.querySelectorAll('.total-products-count');
            totalProductsElements.forEach(el => {
                el.textContent = count || 0;
            });
            
            // Update low stock count
            const lowStockCount = allProducts.filter(product => product.product_stock > 0 && product.product_stock <= 10).length;
            const lowStockElement = document.getElementById('low-stock-count');
            if (lowStockElement) {
                lowStockElement.textContent = lowStockCount;
            }
        }
        
        // Render products to the UI
        function renderProducts(products) {
            const productsContainer = document.getElementById('products-container');
            if (!productsContainer) return;
            
            productsContainer.innerHTML = '';
            
            if (products.length === 0) {
                productsContainer.innerHTML = `
                    <div class="col-span-full text-center py-10">
                        <p class="text-gray-500">No products found</p>
                    </div>
                `;
                return;
            }
            
            products.forEach((product, index) => {
                const stockStatus = product.product_stock > 10 ? 
                    '<span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">In Stock</span>' :
                    product.product_stock > 0 ?
                    '<span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">Low Stock</span>' :
                    '<span class="px-2 py-1 bg-red-100 text-red-800 text-xs font-medium rounded-full">Out of Stock</span>';
                
                const productCard = document.createElement('div');
                productCard.className = 'bg-white rounded-2xl shadow-lg overflow-hidden animate-slide-up hover:shadow-xl transition-all duration-300';
                productCard.style.animationDelay = `${index * 0.1}s`;
                
                productCard.innerHTML = `
                    <div class="relative">
                        <img src="${product.product_image1}" alt="${product.product_name}" class="w-full h-48 object-cover">
                        <div class="absolute top-3 right-3">
                            ${stockStatus}
                        </div>
                         <div class="absolute top-3 left-3 px-3 bg-red-600 text-white text-sm rounded-full"> 
                           
                            
                            PCODE: ${product.pcode}
                         </div>
                    </div>  
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2">${product.product_name}</h3>
                        
                       
                        <p class="text-sm text-gray-600 mb-3 line-clamp-2">${product.product_discription}</p>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-lg font-bold text-purple-600">₹${product.product_price}</span>
                            <span class="text-sm text-gray-500">Stock: ${product.product_stock}</span>
                            <span class="text-xs text-gray-500">${product.product_brand}</span>
                        </div>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm text-black-800 text-xxxt-bold">Category: ${product.category}</span>
                            <span class="text-sm text-gray-500">Added on: ${new Date(product.date).toLocaleDateString()}</span>
                           <b> <span class="text-sm text-blue-500 text-xxxt-bold">Size: ${product.product_size}</span></b>

                        </div>
                        <div class="flex space-x-2">
                            
                            <button class="flex-1 bg-red-100 text-red-700 py-2 px-3 rounded-lg text-sm font-medium hover:bg-red-200 transition-colors" data-pid="${product.pid}">
                                <i class="fas fa-trash mr-1"></i>
                                Delete
                            </button>
                        </div>
                    </div>
                `;
                
                productsContainer.appendChild(productCard);
            });
        }
        
        // Filter functionality
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('.filter-btn').forEach(b => {
                    b.classList.remove('active', 'bg-purple-500', 'text-white');
                    b.classList.add('bg-gray-200', 'text-gray-700');
                });
                
                // Add active class to clicked button
                this.classList.add('active', 'bg-purple-500', 'text-white');
                this.classList.remove('bg-gray-200', 'text-gray-700');
                
                // Filter logic
                const category = this.dataset.category;
                console.log('Filtering by category:', category);
                
                if (category === 'all') {
                    filteredProducts = [...allProducts];
                } else {
                    filteredProducts = allProducts.filter(product => 
                        product.category.toLowerCase() === category.toLowerCase());
                }
                
                renderProducts(filteredProducts);
            });
        });

        // Search functionality
        function handleSearch(searchTerm) {
            console.log('Searching for:', searchTerm);
            if (!searchTerm) {
                filteredProducts = [...allProducts];
            } else {
                const term = searchTerm.toLowerCase();
                filteredProducts = allProducts.filter(product => 
                    product.product_name.toLowerCase().includes(term) || 
                    product.product_discription.toLowerCase().includes(term) ||
                    product.product_brand.toLowerCase().includes(term) ||
                    product.category.toLowerCase().includes(term)
                );
            }
            renderProducts(filteredProducts);
        }

        document.getElementById('mobile-search')?.addEventListener('input', function(e) {
            handleSearch(e.target.value);
        });

        document.getElementById('desktop-search')?.addEventListener('input', function(e) {
            handleSearch(e.target.value);
        });
        
        // Modal functionality - define functions first
        function openModal() {
            const modal = document.getElementById('add-product-modal');
            if (modal) {
                console.log('Opening modal');
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                fillFormFromLocalStorage();
            } else {
                console.error('Modal element not found when trying to open');
            }
        }

        function closeModal() {
            const modal = document.getElementById('add-product-modal');
            if (modal) {
                console.log('Closing modal');
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
                const form = document.getElementById('add-product-form');
                if (form) form.reset();
                const uploadStatus = document.getElementById('upload-status');
                if (uploadStatus) uploadStatus.classList.add('hidden');
            } else {
                console.error('Modal element not found when trying to close');
            }
        }

        // Delete product function
        async function deleteProduct(pid) {
            try {
                const response = await fetch('https://minitzgo.com/api/delete_products.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'x-api-key': 'afb5678cd20a7bc0eabcc16ddfab114c2ae58321766974b55f03bfbb9a19c55b'
                    },
                    body: JSON.stringify({ pid: pid })
                });

                const result = await response.json();
                if (response.ok) {
                    // Refresh products list after successful deletion
                    fetchProducts();
                } else {
                    throw new Error(result.message || 'Failed to delete product');
                }
            } catch (error) {
                console.error('Error deleting product:', error);
                alert('Failed to delete product. Please try again.');
            }
        }

        // Initialize everything when DOM is fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM fully loaded');
            
            // Initialize products
            fetchProducts();
            initializeAddProductForm();

            // Add event delegation for delete buttons
            document.addEventListener('click', function(e) {
                const deleteBtn = e.target.closest('button[data-pid]');
                if (deleteBtn) {
                    const pid = deleteBtn.dataset.pid;
                    if (confirm('Are you sure you want to delete this product?')) {
                        deleteProduct(pid);
                    }
                }
            });
            
            // Get modal elements
            const modal = document.getElementById('add-product-modal');
            const addProductBtn = document.getElementById('add-product-btn');
            const mobileAddProductBtn = document.getElementById('mobile-add-product-btn');
            const closeModalBtn = document.getElementById('close-modal');
            const cancelBtn = document.getElementById('cancel-btn');
            
            // Add debug logging
            console.log('Modal elements:', { 
                modal: modal, 
                addProductBtn: addProductBtn, 
                mobileAddProductBtn: mobileAddProductBtn, 
                closeModalBtn: closeModalBtn, 
                cancelBtn: cancelBtn 
            });
            
            // Set up event listeners
            if (addProductBtn) {
                console.log('Adding click event to desktop Add Product button');
                addProductBtn.addEventListener('click', function(e) {
                    console.log('Desktop Add Product button clicked');
                    openModal();
                });
            } else {
                console.error('Desktop Add Product button not found');
            }
            
            if (mobileAddProductBtn) {
                console.log('Adding click event to mobile Add Product button');
                mobileAddProductBtn.addEventListener('click', function(e) {
                    console.log('Mobile Add Product button clicked');
                    openModal();
                });
            } else {
                console.error('Mobile Add Product button not found');
            }
            
            if (closeModalBtn) {
                closeModalBtn.addEventListener('click', closeModal);
            } else {
                console.error('Close modal button not found');
            }
            
            if (cancelBtn) {
                cancelBtn.addEventListener('click', closeModal);
            } else {
                console.error('Cancel button not found');
            }
            
            // Close modal when clicking outside
            if (modal) {
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        closeModal();
                    }
                });
            }
        });

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

        // Function to upload image and return its URL
        async function uploadImage(file) {
            // Create a FormData object to send the file
            const formData = new FormData();
            
            // Generate a timestamp and safe filename for consistency
            const timestamp = new Date().getTime();
            const safeName = file.name.replace(/[^a-zA-Z0-9.]/g, '_');
            const newFilename = `${timestamp}_${safeName}`;
            
            // Rename the file before uploading
            const renamedFile = new File([file], newFilename, { type: file.type });
            
            // Add the file to the form data
            formData.append('image', renamedFile);
            
            try {
                // Upload to image upload API
                const uploadResponse = await fetch('https://minitzgo.com/upload_image.php', {
                    method: 'POST',
                    headers: {
                        'x-api-key': 'fabfa7809edb9a407986de6180d96fc753769f116bc70b8a7681af98067150ed'
                    },
                    body: formData
                });
                
                if (!uploadResponse.ok) {
                    const errorText = await uploadResponse.text();
                    console.error('Upload response not OK:', errorText);
                    throw new Error('Image upload failed - server returned an error');
                }
                
                const uploadResult = await uploadResponse.json();
                console.log('Upload result:', uploadResult);
                
                if (uploadResult.success && uploadResult.url) {
                    return uploadResult.url;
                } else {
                    throw new Error('Image upload failed - no URL returned');
                }
            } catch (error) {
                console.error('Error uploading image:', error);
                throw error;
            }
        }

        // Function to initialize the add product form
        function initializeAddProductForm() {
            const form = document.getElementById('add-product-form');
            const statusElement = document.getElementById('status-message');
            const uploadStatusDiv = document.getElementById('upload-status');

            if (!form) return;

            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                // Show upload status
                statusElement.textContent = 'Uploading product...';
                uploadStatusDiv.classList.remove('hidden');
                uploadStatusDiv.classList.remove('bg-red-100', 'text-red-700');
                uploadStatusDiv.classList.add('bg-blue-100', 'text-blue-700');
                
                try {
                    // Generate a random product code
                    const pcode = Math.floor(Math.random() * 1000000).toString().padStart(6, '0');
                    
                    // Upload images if provided
                    const imageUrls = {};
                    const imageFields = ['product_image1', 'product_image2', 'product_image3', 'product_image4'];
                    
                    for (let i = 0; i < imageFields.length; i++) {
                        const fileInput = document.getElementById(imageFields[i]);
                        if (fileInput && fileInput.files && fileInput.files[0]) {
                            statusElement.textContent = `Uploading image ${i+1}...`;
                            try {
                                const url = await uploadImage(fileInput.files[0]);
                                imageUrls[imageFields[i]] = url;
                            } catch (error) {
                                console.error(`Error uploading ${imageFields[i]}:`, error);
                                statusElement.textContent = `Error uploading image ${i+1}. Please try again.`;
                                uploadStatusDiv.classList.remove('bg-blue-100', 'text-blue-700');
                                uploadStatusDiv.classList.add('bg-red-100', 'text-red-700');
                                return;
                            }
                        }
                    }
                    
                    // Prepare API data
                    const apiData = {
                        category: document.getElementById('category').value,
                        offers: document.getElementById('offers').value,
                        cid: document.getElementById('cid').value,
                        client_name: document.getElementById('client_name').value,
                        product_discription: document.getElementById('product_discription').value,
                        product_title: document.getElementById('product_title').value,
                        product_name: document.getElementById('product_name').value,
                        product_brand: document.getElementById('product_brand').value,
                        product_price: document.getElementById('product_price').value,
                        product_size: document.getElementById('product_size').value,
                        material: document.getElementById('material').value,
                        cordinates: document.getElementById('cordinates').value,
                        product_stock: document.getElementById('product_stock').value,
                        product_ratings: document.getElementById('product_ratings').value,
                        product_color1: document.getElementById('product_color1').value,
                        product_color2: document.getElementById('product_color2').value,
                        product_color3: document.getElementById('product_color3').value,
                        product_color4: document.getElementById('product_color4').value,
                        pcode: pcode.toString(),
                        ...imageUrls
                    };
                    
                    // Send to API
                    statusElement.textContent = 'Submitting product data...';
                    const apiKey = 'fabfa7809edb9a407986de6180d96fc753769f116bc70b8a7681af98067150ed';
                    const endpoint = 'https://minitzgo.com/api/post_products.php';
                    
                    const response = await fetch(endpoint, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'x-api-key': apiKey
                        },
                        body: JSON.stringify(apiData)
                    });
                    
                    const result = await response.json();
                    
                    if (response.ok) {
                        statusElement.textContent = 'Product uploaded successfully!';
                        uploadStatusDiv.classList.remove('bg-blue-100', 'text-blue-700');
                        uploadStatusDiv.classList.add('bg-green-100', 'text-green-700');
                        
                        // Reset form and refresh products after 2 seconds
                        setTimeout(() => {
                            form.reset();
                            closeModal();
                            fetchProducts(); // Refresh products list
                        }, 2000);
                    } else {
                        throw new Error(result.message || 'Failed to upload product');
                    }
                } catch (error) {
                    console.error('Error adding product:', error);
                    statusElement.textContent = error.message || 'An error occurred. Please try again.';
                    uploadStatusDiv.classList.remove('bg-blue-100', 'text-blue-700');
                    uploadStatusDiv.classList.add('bg-red-100', 'text-red-700');
                }
            });
        }

        // Function to fill form fields from localStorage
        function fillFormFromLocalStorage() {
            try {
                const userData = JSON.parse(localStorage.getItem('dbuser')) || {};
                
                // Fill client information fields
                if (userData.cid) {
                    document.getElementById('cid').value = userData.cid;
                }
                
                if (userData.first_name && userData.last_name) {
                    document.getElementById('client_name').value = `${userData.first_name} ${userData.last_name}`;
                } else if (userData.name) {
                    document.getElementById('client_name').value = userData.name;
                }
                
                // Try to get coordinates from localStorage
                const coordinates = localStorage.getItem('storeCoordinates') || '';
                document.getElementById('cordinates').value = userData.coordinates; 
                
                console.log('Form filled with user data:', userData);
            } catch (error) {
                console.error('Error filling form from localStorage:', error);
            }
        }
    </script>


    <script>
        // Implementation of Clickup
        (function (){
            const token = "pk_94881012_G78HRP3S6J0VII22LCUS2RQ8EUDZFB8L" 
            const list_id = 901609666078;

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
                    const res = await fetch(`https://api.clickup.com/api/v2/list/${901609666078}/task`, {
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