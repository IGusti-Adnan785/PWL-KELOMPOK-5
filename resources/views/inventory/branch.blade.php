@extends('layouts.app')

@section('title', 'Stok ' . $branch->name)
@section('header', 'Stok Cabang ' . $branch->name)

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <p class="text-sm text-gray-600">Total Produk</p>
        <p class="text-3xl font-bold text-blue-600">{{ $inventories->total() }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <p class="text-sm text-gray-600">Stok Rendah</p>
        <p class="text-3xl font-bold text-red-600">{{ $lowStockProducts->count() }}</p>
    </div>
</div>

<!-- Stok Rendah Alert -->
@if($lowStockProducts->count() > 0)
    <div class="bg-red-50 border border-red-200 rounded-lg p-6 mb-8">
        <h3 class="text-lg font-semibold text-red-800 mb-4">⚠️ Produk Stok Rendah</h3>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-red-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-red-800">SKU</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-red-800">Produk</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-red-800">Stok</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-red-800">Min</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-red-100">
                    @foreach($lowStockProducts as $inv)
                        <tr>
                            <td class="px-4 py-2 font-mono text-sm">{{ $inv->product->sku }}</td>
                            <td class="px-4 py-2">{{ $inv->product->name }}</td>
                            <td class="px-4 py-2"><span class="px-2 py-1 bg-red-200 text-red-800 rounded font-bold">{{ $inv->quantity }}</span></td>
                            <td class="px-4 py-2">{{ $inv->product->reorder_point }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif

<!-- All Inventory -->
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center flex-wrap gap-4">
        <h3 class="text-lg font-semibold">Semua Produk</h3>
        <div class="space-x-2">
            <a href="{{ route('inventory.logs', $branch) }}" class="text-blue-600 hover:underline text-sm">Log Stok</a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">SKU</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Harga</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Stok</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Min</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($inventories as $inv)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-mono text-sm">{{ $inv->product->sku }}</td>
                        <td class="px-6 py-4">{{ $inv->product->name }}</td>
                        <td class="px-6 py-4">{{ $inv->product->category }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($inv->product->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 font-semibold">{{ $inv->quantity }}</td>
                        <td class="px-6 py-4">{{ $inv->product->reorder_point }}</td>
                        <td class="px-6 py-4">
                            @if($inv->quantity <= $inv->product->reorder_point)
                                <span class="px-2 py-1 bg-red-100 text-red-800 rounded text-xs font-semibold">Rendah</span>
                            @else
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-xs font-semibold">Normal</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <button type="button" onclick="openAdjustModal({{ $inv->id }}, '{{ $inv->product->name }}')" class="text-blue-600 hover:underline text-sm">
                                Sesuaikan
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">Tidak ada stok</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="px-6 py-4 border-t border-gray-200">
        {{ $inventories->links() }}
    </div>
</div>

<!-- Adjust Modal -->
<div id="adjustModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full">
        <h3 class="text-lg font-semibold mb-4">Sesuaikan Stok</h3>
        <form id="adjustForm" method="POST">
            @csrf
            <input type="hidden" id="inventoryId">

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Produk</label>
                <p id="productName" class="px-3 py-2 bg-gray-100 rounded"></p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Jumlah Stok Baru</label>
                <input type="number" name="quantity" required class="w-full px-3 py-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Alasan</label>
                <select name="reason" required class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                    <option value="">Pilih Alasan</option>
                    <option value="receiving">Penerimaan Barang</option>
                    <option value="adjustment">Koreksi Stok</option>
                    <option value="damage">Barang Rusak</option>
                    <option value="expired">Barang Kadaluarsa</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Catatan</label>
                <textarea name="notes" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg"></textarea>
            </div>

            <div class="flex justify-end space-x-3">
                <button type="button" onclick="closeAdjustModal()" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openAdjustModal(inventoryId, productName) {
    document.getElementById('inventoryId').value = inventoryId;
    document.getElementById('productName').textContent = productName;
    document.getElementById('adjustForm').action = `/inventory/${inventoryId}/adjust`;
    document.getElementById('adjustModal').classList.remove('hidden');
}

function closeAdjustModal() {
    document.getElementById('adjustModal').classList.add('hidden');
}
</script>
@endsection
