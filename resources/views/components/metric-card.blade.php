@props(['title' => '', 'value' => '', 'change' => null, 'icon' => '', 'color' => 'bg-slate-100 text-slate-900'])

<div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
    <div class="flex items-start justify-between gap-4">
        <div>
            <p class="text-sm font-medium text-slate-500">{{ $title }}</p>
            <p class="mt-4 text-3xl font-semibold text-slate-900">{{ $value }}</p>
        </div>
        <div class="flex h-12 w-12 items-center justify-center rounded-3xl {{ $color }} text-xl">
            {{ $icon }}
        </div>
    </div>
    @if($change)
        <p class="mt-4 text-sm text-slate-500">Perubahan: <span class="font-semibold text-slate-900">{{ $change }}</span></p>
    @endif
</div>
