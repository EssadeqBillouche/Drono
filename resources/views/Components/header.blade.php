<header class="flex justify-between items-center mb-6">
    <div class="flex items-center gap-3">
        <div class="relative w-8 h-8">
            <img src="{{ asset('Images/Logs/img_1.png') }}" alt="Drono Logo" class="w-full h-full object-cover">
        </div>
        <a href="/" class="text-2xl font-bold text-text hover:text-primary transition duration-200">Drono</a>
    </div>

    <!-- Desktop Navigation -->
    <nav class="hidden lg:flex">
        <ul class="flex gap-8">
            <li><a href="{{ route('index') }}" class="text-text hover:text-primary font-medium transition duration-200 relative group">
                    Home
                    <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-primary group-hover:w-full transition-all duration-300"></span>
                </a></li>
            <li><a href="{{ route('catalog') }}" class="text-text hover:text-primary font-medium transition duration-200 relative group">
                    Shop
                    <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-primary group-hover:w-full transition-all duration-300"></span>
                </a></li>
            <li><a href="#" class="text-text hover:text-primary font-medium transition duration-200 relative group">
                    Contact
                    <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-primary group-hover:w-full transition-all duration-300"></span>
                </a></li>
            <li><a href="#" class="text-text hover:text-primary font-medium transition duration-200 relative group">
                    About
                    <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-primary group-hover:w-full transition-all duration-300"></span>
                </a></li>
        </ul>
    </nav>

    <!-- Right Side Actions -->
    <div class="flex items-center gap-4">
        <!-- Search Button -->
        <button class="hidden md:flex items-center justify-center w-10 h-10 rounded-full hover:bg-white/70 transition duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </button>

        <!-- Login/Account Button -->
        <div class="relative group">
            @auth
                <!-- Logged In User Account -->
                <button class="flex items-center gap-2 px-3 py-2 rounded-full border border-gray-200 bg-white hover:bg-white/80 transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    <span class="hidden md:block text-sm font-medium">Account</span>
                </button>
                <!-- Dropdown Menu (Hidden by default, shown on hover/click) -->
                <div class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg py-2 z-40 hidden group-hover:block border border-gray-100">
                    <div class="px-4 py-2 border-b border-gray-100">
                        <p class="text-sm font-semibold text-text">Hello, {{ auth()->user()->name }}</p>
                        <p class="text-xs text-secondary truncate">{{ auth()->user()->email }}</p>
                    </div>
                    <a href="{{ route('profile') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-text hover:bg-background">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        My Profile
                    </a>
                    <a href="{{ route('orders') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-text hover:bg-background">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                        My Orders
                    </a>
                    <a href="{{ route('wishlist') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-text hover:bg-background">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                        Wishlist
                    </a>
                    <div class="border-t border-gray-100 my-1"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-2 w-full text-left px-4 py-2 text-sm text-text hover:bg-background">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                            Logout
                        </button>
                    </form>
                </div>
            @else
                <!-- Not Logged In - Login/Register -->
                <button class="flex items-center gap-2 px-3 py-2 rounded-full border border-gray-200 bg-white hover:bg-white/80 transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    <span class="hidden md:block text-sm font-medium">Login</span>
                </button>
                <!-- Dropdown Menu (Hidden by default, shown on hover) -->
                <div class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg py-2 z-40 hidden group-hover:block border border-gray-100">
                    <div class="px-4 py-3 border-b border-gray-100">
                        <p class="text-sm font-medium text-text">Welcome to Drono</p>
                        <p class="text-xs text-secondary">Sign in for the best experience</p>
                    </div>
                    <div class="p-4">
                        <a href="{{ route('login') }}" class="block w-full bg-primary hover:bg-[#e67200] text-white font-medium py-2 px-4 rounded text-center text-sm transition duration-200">Login</a>
                        <div class="mt-2 text-center">
                            <span class="text-xs text-secondary">Don't have an account?</span>
                            <a href="{{ route('client.register.view') }}" class="text-xs font-medium text-primary hover:text-[#e67200] ml-1">Register</a>
                        </div>
                    </div>
                </div>
            @endauth
        </div>

        <!-- Shopping Cart -->
        <div class="relative">
            <button class="shopping-cart-button flex items-center justify-center w-10 h-10 rounded-full border border-gray-200 bg-white hover:bg-white/80 transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                <span class="absolute -top-2 -right-2 flex items-center justify-center min-w-[1.25rem] h-5 px-1.5 py-0.5 text-xs font-semibold text-white bg-primary rounded-full">
                    {{-- Cart::count() ?? 0 --}}
                    0
                </span>
            </button>
        </div>

        <!-- Mobile Menu Button (visible on small screens) -->
        <button class="lg:hidden flex items-center justify-center w-10 h-10 rounded-full border border-gray-200 bg-white hover:bg-white/80 transition duration-200" id="mobile-menu-button" aria-label="Toggle menu">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"></line><line x1="4" x2="20" y1="6" y2="6"></line><line x1="4" x2="20" y1="18" y2="18"></line></svg>
        </button>
    </div>

    <!-- Mobile Navigation Menu (Hidden by default) -->
    <div class="hidden fixed inset-0 bg-white z-50 pt-6 pb-6 px-6 lg:hidden" id="mobile-menu">
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center gap-2">
                <div class="relative w-6 h-6">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-primary">
                        <path d="M19 10C19 11.8565 18.1045 13.637 16.5 14.8995C14.8955 16.162 12.7909 17 10.5 17C8.20914 17 6.10456 16.162 4.5 14.8995C2.89544 13.637 2 11.8565 2 10C2 8.14348 2.89544 6.36301 4.5 5.10051C6.10456 3.838 8.20914 3 10.5 3C12.7909 3 14.8955 3.838 16.5 5.10051C18.1045 6.36301 19 8.14348 19 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 3C12 3 14 1 16 1C18 1 20 2 20 4C20 6 19 7 19 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <span class="text-xl font-bold text-text">Drono</span>
            </div>
            <button id="close-mobile-menu" class="p-2 rounded-full hover:bg-background">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>

        @auth
            <!-- Logged In User Mobile View -->
            <div class="flex items-center gap-3 p-4 bg-background rounded-lg mb-6">
                <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold text-lg">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div>
                    <p class="font-medium">{{ auth()->user()->name }}</p>
                    <p class="text-sm text-secondary truncate">{{ auth()->user()->email }}</p>
                </div>
            </div>
        @endauth

        <nav class="space-y-6">
            <div>
                <h3 class="text-xs font-semibold text-secondary uppercase tracking-wider mb-3">Menu</h3>
                <ul class="space-y-4">
                    <li><a href="{{ route('index') }}" class="block text-lg font-medium text-text hover:text-primary">Home</a></li>
                    <li><a href="{{ route('catalog') }}" class="block text-lg font-medium text-text hover:text-primary">Shop</a></li>
                    <li><a href="#" class="block text-lg font-medium text-text hover:text-primary">Contact</a></li>
                    <li><a href="#" class="block text-lg font-medium text-text hover:text-primary">About</a></li>
                </ul>
            </div>

            @auth
                <!-- Account Section for Logged In Users -->
                <div>
                    <h3 class="text-xs font-semibold text-secondary uppercase tracking-wider mb-3">My Account</h3>
                    <ul class="space-y-4">
                        <li><a href="{{ route('profile') }}" class="block text-lg font-medium text-text hover:text-primary">My Profile</a></li>
                        <li><a href="{{ route('orders') }}" class="block text-lg font-medium text-text hover:text-primary">My Orders</a></li>
                        <li><a href="{{ route('wishlist') }}" class="block text-lg font-medium text-text hover:text-primary">Wishlist</a></li>
                    </ul>
                </div>

                <div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full bg-background hover:bg-gray-200 text-text font-medium py-3 rounded-lg transition duration-200">
                            Logout
                        </button>
                    </form>
                </div>
            @else
                <!-- Auth Buttons for Non-Logged In Users -->
                <div class="grid gap-3">
                    <a href="{{ route('login') }}" class="block text-center bg-primary hover:bg-[#e67200] text-white font-medium py-3 rounded-lg transition duration-200">Login</a>
                    <a href="{{ route('client.register.view') }}" class="block text-center bg-background hover:bg-gray-200 text-text font-medium py-3 rounded-lg transition duration-200">Create an Account</a>
                </div>
            @endauth
        </nav>
    </div>

    <!-- Mobile Menu JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const closeMobileMenuButton = document.getElementById('close-mobile-menu');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                    document.body.classList.toggle('overflow-hidden');
                });
            }

            if (closeMobileMenuButton && mobileMenu) {
                closeMobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                });
            }
        });
    </script>
</header>
