// Main JavaScript file for Minitzgo Store Owner Dashboard

// Utility functions
const Utils = {
    // Show error message with animation
    showError: function(elementId, message) {
        const errorElement = document.getElementById(elementId);
        const errorText = errorElement.querySelector('#errorText') || errorElement;
        
        if (errorText !== errorElement) {
            errorText.textContent = message;
        } else {
            errorElement.textContent = message;
        }
        
        errorElement.classList.remove('hidden');
        errorElement.classList.add('error-slide-down');
    },
    
    // Hide error message
    hideError: function(elementId) {
        const errorElement = document.getElementById(elementId);
        errorElement.classList.add('hidden');
        errorElement.classList.remove('error-slide-down');
    },
    
    // Show loading state on button
    setButtonLoading: function(buttonId, isLoading) {
        const button = document.getElementById(buttonId);
        const buttonText = button.querySelector('#buttonText');
        const loadingSpinner = button.querySelector('#loadingSpinner');
        
        if (isLoading) {
            button.disabled = true;
            if (buttonText) buttonText.classList.add('hidden');
            if (loadingSpinner) loadingSpinner.classList.remove('hidden');
        } else {
            button.disabled = false;
            if (buttonText) buttonText.classList.remove('hidden');
            if (loadingSpinner) loadingSpinner.classList.add('hidden');
        }
    },
    
    // Validate email format
    isValidEmail: function(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    },
    
    // Validate phone format (basic)
    isValidPhone: function(phone) {
        const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
        return phoneRegex.test(phone.replace(/[\s\-\(\)]/g, ''));
    },
    
    // Check if input is email or phone
    getInputType: function(input) {
        if (this.isValidEmail(input)) {
            return 'email';
        } else if (this.isValidPhone(input)) {
            return 'phone';
        }
        return 'unknown';
    }
};

// Session management
const SessionManager = {
    // Check if user is logged in
    isLoggedIn: function() {
        return fetch('includes/auth.php', { method: 'HEAD' })
            .then(response => response.ok)
            .catch(() => false);
    },
    
    // Logout user
    logout: function() {
        window.location.href = 'logout.php';
    }
};

// Initialize app when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Add fade-in animation to main content
    const mainContent = document.querySelector('body');
    if (mainContent) {
        mainContent.classList.add('fade-in');
    }
    
    // Auto-hide alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert-auto-hide');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.classList.add('hidden');
        }, 5000);
    });
});

// Export for global use
window.Utils = Utils;
window.SessionManager = SessionManager;