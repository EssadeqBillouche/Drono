@extends('layouts.app')

@section('title', 'My Profile - Drono')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/ClientProfile.css') }}" type="text/css">
@endsection

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- Alert messages -->
        @if(session('success'))
            <div class="p-4 mb-4 rounded-lg border bg-green-100 text-green-800 border-green-200 flex items-start gap-3">
                <div class="flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                </div>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        @if(session('error'))
            <div class="p-4 mb-4 rounded-lg border bg-red-100 text-red-800 border-red-200 flex items-start gap-3">
                <div class="flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                </div>
                <div>{{ session('error') }}</div>
            </div>
        @endif

        <!-- Page Title -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-[#2f2f2f]">My Profile</h1>
            <p class="text-[#909090]">Manage your account settings and preferences</p>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Navigation -->
            <div class="lg:w-1/4">
                <div class="bg-white rounded-xl shadow-sm p-6 sticky top-6">
                    <!-- User Info -->
                    <div class="flex items-center gap-4 pb-6 border-b border-gray-100 mb-6">
                        <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center text-white text-xl font-bold">
                            {{ substr(auth()->user()->name ?? 'User', 0, 2) }}
                        </div>
                        <div>
                            <h2 class="font-bold text-[#2f2f2f]">{{ auth()->user()->name ?? 'John Doe' }}</h2>
                            <p class="text-[#909090] text-sm">{{ auth()->user()->email ?? 'john.doe@example.com' }}</p>
                            <span class="inline-block mt-1 text-xs bg-green-100 text-green-800 px-2 py-0.5 rounded-full">Premium Member</span>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <nav>
                        <ul class="space-y-1" id="profile-nav">
                            <li>
                                <a href="#profile" class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-lg bg-primary/10 text-primary font-medium" data-section="profile">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                    Personal Information
                                </a>
                            </li>
                            <li>
                                <a href="#orders" class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-[#2f2f2f] hover:bg-gray-100" data-section="orders">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                                    Orders & Tracking
                                </a>
                            </li>
                            <li>
                                <a href="#addresses" class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-[#2f2f2f] hover:bg-gray-100" data-section="addresses">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                    Addresses
                                </a>
                            </li>
                            <li>
                                <a href="#payment" class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-[#2f2f2f] hover:bg-gray-100" data-section="payment">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>
                                    Payment Methods
                                </a>
                            </li>
                            <li>
                                <a href="#subscriptions" class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-[#2f2f2f] hover:bg-gray-100" data-section="subscriptions">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>
                                    Subscriptions
                                </a>
                            </li>
                            <li>
                                <a href="#notifications" class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-[#2f2f2f] hover:bg-gray-100" data-section="notifications">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
                                    Notifications
                                </a>
                            </li>
                            <li>
                                <a href="#security" class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-[#2f2f2f] hover:bg-gray-100" data-section="security">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                    Security
                                </a>
                            </li>
                            <li>
                                <a href="#rewards" class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-[#2f2f2f] hover:bg-gray-100" data-section="rewards">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
                                    Rewards
                                </a>
                            </li>
                            <li>
                                <a href="#help" class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-[#2f2f2f] hover:bg-gray-100" data-section="help">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                                    Help & Support
                                </a>
                            </li>
                            <li class="pt-4 mt-4 border-t border-gray-100">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-red-600 hover:bg-red-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="lg:w-3/4" id="content-area">
                <!-- Personal Information Section -->
                <div id="profile-section" class="section active">
                    <div class="section-content bg-white rounded-xl shadow-sm p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-bold text-[#2f2f2f]">Personal Information</h2>
                            <button class="text-primary hover:text-primary/80 font-medium" id="edit-profile-btn">Edit</button>
                        </div>
                        <form id="profile-form" action="{{ route('profile.update') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @csrf
                            @method('PUT')
                            <div>
                                <label class="block text-sm font-medium text-[#909090] mb-1">First Name</label>
                                <input type="text" name="first_name" value="{{ $user->first_name ?? 'John' }}" class="w-full px-4 py-2 border border-gray-200 rounded-lg bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all" readonly>
                                @error('first_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-[#909090] mb-1">Last Name</label>
                                <input type="text" name="last_name" value="{{ $user->last_name ?? 'Doe' }}" class="w-full px-4 py-2 border border-gray-200 rounded-lg bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all" readonly>
                                @error('last_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-[#909090] mb-1">Email Address</label>
                                <input type="email" name="email" value="{{ $user->email ?? 'john.doe@example.com' }}" class="w-full px-4 py-2 border border-gray-200 rounded-lg bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all" readonly>
                                @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-[#909090] mb-1">Phone Number</label>
                                <input type="tel" name="phone" value="{{ $user->phone ?? '+1 (555) 123-4567' }}" class="w-full px-4 py-2 border border-gray-200 rounded-lg bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all" readonly>
                                @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-[#909090] mb-1">Date of Birth</label>
                                <input type="text" name="dob" value="{{ $user->dob ?? 'January 15, 1985' }}" class="w-full px-4 py-2 border border-gray-200 rounded-lg bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all" readonly>
                                @error('dob')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div id="profile-actions" class="md:col-span-2 hidden">
                                <div class="flex gap-3 justify-end">
                                    <button type="button" id="cancel-edit" class="px-4 py-2 border border-gray-300 rounded-lg text-[#2f2f2f] hover:bg-gray-50">Cancel</button>
                                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Save Changes</button>
                                </div>
                            </div>
                        </form>
                        <div class="mt-6 pt-6 border-t border-gray-100">
                            <h3 class="text-lg font-medium text-[#2f2f2f] mb-4">Communication Preferences</h3>
                            <form action="" method="POST">
                                @csrf
                                <div class="space-y-3">
                                    <div class="flex items-center">
                                        <input type="checkbox" id="email-updates" name="email_updates" class="w-4 h-4 text-primary accent-primary" {{ $preferences->email_updates ?? true ? 'checked' : '' }}>
                                        <label for="email-updates" class="ml-2 text-[#2f2f2f]">Email updates about new services and promotions</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" id="sms-updates" name="sms_updates" class="w-4 h-4 text-primary accent-primary" {{ $preferences->sms_updates ?? true ? 'checked' : '' }}>
                                        <label for="sms-updates" class="ml-2 text-[#2f2f2f]">SMS notifications for delivery updates</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" id="marketing" name="marketing" class="w-4 h-4 text-primary accent-primary" {{ $preferences->marketing ?? false ? 'checked' : '' }}>
                                        <label for="marketing" class="ml-2 text-[#2f2f2f]">Marketing communications from partners</label>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Update Preferences</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Orders & Tracking Section -->
                <div id="orders-section" class="section">
                    <div class="section-content bg-white rounded-xl shadow-sm p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-bold text-[#2f2f2f]">Orders & Tracking</h2>
                            <a href="{{ route('order.history') }}" class="text-primary hover:text-primary/80 font-medium">View All</a>
                        </div>
                        <div class="mb-8">
                            <h3 class="text-lg font-medium text-[#2f2f2f] mb-4">Active Orders</h3>

                            @if(count($activeOrders ?? []) > 0)
                                @foreach($activeOrders ?? [['id' => 'DRN-78945', 'status' => 'In Transit', 'date' => 'March 15, 2025', 'amount' => '$49.99', 'service' => 'Express Delivery', 'progress' => 75]] as $order)
                                    <div class="border border-gray-200 rounded-lg p-4 mb-4 hover:border-primary transition-colors">
                                        <div class="flex justify-between items-start mb-4">
                                            <div>
                                                <span class="text-xs bg-blue-100 text-blue-800 px-2 py-0.5 rounded-full">{{ $order['status'] }}</span>
                                                <h4 class="font-medium text-[#2f2f2f] mt-1">Order #{{ $order['id'] }}</h4>
                                                <p class="text-sm text-[#909090]">Placed on {{ $order['date'] }}</p>
                                            </div>
                                            <div class="text-right">
                                                <p class="font-bold text-[#2f2f2f]">{{ $order['amount'] }}</p>
                                                <p class="text-sm text-[#909090]">{{ $order['service'] }}</p>
                                            </div>
                                        </div>
                                        <div class="relative pt-6">
                                            <div class="flex mb-2">
                                                <div class="w-1/4 text-center">
                                                    <div class="w-6 h-6 bg-primary rounded-full mx-auto flex items-center justify-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                                    </div>
                                                    <p class="text-xs mt-1 text-[#2f2f2f]">Ordered</p>
                                                </div>
                                                <div class="w-1/4 text-center">
                                                    <div class="w-6 h-6 bg-primary rounded-full mx-auto flex items-center justify-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                                    </div>
                                                    <p class="text-xs mt-1 text-[#2f2f2f]">Processed</p>
                                                </div>
                                                <div class="w-1/4 text-center">
                                                    <div class="w-6 h-6 {{ $order['progress'] >= 75 ? 'bg-primary' : 'bg-gray-200' }} rounded-full mx-auto flex items-center justify-center">
                                                        @if($order['progress'] >= 75)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                                        @else
                                                            <span class="text-xs text-gray-500">3</span>
                                                        @endif
                                                    </div>
                                                    <p class="text-xs mt-1 {{ $order['progress'] >= 75 ? 'text-[#2f2f2f]' : 'text-gray-400' }}">Shipped</p>
                                                </div>
                                                <div class="w-1/4 text-center">
                                                    <div class="w-6 h-6 {{ $order['progress'] >= 100 ? 'bg-primary' : 'bg-gray-200' }} rounded-full mx-auto flex items-center justify-center">
                                                        @if($order['progress'] >= 100)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                                        @else
                                                            <span class="text-xs text-gray-500">4</span>
                                                        @endif
                                                    </div>
                                                    <p class="text-xs mt-1 {{ $order['progress'] >= 100 ? 'text-[#2f2f2f]' : 'text-gray-400' }}">Delivered</p>
                                                </div>
                                            </div>
                                            <div class="absolute top-9 left-0 right-0 h-1 bg-gray-200 -z-10">
                                                <div class="h-full bg-primary" style="width: {{ $order['progress'] }}%"></div>
                                            </div>
                                        </div>
                                        <div class="flex justify-between mt-6 pt-4 border-t border-gray-100">
                                            <a href="{{ route('orders.track', $order['id']) }}" class="text-primary hover:text-primary/80 font-medium text-sm">Track Package</a>
                                            <a href="{{ route('orders.show', $order['id']) }}" class="text-[#2f2f2f] hover:text-[#2f2f2f]/80 font-medium text-sm">View Details</a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-8 border border-dashed border-gray-200 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#909090" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-3"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                                    <p class="text-[#909090]">You don't have any active orders</p>
                                    <a href="{{ route('catalog') }}" class="mt-4 inline-block px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Shop Now</a>
                                </div>
                            @endif
                        </div>

                        <div>
                            <h3 class="text-lg font-medium text-[#2f2f2f] mb-4">Order History</h3>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-[#909090] uppercase tracking-wider">Order ID</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-[#909090] uppercase tracking-wider">Date</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-[#909090] uppercase tracking-wider">Items</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-[#909090] uppercase tracking-wider">Total</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-[#909090] uppercase tracking-wider">Status</th>
                                        <th class="px-4 py-3 text-right text-xs font-medium text-[#909090] uppercase tracking-wider">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($orderHistory ?? [
                                        ['id' => 'DRN-78932', 'date' => 'Feb 28, 2025', 'items' => 2, 'total' => '$79.98', 'status' => 'Delivered'],
                                        ['id' => 'DRN-78901', 'date' => 'Feb 15, 2025', 'items' => 1, 'total' => '$49.99', 'status' => 'Delivered'],
                                        ['id' => 'DRN-78890', 'date' => 'Jan 30, 2025', 'items' => 3, 'total' => '$124.97', 'status' => 'Delivered']
                                    ] as $order)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4 text-sm text-[#2f2f2f]">{{ $order['id'] }}</td>
                                            <td class="px-4 py-4 text-sm text-[#2f2f2f]">{{ $order['date'] }}</td>
                                            <td class="px-4 py-4 text-sm text-[#2f2f2f]">{{ $order['items'] }} items</td>
                                            <td class="px-4 py-4 text-sm text-[#2f2f2f]">{{ $order['total'] }}</td>
                                            <td class="px-4 py-4 text-sm">
                                                <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">{{ $order['status'] }}</span>
                                            </td>
                                            <td class="px-4 py-4 text-sm text-right">
                                                <a href="{{ route('orders.show', $order['id']) }}" class="text-primary hover:text-primary/80 font-medium">Details</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4 text-[#909090]">No order history found</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Include other sections (addresses, payment, etc.) -->
                @include('Client.partials.addresses')
                @include('Client.partials.payment')
                @include('Client.partials.subscriptions')
                @include('Client.partials.notifications')
                @include('Client.partials.security')
                @include('Client.partials.rewards')
                @include('Client.partials.help')
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{asset('js/ClientProfile.js')}}"></script>
@endsection
