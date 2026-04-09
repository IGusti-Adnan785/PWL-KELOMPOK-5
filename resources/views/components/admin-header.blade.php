@props(['title' => 'Ringkasan Minimarket'])

<header class="border-b border-slate-200 bg-white/90 px-4 py-4 shadow-sm backdrop-blur sm:px-6">
    <div class="mx-auto flex max-w-7xl flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-slate-500">{{ ucfirst(request()->route()->getName() ? str_replace('admin.', '', request()->route()->getName()) : 'Dashboard') }}</p>
            <h1 class="mt-2 text-2xl font-semibold text-slate-900">{{ $title }}</h1>
        </div>

    </div>
</header>


