const dbUser = JSON.parse(localStorage.getItem('dbuser'));
const cid = dbUser ? dbUser.cid : null;
console.log(cid);

document.addEventListener("DOMContentLoaded", function() {
    // Get the dropdown menu element
    const dropdownMenu = document.getElementById("dropdownMenu");
    // Get the dropdown toggle button element
    const dropdownToggleButton = document.getElementById("dropdownMenuButton");
    // Track notification data to prevent unnecessary re-renders
    let lastNotificationData = null;
    // Track if dropdown is open
    let isDropdownOpen = false;
    // Debounce timer for API calls
    let fetchTimer = null;
    // Track if initial fetch has been done
    let initialFetchDone = false;
    // Store notifications that have been handled
    const handledNotifications = new Set();
    
    // Function to toggle the dropdown menu
    function toggleDropdown() {
        isDropdownOpen = !dropdownMenu.classList.contains("show");
        if (isDropdownOpen) {
            dropdownMenu.classList.add("show");
            // Mark all as seen when opened
            document.querySelectorAll('.notification-item.new').forEach(item => {
                item.classList.remove('new');
            });
        } else {
            dropdownMenu.classList.remove("show");
        }
    }
    
    // Function to fetch notifications from the API with debounce
    function debouncedFetchNotifications() {
        clearTimeout(fetchTimer);
        fetchTimer = setTimeout(fetchNotifications, 300);
    }
    
    // Function to fetch notifications from the API
    function fetchNotifications() {
        if (!cid) return; // Don't fetch if no client ID
        
        // API endpoint URL
        const apiUrl = 'https://minitzgo.com/api/orders_notification.php';
        // API key
        const apiKey = 'c27defb919c3796d69d6632b60ec1f9a283cd25fb1a43999d7c90366aea9db58';

        // Prepare the request body
        const requestBody = { cid };

        // Make API request to fetch notifications
        fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'x-api-key': apiKey
            },
            body: JSON.stringify(requestBody)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Check if the data has changed since last fetch
            const dataString = JSON.stringify(data);
            if (dataString === lastNotificationData) {
                return; // Skip rendering if data hasn't changed
            }
            
            lastNotificationData = dataString;
            
            // Check if the API returned a 'No Records' message or an empty data structure
            if (data && data.status === false && data.message === 'No Records found') {
                updateNotificationCount(0);
                renderNoNotificationsMessage();
            } 
            // Handle case when data structure is valid and contains notifications
            else if (data && Array.isArray(data.data)) {
                const newNotifications = data.data.filter(notification => 
                    !handledNotifications.has(notification.oid)
                );
                
                // Only play sound if there are new notifications and not the first load
                if (newNotifications.length > 0 && initialFetchDone) {
                    playNotificationSound();
                    // If new notifications and dropdown not open, auto-open it
                    if (!isDropdownOpen && newNotifications.length > 0) {
                        dropdownMenu.classList.add("show");
                        isDropdownOpen = true;
                    }
                }
                
                renderNotifications(data.data);
                updateNotificationCount(data.data.length);
                initialFetchDone = true;
            } else {
                console.error('Unexpected data structure:', data);
                updateNotificationCount(0);
            }
        })
        .catch(error => {
            console.error('Error fetching notifications:', error);
        });
    }

    // Function to update notification count
    function updateNotificationCount(count) {
        const notificationCountElement = document.getElementById('notificationCount');
        if (notificationCountElement) {
            if (count > 0) {
                notificationCountElement.textContent = count;
                notificationCountElement.style.display = 'inline-block';
            } else {
                notificationCountElement.style.display = 'none';
            }
        }
    }

    // Function to play notification sound
    function playNotificationSound() {
        const notificationSound = document.getElementById('notificationSound');
        if (notificationSound) {
            // Reset the audio to the beginning
            notificationSound.currentTime = 0;
            notificationSound.play().catch(e => {
                // Handle autoplay restrictions
                console.log('Sound play prevented:', e);
            });
        }
    }

    // Function to render notifications
    function renderNotifications(notifications) {
        // Get the notification body element
        const notificationBody = document.getElementById("notificationbody");
        if (!notificationBody) return;

        // Don't clear existing notifications if dropdown is open to prevent flickering
        if (!isDropdownOpen) {
            notificationBody.innerHTML = '';
        }

        // Iterate over each notification and create HTML dynamically
        notifications.forEach(notification => {
            // Skip if this notification is already rendered and dropdown is open
            if (isDropdownOpen && notificationBody.querySelector(`[data-notification-id="${notification.oid}"]`)) {
                return;
            }
            
            // Check if this is a new notification
            const isNew = !handledNotifications.has(notification.oid);
            if (isNew) {
                handledNotifications.add(notification.oid);
            }
            
            const notificationItem = document.createElement('div');
            notificationItem.className = `notification-item ${isNew ? 'new' : ''} mb-3`;
            notificationItem.dataset.notificationId = notification.oid;
            
            notificationItem.innerHTML = `
                <div class="card shadow-sm border-0 rounded-lg overflow-hidden">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center">
                            <div class="notification-image me-3">
                                <img src="${notification.product_image}" class="rounded-circle" width="50" height="50" alt="Product">
                            </div>
                            <div class="notification-content flex-grow-1">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="text-sm font-weight-bold mb-0">Order #${notification.oid}</h6>
                                    <span class="badge bg-primary text-xxs">New</span>
                                </div>
                                <p class="text-sm mb-1">${notification.product_title}</p>
                                <div class="d-flex align-items-center text-xs text-muted">
                                    <i class="fa fa-calendar-alt me-1"></i>
                                    <span>${notification.date}</span>
                                    <i class="fa fa-clock ms-2 me-1"></i>
                                    <span>${notification.time}</span>
                                </div>
                            </div>
                        </div>
                        <div class="notification-actions d-flex justify-content-end mt-3">
                            <button class="acceptButton btn btn-success btn-sm me-2" data-notification-id="${notification.oid}">
                                <i class="fa fa-check me-1"></i> Accept
                            </button>
                            <button class="rejectButton btn btn-danger btn-sm" data-notification-id="${notification.oid}">
                                <i class="fa fa-times me-1"></i> Reject
                            </button>
                        </div>
                    </div>
                </div>
            `;
            
            // Append the notification HTML to the notification body
            notificationBody.appendChild(notificationItem);
        });

        // Add event listeners to accept and reject buttons
        document.querySelectorAll('.acceptButton').forEach(button => {
            if (!button.hasListener) {
                button.hasListener = true;
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    const notificationId = this.dataset.notificationId;
                    const notificationItem = document.querySelector(`.notification-item[data-notification-id="${notificationId}"]`);
                    
                    // Add processing state
                    this.disabled = true;
                    this.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Processing...';
                    
                    const clientStatus = 'accepted';
                    sendDataToAnotherAPI(notificationId, clientStatus, () => {
                        // Remove the notification item with animation
                        if (notificationItem) {
                            notificationItem.style.height = notificationItem.offsetHeight + 'px';
                            notificationItem.classList.add('removing');
                            setTimeout(() => {
                                notificationItem.style.height = '0';
                                notificationItem.style.opacity = '0';
                                notificationItem.style.margin = '0';
                                notificationItem.style.padding = '0';
                                setTimeout(() => {
                                    notificationItem.remove();
                                    updateNotificationCount(document.querySelectorAll('.notification-item').length);
                                }, 300);
                            }, 100);
                        }
                    });
                });
            }
        });

        document.querySelectorAll('.rejectButton').forEach(button => {
            if (!button.hasListener) {
                button.hasListener = true;
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    const notificationId = this.dataset.notificationId;
                    const notificationItem = document.querySelector(`.notification-item[data-notification-id="${notificationId}"]`);
                    
                    // Add processing state
                    this.disabled = true;
                    this.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Processing...';
                    
                    const clientStatus = 'rejected';
                    sendDataToAnotherAPI(notificationId, clientStatus, () => {
                        // Remove the notification item with animation
                        if (notificationItem) {
                            notificationItem.style.height = notificationItem.offsetHeight + 'px';
                            notificationItem.classList.add('removing');
                            setTimeout(() => {
                                notificationItem.style.height = '0';
                                notificationItem.style.opacity = '0';
                                notificationItem.style.margin = '0';
                                notificationItem.style.padding = '0';
                                setTimeout(() => {
                                    notificationItem.remove();
                                    updateNotificationCount(document.querySelectorAll('.notification-item').length);
                                }, 300);
                            }, 100);
                        }
                    });
                });
            }
        });
    }

    // Function to display "No notifications" message
    function renderNoNotificationsMessage() {
        const notificationBody = document.getElementById("notificationbody");
        if (!notificationBody) return;
        
        notificationBody.innerHTML = `
            <div class="text-center py-4">
                <div class="mb-3">
                    <i class="fa fa-bell-slash fa-2x text-muted"></i>
                </div>
                <p class="text-muted mb-0">No notifications available</p>
            </div>
        `;
    }

    // Function to send data to another API
    function sendDataToAnotherAPI(notificationId, clientStatus, callback) {
        const apiUrl = 'https://minitzgo.com/api/client_order_confirmation.php';
        const apiKey = '64e44d2ccbd812f45cceee85bdc2c5b72af881a1ae46a525a51d5fed61dbfc0d';

        // Prepare the request body
        const requestBody = {
            oid: notificationId,
            product_status: clientStatus,
            cid: cid
        };

        // Make API request to send data
        fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'x-api-key': apiKey
            },
            body: JSON.stringify(requestBody)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (callback) callback(data);
        })
        .catch(error => {
            console.error('Error updating notification status:', error);
        });
    }

    // Event listener for the dropdown toggle button
    if (dropdownToggleButton) {
        dropdownToggleButton.addEventListener("click", function(event) {
            event.stopPropagation(); // Prevents the click event from bubbling up
            toggleDropdown();
        });
    }

    // Event listener to close the dropdown menu when clicking outside of it
    document.addEventListener("click", function(event) {
        const targetElement = event.target;
        if (dropdownMenu && dropdownMenu.classList.contains("show") && !targetElement.closest(".dropdown")) {
            // If the click target is not within the dropdown menu, close the dropdown
            dropdownMenu.classList.remove("show");
            isDropdownOpen = false;
        }
    });

    // Add CSS for animations and mobile responsiveness
    const style = document.createElement('style');
    style.textContent = `
        /* Notification Styles */
        .notification-item {
            transition: all 0.3s ease;
        }
        .notification-item.new {
            animation: highlight-new 2s ease;
        }
        .notification-item.removing {
            transition: all 0.3s ease;
            overflow: hidden;
        }
        @keyframes highlight-new {
            0% { background-color: rgba(var(--bs-primary-rgb), 0.1); }
            100% { background-color: transparent; }
        }
        
        /* Mobile Responsive Styles */
        @media (max-width: 576px) {
            #dropdownMenu {
                position: fixed !important;
                top: 60px !important;
                right: 10px !important;
                left: 10px !important;
                width: calc(100% - 20px) !important;
                max-height: 80vh !important;
                overflow-y: auto !important;
                z-index: 1050 !important;
            }
            .notification-content {
                max-width: 200px;
            }
            .notification-actions {
                flex-direction: row;
                justify-content: space-between;
                width: 100%;
            }
            .notification-actions .btn {
                flex: 1;
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }
        }
        
        /* Dropdown Animation */
        #dropdownMenu {
            transform-origin: top right;
            transition: transform 0.2s, opacity 0.2s;
            transform: scale(0.95);
            opacity: 0;
            display: block !important;
            visibility: hidden;
        }
        #dropdownMenu.show {
            transform: scale(1);
            opacity: 1;
            visibility: visible;
        }
        
        /* Badge Styles */
        #notificationCount {
            transition: all 0.3s ease;
        }
    `;
    document.head.appendChild(style);

    // Fetch notifications initially and then every 3 seconds (reduced from 500ms)
    fetchNotifications();
    setInterval(debouncedFetchNotifications, 3000); // Fetch notifications every 3 seconds
});


 