<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('Images/logs/img_1.png') }}" sizes="any">
    <title>Drono - @yield('title')</title>
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

    <div id="cartSidebar" class="fixed right-0 top-0 h-full w-80 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out z-50">
        <!-- Cart Header -->
        <div class="p-4 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-lg font-semibold">Shopping Cart</h2>
            <button onclick="toggleCart()" class="text-gray-400 hover:text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <!-- Cart Items -->
        <div class="p-4 overflow-y-auto h-[calc(100vh-180px)]">
            <!-- Cart items will be dynamically loaded here -->
        </div>
        <!-- Cart Footer -->
        <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-200 bg-white">
            <div class="flex justify-between mb-4">
                <span class="font-medium">Total:</span>
                <span class="font-bold">$99.99</span>
            </div>
            <button class="w-full bg-[#ff7e00] text-white py-2 rounded-md hover:bg-[#e67100] transition-colors">
                Checkout
            </button>
        </div>
    </div>
    <!-- Overlay -->
    <div id="cartOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40" onclick="toggleCart()"></div>
    <!-- Add this to your existing scripts section or create a new one -->
    <script>
        function toggleCart() {
            const sidebar = document.getElementById('cartSidebar');
            const overlay = document.getElementById('cartOverlay');

            if (sidebar.classList.contains('translate-x-full')) {
                sidebar.classList.remove('translate-x-full');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            } else {
                sidebar.classList.add('translate-x-full');
                overlay.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        }

        // Add click handler to cart button
        document.querySelector('.shopping-cart-button')?.addEventListener('click', function(e) {
            e.preventDefault();
            toggleCart();
        });
    </script>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
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
