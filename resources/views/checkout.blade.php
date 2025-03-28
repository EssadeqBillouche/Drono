@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    <!-- Breadcrumbs -->
    <div class=" border-b mt-10">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex text-sm">
                <a href="{{ route('home') }}" class="text-secondary hover:text-primary">Home</a>
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

        <!-- Checkout Progress -->
        <div class="mb-8">
            <div class="flex items-center justify-between max-w-3xl mx-auto">
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold">1</div>
                    <span class="mt-2 text-sm font-medium text-text">Shipping</span>
                </div>
                <div class="flex-1 h-1 bg-gray-200 mx-2">
                    <div class="h-full bg-primary" style="width: 0%"></div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-bold">2</div>
                    <span class="mt-2 text-sm font-medium text-gray-500">Payment</span>
                </div>
                <div class="flex-1 h-1 bg-gray-200 mx-2">
                    <div class="h-full bg-primary" style="width: 0%"></div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-bold">3</div>
                    <span class="mt-2 text-sm font-medium text-gray-500">Review</span>
                </div>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Checkout Form -->
            <div class="lg:w-2/3">
                <!-- Shipping Information -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-8">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-text">Shipping Information</h2>
                    </div>
                    <div class="p-6">
                        <form method="POST" action="{{ route('checkout') }}" class="space-y-6" id="shipping-form">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="first-name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                                    <input type="text" id="first-name" name="first_name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary/20" value="{{ old('first_name') }}" required />
                                    @error('first_name')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="last-name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                                    <input type="text" id="last-name" name="last_name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary/20" value="{{ old('last_name') }}" required />
                                    @error('last_name')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary/20" value="{{ old('email') }}" required />
                                @error('email')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary/20" value="{{ old('phone') }}" required />
                                @error('phone')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Street Address</label>
                                <input type="text" id="address" name="address" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary/20" value="{{ old('address') }}" required />
                                @error('address')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="address2" class="block text-sm font-medium text-gray-700 mb-1">Apartment, suite, etc. (optional)</label>
                                <input type="text" id="address2" name="address2" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary/20" value="{{ old('address2') }}" />
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City</label>
                                    <input type="text" id="city" name="city" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary/20" value="{{ old('city') }}" required />
                                    @error('city')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="state" class="block text-sm font-medium text-gray-700 mb-1">State/Province</label>
                                    <select id="state" name="state" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary/20" required>
                                        <option value="">Select State</option>
                                        <option value="AL" {{ old('state') == 'AL' ? 'selected' : '' }}>Alabama</option>
                                        <option value="AK" {{ old('state') == 'AK' ? 'selected' : '' }}>Alaska</option>
                                        <option value="AZ" {{ old('state') == 'AZ' ? 'selected' : '' }}>Arizona</option>
                                        <!-- Add more states as needed -->
                                    </select>
                                    @error('state')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="zip" class="block text-sm font-medium text-gray-700 mb-1">ZIP / Postal Code</label>
                                    <input type="text" id="zip" name="zip" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary/20" value="{{ old('zip') }}" required />
                                    @error('zip')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="country" class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                                <select id="country" name="country" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary/20" required>
                                    <option value="US" {{ old('country', 'US') == 'US' ? 'selected' : '' }}>United States</option>
                                    <option value="CA" {{ old('country') == 'CA' ? 'selected' : '' }}>Canada</option>
                                    <option value="MX" {{ old('country') == 'MX' ? 'selected' : '' }}>Mexico</option>
                                    <!-- Add more countries as needed -->
                                </select>
                                @error('country')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="save-address" name="save_address" type="checkbox" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" {{ old('save_address') ? 'checked' : '' }} />
                                </div>
                                <div class="ml-3">
                                    <label for="save-address" class="text-sm text-gray-700">Save this address for future orders</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Shipping Method -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-8">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-text">Shipping Method</h2>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <label class="flex p-4 border border-gray-200 rounded-lg cursor-pointer hover:border-primary">
                                <input type="radio" name="shipping_method" value="express" class="h-5 w-5 text-primary focus:ring-primary border-gray-300" {{ old('shipping_method', 'express') == 'express' ? 'checked' : '' }} form="shipping-form" />
                                <div class="ml-3 flex-1">
                                    <div class="flex justify-between">
                                        <span class="text-sm font-medium text-text">Drone Express Delivery</span>
                                        <span class="text-sm font-medium text-text">$9.99</span>
                                    </div>
                                    <p class="text-sm text-secondary">Delivery within 2 hours</p>
                                </div>
                            </label>

                            <label class="flex p-4 border border-gray-200 rounded-lg cursor-pointer hover:border-primary">
                                <input type="radio" name="shipping_method" value="standard" class="h-5 w-5 text-primary focus:ring-primary border-gray-300" {{ old('shipping_method') == 'standard' ? 'checked' : '' }} form="shipping-form" />
                                <div class="ml-3 flex-1">
                                    <div class="flex justify-between">
                                        <span class="text-sm font-medium text-text">Standard Shipping</span>
                                        <span class="text-sm font-medium text-text">$4.99</span>
                                    </div>
                                    <p class="text-sm text-secondary">Delivery in 2-3 business days</p>
                                </div>
                            </label>

                            <label class="flex p-4 border border-gray-200 rounded-lg cursor-pointer hover:border-primary">
                                <input type="radio" name="shipping_method" value="economy" class="h-5 w-5 text-primary focus:ring-primary border-gray-300" {{ old('shipping_method') == 'economy' ? 'checked' : '' }} form="shipping-form" />
                                <div class="ml-3 flex-1">
                                    <div class="flex justify-between">
                                        <span class="text-sm font-medium text-text">Economy Shipping</span>
                                        <span class="text-sm font-medium text-text">Free</span>
                                    </div>
                                    <p class="text-sm text-secondary">Delivery in 5-7 business days</p>
                                </div>
                            </label>
                            @error('shipping_method')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between">
                    <a href="{{ route('cart') }}" class="px-6 py-3 border border-gray-300 hover:bg-gray-50 text-text font-medium rounded-md flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                        Back to Cart
                    </a>
                    <button type="submit" form="shipping-form" class="px-6 py-3 bg-primary hover:bg-primary/90 text-white font-medium rounded-md flex items-center gap-2">
                        Continue to Payment
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                    </button>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:w-1/3">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden sticky top-6">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-text">Order Summary</h2>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4 mb-6">
                            <!-- Order Item 1 -->
                            <div class="flex gap-4">
                                <div class="w-16 h-16 bg-gray-100 rounded-md overflow-hidden">
                                    <img src="{{ asset('images/products/earbuds.jpg') }}" alt="Wireless Earbuds Pro" class="w-full h-full object-cover" />
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-sm font-medium text-text">Wireless Earbuds Pro</h3>
                                    <p class="text-xs text-secondary">Qty: 1</p>
                                    <p class="text-sm font-medium text-text">$129.99</p>
                                </div>
                            </div>

                            <!-- Order Item 2 -->
                            <div class="flex gap-4">
                                <div class="w-16 h-16 bg-gray-100 rounded-md overflow-hidden">
                                    <img src="{{ asset('images/products/speaker.jpg') }}" alt="Portable Bluetooth Speaker" class="w-full h-full object-cover" />
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-sm font-medium text-text">Portable Bluetooth Speaker</h3>
                                    <p class="text-xs text-secondary">Qty: 1</p>
                                    <p class="text-sm font-medium text-text">$79.99</p>
                                </div>
                            </div>

                            <!-- Order Item 3 -->
                            <div class="flex gap-4">
                                <div class="w-16 h-16 bg-gray-100 rounded-md overflow-hidden">
                                    <img src="{{ asset('images/products/headphones.jpg') }}" alt="Wireless Over-Ear Headphones" class="w-full h-full object-cover" />
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-sm font-medium text-text">Wireless Over-Ear Headphones</h3>
                                    <p class="text-xs text-secondary">Qty: 1</p>
                                    <p class="text-sm font-medium text-text">$179.99</p>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-100 pt-4 space-y-4">
                            <div class="flex justify-between">
                                <span class="text-secondary">Subtotal (3 items)</span>
                                <span class="font-medium text-text">$389.97</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-secondary">Shipping</span>
                                <span class="font-medium text-text">$9.99</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-secondary">Tax</span>
                                <span class="font-medium text-text">$31.20</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-secondary">Discount</span>
                                <span class="font-medium text-green-600">-$20.00</span>
                            </div>
                            <div class="pt-4 border-t border-gray-100">
                                <div class="flex justify-between">
                                    <span class="font-bold text-text">Total</span>
                                    <span class="font-bold text-text">$411.16</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <div class="mb-4">
                                <div class="flex items-center justify-between mb-2">
                                    <label for="promo-code" class="text-sm font-medium text-text">Promo Code</label>
                                    <button type="button" class="text-xs text-primary hover:text-primary/80" onclick="document.getElementById('promo-code').focus()">Have a code?</button>
                                </div>
                                <form method="POST" action="">
                                    @csrf
                                    <div class="flex">
                                        <input type="text" id="promo-code" name="promo_code" placeholder="Enter code" class="flex-1 px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-primary/20" value="{{ old('promo_code') }}" />
                                        <button type="submit" class="px-4 py-2 bg-primary hover:bg-primary/90 text-white rounded-r-md">Apply</button>
                                    </div>
                                    @error('promo_code')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                    @enderror
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
