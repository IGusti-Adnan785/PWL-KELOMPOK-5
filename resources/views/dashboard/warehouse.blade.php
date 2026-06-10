@extends('layouts.app')

@section('title', 'Dashboard Gudang')
@section('header', 'Dashboard Gudang - ' . $branch->name)

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold">Stok Normal</h3>
        <p class="text-3xl font-bold text-green-600">{{ $normalStock->count() }}</p>
        <p class="text-sm text-gray-600">Produk dengan stok mencukupi</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold">Stok Rendah</h3>
        <p class="text-3xl font-bold text-red-600">{{ $lowStock->count() }}</p>
        <p class="text-sm text-gray-600">Perlu restok segera</p>
    </div>
</div>

<!-- Stok Rendah -->
<div class="bg-white rounded-lg shadow overflow-hidden mb-8">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold">⚠️ Produk Stok Rendah</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-red-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-red-600 uppercase tracking-wider">Kode</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-red-600 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-red-600 uppercase tracking-wider">Stok</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-red-600 uppercase tracking-wider">Min</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($lowStock as $inv)
                    <tr class="hover:bg-red-50">
                        <td class="px-6 py-4">{{ $inv->product->sku }}</td>
                        <td class="px-6 py-4">{{ $inv->product->name }}</td>
                        <td class="px-6 py-4"><span class="px-2 py-1 bg-red-100 text-red-800 rounded font-semibold">{{ $inv->quantity }}</span></td>
                        <td class="px-6 py-4">{{ $inv->product->reorder_point }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">Semua stok normal</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Stok Normal -->
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold">✓ Stok Normal</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-green-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-green-600 uppercase tracking-wider">Kode</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-green-600 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-green-600 uppercase tracking-wider">Stok</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-green-600 uppercase tracking-wider">Kategori</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($normalStock->take(20) as $inv)
                    <tr class="hover:bg-green-50">
                        <td class="px-6 py-4">{{ $inv->product->sku }}</td>
                        <td class="px-6 py-4">{{ $inv->product->name }}</td>
                        <td class="px-6 py-4"><span class="px-2 py-1 bg-green-100 text-green-800 rounded">{{ $inv->quantity }}</span></td>
                        <td class="px-6 py-4">{{ $inv->product->category }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">Tidak ada stok</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
