<div id="help-section" class="section">
    <div class="section-content bg-white rounded-xl shadow-sm p-6">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-[#2f2f2f]">Help & Support</h2>
            <p class="text-[#909090]">Get assistance with your account</p>
        </div>
        <div class="space-y-6">
            <div>
                <h3 class="font-medium text-[#2f2f2f] mb-3">Frequently Asked Questions</h3>
                <div class="space-y-3">
                    @foreach($faqs ?? [
                        ['question' => 'How do I track my order?', 'answer' => 'You can track your order by clicking on the "Track Package" button in your Orders section or by using the tracking number sent to your email.'],
                        ['question' => 'How do I return an item?', 'answer' => 'To return an item, go to your order details and click on "Return Item". Follow the instructions to generate a return label.'],
                        ['question' => 'How do I redeem my points?', 'answer' => 'You can redeem your points in the Rewards section. Points can be used for discounts, free shipping, or exclusive products.']
                    ] as $index => $faq)
                        <div class="border border-gray-200 rounded-lg" x-data="{ open: false }">
                            <button class="flex justify-between items-center w-full p-4 text-left" @click="open = !open">
                                <span class="font-medium text-[#2f2f2f]">{{ $faq['question'] }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" :class="{'rotate-180': open}"><polyline points="6 9 12 15 18 9"/></svg>
                            </button>
                            <div class="p-4 pt-0" x-show="open" x-collapse>
                                <p class="text-[#909090]">{{ $faq['answer'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="pt-6 border-t border-gray-100">
                <h3 class="font-medium text-[#2f2f2f] mb-3">Contact Support</h3>
                <div class="grid md:grid-cols-2 gap-4">
                    <a href="tel:{{ $supportPhone ?? '+1 (800) 123-4567' }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:border-primary">
                        <div class="mr-4 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-[#2f2f2f]">Call Us</h4>
                            <p class="text-sm text-[#909090]">{{ $supportPhone ?? '+1 (800) 123-4567' }}</p>
                        </div>
                    </a>
                    <a href="" class="flex items-center p-4 border border-gray-200 rounded-lg hover:border-primary">
                        <div class="mr-4 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-[#2f2f2f]">Live Chat</h4>
                            <p class="text-sm text-[#909090]">Available 24/7</p>
                        </div>
                    </a>
                    <a href="mailto:{{ $supportEmail ?? 'support@drono.com' }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:border-primary">
                        <div class="mr-4 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><path d="M22 6l-10 7L2 6"/></svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-[#2f2f2f]">Email Us</h4>
                            <p class="text-sm text-[#909090]">{{ $supportEmail ?? 'support@drono.com' }}</p>
                        </div>
                    </a>
                    <a href="" class="flex items-center p-4 border border-gray-200 rounded-lg hover:border-primary">
                        <div class="mr-4 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-[#2f2f2f]">Help Center</h4>
                            <p class="text-sm text-[#909090]">Browse our knowledge base</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="pt-6 border-t border-gray-100">
                <h3 class="font-medium text-[#2f2f2f] mb-3">Submit a Support Ticket</h3>
                <form action="" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-[#909090] mb-1">Subject</label>
                        <input type="text" name="subject" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#909090] mb-1">Category</label>
                        <select name="category" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all">
                            <option value="order">Order Issue</option>
                            <option value="account">Account Problem</option>
                            <option value="payment">Payment Issue</option>
                            <option value="technical">Technical Support</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#909090] mb-1">Message</label>
                        <textarea name="message" rows="4" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Submit Ticket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // FAQ accordion functionality
        const faqButtons = document.querySelectorAll('#help-section .border-gray-200 button');

        faqButtons.forEach(button => {
            button.addEventListener('click', function() {
                const content = this.nextElementSibling;
                const icon = this.querySelector('svg');

                // Toggle content visibility
                if (content.style.display === 'block' || content.style.display === '') {
                    content.style.display = 'none';
                    icon.classList.remove('rotate-180');
                } else {
                    content.style.display = 'block';
                    icon.classList.add('rotate-180');
                }
            });
        });
    });
</script>
