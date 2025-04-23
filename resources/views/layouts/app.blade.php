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
    <div id="cartSidebar" class="fixed top-0 right-0 bottom-0 w-full md:w-96 bg-white shadow-xl z-50 transform transition-transform duration-300 ease-in-out translate-x-full">
        <div class="flex flex-col h-full">
            <!-- Enhanced Header -->
            <div class="flex justify-between items-center p-5 border-b bg-gradient-to-r from-[#ff7e00]/10 to-white">
                <div class="flex items-center">
                    <div class="bg-primary/10 p-2 rounded-full mr-3">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 cart-title">Your Cart</h3>
                        <p class="text-xs text-gray-500">Drono Express Delivery</p>
                    </div>
                </div>
                <button onclick="toggleCart()" class="p-2 hover:bg-gray-100 rounded-full transition-all hover:rotate-90 duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Cart Items Container -->
            <div class="p-4 overflow-y-auto flex-grow cart-items-container">
                <!-- Empty Cart State with Drone Illustration -->
                <div class="flex flex-col items-center justify-center h-full py-8">
                    <div class="mb-6 relative">
                        <svg class="w-24 h-24 text-gray-200" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Drone body -->
                            <rect x="35" y="42" width="30" height="15" rx="3" fill="currentColor"/>
                            <!-- Drone arms -->
                            <rect x="20" y="47" width="25" height="4" rx="2" fill="currentColor"/>
                            <rect x="55" y="47" width="25" height="4" rx="2" fill="currentColor"/>
                            <!-- Rotors -->
                            <circle cx="20" cy="49" r="8" stroke="currentColor" stroke-width="2" fill="none"/>
                            <circle cx="80" cy="49" r="8" stroke="currentColor" stroke-width="2" fill="none"/>
                            <circle cx="35" cy="49" r="5" stroke="currentColor" stroke-width="2" fill="none"/>
                            <circle cx="65" cy="49" r="5" stroke="currentColor" stroke-width="2" fill="none"/>
                            <!-- Camera -->
                            <circle cx="50" cy="53" r="4" fill="currentColor"/>
                        </svg>
                        <div class="absolute w-full h-full top-0 left-0 animate-pulse opacity-30">
                            <div class="absolute w-10 h-2 bg-primary rounded-full left-[20px] top-[30px]"></div>
                        </div>
                    </div>
                    <h4 class="text-gray-700 font-medium mb-1">Your cart is empty</h4>
                    <p class="text-gray-500 text-sm text-center mb-6 max-w-xs">Add items to your cart and get them delivered with Drono's lightning-fast drone delivery</p>
                    <button onclick="toggleCart()" class="px-6 py-2 bg-primary/10 text-primary font-medium rounded-full hover:bg-primary hover:text-white transition-all">
                        Continue Shopping
                    </button>
                </div>
            </div>

            <!-- Enhanced Footer -->
            <div class="border-t p-5">
                <div class="bg-gray-50 rounded-lg p-3 mb-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm text-gray-600">Subtotal</span>
                        <span class="font-bold text-lg cart-subtotal">$0.00</span>
                    </div>
                    <div class="flex justify-between items-center text-xs text-gray-500">
                        <span>Delivery Fee</span>
                        <span class="delivery-fee">$0.00</span>
                    </div>
                    <div class="h-px bg-gray-200 my-2"></div>
                    <div class="flex justify-between items-center font-medium">
                        <span>Total</span>
                        <span class="text-primary font-bold cart-total">$0.00</span>
                    </div>
                </div>
                <a href="http://127.0.0.1:8000/checkout" class="block bg-primary hover:bg-primary/90 text-white text-center py-3 rounded-lg transition-colors flex items-center justify-center space-x-2">
                    <span>Proceed to Checkout</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
                <button onclick="toggleCart()" class="block w-full text-center mt-3 text-gray-600 hover:text-primary transition-colors text-sm flex items-center justify-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    <span>Continue Shopping</span>
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
