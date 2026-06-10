<!-- Sidebar -->
<div class="w-64 bg-white shadow-lg flex flex-col h-screen">
    <!-- Logo Section -->
    <div class="p-4 border-b border-gray-200">
        <h1 class="text-2xl font-bold text-blue-600">Mini Market</h1>
        <p class="text-sm text-gray-600">Management System</p>
    </div>

    <!-- Navigation Menu -->
    <nav class="mt-8 space-y-4 px-4 flex-1 overflow-y-auto">
        <x-navigation.menu-items />
    </nav>

    <!-- User Section -->
    <x-layout.user-section />
</div>
