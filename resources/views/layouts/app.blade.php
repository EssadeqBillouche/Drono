<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" sizes="any">
    <title>Drono - @yield('title')</title>

    <style>
        /* Cart Sidebar Transitions */
        #cartSidebar {
            transition: transform 0.3s ease-in-out;
        }

        .shopping-cart-button {
            transition: transform 0.2s ease;
        }

        .shopping-cart-button span {
            transition: all 0.3s ease;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-4px); }
        }

        .animate-bounce {
            animation: bounce 0.5s ease-in-out;
        }
    </style>

    @yield('css')
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#ff7e00",
                        text: "#2f2f2f",
                        secondary: "#909090",
                        background: "#fff9f0",
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-[#fff9f0]">
<!-- Loading Screen -->
<div id="preloader" class="fixed inset-0 z-50 flex items-center justify-center bg-white">
    <img src="{{ asset('images/preloader.gif') }}" alt="Loading...">
</div>

<div class="container mx-auto px-4 py-6">
    @include('Components.header')  <!-- Updated path -->

    <!-- Cart Sidebar -->
    <div id="cartOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden" onclick="toggleCart()"></div>
    <div id="cartSidebar" class="fixed top-0 right-0 bottom-0 w-full md:w-96 bg-white shadow-xl z-50 transform translate-x-full transition-transform duration-300 ease-in-out">
        <div class="flex flex-col h-full">
            <!-- Header -->
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="text-lg font-bold flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    Your Cart
                </h3>
                <button onclick="toggleCart()" class="p-2 hover:bg-gray-100 rounded-full">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Cart Items -->
            <div class="p-4 overflow-y-auto flex-grow">
                <!-- Cart items will be rendered here by JS -->
                <div class="flex flex-col items-center justify-center h-full py-8">
                    <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <p class="text-gray-500">Your cart is empty</p>
                    <button onclick="toggleCart()" class="mt-4 text-primary hover:text-[#e67100] transition-colors">
                        Continue Shopping
                    </button>
                </div>
            </div>

            <!-- Footer -->
            <div class="border-t p-4">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-sm text-gray-600">Subtotal</span>
                    <span class="font-bold">$0.00</span>
                </div>
                <a href="{{ route('checkout') }}" class="block bg-primary hover:bg-primary/90 text-white text-center py-3 rounded-lg transition-colors">
                    Proceed to Checkout
                </a>
                <button onclick="toggleCart()" class="block w-full text-center mt-3 text-gray-600 hover:text-gray-800 transition-colors text-sm">
                    Continue Shopping
                </button>
            </div>
        </div>
    </div>

    <div class="container">
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <p>{{ session('error') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</div>

@include('Components.footer')

@yield('script')
<script src="{{ asset('js/cart.js') }}"></script>
<script>
    // Hide preloader when page is loaded
    window.addEventListener('load', function() {
        document.getElementById('preloader').style.display = 'none';
    });

    // Show preloader when navigating
    document.addEventListener('click', function(e) {
        const link = e.target.closest('a');
        if (link &&
            link.href &&
            !link.href.includes('#') &&
            !link.href.includes('javascript:') &&
            !e.ctrlKey &&
            !e.metaKey &&
            !link.target) {

            document.getElementById('preloader').style.display = 'flex';
        }
    });
</script>
</body>
</html>
