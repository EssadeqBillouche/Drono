<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drono - Page Not Found</title>
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
<div class="container mx-auto px-4 py-6">
    @include('Components.header')

    <div class="container">
        <!-- 404 Error Content -->
        <div class="flex flex-col items-center justify-center py-16 px-4 text-center">
            <h1 class="text-9xl font-bold text-primary mb-4">404</h1>
            <h2 class="text-3xl font-bold text-text mb-4">Oops! Page Not Found</h2>
            <p class="text-secondary text-lg mb-8 max-w-md">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
            <a href="" class="bg-primary hover:bg-[#e67100] text-white py-3 px-8 rounded-md font-medium transition-colors">
                Return to Homepage
            </a>
        </div>
    </div>
</div>

@include('Components.footer')

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
</script>
</body>
</html>
