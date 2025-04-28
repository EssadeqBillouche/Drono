document.addEventListener('DOMContentLoaded', function() {
    // Initialize map
    let map = L.map('map').setView([40.7128, -74.0060], 13);
    let locationSet = false;
    let bestAccuracy = Infinity;
    let watchId = null;

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Add marker
    let marker = L.marker([40.7128, -74.0060], {
        draggable: false  // Disable manual dragging
    }).addTo(map);

    // Format card number with spaces
    document.getElementById('card_number').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
        let formattedValue = '';

        for (let i = 0; i < value.length; i++) {
            if (i > 0 && i % 4 === 0) {
                formattedValue += ' ';
            }
            formattedValue += value[i];
        }

        e.target.value = formattedValue;
    });

    // Format expiry date with slash
    document.getElementById('expiry_date').addEventListener('input', function(e) {
        let value = e.target.value.replace(/[^0-9]/gi, '');

        if (value.length > 2) {
            e.target.value = value.substring(0, 2) + '/' + value.substring(2, 4);
        } else {
            e.target.value = value;
        }
    });

    // Limit CVV to numbers only
    document.getElementById('cvv').addEventListener('input', function(e) {
        e.target.value = e.target.value.replace(/[^0-9]/gi, '');
    });

    // Form validation
    document.getElementById('checkout-form').addEventListener('submit', function(e) {
        // Check if location has been set
        if (!locationSet) {
            e.preventDefault();
            showLocationStatus('error', 'Please set your delivery location using the "Get My Location" button.');
            document.getElementById('get-location-btn').scrollIntoView({ behavior: 'smooth', block: 'center' });
            document.getElementById('get-location-btn').classList.add('animate-pulse');
            setTimeout(() => {
                document.getElementById('get-location-btn').classList.remove('animate-pulse');
            }, 2000);
            return;
        }

        let paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;

        if (paymentMethod === 'card') {
            let cardNumber = document.getElementById('card_number').value.replace(/\s+/g, '');
            let expiryDate = document.getElementById('expiry_date').value;
            let cvv = document.getElementById('cvv').value;
            let nameOnCard = document.getElementById('name_on_card').value;

            if (!cardNumber || cardNumber.length < 16) {
                e.preventDefault();
                alert('Please enter a valid card number.');
                return;
            }

            if (!expiryDate || expiryDate.length < 5) {
                e.preventDefault();
                alert('Please enter a valid expiry date.');
                return;
            }

            if (!cvv || cvv.length < 3) {
                e.preventDefault();
                alert('Please enter a valid CVV.');
                return;
            }

            if (!nameOnCard) {
                e.preventDefault();
                alert('Please enter the name on your card.');
                return;
            }
        }
    });

    // Enhanced Get location button functionality
    const getLocationBtn = document.getElementById('get-location-btn');
    const locationStatus = document.getElementById('location-status');
    const accuracyDisplay = document.createElement('div');
    accuracyDisplay.className = 'text-sm text-gray-500 mt-1';
    locationStatus.after(accuracyDisplay);

    getLocationBtn.addEventListener('click', function() {
        if (!navigator.geolocation) {
            showLocationStatus('error', 'Geolocation is not supported by your browser');
            return;
        }

        // Show loading state
        getLocationBtn.disabled = true;
        getLocationBtn.innerHTML = '<svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Getting precise location...';

        // Clear any previous watch
        if (watchId !== null) {
            navigator.geolocation.clearWatch(watchId);
        }

        // Reset best accuracy
        bestAccuracy = Infinity;

        // Show initial status
        showLocationStatus('info', 'Determining your precise location... Please wait.');

        // Start continuous location tracking for better accuracy
        watchId = navigator.geolocation.watchPosition(
            // Success callback with continuous updates
            function(position) {
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;
                const accuracy = position.coords.accuracy;

                // Check if this position is more accurate than previous ones
                if (accuracy < bestAccuracy) {
                    bestAccuracy = accuracy;

                    // Update form values
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lng;

                    // Update map
                    map.setView([lat, lng], 17);
                    marker.setLatLng([lat, lng]);

                    // Update accuracy display
                    accuracyDisplay.textContent = `Location accuracy: ±${Math.round(accuracy)} meters`;

                    // Show success message with accuracy info
                    showLocationStatus(
                        'success',
                        `Location detected! Accuracy: ±${Math.round(accuracy)} meters. Your drone delivery is ready to be scheduled.`
                    );

                    // If we've reached good accuracy, stop watching
                    if (accuracy < 20) { // Less than 20 meters is typically very good
                        navigator.geolocation.clearWatch(watchId);
                        watchId = null;

                        // Reset button but change its appearance to indicate success
                        getLocationBtn.disabled = false;
                        getLocationBtn.innerHTML = `
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Precise Location Set
                        `;
                        getLocationBtn.classList.remove('bg-primary', 'hover:bg-primary/90');
                        getLocationBtn.classList.add('bg-green-600', 'hover:bg-green-700');

                        // Mark location as set
                        locationSet = true;
                    }
                }
            },
            // Error callback
            function(error) {
                // Clear the watch if there's an error
                if (watchId !== null) {
                    navigator.geolocation.clearWatch(watchId);
                    watchId = null;
                }

                let errorMessage;
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        errorMessage = 'You denied the request for location. Please allow access to your location for drone delivery.';
                        break;
                    case error.POSITION_UNAVAILABLE:
                        errorMessage = 'Location information is unavailable. Please try again.';
                        break;
                    case error.TIMEOUT:
                        errorMessage = 'The request to get location timed out. Please try again.';
                        break;
                    case error.UNKNOWN_ERROR:
                        errorMessage = 'An unknown error occurred. Please try again.';
                        break;
                }

                showLocationStatus('error', errorMessage);

                // Reset button
                getLocationBtn.disabled = false;
                getLocationBtn.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Try Again
                `;
            },
            // Options for maximum accuracy
            {
                enableHighAccuracy: true,
                timeout: 20000,       // Longer timeout for more accurate readings
                maximumAge: 0         // Always get fresh position
            }
        );

        // Set a timeout to stop watching after 30 seconds regardless
        // This prevents excessive battery drain if high accuracy can't be achieved
        setTimeout(() => {
            if (watchId !== null) {
                navigator.geolocation.clearWatch(watchId);
                watchId = null;

                // If we've found any position (even if not super accurate), mark it as set
                if (document.getElementById('latitude').value) {
                    locationSet = true;

                    getLocationBtn.disabled = false;
                    getLocationBtn.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Location Set
                    `;
                    getLocationBtn.classList.remove('bg-primary', 'hover:bg-primary/90');
                    getLocationBtn.classList.add('bg-green-600', 'hover:bg-green-700');

                    showLocationStatus('info', 'Location tracking stopped. Using the best location found.');
                } else {
                    // No position was found within the timeout
                    getLocationBtn.disabled = false;
                    getLocationBtn.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Try Again
                    `;

                    showLocationStatus('error', 'Could not get an accurate location. Please try again or check your device settings.');
                }
            }
        }, 30000);
    });

    // Enhanced status display function
    function showLocationStatus(type, message) {
        // Add 'info' type
        const colorMap = {
            'success': 'bg-green-50 text-green-800',
            'error': 'bg-red-50 text-red-800',
            'info': 'bg-blue-50 text-blue-800'
        };

        const iconMap = {
            'success': '<svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>',
            'error': '<svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>',
            'info': '<svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zm-1 9a1 1 0 100-2 1 1 0 000 2zm0 1a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/></svg>'
        };

        locationStatus.className = `${colorMap[type]} rounded-md p-4 mb-3`;

        locationStatus.innerHTML = `
            <div class="flex">
                <div class="flex-shrink-0">
                    ${iconMap[type]}
                </div>
                <div class="ml-3">
                    <p class="text-sm">${message}</p>
                </div>
            </div>
        `;

        locationStatus.classList.remove('hidden');

        // Auto hide success message after 5 seconds
        if (type === 'success') {
            setTimeout(() => {
                locationStatus.classList.add('hidden');
            }, 5000);
        }
    }
});

// Payment method selection
function selectPaymentMethod(method) {
    // Update radio button
    document.querySelector('input[name="payment_method"][value="' + method + '"]').checked = true;

    // Update card styling
    document.querySelectorAll('.payment-method-card').forEach(function(card) {
        card.classList.remove('selected');
    });
    document.getElementById(method + '-method').classList.add('selected');

    // Show respective details section
    document.getElementById('card-details').classList.add('hidden');
    document.getElementById('paypal-details').classList.add('hidden');
    document.getElementById('apple_pay-details').classList.add('hidden');

    document.getElementById(method + '-details').classList.remove('hidden');
}

// Utility function to get current date time in UTC format (YYYY-MM-DD HH:MM:SS)
function getCurrentUTCDateTime() {
    const now = new Date();

    // Get UTC date components
    const year = now.getUTCFullYear();
    const month = String(now.getUTCMonth() + 1).padStart(2, '0'); // Months are 0-indexed
    const day = String(now.getUTCDate()).padStart(2, '0');

    // Get UTC time components
    const hours = String(now.getUTCHours()).padStart(2, '0');
    const minutes = String(now.getUTCMinutes()).padStart(2, '0');
    const seconds = String(now.getUTCSeconds()).padStart(2, '0');

    // Format the date string
    return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
}

// Add timestamp to order when form is submitted
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('checkout-form');
    if (form) {
        form.addEventListener('submit', function() {
            // Create a hidden input for the timestamp if it doesn't exist
            let timestampInput = document.getElementById('order_timestamp');
            if (!timestampInput) {
                timestampInput = document.createElement('input');
                timestampInput.type = 'hidden';
                timestampInput.id = 'order_timestamp';
                timestampInput.name = 'order_timestamp';
                form.appendChild(timestampInput);
            }

            // Set the current UTC time
            timestampInput.value = getCurrentUTCDateTime();
        });
    }
});
