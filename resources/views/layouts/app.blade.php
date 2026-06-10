<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Market Management - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="flex h-screen bg-gray-100">
        @auth
            <!-- Sidebar -->
            <div class="w-64 bg-white shadow-lg">
                <div class="p-4 border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-blue-600">Mini Market</h1>
                    <p class="text-sm text-gray-600">Management System</p>
                </div>

                <nav class="mt-8 space-y-4 px-4">
                    @if(auth()->user()->isOwner())
                        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l4-4m0 0l4-4m-4 4l-4-4m4 4l4 4"></path>
                            </svg>
                            <span>Dashboard</span>
                        </a>

                        <a href="{{ route('branches.index') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ request()->routeIs('branches.*') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"></path>
                            </svg>
                            <span>Cabang</span>
                        </a>

                        <a href="{{ route('products.index') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ request()->routeIs('products.*') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 012 12V7a2 2 0 012-2z"></path>
                            </svg>
                            <span>Produk</span>
                        </a>

                        <a href="{{ route('inventory.index') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ request()->routeIs('inventory.*') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 012.646 2.646 9.003 9.003 0 0015.354 20.354z"></path>
                            </svg>
                            <span>Stok</span>
                        </a>

                        <a href="{{ route('transactions.index') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ request()->routeIs('transactions.*') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span>Transaksi</span>
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l4-4m0 0l4-4m-4 4l-4-4m4 4l4 4"></path>
                            </svg>
                            <span>Dashboard</span>
                        </a>

                        @if(auth()->user()->isManager())
                            <a href="{{ route('inventory.index') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ request()->routeIs('inventory.*') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 012.646 2.646 9.003 9.003 0 0015.354 20.354z"></path>
                                </svg>
                                <span>Stok</span>
                            </a>

                            <a href="{{ route('transactions.report') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                                <span>Laporan</span>
                            </a>
                        @endif

                        @if(auth()->user()->isCashier() || auth()->user()->isSupervisor())
                            <a href="{{ route('transactions.index') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ request()->routeIs('transactions.*') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span>Transaksi</span>
                            </a>
                        @endif

                        @if(auth()->user()->isCashier())
                            <a href="{{ route('transactions.create') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span>Transaksi Baru</span>
                            </a>
                        @endif

                        @if(auth()->user()->isWarehouse())
                            <a href="{{ route('inventory.index') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg {{ request()->routeIs('inventory.*') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 012.646 2.646 9.003 9.003 0 0015.354 20.354z"></path>
                                </svg>
                                <span>Stok</span>
                            </a>
                        @endif
                    @endif
                </nav>

                <!-- User Section -->
                <div class="absolute bottom-0 w-64 p-4 border-t border-gray-200 bg-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-500">{{ ucfirst(auth()->user()->role) }}</p>
                        </div>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-400 hover:text-red-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col overflow-hidden">
                <!-- Header -->
                <div class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-4 px-6">
                        <h2 class="text-2xl font-semibold">@yield('header', 'Dashboard')</h2>
                        @if(auth()->user()->branch_id && !auth()->user()->isOwner())
                            <p class="text-sm text-gray-600">{{ auth()->user()->branch->name }} - {{ auth()->user()->branch->city }}</p>
                        @endif
                    </div>
                </div>

                <!-- Content -->
                <div class="flex-1 overflow-auto bg-gray-100 p-6">
                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        @else
            @yield('content')
        @endauth
    </div>
</body>
</html>
