@extends('layouts.app')

@section('title', 'Marketplace Catalog')

@section('css', asset('css/catalog.css'))

@section('content')
    <!-- Category Navigation -->
    <div class="bg-white border-b border-gray-200 sticky top-0 z-20 -mx-4">
        <div class="container mx-auto px-4 py-3 overflow-x-auto">
            <div class="flex gap-3 min-w-max">
                <button class="category-pill active px-4 py-2 rounded-full text-sm font-medium bg-gray-100">All</button>
                <button class="category-pill px-4 py-2 rounded-full text-sm font-medium bg-gray-100">Food</button>
                <button class="category-pill px-4 py-2 rounded-full text-sm font-medium bg-gray-100">Grocery</button>
                <button class="category-pill px-4 py-2 rounded-full text-sm font-medium bg-gray-100">Pharmacy</button>
                <button class="category-pill px-4 py-2 rounded-full text-sm font-medium bg-gray-100">Electronics</button>
                <button class="category-pill px-4 py-2 rounded-full text-sm font-medium bg-gray-100">Fashion</button>
                <button class="category-pill px-4 py-2 rounded-full text-sm font-medium bg-gray-100">Beauty</button>
                <button class="category-pill px-4 py-2 rounded-full text-sm font-medium bg-gray-100">Home</button>
            </div>
        </div>
    </div>

    <!-- Featured Vendors -->
    <section class="py-8">
        <h2 class="text-2xl font-bold text-text mb-6">Featured Vendors</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
            <!-- Vendor 1 -->
            <div class="bg-white rounded-xl p-4 flex flex-col items-center shadow-sm hover:shadow-md transition-all cursor-pointer">
                <div class="w-16 h-16 rounded-full overflow-hidden mb-3">
                    <img src="{{ asset('images/vendors/mcdonalds.jpg') }}" alt="McDonald's" class="w-full h-full object-cover">
                </div>
                <h3 class="font-medium text-text">McDonald's</h3>
                <p class="text-xs text-secondary">Fast Food</p>
                <div class="flex items-center mt-2">
                    <div class="stars mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <span class="text-xs text-secondary">4.8</span>
                </div>
            </div>

            <!-- Vendor 2 -->
            <div class="bg-white rounded-xl p-4 flex flex-col items-center shadow-sm hover:shadow-md transition-all cursor-pointer">
                <div class="w-16 h-16 rounded-full overflow-hidden mb-3">
                    <img src="{{ asset('images/vendors/sephora.jpg') }}" alt="Sephora" class="w-full h-full object-cover">
                </div>
                <h3 class="font-medium text-text">Sephora</h3>
                <p class="text-xs text-secondary">Beauty</p>
                <div class="flex items-center mt-2">
                    <div class="stars mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <span class="text-xs text-secondary">4.9</span>
                </div>
            </div>

            <!-- Vendor 3 -->
            <div class="bg-white rounded-xl p-4 flex flex-col items-center shadow-sm hover:shadow-md transition-all cursor-pointer">
                <div class="w-16 h-16 rounded-full overflow-hidden mb-3">
                    <img src="{{ asset('images/vendors/walgreens.jpg') }}" alt="Walgreens" class="w-full h-full object-cover">
                </div>
                <h3 class="font-medium text-text">Walgreens</h3>
                <p class="text-xs text-secondary">Pharmacy</p>
                <div class="flex items-center mt-2">
                    <div class="stars mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <span class="text-xs text-secondary">4.7</span>
                </div>
            </div>

            <!-- Vendor 4 -->
            <div class="bg-white rounded-xl p-4 flex flex-col items-center shadow-sm hover:shadow-md transition-all cursor-pointer">
                <div class="w-16 h-16 rounded-full overflow-hidden mb-3">
                    <img src="{{ asset('images/vendors/wholefoods.jpg') }}" alt="Whole Foods" class="w-full h-full object-cover">
                </div>
                <h3 class="font-medium text-text">Whole Foods</h3>
                <p class="text-xs text-secondary">Grocery</p>
                <div class="flex items-center mt-2">
                    <div class="stars mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <span class="text-xs text-secondary">4.6</span>
                </div>
            </div>

            <!-- Vendor 5 -->
            <div class="bg-white rounded-xl p-4 flex flex-col items-center shadow-sm hover:shadow-md transition-all cursor-pointer">
                <div class="w-16 h-16 rounded-full overflow-hidden mb-3">
                    <img src="{{ asset('images/vendors/bestbuy.jpg') }}" alt="Best Buy" class="w-full h-full object-cover">
                </div>
                <h3 class="font-medium text-text">Best Buy</h3>
                <p class="text-xs text-secondary">Electronics</p>
                <div class="flex items-center mt-2">
                    <div class="stars mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <span class="text-xs text-secondary">4.5</span>
                </div>
            </div>

            <!-- Vendor 6 -->
            <div class="bg-white rounded-xl p-4 flex flex-col items-center shadow-sm hover:shadow-md transition-all cursor-pointer">
                <div class="w-16 h-16 rounded-full overflow-hidden mb-3">
                    <img src="{{ asset('images/vendors/zara.jpg') }}" alt="Zara" class="w-full h-full object-cover">
                </div>
                <h3 class="font-medium text-text">Zara</h3>
                <p class="text-xs text-secondary">Fashion</p>
                <div class="flex items-center mt-2">
                    <div class="stars mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <span class="text-xs text-secondary">4.4</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Catalog Section -->
    <main class="py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-text">Popular Products</h1>
            <div class="flex items-center gap-2">
                <span class="text-sm text-secondary">Sort by:</span>
                <select class="bg-white border border-gray-200 rounded-md px-2 py-1 text-sm focus:outline-none focus:border-primary">
                    <option>Popularity</option>
                    <option>Newest</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                    <option>Fastest Delivery</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Product Card 1 - Leaf Studios Headphones -->
            <div id="modal-headphones" class="modal--window fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50" style="display: none;">                <div class="relative h-56 bg-light">
                    <img src="{{ asset('images/products/headphones.jpg') }}" alt="Leaf Studios Headphones" class="object-cover w-full h-full">
                    <div class="vendor-badge">
                        <img src="{{ asset('images/vendors/leafstudios.jpg') }}" alt="Leaf Studios" class="w-full h-full object-cover">
                    </div>
                    <span class="absolute top-3 right-3 bg-blue-100 text-blue-800 px-2 py-1 text-xs font-semibold rounded-full">Electronics</span>

                    <!-- Delivery Info Overlay -->
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-3">
                        <div class="flex items-center justify-between text-white">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                <span class="text-xs">35 min delivery</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1 drone-icon"><path d="M12 2 L12 6"/><path d="M4.93 10.93 L7.76 8.76"/><path d="M19.07 10.93 L16.24 8.76"/><path d="M2 17 L22 17"/><path d="M4 17 L4 21"/><path d="M20 17 L20 21"/></svg>
                                <span class="text-xs">Drono Express</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-semibold text-lg text-text mb-1">Wireless Headphones</h3>
                    <p class="text-secondary text-sm mb-4 line-clamp-2">Premium noise-cancelling wireless headphones with 30-hour battery life.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-primary font-bold text-lg">$129.99</span>
                        <div class="flex items-center">
                            <div class="stars mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            </div>
                            <span class="text-xs text-secondary">4.9</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Card 2 - McDonald's -->
            <div class="product-card bg-white rounded-xl overflow-hidden shadow-sm cursor-pointer" onclick="openModal('modal-mcdonalds')">
                <div class="relative h-56 bg-light">
                    <img src="{{ asset('images/products/bigmac.jpg') }}" alt="Big Mac Meal" class="object-cover w-full h-full">
                    <div class="vendor-badge">
                        <img src="{{ asset('images/vendors/mcdonalds.jpg') }}" alt="McDonald's" class="w-full h-full object-cover">
                    </div>
                    <span class="absolute top-3 right-3 bg-primary text-white px-2 py-1 text-xs font-semibold rounded-full">Fast Food</span>

                    <!-- Delivery Info Overlay -->
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-3">
                        <div class="flex items-center justify-between text-white">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                <span class="text-xs">25 min delivery</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1 drone-icon"><path d="M12 2 L12 6"/><path d="M4.93 10.93 L7.76 8.76"/><path d="M19.07 10.93 L16.24 8.76"/><path d="M2 17 L22 17"/><path d="M4 17 L4 21"/><path d="M20 17 L20 21"/></svg>
                                <span class="text-xs">Drono Express</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-semibold text-lg text-text mb-1">Big Mac Meal</h3>
                    <p class="text-secondary text-sm mb-4 line-clamp-2">Iconic Big Mac, fries, and drink delivered hot and fresh by drone.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-primary font-bold text-lg">$9.99</span>
                        <div class="flex items-center">
                            <div class="stars mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" fill-opacity="0.3"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            </div>
                            <span class="text-xs text-secondary">4.2</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Card 3 - Sephora -->
            <div class="product-card bg-white rounded-xl overflow-hidden shadow-sm cursor-pointer" onclick="openModal('modal-sephora')">
                <div class="relative h-56 bg-light">
                    <img src="{{ asset('images/products/makeup.jpg') }}" alt="Makeup Set" class="object-cover w-full h-full">
                    <div class="vendor-badge">
                        <img src="{{ asset('images/vendors/sephora.jpg') }}" alt="Sephora" class="w-full h-full object-cover">
                    </div>
                    <span class="absolute top-3 right-3 bg-pink-100 text-pink-800 px-2 py-1 text-xs font-semibold rounded-full">Beauty</span>

                    <!-- Delivery Info Overlay -->
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-3">
                        <div class="flex items-center justify-between text-white">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                <span class="text-xs">40 min delivery</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1 drone-icon"><path d="M12 2 L12 6"/><path d="M4.93 10.93 L7.76 8.76"/><path d="M19.07 10.93 L16.24 8.76"/><path d="M2 17 L22 17"/><path d="M4 17 L4 21"/><path d="M20 17 L20 21"/></svg>
                                <span class="text-xs">Drono Standard</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-semibold text-lg text-text mb-1">Luxury Makeup Set</h3>
                    <p class="text-secondary text-sm mb-4 line-clamp-2">Premium makeup collection with foundation, lipstick, and eyeshadow palette.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-primary font-bold text-lg">$79.99</span>
                        <div class="flex items-center">
                            <div class="stars mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            </div>
                            <span class="text-xs text-secondary">4.9</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Card 4 - Walgreens -->
            <div class="product-card bg-white rounded-xl overflow-hidden shadow-sm cursor-pointer" onclick="openModal('modal-walgreens')">
                <div class="relative h-56 bg-light">
                    <img src="{{ asset('images/products/medicine.jpg') }}" alt="Cold Medicine" class="object-cover w-full h-full">
                    <div class="vendor-badge">
                        <img src="{{ asset('images/vendors/walgreens.jpg') }}" alt="Walgreens" class="w-full h-full object-cover">
                    </div>
                    <span class="absolute top-3 right-3 bg-red-100 text-red-800 px-2 py-1 text-xs font-semibold rounded-full">Pharmacy</span>

                    <!-- Delivery Info Overlay -->
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-3">
                        <div class="flex items-center justify-between text-white">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                <span class="text-xs">30 min delivery</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1 drone-icon"><path d="M12 2 L12 6"/><path d="M4.93 10.93 L7.76 8.76"/><path d="M19.07 10.93 L16.24 8.76"/><path d="M2 17 L22 17"/><path d="M4 17 L4 21"/><path d="M20 17 L20 21"/></svg>
                                <span class="text-xs">Drono Priority</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-semibold text-lg text-text mb-1">Cold & Flu Relief Pack</h3>
                    <p class="text-secondary text-sm mb-4 line-clamp-2">Complete cold and flu relief with medicine, tissues, and throat lozenges.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-primary font-bold text-lg">$24.99</span>
                        <div class="flex items-center">
                            <div class="stars mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" fill-opacity="0.3"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            </div>
                            <span class="text-xs text-secondary">4.3</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- More product cards can be added here -->
        </div>

        <!-- Load More Button -->
        <div class="flex justify-center mt-10">
            <button class="bg-white border border-primary text-primary hover:bg-primary hover:text-white transition-colors duration-300 font-medium rounded-full px-6 py-2">
                Load More Products
            </button>
        </div>
    </main>

    <!-- Modal: Leaf Studios Headphones -->
    <div id="modal-headphones" class="modal--window fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50">
        <div class="w-full max-w-lg flex flex-col">
            <!-- Modal Top Bar -->
            <div class="flex justify-end p-2">
                <button onclick="closeModal('modal-headphones')" class="text-white hover:text-primary transition-all duration-300">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle opacity="0.5" cx="12" cy="12" r="12" fill="#2f2f2f"></circle>
                        <path d="M16.6628 8.70505C17.0522 8.31339 17.0503 7.68023 16.6587 7.29084C16.267 6.90145 15.6338 6.90329 15.2445 7.29495L12 11.9767L8.75554 7.29495C8.36615 6.90329 7.73299 6.90145 7.34133 7.29084C6.94967 7.68023 6.94783 8.31339 7.33722 8.70505L11.2908 12.6817L7.29084 16.705C6.90145 17.0967 6.90329 17.7298 7.29495 18.1192C7.68661 18.5085 8.31977 18.5067 8.70916 18.115L12 13.2716L15.2908 16.705C15.6802 17.0967 16.3134 17.0985 16.705 16.7092C17.0967 16.3198 17.0985 15.6866 16.7092 15.295L12.7092 11.2716L16.6628 8.70505Z" fill="white"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal--window__body flex-1 px-6 py-6 text-white">
                <div class="space-y-8">
                    <!-- Product Images -->
                    <div>
                        <div class="bg-dark rounded-lg overflow-hidden mb-4 relative">
                            <img id="main-image-headphones" src="{{ asset('images/products/headphones.jpg') }}" alt="Leaf Studios Headphones" class="w-full h-72 object-contain opacity-90 hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute inset-0 bg-gradient-to-t from-dark/50 to-transparent"></div>
                            <div class="absolute top-4 left-4 flex items-center bg-primary/80 rounded-full px-3 py-1">
                                <img src="{{ asset('images/vendors/leafstudios.jpg') }}" alt="Leaf Studios" class="w-6 h-6 rounded-full mr-2">
                                <span class="text-white text-xs font-medium">Leaf Studios</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-4 gap-3">
                            <div class="thumbnail active" onclick="updateMainImage('main-image-headphones', '{{ asset('images/products/headphones.jpg') }}', this)">
                                <img src="{{ asset('images/products/headphones.jpg') }}" alt="Main" class="w-full h-16 object-contain">
                            </div>
                            <div class="thumbnail" onclick="updateMainImage('main-image-headphones', '{{ asset('images/products/headphones-side.jpg') }}', this)">
                                <img src="{{ asset('images/products/headphones-side.jpg') }}" alt="Side" class="w-full h-16 object-contain">
                            </div>
                            <div class="thumbnail" onclick="updateMainImage('main-image-headphones', '{{ asset('images/products/headphones-front.jpg') }}', this)">
                                <img src="{{ asset('images/products/headphones-front.jpg') }}" alt="Front" class="w-full h-16 object-contain">
                            </div>
                            <div class="thumbnail" onclick="updateMainImage('main-image-headphones', '{{ asset('images/products/headphones-back.jpg') }}', this)">
                                <img src="{{ asset('images/products/headphones-back.jpg') }}" alt="Back" class="w-full h-16 object-contain">
                            </div>
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div>
                        <h1 class="text-2xl font-bold text-white mb-2 tracking-wide">Wireless Headphones</h1>
                        <div class="flex items-center mb-4">
                            <div class="stars mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            </div>
                            <span class="text-sm text-secondary">4.9 (215 reviews)</span>
                        </div>
                        <div class="flex items-center mb-4">
                            <span class="text-xl font-bold text-primary">$129.99</span>
                            <span class="text-sm text-secondary line-through ml-2">$179.99</span>
                            <span class="ml-2 bg-primary/20 text-primary text-xs px-2 py-0.5 rounded">Save $50</span>
                        </div>
                        <p class="text-secondary mb-6 font-light">Premium noise-cancelling wireless headphones with 30-hour battery life. Features Bluetooth 5.0, touch controls, and built-in microphone for calls.</p>

                        <!-- Drone Delivery Info -->
                        <div class="bg-dark/50 p-4 rounded-lg mb-6">
                            <h3 class="text-white font-medium mb-2">Delivery Information</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 text-primary"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    <span class="text-sm">35 min delivery time</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 text-primary"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                    <span class="text-sm">4.5 miles from you</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 text-primary drone-icon"><path d="M12 2 L12 6"/><path d="M4.93 10.93 L7.76 8.76"/><path d="M19.07 10.93 L16.24 8.76"/><path d="M2 17 L22 17"/><path d="M4 17 L4 21"/><path d="M20 17 L20 21"/></svg>
                                    <span class="text-sm">Drono Express</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 text-primary"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>
                                    <span class="text-sm">Secure packaging</span>
                                </div>
                            </div>
                        </div>

                        <!-- Drone Flight Path Visualization -->
                        <div class="bg-dark/50 p-4 rounded-lg mb-6">
                            <h3 class="text-white font-medium mb-2">Drone Delivery Route</h3>
                            <div class="drone-path">
                                <div class="drone-flight">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#ff7e00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2 L12 6"/>
                                        <path d="M4.93 10.93 L7.76 8.76"/>
                                        <path d="M19.07 10.93 L16.24 8.76"/>
                                        <path d="M2 17 L22 17"/>
                                        <path d="M4 17 L4 21"/>
                                        <path d="M20 17 L20 21"/>
                                    </svg>
                                </div>
                            </div>

                            <!-- Delivery Status Timeline -->
                            <div class="delivery-timeline">
                                <div class="timeline-step active">
                                    <div class="timeline-dot active">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                    </div>
                                    <div class="timeline-label">Order Confirmed</div>
                                </div>
                                <div class="timeline-step active">
                                    <div class="timeline-dot active">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1" ry="1"/></svg>
                                    </div>
                                    <div class="timeline-label">Preparing</div>
                                </div>
                                <div class="timeline-step active">
                                    <div class="timeline-dot active">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2 L12 6"/><path d="M4.93 10.93 L7.76 8.76"/><path d="M19.07 10.93 L16.24 8.76"/></svg>
                                    </div>
                                    <div class="timeline-label">Drone Loading</div>
                                </div>
                                <div class="timeline-step">
                                    <div class="timeline-dot">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>
                                    </div>
                                    <div class="timeline-label">In Transit</div>
                                </div>
                                <div class="timeline-step">
                                    <div class="timeline-dot">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                                    </div>
                                    <div class="timeline-label">Delivered</div>
                                </div>
                            </div>
                        </div>

                        <!-- Customization Options -->
                        <div class="space-y-6 options">
                            <div>
                                <h2 class="text-lg font-medium text-white mb-2">Select Color</h2>
                                <div class="flex gap-4">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="color-headphones" value="black" class="hidden" checked>
                                        <span class="color-option flex items-center justify-center w-auto h-8 px-3 bg-dark rounded-full border-2 border-primary text-xs">Black</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="color-headphones" value="white" class="hidden">
                                        <span class="color-option flex items-center justify-center w-auto h-8 px-3 bg-dark rounded-full border-2 border-light text-xs">White</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="color-headphones" value="blue" class="hidden">
                                        <span class="color-option flex items-center justify-center w-auto h-8 px-3 bg-dark rounded-full border-2 border-light text-xs">Blue</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Quantity and Add to Cart -->
                            <div class="flex items-center gap-4">
                                <div class="flex border border-primary rounded-md bg-dark">
                                    <button type="button" class="px-3 py-2 text-white hover:text-primary" onclick="updateQuantity('quantity-headphones', -1)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M5 12h14"/></svg>
                                    </button>
                                    <input id="quantity-headphones" type="number" min="1" value="1" class="w-12 text-center bg-transparent text-white border-x border-primary focus:outline-none">
                                    <button type="button" class="px-3 py-2 text-white hover:text-primary" onclick="updateQuantity('quantity-headphones', 1)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                                    </button>
                                </div>
                                <button id="cart-btn-headphones" class="cart-button flex-1 bg-primary hover:bg-primary/80 text-white font-medium py-3 px-6 rounded-md flex items-center justify-center" onclick="addToCart('cart-btn-headphones')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="mr-2"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                                    <span>Add to Cart</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: McDonald's Big Mac Meal -->
    <div id="modal-mcdonalds" class="modal--window fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50">
        <div class="w-full max-w-lg flex flex-col">
            <!-- Modal Top Bar -->
            <div class="flex justify-end p-2">
                <button onclick="closeModal('modal-mcdonalds')" class="text-white hover:text-primary transition-all duration-300">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle opacity="0.5" cx="12" cy="12" r="12" fill="#2f2f2f"></circle>
                        <path d="M16.6628 8.70505C17.0522 8.31339 17.0503 7.68023 16.6587 7.29084C16.267 6.90145 15.6338 6.90329 15.2445 7.29495L12 11.9767L8.75554 7.29495C8.36615 6.90329 7.73299 6.90145 7.34133 7.29084C6.94967 7.68023 6.94783 8.31339 7.33722 8.70505L11.2908 12.6817L7.29084 16.705C6.90145 17.0967 6.90329 17.7298 7.29495 18.1192C7.68661 18.5085 8.31977 18.5067 8.70916 18.115L12 13.2716L15.2908 16.705C15.6802 17.0967 16.3134 17.0985 16.705 16.7092C17.0967 16.3198 17.0985 15.6866 16.7092 15.295L12.7092 11.2716L16.6628 8.70505Z" fill="white"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal--window__body flex-1 px-6 py-6 text-white">
                <!-- Modal content for McDonald's similar to the headphones modal -->
                <!-- (Content omitted for brevity but would follow the same pattern) -->
            </div>
        </div>
    </div>

    <!-- Add similar modals for other products -->
@endsection

@section('script')
    <script>
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        function updateMainImage(imageId, src, thumbnail) {
            document.getElementById(imageId).src = src;
            const thumbnails = thumbnail.parentElement.querySelectorAll('.thumbnail');
            thumbnails.forEach(t => t.classList.remove('active', 'border-primary'));
            thumbnail.classList.add('active', 'border-primary');
        }

        function updateQuantity(inputId, change) {
            const input = document.getElementById(inputId);
            let value = parseInt(input.value) + change;
            if (value < 1) value = 1;
            input.value = value;
        }

        function addToCart(btnId) {
            const btn = document.getElementById(btnId);
            btn.classList.add('added');
            btn.disabled = true;
            setTimeout(() => {
                btn.classList.remove('added');
                btn.disabled = false;
            }, 1500);
        }

        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Close modal when clicking outside
            document.querySelectorAll('.modal--window').forEach(modal => {
                modal.style.display = 'none';
            });
            const modals = document.querySelectorAll('.modal--window');
            modals.forEach(modal => {
                modal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        this.classList.remove('active');
                        document.body.style.overflow = 'auto';
                    }
                });
            });

            // Category pill selection
            const categoryPills = document.querySelectorAll('.category-pill');
            categoryPills.forEach(pill => {
                pill.addEventListener('click', function() {
                    categoryPills.forEach(p => p.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
@endsection
