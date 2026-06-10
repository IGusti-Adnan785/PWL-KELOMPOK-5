@extends('layouts.app')

@section('title', 'Dashboard Kasir')
@section('header', 'Dashboard Kasir - ' . $branch->name)

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Selamat Datang</h3>
        <p class="text-gray-600">{{ auth()->user()->name }}, Anda sedang bekerja di cabang <strong>{{ $branch->name }}</strong></p>
        <a href="{{ route('transactions.create') }}" class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold">
            Buat Transaksi Baru
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Informasi Cabang</h3>
        <dl class="space-y-2 text-sm">
            <div><dt class="font-semibold text-gray-600">Nama:</dt> <dd>{{ $branch->name }}</dd></div>
            <div><dt class="font-semibold text-gray-600">Kota:</dt> <dd>{{ $branch->city }}</dd></div>
            <div><dt class="font-semibold text-gray-600">Alamat:</dt> <dd>{{ $branch->address }}</dd></div>
            <div><dt class="font-semibold text-gray-600">Telepon:</dt> <dd>{{ $branch->phone ?? '-' }}</dd></div>
        </dl>
    </div>
</div>
@endsection
