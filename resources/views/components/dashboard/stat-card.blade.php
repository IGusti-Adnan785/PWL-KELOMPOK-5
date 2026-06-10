@props(['title', 'value', 'icon' => '', 'color' => 'blue'])

@php
    $colors = [
        'blue' => 'bg-blue-50 text-blue-600 border-blue-200',
        'green' => 'bg-green-50 text-green-600 border-green-200',
        'red' => 'bg-red-50 text-red-600 border-red-200',
        'yellow' => 'bg-yellow-50 text-yellow-600 border-yellow-200',
        'purple' => 'bg-purple-50 text-purple-600 border-purple-200',
    ];
    
    $colorClass = $colors[$color] ?? $colors['blue'];
@endphp

<div class="bg-white rounded-lg shadow p-6 border-l-4 {{ $colorClass }}">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-gray-600 text-sm mb-1">{{ $title }}</p>
            <p class="text-3xl font-bold">{{ $value }}</p>
        </div>
        @if($icon)
            <div class="text-4xl opacity-10">
                {{ $icon }}
            </div>
        @endif
    </div>
</div>
