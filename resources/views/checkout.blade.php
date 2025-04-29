@extends('layouts.app')

@section('title', 'Checkout')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        /* Map styling */
        #map {
            height: 300px;
            width: 100%;
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
        }

        /* Animations */
        .animate-pulse {
            animation: pulse 1.5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }
    </style>
@endsection

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-text mb-2">Complete Your Order</h1>
        <p class="text-secondary mb-6">You're just a few steps away from drone delivery!</p>

        <!-- Checkout Progress Steps -->
        <div class="flex items-center justify-center mb-12 relative">
            <div class="flex items-center relative">
                <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-medium border-2 bg-green-500 text-white border-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="text-xs font-medium mt-1 absolute -bottom-5 whitespace-nowrap text-green-500">Cart</div>
            </div>
            <div class="h-1 w-16 mx-2 bg-primary"></div>
            <div class="flex items-center relative">
                <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-medium border-2 bg-primary text-white border-primary">
                    2
                </div>
                <div class="text-xs font-medium mt-1 absolute -bottom-5 whitespace-nowrap text-primary">Checkout</div>
            </div>
            <div class="h-1 w-16 mx-2 bg-gray-300"></div>
            <div class="flex items-center relative">
                <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-medium border-2 bg-white text-gray-400 border-gray-300">
                    3
                </div>
                <div class="text-xs font-medium mt-1 absolute -bottom-5 whitespace-nowrap text-gray-400">Confirmation</div>
            </div>
        </div>

        <form id="checkout-form" action="{{route('order.create')}}" method="POST">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 space-y-6">
                    <!-- Delivery Location Section -->
                    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                        <h2 class="text-xl font-semibold text-text mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Delivery Location
                        </h2>

                        <p class="text-sm text-secondary mb-4">For precise drone delivery, we need your exact coordinates. Please click the button below to automatically detect your location.</p>

                        <!-- Location Status Alert -->
                        <div id="location-status" class="hidden mb-4"></div>

                        <!-- Get Location Button -->
                        <button id="get-location-btn" type="button" class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg flex items-center justify-center shadow-sm mb-4 w-full sm:w-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Get My Precise Location
                        </button>

                        <!-- Map Container -->
                        <div id="map" class="mb-4"></div>

                        <!-- Hidden Location Fields -->
                        <input type="hidden" id="latitude" name="latitude">
                        <input type="hidden" id="longitude" name="longitude">

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="street" class="block text-sm font-medium text-text mb-1">Street Address</label>
                                <input type="text" id="street" name="street" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent" required>
                            </div>
                            <div class="mb-4">
                                <label for="apartment" class="block text-sm font-medium text-text mb-1">Apartment/Suite (Optional)</label>
                                <input type="text" id="apartment" name="apartment" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="mb-4">
                                <label for="city" class="block text-sm font-medium text-text mb-1">City</label>
                                <input type="text" id="city" name="city" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent" required>
                            </div>
                            <div class="mb-4">
                                <label for="state" class="block text-sm font-medium text-text mb-1">State/Province</label>
                                <input type="text" id="state" name="state" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent" required>
                            </div>
                            <div class="mb-4">
                                <label for="zip" class="block text-sm font-medium text-text mb-1">Postal Code</label>
                                <input type="text" id="zip" name="zip" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent" required>
                            </div>
                        </div>

                        <div class="mb-0">
                            <label for="delivery_notes" class="block text-sm font-medium text-text mb-1">Delivery Instructions (Optional)</label>
                            <textarea id="delivery_notes" name="delivery_notes" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent" placeholder="e.g., Land on the balcony, place near the front door, etc."></textarea>
                        </div>
                    </div>

                    <!-- Contact Information Section -->
                    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                        <h2 class="text-xl font-semibold text-text mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Contact Information
                        </h2>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="first_name" class="block text-sm font-medium text-text mb-1">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent" required>
                            </div>
                            <div class="mb-4">
                                <label for="last_name" class="block text-sm font-medium text-text mb-1">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-text mb-1">Email Address</label>
                                <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent" required>
                            </div>
                            <div class="mb-4">
                                <label for="phone" class="block text-sm font-medium text-text mb-1">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent" required>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method Section -->
                    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                        <h2 class="text-xl font-semibold text-text mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            Payment Method
                        </h2>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                            <!-- Credit Card Option -->
                            <div id="card-method" class="border-2 border-primary bg-primary/5 rounded-lg p-4 flex items-center cursor-pointer transition-all" onclick="selectPaymentMethod('card')">
                                <input type="radio" name="payment_method" value="card" class="hidden" checked>
                                <div class="bg-primary/10 p-2 rounded-full mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-text">Credit Card</p>
                                    <p class="text-xs text-secondary">Visa, Mastercard, Amex</p>
                                </div>
                            </div>

                            <!-- PayPal Option -->
                            <div id="paypal-method" class="border-2 border-gray-200 rounded-lg p-4 flex items-center cursor-pointer transition-all hover:bg-gray-50" onclick="selectPaymentMethod('paypal')">
                                <input type="radio" name="payment_method" value="paypal" class="hidden">
                                <div class="bg-[#003087]/10 p-2 rounded-full mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#003087]" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M7.076 21.337H2.47a.641.641 0 0 1-.633-.74L4.944 3.72a.381.381 0 0 1 .375-.32h6.419c3.07 0 5.522 1.012 6.512 3.814.473 1.33.51 2.477.112 3.428-.31.745-.809 1.348-1.442 1.826 1.89.591 2.552 2.175 2.258 3.837-.295 1.66-1.043 2.748-2.233 3.63-1.266.939-2.875 1.402-4.993 1.402h-.468l-.002-.023c-2.44 0-3.903 0-4.406 0zm1.373-2.375l.116-.756c.067-.323.373-.558.713-.558h1.424c.928 0 1.803-.148 2.394-.456.61-.317 1.073-.833 1.356-1.533.418-1.033.218-1.72-.309-2.19-.445-.396-1.19-.571-2.283-.571H9.77c-.287 0-.548.025-.815.075-.347.053-.58.305-.643.622l-1.08 5.367h1.217zm1.617-8.739l.1-.601c.066-.33.374-.568.714-.568H12c.928 0 1.803-.148 2.394-.456.61-.317 1.073-.833 1.356-1.533.417-1.033.217-1.72-.31-2.19-.445-.396-1.19-.571-2.283-.571H11.05a.888.888 0 0 0-.814.5l-1.08 5.42h-.09z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-text">PayPal</p>
                                    <p class="text-xs text-secondary">Pay with PayPal account</p>
                                </div>
                            </div>

                            <!-- Apple Pay Option -->
                            <div id="apple_pay-method" class="border-2 border-gray-200 rounded-lg p-4 flex items-center cursor-pointer transition-all hover:bg-gray-50" onclick="selectPaymentMethod('apple_pay')">
                                <input type="radio" name="payment_method" value="apple_pay" class="hidden">
                                <div class="bg-black/10 p-2 rounded-full mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M17.6 7.2C16.9 7.9 16.7 8.9 16.7 9.5C16.8 10.5 17.3 11.4 17.9 12C18.3 12.4 18.8 12.8 19.3 12.9C19.1 13.8 18.8 14.6 18.4 15.4C17.8 16.5 17.2 17.6 16.2 17.6C15.2 17.7 14.9 17.1 13.8 17.1C12.6 17.1 12.3 17.6 11.4 17.7C10.5 17.7 9.8 16.8 9.2 15.7C8.1 13.6 7.2 9.9 8.4 7.4C8.9 6.2 10 5.4 11.1 5.4C12.2 5.3 13 6 13.9 6C14.8 6 15.5 5.4 16.8 5.4C17.8 5.4 18.7 6 19.3 6.9C17.2 8 17.5 12.1 19.7 12.8C19.5 13.3 19.4 13.5 19.2 14.1C18.8 15 18.3 16 17.6 17.2C17 18.3 16.2 19.8 15 19.9C14.1 19.9 13.7 19.3 12.6 19.3C11.6 19.3 11.1 19.9 10.3 19.9C9.1 19.9 8.4 18.5 7.8 17.4C6.9 15.7 6.2 13.1 6.1 10.7C6.1 9.4 6.3 8.1 6.9 7C7.8 5.4 9.3 4.4 10.9 4.4C12 4.4 13.2 5.1 13.9 5.1C14.6 5.1 16 4.3 17.6 4.3C18.5 4.3 19.4 4.6 20.1 5.2C19.3 5.8 18.3 6.5 17.6 7.2Z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-text">Apple Pay</p>
                                    <p class="text-xs text-secondary">Fast and secure checkout</p>
                                </div>
                            </div>
                        </div>

                        <!-- Credit Card Details -->
                        <div id="card-details" class="payment-details">
                            <div class="mb-4">
                                <label for="card_number" class="block text-sm font-medium text-text mb-1">Card Number</label>
                                <div class="relative">
                                    <input type="text" id="card_number" name="card_number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent pl-10" placeholder="1234 5678 9012 3456" maxlength="19">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <div class="mb-4">
                                    <label for="expiry_date" class="block text-sm font-medium text-text mb-1">Expiry Date</label>
                                    <input type="text" id="expiry_date" name="expiry_date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent" placeholder="MM/YY" maxlength="5">
                                </div>
                                <div class="mb-4">
                                    <label for="cvv" class="block text-sm font-medium text-text mb-1">CVV</label>
                                    <div class="relative">
                                        <input type="text" id="cvv" name="cvv" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent" placeholder="123" maxlength="4">
                                        <div class="group absolute top-1/2 right-3 transform -translate-y-1/2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <div class="hidden group-hover:block absolute right-0 bottom-6 bg-gray-800 text-white text-xs rounded py-1 px-2 w-48">
                                                The 3 or 4 digit security code on the back of your card
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="name_on_card" class="block text-sm font-medium text-text mb-1">Name on Card</label>
                                    <input type="text" id="name_on_card" name="name_on_card" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent">
                                </div>
                            </div>
                        </div>

                        <!-- PayPal Details -->
                        <div id="paypal-details" class="payment-details hidden">
                            <div class="bg-blue-50 p-4 rounded-lg">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="text-blue-700">You will be redirected to PayPal to complete your payment after reviewing your order.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Apple Pay Details -->
                        <div id="apple_pay-details" class="payment-details hidden">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="text-gray-700">Apple Pay will be available on the next step after reviewing your order.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-md p-6 mb-6 sticky top-6">
                        <h2 class="text-xl font-semibold text-text mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            Order Summary
                        </h2>

                        <div id="orderSummary">
                            <!-- Content will be populated dynamically by JS -->
                            <div class="flex justify-center p-6">
                                <svg class="animate-spin h-8 w-8 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Estimated Delivery -->
                        <div class="mt-6 bg-primary/5 rounded-lg p-3">
                            <div class="flex items-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="font-medium text-text">Estimated Delivery</span>
                            </div>
                            <p class="text-sm text-secondary ml-7">Within 30 minutes after order confirmation</p>
                        </div>

                        <!-- Terms and Submit -->
                        <div class="mt-6">
                            <div class="mb-6">
                                <label class="flex items-start">
                                    <input type="checkbox" name="terms_accepted" required class="rounded text-primary focus:ring-primary mt-1 mr-2">
                                    <span class="text-sm text-secondary">I agree to the <a href="" class="text-primary hover:underline" target="_blank">Terms and Conditions</a> and <a href="" class="text-primary hover:underline" target="_blank">Privacy Policy</a></span>
                                </label>
                            </div>

                            <button type="submit" class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-3 px-4 rounded-lg shadow-md transition-colors flex items-center justify-center">
                                <span>Complete Order</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            <div class="flex items-center justify-center mt-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-xs text-secondary">Secured payment and data protection</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="{{ asset('js/checkout.js') }}"></script>
@endsection
