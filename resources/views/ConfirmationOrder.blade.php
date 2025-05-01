@extends('layouts.app')

@section('title', 'Order Confirmation')

@section('css')
    <style>
        .order-status-badge {
            transition: all 0.3s ease;
        }

        .tracking-map {
            height: 200px;
            background-color: #f3f4f6;
            border-radius: 0.5rem;
            position: relative;
            overflow: hidden;
        }

        .drone-animation {
            position: absolute;
            animation: flyDrone 15s infinite linear;
        }

        @keyframes flyDrone {
            0% { left: 10%; top: 50%; }
            25% { left: 40%; top: 30%; }
            50% { left: 70%; top: 60%; }
            75% { left: 40%; top: 70%; }
            100% { left: 10%; top: 50%; }
        }

        .pulse {
            border-radius: 50%;
            background: rgba(255, 126, 0, 0.4);
            animation: pulse 2s infinite;
            position: absolute;
            transform: translate(-50%, -50%);
        }

        @keyframes pulse {
            0% {
                width: 0px;
                height: 0px;
                opacity: 0.5;
            }
            100% {
                width: 50px;
                height: 50px;
                opacity: 0;
            }
        }
    </style>
@endsection

@section('content')
    <div class="py-8 md:py-12">
        <!-- Success Banner -->
        <div class="bg-gradient-to-r from-green-50 to-green-100 p-6 rounded-xl mb-8 border border-green-200">
            <div class="flex flex-col md:flex-row items-center">
                <div class="bg-green-100 p-3 rounded-full mb-4 md:mb-0 md:mr-6">
                    <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div class="text-center md:text-left">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Order Confirmed!</h1>
                    <p class="text-gray-600">Your order #ORD-{{ $order->order_number ?? '12345678' }} has been placed successfully</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Order Details Card -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-800">Order Details</h2>
                        <span class="order-status-badge px-4 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                        Processing
                    </span>
                    </div>

                    <div class="border-b pb-4 mb-4">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Order Number:</span>
                            <span class="font-medium text-gray-800">#ORD-{{ $order->order_number ?? '12345678' }}</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Date:</span>
                            <span class="font-medium text-gray-800">{{ $order->created_at ?? 'April 29, 2025' }}</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Payment Method:</span>
                            <span class="font-medium text-gray-800">{{ $order->payment_method ?? 'Credit Card' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Estimated Delivery:</span>
                            <span class="font-medium text-gray-800">{{ $estimatedDelivery ?? 'April 29, 2025 (Today)' }}</span>
                        </div>
                    </div>

                    <!-- Order Items -->
                    <h3 class="font-bold text-gray-700 mb-4">Items in Your Order</h3>

                    <div class="space-y-4 mb-6">
                        @if(isset($orderItems) && count($orderItems) > 0)
                            @foreach($orderItems as $item)
                                <!-- Item -->
                                <div class="flex items-center py-2 border-b">
                                    <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded-md mr-4">
                                    <div class="flex-grow">
                                        <h4 class="font-medium text-gray-800">{{ $item->product->name }}</h4>
                                        <p class="text-gray-500 text-sm">Qty: {{ $item->quantity }}</p>
                                    </div>
                                    <p class="font-medium text-gray-800">${{ number_format($item->price, 2) }}</p>
                                </div>
                            @endforeach
                        @else
                            <!-- Sample Item 1 -->
                            <div class="flex items-center py-2 border-b">
                                <div class="w-16 h-16 bg-gray-100 rounded-md mr-4 flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                                    </svg>
                                </div>
                                <div class="flex-grow">
                                    <h4 class="font-medium text-gray-800">Phantom 4 Pro Drone</h4>
                                    <p class="text-gray-500 text-sm">Qty: 1</p>
                                </div>
                                <p class="font-medium text-gray-800">$1,299.00</p>
                            </div>

                            <!-- Sample Item 2 -->
                            <div class="flex items-center py-2 border-b">
                                <div class="w-16 h-16 bg-gray-100 rounded-md mr-4 flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div class="flex-grow">
                                    <h4 class="font-medium text-gray-800">Extra Propeller Set</h4>
                                    <p class="text-gray-500 text-sm">Qty: 2</p>
                                </div>
                                <p class="font-medium text-gray-800">$49.98</p>
                            </div>
                        @endif
                    </div>

                    <!-- Order Summary -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-medium">${{ $order->subtotal ?? '1,348.98' }}</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Shipping</span>
                            <span class="font-medium">${{ $order->shipping ?? '15.00' }}</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Tax</span>
                            <span class="font-medium">${{ $order->tax ?? '108.00' }}</span>
                        </div>
                        <div class="h-px bg-gray-200 my-2"></div>
                        <div class="flex justify-between font-bold">
                            <span class="text-gray-800">Total</span>
                            <span class="text-primary">${{ $order->total ?? '1,471.98' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Tracking Information -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Delivery Tracking</h2>

                    <div class="tracking-map mb-6">
                        <!-- Map Placeholder with Animated Drone -->
                        <div class="w-full h-full flex items-center justify-center relative">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <svg class="w-32 h-32 text-gray-200" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M50 20C33.431 20 20 33.431 20 50C20 66.569 33.431 80 50 80C66.569 80 80 66.569 80 50C80 33.431 66.569 20 50 20ZM50 80C33.431 80 20 66.569 20 50C20 33.431 33.431 20 50 20C66.569 20 80 33.431 80 50C80 66.569 66.569 80 50 80Z" stroke="currentColor" stroke-width="2"/>
                                    <path d="M80 50H90" stroke="currentColor" stroke-width="2"/>
                                    <path d="M10 50H20" stroke="currentColor" stroke-width="2"/>
                                    <path d="M50 20V10" stroke="currentColor" stroke-width="2"/>
                                    <path d="M50 90V80" stroke="currentColor" stroke-width="2"/>
                                </svg>
                            </div>

                            <!-- House icon (destination) -->
                            <div class="absolute right-8 bottom-8">
                                <svg class="w-10 h-10 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                </svg>
                            </div>

                            <!-- Store icon (origin) -->
                            <div class="absolute left-8 top-8">
                                <svg class="w-10 h-10 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                </svg>
                            </div>

                            <!-- Animated Drone -->
                            <div class="drone-animation">
                                <div class="pulse"></div>
                                <svg class="w-12 h-12 text-primary" viewBox="0 0 100 100" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <!-- Drone body -->
                                    <rect x="35" y="42" width="30" height="15" rx="3" fill="currentColor"/>
                                    <!-- Drone arms -->
                                    <rect x="20" y="47" width="25" height="4" rx="2" fill="currentColor"/>
                                    <rect x="55" y="47" width="25" height="4" rx="2" fill="currentColor"/>
                                    <!-- Rotors animation will be handled by CSS -->
                                    <circle cx="20" cy="49" r="8" fill="currentColor" fill-opacity="0.3"/>
                                    <circle cx="80" cy="49" r="8" fill="currentColor" fill-opacity="0.3"/>
                                    <circle cx="35" cy="49" r="5" fill="currentColor" fill-opacity="0.3"/>
                                    <circle cx="65" cy="49" r="5" fill="currentColor" fill-opacity="0.3"/>
                                    <!-- Camera -->
                                    <circle cx="50" cy="53" r="4" fill="white"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Delivery Timeline -->
                    <h3 class="font-bold text-gray-700 mb-4">Delivery Progress</h3>

                    <div class="space-y-6">
                        <div class="relative">
                            <!-- Timeline connector -->
                            <div class="absolute top-0 left-6 h-full w-0.5 bg-gray-200 z-0"></div>

                            <!-- Timeline steps -->
                            <div class="relative flex items-start z-10 mb-6">
                                <div class="bg-green-500 rounded-full h-12 w-12 flex items-center justify-center shadow-sm mr-4">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800">Order Confirmed</h4>
                                    <p class="text-sm text-gray-500">{{ $orderConfirmedTime ?? 'Today, 10:30 AM' }}</p>
                                    <p class="text-sm text-gray-600 mt-1">Your order has been received and is being processed</p>
                                </div>
                            </div>

                            <div class="relative flex items-start z-10 mb-6">
                                <div class="bg-green-500 rounded-full h-12 w-12 flex items-center justify-center shadow-sm mr-4">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800">Order Processing</h4>
                                    <p class="text-sm text-gray-500">{{ $orderProcessingTime ?? 'Today, 10:45 AM' }}</p>
                                    <p class="text-sm text-gray-600 mt-1">Your items are being prepared for delivery</p>
                                </div>
                            </div>

                            <div class="relative flex items-start z-10 mb-6">
                                <div class="bg-yellow-500 rounded-full h-12 w-12 flex items-center justify-center shadow-sm mr-4 animate-pulse">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800">Ready for Delivery</h4>
                                    <p class="text-sm text-gray-500">{{ $readyForDeliveryTime ?? 'Estimated: Today, 2:00 PM' }}</p>
                                    <p class="text-sm text-gray-600 mt-1">Your order will be loaded onto a drone shortly</p>
                                </div>
                            </div>

                            <div class="relative flex items-start z-10">
                                <div class="bg-gray-200 rounded-full h-12 w-12 flex items-center justify-center shadow-sm mr-4">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-400">Delivered</h4>
                                    <p class="text-sm text-gray-500">{{ $deliveredTime ?? 'Estimated: Today, 3:15 PM' }}</p>
                                    <p class="text-sm text-gray-400 mt-1">Your order will be delivered to your doorstep</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Sidebar -->
            <div class="lg:col-span-1">
                <!-- Shipping Information -->
                <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Shipping Address</h2>
                    <div class="border-b pb-4 mb-4">
                        <p class="font-medium text-gray-800">{{ $order->shipping_name ?? 'John Doe' }}</p>
                        <p class="text-gray-600 mt-1">{{ $order->shipping_address ?? '123 Drone Street' }}</p>
                        <p class="text-gray-600">{{ $order->shipping_city ?? 'San Francisco' }}, {{ $order->shipping_state ?? 'CA' }} {{ $order->shipping_zip ?? '94107' }}</p>
                        <p class="text-gray-600">{{ $order->shipping_country ?? 'United States' }}</p>
                        <p class="text-gray-600 mt-2">{{ $order->shipping_phone ?? '(555) 123-4567' }}</p>
                    </div>

                    <!-- Delivery Instructions -->
                    <div>
                        <h3 class="font-bold text-gray-700 mb-2">Delivery Instructions</h3>
                        <p class="text-gray-600 text-sm italic">{{ $order->delivery_instructions ?? 'Please leave the package at the front door. The drone landing pad is on the right side of the driveway.' }}</p>
                    </div>
                </div>

                <!-- Actions Card -->
                <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Need Help?</h2>

                    <div class="space-y-4">
                        <a href="/orders" class="flex items-center py-3 px-4 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors">
                            <svg class="w-5 h-5 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <span class="font-medium text-gray-700">View All Orders</span>
                        </a>

                        <a href="/contact" class="flex items-center py-3 px-4 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors">
                            <svg class="w-5 h-5 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span class="font-medium text-gray-700">Contact Support</span>
                        </a>

                        <a href="/store" class="flex items-center py-3 px-4 bg-primary/10 hover:bg-primary/20 rounded-lg transition-colors">
                            <svg class="w-5 h-5 text-primary mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            <span class="font-medium text-primary">Continue Shopping</span>
                        </a>
                    </div>
                </div>

                <!-- Recommendations -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">You Might Also Like</h2>

                    <div class="space-y-4">
                        <div class="flex items-center py-2">
                            <div class="w-16 h-16 bg-gray-100 rounded-md mr-4 flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div class="flex-grow">
                                <h4 class="font-medium text-gray-800">Extra Battery Pack</h4>
                                <p class="text-gray-500 text-sm">$89.99</p>
                            </div>
                            <a href="/product/battery" class="text-primary text-sm font-medium hover:underline">View</a>
                        </div>

                        <div class="flex items-center py-2">
                            <div class="w-16 h-16 bg-gray-100 rounded-md mr-4 flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div class="flex-grow">
                                <h4 class="font-medium text-gray-800">Drone Carrying Case</h4>
                                <p class="text-gray-500 text-sm">$129.99</p>
                            </div>
                            <a href="/product/case" class="text-primary text-sm font-medium hover:underline">View</a>
                        </div>

                        <div class="flex items-center py-2">
                            <div class="w-16 h-16 bg-gray-100 rounded-md mr-4 flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div class="flex-grow">
                                <h4 class="font-medium text-gray-800">Pro Controller</h4>
                                <p class="text-gray-500 text-sm">$199.99</p>
                            </div>
                            <a href="/product/controller" class="text-primary text-sm font-medium hover:underline">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Improve animation for drone on the map
        document.addEventListener('DOMContentLoaded', function() {
            // You could add real-time updates here with a websocket or polling

            // For demonstration, simulate a status update after 5 seconds
            setTimeout(function() {
                const statusBadge = document.querySelector('.order-status-badge');
                if (statusBadge) {
                    statusBadge.classList.remove('bg-yellow-100', 'text-yellow-800');
                    statusBadge.classList.add('bg-green-100', 'text-green-800');
                    statusBadge.textContent = 'Preparing for Delivery';
                }
            }, 5000);
        });
    </script>
@endsection
