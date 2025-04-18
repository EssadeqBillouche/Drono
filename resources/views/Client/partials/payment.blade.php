<div id="payment-section" class="section">
    <div class="section-content bg-white rounded-xl shadow-sm p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-[#2f2f2f]">Payment Methods</h2>
            <button class="text-primary hover:text-primary/80 font-medium" id="add-payment-btn">Add New Card</button>
        </div>
        <div class="space-y-4">
            @forelse($paymentMethods ?? [
                [
                    'id' => 1,
                    'type' => 'visa',
                    'last4' => '4242',
                    'exp_month' => '12',
                    'exp_year' => '2025',
                    'is_default' => true
                ],
                [
                    'id' => 2,
                    'type' => 'mastercard',
                    'last4' => '8888',
                    'exp_month' => '08',
                    'exp_year' => '2026',
                    'is_default' => false
                ]
            ] as $method)
                <div class="border border-gray-200 p-4 rounded-lg relative">
                    <div class="absolute top-4 right-4 flex space-x-2">
                        <button class="text-[#909090] hover:text-red-500" data-payment-id="{{ $method['id'] }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                        </button>
                    </div>
                    @if($method['is_default'])
                        <div class="flex items-start mb-2">
                            <span class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded-full">Default</span>
                        </div>
                    @endif
                    <div class="flex items-center">
                        <div class="mr-4">
                            @if($method['type'] == 'visa')
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>
                            @elseif($method['type'] == 'mastercard')
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>
                            @endif
                        </div>
                        <div>
                            <h3 class="font-medium text-[#2f2f2f]">{{ ucfirst($method['type']) }} ending in {{ $method['last4'] }}</h3>
                            <p class="text-[#909090] text-sm">Expires {{ $method['exp_month'] }}/{{ $method['exp_year'] }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-8 border border-dashed border-gray-200 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#909090" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-3"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>
                    <p class="text-[#909090]">You don't have any saved payment methods</p>
                    <button id="add-first-payment" class="mt-4 inline-block px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Add Payment Method</button>
                </div>
            @endforelse
        </div>

        <!-- Payment Form Modal (Hidden by default) -->
        <div id="payment-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg p-6 w-full max-w-lg">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-[#2f2f2f]">Add New Payment Method</h3>
                    <button id="close-payment-modal" class="text-[#909090] hover:text-[#2f2f2f]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                    </button>
                </div>
                <form action="{{ route('payment-methods.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-[#909090] mb-1">Card Number</label>
                        <input type="text" name="card_number" placeholder="1234 5678 9012 3456" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-[#909090] mb-1">Expiration Date</label>
                            <input type="text" name="expiry" placeholder="MM/YY" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#909090] mb-1">CVC</label>
                            <input type="text" name="cvc" placeholder="123" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#909090] mb-1">Cardholder Name</label>
                        <input type="text" name="name" placeholder="Name on card" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all">
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="is_default_payment" name="is_default" class="w-4 h-4 text-primary accent-primary">
                        <label for="is_default_payment" class="ml-2 text-[#2f2f2f]">Set as default payment method</label>
                    </div>
                    <div class="flex justify-end gap-3 pt-2">
                        <button type="button" id="cancel-payment" class="px-4 py-2 border border-gray-300 rounded-lg text-[#2f2f2f] hover:bg-gray-50">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Save Card</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addPaymentBtn = document.getElementById('add-payment-btn');
        const addFirstPayment = document.getElementById('add-first-payment');
        const paymentModal = document.getElementById('payment-modal');
        const closePaymentModal = document.getElementById('close-payment-modal');
        const cancelPayment = document.getElementById('cancel-payment');

        function showPaymentModal() {
            paymentModal.classList.remove('hidden');
        }

        function hidePaymentModal() {
            paymentModal.classList.add('hidden');
        }

        if (addPaymentBtn) {
            addPaymentBtn.addEventListener('click', showPaymentModal);
        }

        if (addFirstPayment) {
            addFirstPayment.addEventListener('click', showPaymentModal);
        }

        if (closePaymentModal) {
            closePaymentModal.addEventListener('click', hidePaymentModal);
        }

        if (cancelPayment) {
            cancelPayment.addEventListener('click', hidePaymentModal);
        }
    });
</script>
