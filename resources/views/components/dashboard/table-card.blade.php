@props(['title', 'addButtonText' => null, 'addButtonRoute' => null])

<div class="bg-white rounded-lg shadow overflow-hidden mb-8">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-semibold">{{ $title }}</h3>
            @if($addButtonRoute)
                <a href="{{ route($addButtonRoute) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm transition">
                    + {{ $addButtonText ?? 'Tambah' }}
                </a>
            @endif
        </div>
    </div>
    <div class="overflow-x-auto">
        {{ $slot }}
    </div>
</div>
