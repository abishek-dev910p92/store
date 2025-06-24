<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Minitzgo Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.3s ease-out',
                        'pulse-slow': 'pulse 3s infinite',
                        'float': 'float 3s ease-in-out infinite'
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
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-indigo-50 min-h-screen">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="hidden md:flex md:w-64 md:flex-col">
            <div class="flex flex-col flex-grow pt-5 overflow-y-auto bg-white border-r shadow-lg">
                <div class="flex items-center flex-shrink-0 px-4">
                    <h1 class="text-xl font-bold bg-gradient-to-r from-indigo-600 to-blue-600 bg-clip-text text-transparent">Minitzgo Store</h1>
                </div>
                <div class="mt-8 flex-grow flex flex-col">
                    <nav class="flex-1 px-2 space-y-1">
                        <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-tachometer-alt mr-3 text-gray-400"></i> Dashboard
                        </a>
                        <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-shopping-cart mr-3 text-gray-400"></i> Orders
                        </a>
                        <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-box mr-3 text-gray-400"></i> Products
                        </a>
                        <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-users mr-3 text-gray-400"></i> Users
                        </a>
                        <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-credit-card mr-3 text-gray-400"></i> Billing
                        </a>
                        <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-bell mr-3 text-gray-400"></i> Notifications
                        </a>
                        <a href="#" class="bg-gradient-to-r from-indigo-500 to-blue-600 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md shadow-md">
                            <i class="fas fa-user mr-3"></i> Profile
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-1 overflow-hidden">
            <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
                <!-- Header -->
                <div class="bg-white shadow-sm border-b border-gray-200">
                    <div class="px-4 py-6 sm:px-6 lg:px-8">
                        <h2 class="text-3xl font-bold text-gray-900">My Profile</h2>
                        <p class="text-sm text-gray-500">Manage your account settings and preferences</p>
                    </div>
                </div>

                <!-- Profile Info Card -->
                <div class="m-6 bg-white rounded-xl shadow-lg p-6 animate-slide-up">
                    <div class="flex items-center">
                        <div class="h-20 w-20 rounded-full bg-indigo-500 text-white flex items-center justify-center text-2xl font-bold">JD</div>
                        <div class="ml-6">
                            <h3 class="text-xl font-semibold">John Doe</h3>
                            <p class="text-gray-600">johndoe@example.com</p>
                        </div>
                    </div>
                </div>

                <!-- Stats -->
                <div class="mx-6 grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="bg-green-500 text-white rounded-xl p-4">
                        <p>Total Orders</p>
                        <h4 class="text-2xl font-bold">123</h4>
                    </div>
                    <div class="bg-blue-500 text-white rounded-xl p-4">
                        <p>Total Revenue</p>
                        <h4 class="text-2xl font-bold">₹45,000</h4>
                    </div>
                    <div class="bg-purple-500 text-white rounded-xl p-4">
                        <p>Products</p>
                        <h4 class="text-2xl font-bold">80</h4>
                    </div>
                    <div class="bg-yellow-500 text-white rounded-xl p-4">
                        <p>Store Rating</p>
                        <h4 class="text-2xl font-bold">4.6 / 5</h4>
                    </div>
                </div>

                <!-- Profile Forms -->
                <div class="m-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Profile Info Form -->
                    <div class="bg-white p-6 rounded-xl shadow">
                        <h3 class="text-lg font-semibold mb-4">Profile Information</h3>
                        <form>
                            <input class="w-full mb-4 p-2 border rounded" type="text" placeholder="Full Name" value="John Doe">
                            <input class="w-full mb-4 p-2 border rounded" type="email" placeholder="Email" value="johndoe@example.com">
                            <input class="w-full mb-4 p-2 border rounded" type="tel" placeholder="Phone" value="9876543210">
                            <textarea class="w-full mb-4 p-2 border rounded" placeholder="Address">123 Main Street</textarea>
                            <textarea class="w-full mb-4 p-2 border rounded" placeholder="Bio">Passionate entrepreneur and store owner</textarea>
                            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded">Update Profile</button>
                        </form>
                    </div>

                    <!-- Change Password -->
                    <div class="bg-white p-6 rounded-xl shadow">
                        <h3 class="text-lg font-semibold mb-4">Change Password</h3>
                        <form>
                            <input class="w-full mb-4 p-2 border rounded" type="password" placeholder="Current Password">
                            <input class="w-full mb-4 p-2 border rounded" type="password" placeholder="New Password">
                            <input class="w-full mb-4 p-2 border rounded" type="password" placeholder="Confirm Password">
                            <button type="submit" class="w-full bg-red-600 text-white py-2 rounded">Change Password</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
