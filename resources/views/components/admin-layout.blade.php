<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel Minimarket</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
</body>
</html>
<div class="lg:flex lg:min-h-screen">
</div>
<aside class="hidden lg:block lg:w-80 lg:sticky lg:top-0 lg:h-screen lg:overflow-y-auto lg:border-r lg:border-slate-200 lg:bg-slate-950 lg:text-slate-100">
</aside>
<div class="flex items-center gap-3 px-6 py-7">
    <div class="flex h-12 w-12 items-center justify-center rounded-3xl bg-emerald-500 text-2xl font-semibold text-white">MM</div>
    <div>
        <p class="text-lg font-semibold">MiniMarket</p>
        <p class="text-sm text-slate-400">Panel Admin</p>
    </div>
</div>
<x-admin-sidebar />
<div class="px-6 pb-6">
    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Info</p>
    <div class="mt-3 rounded-3xl border border-slate-800 bg-slate-900/90 p-4 text-sm text-slate-300">
        <p class="font-medium text-slate-100">Sistem Inventaris Minimarket</p>
        <p class="mt-2 text-slate-400">Pantau penjualan dan stok dalam satu tampilan.</p>
    </div>
</div>
<div class="flex-1">
</div>
<x-admin-header :title="$title ?? 'Ringkasan Minimarket'" />
<main class="px-4 py-6 sm:px-6 lg:px-8">
    {{ $slot }}
</main>
<x-admin-footer />
