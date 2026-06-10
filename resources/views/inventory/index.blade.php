@extends('layouts.app')

@section('title', 'Manajemen Stok')
@section('header', 'Manajemen Stok')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
    @foreach($branches as $branch)
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg shadow p-6 text-white hover:shadow-lg transition">
            <h3 class="text-lg font-semibold">{{ $branch->name }}</h3>
            <p class="text-sm opacity-75">{{ $branch->city }}</p>
            <a href="{{ route('inventory.show', $branch) }}" class="inline-block mt-4 bg-white text-blue-600 px-3 py-1 rounded text-sm font-semibold hover:bg-gray-100">
                Lihat Stok
            </a>
        </div>
    @endforeach
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
        <h3 class="text-lg font-semibold">Semua Stok</h3>
        <a href="{{ route('inventory.report') }}" class="text-blue-600 hover:underline text-sm">
            Lihat Laporan
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Cabang</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">SKU</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Nama Produk</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Stok</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Min</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($inventories as $inv)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $inv->branch->name }}</td>
                        <td class="px-6 py-4 font-mono text-sm">{{ $inv->product->sku }}</td>
                        <td class="px-6 py-4">{{ $inv->product->name }}</td>
                        <td class="px-6 py-4">{{ $inv->product->category }}</td>
                        <td class="px-6 py-4 font-semibold">{{ $inv->quantity }}</td>
                        <td class="px-6 py-4">{{ $inv->product->reorder_point }}</td>
                        <td class="px-6 py-4">
                            @if($inv->quantity <= $inv->product->reorder_point)
                                <span class="px-2 py-1 bg-red-100 text-red-800 rounded text-xs font-semibold">Stok Rendah</span>
                            @else
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-xs font-semibold">Normal</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">Tidak ada data stok</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="px-6 py-4 border-t border-gray-200">
        {{ $inventories->links() }}
    </div>
</div>
@endsection
