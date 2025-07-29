<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications - Minitzgo Store</title>
    <link rel="stylesheet" href="assets/css/style.css">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="theme-color" content="#4F46E5">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.3s ease-out',
                        'pulse-slow': 'pulse 3s infinite',
                        'ring': 'ring 2s infinite',
                        'shake': 'shake 0.5s ease-in-out',
                        'bounce-in': 'bounceIn 0.6s ease-out',
                        'scale-in': 'scaleIn 0.3s ease-out'
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
        @keyframes ring {
            0% { transform: rotate(0deg); }
            10% { transform: rotate(10deg); }
            20% { transform: rotate(-10deg); }
            30% { transform: rotate(10deg); }
            40% { transform: rotate(-10deg); }
            50% { transform: rotate(0deg); }
            100% { transform: rotate(0deg); }
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); opacity: 1; }
        }
        @keyframes scaleIn {
            from { transform: scale(0.9); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        
        /* Mobile app-like styles */
        body {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-tap-highlight-color: transparent;
            overscroll-behavior: contain;
        }
        
        /* Safe area support for iOS */
        @supports (padding: max(0px)) {
            .safe-top { padding-top: max(1rem, env(safe-area-inset-top)); }
            .safe-bottom { padding-bottom: max(1rem, env(safe-area-inset-bottom)); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-purple-50 min-h-screen pb-20 md:pb-0 safe-bottom">
    <!-- Mobile Header -->
    <div class="md:hidden bg-white shadow-lg border-b border-gray-200 fixed top-0 left-0 right-0 z-50 safe-top">
        <div class="flex items-center justify-between px-4 py-3">
            <div class="flex items-center space-x-3">
                <button onclick="toggleMobileMenu()" class="p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                    <i class="fas fa-bars text-gray-600"></i>
                </button>
                <h1 class="text-lg font-bold bg-gradient-to-r from-indigo-600 to-blue-600 bg-clip-text text-transparent">Notifications</h1>
            </div>
            <div class="flex items-center space-x-2">
                <div class="relative">
                    <span class="bg-red-500 text-white text-xs rounded-full px-2 py-1 animate-pulse">3 new</span>
                </div>
                <button onclick="refreshNotifications()" class="p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                    <i class="fas fa-sync-alt text-gray-600"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="flex h-screen pt-16 md:pt-0">
        <!-- Desktop Sidebar -->
        <div class="hidden md:flex md:w-64 md:flex-col">
            <div class="flex flex-col flex-grow pt-5 overflow-y-auto bg-white border-r shadow-lg">
                <div class="flex items-center flex-shrink-0 px-4">
                    <h1 class="text-xl font-bold bg-gradient-to-r from-indigo-600 to-blue-600 bg-clip-text text-transparent">Minitzgo Store</h1>
                </div>
                <div class="mt-8 flex-grow flex flex-col">
                    <nav class="flex-1 px-2 space-y-1">
                        <a href="dashboard.php" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-all duration-200">
                            <i class="fas fa-tachometer-alt mr-3 text-gray-400"></i>
                            Dashboard
                        </a>
                        <a href="orders.php" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-all duration-200">
                            <i class="fas fa-shopping-cart mr-3 text-gray-400"></i>
                            Orders
                        </a>
                        <a href="products.php" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-all duration-200">
                            <i class="fas fa-box mr-3 text-gray-400"></i>
                            Products
                        </a>
                        <a href="users.php" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-all duration-200">
                            <i class="fas fa-users mr-3 text-gray-400"></i>
                            Users
                        </a>
                        <a href="billing.php" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-all duration-200">
                            <i class="fas fa-credit-card mr-3 text-gray-400"></i>
                            Billing
                        </a>
                        <a href="notifications.php" class="bg-gradient-to-r from-indigo-500 to-blue-600 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md shadow-md">
                            <i class="fas fa-bell mr-3 animate-ring"></i>
                            Notifications
                            <span class="ml-auto bg-red-500 text-white text-xs rounded-full px-2 py-1 animate-pulse">3</span>
                        </a>
                        <a href="profile.php" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-all duration-200">
                            <i class="fas fa-user mr-3 text-gray-400"></i>
                            Profile
                        </a>
                    </nav>
                </div>
                <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
                    <a href="logout.php" class="flex-shrink-0 w-full group block">
                        <div class="flex items-center">
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Sign out</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-1 overflow-hidden">
            <div class="flex-1 relative z-0 flex overflow-hidden">
                <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
                    <!-- Page header (Desktop only) -->
                    <div class="hidden md:block bg-white shadow-sm border-b border-gray-200">
                        <div class="px-4 sm:px-6 lg:px-8">
                            <div class="py-6 md:flex md:items-center md:justify-between">
                                <div class="flex-1 min-w-0">
                                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate animate-fade-in">
                                        <i class="fas fa-bell mr-3 text-purple-500 animate-ring"></i>
                                        Notifications
                                        <span class="ml-2 bg-red-500 text-white text-sm rounded-full px-3 py-1 animate-pulse">3 new</span>
                                    </h2>
                                    <p class="mt-1 text-sm text-gray-500">Stay updated with your store activities</p>
                                </div>
                                <div class="mt-4 flex md:mt-0 md:ml-4 space-x-2">
                                    <button onclick="markAllRead()" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-4 py-2 rounded-lg shadow-md transition-all duration-200 transform hover:scale-105">
                                        <i class="fas fa-check-double mr-2"></i>
                                        Mark All Read
                                    </button>
                                    <button onclick="refreshNotifications()" class="bg-gradient-to-r from-indigo-500 to-blue-600 hover:from-indigo-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg shadow-md transition-all duration-200 transform hover:scale-105">
                                        <i class="fas fa-sync-alt mr-2"></i>
                                        Refresh
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Cards -->
                    <div class="mx-4 mt-6 grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-4 animate-slide-up">
                        <div class="bg-gradient-to-r from-red-500 to-red-600 rounded-xl shadow-lg p-4 md:p-6 text-white">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-exclamation-circle text-xl md:text-2xl opacity-80 animate-shake"></i>
                                </div>
                                <div class="ml-3 md:ml-4">
                                    <p class="text-xs md:text-sm font-medium opacity-80">Unread</p>
                                    <p class="text-xl md:text-2xl font-bold">3</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl shadow-lg p-4 md:p-6 text-white">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-calendar-day text-xl md:text-2xl opacity-80"></i>
                                </div>
                                <div class="ml-3 md:ml-4">
                                    <p class="text-xs md:text-sm font-medium opacity-80">Today</p>
                                    <p class="text-xl md:text-2xl font-bold">4</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-xl shadow-lg p-4 md:p-6 text-white">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-calendar-week text-xl md:text-2xl opacity-80"></i>
                                </div>
                                <div class="ml-3 md:ml-4">
                                    <p class="text-xs md:text-sm font-medium opacity-80">This Week</p>
                                    <p class="text-xl md:text-2xl font-bold">6</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl shadow-lg p-4 md:p-6 text-white">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-list text-xl md:text-2xl opacity-80"></i>
                                </div>
                                <div class="ml-3 md:ml-4">
                                    <p class="text-xs md:text-sm font-medium opacity-80">Total</p>
                                    <p class="text-xl md:text-2xl font-bold">6</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Filters -->
                    <div class="bg-white mx-4 mt-6 rounded-xl shadow-lg border border-gray-100 animate-slide-up">
                        <div class="p-4 md:p-6">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Notification Type</label>
                                    <select id="typeFilter" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200">
                                        <option value="">All Types</option>
                                        <option value="order">Orders</option>
                                        <option value="payment">Payments</option>
                                        <option value="inventory">Inventory</option>
                                        <option value="system">System</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                    <select id="statusFilter" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200">
                                        <option value="">All Status</option>
                                        <option value="unread">Unread</option>
                                        <option value="read">Read</option>
                                    </select>
                                </div>
                                <div class="flex items-end space-x-2">
                                    <button onclick="applyFilters()" class="bg-gradient-to-r from-indigo-500 to-blue-600 hover:from-indigo-600 hover:to-blue-700 text-white px-6 py-2 rounded-lg shadow-md transition-all duration-200 transform hover:scale-105">
                                        <i class="fas fa-filter mr-2"></i>
                                        Filter
                                    </button>
                                    <button onclick="clearFilters()" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition-all duration-200">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notifications List -->
                    <div class="mx-4 mt-6 mb-8 bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden animate-slide-up">
                        <div id="notificationsList" class="divide-y divide-gray-200">
                            <!-- Notifications will be populated by JavaScript -->
                        </div>
                    </div>
                    
                    <!-- Empty state template (hidden by default) -->
                    <template id="emptyNotificationsTemplate">
                        <div class="p-8 text-center">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-100 text-blue-500 mb-4">
                                <i class="fas fa-bell-slash text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">No notifications</h3>
                            <p class="mt-2 text-sm text-gray-500">You don't have any notifications at the moment.</p>
                        </div>
                    </template>
                    
                    <!-- Notification item template (hidden by default) -->
                    <template id="notificationItemTemplate">
                        <div class="p-4 md:p-6 hover:bg-gray-50 transition-colors duration-200 notification-item">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center notification-icon">
                                        <i class="fas notification-icon-class"></i>
                                    </div>
                                </div>
                                <div class="ml-3 md:ml-4 flex-1">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-medium notification-title">
                                            <!-- Title will be inserted here -->
                                        </h3>
                                        <p class="text-xs text-gray-500 notification-time">
                                            <!-- Time will be inserted here -->
                                        </p>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-600 notification-message">
                                        <!-- Message will be inserted here -->
                                    </p>
                                    
                                    <p class="mt-1 text-xs text-gray-500 notification-order-info">
                                        <!-- Order info will be inserted here -->
                                    </p>
                                    
                                    <div class="mt-3 flex flex-wrap items-center gap-2">
                                        <button class="mark-read-btn text-xs bg-blue-100 hover:bg-blue-200 text-blue-800 px-2 py-1 rounded-md transition-colors duration-200 active:scale-95">
                                            <i class="fas fa-check mr-1"></i> Mark as Read
                                        </button>
                                        
                                        <button class="view-order-btn text-xs bg-green-100 hover:bg-green-200 text-green-800 px-2 py-1 rounded-md transition-colors duration-200 active:scale-95">
                                            <i class="fas fa-eye mr-1"></i> View Order
                                        </button>
                                        
                                        <button class="delete-btn text-xs bg-red-100 hover:bg-red-200 text-red-800 px-2 py-1 rounded-md transition-colors duration-200 active:scale-95">
                                            <i class="fas fa-trash-alt mr-1"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </main>
            </div>
        </div>
    </div>

    <!-- Mobile Footer Navigation -->
    <div class="md:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 z-50 safe-area-bottom">
        <div class="grid grid-cols-5 h-16">
            <a href="dashboard.php" class="flex flex-col items-center justify-center text-gray-400 hover:text-indigo-600 transition-colors duration-200 active:scale-95">
                <i class="fas fa-home text-lg mb-1"></i>
                <span class="text-xs">Home</span>
            </a>
            <a href="orders.php" class="flex flex-col items-center justify-center text-gray-400 hover:text-indigo-600 transition-colors duration-200 active:scale-95">
                <i class="fas fa-shopping-bag text-lg mb-1"></i>
                <span class="text-xs">Orders</span>
            </a>
            <a href="products.php" class="flex flex-col items-center justify-center text-gray-400 hover:text-indigo-600 transition-colors duration-200 active:scale-95">
                <i class="fas fa-box text-lg mb-1"></i>
                <span class="text-xs">Products</span>
            </a>
            <a href="notifications.php" class="flex flex-col items-center justify-center text-indigo-600 transition-colors duration-200 active:scale-95">
                <div class="relative">
                    <i class="fas fa-bell text-lg mb-1"></i>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                </div>
                <span class="text-xs">Alerts</span>
            </a>
            <a href="profile.php" class="flex flex-col items-center justify-center text-gray-400 hover:text-indigo-600 transition-colors duration-200 active:scale-95">
                <i class="fas fa-user text-lg mb-1"></i>
                <span class="text-xs">Profile</span>
            </a>
        </div>
    </div>

    <script>
        // Demo notifications data
        const demoNotifications = [
            {
                id: 1,
                title: 'New Order Received',
                message: 'Order #12345 has been placed by John Doe',
                type: 'order',
                priority: 'high',
                is_read: false,
                order_id: '12345',
                customer_name: 'John Doe',
                created_at: new Date().toISOString()
            },
            {
                id: 2,
                title: 'Payment Confirmed',
                message: 'Payment of $299.99 has been confirmed for order #12344',
                type: 'payment',
                priority: 'medium',
                is_read: false,
                order_id: '12344',
                customer_name: 'Jane Smith',
                created_at: new Date(Date.now() - 3600000).toISOString()
            },
            {
                id: 3,
                title: 'Low Stock Alert',
                message: 'Product "Wireless Headphones" is running low on stock (5 remaining)',
                type: 'inventory',
                priority: 'high',
                is_read: false,
                order_id: null,
                customer_name: null,
                created_at: new Date(Date.now() - 7200000).toISOString()
            },
            {
                id: 4,
                title: 'Order Shipped',
                message: 'Order #12343 has been shipped and is on its way',
                type: 'order',
                priority: 'low',
                is_read: true,
                order_id: '12343',
                customer_name: 'Mike Johnson',
                created_at: new Date(Date.now() - 86400000).toISOString()
            },
            {
                id: 5,
                title: 'System Maintenance',
                message: 'Scheduled maintenance will occur tonight from 2-4 AM',
                type: 'system',
                priority: 'medium',
                is_read: true,
                order_id: null,
                customer_name: null,
                created_at: new Date(Date.now() - 172800000).toISOString()
            },
            {
                id: 6,
                title: 'New Customer Registration',
                message: 'A new customer has registered: Sarah Wilson',
                type: 'system',
                priority: 'low',
                is_read: true,
                order_id: null,
                customer_name: 'Sarah Wilson',
                created_at: new Date(Date.now() - 259200000).toISOString()
            }
        ];

        let currentNotifications = [...demoNotifications];
        let currentFilter = { type: '', status: '' };

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            renderNotifications();
            updateStats();
        });

        function renderNotifications() {
            const container = document.getElementById('notificationsList');
            const filteredNotifications = filterNotifications();
            
            if (filteredNotifications.length === 0) {
                const emptyTemplate = document.getElementById('emptyNotificationsTemplate');
                container.innerHTML = emptyTemplate.innerHTML;
                return;
            }
            
            container.innerHTML = '';
            
            filteredNotifications.forEach(notification => {
                const template = document.getElementById('notificationItemTemplate');
                const clone = template.content.cloneNode(true);
                
                // Set notification data
                const item = clone.querySelector('.notification-item');
                if (!notification.is_read) {
                    item.classList.add('bg-blue-50');
                }
                
                // Set icon and color based on type
                const iconContainer = clone.querySelector('.notification-icon');
                const iconElement = clone.querySelector('.notification-icon-class');
                
                switch(notification.type) {
                    case 'order':
                        iconContainer.classList.add('bg-blue-100');
                        iconElement.classList.add('fa-shopping-bag', 'text-blue-600');
                        break;
                    case 'payment':
                        iconContainer.classList.add('bg-green-100');
                        iconElement.classList.add('fa-credit-card', 'text-green-600');
                        break;
                    case 'inventory':
                        iconContainer.classList.add('bg-yellow-100');
                        iconElement.classList.add('fa-box', 'text-yellow-600');
                        break;
                    default:
                        iconContainer.classList.add('bg-purple-100');
                        iconElement.classList.add('fa-cog', 'text-purple-600');
                }
                
                // Set title
                const titleElement = clone.querySelector('.notification-title');
                titleElement.innerHTML = notification.title;
                if (!notification.is_read) {
                    titleElement.classList.add('text-blue-800', 'font-semibold');
                    titleElement.innerHTML += ' <span class="ml-2 bg-blue-500 text-white text-xs rounded-full px-2 py-0.5 animate-pulse">New</span>';
                } else {
                    titleElement.classList.add('text-gray-900');
                }
                
                // Set time
                const timeElement = clone.querySelector('.notification-time');
                timeElement.textContent = formatTime(notification.created_at);
                
                // Set message
                const messageElement = clone.querySelector('.notification-message');
                messageElement.textContent = notification.message;
                
                // Set order info
                const orderInfoElement = clone.querySelector('.notification-order-info');
                if (notification.order_id) {
                    orderInfoElement.textContent = `Order: #${notification.order_id} | Customer: ${notification.customer_name}`;
                } else {
                    orderInfoElement.style.display = 'none';
                }
                
                // Set up buttons
                const markReadBtn = clone.querySelector('.mark-read-btn');
                const viewOrderBtn = clone.querySelector('.view-order-btn');
                const deleteBtn = clone.querySelector('.delete-btn');
                
                if (notification.is_read) {
                    markReadBtn.style.display = 'none';
                } else {
                    markReadBtn.onclick = () => markAsRead(notification.id);
                }
                
                if (notification.order_id) {
                    viewOrderBtn.onclick = () => viewOrder(notification.order_id);
                } else {
                    viewOrderBtn.style.display = 'none';
                }
                
                deleteBtn.onclick = () => deleteNotification(notification.id);
                
                container.appendChild(clone);
            });
        }

        function filterNotifications() {
            return currentNotifications.filter(notification => {
                if (currentFilter.type && notification.type !== currentFilter.type) {
                    return false;
                }
                if (currentFilter.status) {
                    if (currentFilter.status === 'read' && !notification.is_read) {
                        return false;
                    }
                    if (currentFilter.status === 'unread' && notification.is_read) {
                        return false;
                    }
                }
                return true;
            });
        }

        function updateStats() {
            const unreadCount = currentNotifications.filter(n => !n.is_read).length;
            const today = new Date();
            const todayCount = currentNotifications.filter(n => {
                const notifDate = new Date(n.created_at);
                return notifDate.toDateString() === today.toDateString();
            }).length;
            
            const weekAgo = new Date(Date.now() - 7 * 24 * 60 * 60 * 1000);
            const weekCount = currentNotifications.filter(n => {
                const notifDate = new Date(n.created_at);
                return notifDate >= weekAgo;
            }).length;
            
            // Update stats cards (static for demo)
            // In a real app, you would update the DOM elements here
        }

        function formatTime(dateString) {
            const date = new Date(dateString);
            const now = new Date();
            const diff = now - date;
            
            if (diff < 60000) {
                return 'Just now';
            } else if (diff < 3600000) {
                return Math.floor(diff / 60000) + 'm ago';
            } else if (diff < 86400000) {
                return Math.floor(diff / 3600000) + 'h ago';
            } else {
                return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
            }
        }

        function markAsRead(notificationId) {
            const notification = currentNotifications.find(n => n.id === notificationId);
            if (notification) {
                notification.is_read = true;
                renderNotifications();
                updateStats();
                showToast('Notification marked as read');
            }
        }

        function markAllRead() {
            currentNotifications.forEach(n => n.is_read = true);
            renderNotifications();
            updateStats();
            showToast('All notifications marked as read');
        }

        function deleteNotification(notificationId) {
            if (confirm('Are you sure you want to delete this notification?')) {
                currentNotifications = currentNotifications.filter(n => n.id !== notificationId);
                renderNotifications();
                updateStats();
                showToast('Notification deleted');
            }
        }

        function viewOrder(orderId) {
            showToast(`Viewing order #${orderId}`);
            // In a real app, navigate to order details
            // window.location.href = 'orders.php?order_id=' + orderId;
        }

        function applyFilters() {
            const typeFilter = document.getElementById('typeFilter').value;
            const statusFilter = document.getElementById('statusFilter').value;
            
            currentFilter = { type: typeFilter, status: statusFilter };
            renderNotifications();
            showToast('Filters applied');
        }

        function clearFilters() {
            document.getElementById('typeFilter').value = '';
            document.getElementById('statusFilter').value = '';
            currentFilter = { type: '', status: '' };
            renderNotifications();
            showToast('Filters cleared');
        }

        function refreshNotifications() {
            // Simulate refresh with a loading state
            const refreshBtn = event.target.closest('button');
            const icon = refreshBtn.querySelector('i');
            icon.classList.add('fa-spin');
            
            setTimeout(() => {
                icon.classList.remove('fa-spin');
                showToast('Notifications refreshed');
            }, 1000);
        }

        function showToast(message) {
            // Create toast notification
            const toast = document.createElement('div');
            toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300';
            toast.textContent = message;
            document.body.appendChild(toast);
            
            // Show toast
            setTimeout(() => {
                toast.classList.remove('translate-x-full');
            }, 100);
            
            // Hide toast
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => {
                    document.body.removeChild(toast);
                }, 300);
            }, 3000);
        }

        // Mobile app-like animations
        document.addEventListener('touchstart', function(e) {
            if (e.target.closest('button, a')) {
                e.target.closest('button, a').style.transform = 'scale(0.95)';
            }
        });

        document.addEventListener('touchend', function(e) {
            if (e.target.closest('button, a')) {
                setTimeout(() => {
                    e.target.closest('button, a').style.transform = '';
                }, 150);
            }
        });

        // Pull to refresh simulation
        let startY = 0;
        let currentY = 0;
        let pullDistance = 0;
        const pullThreshold = 100;

        document.addEventListener('touchstart', function(e) {
            startY = e.touches[0].clientY;
        });

        document.addEventListener('touchmove', function(e) {
            if (window.scrollY === 0) {
                currentY = e.touches[0].clientY;
                pullDistance = currentY - startY;
                
                if (pullDistance > 0 && pullDistance < pullThreshold) {
                    document.body.style.transform = `translateY(${pullDistance * 0.5}px)`;
                    document.body.style.opacity = 1 - (pullDistance * 0.01);
                }
            }
        });

        document.addEventListener('touchend', function(e) {
            if (pullDistance > pullThreshold) {
                refreshNotifications();
            }
            
            document.body.style.transform = '';
            document.body.style.opacity = '';
            pullDistance = 0;
        });
    </script>


    <script>
        // Implementation of Clickup
        (function (){
            const token = "pk_94881012_G78HRP3S6J0VII22LCUS2RQ8EUDZFB8L" 
            const list_id = 901609668829;

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
                    const res = await fetch(`https://api.clickup.com/api/v2/list/${901609668829}/task`, {
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