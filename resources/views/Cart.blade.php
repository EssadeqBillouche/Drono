@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
    <!-- Breadcrumbs -->
    <div class=" border-b mt-10">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex text-sm">
                <a href="{{ route('home') }}" class="text-secondary hover:text-primary">Home</a>
                <span class="mx-2 text-secondary">/</span>
                <span class="text-text font-medium">Shopping Cart</span>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="py-8 flex-grow">
        <h1 class="text-3xl font-bold text-text mb-8">Your Shopping Cart</h1>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Cart Items -->
            <div class="lg:w-2/3">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-6">
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-bold text-text">Cart Items (3)</h2>
                            <form method="POST" action="" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-secondary hover:text-primary text-sm font-medium">Clear Cart</button>
                            </form>
                        </div>
                    </div>

                    <!-- Cart Item 1 -->
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex flex-col sm:flex-row gap-6">
                            <div class="w-full sm:w-24 h-24 bg-gray-100 rounded-md overflow-hidden">
                                <img src="{{ asset('images/products/earbuds.jpg') }}" alt="Wireless Earbuds Pro" class="w-full h-full object-cover" />
                            </div>
                            <div class="flex-1">
                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">
                                    <div>
                                        <h3 class="font-medium text-text">Wireless Earbuds Pro</h3>
                                        <p class="text-sm text-secondary">Color: Black</p>
                                        <p class="text-sm text-secondary">Seller: <a href="#" class="text-primary hover:underline">TechGadgets</a></p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-text">$129.99</p>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mt-4">
                                    <div class="flex items-center">
                                        <form method="POST" action="" class="flex items-center">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" name="quantity" value="{{ max(1, (old('quantity', 1) - 1)) }}" class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-l-md bg-gray-50 hover:bg-gray-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
                                            </button>
                                            <input type="number" name="quantity" min="1" value="{{ old('quantity', 1) }}" class="w-12 h-8 border-y border-gray-300 text-center focus:outline-none" />
                                            <button type="submit" name="quantity" value="{{ old('quantity', 1) + 1 }}" class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-r-md bg-gray-50 hover:bg-gray-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <form method="POST" action="">
                                            @csrf
                                            <button type="submit" class="text-secondary hover:text-primary text-sm font-medium flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                                Save for Later
                                            </button>
                                        </form>
                                        <form method="POST" action="">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-600 text-sm font-medium flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                                Remove
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cart Item 2 -->
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex flex-col sm:flex-row gap-6">
                            <div class="w-full sm:w-24 h-24 bg-gray-100 rounded-md overflow-hidden">
                                <img src="{{ asset('images/products/speaker.jpg') }}" alt="Portable Bluetooth Speaker" class="w-full h-full object-cover" />
                            </div>
                            <div class="flex-1">
                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">
                                    <div>
                                        <h3 class="font-medium text-text">Portable Bluetooth Speaker</h3>
                                        <p class="text-sm text-secondary">Color: Blue</p>
                                        <p class="text-sm text-secondary">Seller: <a href="#" class="text-primary hover:underline">TechGadgets</a></p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-text">$79.99</p>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mt-4">
                                    <div class="flex items-center">
                                        <form method="POST" action="" class="flex items-center">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" name="quantity" value="{{ max(1, (old('quantity', 1) - 1)) }}" class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-l-md bg-gray-50 hover:bg-gray-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
                                            </button>
                                            <input type="number" name="quantity" min="1" value="{{ old('quantity', 1) }}" class="w-12 h-8 border-y border-gray-300 text-center focus:outline-none" />
                                            <button type="submit" name="quantity" value="{{ old('quantity', 1) + 1 }}" class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-r-md bg-gray-50 hover:bg-gray-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap=" dayanround" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <form method="POST" action="">
                                            @csrf
                                            <button type="submit" class="text-secondary hover:text-primary text-sm font-medium flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                                Save for Later
                                            </button>
                                        </form>
                                        <form method="POST" action="">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-600 text-sm font-medium flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                                Remove
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cart Item 3 -->
                    <div class="p-6">
                        <div class="flex flex-col sm:flex-row gap-6">
                            <div class="w-full sm:w-24 h-24 bg-gray-100 rounded-md overflow-hidden">
                                <img src="{{ asset('images/products/headphones.jpg') }}" alt="Wireless Over-Ear Headphones" class="w-full h-full object-cover" />
                            </div>
                            <div class="flex-1">
                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">
                                    <div>
                                        <h3 class="font-medium text-text">Wireless Over-Ear Headphones</h3>
                                        <p class="text-sm text-secondary">Color: Black</p>
                                        <p class="text-sm text-secondary">Seller: <a href="#" class="text-primary hover:underline">TechGadgets</a></p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-text">$179.99</p>
                                        <p class="text-sm text-secondary line-through">$199.99</p>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mt-4">
                                    <div class="flex items-center">
                                        <form method="POST" action="" class="flex items-center">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" name="quantity" value="{{ max(1, (old('quantity', 1) - 1)) }}" class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-l-md bg-gray-50 hover:bg-gray-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
                                            </button>
                                            <input type="number" name="quantity" min="1" value="{{ old('quantity', 1) }}" class="w-12 h-8 border-y border-gray-300 text-center focus:outline-none" />
                                            <button type="submit" name="quantity" value="{{ old('quantity', 1) + 1 }}" class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-r-md bg-gray-50 hover:bg-gray-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <form method="POST" action="">
                                            @csrf
                                            <button type="submit" class="text-secondary hover:text-primary text-sm font-medium flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                                Save for Later
                                            </button>
                                        </form>
                                        <form method="POST" action="">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-600 text-sm font-medium flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                                Remove
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Saved for Later -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-text">Saved for Later (2)</h2>
                    </div>

                    <!-- Saved Item 1 -->
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex flex-col sm:flex-row gap-6">
                            <div class="w-full sm:w-24 h-24 bg-gray-100 rounded-md overflow-hidden">
                                <img src="{{ asset('images/products/charging-case.jpg') }}" alt="Earbuds Charging Case" class="w-full h-full object-cover" />
                            </div>
                            <div class="flex-1">
                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">
                                    <div>
                                        <h3 class="font-medium text-text">Earbuds Charging Case</h3>
                                        <p class="text-sm text-secondary">Color: White</p>
                                        <p class="text-sm text-secondary">Seller: <a href="#" class="text-primary hover:underline">TechGadgets</a></p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-text">$39.99</p>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mt-4">
                                    <div>
                                        <form method="POST" action="">
                                            @csrf
                                            <button type="submit" class="px-4 py-2 bg-primary hover:bg-primary/90 text-white rounded-md text-sm font-medium">
                                                Move to Cart
                                            </button>
                                        </form>
                                    </div>
                                    <div>
                                        <form method="POST" action="">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-600 text-sm font-medium flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                                Remove
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Saved Item 2 -->
                    <div class="p-6">
                        <div class="flex flex-col sm:flex-row gap-6">
                            <div class="w-full sm:w-24 h-24 bg-gray-100 rounded-md overflow-hidden">
                                <img src="{{ asset('images/products/sport-earbuds.jpg') }}" alt="Sport Wireless Earbuds" class="w-full h-full object-cover" />
                            </div>
                            <div class="flex-1">
                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">
                                    <div>
                                        <h3 class="font-medium text-text">Sport Wireless Earbuds</h3>
                                        <p class="text-sm text-secondary">Color: Green</p>
                                        <p class="text-sm text-secondary">Seller: <a href="#" class="text-primary hover:underline">TechGadgets</a></p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-text">$89.99</p>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mt-4">
                                    <div>
                                        <form method="POST" action="">
                                            @csrf
                                            <button type="submit" class="px-4 py-2 bg-primary hover:bg-primary/90 text-white rounded-md text-sm font-medium">
                                                Move to Cart
                                            </button>
                                        </form>
                                    </div>
                                    <div>
                                        <form method="POST" action="">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-600 text-sm font-medium flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                                Remove
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-secondary">Subtotal (3 items)</span>
                                <span class="font-medium text-text">$389.97</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-secondary">Shipping</span>
                                <span class="font-medium text-text">$0.00</span>
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
                                    <span class="font-bold text-text">$401.17</span>
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

                            <div class="space-y-4">
                                <a href="{{ route('checkout') }}" class="block w-full px-4 py-3 bg-primary hover:bg-primary/90 text-white text-center font-medium rounded-md">
                                    Proceed to Checkout
                                </a>
                                <a href="{{ route('catalog') }}" class="block w-full px-4 py-3 border border-gray-300 hover:bg-gray-50 text-text text-center font-medium rounded-md">
                                    Continue Shopping
                                </a>
                            </div>

                            <div class="mt-6">
                                <h3 class="text-sm font-medium text-text mb-2">We Accept</h3>
                                <div class="flex gap-2">
                                    <div class="w-10 h-6 bg-blue-600 rounded"></div>
                                    <div class="w-10 h-6 bg-red-600 rounded"></div>
                                    <div class="w-10 h-6 bg-green-600 rounded"></div>
                                    <div class="w-10 h-6 bg-yellow-400 rounded"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recommended Products -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-text mb-6">You May Also Like</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Product Card 1 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 group border border-gray-100">
                    <div class="relative h-56 bg-gray-100">
                        <img src="{{ asset('images/products/smart-watch.jpg') }}" alt="Smart Watch" class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-105">
                    </div>
                    <div class="p-5">
                        <h3 class="font-semibold text-lg text-text mb-1">Smart Watch Pro</h3>
                        <p class="text-secondary text-sm mb-4 line-clamp-2">Fitness tracking, heart rate monitoring, and smartphone notifications.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-bold text-lg">$149.99</span>
                            <form method="POST" action="">
                                @csrf
                                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-primary px-3 py-1.5 text-sm font-medium text-white hover:bg-primary/90">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 group border border-gray-100">
                    <div class="relative h-56 bg-gray-100">
                        <img src="{{ asset('images/products/tablet-stand.jpg') }}" alt="Tablet Stand" class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-105">
                    </div>
                    <div class="p-5">
                        <h3 class="font-semibold text-lg text-text mb-1">Adjustable Tablet Stand</h3>
                        <p class="text-secondary text-sm mb-4 line-clamp-2">Multi-angle aluminum stand for tablets and smartphones.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-bold text-lg">$29.99</span>
                            <form method="POST" action="">
                                @csrf
                                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-primary px-3 py-1.5 text-sm font-medium text-white hover:bg-primary/90">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 group border border-gray-100">
                    <div class="relative h-56 bg-gray-100">
                        <img src="{{ asset('images/products/wireless-charger.jpg') }}" alt="Wireless Charger" class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-105">
                    </div>
                    <div class="p-5">
                        <h3 class="font-semibold text-lg text-text mb-1">Fast Wireless Charger</h3>
                        <p class="text-secondary text-sm mb-4 line-clamp-2">15W fast charging pad compatible with all Qi-enabled devices.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-bold text-lg">$34.99</span>
                            <form method="POST" action="">
                                @csrf
                                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-primary px-3 py-1.5 text-sm font-medium text-white hover:bg-primary/90">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Product Card 4 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 group border border-gray-100">
                    <div class="relative h-56 bg-gray-100">
                        <img src="{{ asset('images/products/power-bank.jpg') }}" alt="Power Bank" class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-105">
                    </div>
                    <div class="p-5">
                        <h3 class="font-semibold text-lg text-text mb-1">20000mAh Power Bank</h3>
                        <p class="text-secondary text-sm mb-4 line-clamp-2">High-capacity portable charger with dual USB ports and fast charging.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-bold text-lg">$49.99</span>
                            <form method="POST" action="">
                                @csrf
                                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-primary px-3 py-1.5 text-sm font-medium text-white hover:bg-primary/90">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
