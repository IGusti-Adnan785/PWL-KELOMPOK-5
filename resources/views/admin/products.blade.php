<x-admin-layout title="Kelola Semua Item Minimarket">
    <div class="mx-auto max-w-7xl space-y-6">
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-medium uppercase tracking-[0.3em] text-slate-500">Produk</p>
                    <h1 class="mt-2 text-2xl font-semibold text-slate-900">Kelola Semua Item Minimarket</h1>
                </div>
                <button
                    class="inline-flex items-center justify-center rounded-full bg-emerald-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-500">Tambah
                    Produk Baru</button>
            </div>

            <div class="mt-6 grid gap-4 md:grid-cols-3">
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Total Produk</p>
                    <p class="mt-4 text-3xl font-semibold text-slate-900">1.254</p>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Kategori</p>
                    <p class="mt-4 text-3xl font-semibold text-slate-900">18</p>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Stok Habis</p>
                    <p class="mt-4 text-3xl font-semibold text-red-600">14</p>
                </div>
            </div>
        </section>

        <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-medium uppercase tracking-[0.3em] text-slate-500">Daftar Produk</p>
                    <h2 class="mt-2 text-xl font-semibold text-slate-900">Produk populer dan stok terkini</h2>
                </div>
            </div>

            <div class="mt-6 overflow-x-auto">
                <table class="min-w-full text-left text-sm text-slate-600">
                    <thead class="border-b border-slate-200 text-slate-900">
                        <tr>
                            <th class="px-4 py-3 font-semibold">SKU</th>
                            <th class="px-4 py-3 font-semibold">Nama Produk</th>
                            <th class="px-4 py-3 font-semibold">Kategori</th>
                            <th class="px-4 py-3 font-semibold">Stok</th>
                            <th class="px-4 py-3 font-semibold">Harga</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-4 font-semibold text-slate-900">P-001</td>
                            <td class="px-4 py-4">Beras 5kg</td>
                            <td class="px-4 py-4">Sembako</td>
                            <td class="px-4 py-4">120</td>
                            <td class="px-4 py-4">Rp 90.000</td>
                        </tr>
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-4 font-semibold text-slate-900">P-023</td>
                            <td class="px-4 py-4">Susu UHT 1L</td>
                            <td class="px-4 py-4">Minuman</td>
                            <td class="px-4 py-4">12</td>
                            <td class="px-4 py-4">Rp 18.500</td>
                        </tr>
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-4 font-semibold text-slate-900">P-044</td>
                            <td class="px-4 py-4">Minyak Goreng 2L</td>
                            <td class="px-4 py-4">Dapur</td>
                            <td class="px-4 py-4">24</td>
                            <td class="px-4 py-4">Rp 38.000</td>
                        </tr>
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-4 font-semibold text-slate-900">P-078</td>
                            <td class="px-4 py-4">Roti Tawar</td>
                            <td class="px-4 py-4">Roti & Kue</td>
                            <td class="px-4 py-4">8</td>
                            <td class="px-4 py-4">Rp 15.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-admin-layout>