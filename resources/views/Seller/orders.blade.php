@extends('layouts.seller-dashboard')

@section('title', 'Orders')

@section('content')
    <!-- Page header -->
    <div class="md:flex md:items-center md:justify-between mb-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Orders</h1>
            <p class="mt-1 text-sm text-gray-500">Manage customer orders</p>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
                Filter
            </button>
            <button type="button" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Export Orders
            </button>
        </div>
    </div>

    <!-- Order Stats -->
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
                    <div class="flex-shrink-0 bg-blue-100 rounded-md p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Processing</dt>
                            <dd>
                                <div class="text-lg font-bold text-gray-900">42</div>
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
                    <div class="flex-shrink-0 bg-green-100 rounded-md p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Completed</dt>
                            <dd>
                                <div class="text-lg font-bold text-gray-900">1,156</div>
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
                    <div class="flex-shrink-0 bg-red-100 rounded-md p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Cancelled</dt>
                            <dd>
                                <div class="text-lg font-bold text-gray-900">50</div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="bg-white shadow rounded-lg mb-8">
        <div class="px-6 py-5 border-b border-gray-200">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="text-lg font-medium text-gray-900">Order History</h2>
                </div>
                <div class="mt-4 md:mt-0">
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" class="focus:ring-primary focus:border-primary block w-full pl-10 sm:text-sm border-gray-300 rounded-md" placeholder="Search orders...">
                    </div>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 data-table">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="flex items-center">
                            <input id="select-all-orders" type="checkbox" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                            <span class="ml-3">Order ID</span>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <!-- Order 1 -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <input type="checkbox" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                            <span class="ml-3 text-sm font-medium text-gray-900">#ORD-7829</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-medium">JD</div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">John Doe</div>
                                <div class="text-sm text-gray-500">john.doe@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mar 15, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$129.99</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Credit Card</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="status-badge processing">Processing</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-end space-x-2">
                            <button class="text-primary hover:text-primary/80">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                            <button class="text-gray-600 hover:text-gray-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                            <button class="text-red-600 hover:text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Order 2 -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <input type="checkbox" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                            <span class="ml-3 text-sm font-medium text-gray-900">#ORD-7828</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-medium">SR</div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Sarah Rodriguez</div>
                                <div class="text-sm text-gray-500">sarah.r@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mar 14, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$79.99</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">PayPal</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="status-badge shipped">Shipped</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-end space-x-2">
                            <button class="text-primary hover:text-primary/80">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                            <button class="text-gray-600 hover:text-gray-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                            <button class="text-red-600 hover:text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Order 3 -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <input type="checkbox" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                            <span class="ml-3 text-sm font-medium text-gray-900">#ORD-7827</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-medium">MC</div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Michael Chen</div>
                                <div class="text-sm text-gray-500">m.chen@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mar 13, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$179.99</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Credit Card</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="status-badge delivered">Delivered</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-end space-x-2">
                            <button class="text-primary hover:text-primary/80">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                            <button class="text-gray-600 hover:text-gray-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                            <button class="text-red-600 hover:text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Order 4 -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <input type="checkbox" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                            <span class="ml-3 text-sm font-medium text-gray-900">#ORD-7826</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-medium">ER</div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Emily Rodriguez</div>
                                <div class="text-sm text-gray-500">emily.r@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mar 12, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$39.99</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">PayPal</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="status-badge delivered">Delivered</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-end space-x-2">
                            <button class="text-primary hover:text-primary/80">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                            <button class="text-gray-600 hover:text-gray-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                            <button class="text-red-600 hover:text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </td>  />
                    </svg>
                    </button>
        </div>
        </td>
        </tr>

        <!-- Order 5 -->
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <input type="checkbox" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                    <span class="ml-3 text-sm font-medium text-gray-900">#ORD-7825</span>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-medium">AJ</div>
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">Alex Johnson</div>
                        <div class="text-sm text-gray-500">alex.j@example.com</div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mar 10, 2025</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$89.99</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Credit Card</td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="status-badge cancelled">Cancelled</span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <div class="flex justify-end space-x-2">
                    <button class="text-primary hover:text-primary/80">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                    <button class="text-gray-600 hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </button>
                    <button class="text-red-600 hover:text-red-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </td>
        </tr>
        </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t border-gray-200">
        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-500">
                Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">42</span> results
            </div>
            <div class="flex space-x-2">
                <button class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">Previous</button>
                <button class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">Next</button>
            </div>
        </div>
    </div>
    </div>
    <!-- Order Fulfillment -->
    <div class="bg-white shadow rounded-lg mb-8">
        <div class="px-6 py-5 border-b border-gray-200">
            <h2 class="text-lg font-medium text-gray-900">Order Fulfillment</h2>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Processing -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-md font-medium text-gray-900">Processing</h3>
                        <span class="text-sm text-gray-500">2 orders</span>
                    </div>
                    <div class="space-y-3">
                        <div class="bg-white p-3 rounded-md shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex justify-between">
                                <span class="text-sm font-medium">#ORD-7829</span>
                                <span class="text-sm text-gray-500">Mar 15, 2025</span>
                            </div>
                            <div class="mt-2 text-sm text-gray-500">John Doe - Wireless Earbuds Pro</div>
                            <div class="mt-2 flex justify-end">
                                <button class="text-xs bg-primary text-white px-2 py-1 rounded">Mark as Shipped</button>
                            </div>
                        </div>
                        <div class="bg-white p-3 rounded-md shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex justify-between">
                                <span class="text-sm font-medium">#ORD-7824</span>
                                <span class="text-sm text-gray-500">Mar 9, 2025</span>
                            </div>
                            <div class="mt-2 text-sm text-gray-500">Lisa Wong - Portable Bluetooth Speaker</div>
                            <div class="mt-2 flex justify-end">
                                <button class="text-xs bg-primary text-white px-2 py-1 rounded">Mark as Shipped</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Shipped -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-md font-medium text-gray-900">Shipped</h3>
                        <span class="text-sm text-gray-500">1 order</span>
                    </div>
                    <div class="space-y-3">
                        <div class="bg-white p-3 rounded-md shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex justify-between">
                                <span class="text-sm font-medium">#ORD-7828</span>
                                <span class="text-sm text-gray-500">Mar 14, 2025</span>
                            </div>
                            <div class="mt-2 text-sm text-gray-500">Sarah Rodriguez - Portable Bluetooth Speaker</div>
                            <div class="mt-2 flex justify-end">
                                <button class="text-xs bg-green-600 text-white px-2 py-1 rounded">Mark as Delivered</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Recent Deliveries -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-md font-medium text-gray-900">Recent Deliveries</h3>
                        <span class="text-sm text-gray-500">Last 7 days</span>
                    </div>
                    <div class="space-y-3">
                        <div class="bg-white p-3 rounded-md shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex justify-between">
                                <span class="text-sm font-medium">#ORD-7827</span>
                                <span class="text-sm text-gray-500">Mar 13, 2025</span>
                            </div>
                            <div class="mt-2 text-sm text-gray-500">Michael Chen - Wireless Over-Ear Headphones</div>
                        </div>
                        <div class="bg-white p-3 rounded-md shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex justify-between">
                                <span class="text-sm font-medium">#ORD-7826</span>
                                <span class="text-sm text-gray-500">Mar 12, 2025</span>
                            </div>
                            <div class="mt-2 text-sm text-gray-500">Emily Rodriguez - Earbuds Charging Case</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
