<!-- User Section -->
<div class="border-t border-gray-200 p-4 bg-white">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-sm font-medium">{{ auth()->user()->name }}</p>
            <p class="text-xs text-gray-500">{{ ucfirst(auth()->user()->role) }}</p>
        </div>
        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="text-gray-400 hover:text-red-600 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
            </button>
        </form>
    </div>
</div>
