<?php
// Common header toggle component to be included in all pages
$toggleId = $toggleId ?? 'storeStatus';
$statusTextId = $statusTextId ?? 'statusText';
?>

<!-- Store Status Toggle -->
<div class="flex items-center">
    <div class="toggle-container">
        <input type="checkbox" name="toggle" id="<?= $toggleId ?>" class="toggle-checkbox"/>
        <label for="<?= $toggleId ?>" class="toggle-label"></label>
        <span id="<?= $statusTextId ?>" class="text-red-500 text-sm">Offline</span>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const togglePairs = [
        { toggleId: 'storeStatusMobile', statusTextId: 'statusTextMobile' },
        { toggleId: 'storeStatusDesktop', statusTextId: 'statusTextDesktop' },
    ];

    togglePairs.forEach(pair => {
        const toggle = document.getElementById(pair.toggleId);
        const statusText = document.getElementById(pair.statusTextId);

        if (!toggle || !statusText) return;

        // Set initial state from localStorage
        const savedStatus = localStorage.getItem('storeStatus');
        const isOnline = savedStatus === 'online';
        toggle.checked = isOnline;
        updateStatusText(isOnline, statusText);

        // Add change listener
        toggle.addEventListener('change', function () {
            const isOnline = this.checked;
            localStorage.setItem('storeStatus', isOnline ? 'online' : 'offline');
            updateStatusText(isOnline, statusText);
            updateClientStatus(isOnline ? 'Online' : 'Offline');
        });
    });

    function updateStatusText(isOnline, element) {
        if (isOnline) {
            element.textContent = 'Online';
            element.classList.remove('text-red-500');
            element.classList.add('text-green-500');
        } else {
            element.textContent = 'Offline';
            element.classList.remove('text-green-500');
            element.classList.add('text-red-500');
        }
    }

    function getCidFromLocalStorage() {
        const dbuser = JSON.parse(localStorage.getItem('dbuser'));
        if (!dbuser || !dbuser.cid) {
            console.error('CID not found in local storage');
            return null;
        }
        return dbuser.cid;
    }

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