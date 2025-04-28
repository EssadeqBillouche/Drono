@extends('layouts.app')

@section('title', 'Checkout - Drone Delivery')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        .form-section {
            @apply bg-white rounded-lg shadow-md p-6 mb-6;
        }

        .section-title {
            @apply text-lg font-semibold text-gray-800 mb-4 flex items-center;
        }

        .section-icon {
            @apply w-5 h-5 mr-2 text-primary;
        }

        .input-group {
            @apply mb-4;
        }

        .input-label {
            @apply block text-sm font-medium text-gray-700 mb-1;
        }

        .text-input {
            @apply w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent;
        }

        .payment-method-card {
            @apply border-2 border-gray-200 rounded-lg p-4 flex items-center cursor-pointer transition-all;
        }

        .payment-method-card:hover {
            @apply bg-gray-50;
        }

        .payment-method-card.selected {
            @apply border-primary bg-primary/5;
        }

        .payment-icon {
            @apply w-10 h-10 mr-3;
        }

        #map {
            height: 300px;
            width: 100%;
            border-radius: 0.5rem;
        }

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

        .hidden {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <h1 class="text-2xl font-bold text-gray-900 mb-8">Complete Your Order</h1>

        <form id="checkout-form" action="" method="POST">
            @csrf

            <!-- Delivery Information -->
            <div class="form-section">
                <h2 class="section-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="section-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Delivery Location
                </h2>

                <div class="mb-4">
                    <p class="text-sm text-gray-600 mb-2">Set your precise delivery location for our drone to find you.</p>

                    <div id="location-status" class="hidden"></div>

                    <button id="get-location-btn" type="button" class="bg-primary text-white px-4 py-2 rounded-lg flex items-center justify-center shadow-md hover:bg-primary/90 transition-colors mb-4 w-full sm:w-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Get My Precise Location
                    </button>

                    <!-- Map container -->
                    <div id="map" class="border border-gray-300 mb-4"></div>

                    <!-- Hidden fields for coordinates -->
                    <input type="hidden" id="latitude" name="latitude">
                    <input type="hidden" id="longitude" name="longitude">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="input-group">
                        <label for="street" class="input-label">Street Address</label>
                        <input type="text" id="street" name="street" class="text-input" required>
                    </div>
                    <div class="input-group">
                        <label for="apartment" class="input-label">Apartment/Suite (Optional)</label>
                        <input type="text" id="apartment" name="apartment" class="text-input">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="input-group">
                        <label for="city" class="input-label">City</label>
                        <input type="text" id="city" name="city" class="text-input" required>
                    </div>
                    <div class="input-group">
                        <label for="state" class="input-label">State/Province</label>
                        <input type="text" id="state" name="state" class="text-input" required>
                    </div>
                    <div class="input-group">
                        <label for="zip" class="input-label">Postal Code</label>
                        <input type="text" id="zip" name="zip" class="text-input" required>
                    </div>
                </div>

                <div class="input-group">
                    <label for="delivery_notes" class="input-label">Delivery Instructions (Optional)</label>
                    <textarea id="delivery_notes" name="delivery_notes" rows="2" class="text-input" placeholder="e.g., Leave on the balcony, land on the marked landing pad, etc."></textarea>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="form-section">
                <h2 class="section-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="section-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Contact Information
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="input-group">
                        <label for="first_name" class="input-label">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="text-input" required>
                    </div>
                    <div class="input-group">
                        <label for="last_name" class="input-label">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="text-input" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="input-group">
                        <label for="email" class="input-label">Email Address</label>
                        <input type="email" id="email" name="email" class="text-input" required>
                    </div>
                    <div class="input-group">
                        <label for="phone" class="input-label">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="text-input" required>
                    </div>
                </div>
            </div>

            <!-- Payment Method -->
            <div class="form-section">
                <h2 class="section-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="section-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                    Payment Method
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                    <!-- Credit Card Option -->
                    <div id="card-method" class="payment-method-card selected" onclick="selectPaymentMethod('card')">
                        <input type="radio" name="payment_method" value="card" class="hidden" checked>
                        <img src="{{ asset('images/credit-card.svg') }}" alt="Credit Card" class="payment-icon">
                        <div>
                            <p class="font-medium">Credit Card</p>
                            <p class="text-xs text-gray-500">Visa, Mastercard, Amex</p>
                        </div>
                    </div>

                    <!-- PayPal Option -->
                    <div id="paypal-method" class="payment-method-card" onclick="selectPaymentMethod('paypal')">
                        <input type="radio" name="payment_method" value="paypal" class="hidden">
                        <img src="{{ asset('images/paypal.svg') }}" alt="PayPal" class="payment-icon">
                        <div>
                            <p class="font-medium">PayPal</p>
                            <p class="text-xs text-gray-500">Pay with your PayPal account</p>
                        </div>
                    </div>

                    <!-- Apple Pay Option -->
                    <div id="apple_pay-method" class="payment-method-card" onclick="selectPaymentMethod('apple_pay')">
                        <input type="radio" name="payment_method" value="apple_pay" class="hidden">
                        <img src="{{ asset('images/apple-pay.svg') }}" alt="Apple Pay" class="payment-icon">
                        <div>
                            <p class="font-medium">Apple Pay</p>
                            <p class="text-xs text-gray-500">Fast and secure checkout</p>
                        </div>
                    </div>
                </div>

                <!-- Credit Card Details -->
                <div id="card-details" class="payment-details">
                    <div class="grid grid-cols-1 gap-4">
                        <div class="input-group">
                            <label for="card_number" class="input-label">Card Number</label>
                            <div class="relative">
                                <input type="text" id="card_number" name="card_number" class="text-input pl-10" placeholder="1234 5678 9012 3456" maxlength="19">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="input-group sm:col-span-1">
                                <label for="expiry_date" class="input-label">Expiry Date</label>
                                <input type="text" id="expiry_date" name="expiry_date" class="text-input" placeholder="MM/YY" maxlength="5">
                            </div>
                            <div class="input-group sm:col-span-1">
                                <label for="cvv" class="input-label">CVV</label>
                                <div class="relative">
                                    <input type="text" id="cvv" name="cvv" class="text-input" placeholder="123" maxlength="4">
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
                            <div class="input-group sm:col-span-1">
                                <label for="name_on_card" class="input-label">Name on Card</label>
                                <input type="text" id="name_on_card" name="name_on_card" class="text-input">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PayPal Details -->
                <div id="paypal-details" class="payment-details hidden">
                    <p class="text-gray-600 mb-4">You will be redirected to PayPal to complete your payment.</p>
                    <img src="{{ asset('images/paypal-button.png') }}" alt="PayPal Checkout" class="h-12">
                </div>

                <!-- Apple Pay Details -->
                <div id="apple_pay-details" class="payment-details hidden">
                    <p class="text-gray-600 mb-4">Click the button below to pay with Apple Pay.</p>
                    <button type="button" class="bg-black text-white py-2 px-4 rounded-lg flex items-center">
                        <svg viewBox="0 0 24 24" class="h-5 w-5 mr-2" fill="currentColor">
                            <path d="M17.6 7.2C16.9 7.9 16.7 8.9 16.7 9.5C16.8 10.5 17.3 11.4 17.9 12C18.3 12.4 18.8 12.8 19.3 12.9C19.1 13.8 18.8 14.6 18.4 15.4C17.8 16.5 17.2 17.6 16.2 17.6C15.2 17.7 14.9 17.1 13.8 17.1C12.6 17.1 12.3 17.6 11.4 17.7C10.5 17.7 9.8 16.8 9.2 15.7C8.1 13.6 7.2 9.9 8.4 7.4C8.9 6.2 10 5.4 11.1 5.4C12.2 5.3 13 6 13.9 6C14.8 6 15.5 5.4 16.8 5.4C17.8 5.4 18.7 6 19.3 6.9C17.2 8 17.5 12.1 19.7 12.8C19.5 13.3 19.4 13.5 19.2 14.1C18.8 15 18.3 16 17.6 17.2C17 18.3 16.2 19.8 15 19.9C14.1 19.9 13.7 19.3 12.6 19.3C11.6 19.3 11.1 19.9 10.3 19.9C9.1 19.9 8.4 18.5 7.8 17.4C6.9 15.7 6.2 13.1 6.1 10.7C6.1 9.4 6.3 8.1 6.9 7C7.8 5.4 9.3 4.4 10.9 4.4C12 4.4 13.2 5.1 13.9 5.1C14.6 5.1 16 4.3 17.6 4.3C18.5 4.3 19.4 4.6 20.1 5.2C19.3 5.8 18.3 6.5 17.6 7.2Z" />
                        </svg>
                        Pay
                    </button>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="form-section">
                <h2 class="section-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="section-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    Order Summary
                </h2>

                <div class="border-b border-gray-200 pb-4 mb-4">
                    @foreach($items as $item)
                        <div class="flex justify-between items-center py-2">
                            <div class="flex items-center">
                                <img src="{{ $item->image }}" alt="{{ $item->name }}" class="w-12 h-12 object-cover rounded mr-4">
                                <div>
                                    <p class="font-medium">{{ $item->name }}</p>
                                    <p class="text-sm text-gray-500">Quantity: {{ $item->quantity }}</p>
                                </div>
                            </div>
                            <p class="font-medium">${{ number_format($item->price * $item->quantity, 2) }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="space-y-2 mb-4">
                    <div class="flex justify-between">
                        <p class="text-gray-600">Subtotal</p>
                        <p>${{ number_format($subtotal, 2) }}</p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-gray-600">Drone Delivery Fee</p>
                        <p>${{ number_format($delivery_fee, 2) }}</p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-gray-600">Taxes</p>
                        <p>${{ number_format($taxes, 2) }}</p>
                    </div>
                </div>

                <div class="border-t border-gray-200 pt-4">
                    <div class="flex justify-between items-center">
                        <p class="font-bold text-lg">Total</p>
                        <p class="font-bold text-lg">${{ number_format($total, 2) }}</p>
                    </div>
                </div>
            </div>

            <!-- Terms and Submit -->
            <div class="form-section">
                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="terms_accepted" required class="rounded text-primary focus:ring-primary mr-2">
                        <span class="text-sm">I agree to the <a href="{{ route('terms') }}" class="text-primary hover:underline" target="_blank">Terms and Conditions</a> and <a href="{{ route('privacy') }}" class="text-primary hover:underline" target="_blank">Privacy Policy</a></span>
                    </label>
                </div>

                <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-white font-bold py-3 px-4 rounded-lg shadow-md transition-colors">
                    Complete Order
                </button>

                <p class="text-center text-sm text-gray-500 mt-4">Your order will be processed securely. Drone deliveries typically arrive within 30 minutes.</p>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="{{ asset('js/checkout.js') }}"></script>
@endsection
