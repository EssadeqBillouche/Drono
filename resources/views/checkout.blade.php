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
                            Payment Information
                        </h2>

                        <div class="mb-4">
                            <label for="card-holder-name" class="block text-sm font-medium text-text mb-1">Cardholder Name</label>
                            <input id="card-holder-name" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent" required>
                        </div>

                        <div class="mb-4">
                            <label for="card-element" class="block text-sm font-medium text-text mb-1">Credit or Debit Card</label>
                            <div id="card-element" class="p-3 border border-gray-300 rounded-lg bg-white">
                                <!-- Stripe Elements will be inserted here -->
                            </div>

                            <!-- Used to display form errors -->
                            <div id="card-errors" role="alert" class="mt-2 text-red-500 text-sm"></div>
                        </div>

                        <div class="mb-4 bg-gray-50 p-4 rounded-lg">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-sm text-gray-600">Your payment information is encrypted and secure. We never store your full credit card details.</p>
                            </div>
                        </div>

                        <div class="flex items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            <span class="text-sm text-gray-600">Secured by <span class="font-medium">Stripe</span></span>
                        </div>

                        <!-- Hidden input for payment intent ID -->
                        <input type="hidden" id="payment-intent-id" name="payment_intent_id">
                        <input type="hidden" name="order_total" value="{{ $cartTotal ?? '0.00' }}">
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
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Pass the Stripe key to JavaScript
        const stripeKey = "{{ env('STRIPE_KEY') }}";
    </script>
    <script src="{{ asset('js/checkout.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('js/stripe-payment.js') }}?v={{ time() }}"></script>@endsection
