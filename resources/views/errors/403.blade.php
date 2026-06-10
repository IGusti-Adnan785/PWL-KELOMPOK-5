@extends('layouts.app')

@section('title', 'Akses Ditolak')
@section('header', 'Akses Ditolak')

@section('content')
<div class="text-center">
    <h1 class="text-6xl font-bold text-red-600 mb-4">403</h1>
    <p class="text-2xl text-gray-900 mb-2">Akses Ditolak</p>
    <p class="text-gray-600 mb-8">Anda tidak memiliki izin untuk mengakses halaman ini.</p>
    <a href="{{ route('dashboard') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
        Kembali ke Dashboard
    </a>
</div>
@endsection