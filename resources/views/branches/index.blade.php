@extends('layouts.app')

@section('title', 'Cabang')
@section('header', 'Daftar Cabang')

@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('branches.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold">
        + Tambah Cabang
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @forelse($branches as $branch)
        <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6 text-white">
                <h3 class="text-xl font-bold">{{ $branch->name }}</h3>
                <p class="text-sm opacity-75">{{ $branch->city }}</p>
            </div>
            <div class="p-6 space-y-3">
                <div class="text-sm">
                    <p class="text-gray-600">Alamat</p>
                    <p class="font-semibold">{{ $branch->address }}</p>
                </div>
                <div class="text-sm">
                    <p class="text-gray-600">Telepon</p>
                    <p class="font-semibold">{{ $branch->phone ?? '-' }}</p>
                </div>
                <div class="text-sm">
                    <p class="text-gray-600">Manajer</p>
                    <p class="font-semibold">{{ $branch->manager_name ?? '-' }}</p>
                </div>
                <div class="text-sm">
                    <p class="text-gray-600">Pengguna</p>
                    <p class="font-semibold">{{ $branch->users_count ?? 0 }} orang</p>
                </div>
                <div class="text-sm">
                    <p class="text-gray-600">Transaksi</p>
                    <p class="font-semibold">{{ $branch->transactions_count ?? 0 }}</p>
                </div>
            </div>
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex space-x-2">
                <a href="{{ route('branches.show', $branch) }}" class="flex-1 text-center py-2 text-blue-600 hover:bg-blue-50 rounded">
                    Lihat
                </a>
                <a href="{{ route('branches.edit', $branch) }}" class="flex-1 text-center py-2 text-yellow-600 hover:bg-yellow-50 rounded">
                    Edit
                </a>
                <form action="{{ route('branches.destroy', $branch) }}" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="w-full py-2 text-red-600 hover:bg-red-50 rounded">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div class="col-span-2 bg-white rounded-lg shadow p-12 text-center">
            <p class="text-gray-500 mb-4">Belum ada cabang</p>
            <a href="{{ route('branches.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                Buat Cabang Pertama
            </a>
        </div>
    @endforelse
</div>

<div class="mt-8">
    {{ $branches->links() }}
</div>
@endsection