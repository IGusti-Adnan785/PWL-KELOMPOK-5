@props(['branch'])

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <x-dashboard.stat-card 
        title="Stok Normal"
        :value="$normalStock->count()"
        color="green"
    >
        <span class="text-green-600">✓</span>
    </x-dashboard.stat-card>

    <x-dashboard.stat-card 
        title="Stok Rendah"
        :value="$lowStock->count()"
        color="red"
    >
        <span class="text-red-600">⚠</span>
    </x-dashboard.stat-card>
</div>
