<x-admin-layout title="Pantau ketersediaan barang">
    <div class="mx-auto max-w-7xl space-y-6">
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-medium uppercase tracking-[0.3em] text-slate-500">Stok</p>
                    <h1 class="mt-2 text-2xl font-semibold text-slate-900">Pantau ketersediaan barang</h1>
                </div>
                <button class="inline-flex items-center justify-center rounded-full bg-amber-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-500">Perbarui Stok</button>
            </div>

            <div class="mt-6 overflow-x-auto">
                <table class="min-w-full text-left text-sm text-slate-600">
                    <thead class="border-b border-slate-200 text-slate-900">
                        <tr>
                            <th class="px-4 py-3 font-semibold">SKU</th>
                            <th class="px-4 py-3 font-semibold">Nama</th>
                            <th class="px-4 py-3 font-semibold">Kategori</th>
                            <th class="px-4 py-3 font-semibold">Stok</th>
                            <th class="px-4 py-3 font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-4 font-semibold text-slate-900">P-023</td>
                            <td class="px-4 py-4">Susu UHT 1L</td>
                            <td class="px-4 py-4">Minuman</td>
                            <td class="px-4 py-4">12</td>
                            <td class="px-4 py-4"><span class="rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700">Menipis</span></td>
                        </tr>
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-4 font-semibold text-slate-900">P-078</td>
                            <td class="px-4 py-4">Roti Tawar</td>
                            <td class="px-4 py-4">Roti & Kue</td>
                            <td class="px-4 py-4">8</td>
                            <td class="px-4 py-4"><span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">Kritis</span></td>
                        </tr>
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-4 font-semibold text-slate-900">P-044</td>
                            <td class="px-4 py-4">Minyak Goreng 2L</td>
                            <td class="px-4 py-4">Dapur</td>
                            <td class="px-4 py-4">24</td>
                            <td class="px-4 py-4"><span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">Aman</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-admin-layout>
