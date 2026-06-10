<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Market Management System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-indigo-600">Mini Market</h1>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Manage Your Mini Market with Ease
                </h2>
                <p class="text-xl text-gray-600 mb-8">
                    A comprehensive management system for multi-branch mini markets with centralized monitoring, real-time inventory tracking, and complete audit trails.
                </p>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <svg class="h-6 w-6 text-indigo-600 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">Multi-branch centralized monitoring</span>
                    </div>
                    <div class="flex items-start">
                        <svg class="h-6 w-6 text-indigo-600 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">Real-time inventory tracking</span>
                    </div>
                    <div class="flex items-start">
                        <svg class="h-6 w-6 text-indigo-600 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">Complete audit trails with role-based access</span>
                    </div>
                    <div class="flex items-start">
                        <svg class="h-6 w-6 text-indigo-600 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">Prevent transaction and stock manipulation</span>
                    </div>
                    <div class="flex items-start">
                        <svg class="h-6 w-6 text-indigo-600 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">Generate detailed reports by date and branch</span>
                    </div>
                </div>
                <div class="mt-10 flex space-x-4">
                    <a href="{{ route('login') }}" class="bg-indigo-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition">
                        Sign In
                    </a>
                    <a href="{{ route('register') }}" class="border-2 border-indigo-600 text-indigo-600 px-8 py-3 rounded-lg font-semibold hover:bg-indigo-50 transition">
                        Create Account
                    </a>
                </div>
            </div>

            <!-- Right Image/Features -->
            <div class="bg-white rounded-lg shadow-xl p-8">
                <div class="space-y-6">
                    <div class="border-l-4 border-indigo-600 pl-4">
                        <h3 class="font-bold text-gray-900 mb-2">5 User Roles</h3>
                        <p class="text-gray-600 text-sm">Owner, Manager, Supervisor, Cashier, and Warehouse staff with specific permissions</p>
                    </div>
                    <div class="border-l-4 border-green-600 pl-4">
                        <h3 class="font-bold text-gray-900 mb-2">5 Branches</h3>
                        <p class="text-gray-600 text-sm">Jakarta Pusat, Bandung, Surabaya, Medan, and Makassar locations</p>
                    </div>
                    <div class="border-l-4 border-blue-600 pl-4">
                        <h3 class="font-bold text-gray-900 mb-2">Complete Inventory</h3>
                        <p class="text-gray-600 text-sm">Track products across branches with automatic low-stock alerts</p>
                    </div>
                    <div class="border-l-4 border-purple-600 pl-4">
                        <h3 class="font-bold text-gray-900 mb-2">Transaction Tracking</h3>
                        <p class="text-gray-600 text-sm">Record every sale and return with complete payment information</p>
                    </div>
                    <div class="border-l-4 border-red-600 pl-4">
                        <h3 class="font-bold text-gray-900 mb-2">Audit Logs</h3>
                        <p class="text-gray-600 text-sm">Every inventory change logged with user, time, and reason</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Key Features</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-indigo-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Dashboard Analytics</h3>
                    <p class="text-gray-600">Real-time statistics and insights with role-based dashboards for different user types</p>
                </div>
                <div class="text-center">
                    <div class="bg-indigo-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Inventory Management</h3>
                    <p class="text-gray-600">Track stock levels across branches with low-stock alerts and automated adjustments</p>
                </div>
                <div class="text-center">
                    <div class="bg-indigo-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Transaction Tracking</h3>
                    <p class="text-gray-600">Record every sale and return with automatic inventory updates and complete payment tracking</p>
                </div>
                <div class="text-center">
                    <div class="bg-indigo-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m0 0l8 4m-8-4v10l8 4m0-10l8 4m-8-4v10"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Branch Management</h3>
                    <p class="text-gray-600">Manage multiple branches with centralized control and branch-specific reporting</p>
                </div>
                <div class="text-center">
                    <div class="bg-indigo-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Detailed Reports</h3>
                    <p class="text-gray-600">Generate comprehensive reports by date range, branch, and transaction type</p>
                </div>
                <div class="text-center">
                    <div class="bg-indigo-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Security & Audit</h3>
                    <p class="text-gray-600">Complete audit trails of all changes with role-based access control and user authentication</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-gray-400">© 2026 Mini Market Management System. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
