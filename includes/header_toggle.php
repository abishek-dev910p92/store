<?php
// Common header toggle component to be included in all pages
?>

<!-- Store Status Toggle -->
<div class="flex items-center">
    <div class="toggle-container">
        <input type="checkbox" name="toggle" id="storeStatus" class="toggle-checkbox"/>
        <label for="storeStatus" class="toggle-label"></label>
        <span id="statusText" class="text-red-500 text-sm">Offline</span>
    </div>
</div>

<script>
// Store status toggle functionality
document.addEventListener('DOMContentLoaded', function() {
    const storeStatus = document.getElementById('storeStatus');
    const statusText = document.getElementById('statusText');

    // Restore toggle state from localStorage on page load
    const savedStatus = localStorage.getItem('storeStatus');
    const isOnline = savedStatus === 'online';
    storeStatus.checked = isOnline;
    updateStatusText(isOnline);

    // Update localStorage and text when toggled
    storeStatus.addEventListener('change', function() {
        const isOnline = this.checked;
        localStorage.setItem('storeStatus', isOnline ? 'online' : 'offline');
        updateStatusText(isOnline);
    });

    // Function to update status text and color
    function updateStatusText(isOnline) {
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
});
</script>