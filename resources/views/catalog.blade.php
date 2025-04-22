@extends('layouts.app')

@section('title', 'Marketplace Catalog')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">
@endsection

@section('content')
    <!-- Category Navigation -->
    <div class="bg-white border-b rounded-3xl mt-6 sticky fixed top-0 z-20 -mx-4">
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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products as $product)
                <div class="product-card bg-white rounded-xl overflow-hidden shadow-sm cursor-pointer hover:shadow-md transition-all" data-modal="{{ $product['modal_id'] }}">
                    <div class="relative h-56 bg-gray-100">
                        {{-- Product Image --}}
                        <img src="{{ $product['product']['image'] }}"
                             alt="{{ $product['product']['name'] }}"
                             class="object-cover w-full h-full">

                        {{-- Vendor Badge --}}
                        <div class="vendor-badge absolute top-3 left-3 w-8 h-8 rounded-full overflow-hidden border-2 border-primary">
                            <img src="{{ $product['vendor']['image'] }}"
                                 alt="{{ $product['vendor']['name'] }}"
                                 class="w-full h-full object-cover">
                        </div>

                        {{-- Category Badge --}}
                        <span class="absolute top-3 right-3 bg-blue-100 text-blue-800 px-2 py-1 text-xs font-semibold rounded-full">
                    {{ $product['product']['category'] }}
                </span>

                        {{-- Delivery Info --}}
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-3">
                            <div class="flex items-center justify-between text-white">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12 6 12 12 16 14" />
                                    </svg>
                                    <span class="text-xs">{{ $product['delivery']['time'] }}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2L12 6M4.93 10.93L7.76 8.76M19.07 10.93L16.24 8.76M2 17H22M4 17V21M20 17V21" />
                                    </svg>
                                    <span class="text-xs">{{ $product['delivery']['method'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-5">
                        {{-- Product Name --}}
                        <h3 class="font-semibold text-lg text-gray-800 mb-1">
                            {{ $product['product']['name'] }}
                        </h3>

                        {{-- Description --}}
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                            {{ $product['product']['description'] }}
                        </p>

                        <div class="flex justify-between items-center">
                            {{-- Price --}}
                            <div class="flex flex-col">
                                <span class="text-primary font-bold text-lg">${{ $product['pricing']['current_price'] }}</span>
                                @if($product['pricing']['save_amount'] > 0)
                                    <span class="text-gray-400 text-sm line-through">
                                ${{ $product['pricing']['original_price'] }}
                            </span>
                                @endif
                            </div>

                            {{-- Rating --}}
                            <div class="flex items-center">
                                <div class="stars mr-2 flex text-yellow-400">
                                    @for($i = 0; $i < 5; $i++)
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                        </svg>
                                    @endfor
                                </div>
                                <span class="text-xs text-gray-600">{{ $product['ratings']['score'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Modals (outside the grid) --}}
        {{-- Modals (outside the grid) --}}
        @foreach($products as $product)
            <div class="modal--window hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4"
                 id="{{ $product['modal_id'] }}">
                <div class="modal-content bg-white w-full max-w-4xl rounded-xl shadow-xl overflow-hidden">
                    <div class="flex h-full flex-col md:flex-row">
                        {{-- Left Side - Images --}}
                        <div class="md:w-1/2 bg-gray-100 p-6">
                            <div class="relative aspect-square mb-4">
                                <img src="{{ $product['product']['image'] }}"
                                     alt="{{ $product['product']['name'] }}"
                                     class="w-full h-full object-contain rounded-lg">
                                <div class="absolute top-4 left-4">
                                    <div class="flex items-center bg-white rounded-full px-3 py-1 shadow-md">
                                        <img src="{{ $product['vendor']['image'] }}"
                                             alt="{{ $product['vendor']['name'] }}"
                                             class="w-6 h-6 rounded-full">
                                        <span class="ml-2 text-sm font-medium">{{ $product['vendor']['name'] }}</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Thumbnails --}}
                            <div class="grid grid-cols-4 gap-2">
                                @foreach($product['product']['images'] ?? [] as $image)
                                    <div class="aspect-square rounded-lg overflow-hidden cursor-pointer hover:opacity-75">
                                        <img src="{{ $image }}"
                                             alt="Product thumbnail"
                                             class="w-full h-full object-cover">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Right Side - Details --}}
                        <div class="md:w-1/2 p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-800">{{ $product['product']['name'] }}</h2>
                                    <div class="flex items-center mt-2">
                                        <div class="flex text-yellow-400">
                                            @for($i = 0; $i < 5; $i++)
                                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                                                </svg>
                                            @endfor
                                        </div>
                                        <span class="ml-2 text-sm text-gray-600">
                                    {{ $product['ratings']['score'] }} ({{ $product['ratings']['total_reviews'] }} reviews)
                                </span>
                                    </div>
                                </div>
                                <button onclick="closeModal('{{ $product['modal_id'] }}')"
                                        class="text-gray-400 hover:text-gray-600 transition-colors p-2">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>

                            <div class="mt-6">
                                <div class="flex items-center space-x-3">
                                    <span class="text-3xl font-bold text-primary">${{ $product['pricing']['current_price'] }}</span>
                                    @if($product['pricing']['save_amount'] > 0)
                                        <span class="text-lg text-gray-400 line-through">${{ $product['pricing']['original_price'] }}</span>
                                        <span class="bg-green-100 text-green-800 text-sm px-2 py-1 rounded-full">
                                    Save ${{ $product['pricing']['save_amount'] }}
                                </span>
                                    @endif
                                </div>
                            </div>

                            <p class="mt-6 text-gray-600">{{ $product['product']['description'] }}</p>

                            {{-- Delivery Info --}}
                            <div class="mt-6 bg-gray-50 rounded-lg p-4">
                                <h3 class="font-medium text-gray-800 mb-3">Delivery Information</h3>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-primary mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="10"/>
                                            <polyline points="12 6 12 12 16 14"/>
                                        </svg>
                                        <span class="text-sm">{{ $product['delivery']['time'] }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-primary mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2L12 6M4.93 10.93L7.76 8.76M19.07 10.93L16.24 8.76M2 17H22M4 17V21M20 17V21"/>
                                        </svg>
                                        <span class="text-sm">{{ $product['delivery']['method'] }}</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Add to Cart Section --}}
                            <div class="mt-6">
                                <div class="flex space-x-4">
                                    <div class="flex border border-gray-300 rounded-lg">
                                        <button class="px-3 py-2 text-gray-600 hover:text-primary">-</button>
                                        <input type="number" value="1" min="1"
                                               class="w-16 text-center border-x border-gray-300 focus:outline-none">
                                        <button class="px-3 py-2 text-gray-600 hover:text-primary">+</button>
                                    </div>
                                    <button class="flex-1 bg-primary text-white py-2 px-6 rounded-lg hover:bg-primary/90
                                         transition-colors flex items-center justify-center space-x-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                        </svg>
                                        <span>Add to Cart</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach        <!-- Modals -->

    </main>
@endsection

@section('script')
    <script>
        // Open a modal by ID
        function openModal(modalId) {
            console.log('Opening modal:', modalId);
            const modal = document.getElementById(modalId);
            if (modal) {
                console.log('it click on open modula');
                modal.classList.add('active');
                console.log('Classes after:', modal.className);
                document.body.style.overflow = 'hidden';
            } else {
                console.error('Modal not found:', modalId);
            }
        }

        // Close a modal by ID
        function closeModal(modalId) {
            console.log('Closing modal:', modalId);
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        }

        // Update quantity input
        function updateQuantity(inputId, change) {
            console.log('Updating quantity:', inputId, change);
            const input = document.getElementById(inputId);
            if (input) {
                let value = parseInt(input.value) + change;
                if (value < 1) value = 1;
                input.value = value;
            }
        }

        // Add to cart with animation
        function addToCart(buttonId) {
            console.log('Adding to cart:', buttonId);
            const button = document.getElementById(buttonId);
            if (button) {
                button.classList.add('added');
                setTimeout(() => {
                    button.classList.remove('added');
                }, 1500);
                alert('Added to cart!');
            }
        }

        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', function () {
            console.log('DOM loaded');
            // Ensure all modals are hidden initially
            document.querySelectorAll('.modal--window').forEach(modal => {
                modal.classList.remove('active');
                modal.style.display = 'flex';
                modal.style.opacity = '0';
                modal.style.pointerEvents = 'none';
            });

            // Close modal when clicking outside content
            document.querySelectorAll('.modal--window').forEach(modal => {
                modal.addEventListener('click', function (e) {
                    if (e.target === this) {
                        this.classList.remove('active');
                        document.body.style.overflow = 'auto';
                    }
                });
            });

            // Close modal with Escape key
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    document.querySelectorAll('.modal--window.active').forEach(modal => {
                        modal.classList.remove('active');
                        document.body.style.overflow = 'auto';
                    });
                }
            });

            // Add click event to product cards
            document.querySelectorAll('.product-card').forEach(card => {
                card.addEventListener('click', function (e) {
                    console.log('Product card clicked:', this);
                    const modalId = this.getAttribute('data-modal');
                    console.log('Modal ID:', modalId);
                    if (modalId) {
                        openModal(modalId);
                    } else {
                        console.error('No modal ID found for card:', this);
                    }
                });
            });
        });
    </script>
@endsection
