@extends('layouts.app')

@section('title', 'Seller Register')

@section('content')
    <div class="flex-grow flex justify-center items-center mt-12 mb-12">
        <div class="container mx-auto max-w-4xl shadow-xl rounded-2xl overflow-hidden">
            <div class="flex flex-col md:flex-row">
                <!-- Left Panel - Orange with Drone Illustration -->
                <div class="bg-primary w-full md:w-2/5 flex items-center justify-center p-4 md:p-6">
                    <div class="relative w-32 h-32 md:w-48 md:h-48">
                        <div class="absolute inset-0 bg-[#e6f4ff] rounded-full flex items-center justify-center">
                            <img src="{{ asset('Images/imageDrone/Drone1.png') }}" alt="Drone Illustration" class="w-3/4 h-3/4 object-contain">
                        </div>
                    </div>
                </div>
                <!-- Right Panel - Compact Form -->
                <div class="w-full md:w-3/5 bg-[#f0ece1] p-4 md:p-6 flex items-center justify-center">
                    <div class="w-full max-w-sm">
                        <h1 class="text-2xl font-bold text-text mb-3 text-center">Create Seller Account</h1>
                        <p class="text-center text-gray-600 mb-4 text-sm">Sign up to start selling with Drono</p>

                        <form class="space-y-4" method="POST" action="" enctype="multipart/form-data">
                            @csrf

                            <div class="space-y-1">
                                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-2 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    </div>
                                    <input
                                        id="name"
                                        name="name"
                                        type="text"
                                        placeholder="Jane Seller"
                                        class="w-full pl-8 pr-3 py-2 bg-white rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
                                        required
                                        value="{{ old('name') }}"
                                    />
                                    @error('name')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="space-y-1">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-2 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                    </div>
                                    <input
                                        id="email"
                                        name="email"
                                        type="email"
                                        placeholder="jane@example.com"
                                        class="w-full pl-8 pr-3 py-2 bg-white rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
                                        required
                                        value="{{ old('email') }}"
                                    />
                                    @error('email')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="space-y-1">
                                <label for="store_name" class="block text-sm font-medium text-gray-700">Store Name</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-2 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    </div>
                                    <input
                                        id="store_name"
                                        name="store_name"
                                        type="text"
                                        placeholder="Jane's Drone Shop"
                                        class="w-full pl-8 pr-3 py-2 bg-white rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
                                        required
                                        value="{{ old('store_name') }}"
                                    />
                                    @error('store_name')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="space-y-1">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-2 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    </div>
                                    <input
                                        id="password"
                                        name="password"
                                        type="password"
                                        placeholder="••••••••"
                                        class="w-full pl-8 pr-3 py-2 bg-white rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
                                        required
                                    />
                                    @error('password')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="space-y-1">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-2 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    </div>
                                    <input
                                        id="password_confirmation"
                                        name="password_confirmation"
                                        type="password"
                                        placeholder="••••••••"
                                        class="w-full pl-8 pr-3 py-2 bg-white rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
                                        required
                                    />
                                </div>
                            </div>

                            <div class="space-y-1">
                                <label for="profile_image" class="block text-sm font-medium text-gray-700">Store Profile Image</label>
                                <input
                                    id="profile_image"
                                    name="profile_image"
                                    type="file"
                                    class="w-full py-2 bg-white rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
                                    required
                                />
                                @error('profile_image')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="space-y-1">
                                <label for="store_background_image" class="block text-sm font-medium text-gray-700">Store Background Image</label>
                                <input
                                    id="store_background_image"
                                    name="store_background_image"
                                    type="file"
                                    class="w-full py-2 bg-white rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
                                    required
                                />
                                @error('store_background_image')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Hidden role field for Seller -->
                            <input type="hidden" name="role" value="seller">

                            <button
                                type="submit"
                                class="w-full bg-primary hover:bg-primary/90 text-white font-medium py-2 px-3 rounded-lg transition-colors flex items-center justify-center text-sm"
                            >
                                <span>Sign up as Seller</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </button>
                        </form>

                        <div class="mt-4 text-center">
                            <p class="text-text text-sm">
                                Already have an account? <a href="" class="text-primary hover:text-primary/80 font-medium">Sign in</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
