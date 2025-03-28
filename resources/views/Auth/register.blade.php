@extends('layouts.app')

@section('title', 'Register')

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
                        <h1 class="text-2xl font-bold text-text mb-3 text-center">Create Account</h1>
                        <p class="text-center text-gray-600 mb-4 text-sm">Sign up to get started</p>

                        <form class="space-y-4" method="POST" action="{{ route('register') }}">
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
                                        placeholder="John Doe"
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
                                        placeholder="you@example.com"
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

                            <button
                                type="submit"
                                class="w-full bg-primary hover:bg-primary/90 text-white font-medium py-2 px-3 rounded-lg transition-colors flex items-center justify-center text-sm"
                            >
                                <span>Sign up</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </button>
                        </form>

                        <div class="mt-4">
                            <div class="relative">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-300"></div>
                                </div>
                                <div class="relative flex justify-center text-xs">
                                    <span class="px-2 bg-[#f0ece1] text-gray-500">Or continue with</span>
                                </div>
                            </div>

                            <div class="mt-3 grid grid-cols-2 gap-2">
                                <a href="#" class="w-full inline-flex justify-center py-1.5 px-3 border border-gray-300 rounded-lg shadow-sm bg-white text-xs font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
                                    </svg>
                                </a>
                                <a href="#" class="w-full inline-flex justify-center py-1.5 px-3 border border-gray-300 rounded-lg shadow-sm bg-white text-xs font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 2C6.477 2 2 6.477 2 12c0 4.42 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.342-3.369-1.342-.454-1.155-1.11-1.462-1.11-1.462-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.268 2.75 1.026A9.578 9.578 0 0112 6.836c.85.004 1.705.114 2.504.336 1.909-1.294 2.747-1.026 2.747-1.026.546 1.377.202 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C19.138 20.161 22 16.416 22 12c0-5.523-4.477-10-10-10z" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <div class="mt-4 text-center">
                            <p class="text-text text-sm">
                                Already have an account? <a href="{{ route('login') }}" class="text-primary hover:text-primary/80 font-medium">Sign in</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
