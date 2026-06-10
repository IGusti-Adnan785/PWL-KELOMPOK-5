@extends('layouts.app')

@section('title', 'Transaksi Baru')
@section('header', 'Buat Transaksi Baru')

@section('content')
<form action="{{ route('transactions.store') }}" method="POST" class="space-y-6">
    @csrf

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Customer & Payment Info -->
        <div class="md:col-span-2 bg-white rounded-lg shadow p-6 space-y-4">
            <h3 class="text-lg font-semibold border-b pb-4">Informasi Transaksi</h3>

            <div>
                <label class="block text-sm font-medium text-gray-700">Cabang</label>
                <input type="hidden" name="branch_id" value="{{ auth()->user()->branch_id }}">
                <input type="text" class="mt-1 block w-full px-3 py-2 bg-gray-100" value="{{ $branch->name ?? '' }}" disabled>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Tipe Transaksi</label>
                <select name="type" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="sale">Penjualan</option>
                    <option value="return">Retur</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                <select name="payment_method" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="cash">Tunai</option>
                    <option value="card">Kartu Kredit</option>
                    <option value="transfer">Transfer</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Catatan</label>
                <textarea name="notes" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg"></textarea>
            </div>
        </div>

        <!-- Summary -->
        <div class="bg-blue-50 rounded-lg shadow p-6 h-fit sticky top-6">
            <h3 class="text-lg font-semibold mb-4">Ringkasan</h3>
            <div class="space-y-3 text-sm border-b border-blue-200 pb-4">
                <div class="flex justify-between">
                    <span>Subtotal:</span>
                    <span id="subtotal">Rp 0</span>
                </div>
                <div class="flex justify-between">
                    <span>PPN (10%):</span>
                    <span id="tax">Rp 0</span>
                </div>
                <div class="flex justify-between font-semibold text-base">
                    <span>Total:</span>
                    <span id="total">Rp 0</span>
                </div>
            </div>

            <div class="mt-4 space-y-3">
                <div>
                    <label class="block text-sm font-medium">Pembayaran</label>
                    <input type="number" name="paid_amount" step="0.01" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg" id="paid_amount">
                </div>
                <div>
                    <label class="block text-sm font-medium">Kembalian</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 bg-gray-100 rounded-lg" id="change" disabled>
                </div>
            </div>
        </div>
    </div>

    <!-- Items -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Item Transaksi</h3>
            <button type="button" onclick="addItem()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm">
                + Tambah Produk
            </button>
        </div>

        <div id="items-container" class="space-y-3">
            <div class="item-row bg-gray-50 p-4 rounded-lg">
                <div class="grid grid-cols-12 gap-3 items-end">
                    <div class="col-span-5">
                        <label class="block text-sm font-medium mb-1">Produk</label>
                        <select name="items[0][product_id]" class="w-full px-3 py-2 border border-gray-300 rounded-lg product-select" onchange="updatePrice(this)" required>
                            <option value="">Pilih Produk</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                    {{ $product->name }} ({{ $product->sku }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium mb-1">Qty</label>
                        <input type="number" name="items[0][quantity]" class="w-full px-3 py-2 border border-gray-300 rounded-lg quantity-input" min="1" value="1" onchange="calculateTotal()" required>
                    </div>
                    <div class="col-span-3">
                        <label class="block text-sm font-medium mb-1">Harga</label>
                        <input type="number" name="items[0][price]" class="w-full px-3 py-2 border border-gray-300 rounded-lg price-input" step="0.01" min="0" onchange="calculateTotal()" required>
                    </div>
                    <div class="col-span-2">
                        <button type="button" onclick="removeItem(this)" class="w-full bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-end space-x-4">
        <a href="{{ route('transactions.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
            Batal
        </a>
        <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
            Simpan Transaksi
        </button>
    </div>
</form>

<script>
let itemCount = 1;

function addItem() {
    const container = document.getElementById('items-container');
    const html = `
        <div class="item-row bg-gray-50 p-4 rounded-lg">
            <div class="grid grid-cols-12 gap-3 items-end">
                <div class="col-span-5">
                    <label class="block text-sm font-medium mb-1">Produk</label>
                    <select name="items[${itemCount}][product_id]" class="w-full px-3 py-2 border border-gray-300 rounded-lg product-select" onchange="updatePrice(this)" required>
                        <option value="">Pilih Produk</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                {{ $product->name }} ({{ $product->sku }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium mb-1">Qty</label>
                    <input type="number" name="items[${itemCount}][quantity]" class="w-full px-3 py-2 border border-gray-300 rounded-lg quantity-input" min="1" value="1" onchange="calculateTotal()" required>
                </div>
                <div class="col-span-3">
                    <label class="block text-sm font-medium mb-1">Harga</label>
                    <input type="number" name="items[${itemCount}][price]" class="w-full px-3 py-2 border border-gray-300 rounded-lg price-input" step="0.01" min="0" onchange="calculateTotal()" required>
                </div>
                <div class="col-span-2">
                    <button type="button" onclick="removeItem(this)" class="w-full bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
    itemCount++;
}

function removeItem(btn) {
    btn.closest('.item-row').remove();
    calculateTotal();
}

function updatePrice(select) {
    const price = select.options[select.selectedIndex].dataset.price;
    select.closest('.item-row').querySelector('.price-input').value = price;
    calculateTotal();
}

function calculateTotal() {
    let subtotal = 0;
    document.querySelectorAll('.item-row').forEach(row => {
        const qty = parseFloat(row.querySelector('.quantity-input').value) || 0;
        const price = parseFloat(row.querySelector('.price-input').value) || 0;
        subtotal += qty * price;
    });

    const tax = subtotal * 0.1;
    const total = subtotal + tax;

    document.getElementById('subtotal').textContent = 'Rp ' + formatNumber(subtotal);
    document.getElementById('tax').textContent = 'Rp ' + formatNumber(tax);
    document.getElementById('total').textContent = 'Rp ' + formatNumber(total);
    document.getElementById('paid_amount').value = total;
    updateChange();
}

function updateChange() {
    const total = getTotal();
    const paid = parseFloat(document.getElementById('paid_amount').value) || 0;
    const change = paid - total;
    document.getElementById('change').value = 'Rp ' + formatNumber(change > 0 ? change : 0);
}

function getTotal() {
    let subtotal = 0;
    document.querySelectorAll('.item-row').forEach(row => {
        const qty = parseFloat(row.querySelector('.quantity-input').value) || 0;
        const price = parseFloat(row.querySelector('.price-input').value) || 0;
        subtotal += qty * price;
    });
    return subtotal * 1.1;
}

function formatNumber(num) {
    return num.toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
}

document.getElementById('paid_amount').addEventListener('change', updateChange);
calculateTotal();
</script>
@endsection
