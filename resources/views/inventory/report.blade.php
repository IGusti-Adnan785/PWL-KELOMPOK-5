@extends('layouts.app')

@section('title', 'Laporan Stok')
@section('header', 'Laporan Stok')

@section('content')
<div class="mb-8">
    <button onclick="window.print()" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold">
        Cetak Laporan
    </button>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden p-6 print:shadow-none">
    <h1 class="text-2xl font-bold mb-2">LAPORAN STOK BARANG</h1>
    <p class="text-gray-600 mb-6">{{ now()->format('d F Y') }}</p>

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-400">
            <thead class="bg-gray-200 border border-gray-400">
                <tr>
                    <th class="border border-gray-400 px-4 py-2">No</th>
                    <th class="border border-gray-400 px-4 py-2">Cabang</th>
                    <th class="border border-gray-400 px-4 py-2">SKU</th>
                    <th class="border border-gray-400 px-4 py-2">Nama Produk</th>
                    <th class="border border-gray-400 px-4 py-2">Kategori</th>
                    <th class="border border-gray-400 px-4 py-2">Stok</th>
                    <th class="border border-gray-400 px-4 py-2">Harga</th>
                    <th class="border border-gray-400 px-4 py-2">Total Nilai</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; $totalValue = 0; @endphp
                @forelse($inventories as $inv)
                    @php $value = $inv->quantity * $inv->product->price; $totalValue += $value; @endphp
                    <tr class="border border-gray-400">
                        <td class="border border-gray-400 px-4 py-2">{{ $no++ }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ $inv->branch->name }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ $inv->product->sku }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ $inv->product->name }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ $inv->product->category }}</td>
                        <td class="border border-gray-400 px-4 py-2 text-right">{{ $inv->quantity }}</td>
                        <td class="border border-gray-400 px-4 py-2 text-right">Rp {{ number_format($inv->product->price, 0, ',', '.') }}</td>
                        <td class="border border-gray-400 px-4 py-2 text-right">Rp {{ number_format($value, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="border border-gray-400 px-4 py-2 text-center">Tidak ada data</td>
                    </tr>
                @endforelse
                <tr class="border border-gray-400 bg-gray-100 font-bold">
                    <td colspan="7" class="border border-gray-400 px-4 py-2 text-right">TOTAL NILAI STOK:</td>
                    <td class="border border-gray-400 px-4 py-2 text-right">Rp {{ number_format($totalValue, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
