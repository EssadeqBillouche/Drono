<div id="security-section" class="section">
    <div class="section-content bg-white rounded-xl shadow-sm p-6">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-[#2f2f2f]">Security Settings</h2>
            <p class="text-[#909090]">Manage your account security</p>
        </div>
        <div class="space-y-6">
            <div>
                <h3 class="font-medium text-[#2f2f2f] mb-3">Change Password</h3>
                <form action="{{ route('password.update') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-sm font-medium text-[#909090] mb-1">Current Password</label>
                        <input type="password" name="current_password" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all">
                        @error('current_password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#909090] mb-1">New Password</label>
                        <input type="password" name="password" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all">
                        @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#909090] mb-1">Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all">
                    </div>
                    <div>
                        <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Update Password</button>
                    </div>
                </form>
            </div>
            <div class="pt-6 border-t border-gray-100">
                <h3 class="font-medium text-[#2f2f2f] mb-3">Two-Factor Authentication</h3>
                <p class="text-[#909090] mb-4">Add an extra layer of security to your account</p>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-[#2f2f2f]">Two-factor authentication is currently
                            <span class="font-medium {{ $user->two_factor_enabled ?? false ? 'text-green-500' : 'text-red-500' }}">
                                {{ $user->two_factor_enabled ?? false ? 'enabled' : 'disabled' }}
                            </span>
                        </p>
                    </div>
                    <form action="{{ route('two-factor.' . ($user->two_factor_enabled ?? false ? 'disable' : 'enable')) }}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">
                            {{ $user->two_factor_enabled ?? false ? 'Disable' : 'Enable' }}
                        </button>
                    </form>
                </div>
            </div>
            <div class="pt-6 border-t border-gray-100">
                <h3 class="font-medium text-[#2f2f2f] mb-3">Login Sessions</h3>
                <p class="text-[#909090] mb-4">Manage your active sessions</p>
                <div class="space-y-3">
                    @foreach($sessions ?? [
                        ['device' => 'MacBook Pro', 'location' => 'New York, USA', 'ip' => '192.168.1.1', 'last_active' => 'Now (Current session)', 'is_current' => true],
                        ['device' => 'iPhone 13', 'location' => 'New York, USA', 'ip' => '192.168.1.2', 'last_active' => '2 hours ago', 'is_current' => false]
                    ] as $session)
                        <div class="flex justify-between items-center p-3 border border-gray-100 rounded-lg {{ $session['is_current'] ? 'bg-blue-50' : '' }}">
                            <div>
                                <div class="flex items-center">
                                    <h4 class="font-medium text-[#2f2f2f]">{{ $session['device'] }}</h4>
                                    @if($session['is_current'])
                                        <span class="ml-2 px-2 py-0.5 text-xs bg-blue-100 text-blue-800 rounded-full">Current</span>
                                    @endif
                                </div>
                                <p class="text-sm text-[#909090]">{{ $session['location'] }} • {{ $session['ip'] }}</p>
                                <p class="text-xs text-[#909090]">Last active: {{ $session['last_active'] }}</p>
                            </div>
                            @if(!$session['is_current'])
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">Logout</button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    <form action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 border border-red-300 text-red-600 rounded-lg hover:bg-red-50">Logout of All Devices</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
