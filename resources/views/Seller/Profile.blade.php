@extends('layouts.app')

@section('title', 'Seller Profile')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/seller_profile.css') }}">
@endsection

@section('content')
    <!-- Seller Profile Header -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden mt-6">
        <div class="relative w-full h-56 bg-gradient-to-r from-primary/30 to-primary/10">
            <!-- Back button -->
            <a href="{{ url()->previous() }}" class="absolute top-4 left-4 bg-white/80 hover:bg-white text-gray-700 p-2 rounded-full transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>

            <!-- Profile picture positioned at bottom edge -->
            <div class="absolute -bottom-16 left-8">
                <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-white shadow-md bg-white">
                    <img src="{{ asset($seller->store_profile) }}" alt="{{ $seller->name }}" class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        <div class="pt-20 pb-6 px-8">
            <div class="flex flex-col md:flex-row md:justify-between md:items-end">
                <div>
                    <h1 class="text-3xl font-bold text-text">{{ $seller->store_name }}</h1>
                    <div class="flex items-center mt-2">
                        <div class="text-yellow-400 mr-1.5">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700">{{ $seller->rating ?? '0' }} ({{ $seller->reviews_count ?? '0' }} reviews)</span>
                        <span class="mx-2 text-gray-300">•</span>
                        <span class="text-sm text-secondary">{{ $seller->category }}</span>
                    </div>
                </div>

                <div class="mt-4 md:mt-0 flex flex-wrap gap-3">
                    <button class="bg-primary/10 text-primary hover:bg-primary hover:text-white transition-colors py-2 px-4 rounded-full flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        Contact Seller
                    </button>
                    <button class="border border-gray-200 hover:border-primary/30 hover:bg-primary/5 transition-colors py-2 px-4 rounded-full flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        Follow
                    </button>
                    <button class="border border-gray-200 hover:border-primary/30 hover:bg-primary/5 transition-colors py-2 px-4 rounded-full flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                        </svg>
                        Share
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Seller Info Tabs & Statistics -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
        <div class="lg:col-span-2 space-y-6">
            <!-- Tabs -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="border-b flex">
                    <button class="py-4 px-6 border-b-2 border-primary text-primary font-medium flex-1 text-center">Products</button>
                    <button class="py-4 px-6 text-secondary hover:text-primary/80 transition-colors font-medium flex-1 text-center">About</button>
                    <button class="py-4 px-6 text-secondary hover:text-primary/80 transition-colors font-medium flex-1 text-center">Reviews</button>
                </div>

                <div class="p-6">
                    <p class="text-gray-600 mb-4">{{ $seller->description }}</p>

                    <!-- Product Filters -->
                    <div class="flex flex-wrap gap-2 mb-6">
                        <button class="bg-primary/10 text-primary px-4 py-2 rounded-full text-sm font-medium">All Products</button>
{{--                        @if($seller->categories->isNotEmpty())--}}
{{--                            @foreach($seller->categories as $category)--}}
{{--                                <button class="bg-gray-100 text-secondary hover:bg-primary/10 hover:text-primary transition-colors px-4 py-2 rounded-full text-sm font-medium">{{ $category->name }}</button>--}}
{{--                            @endforeach--}}
{{--                        @endif--}}
                    </div>

                    <!-- Product Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @if($seller->products->isNotEmpty())
                            @foreach($seller->products as $product)
                                <div class="product-card bg-white rounded-xl overflow-hidden border hover:shadow-md transition-all cursor-pointer group" data-modal="product-{{ $product->id }}">
                                    <div class="relative h-48 bg-gray-50 overflow-hidden">
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

                                        <span class="absolute top-3 right-3 bg-blue-100 text-blue-800 px-2.5 py-1 text-xs font-semibold rounded-full">
                                            {{ $product->category_name }}
                                        </span>
                                    </div>

                                    <div class="p-4">
                                        <h3 class="font-semibold text-gray-800 mb-1 group-hover:text-primary transition-colors">
                                            {{ $product->name }}
                                        </h3>

                                        <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                                            {{ $product->description }}
                                        </p>

                                        <div class="flex justify-between items-center">
                                            <span class="text-primary font-bold">${{ $product->price }}</span>

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
                        @else
                            <div class="col-span-2 py-12 flex flex-col items-center justify-center text-center bg-gray-50 rounded-xl">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-700 mb-1">No products found</h3>
                                <p class="text-gray-500">This seller hasn't added any products yet.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Seller Statistics Sidebar -->
        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b">
                    <h3 class="font-semibold text-text">Store Information</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="bg-primary/10 p-2 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm text-secondary">Location</h4>
                                <p class="text-text font-medium">{{ $seller->address }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="bg-primary/10 p-2 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm text-secondary">Business Hours</h4>
                                <p class="text-text font-medium">{{ $seller->business_hours ?? 'Mon - Fri: 9:00 AM - 6:00 PM' }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="bg-primary/10 p-2 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm text-secondary">Contact</h4>
                                <p class="text-text font-medium">{{ $seller->phone }}</p>
                                <p class="text-text">{{ $seller->email }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="bg-primary/10 p-2 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm text-secondary">Member Since</h4>
                                <p class="text-text font-medium">{{ $seller->created_at->format('F Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Seller Stats Card -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b">
                    <h3 class="font-semibold text-text">Seller Statistics</h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gray-50 rounded-lg p-4 text-center">
                            <h4 class="text-xl font-bold text-primary">{{ $seller->products_count ?? 0 }}</h4>
                            <p class="text-sm text-secondary">Products</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4 text-center">
                            <h4 class="text-xl font-bold text-primary">{{ $seller->orders_count ?? 0 }}</h4>
                            <p class="text-sm text-secondary">Orders</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4 text-center">
                            <h4 class="text-xl font-bold text-primary">{{ $seller->reviews_count ?? 0 }}</h4>
                            <p class="text-sm text-secondary">Reviews</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4 text-center">
                            <h4 class="text-xl font-bold text-primary">{{ $seller->rating ?? '0.0' }}</h4>
                            <p class="text-sm text-secondary">Rating</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h4 class="text-sm font-medium text-gray-700 mb-2">Satisfaction Rate</h4>
                        <div class="h-3 bg-gray-200 rounded-full overflow-hidden">
                            <div class="bg-primary h-full" style="width: {{ ($seller->satisfaction_rate ?? 0) * 100 }}%"></div>
                        </div>
                        <div class="flex justify-between mt-1">
                            <span class="text-xs text-gray-500">0%</span>
                            <span class="text-xs text-gray-500">100%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Featured Products Card -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b">
                    <h3 class="font-semibold text-text">Featured Products</h3>
                </div>
                <div class="p-6">
                    @if($seller->featured_products && $seller->featured_products->isNotEmpty())
                        <div class="space-y-4">
                            @foreach($seller->featured_products->take(3) as $product)
                                <div class="flex gap-3 items-center">
                                    <div class="w-16 h-16 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                                        <img src="{{ asset('storage/'.$product->images) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="flex-grow">
                                        <h4 class="font-medium text-text line-clamp-1">{{ $product->name }}</h4>
                                        <div class="flex items-center text-yellow-400 space-x-0.5">
                                            @for ($i = 0; $i < 5; $i++)
                                                <svg class="w-3 h-3" viewBox="0 0 24 24" fill="currentColor">
                                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                                </svg>
                                            @endfor
                                        </div>
                                        <p class="text-primary font-semibold">${{ $product->price }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4 text-gray-500">
                            No featured products
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Product Modal Template (similar to catalog page) -->
    @foreach($seller->products as $product)
        <div class="modal--window hidden fixed inset-0 bg-black bg-opacity-60 backdrop-blur-sm z-50 flex items-center justify-center p-4"
             id="product-{{ $product->id }}">
            <div class="modal-content bg-white w-full max-w-4xl rounded-xl shadow-xl overflow-hidden transform transition-all">
                <div class="flex h-full flex-col md:flex-row">
                    <div class="md:w-1/2 bg-gray-50 p-6">
                        <div class="relative aspect-square mb-4 rounded-lg overflow-hidden border border-gray-100">
                            <img src="{{ asset('storage/'.$product->images) }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-full object-contain">
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
                                    {{ $product->rating }} ({{ $product->total_reviews ?? 0 }} reviews)
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
                                <span class="text-xs text-gray-500 block mb-1">Category</span>
                                <span class="text-sm font-medium">{{ $product->category_name }}</span>
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
@endsection

@section('script')
    <script>
        // Function to handle product modal open/close
        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Open product modal when clicked
        document.addEventListener('DOMContentLoaded', function() {
            const productCards = document.querySelectorAll('.product-card');

            productCards.forEach(card => {
                card.addEventListener('click', function() {
                    const modalId = this.getAttribute('data-modal');
                    document.getElementById(modalId).classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                });
            });

            // Close modal when clicking outside
            const modals = document.querySelectorAll('.modal--window');
            modals.forEach(modal => {
                modal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        this.classList.add('hidden');
                        document.body.style.overflow = 'auto';
                    }
                });
            });
        });
    </script>
@endsection
