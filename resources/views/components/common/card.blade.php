@props(['title' => '', 'padding' => 'p-6'])

<div class="bg-white rounded-lg shadow {{ $padding }}">
    @if($title)
        <h3 class="text-lg font-semibold mb-4">{{ $title }}</h3>
    @endif
    
    {{ $slot }}
</div>
