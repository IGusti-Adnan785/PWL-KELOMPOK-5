@extends('layouts.app')

@section('title', $branch->name)
@section('header', 'Detail Cabang ' . $branch->name)

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Branch Info -->
    <div class="md:col-span-2">
        <div class="bg-white rounded-lg shadow p-8 mb-6">
            <h2 class="text-2xl font-bold mb-6">{{ $branch->name }}</h2>
            <dl class="space-y-4">
                <div>
                    <dt class="text-sm font-medium text-gray-600">Kota</dt>
                    <dd class="text-lg font-semibold">{{ $branch->city }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-600">Alamat</dt>
                    <dd class="text-lg">{{ $branch->address }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-600">Telepon</dt>
                    <dd class="text-lg">{{ $branch->phone ?? '-' }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-600">Manajer</dt>
                    <dd class="text-lg">{{ $branch->manager_name ?? '-' }}</dd>
                </div>
            </dl>

            <div class="mt-8 flex space-x-4">
                <a href="{{ route('branches.edit', $branch) }}" class="px-6 py-2 bg-yellow-600 hover:bg-yellow-700 text-white rounded-lg font-semibold">
                    Edit
                </a>
                <form action="{{ route('branches.destroy', $branch) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus cabang ini?')" class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-semibold">
                        Hapus
                    </button>
                </form>
            </div>
        </div>

        <!-- Users -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold">Pengguna Cabang</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Role</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($branch->users as $user)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $user->name }}</td>
                                <td class="px-6 py-4">{{ $user->email }}</td>
                                <td class="px-6 py-4"><span class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-sm">{{ ucfirst($user->role) }}</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-500">Tidak ada pengguna</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Statistics -->
    <div class="space-y-6">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg shadow p-6 text-white">
            <p class="text-sm opacity-75">Total Pengguna</p>
            <p class="text-3xl font-bold">{{ $branch->users->count() }}</p>
        </div>

        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-lg shadow p-6 text-white">
            <p class="text-sm opacity-75">Total Transaksi</p>
            <p class="text-3xl font-bold">{{ $branch->transactions->count() }}</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <p class="text-sm text-gray-600 mb-2">Dibuat</p>
            <p class="text-lg font-semibold">{{ $branch->created_at->format('d M Y') }}</p>
            <p class="text-sm text-gray-600 mt-4">Diperbarui</p>
            <p class="text-lg font-semibold">{{ $branch->updated_at->format('d M Y H:i') }}</p>
        </div>
    </div>
</div>
@endsection