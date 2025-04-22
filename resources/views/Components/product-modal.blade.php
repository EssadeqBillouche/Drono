{{-- resources/views/components/product-card.blade.php --}}
@foreach($products as $product)
    <div class="product-card bg-white rounded-xl overflow-hidden shadow-sm cursor-pointer hover:shadow-md transition-all" data-modal="modal-{{ $product['id'] }}">
        <div class="relative h-56 bg-light">
            <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="object-cover w-full h-full">
            <div class="vendor-badge absolute top-3 left-3 w-8 h-8 rounded-full overflow-hidden border-2 border-primary">
                <img src="{{ asset($product['vendor_image']) }}" alt="{{ $product['vendor_name'] }}" class="w-full h-full object-cover">
            </div>
            <span class="absolute top-3 right-3 bg-blue-100 text-blue-800 px-2 py-1 text-xs font-semibold rounded-full">{{ $product['category'] }}</span>
            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-3">
                <div class="flex items-center justify-between text-white">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        <span class="text-xs">{{ $product['delivery_time'] }} delivery</span>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1 drone-icon"><path d="M12 2 L12 6"/><path d="M4.93 10.93 L7.76 8.76"/><path d="M19.07 10.93 L16.24 8.76"/><path d="M2 17 L22 17"/><path d="M4 17 L4 21"/><path d="M20 17 L20 21"/></svg>
                        <span class="text-xs">{{ $product['delivery_method'] }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-5">
            <h3 class="font-semibold text-lg text-text mb-1">{{ $product['name'] }}</h3>
            <p class="text-secondary text-sm mb-4 line-clamp-2">{{ $product['description'] }}</p>
            <div class="flex justify-between items-center">
                <span class="text-primary font-bold text-lg">${{ $product['price'] }}</span>
                <div class="flex items-center">
                    <div class="stars mr-2 flex">
                        @for($i = 1; $i <= 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                 fill="currentColor"
                                 @if($i > floor($product['rating']))
                                     fill-opacity="0.3"
                                @endif
                            ><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        @endfor
                    </div>
                    <span class="text-xs text-secondary">{{ $product['rating'] }}</span>
                </div>
            </div>
        </div>
    </div>
@endforeach
