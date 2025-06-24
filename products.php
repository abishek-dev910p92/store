<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minitzgo Store - Products</title>
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
                            <p class="text-2xl font-bold">156</p>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-pink-500 to-pink-600 rounded-2xl p-4 text-white shadow-lg">
                        <div class="text-center">
                            <p class="text-pink-100 text-sm font-medium">Low Stock</p>
                            <p class="text-2xl font-bold">8</p>
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
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6">
                    <!-- Product Card 1 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden animate-slide-up hover:shadow-xl transition-all duration-300">
                        <div class="relative">
                            <img src="https://via.placeholder.com/300x200?text=Wireless+Headphones" alt="Wireless Headphones" class="w-full h-48 object-cover">
                            <div class="absolute top-3 right-3">
                                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">In Stock</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 mb-2">Wireless Headphones</h3>
                            <p class="text-sm text-gray-600 mb-3 line-clamp-2">High-quality wireless headphones with noise cancellation</p>
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-lg font-bold text-purple-600">$99.99</span>
                                <span class="text-sm text-gray-500">Stock: 25</span>
                            </div>
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-purple-100 text-purple-700 py-2 px-3 rounded-lg text-sm font-medium hover:bg-purple-200 transition-colors">
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

                    <!-- Product Card 2 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden animate-slide-up hover:shadow-xl transition-all duration-300" style="animation-delay: 0.1s">
                        <div class="relative">
                            <img src="https://via.placeholder.com/300x200?text=Smart+Watch" alt="Smart Watch" class="w-full h-48 object-cover">
                            <div class="absolute top-3 right-3">
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">Low Stock</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 mb-2">Smart Watch</h3>
                            <p class="text-sm text-gray-600 mb-3 line-clamp-2">Feature-rich smartwatch with health monitoring</p>
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-lg font-bold text-purple-600">$199.99</span>
                                <span class="text-sm text-gray-500">Stock: 5</span>
                            </div>
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-purple-100 text-purple-700 py-2 px-3 rounded-lg text-sm font-medium hover:bg-purple-200 transition-colors">
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

                    <!-- Product Card 3 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden animate-slide-up hover:shadow-xl transition-all duration-300" style="animation-delay: 0.2s">
                        <div class="relative">
                            <img src="https://via.placeholder.com/300x200?text=Coffee+Mug" alt="Coffee Mug" class="w-full h-48 object-cover">
                            <div class="absolute top-3 right-3">
                                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">In Stock</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 mb-2">Premium Coffee Mug</h3>
                            <p class="text-sm text-gray-600 mb-3 line-clamp-2">Premium ceramic coffee mug with elegant design</p>
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-lg font-bold text-purple-600">$12.99</span>
                                <span class="text-sm text-gray-500">Stock: 50</span>
                            </div>
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-purple-100 text-purple-700 py-2 px-3 rounded-lg text-sm font-medium hover:bg-purple-200 transition-colors">
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

                    <!-- Product Card 4 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden animate-slide-up hover:shadow-xl transition-all duration-300" style="animation-delay: 0.3s">
                        <div class="relative">
                            <img src="https://via.placeholder.com/300x200?text=Laptop+Stand" alt="Laptop Stand" class="w-full h-48 object-cover">
                            <div class="absolute top-3 right-3">
                                <span class="px-2 py-1 bg-red-100 text-red-800 text-xs font-medium rounded-full">Out of Stock</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 mb-2">Adjustable Laptop Stand</h3>
                            <p class="text-sm text-gray-600 mb-3 line-clamp-2">Ergonomic laptop stand with adjustable height</p>
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-lg font-bold text-purple-600">$49.99</span>
                                <span class="text-sm text-gray-500">Stock: 0</span>
                            </div>
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-purple-100 text-purple-700 py-2 px-3 rounded-lg text-sm font-medium hover:bg-purple-200 transition-colors">
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
                    
                    <form class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Product Name</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Enter product name">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" rows="3" placeholder="Enter product description"></textarea>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                                <input type="number" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="0.00">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Stock</label>
                                <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="0">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                                <option value="">Select Category</option>
                                <option value="electronics">Electronics</option>
                                <option value="clothing">Clothing</option>
                                <option value="home">Home & Kitchen</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Product Image</label>
                            <input type="file" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                        </div>
                        
                        <div class="flex space-x-3 pt-4">
                            <button type="button" id="cancel-btn" class="flex-1 bg-gray-200 text-gray-800 py-2 px-4 rounded-lg font-medium hover:bg-gray-300 transition-colors">
                                Cancel
                            </button>
                            <button type="submit" class="flex-1 bg-gradient-to-r from-purple-500 to-pink-600 text-white py-2 px-4 rounded-lg font-medium hover:shadow-lg transition-all duration-200">
                                Add Product
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
                    b.classList.remove('active', 'bg-purple-500', 'text-white');
                    b.classList.add('bg-gray-200', 'text-gray-700');
                });
                
                // Add active class to clicked button
                this.classList.add('active', 'bg-purple-500', 'text-white');
                this.classList.remove('bg-gray-200', 'text-gray-700');
                
                // Filter logic would go here
                const category = this.dataset.category;
                console.log('Filtering by category:', category);
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
        const modal = document.getElementById('add-product-modal');
        const addProductBtn = document.getElementById('add-product-btn');
        const mobileAddProductBtn = document.getElementById('mobile-add-product-btn');
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

        addProductBtn?.addEventListener('click', openModal);
        mobileAddProductBtn?.addEventListener('click', openModal);
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
</body>
</html>