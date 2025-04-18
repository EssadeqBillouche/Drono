<div id="subscriptions-section" class="section">
    <div class="section-content bg-white rounded-xl shadow-sm p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-[#2f2f2f]">Subscriptions</h2>
            <a href="" class="text-primary hover:text-primary/80 font-medium">Explore Plans</a>
        </div>

        @if(isset($subscription))
            <div class="border border-gray-200 p-4 rounded-lg">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">{{ $subscription['status'] ?? 'Active' }}</span>
                        <h3 class="font-medium text-[#2f2f2f] mt-1">{{ $subscription['name'] ?? 'Premium Membership' }}</h3>
                        <p class="text-[#909090] text-sm">{{ $subscription['billing_cycle'] ?? 'Billed monthly' }}</p>
                    </div>
                    <div class="text-right">
                        <p class="font-bold text-[#2f2f2f]">{{ $subscription['price'] ?? '$19.99/month' }}</p>
                        <p class="text-sm text-[#909090]">Next billing: {{ $subscription['next_billing_date'] ?? 'April 15, 2025' }}</p>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between">
                    <div>
                        <h4 class="font-medium text-[#2f2f2f]">Benefits</h4>
                        <ul class="mt-2 space-y-1">
                            @foreach($subscription['benefits'] ?? ['Free express shipping', 'Priority customer support', 'Exclusive discounts'] as $benefit)
                                <li class="flex items-center text-sm text-[#2f2f2f]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-500 mr-2"><polyline points="20 6 9 17 4 12"/></svg>
                                    {{ $benefit }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <form action="{{ route('subscriptions.cancel') }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel your subscription? You will lose access to premium features at the end of your current billing period.');">
                            @csrf
                            <button type="submit" class="px-4 py-2 border border-red-300 text-red-600 rounded-lg hover:bg-red-50">Cancel Subscription</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-8 border border-dashed border-gray-200 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#909090" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-3"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>
                <p class="text-[#909090]">You don't have any active subscriptions</p>
                <a href="" class="mt-4 inline-block px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">View Available Plans</a>
            </div>
        @endif

        @if(isset($subscriptionHistory) && count($subscriptionHistory) > 0)
            <div class="mt-8">
                <h3 class="text-lg font-medium text-[#2f2f2f] mb-4">Subscription History</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-[#909090] uppercase tracking-wider">Plan</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-[#909090] uppercase tracking-wider">Start Date</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-[#909090] uppercase tracking-wider">End Date</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-[#909090] uppercase tracking-wider">Status</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-[#909090] uppercase tracking-wider">Amount</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($subscriptionHistory ?? [
                                ['plan' => 'Premium Membership', 'start_date' => 'Jan 15, 2025', 'end_date' => 'Present', 'status' => 'Active', 'amount' => '$19.99/month'],
                                ['plan' => 'Basic Membership', 'start_date' => 'Oct 10, 2024', 'end_date' => 'Jan 14, 2025', 'status' => 'Expired', 'amount' => '$9.99/month']
                            ] as $history)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-4 text-sm text-[#2f2f2f]">{{ $history['plan'] }}</td>
                                    <td class="px-4 py-4 text-sm text-[#2f2f2f]">{{ $history['start_date'] }}</td>
                                    <td class="px-4 py-4 text-sm text-[#2f2f2f]">{{ $history['end_date'] }}</td>
                                    <td class="px-4 py-4 text-sm">
                                        <span class="px-2 py-1 text-xs font-medium {{ $history['status'] == 'Active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }} rounded-full">
                                            {{ $history['status'] }}
                                        </span>
                                    </td>
                                      }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-4 text-sm text-[#2f2f2f]">{{ $history['amount'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
