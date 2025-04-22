<div id="notifications-section" class="section">
    <div class="section-content bg-white rounded-xl shadow-sm p-6">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-[#2f2f2f]">Notification Preferences</h2>
            <p class="text-[#909090]">Manage how you receive notifications</p>
        </div>
        <form action="{{ route('notifications.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-6">
                <div>
                    <h3 class="font-medium text-[#2f2f2f] mb-3">Email Notifications</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <label for="order-updates" class="text-[#2f2f2f]">Order updates</label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="order-updates" name="email_order_updates" class="sr-only peer" {{ $notifications->email_order_updates ?? true ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <label for="promotional-emails" class="text-[#2f2f2f]">Promotional emails</label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="promotional-emails" name="email_promotions" class="sr-only peer" {{ $notifications->email_promotions ?? true ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <label for="newsletter" class="text-[#2f2f2f]">Newsletter</label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="newsletter" name="email_newsletter" class="sr-only peer" {{ $notifications->email_newsletter ?? false ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                            </label>
                        </div>
                    </div>
                </div>
                <div>
                    <h3 class="font-medium text-[#2f2f2f] mb-3">SMS Notifications</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <label for="sms-order-updates" class="text-[#2f2f2f]">Order updates</label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="sms-order-updates" name="sms_order_updates" class="sr-only peer" {{ $notifications->sms_order_updates ?? true ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <label for="sms-promotions" class="text-[#2f2f2f]">Promotional messages</label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="sms-promotions" name="sms_promotions" class="sr-only peer" {{ $notifications->sms_promotions ?? false ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                            </label>
                        </div>
                    </div>
                </div>
                <div>
                    <h3 class="font-medium text-[#2f2f2f] mb-3">Push Notifications</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <label for="push-order-updates" class="text-[#2f2f2f]">Order updates</label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="push-order-updates" name="push_order_updates" class="sr-only peer" {{ $notifications->push_order_updates ?? true ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <label for="push-promotions" class="text-[#2f2f2f]">Promotional notifications</label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="push-promotions" name="push_promotions" class="sr-only peer" {{ $notifications->push_promotions ?? false ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="pt-4">
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Save Preferences</button>
                </div>
            </div>
        </form>
    </div>
</div>
