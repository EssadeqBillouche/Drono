<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Drono</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#ff7e00",
                        text: "#2f2f2f",
                        secondary: "#909090",
                        background: "#fff9f0",
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom styles */
        .dashboard-card {
            transition: all 0.3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        /* Sidebar active link */
        .sidebar-link.active {
            background-color: rgba(255, 126, 0, 0.1);
            color: #ff7e00;
            border-left: 3px solid #ff7e00;
        }

        /* Table styles */
        .data-table th {
            position: relative;
        }

        .data-table th:after {
            content: '';
            position: absolute;
            right: 0;
            top: 25%;
            height: 50%;
            width: 1px;
            background-color: #e5e7eb;
        }

        .data-table th:last-child:after {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
<!-- Top Navigation -->
<header class="bg-white shadow-sm z-10">
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <div class="flex items-center gap-2">
                        <div class="relative w-6 h-6">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 10C19 11.8565 18.1045 13.637 16.5 14.8995C14.8955 16.162 12.7909 17 10.5 17C8.20914 17 6.10456 16.162 4.5 14.8995C2.89544 13.637 2 11.8565 2 10C2 8.14348 2.89544 6.36301 4.5 5.10051C6.10456 3.838 8.20914 3 10.5 3C12.7909 3 14.8955 3.838 16.5 5.10051C18.1045 6.36301 19 8.14348 19 10Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 3C12 3 14 1 16 1C18 1 20 2 20 4C20 6 19 7 19 7" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-[#2f2f2f]">Drono</span>
                        <span class="text-sm font-medium text-gray-500 ml-2">Admin</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center">
                <div class="ml-4 flex items-center md:ml-6">
                    <!-- Notification dropdown -->
                    <div class="relative">
                        <button class="p-1 rounded-full text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                            <span class="sr-only">View notifications</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-400 ring-2 ring-white"></span>
                        </button>
                    </div>

                    <!-- Profile dropdown -->
                    <div class="ml-3 relative">
                        <div>
                            <button type="button" class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary" id="user-menu-button">
                                <span class="sr-only">Open user menu</span>
                                <div class="h-8 w-8 rounded-full bg-[#ff7e00] flex items-center justify-center text-white font-medium">
                                    AD
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="flex flex-1">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md hidden md:block">
        <div class="h-full flex flex-col">
            <nav class="mt-5 flex-1 px-2 space-y-1">
                <a href="#" class="sidebar-link active group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>

                <a href="#" class="sidebar-link group flex items-center px-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-50 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    Orders
                </a>

                <a href="#" class="sidebar-link group flex items-center px-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-50 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    Users
                </a>

                <a href="#" class="sidebar-link group flex items-center px-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-50 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Inventory
                </a>

                <a href="#" class="sidebar-link group flex items-center px-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-50 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    Analytics
                </a>

                <a href="#" class="sidebar-link group flex items-center px-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-50 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Settings
                </a>
            </nav>

            <div class="border-t border-gray-200 p-4">
                <a href="#" class="group flex items-center px-2 py-2 text-sm font-medium text-red-600 rounded-md hover:bg-red-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout
                </a>
            </div>
        </div>
    </aside>

    <!-- Mobile sidebar toggle -->
    <div class="md:hidden fixed bottom-4 right-4 z-10">
        <button type="button" class="bg-primary text-white p-3 rounded-full shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto p-6">
        <div class="max-w-7xl mx-auto">
            <!-- Page header -->
            <div class="md:flex md:items-center md:justify-between mb-8">
                <div class="flex-1 min-w-0">
                    <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Dashboard</h1>
                    <p class="mt-1 text-sm text-gray-500">Overview of your drone delivery operations</p>
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Generate Report
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
                                        <div class="text-lg font-bold text-gray-900">2,487</div>
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
                                        <div class="text-lg font-bold text-gray-900">$89,241.57</div>
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Active Users</dt>
                                    <dd>
                                        <div class="text-lg font-bold text-gray-900">12,938</div>
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Delivery Success Rate</dt>
                                    <dd>
                                        <div class="text-lg font-bold text-gray-900">98.7%</div>
                                        <div class="mt-1 flex items-baseline text-sm">
                                            <span class="text-green-600">+0.4%</span>
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
                <!-- Chart 1: Orders Overview -->
                <div class="bg-white shadow rounded-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-medium text-gray-900">Orders Overview</h2>
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
                            <span class="text-xs text-gray-500">Completed</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-primary/10 rounded-sm mr-1"></div>
                            <span class="text-xs text-gray-500">Pending</span>
                        </div>
                    </div>
                </div>

                <!-- Chart 2: Delivery Performance -->
                <div class="bg-white shadow rounded-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-medium text-gray-900">Delivery Performance</h2>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 text-xs font-medium rounded-md bg-gray-100 text-gray-800">Day</button>
                            <button class="px-3 py-1 text-xs font-medium rounded-md bg-gray-100 text-gray-800">Week</button>
                            <button class="px-3 py-1 text-xs font-medium rounded-md bg-primary text-white">Month</button>
                        </div>
                    </div>
                    <div class="h-64 relative">
                        <!-- Line chart for delivery performance -->
                        <div class="absolute inset-0">
                            <svg viewBox="0 0 400 200" class="w-full h-full">
                                <!-- Grid lines -->
                                <line x1="0" y1="40" x2="400" y2="40" stroke="#e5e7eb" stroke-width="1" />
                                <line x1="0" y1="80" x2="400" y2="80" stroke="#e5e7eb" stroke-width="1" />
                                <line x1="0" y1="120" x2="400" y2="120" stroke="#e5e7eb" stroke-width="1" />
                                <line x1="0" y1="160" x2="400" y2="160" stroke="#e5e7eb" stroke-width="1" />

                                <!-- Performance line -->
                                <path d="M0,160 L57,140 L114,120 L171,100 L228,80 L285,60 L342,40 L400,20" fill="none" stroke="#ff7e00" stroke-width="3" />

                                <!-- Data points -->
                                <circle cx="0" cy="160" r="4" fill="#ff7e00" />
                                <circle cx="57" cy="140" r="4" fill="#ff7e00" />
                                <circle cx="114" cy="120" r="4" fill="#ff7e00" />
                                <circle cx="171" cy="100" r="4" fill="#ff7e00" />
                                <circle cx="228" cy="80" r="4" fill="#ff7e00" />
                                <circle cx="285" cy="60" r="4" fill="#ff7e00" />
                                <circle cx="342" cy="40" r="4" fill="#ff7e00" />
                                <circle cx="400" cy="20" r="4" fill="#ff7e00" />
                            </svg>
                        </div>

                        <!-- Y-axis labels -->
                        <div class="absolute left-0 inset-y-0 flex flex-col justify-between text-xs text-gray-500 py-4">
                            <span>100%</span>
                            <span>80%</span>
                            <span>60%</span>
                            <span>40%</span>
                            <span>20%</span>
                        </div>
                    </div>
                    <div class="flex justify-between mt-4 text-xs text-gray-500">
                        <span>Jan</span>
                        <span>Feb</span>
                        <span>Mar</span>
                        <span>Apr</span>
                        <span>May</span>
                        <span>Jun</span>
                        <span>Jul</span>
                    </div>
                </div>
            </div>

            <!-- Recent Orders Table -->
            <div class="bg-white shadow rounded-lg mb-8">
                <div class="px-6 py-5 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-900">Recent Orders</h2>
                        <a href="#" class="text-sm font-medium text-primary hover:text-primary/80">View all</a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 data-table">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Order 1 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#DRN-78945</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-medium">JD</div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">John Doe</div>
                                        <div class="text-sm text-gray-500">john.doe@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Express Delivery</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mar 15, 2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$49.99</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">In Transit</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-primary hover:text-primary/80 mr-3">View</a>
                                <a href="#" class="text-gray-600 hover:text-gray-900">Edit</a>
                            </td>
                        </tr>

                        <!-- Order 2 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#DRN-78946</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-medium">SR</div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Sarah Rodriguez</div>
                                        <div class="text-sm text-gray-500">sarah.r@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Standard Delivery</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mar 16, 2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$29.99</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">Processing</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-primary hover:text-primary/80 mr-3">View</a>
                                <a href="#" class="text-gray-600 hover:text-gray-900">Edit</a>
                            </td>
                        </tr>

                        <!-- Order 3 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#DRN-78932</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-medium">MC</div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Michael Chen</div>
                                        <div class="text-sm text-gray-500">m.chen@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Heavy Lift Service</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Feb 28, 2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$79.98</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Delivered</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-primary hover:text-primary/80 mr-3">View</a>
                                <a href="#" class="text-gray-600 hover:text-gray-900">Edit</a>
                            </td>
                        </tr>

                        <!-- Order 4 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#DRN-78901</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-medium">ER</div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Emily Rodriguez</div>
                                        <div class="text-sm text-gray-500">emily.r@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rural Delivery</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Feb 15, 2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$49.99</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Delivered</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-primary hover:text-primary/80 mr-3">View</a>
                                <a href="#" class="text-gray-600 hover:text-gray-900">Edit</a>
                            </td>
                        </tr>

                        <!-- Order 5 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#DRN-78890</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-medium">AJ</div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Alex Johnson</div>
                                        <div class="text-sm text-gray-500">alex.j@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Subscription Plan</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jan 30, 2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$124.97</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Delivered</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-primary hover:text-primary/80 mr-3">View</a>
                                <a href="#" class="text-gray-600 hover:text-gray-900">Edit</a>
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

            <!-- Drone Fleet Status -->
            <div class="bg-white shadow rounded-lg">
                <div class="px-6 py-5 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-900">Drone Fleet Status</h2>
                        <a href="#" class="text-sm font-medium text-primary hover:text-primary/80">View all drones</a>
                    </div>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Drone Status Card 1 -->
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <span class="inline-block px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Active</span>
                                    <h3 class="mt-1 text-lg font-medium text-gray-900">DRN-001</h3>
                                </div>
                                <div class="text-right">
                                    <span class="text-xs text-gray-500">Battery</span>
                                    <div class="mt-1 w-16 h-2 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="bg-green-500 h-full" style="width: 85%"></div>
                                    </div>
                                    <span class="text-xs text-gray-500">85%</span>
                                </div>
                            </div>
                            <div class="flex justify-between text-sm">
                                <div>
                                    <div class="text-gray-500">Type</div>
                                    <div class="font-medium text-gray-900">Express</div>
                                </div>
                                <div>
                                    <div class="text-gray-500">Location</div>
                                    <div class="font-medium text-gray-900">Sector A4</div>
                                </div>
                                <div>
                                    <div class="text-gray-500">Status</div>
                                    <div class="font-medium text-green-600">In Flight</div>
                                </div>
                            </div>
                        </div>

                        <!-- Drone Status Card 2 -->
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <span class="inline-block px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Active</span>
                                    <h3 class="mt-1 text-lg font-medium text-gray-900">DRN-002</h3>
                                </div>
                                <div class="text-right">
                                    <span class="text-xs text-gray-500">Battery</span>
                                    <div class="mt-1 w-16 h-2 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="bg-green-500 h-full" style="width: 72%"></div>
                                    </div>
                                    <span class="text-xs text-gray-500">72%</span>
                                </div>
                            </div>
                            <div class="flex justify-between text-sm">
                                <div>
                                    <div class="text-gray-500">Type</div>
                                    <div class="font-medium text-gray-900">Heavy Lift</div>
                                </div>
                                <div>
                                    <div class="text-gray-500">Location</div>
                                    <div class="font-medium text-gray-900">Sector B2</div>
                                </div>
                                <div>
                                    <div class="text-gray-500">Status</div>
                                    <div class="font-medium text-green-600">In Flight</div>
                                </div>
                            </div>
                        </div>

                        <!-- Drone Status Card 3 -->
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <span class="inline-block px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">Charging</span>
                                    <h3 class="mt-1 text-lg font-medium text-gray-900">DRN-003</h3>
                                </div>
                                <div class="text-right">
                                    <span class="text-xs text-gray-500">Battery</span>
                                    <div class="mt-1 w-16 h-2 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="bg-yellow-500 h-full" style="width: 45%"></div>
                                    </div>
                                    <span class="text-xs text-gray-500">45%</span>
                                </div>
                            </div>
                            <div class="flex justify-between text-sm">
                                <div>
                                    <div class="text-gray-500">Type</div>
                                    <div class="font-medium text-gray-900">Standard</div>
                                </div>
                                <div>
                                    <div class="text-gray-500">Location</div>
                                    <div class="font-medium text-gray-900">Hub Station</div>
                                </div>
                                <div>
                                    <div class="text-gray-500">Status</div>
                                    <div class="font-medium text-yellow-600">Charging</div>
                                </div>
                            </div>
                        </div>

                        <!-- Drone Status Card 4 -->
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <span class="inline-block px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">Maintenance</span>
                                    <h3 class="mt-1 text-lg font-medium text-gray-900">DRN-004</h3>
                                </div>
                                <div class="text-right">
                                    <span class="text-xs text-gray-500">Battery</span>
                                    <div class="mt-1 w-16 h-2 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="bg-gray-500 h-full" style="width: 100%"></div>
                                    </div>
                                    <span class="text-xs text-gray-500">100%</span>
                                </div>
                            </div>
                            <div class="flex justify-between text-sm">
                                <div>
                                    <div class="text-gray-500">Type</div>
                                    <div class="font-medium text-gray-900">Rural</div>
                                </div>
                                <div>
                                    <div class="text-gray-500">Location</div>
                                    <div class="font-medium text-gray-900">Service Bay</div>
                                </div>
                                <div>
                                    <div class="text-gray-500">Status</div>
                                    <div class="font-medium text-red-600">Repair</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    // Mobile sidebar toggle
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.querySelector('.md\\:hidden button');
        const sidebar = document.querySelector('aside');

        mobileMenuButton.addEventListener('click', function() {
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('fixed');
            sidebar.classList.toggle('inset-0');
            sidebar.classList.toggle('z-50');
        });
    });
</script>
</body>
</html>

