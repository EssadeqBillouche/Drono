@extends('layouts.app')

@section('title', 'Drone Delivery')

@section('content')
    <!-- Hero Section -->
    <main class="flex flex-col md:flex-row items-center mb-24">
        <div class="w-full md:w-1/2 mb-10 md:mb-0">
            <h1 class="text-7xl font-bold mb-2">
                <span class="text-[#ff7e00]">Drono</span>
                <div class="text-[#2f2f2f]">
                    Drone<br />Delivery
                </div>
            </h1>
            <p class="text-[#909090] max-w-xl mb-8">
                Discover the latest trends, insights, and strategies in marketing. Stay
                ahead with expert tips, innovative ideas, and data-driven approaches
                to grow your brand and reach your audience effectively
            </p>
            <div class="relative max-w-md">
                <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                </div>
                <input
                    type="text"
                    placeholder="Search"
                    class="pl-12 pr-4 py-3 w-full rounded-full border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#ff7e00]/20"
                />
            </div>
        </div>
        <div class="w-full md:w-1/2">
            <img
                src="{{ asset('Images/imageDrone/HomePage.png') }}"
                alt="Drone delivery illustration"
                class="w-full h-auto"
            />
        </div>
    </main>

    <!-- Features Section -->
    <section class="py-16 mb-24">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-[#2f2f2f] mb-4">Why Choose Drono?</h2>
            <p class="text-[#909090] max-w-2xl mx-auto">Our drone delivery service offers unmatched speed, reliability, and innovation to meet all your delivery needs.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @include('Components.feature-card', [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff7e00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>',
                'title' => 'Lightning Fast Delivery',
                'description' => 'Get your packages delivered in record time with our high-speed drone fleet. Perfect for urgent deliveries.'
            ])
            @include('Components.feature-card', [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff7e00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>',
                'title' => 'Secure & Safe',
                'description' => 'Advanced tracking and secure packaging ensure your items arrive safely and in perfect condition.'
            ])
            @include('Components.feature-card', [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff7e00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 16V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v9m16 0H4m16 0 1.28 2.55a1 1 0 0 1-.9 1.45H3.62a1 1 0 0 1-.9-1.45L4 16"/></svg>',
                'title' => 'Eco-Friendly',
                'description' => 'Our electric drones produce zero emissions, making your deliveries environmentally friendly and sustainable.'
            ])
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-16 mb-24 bg-white rounded-3xl">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-[#2f2f2f] mb-4">How It Works</h2>
            <p class="text-[#909090] max-w-2xl mx-auto">Getting your packages delivered by drone is simple and straightforward.</p>
        </div>
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="flex flex-col items-center text-center mb-12 md:mb-0 md:w-1/4">
                    <div class="w-16 h-16 bg-[#ff7e00] rounded-full flex items-center justify-center text-white text-2xl font-bold mb-6">1</div>
                    <h3 class="text-xl font-bold text-[#2f2f2f] mb-3">Place Your Order</h3>
                    <p class="text-[#909090]">Select your items and choose drone delivery at checkout.</p>
                </div>
                <div class="hidden md:block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#ff7e00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </div>
                <div class="flex flex-col items-center text-center mb-12 md:mb-0 md:w-1/4">
                    <div class="w-16 h-16 bg-[#ff7e00] rounded-full flex items-center justify-center text-white text-2xl font-bold mb-6">2</div>
                    <h3 class="text-xl font-bold text-[#2f2f2f] mb-3">Package Preparation</h3>
                    <p class="text-[#909090]">We prepare and secure your items for drone transport.</p>
                </div>
                <div class="hidden md:block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#ff7e00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </div>
                <div class="flex flex-col items-center text-center md:w-1/4">
                    <div class="w-16 h-16 bg-[#ff7e00] rounded-full flex items-center justify-center text-white text-2xl font-bold mb-6">3</div>
                    <h3 class="text-xl font-bold text-[#2f2f2f] mb-3">Drone Delivery</h3>
                    <p class="text-[#909090]">Our drone delivers your package directly to your specified location.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 mb-24">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-[#2f2f2f] mb-4">What Our Customers Say</h2>
            <p class="text-[#909090] max-w-2xl mx-auto">Don't just take our word for it - hear from our satisfied customers.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="flex items-center mb-4">
                    @for ($i = 0; $i < 5; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#ff7e00" stroke="#ff7e00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    @endfor
                </div>
                <p class="text-[#909090] mb-6">"I needed urgent documents delivered across town during rush hour. Drono got them there in 15 minutes! Absolutely incredible service."</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gray-200 rounded-full mr-4"></div>
                    <div>
                        <h4 class="font-semibold text-[#2f2f2f]">Sarah Johnson</h4>
                        <p class="text-sm text-[#909090]">Marketing Director</p>
                    </div>
                </div>
            </div>
            <!-- Add more testimonials similarly -->
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 mb-24 bg-white rounded-3xl">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-[#2f2f2f] mb-4">Frequently Asked Questions</h2>
                <p class="text-[#909090] max-w-2xl mx-auto">Find answers to common questions about our drone delivery service.</p>
            </div>
            <div class="max-w-3xl mx-auto">
                <div class="mb-6 border-b border-gray-200 pb-6">
                    <h3 class="text-xl font-bold text-[#2f2f2f] mb-3">How far can your drones deliver?</h3>
                    <p class="text-[#909090]">Our standard drones can deliver packages within a 10-mile radius of our distribution centers. For our rural service, we use extended-range drones that can reach up to 25 miles.</p>
                </div>
                <!-- Add more FAQ items -->
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 mb-24 bg-[#ff7e00] rounded-3xl text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-6">Ready to Experience the Future of Delivery?</h2>
            <p class="text-white/80 max-w-2xl mx-auto mb-8">Join thousands of satisfied customers who have made the switch to drone delivery. Fast, reliable, and eco-friendly.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/catalog" class="inline-block bg-white text-[#ff7e00] font-semibold px-8 py-3 rounded-full hover:bg-gray-100 transition-colors">Browse Services</a>
                <a href="#" class="inline-block bg-transparent border-2 border-white text-white font-semibold px-8 py-3 rounded-full hover:bg-white/10 transition-colors">Contact Sales</a>
            </div>
        </div>
    </section>
@endsection

