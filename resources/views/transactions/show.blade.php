@extends('layouts.app')

@section('title', 'Detail Transaksi')
@section('header', 'Detail Transaksi ' . $transaction->transaction_number)

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="md:col-span-2">
        <!-- Transaction Info -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-600">No. Transaksi</p>
                    <p class="text-lg font-mono font-semibold">{{ $transaction->transaction_number }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Cabang</p>
                    <p class="text-lg font-semibold">{{ $transaction->branch->name }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Kasir</p>
                    <p class="text-lg font-semibold">{{ $transaction->cashier->name }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Tanggal</p>
                    <p class="text-lg font-semibold">{{ $transaction->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Tipe</p>
                    <p class="text-lg font-semibold">{{ ucfirst($transaction->type) }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Status</p>
                    <p class="text-lg"><span class="px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">{{ ucfirst($transaction->status) }}</span></p>
                </div>
            </div>
        </div>

        <!-- Items -->
        <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold">Item Transaksi</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Produk</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Qty</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Harga</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($transaction->details as $detail)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $detail->product->name }}</td>
                                <td class="px-6 py-4">{{ $detail->quantity }} {{ $detail->product->unit }}</td>
                                <td class="px-6 py-4">Rp {{ number_format($detail->price, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 font-semibold">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @if($transaction->notes)
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-2">Catatan</h3>
                <p class="text-gray-700">{{ $transaction->notes }}</p>
            </div>
        @endif
    </div>

    <!-- Summary -->
    <div class="bg-white rounded-lg shadow p-6 h-fit">
        <h3 class="text-lg font-semibold mb-4">Ringkasan Pembayaran</h3>
        <div class="space-y-3 border-b border-gray-200 pb-4">
            <div class="flex justify-between">
                <span class="text-gray-600">Subtotal:</span>
                <span class="font-semibold">Rp {{ number_format($transaction->total_amount / 1.1, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">PPN (10%):</span>
                <span class="font-semibold">Rp {{ number_format($transaction->total_amount / 1.1 * 0.1, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between text-lg font-bold">
                <span>Total:</span>
                <span>Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</span>
            </div>
        </div>

        <div class="space-y-3 mt-4">
            <div>
                <p class="text-sm text-gray-600">Metode Pembayaran</p>
                <p class="text-lg font-semibold">{{ ucfirst($transaction->payment_method) }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Jumlah Pembayaran</p>
                <p class="text-lg font-semibold">Rp {{ number_format($transaction->paid_amount, 0, ',', '.') }}</p>
            </div>
            <div class="bg-green-50 p-3 rounded-lg">
                <p class="text-sm text-gray-600">Kembalian</p>
                <p class="text-lg font-bold text-green-600">Rp {{ number_format($transaction->change_amount, 0, ',', '.') }}</p>
            </div>
        </div>

        <button onclick="window.print()" class="w-full mt-4 bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold">
            Cetak Struk
        </button>
    </div>
</div>
@endsection
