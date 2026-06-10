<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mini Market Management</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-lg shadow-xl p-8">
            <!-- Logo Section -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-indigo-600 mb-2">Mini Market</h1>
                <p class="text-gray-600">Management System</p>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                
                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:out-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('email') border-red-500 @enderror"
                        placeholder="you@example.com"
                    >
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('password') border-red-500 @enderror"
                        placeholder="••••••••"
                    >
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input 
                        type="checkbox" 
                        name="remember" 
                        id="remember"
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                    >
                    <label for="remember" class="ml-2 block text-sm text-gray-700">
                        Remember me
                    </label>
                </div>

                <!-- Login Button -->
                <button 
                    type="submit" 
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200"
                >
                    Sign In
                </button>
            </form>

            <!-- Test Accounts Info -->
            <div class="mt-8 pt-8 border-t border-gray-200">
                <p class="text-sm text-gray-600 mb-3 font-semibold">Test Accounts:</p>
                <div class="bg-gray-50 p-4 rounded-lg text-xs space-y-2">
                    <div>
                        <p class="font-semibold text-gray-700">Owner</p>
                        <p class="text-gray-600">owner@minimarket.local / password</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-700">Manager</p>
                        <p class="text-gray-600">manager@minimarket.local / password</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-700">Cashier</p>
                        <p class="text-gray-600">cashier@minimarket.local / password</p>
                    </div>
                </div>
            </div>

            <!-- Register Link -->
            <div class="text-center mt-6">
                <p class="text-gray-600 text-sm">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-700 font-semibold">
                        Sign up here
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>