@extends('layouts.app')

@section('title', 'Order Confirmation')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        .status-ring {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }

        #map {
            height: 300px;
            width: 100%;
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
        }
    </style>
@endsection

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-8">
        <!-- Success Message -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-green-100 rounded-full mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-500"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </div>
            <h1 class="text-4xl font-bold text-text mb-4">Order Confirmed!</h1>
            <p class="text-secondary max-w-2xl mx-auto">Thank you for your order. Your drone delivery has been scheduled and will be dispatched shortly.</p>
        </div>

        <!-- Order Details Card -->
        <div class="bg-white p-8 rounded-xl shadow-sm mb-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                <div>
                    <span class="text-sm text-secondary">Order ID:</span>
                    <h2 class="text-xl font-bold text-text">#DR384729</h2>
                </div>
                <div class="mt-4 md:mt-0">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-600">
                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                        Order Confirmed
                    </span>
                </div>
            </div>

            <!-- Delivery Map Section -->
            <div class="mb-8">
                <h3 class="text-sm font-semibold text-secondary mb-4">Delivery Route</h3>
                <div class="relative">
                    <div id="map" class="mb-4"></div>
                    <div class="absolute top-4 right-4 bg-white p-4 rounded-lg shadow-md">
                        <div class="flex items-center mb-3">
                            <div class="w-3 h-3 rounded-full bg-blue-500 mr-2"></div>
                            <span class="text-sm text-text">Starting Point</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <div class="w-3 h-3 rounded-full bg-green-500 mr-2"></div>
                            <span class="text-sm text-text">Destination</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 rounded-full bg-primary mr-2"></div>
                            <span class="text-sm text-text">Drone Path</span>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-secondary mb-1">Estimated Time</p>
                        <p class="text-text font-medium">15 minutes</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-secondary mb-1">Distance</p>
                        <p class="text-text font-medium">3.2 miles</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-secondary mb-1">Delivery Time</p>
                        <p class="text-text font-medium">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2025-05-01 16:30:21')->addMinutes(15)->format('g:i A') }}</p>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="border-t border-gray-200 pt-6">
                <h3 class="font-semibold text-text mb-4">Order Summary</h3>
                <div class="flex items-center py-3 border-b border-gray-100">
                    <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center mr-4">
                        <img src="/placeholder.svg?height=60&width=60&text=Earbuds" alt="Wireless Earbuds Pro" class="w-12 h-12 object-cover" />
                    </div>
                    <div class="flex-1">
                        <h4 class="font-medium text-text">Wireless Earbuds Pro</h4>
                        <p class="text-sm text-secondary">Black | 1 unit</p>
                    </div>
                    <div class="text-right">
                        <p class="font-medium text-text">$129.99</p>
                    </div>
                </div>
                <div class="flex items-center py-3">
                    <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center mr-4">
                        <img src="/placeholder.svg?height=60&width=60&text=Speaker" alt="Portable Bluetooth Speaker" class="w-12 h-12 object-cover" />
                    </div>
                    <div class="flex-1">
                        <h4 class="font-medium text-text">Portable Bluetooth Speaker</h4>
                        <p class="text-sm text-secondary">Blue | 1 unit</p>
                    </div>
                    <div class="text-right">
                        <p class="font-medium text-text">$79.99</p>
                    </div>
                </div>
            </div>

            <!-- Payment Summary -->
            <div class="border-t border-gray-200 mt-6 pt-6">
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span class="text-secondary">Subtotal</span>
                        <span class="text-text">$209.98</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-secondary">Shipping</span>
                        <span class="text-text">$9.99</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-secondary">Tax</span>
                        <span class="text-text">$17.50</span>
                    </div>
                    <div class="flex justify-between pt-2 border-t border-gray-100 mt-2">
                        <span class="font-bold text-text">Total</span>
                        <span class="font-bold text-text">$237.47</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="{{ url('/track-order') }}"
               class="flex-1 bg-primary text-white py-3 px-6 rounded-lg font-medium hover:bg-primary/90 transition-colors text-center">
                Track Your Order
            </a>
            <button onclick="window.print()"
                    class="flex-1 bg-white text-text py-3 px-6 rounded-lg font-medium border border-gray-200 hover:bg-gray-50 transition-colors">
                Print Receipt
            </button>
        </div>

        <!-- Additional Information -->
        <div class="mt-8 text-center">
            <p class="text-secondary mb-2">A confirmation email has been sent to {{ 'EssadeqBillouche' }}'s email address.</p>
            <p class="text-secondary">Questions about your order? <a href="{{ url('/contact') }}" class="text-primary hover:underline">Contact our support team</a></p>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hide preloader
            const preloader = document.getElementById('preloader');
            if (preloader) {
                preloader.style.display = 'none';
            }

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

            // Draw completed path
            const pathCoordinates = [
                [37.7749, -122.4294], // start
                [37.7769, -122.4254],
                [37.7789, -122.4214],
                [37.7799, -122.4194],
                [37.7819, -122.4154],
                [37.7839, -122.4124],
                [37.7849, -122.4094]  // destination
            ];

            // Draw solid line for the entire path
            const completedPath = L.polyline(pathCoordinates, {
                color: '#ff7e00',
                weight: 3
            }).addTo(map);

            // Fit map to show all markers and path
            const bounds = L.latLngBounds(pathCoordinates);
            map.fitBounds(bounds, {padding: [50, 50]});
        });
    </script>
@endsection
