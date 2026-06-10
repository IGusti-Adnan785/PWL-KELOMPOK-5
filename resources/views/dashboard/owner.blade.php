@extends('layouts.app')

@section('title', 'Dashboard Owner')
@section('header', 'Dashboard Pemilik')

@section('content')
<!-- Stats Grid -->
<x-dashboard.stats-grid>
    <x-dashboard.stat-card 
        title="Total Cabang"
        :value="$totalBranches"
        color="blue"
    />
    
    <x-dashboard.stat-card 
        title="Transaksi Bulan Ini"
        value="Rp {{ number_format($totalTransactions, 0, ',', '.') }}"
        color="green"
    />
    
    <x-dashboard.stat-card 
        title="Pendapatan Terverifikasi"
        value="Rp {{ number_format($totalRevenue, 0, ',', '.') }}"
        color="purple"
    />
</x-dashboard.stats-grid>

<!-- Daftar Cabang -->
<x-dashboard.table-card 
    title="Daftar Cabang"
    addButtonText="Tambah Cabang"
    addButtonRoute="branches.create"
>
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Nama Cabang</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Kota</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Manajer</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Transaksi</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($branches as $branch)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">{{ $branch->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $branch->city }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $branch->manager_name ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $branch->transactions_count ?? 0 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap space-x-2">
                        <a href="{{ route('branches.show', $branch) }}" class="text-blue-600 hover:text-blue-900 text-sm">Lihat</a>
                        <a href="{{ route('branches.edit', $branch) }}" class="text-yellow-600 hover:text-yellow-900 text-sm">Edit</a>
                        <form action="{{ route('branches.destroy', $branch) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 text-sm" onclick="return confirm('Yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada cabang</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-dashboard.table-card>
@endsection