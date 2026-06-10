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
            <!-- Sidebar Component -->
            <x-layout.sidebar />

            <!-- Main Content -->
            <div class="flex-1 flex flex-col overflow-hidden">
                <!-- Header Component -->
                <x-layout.header :title="$__env->yieldContent('header', 'Dashboard')" />

                <!-- Content Area -->
                <div class="flex-1 overflow-auto bg-gray-100 p-6">
                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <x-common.alert type="error">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </x-common.alert>
                    @endif

                    <!-- Success Message -->
                    @if(session('success'))
                        <x-common.alert type="success">
                            {{ session('success') }}
                        </x-common.alert>
                    @endif

                    <!-- Page Content -->
                    @yield('content')
                </div>
            </div>
        @else
            @yield('content')
        @endauth
    </div>
</body>
</html>