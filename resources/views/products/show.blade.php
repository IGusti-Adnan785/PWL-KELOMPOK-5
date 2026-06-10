@extends('layouts.app')

@section('title', $product->name)
@section('header', 'Detail Produk ' . $product->name)

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="md:col-span-2">
        <div class="bg-white rounded-lg shadow p-8 mb-6">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h2 class="text-2xl font-bold">{{ $product->name }}</h2>
                    <p class="text-gray-600">{{ $product->sku }}</p>
                </div>
                <p class="text-3xl font-bold text-green-600">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            </div>

            <dl class="space-y-4 mb-8">
                <div>
                    <dt class="text-sm font-medium text-gray-600">Kategori</dt>
                    <dd class="text-lg font-semibold">{{ $product->category }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-600">Satuan</dt>
                    <dd class="text-lg font-semibold">{{ $product->unit }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-600">Minimum Stok</dt>
                    <dd class="text-lg font-semibold">{{ $product->reorder_point }}</dd>
                </div>
                @if($product->description)
                    <div>
                        <dt class="text-sm font-medium text-gray-600">Deskripsi</dt>
                        <dd class="text-lg">{{ $product->description }}</dd>
                    </div>
                @endif
            </dl>

            <div class="flex space-x-4">
                <a href="{{ route('products.edit', $product) }}" class="px-6 py-2 bg-yellow-600 hover:bg-yellow-700 text-white rounded-lg font-semibold">
                    Edit
                </a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus produk ini?')" class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-semibold">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Informasi</h3>
        <dl class="space-y-3">
            <div>
                <dt class="text-xs text-gray-600 uppercase">Dibuat</dt>
                <dd class="text-sm font-semibold">{{ $product->created_at->format('d M Y') }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-600 uppercase">Diperbarui</dt>
                <dd class="text-sm font-semibold">{{ $product->updated_at->format('d M Y H:i') }}</dd>
            </div>
        </dl>
    </div>
</div>
@endsection
