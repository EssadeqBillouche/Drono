<div id="rewards-section" class="section">
    <div class="section-content bg-white rounded-xl shadow-sm p-6">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-[#2f2f2f]">Rewards & Points</h2>
            <p class="text-[#909090]">Track your rewards and redeem points</p>
        </div>
        <div class="bg-primary/10 p-6 rounded-lg mb-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-medium text-[#2f2f2f]">Available Points</h3>
                <span class="text-2xl font-bold text-primary">{{ $rewards->available_points ?? '2,450' }}</span>
            </div>
            <div class="w-full bg-white rounded-full h-2.5">
                <div class="bg-primary h-2.5 rounded-full" style="width: {{ $rewards->progress_percentage ?? '65' }}%"></div>
            </div>
            <p class="text-sm text-[#909090] mt-2">{{ $rewards->points_to_next_reward ?? '1,550' }} more points until your next reward</p>
            <a href="" class="mt-4 inline-block px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Redeem Points</a>
        </div>
        <div>
            <h3 class="font-medium text-[#2f2f2f] mb-3">Recent Activity</h3>
            <div class="space-y-3">
                @forelse($rewardActivities ?? [
                    ['description' => 'Order #DRN-78945', 'date' => 'March 15, 2025', 'points' => 250, 'type' => 'earned'],
                    ['description' => 'Referral Bonus', 'date' => 'March 10, 2025', 'points' => 500, 'type' => 'earned'],
                    ['description' => 'Redeemed for Discount', 'date' => 'February 28, 2025', 'points' => 1000, 'type' => 'redeemed']
                ] as $activity)
                    <div class="flex justify-between items-center p-3 border border-gray-100 rounded-lg">
                        <div>
                            <p class="font-medium text-[#2f2f2f]">{{ $activity['description'] }}</p>
                            <p class="text-sm text-[#909090]">{{ $activity['date'] }}</p>
                        </div>
                        <span class="{{ $activity['type'] == 'earned' ? 'text-green-600' : 'text-red-600' }} font-medium">
                            {{ $activity['type'] == 'earned' ? '+' : '-' }}{{ $activity['points'] }} points
                        </span>
                    </div>
                @empty
                    <div class="text-center py-4 text-[#909090]">No recent reward activity</div>
                @endforelse
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-100">
            <h3 class="font-medium text-[#2f2f2f] mb-3">Available Rewards</h3>
            <div class="grid md:grid-cols-2 gap-4">
                @foreach($availableRewards ?? [
                    ['id' => 1, 'name' => '$10 Discount', 'points_required' => 1000, 'description' => 'Get $10 off your next order'],
                    ['id' => 2, 'name' => 'Free Shipping', 'points_required' => 750, 'description' => 'Free shipping on your next order'],
                    ['id' => 3, 'name' => 'Premium Upgrade', 'points_required' => 5000, 'description' => 'One month of Premium membership'],
                    ['id' => 4, 'name' => 'Priority Delivery', 'points_required' => 1500, 'description' => 'Priority delivery on your next order']
                ] as $reward)
                    <div class="border border-gray-200 p-4 rounded-lg">
                        <h4 class="font-medium text-[#2f2f2f]">{{ $reward['name'] }}</h4>
                        <p class="text-sm text-[#909090] mb-3">{{ $reward['description'] }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-medium">{{ number_format($reward['points_required']) }} points</span>
                            <form action="" method="POST">
                                @csrf
                                <button type="submit" class="px-3 py-1 bg-primary text-white text-sm rounded-lg hover:bg-primary/90" {{ ($rewards->available_points ?? 2450) < $reward['points_required'] ? 'disabled' : '' }}>
                                    Redeem
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
