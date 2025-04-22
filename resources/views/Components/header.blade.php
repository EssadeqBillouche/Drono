<header class="flex justify-between items-center mb-0">
    <div class="flex items-center gap-2">
        <div class="relative w-6 h-6">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 10C19 11.8565 18.1045 13.637 16.5 14.8995C14.8955 16.162 12.7909 17 10.5 17C8.20914 17 6.10456 16.162 4.5 14.8995C2.89544 13.637 2 11.8565 2 10C2 8.14348 2.89544 6.36301 4.5 5.10051C6.10456 3.838 8.20914 3 10.5 3C12.7909 3 14.8955 3.838 16.5 5.10051C18.1045 6.36301 19 8.14348 19 10Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 3C12 3 14 1 16 1C18 1 20 2 20 4C20 6 19 7 19 7" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <a href="/" class="text-2xl font-bold text-[#2f2f2f]">Drono</a>
    </div>

    <!-- Desktop Navigation -->
    <nav class="hidden md:flex">
        <ul class="flex gap-8">
            <li><a href="{{ route('index') }}" class="text-[#2f2f2f] hover:text-[#ff7e00]">Home</a></li>
            <li><a href="{{ route('catalog') }}" class="text-[#2f2f2f] hover:text-[#ff7e00]">Shop</a></li>
            <li><a href="#" class="text-[#2f2f2f] hover:text-[#ff7e00]">Contact</a></li>
            <li><a href="#" class="text-[#2f2f2f] hover:text-[#ff7e00]">About</a></li>
        </ul>
    </nav>

    <!-- Right Side Actions -->
    <div class="flex items-center gap-4">
        <!-- Login/Account Button -->
        <div class="relative group">
            <button class="flex items-center justify-center w-10 h-10 rounded-full border border-gray-200 bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            </button>
            <!-- Dropdown Menu (Hidden by default, shown on hover) -->
            <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-10 hidden group-hover:block">
                @auth
                    <!-- Show these options when user is logged in -->
                    <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-[#2f2f2f] hover:bg-gray-100">My Profile</a>
                    <a href="{{ route('orders') }}" class="block px-4 py-2 text-sm text-[#2f2f2f] hover:bg-gray-100">My Orders</a>
                    <a href="{{ route('wishlist') }}" class="block px-4 py-2 text-sm text-[#2f2f2f] hover:bg-gray-100">Wishlist</a>
                    <div class="border-t border-gray-100 my-1"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-[#2f2f2f] hover:bg-gray-100">Logout</button>
                    </form>
                @else
                    <!-- Show these options when user is not logged in -->
                    <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-[#2f2f2f] hover:bg-gray-100">Login</a>
                    <a href="{{ route('client.register.view') }}" class="block px-4 py-2 text-sm text-[#2f2f2f] hover:bg-gray-100">Register</a>
                @endauth
            </div>
        </div>

        <!-- Shopping Cart -->
        <div class="relative">
            <button class="shopping-cart-button flex items-center justify-center w-10 h-10 rounded-full border border-gray-200 bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-cart"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
            </button>
            <span class="absolute -top-2 -right-2 flex items-center justify-center min-w-[1.25rem] h-5 px-1.5 py-0.5 text-xs font-semibold text-white bg-[#ff7e00] rounded-full">
{{--                Cart::count() ?? 0--}}
            </span>
        </div>

        <!-- Mobile Menu Button (visible on small screens) -->
        <button class="md:hidden flex items-center justify-center w-10 h-10 rounded-full border border-gray-200 bg-white" id="mobile-menu-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"></line><line x1="4" x2="20" y1="6" y2="6"></line><line x1="4" x2="20" y1="18" y2="18"></line></svg>
        </button>
    </div>

    <!-- Mobile Navigation Menu (Hidden by default) -->
    <div class="hidden absolute top-20 left-0 right-0 bg-white shadow-md z-50 p-4 md:hidden" id="mobile-menu">
        <ul class="flex flex-col gap-4">
            <li><a href="{{ route('index') }}" class="block text-[#2f2f2f] hover:text-[#ff7e00]">Home</a></li>
            <li><a href="{{ route('catalog') }}" class="block text-[#2f2f2f] hover:text-[#ff7e00]">Shop</a></li>
            <li><a href="#" class="block text-[#2f2f2f] hover:text-[#ff7e00]">Contact</a></li>
            <li><a href="#" class="block text-[#2f2f2f] hover:text-[#ff7e00]">About</a></li>
            <li><a href="#" class="block text-[#2f2f2f] hover:text-[#ff7e00]">Track Order</a></li>

            @auth
                <!-- Show these options when user is logged in -->
                <li class="border-t border-gray-100 pt-4 mt-2">
                    <a href="{{ route('profile') }}" class="block text-[#2f2f2f] hover:text-[#ff7e00]">My Profile</a>
                </li>
                <li>
                    <a href="{{ route('orders') }}" class="block text-[#2f2f2f] hover:text-[#ff7e00]">My Orders</a>
                </li>
                <li>
                    <a href="{{ route('wishlist') }}" class="block text-[#2f2f2f] hover:text-[#ff7e00]">Wishlist</a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left text-[#2f2f2f] hover:text-[#ff7e00]">Logout</button>
                    </form>
                </li>
            @else
                <!-- Show these options when user is not logged in -->
                <li class="border-t border-gray-100 pt-4 mt-2">
                    <a href="{{ route('login') }}" class="block text-[#2f2f2f] hover:text-[#ff7e00]">Login</a>
                </li>
                <li>
                    <a href="{{ route('client.register.view') }}" class="block text-[#2f2f2f] hover:text-[#ff7e00]">Register</a>
                </li>
            @endauth
        </ul>
    </div>

    <!-- Simple JavaScript for Mobile Menu Toggle -->
    <script>
        document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenu) {
                mobileMenu.classList.toggle('hidden');
            }
        });
    </script>
</header>
