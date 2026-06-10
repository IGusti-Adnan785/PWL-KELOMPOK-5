@extends('layouts.app')

@section('title', 'Log Stok')
@section('header', 'Log Perubahan Stok - ' . $branch->name)

@section('content')
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Produk</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Tipe</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Alasan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Qty</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Oleh</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Catatan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($logs as $log)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm">{{ $log->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4">{{ $log->product->name }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded text-xs font-semibold @if($log->type === 'in') bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                                {{ ucfirst($log->type) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm">{{ ucfirst(str_replace('_', ' ', $log->reason)) }}</td>
                        <td class="px-6 py-4 font-semibold">{{ $log->quantity }}</td>
                        <td class="px-6 py-4 text-sm">{{ $log->user->name }}</td>
                        <td class="px-6 py-4 text-sm">{{ $log->notes ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">Tidak ada log</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="px-6 py-4 border-t border-gray-200">
        {{ $logs->links() }}
    </div>
</div>
@endsection
