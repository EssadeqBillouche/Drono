@extends('layouts.app')

@section('title', 'Marketplace Catalog')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">
@endsection

@section('content')
    <!-- Category Navigation -->
    <div class="bg-white border-b shadow-sm rounded-3xl mt-6 sticky top-0 z-30 -mx-4">
        <div class="container mx-auto px-4 py-3 overflow-x-auto">
            <div class="flex gap-3 min-w-max">
                <button class="category-pill active px-4 py-2 rounded-full text-sm font-medium bg-primary/10 text-primary">All</button>
                <button class="category-pill px-4 py-2 rounded-full text-sm font-medium hover:bg-primary/10 transition-colors">Food</button>
                <button class="category-pill px-4 py-2 rounded-full text-sm font-medium hover:bg-primary/10 transition-colors">Grocery</button>
                <button class="category-pill px-4 py-2 rounded-full text-sm font-medium hover:bg-primary/10 transition-colors">Pharmacy</button>
                <button class="category-pill px-4 py-2 rounded-full text-sm font-medium hover:bg-primary/10 transition-colors">Electronics</button>
                <button class="category-pill px-4 py-2 rounded-full text-sm font-medium hover:bg-primary/10 transition-colors">Fashion</button>
                <button class="category-pill px-4 py-2 rounded-full text-sm font-medium hover:bg-primary/10 transition-colors">Beauty</button>
                <button class="category-pill px-4 py-2 rounded-full text-sm font-medium hover:bg-primary/10 transition-colors">Home</button>
            </div>
        </div>
    </div>

    <!-- Featured Vendors -->
    <section class="py-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-text">Featured Vendors</h2>
            <a href="#" class="text-primary font-medium text-sm flex items-center">
                View all
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
            <!-- Vendor Cards -->
            <div class="bg-white rounded-xl p-4 flex flex-col items-center shadow-sm hover:shadow-md transition-all cursor-pointer group">
                <div class="w-16 h-16 rounded-full overflow-hidden mb-3 border-2 border-transparent group-hover:border-primary transition-all">
                    <img src="{{ asset('images/vendors/mcdonalds.jpg') }}" alt="McDonald's" class="w-full h-full object-cover">
                </div>
                <h3 class="font-medium text-text group-hover:text-primary transition-colors">McDonald's</h3>
                <p class="text-xs text-secondary">Fast Food</p>
                <div class="flex items-center mt-2">
                    <div class="text-yellow-400 mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <span class="text-xs text-secondary">4.8</span>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 flex flex-col items-center shadow-sm hover:shadow-md transition-all cursor-pointer group">
                <div class="w-16 h-16 rounded-full overflow-hidden mb-3 border-2 border-transparent group-hover:border-primary transition-all">
                    <img src="{{ asset('images/vendors/sephora.jpg') }}" alt="Sephora" class="w-full h-full object-cover">
                </div>
                <h3 class="font-medium text-text group-hover:text-primary transition-colors">Sephora</h3>
                <p class="text-xs text-secondary">Beauty</p>
                <div class="flex items-center mt-2">
                    <div class="text-yellow-400 mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <span class="text-xs text-secondary">4.9</span>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 flex flex-col items-center shadow-sm hover:shadow-md transition-all cursor-pointer group">
                <div class="w-16 h-16 rounded-full overflow-hidden mb-3 border-2 border-transparent group-hover:border-primary transition-all">
                    <img src="{{ asset('images/vendors/walgreens.jpg') }}" alt="Walgreens" class="w-full h-full object-cover">
                </div>
                <h3 class="font-medium text-text group-hover:text-primary transition-colors">Walgreens</h3>
                <p class="text-xs text-secondary">Pharmacy</p>
                <div class="flex items-center mt-2">
                    <div class="text-yellow-400 mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <span class="text-xs text-secondary">4.7</span>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 flex flex-col items-center shadow-sm hover:shadow-md transition-all cursor-pointer group">
                <div class="w-16 h-16 rounded-full overflow-hidden mb-3 border-2 border-transparent group-hover:border-primary transition-all">
                    <img src="{{ asset('images/vendors/wholefoods.jpg') }}" alt="Whole Foods" class="w-full h-full object-cover">
                </div>
                <h3 class="font-medium text-text group-hover:text-primary transition-colors">Whole Foods</h3>
                <p class="text-xs text-secondary">Grocery</p>
                <div class="flex items-center mt-2">
                    <div class="text-yellow-400 mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <span class="text-xs text-secondary">4.6</span>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 flex flex-col items-center shadow-sm hover:shadow-md transition-all cursor-pointer group">
                <div class="w-16 h-16 rounded-full overflow-hidden mb-3 border-2 border-transparent group-hover:border-primary transition-all">
                    <img src="{{ asset('images/vendors/bestbuy.jpg') }}" alt="Best Buy" class="w-full h-full object-cover">
                </div>
                <h3 class="font-medium text-text group-hover:text-primary transition-colors">Best Buy</h3>
                <p class="text-xs text-secondary">Electronics</p>
                <div class="flex items-center mt-2">
                    <div class="text-yellow-400 mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <span class="text-xs text-secondary">4.5</span>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 flex flex-col items-center shadow-sm hover:shadow-md transition-all cursor-pointer group">
                <div class="w-16 h-16 rounded-full overflow-hidden mb-3 border-2 border-transparent group-hover:border-primary transition-all">
                    <img src="{{ asset('images/vendors/zara.jpg') }}" alt="Zara" class="w-full h-full object-cover">
                </div>
                <h3 class="font-medium text-text group-hover:text-primary transition-colors">Zara</h3>
                <p class="text-xs text-secondary">Fashion</p>
                <div class="flex items-center mt-2">
                    <div class="text-yellow-400 mr-1">
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
                <div class="relative">
                    <select class="bg-white border border-gray-200 rounded-md pl-3 pr-8 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary appearance-none cursor-pointer">
                        <option>Popularity</option>
                        <option>Newest</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Fastest Delivery</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($allproducts as $product)
                <div class="product-card bg-white rounded-xl overflow-hidden shadow hover:shadow-lg transition-all cursor-pointer group" data-modal="product-{{ $product->id }}">
                    <div class="relative h-56 bg-gray-100 overflow-hidden">
                        <img src="{{ asset('storage/'.$product->images) }}"
                             alt="{{ $product->name }}"
                             class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-300">

                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-4">
                            <button class="bg-white text-primary p-2 rounded-full hover:bg-primary hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <button class="bg-primary text-white p-2 rounded-full hover:bg-white hover:text-primary transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                            </button>
                            <button class="bg-white text-primary p-2 rounded-full hover:bg-primary hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>

                        <div class="vendor-badge absolute top-3 left-3 w-8 h-8 rounded-full overflow-hidden border-2 border-white shadow-md">
                            <img src="{{ asset($product->store_profile)  }}"
                                 alt="{{ $product->store_name }}"
                                 class="w-full h-full object-cover">
                        </div>

                        <span class="absolute top-3 right-3 bg-blue-100 text-blue-800 px-2.5 py-1 text-xs font-semibold rounded-full">
                        {{ $product->category_name }}
                    </span>

                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-3">
                            <div class="flex items-center justify-between text-white">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12 6 12 12 16 14" />
                                    </svg>
                                    <span class="text-xs">Fast Delivery</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2L12 6M4.93 10.93L7.76 8.76M19.07 10.93L16.24 8.76M2 17H22M4 17V21M20 17V21" />
                                    </svg>
                                    <span class="text-xs">Express</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-5">
                        <h3 class="font-semibold text-lg text-gray-800 mb-1 group-hover:text-primary transition-colors">
                            {{ $product->name }}
                        </h3>

                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                            {{ $product->description }}
                        </p>

                        <div class="flex justify-between items-center">
                            <div class="flex flex-col">
                                <span class="text-primary font-bold text-lg">${{ $product->price }}</span>
                            </div>

                            <div class="flex items-center bg-gray-50 px-2 py-1 rounded-lg">
                                <div class="text-yellow-400 mr-1.5">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                    </svg>
                                </div>
                                <span class="text-xs font-medium text-gray-700">{{ $product->rating }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @foreach($allproducts as $product)
            <div class="modal--window hidden fixed inset-0 bg-black bg-opacity-60 backdrop-blur-sm z-50 flex items-center justify-center p-4"
                 id="product-{{ $product->id }}">
                <div class="modal-content bg-white w-full max-w-4xl rounded-xl shadow-xl overflow-hidden transform transition-all">
                    <div class="flex h-full flex-col md:flex-row">
                        <div class="md:w-1/2 bg-gray-50 p-6">
                            <div class="relative aspect-square mb-4 rounded-lg overflow-hidden border border-gray-100">
                                <img src="{{asset('storage/'.$product->images)}}"
                                     alt="{{ $product->name }}"
                                     class="w-full h-full object-contain">
                                <div class="absolute top-4 left-4">
                                    <div class="flex items-center bg-white rounded-full px-3 py-1 shadow-md">
                                        <img src="{{ asset($product->store_profile) ?? '/path/to/default-store-image.jpg' }}"
                                             alt="{{ $product->store_name }}"
                                             class="w-6 h-6 rounded-full">
                                        <span class="ml-2 text-sm font-medium">{{ $product->store_name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="md:w-1/2 p-6 md:overflow-y-auto" style="max-height: 80vh;">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-800">{{ $product->name }}</h2>
                                    <div class="flex items-center mt-1.5">
                                        <div class="flex text-yellow-400">
                                            @for($i = 0; $i < 5; $i++)
                                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                                                </svg>
                                            @endfor
                                        </div>
                                        <span class="ml-2 text-sm text-gray-600">
                                        {{ $product->rating }} ({{ $product->total_reviews }} reviews)
                                    </span>
                                    </div>
                                </div>
                                <button onclick="closeModal('product-{{ $product->id }}')"
                                        class="text-gray-400 hover:text-gray-600 transition-colors p-2 hover:bg-gray-100 rounded-full">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>

                            <div class="mt-6 bg-gray-50 p-4 rounded-xl">
                                <div class="flex items-center space-x-3">
                                    <span class="text-3xl font-bold text-primary">${{ $product->price }}</span>
                                </div>
                            </div>

                            <div class="mt-6">
                                <h3 class="font-medium text-gray-800 mb-2">Product Description</h3>
                                <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
                            </div>

                            <div class="mt-6 grid grid-cols-2 gap-3">
                                <div class="bg-gray-50 p-3 rounded-lg text-center">
                                    <span class="text-xs text-gray-500 block mb-1">Stock</span>
                                    <span class="text-sm font-medium {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $product->stock }} units
                                </span>
                                </div>
                                <div class="bg-gray-50 p-3 rounded-lg text-center">
                                    <span class="text-xs text-gray-500 block mb-1">Store</span>
                                    <span class="text-sm font-medium">{{ $product->store_name }}</span>
                                </div>
                            </div>

                            <div class="mt-6 flex flex-col space-y-4">
                                <div class="flex space-x-4">
                                    <div class="flex border border-gray-300 rounded-lg">
                                        <button class="px-3 py-2 text-gray-600 hover:text-primary transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                            </svg>
                                        </button>
                                        <input type="number" value="1" min="1"
                                               class="w-16 text-center border-x border-gray-300 focus:outline-none">
                                        <button class="px-3 py-2 text-gray-600 hover:text-primary transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                            </svg>
                                        </button>
                                    </div>
                                    <button onclick="addToCart('product-{{$product->id}}')"
                                            class="flex-1 bg-primary text-white py-2 px-6 rounded-lg hover:bg-primary/90 transition-colors flex items-center justify-center space-x-2 group">
                                        <svg class="w-5 h-5 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                        </svg>
                                        <span>Add to Cart</span>
                                    </button>
                                </div>

                                <button class="w-full border border-gray-300 py-2 rounded-lg flex items-center justify-center space-x-2 hover:bg-gray-50 transition-colors">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                    <span>Add to Wishlist</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </main>
@endsection

@section('script')
<script src="{{asset('js/catalog.js') }}"></script>



@endsection
