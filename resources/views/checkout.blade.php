@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    <!-- Breadcrumbs -->
    <div class="border-b mt-10">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex text-sm">
                <a href="{{ route('index') }}" class="text-secondary hover:text-primary">Home</a>
                <span class="mx-2 text-secondary">/</span>
                <a href="{{ route('cart') }}" class="text-secondary hover:text-primary">Cart</a>
                <span class="mx-2 text-secondary">/</span>
                <span class="text-text font-medium">Checkout</span>
            </nav>
        </div>
    </div>

    <!-- Main Checkout Content -->
    <div class="py-8">
        <h1 class="text-3xl font-bold text-text mb-8">Checkout</h1>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Checkout Form -->
            <div class="lg:w-2/3">
                <!-- Delivery Location -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-8">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-text">Delivery Location</h2>
                    </div>
                    <div class="p-6">
                        <form method="POST" action="{{ route('checkout') }}" class="space-y-6" id="delivery-form">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="latitude" class="block text-sm font-medium text-gray-700 mb-1">Latitude</label>
                                    <input type="text" id="latitude" name="latitude" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary/20" value="{{ old('latitude') }}" required readonly />
                                    @error('latitude')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="longitude" class="block text-sm font-medium text-gray-700 mb-1">Longitude</label>
                                    <input type="text" id="longitude" name="longitude" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary/20" value="{{ old('longitude') }}" required readonly />
                                    @error('longitude')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Map Section -->
                            <div class="mt-6">
                                <div id="delivery-map" class="w-full h-64 bg-gray-100 rounded-lg"></div>
                                <p class="text-sm text-secondary mt-2">Click the button below to retrieve your current location and set it for delivery.</p>
                            </div>

                            <!-- Get Location Button -->
                            <div class="mt-4">
                                <button type="button" id="get-location-btn" class="px-6 py-2 bg-primary text-white font-medium rounded-md hover:bg-primary/90 transition-all">
                                    Get My Location
                                </button>
                            </div>

                            <div class="flex items-start mt-6">
                                <div class="flex items-center h-5">
                                    <input id="save-location" name="save_location" type="checkbox" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" {{ old('save_location') ? 'checked' : '' }} />
                                </div>
                                <div class="ml-3">
                                    <label for="save-location" class="text-sm text-gray-700">Save this location for future orders</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:w-1/3">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden sticky top-6">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-text">Order Summary</h2>
                    </div>
                    <div class="p-6">
                        <!-- Order Summary Content -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Leaflet.js -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        let map, marker;

        // Initialize OpenStreetMap with Leaflet.js
        function initMap() {
            // Default position (latitude, longitude)
            const defaultPosition = [0, 0];

            // Create the map
            map = L.map('delivery-map').setView(defaultPosition, 13);

            // Add OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Add a draggable marker
            marker = L.marker(defaultPosition, { draggable: true }).addTo(map);

            // Update latitude and longitude when marker is dragged
            marker.on('dragend', () => {
                const position = marker.getLatLng();
                document.getElementById('latitude').value = position.lat;
                document.getElementById('longitude').value = position.lng;
            });
        }

        // Get user's current location
        document.getElementById('get-location-btn').addEventListener('click', () => {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const { latitude, longitude } = position.coords;
                        document.getElementById('latitude').value = latitude;
                        document.getElementById('longitude').value = longitude;

                        // Update map and marker position
                        const userPosition = [latitude, longitude];
                        map.setView(userPosition, 13);
                        marker.setLatLng(userPosition);
                    },
                    (error) => {
                        alert('Error retrieving location: ' + error.message);
                    }
                );
            } else {
                alert('Geolocation is not supported by your browser.');
            }
        });

        // Initialize the map on page load
        document.addEventListener('DOMContentLoaded', initMap);
    </script>
@endsection
