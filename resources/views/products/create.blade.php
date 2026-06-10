@extends('layouts.app')

@section('title', 'Tambah Produk')
@section('header', 'Tambah Produk Baru')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow p-8">
    <form action="{{ route('products.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">SKU *</label>
                <input type="text" name="sku" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="PRD001">
                @error('sku') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
                <input type="text" name="category" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Makanan, Minuman, dll">
                @error('category') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Produk *</label>
            <input type="text" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Contoh: Beras Premium 5kg">
            @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
            <textarea name="description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Deskripsi produk (opsional)"></textarea>
            @error('description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Harga Jual *</label>
                <input type="number" name="price" step="0.01" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="50000">
                @error('price') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Satuan *</label>
                <select name="unit" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih Satuan</option>
                    <option value="pcs">Pcs (Pis)</option>
                    <option value="box">Box</option>
                    <option value="dus">Dus</option>
                    <option value="kg">Kg</option>
                    <option value="liter">Liter</option>
                    <option value="meter">Meter</option>
                </select>
                @error('unit') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Minimum Stok *</label>
            <input type="number" name="reorder_point" required value="10" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="10">
            <p class="text-sm text-gray-500 mt-1">Jumlah minimum stok sebelum perlu restok</p>
            @error('reorder_point') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end space-x-4 pt-6 border-t">
            <a href="{{ route('products.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                Batal
            </a>
            <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
