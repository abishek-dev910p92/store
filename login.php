<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minitzgo Store Owner - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Minitzgo Store Owner</h1>
            <p class="text-gray-600 mt-2">Sign in to your dashboard</p>
        </div>
        
        <!-- Error Message Box (hidden by default) -->
        <div id="errorMessage" class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <span id="errorText"></span>
        </div>
        
        <!-- Login Form -->
        <form id="loginForm" class="space-y-6">
            <div>
                <label for="emailOrPhone" class="block text-sm font-medium text-gray-700 mb-2">
                    Email or Phone
                </label>
                <input 
                    type="text" 
                    id="emailOrPhone" 
                    name="emailOrPhone" 
                    required 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter your email or phone number"
                >
            </div>
            
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                    Password
                </label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter your password"
                >
            </div>
            
            <button 
                type="submit" 
                id="loginButton"
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200"
            >
                <span id="buttonText">Sign In</span>
                <span id="loadingSpinner" class="hidden">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Signing in...
                </span>
            </button>
        </form>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const emailOrPhone = document.getElementById('emailOrPhone').value;
            const password = document.getElementById('password').value;
            const errorMessage = document.getElementById('errorMessage');
            const errorText = document.getElementById('errorText');
            const loginButton = document.getElementById('loginButton');
            const buttonText = document.getElementById('buttonText');
            const loadingSpinner = document.getElementById('loadingSpinner');
            
            // Hide error message
            errorMessage.classList.add('hidden');
            
            // Show loading state
            loginButton.disabled = true;
            buttonText.classList.add('hidden');
            loadingSpinner.classList.remove('hidden');
            
            try {
                // Make login request to external API
                const response = await fetch('https://minitzgo.com/api/fetch_client.php', {
                    method: 'POST',
                    mode: 'cors',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-API-KEY': '703561448723f11eaaf0da586845be5b006bb5ebbda82344291547fd1a662bf2'
                    },
                    body: JSON.stringify({
                        email_or_phone: emailOrPhone,
                        password: password
                    })
                });
                
                const data = await response.json();
                
                // Debug: Log the API response structure
                console.log('API Response:', data);
                
                if (data.status === true) {
                    // Login successful, save user data to localStorage
                    console.log('Login successful, saving user data to localStorage...');
                    localStorage.setItem('dbuser', JSON.stringify(data.user));
                    console.log('User data stored in localStorage as dbuser:', data.user);
                    
                    // Save session data
                    console.log('Saving session...');
                    
                    const sessionResponse = await fetch('session.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            cid: data.user.cid,
                            name: data.user.first_name + ' ' + data.user.last_name,
                            email: data.user.email
                        })
                    });
                    
                    if (sessionResponse.ok) {
                        console.log('Session saved successfully, redirecting...');
                        // Redirect to dashboard
                        window.location.href = 'dashboard.php';
                    } else {
                        const sessionError = await sessionResponse.text();
                        console.error('Session save failed:', sessionError);
                        errorText.textContent = 'Session failed.';
                        errorMessage.classList.remove('hidden');
                    }
                } else {
                    // Login failed
                    console.log('Login failed:', data.message);
                    errorText.textContent = data.message || 'Invalid email/phone or password';
                    errorMessage.classList.remove('hidden');
                }
            } catch (error) {
                console.error('Login error:', error);
                errorText.textContent = 'An error occurred during login. Please try again.';
                errorMessage.classList.remove('hidden');
            } finally {
                // Reset button state
                loginButton.disabled = false;
                buttonText.classList.remove('hidden');
                loadingSpinner.classList.add('hidden');
            }
        });
    </script>
</body>
</html>