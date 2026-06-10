@extends('layouts.app')

@section('title', 'Dashboard Supervisor')
@section('header', 'Dashboard Supervisor - ' . $branch->name)

@section('content')
<!-- Stats Grid -->
<x-dashboard.stats-grid>
    <x-dashboard.stat-card 
        title="Transaksi Hari Ini"
        :value="$transactionCount"
        color="blue"
    />
    
    <x-dashboard.stat-card 
        title="Pendapatan Hari Ini"
        value="Rp {{ number_format($todayRevenue, 0, ',', '.') }}"
        color="green"
    />
    
    <x-dashboard.stat-card 
        title="Status"
        value="Beroperasi"
        color="purple"
    />
</x-dashboard.stats-grid>

<!-- Transaksi Hari Ini -->
<x-dashboard.table-card title="Transaksi Hari Ini">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">No. Transaksi</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Kasir</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Metode</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Total</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Waktu</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($todayTransactions as $transaction)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap"><a href="{{ route('transactions.show', $transaction) }}" class="text-blue-600 hover:underline">{{ $transaction->transaction_number }}</a></td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->cashier->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-xs">{{ ucfirst($transaction->payment_method) }}</span></td>
                    <td class="px-6 py-4 whitespace-nowrap font-semibold">Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $transaction->created_at->format('H:i') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap"><a href="{{ route('transactions.show', $transaction) }}" class="text-blue-600 hover:underline text-sm">Detail</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada transaksi hari ini</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-dashboard.table-card>
@endsection