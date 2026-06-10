@props(['route', 'label', 'routePrefix' => null])

@php
    $isActive = $routePrefix 
        ? request()->routeIs($routePrefix . '.*')
        : request()->routeIs($route);
@endphp

<a href="{{ route($route) }}" 
   class="flex items-center space-x-3 px-4 py-2 rounded-lg transition
           @if($isActive)
               bg-blue-100 text-blue-600
           @else
               text-gray-700 hover:bg-gray-100
           @endif">
    {{ $slot }}
    <span>{{ $label }}</span>
</a>
