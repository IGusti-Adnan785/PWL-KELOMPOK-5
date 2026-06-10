@extends('layouts.app')

@section('title', 'Dashboard Manajer')
@section('header', 'Dashboard Manajer - ' . $branch->name)

@section('content')
<!-- Stats Grid -->
<x-dashboard.stats-grid :cols="2">
    <x-dashboard.stat-card 
        title="Pendapatan Bulan Ini"
        value="Rp {{ number_format($totalRevenue, 0, ',', '.') }}"
        color="green"
    />
    
    <x-dashboard.stat-card 
        title="Produk Stok Rendah"
        :value="$lowStockProducts->count()"
        color="red"
    />
</x-dashboard.stats-grid>

<!-- Transaksi Terbaru -->
<x-dashboard.table-card title="Transaksi Terbaru Bulan Ini">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">No. Transaksi</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Kasir</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Jumlah Item</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Total</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Waktu</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($transactions as $transaction)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap"><a href="{{ route('transactions.show', $transaction) }}" class="text-blue-600 hover:underline">{{ $transaction->transaction_number }}</a></td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->cashier->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->details->count() }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $transaction->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada transaksi</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-dashboard.table-card>

<!-- Produk Stok Rendah -->
<x-dashboard.table-card title="Produk Stok Rendah">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Kode</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Nama Produk</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Stok</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Min Stok</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($lowStockProducts as $inv)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $inv->product->sku }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $inv->product->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm font-semibold">{{ $inv->quantity }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $inv->product->reorder_point }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">Semua stok normal</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-dashboard.table-card>
@endsection