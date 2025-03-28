<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drono - @yield('title')</title>
    <link rel="stylesheet" href="@yield('css')">
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
    @vite(['resources/css/catalog.css', 'resources/js/catalog.js'])
</head>
<body class="min-h-screen bg-[#fff9f0]">
<div class="container mx-auto px-4 py-6">
    @include('Components.header')  <!-- Updated path -->

    @yield('content')

</div>
@yield('script')

@include('Components.footer')  <!-- Updated path -->
</body>
</html>
