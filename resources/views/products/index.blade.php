@extends('layouts.app')

@section('title', 'Produk')
@section('header', 'Daftar Produk')

@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('products.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold">
        + Tambah Produk
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">SKU</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Harga</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Satuan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Min Stok</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-mono text-sm">{{ $product->sku }}</td>
                        <td class="px-6 py-4">{{ $product->name }}</td>
                        <td class="px-6 py-4">{{ $product->category }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">{{ $product->unit }}</td>
                        <td class="px-6 py-4">{{ $product->reorder_point }}</td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="{{ route('products.edit', $product) }}" class="text-yellow-600 hover:underline text-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin?')" class="text-red-600 hover:underline text-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">Tidak ada produk</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="px-6 py-4 border-t border-gray-200">
        {{ $products->links() }}
    </div>
</div>
@endsection
