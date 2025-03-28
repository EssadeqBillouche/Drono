<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drono - Order Tracking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#ff7e00",
                        text: "#2f2f2f",
                        secondary: "#909090",
                        background: "#fff9f0",
                    }
                }
            }
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.css" />
</head>
<body class="min-h-screen bg-[#fff9f0]">
<div class="container mx-auto px-4 py-6">
    <!-- Header -->
    <header class="flex justify-between items-center mb-16">
        <div class="flex items-center gap-2">
            <div class="relative w-6 h-6">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 10C19 11.8565 18.1045 13.637 16.5 14.8995C14.8955 16.162 12.7909 17 10.5 17C8.20914 17 6.10456 16.162 4.5 14.8995C2.89544 13.637 2 11.8565 2 10C2 8.14348 2.89544 6.36301 4.5 5.10051C6.10456 3.838 8.20914 3 10.5 3C12.7909 3 14.8955 3.838 16.5 5.10051C18.1045 6.36301 19 8.14348 19 10Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 3C12 3 14 1 16 1C18 1 20 2 20 4C20 6 19 7 19 7" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <a href="/" class="text-2xl font-bold text-[#2f2f2f]">Drono</a>
        </div>
        <nav class="hidden md:flex">
            <ul class="flex gap-8">
                <li><a href="/" class="text-[#2f2f2f] hover:text-[#ff7e00]">Home</a></li>
                <li><a href="/catalog" class="text-[#2f2f2f] hover:text-[#ff7e00]">Shop</a></li>
                <li><a href="#" class="text-[#2f2f2f] hover:text-[#ff7e00]">Contact</a></li>
                <li><a href="#" class="text-[#2f2f2f] hover:text-[#ff7e00]">About</a></li>
            </ul>
        </nav>
        <div class="flex items-center gap-4">
            <div class="relative">
                <button class="flex items-center justify-center w-10 h-10 rounded-full border border-gray-200 bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-cart"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                </button>
                <span class="absolute -top-2 -right-2 flex items-center justify-center min-w-[1.25rem] h-5 px-1.5 py-0.5 text-xs font-semibold text-white bg-[#ff7e00] rounded-full">3</span>
            </div>
        </div>
    </header>

    <!-- Order Tracking Section -->
    <main class="mb-24">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-[#2f2f2f] mb-4">Track Your Delivery</h1>
            <p class="text-[#909090] max-w-2xl mx-auto">Monitor your drone delivery in real-time with our cutting-edge tracking system.</p>
        </div>

        <!-- Order Status Overview -->
        <div class="bg-white p-8 rounded-xl shadow-sm mb-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                <div>
                    <span class="text-sm text-[#909090]">Order ID:</span>
                    <h2 class="text-xl font-bold text-[#2f2f2f]">#DR0384729</h2>
                </div>
                <div class="mt-4 md:mt-0">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-[#ff7e00]/10 text-[#ff7e00]">
                        <span class="w-2 h-2 bg-[#ff7e00] rounded-full mr-2"></span>
                        In Transit
                    </span>
                </div>
            </div>

            <!-- Delivery Progress -->
            <div class="mb-8">
                <div class="flex items-center mb-4">
                    <div class="w-1/4 text-center">
                        <div class="w-8 h-8 bg-[#ff7e00] rounded-full flex items-center justify-center text-white mx-auto mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </div>
                        <p class="text-xs text-[#2f2f2f] font-medium">Order Placed</p>
                        <p class="text-xs text-[#909090]">10:30 AM</p>
                    </div>
                    <div class="w-1/4 text-center">
                        <div class="w-8 h-8 bg-[#ff7e00] rounded-full flex items-center justify-center text-white mx-auto mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </div>
                        <p class="text-xs text-[#2f2f2f] font-medium">Prepared</p>
                        <p class="text-xs text-[#909090]">10:45 AM</p>
                    </div>
                    <div class="w-1/4 text-center">
                        <div class="w-8 h-8 bg-[#ff7e00] rounded-full flex items-center justify-center text-white mx-auto mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </div>
                        <p class="text-xs text-[#2f2f2f] font-medium">In Transit</p>
                        <p class="text-xs text-[#909090]">11:00 AM</p>
                    </div>
                    <div class="w-1/4 text-center">
                        <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center text-gray-400 mx-auto mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 7h-9"></path><path d="M14 17H5"></path><circle cx="17" cy="17" r="3"></circle><circle cx="7" cy="7" r="3"></circle></svg>
                        </div>
                        <p class="text-xs text-[#2f2f2f] font-medium">Delivered</p>
                        <p class="text-xs text-[#909090]">Estimated 11:15 AM</p>
                    </div>
                </div>
                <div class="relative">
                    <div class="h-2 bg-gray-200 rounded-full">
                        <div class="h-2 bg-[#ff7e00] rounded-full" style="width: 75%"></div>
                    </div>
                </div>
            </div>

            <!-- Delivery Information -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <h3 class="text-sm font-semibold text-[#909090] mb-2">Delivery Address</h3>
                    <p class="text-[#2f2f2f]">123 Main Street</p>
                    <p class="text-[#2f2f2f]">Apt 4B</p>
                    <p class="text-[#2f2f2f]">San Francisco, CA 94105</p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-[#909090] mb-2">Delivery Details</h3>
                    <p class="text-[#2f2f2f]">Drone ID: DRN-284</p>
                    <p class="text-[#2f2f2f]">Delivery Time: 15 minutes</p>
                    <p class="text-[#2f2f2f]">Distance: 3.2 miles</p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-[#909090] mb-2">Package Information</h3>
                    <p class="text-[#2f2f2f]">Weight: 2.3 kg</p>
                    <p class="text-[#2f2f2f]">Items: 2</p>
                    <p class="text-[#2f2f2f]">Special Instructions: Leave at door</p>
                </div>
            </div>
        </div>

        <!-- Live Map -->
        <div class="bg-white p-8 rounded-xl shadow-sm mb-8">
            <h2 class="text-xl font-bold text-[#2f2f2f] mb-4">Live Tracking Map</h2>
            <div class="relative">
                <div id="map" class="h-96 w-full rounded-xl"></div>
                <div class="absolute top-4 right-4 bg-white p-4 rounded-lg shadow-md">
                    <div class="flex items-center mb-3">
                        <div class="w-3 h-3 rounded-full bg-[#ff7e00] mr-2"></div>
                        <span class="text-sm text-[#2f2f2f]">Drone Location</span>
                    </div>
                    <div class="flex items-center mb-3">
                        <div class="w-3 h-3 rounded-full bg-blue-500 mr-2"></div>
                        <span class="text-sm text-[#2f2f2f]">Starting Point</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 rounded-full bg-green-500 mr-2"></div>
                        <span class="text-sm text-[#2f2f2f]">Destination</span>
                    </div>
                </div>
            </div>
            <div class="mt-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-[#909090]">Current Location</p>
                        <p class="text-[#2f2f2f] font-medium">Mission District</p>
                    </div>
                    <div>
                        <p class="text-sm text-[#909090]">Estimated Arrival</p>
                        <p class="text-[#2f2f2f] font-medium">11:15 AM (10 minutes)</p>
                    </div>
                    <div>
                        <p class="text-sm text-[#909090]">Current Speed</p>
                        <p class="text-[#2f2f2f] font-medium">25 mph</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Details -->
        <div class="bg-white p-8 rounded-xl shadow-sm mb-8">
            <h2 class="text-xl font-bold text-[#2f2f2f] mb-6">Order Details</h2>
            <div class="border-b border-gray-200 pb-6 mb-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-semibold text-[#2f2f2f]">Items in Your Order</h3>
                    <a href="#" class="text-[#ff7e00] text-sm hover:underline">View Invoice</a>
                </div>
                <!-- Item 1 -->
                <div class="flex items-center py-3 border-b border-gray-100">
                    <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center mr-4">
                        <img src="/placeholder.svg?height=60&width=60&text=Earbuds" alt="Wireless Earbuds Pro" class="w-12 h-12 object-cover" />
                    </div>
                    <div class="flex-1">
                        <h4 class="font-medium text-[#2f2f2f]">Wireless Earbuds Pro</h4>
                        <p class="text-sm text-[#909090]">Black | 1 unit</p>
                    </div>
                    <div class="text-right">
                        <p class="font-medium text-[#2f2f2f]">$129.99</p>
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="flex items-center py-3">
                    <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center mr-4">
                        <img src="/placeholder.svg?height=60&width=60&text=Speaker" alt="Portable Bluetooth Speaker" class="w-12 h-12 object-cover" />
                    </div>
                    <div class="flex-1">
                        <h4 class="font-medium text-[#2f2f2f]">Portable Bluetooth Speaker</h4>
                        <p class="text-sm text-[#909090]">Blue | 1 unit</p>
                    </div>
                    <div class="text-right">
                        <p class="font-medium text-[#2f2f2f]">$79.99</p>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div>
                <h3 class="font-semibold text-[#2f2f2f] mb-4">Order Summary</h3>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span class="text-[#909090]">Subtotal</span>
                        <span class="text-[#2f2f2f]">$209.98</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-[#909090]">Shipping</span>
                        <span class="text-[#2f2f2f]">$9.99</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-[#909090]">Tax</span>
                        <span class="text-[#2f2f2f]">$17.50</span>
                    </div>
                    <div class="flex justify-between pt-2 border-t border-gray-100 mt-2">
                        <span class="font-bold text-[#2f2f2f]">Total</span>
                        <span class="font-bold text-[#2f2f2f]">$237.47</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4">
            <button class="flex-1 bg-[#ff7e00] text-white py-3 px-6 rounded-lg font-medium hover:bg-[#ff7e00]/90 transition-colors">
                Contact Support
            </button>
            <button class="flex-1 bg-white text-[#2f2f2f] py-3 px-6 rounded-lg font-medium border border-gray-200 hover:bg-gray-50 transition-colors">
                Share Tracking Link
            </button>
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center text-[#909090] text-sm">
        <p>&copy; 2025 Drono. All rights reserved.</p>
    </footer>
</div>

<!-- Map Initialization Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize map
        const map = L.map('map').setView([37.7749, -122.4194], 13);

        // Add tile layer (OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add starting point marker
        const startIcon = L.divIcon({
            html: `<div class="w-6 h-6 bg-blue-500 rounded-full border-2 border-white"></div>`,
            className: 'start-marker',
            iconSize: [24, 24],
            iconAnchor: [12, 12]
        });

        const startMarker = L.marker([37.7749, -122.4294], {icon: startIcon}).addTo(map);

        // Add destination marker
        const destIcon = L.divIcon({
            html: `<div class="w-6 h-6 bg-green-500 rounded-full border-2 border-white"></div>`,
            className: 'dest-marker',
            iconSize: [24, 24],
            iconAnchor: [12, 12]
        });

        const destMarker = L.marker([37.7849, -122.4094], {icon: destIcon}).addTo(map);

        // Add drone marker
        const droneIcon = L.divIcon({
            html: `<div class="w-8 h-8 bg-[#ff7e00] rounded-full border-2 border-white flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                   </div>`,
            className: 'drone-marker',
            iconSize: [32, 32],
            iconAnchor: [16, 16]
        });

        const droneMarker = L.marker([37.7799, -122.4194], {icon: droneIcon}).addTo(map);

        // Draw path between start and destination
        const pathCoordinates = [
            [37.7749, -122.4294], // start
            [37.7769, -122.4254],
            [37.7789, -122.4214],
            [37.7799, -122.4194], // current drone position
            [37.7819, -122.4154],
            [37.7839, -122.4124],
            [37.7849, -122.4094]  // destination
        ];

        // Path already traveled (solid line)
        const traveledPath = L.polyline(pathCoordinates.slice(0, 4), {
            color: '#ff7e00',
            weight: 3
        }).addTo(map);

        // Path to travel (dashed line)
        const remainingPath = L.polyline(pathCoordinates.slice(3), {
            color: '#ff7e00',
            weight: 3,
            dashArray: '5, 10',
            opacity: 0.6
        }).addTo(map);

        // Fit map to show all markers and path
        const bounds = L.latLngBounds(pathCoordinates);
        map.fitBounds(bounds, {padding: [50, 50]});

        // Simulate drone movement
        let currentPointIndex = 3; // Start from current position (index 3)

        setInterval(function() {
            if (currentPointIndex < pathCoordinates.length - 1) {
                currentPointIndex++;
                droneMarker.setLatLng(pathCoordinates[currentPointIndex]);

                // Update traveled path
                traveledPath.setLatLngs(pathCoordinates.slice(0, currentPointIndex + 1));

                // Update remaining path
                remainingPath.setLatLngs(pathCoordinates.slice(currentPointIndex));
            }
        }, 3000);
    });
</script>
</body>
</html>

