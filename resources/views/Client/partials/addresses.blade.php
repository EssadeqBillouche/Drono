<div id="addresses-section" class="section">
    <div class="section-content bg-white rounded-xl shadow-sm p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-[#2f2f2f]">Addresses</h2>
            <button class="text-primary hover:text-primary/80 font-medium" id="add-address-btn">Add New Address</button>
        </div>
        <div class="grid md:grid-cols-2 gap-4">
            @forelse($addresses ?? [
                [
                    'id' => 1,
                    'name' => 'Home',
                    'is_default' => true,
                    'recipient' => 'John Doe',
                    'line1' => '123 Main Street',
                    'line2' => 'Apt 4B',
                    'city' => 'New York',
                    'state' => 'NY',
                    'postal_code' => '10001',
                    'country' => 'United States',
                    'phone' => '+1 (555) 123-4567'
                ],
                [
                    'id' => 2,
                    'name' => 'Work',
                    'is_default' => false,
                    'recipient' => 'John Doe',
                    'line1' => '456 Business Ave',
                    'line2' => 'Suite 200',
                    'city' => 'San Francisco',
                    'state' => 'CA',
                    'postal_code' => '94107',
                    'country' => 'United States',
                    'phone' => '+1 (555) 987-6543'
                ]
            ] as $address)
                <div class="border border-gray-200 p-4 rounded-lg relative">
                    <div class="absolute top-4 right-4 flex space-x-2">
                        <button class="text-[#909090] hover:text-[#2f2f2f]" data-address-id="{{ $address['id'] }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                        </button>
                        <button class="text-[#909090] hover:text-red-500" data-address-id="{{ $address['id'] }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                        </button>
                    </div>
                    @if($address['is_default'])
                        <div class="flex items-start mb-2">
                            <span class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded-full">Default</span>
                        </div>
                    @endif
                    <h3 class="font-medium text-[#2f2f2f]">{{ $address['name'] }}</h3>
                    <p class="text-[#909090] mt-1">{{ $address['recipient'] }}</p>
                    <p class="text-[#909090]">{{ $address['line1'] }}</p>
                    @if($address['line2'])
                        <p class="text-[#909090]">{{ $address['line2'] }}</p>
                    @endif
                    <p class="text-[#909090]">{{ $address['city'] }}, {{ $address['state'] }} {{ $address['postal_code'] }}</p>
                    <p class="text-[#909090]">{{ $address['country'] }}</p>
                    <p class="text-[#909090]">{{ $address['phone'] }}</p>
                </div>
            @empty
                <div class="md:col-span-2 text-center py-8 border border-dashed border-gray-200 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#909090" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-3"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    <p class="text-[#909090]">You don't have any saved addresses</p>
                    <button id="add-first-address" class="mt-4 inline-block px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Add Address</button>
                </div>
            @endforelse
        </div>

        <!-- Address Form Modal (Hidden by default) -->
        <div id="address-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg p-6 w-full max-w-lg">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-[#2f2f2f]">Add New Address</h3>
                    <button id="close-address-modal" class="text-[#909090] hover:text-[#2f2f2f]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                    </button>
                </div>
                <form action="{{ route('addresses.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-[#909090] mb-1">Address Name</label>
                        <input type="text" name="name" placeholder="Home, Work, etc." class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#909090] mb-1">Full Name</label>
                        <input type="text" name="recipient" placeholder="Recipient's name" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#909090] mb-1">Address Line 1</label>
                        <input type="text" name="line1" placeholder="Street address" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#909090] mb-1">Address Line 2 (Optional)</label>
                        <input type="text" name="line2" placeholder="Apartment, suite, unit, etc." class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-[#909090] mb-1">City</label>
                            <input type="text" name="city" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#909090] mb-1">State/Province</label>
                            <input type="text" name="state" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-[#909090] mb-1">Postal Code</label>
                            <input type="text" name="postal_code" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#909090] mb-1">Country</label>
                            <select name="country" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all">
                                <option value="United States">United States</option>
                                <option value="Canada">Canada</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <!-- Add more countries as needed -->
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#909090] mb-1">Phone Number</label>
                        <input type="tel" name="phone" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all">
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="is_default" name="is_default" class="w-4 h-4 text-primary accent-primary">
                        <label for="is_default" class="ml-2 text-[#2f2f2f]">Set as default address</label>
                    </div>
                    <div class="flex justify-end gap-3 pt-2">
                        <button type="button" id="cancel-address" class="px-4 py-2 border border-gray-300 rounded-lg text-[#2f2f2f] hover:bg-gray-50">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Save Address</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addAddressBtn = document.getElementById('add-address-btn');
        const addFirstAddress = document.getElementById('add-first-address');
        const addressModal = document.getElementById('address-modal');
        const closeAddressModal = document.getElementById('close-address-modal');
        const cancelAddress = document.getElementById('cancel-address');

        function showAddressModal() {
            addressModal.classList.remove('hidden');
        }

        function hideAddressModal() {
            addressModal.classList.add('hidden');
        }

        if (addAddressBtn) {
            addAddressBtn.addEventListener('click', showAddressModal);
        }

        if (addFirstAddress) {
            addFirstAddress.addEventListener('click', showAddressModal);
        }

        if (closeAddressModal) {
            closeAddressModal.addEventListener('click', hideAddressModal);
        }

        if (cancelAddress) {
            cancelAddress.addEventListener('click', hideAddressModal);
        }
    });
</script>
