@extends('layouts.app')

@section('title', 'Laporan Transaksi')
@section('header', 'Laporan Transaksi')

@section('content')
<div class="bg-white rounded-lg shadow p-6 mb-8">
    <form method="GET" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Dari Tanggal</label>
                <input type="date" name="start_date" value="{{ $startDate->format('Y-m-d') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Sampai Tanggal</label>
                <input type="date" name="end_date" value="{{ $endDate->format('Y-m-d') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
            </div>
            @if(auth()->user()->isOwner())
                <div>
                    <label class="block text-sm font-medium mb-1">Cabang</label>
                    <select name="branch_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                        <option value="">Semua Cabang</option>
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="flex items-end">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold">
                    Filter
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Total Revenue -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-600">Total Pendapatan</h3>
        <p class="text-3xl font-bold text-green-600">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
        <p class="text-sm text-gray-500 mt-2">{{ $startDate->format('d/m/Y') }} - {{ $endDate->format('d/m/Y') }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-600">Total Transaksi</h3>
        <p class="text-3xl font-bold text-blue-600">{{ $transactions->total() }}</p>
        <p class="text-sm text-gray-500 mt-2">Transaksi selesai</p>
    </div>
</div>

<!-- Transactions Table -->
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">No. Transaksi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Cabang</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Kasir</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Total</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($transactions as $transaction)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-mono text-sm">{{ $transaction->transaction_number }}</td>
                        <td class="px-6 py-4">{{ $transaction->branch->name }}</td>
                        <td class="px-6 py-4">{{ $transaction->cashier->name }}</td>
                        <td class="px-6 py-4 font-semibold">Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">{{ $transaction->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4"><a href="{{ route('transactions.show', $transaction) }}" class="text-blue-600 hover:underline">Detail</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">Tidak ada transaksi dalam periode ini</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="px-6 py-4 border-t border-gray-200">
        {{ $transactions->links() }}
    </div>
</div>
@endsection
