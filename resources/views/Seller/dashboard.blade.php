@extends('layouts.seller-dashboard')

@section('title', 'Dashboard')

@section('content')
    <!-- Page header -->
    <div class="md:flex md:items-center md:justify-between mb-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Dashboard</h1>
            <p class="mt-1 text-sm text-gray-500">Overview of your store performance</p>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Last 30 Days
            </button>
            <button type="button" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Export Report
            </button>
        </div>
    </div>

    <!-- Stats cards -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-8">
        <!-- Card 1 -->
        <div class="bg-white overflow-hidden shadow rounded-lg dashboard-card">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-primary/10 rounded-md p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Total Orders</dt>
                            <dd>
                                <div class="text-lg font-bold text-gray-900">1,248</div>
                                <div class="mt-1 flex items-baseline text-sm">
                                    <span class="text-green-600">+12.5%</span>
                                    <span class="ml-2 text-gray-500">from last month</span>
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white overflow-hidden shadow rounded-lg dashboard-card">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-100 rounded-md p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Revenue</dt>
                            <dd>
                                <div class="text-lg font-bold text-gray-900">$48,924.78</div>
                                <div class="mt-1 flex items-baseline text-sm">
                                    <span class="text-green-600">+8.2%</span>
                                    <span class="ml-2 text-gray-500">from last month</span>
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white overflow-hidden shadow rounded-lg dashboard-card">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-100 rounded-md p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Products Sold</dt>
                            <dd>
                                <div class="text-lg font-bold text-gray-900">1,876</div>
                                <div class="mt-1 flex items-baseline text-sm">
                                    <span class="text-green-600">+5.7%</span>
                                    <span class="ml-2 text-gray-500">from last month</span>
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white overflow-hidden shadow rounded-lg dashboard-card">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-purple-100 rounded-md p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Average Rating</dt>
                            <dd>
                                <div class="text-lg font-bold text-gray-900">4.9/5.0</div>
                                <div class="mt-1 flex items-baseline text-sm">
                                    <span class="text-green-600">+0.4</span>
                                    <span class="ml-2 text-gray-500">from last month</span>
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts section -->
    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 mb-8">
        <!-- Chart 1: Sales Overview -->
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-medium text-gray-900">Sales Overview</h2>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 text-xs font-medium rounded-md bg-gray-100 text-gray-800">Day</button>
                    <button class="px-3 py-1 text-xs font-medium rounded-md bg-primary text-white">Week</button>
                    <button class="px-3 py-1 text-xs font-medium rounded-md bg-gray-100 text-gray-800">Month</button>
                </div>
            </div>
            <div class="h-64 flex items-end space-x-2">
                <!-- Monday -->
                <div class="flex-1 flex flex-col items-center">
                    <div class="w-full bg-primary/10 rounded-t-md" style="height: 40%"></div>
                    <div class="w-full bg-primary rounded-t-md mt-px" style="height: 60%"></div>
                    <div class="text-xs text-gray-500 mt-2">Mon</div>
                </div>
                <!-- Tuesday -->
                <div class="flex-1 flex flex-col items-center">
                    <div class="w-full bg-primary/10 rounded-t-md" style="height: 30%"></div>
                    <div class="w-full bg-primary rounded-t-md mt-px" style="height: 70%"></div>
                    <div class="text-xs text-gray-500 mt-2">Tue</div>
                </div>
                <!-- Wednesday -->
                <div class="flex-1 flex flex-col items-center">
                    <div class="w-full bg-primary/10 rounded-t-md" style="height: 45%"></div>
                    <div class="w-full bg-primary rounded-t-md mt-px" style="height: 55%"></div>
                    <div class="text-xs text-gray-500 mt-2">Wed</div>
                </div>
                <!-- Thursday -->
                <div class="flex-1 flex flex-col items-center">
                    <div class="w-full bg-primary/10 rounded-t-md" style="height: 25%"></div>
                    <div class="w-full bg-primary rounded-t-md mt-px" style="height: 75%"></div>
                    <div class="text-xs text-gray-500 mt-2">Thu</div>
                </div>
                <!-- Friday -->
                <div class="flex-1 flex flex-col items-center">
                    <div class="w-full bg-primary/10 rounded-t-md" style="height: 50%"></div>
                    <div class="w-full bg-primary rounded-t-md mt-px" style="height: 50%"></div>
                    <div class="text-xs text-gray-500 mt-2">Fri</div>
                </div>
                <!-- Saturday -->
                <div class="flex-1 flex flex-col items-center">
                    <div class="w-full bg-primary/10 rounded-t-md" style="height: 65%"></div>
                    <div class="w-full bg-primary rounded-t-md mt-px" style="height: 35%"></div>
                    <div class="text-xs text-gray-500 mt-2">Sat</div>
                </div>
                <!-- Sunday -->
                <div class="flex-1 flex flex-col items-center">
                    <div class="w-full bg-primary/10 rounded-t-md" style="height: 70%"></div>
                    <div class="w-full bg-primary rounded-t-md mt-px" style="height: 30%"></div>
                    <div class="text-xs text-gray-500 mt-2">Sun</div>
                </div>
            </div>
            <div class="flex justify-center mt-4">
                <div class="flex items-center mr-4">
                    <div class="w-3 h-3 bg-primary rounded-sm mr-1"></div>
                    <span class="text-xs text-gray-500">Revenue</span>
                </div>
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-primary/10 rounded-sm mr-1"></div>
                    <span class="text-xs text-gray-500">Orders</span>
                </div>
            </div>
        </div>

        <!-- Chart 2: Top Products -->
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-medium text-gray-900">Top Products</h2>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 text-xs font-medium rounded-md bg-gray-100 text-gray-800">Week</button>
                    <button class="px-3 py-1 text-xs font-medium rounded-md bg-primary text-white">Month</button>
                    <button class="px-3 py-1 text-xs font-medium rounded-md bg-gray-100 text-gray-800">Year</button>
                </div>
            </div>
            <div class="space-y-4">
                <!-- Product 1 -->
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gray-100 rounded-md overflow-hidden">
                        <img src="/placeholder.svg?height=48&width=48&text=Earbuds" alt="Wireless Earbuds Pro" class="w-full h-full object-cover" />
                    </div>
                    <div class="ml-4 flex-1">
                        <div class="flex justify-between">
                            <p class="text-sm font-medium text-gray-900">Wireless Earbuds Pro</p>
                            <p class="text-sm font-medium text-gray-900">$12,480</p>
                        </div>
                        <div class="w-full h-2 bg-gray-200 rounded-full mt-2">
                            <div class="h-full bg-primary rounded-full" style="width: 85%"></div>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gray-100 rounded-md overflow-hidden">
                        <img src="/placeholder.svg?height=48&width=48&text=Headphones" alt="Wireless Over-Ear Headphones" class="w-full h-full object-cover" />
                    </div>
                    <div class="ml-4 flex-1">
                        <div class="flex justify-between">
                            <p class="text-sm font-medium text-gray-900">Wireless Over-Ear Headphones</p>
                            <p class="text-sm font-medium text-gray-900">$9,320</p>
                        </div>
                        <div class="w-full h-2 bg-gray-200 rounded-full mt-2">
                            <div class="h-full bg-primary rounded-full" style="width: 70%"></div>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gray-100 rounded-md overflow-hidden">
                        <img src="/placeholder.svg?height=48&width=48&text=Speaker" alt="Portable Bluetooth Speaker" class="w-full h-full object-cover" />
                    </div>
                    <div class="ml-4 flex-1">
                        <div class="flex justify-between">
                            <p class="text-sm font-medium text-gray-900">Portable Bluetooth Speaker</p>
                            <p class="text-sm font-medium text-gray-900">$7,650</p>
                        </div>
                        <div class="w-full h-2 bg-gray-200 rounded-full mt-2">
                            <div class="h-full bg-primary rounded-full" style="width: 55%"></div>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gray-100 rounded-md overflow-hidden">
                        <img src="/placeholder.svg?height=48&width=48&text=Case" alt="Earbuds Charging Case" class="w-full h-full object-cover" />
                    </div>
                    <div class="ml-4 flex-1">
                        <div class="flex justify-between">
                            <p class="text-sm font-medium text-gray-900">Earbuds Charging Case</p>
                            <p class="text-sm font-medium text-gray-900">$4,120</p>
                        </div>
                        <div class="w-full h-2 bg-gray-200 rounded-full mt-2">
                            <div class="h-full bg-primary rounded-full" style="width: 35%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders Table -->
    <div class="bg-white shadow rounded-lg mb-8">
        <div class="px-6 py-5 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-medium text-gray-900">Recent Orders</h2>
                <a href="{{ route('seller.orders') }}" class="text-sm font-medium text-primary hover:text-primary/80">View all</a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 data-table">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <!-- Order 1 -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-7829</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-medium">JD</div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">John Doe</div>
                                <div class="text-sm text-gray-500">john.doe@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Wireless Earbuds Pro</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mar 15, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$129.99</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="status-badge processing">Processing</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-primary hover:text-primary/80 mr-3">View</a>
                        <a href="#" class="text-gray-600 hover:text-gray-900">Edit</a>
                    </td>
                </tr>

                <!-- Order 2 -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-7828</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-medium">SR</div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Sarah Rodriguez</div>
                                <div class="text-sm text-gray-500">sarah.r@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Portable Bluetooth Speaker</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mar 14, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$79.99</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="status-badge shipped">Shipped</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-primary hover:text-primary/80 mr-3">View</a>
                        <a href="#" class="text-gray-600 hover:text-gray-900">Edit</a>
                    </td>
                </tr>

                <!-- Order 3 -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-7827</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-medium">MC</div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Michael Chen</div>
                                <div class="text-sm text-gray-500">m.chen@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Wireless Over-Ear Headphones</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mar 13, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$179.99</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="status-badge delivered">Delivered</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-primary hover:text-primary/80 mr-3">View</a>
                        <a href="#" class="text-gray-600 hover:text-gray-900">Edit</a>
                    </td>
                </tr>

                <!-- Order 4 -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-7826</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-medium">ER</div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Emily Rodriguez</div>
                                <div class="text-sm text-gray-500">emily.r@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Earbuds Charging Case</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mar 12, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$39.99</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="status-badge delivered">Delivered</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-primary hover:text-primary/80 mr-3">View</a>
                        <a href="#" class="text-gray-600 hover:text-gray-900">Edit</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Reviews -->
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-5 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-medium text-gray-900">Recent Reviews</h2>
                <a href="{{ route('seller.reviews') }}" class="text-sm font-medium text-primary hover:text-primary/80">View all</a>
            </div>
        </div>
        <div class="p-6 space-y-6">
            <!-- Review 1 -->
            <div class="border-b border-gray-200 pb-6">
                <div class="flex justify-between items-start">
                    <div class="flex items-start">
                        <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-medium">JD</div>
                        <div class="ml-4">
                            <h3 class="text-sm font-medium text-gray-900">John Doe</h3>
                            <div class="flex items-center mt-1">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#fbbf24" stroke="#fbbf24" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#fbbf24" stroke="#fbbf24" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#fbbf24" stroke="#fbbf24" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#fbbf24" stroke="#fbbf24" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#fbbf24" stroke="#fbbf24" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                </div>
                                <span class="text-xs text-gray-500 ml-2">Mar 15, 2025</span>
                            </div>
                        </div>
                    </div>
                    <span class="text-xs text-gray-500">Wireless Earbuds Pro</span>
                </div>
                <p class="mt-3 text-sm text-gray-600">These earbuds are amazing! The sound quality is incredible, and the noise cancellation works perfectly. Battery life is impressive too. Highly recommend!</p>
            </div>

            <!-- Review 2 -->
            <div class="border-b border-gray-200 pb-6">
                <div class="flex justify-between items-start">
                    <div class="flex items-start">
                        <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-medium">SR</div>
                        <div class="ml-4">
                            <h3 class="text-sm font-medium text-gray-900">Sarah Rodriguez</h3>
                            <div class="flex items-center mt-1">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#fbbf24" stroke="#fbbf24" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#fbbf24" stroke="#fbbf24" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#fbbf24" stroke="#fbbf24" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#fbbf24" stroke="#fbbf24" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#e5e7eb" stroke="#e5e7eb" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                </div>
                                <span class="text-xs text-gray-500 ml-2">Mar 14, 2025</span>
                            </div>
                        </div>
                    </div>
                    <span class="text-xs text-gray-500">Portable Bluetooth Speaker</span>
                </div>
                <p class="mt-3 text-sm text-gray-600">Great speaker with impressive sound for its size. The battery lasts all day, and it's very portable. The only downside is that it takes a while to charge.</p>
            </div>

            <!-- Review 3 -->
            <div>
                <div class="flex justify-between items-start">
                    <div class="flex items-start">
                        <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-medium">MC</div>
                        <div class="ml-4">
                            <h3 class="text-sm font-medium text-gray-900">Michael Chen</h3>
                            <div class="flex items-center mt-1">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#fbbf24" stroke="#fbbf24" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#fbbf24" stroke="#fbbf24" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#fbbf24" stroke="#fbbf24" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#fbbf24" stroke="#fbbf24" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#fbbf24" stroke="#fbbf24" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                </div>
                                <span class="text-xs text-gray-500 ml-2">Mar 13, 2025</span>
                            </div>
                        </div>
                    </div>
                    <span class="text-xs text-gray-500">Wireless Over-Ear Headphones</span>
                </div>
                <p class="mt-3 text-sm text-gray-600">These headphones are worth every penny! The sound quality is exceptional, and the noise cancellation is the best I've experienced. They're comfortable to wear for hours, and the battery life is outstanding.</p>
            </div>
        </div>
    </div>
@endsection
