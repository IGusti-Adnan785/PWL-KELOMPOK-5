@extends('layouts.app')

@section('title', 'Tambah Cabang')
@section('header', 'Tambah Cabang Baru')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow p-8">
    <form action="{{ route('branches.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Cabang *</label>
            <input type="text" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Misal: Cabang Jakarta Pusat">
            @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Kota *</label>
            <input type="text" name="city" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Misal: Jakarta Pusat">
            @error('city') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat *</label>
            <textarea name="address" required rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Jl. Merdeka No. 123"></textarea>
            @error('address') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Telepon</label>
            <input type="text" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="02112345678">
            @error('phone') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Manajer</label>
            <input type="text" name="manager_name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Nama manajer cabang">
            @error('manager_name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end space-x-4 pt-6 border-t">
            <a href="{{ route('branches.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                Batal
            </a>
            <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection