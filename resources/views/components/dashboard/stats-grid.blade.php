@props(['cols' => 3])

<div class="grid grid-cols-1 {{ $cols === 2 ? 'md:grid-cols-2' : 'md:grid-cols-3' }} gap-6 mb-8">
    {{ $slot }}
</div>
