@props(['branch'])

<x-common.card title="Selamat Datang">
    <p class="text-gray-600 mb-4">{{ auth()->user()->name }}, Anda sedang bekerja di cabang <strong>{{ $branch->name }}</strong></p>
    @if(auth()->user()->isCashier())
        <a href="{{ route('transactions.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition">
            Buat Transaksi Baru
        </a>
    @endif
</x-common.card>
