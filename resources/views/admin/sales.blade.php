<x-admin-layout title="Pantau transaksi harian">
    <div class="mx-auto max-w-7xl space-y-6">
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-medium uppercase tracking-[0.3em] text-slate-500">Penjualan</p>
                    <h1 class="mt-2 text-2xl font-semibold text-slate-900">Pantau transaksi harian</h1>
                </div>
                <button class="inline-flex items-center justify-center rounded-full bg-sky-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-sky-500">Buat Laporan Penjualan</button>
            </div>

            <div class="mt-6 grid gap-4 md:grid-cols-3">
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Total Transaksi</p>
                    <p class="mt-4 text-3xl font-semibold text-slate-900">1.873</p>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Pendapatan</p>
                    <p class="mt-4 text-3xl font-semibold text-slate-900">Rp 385.200.000</p>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Transaksi Kembali</p>
                    <p class="mt-4 text-3xl font-semibold text-emerald-700">72%</p>
                </div>
            </div>
        </section>

        <section class="grid gap-6 xl:grid-cols-[1.3fr_0.7fr]">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm font-medium uppercase tracking-[0.3em] text-slate-500">Ringkasan Penjualan</p>
                        <h2 class="mt-2 text-xl font-semibold text-slate-900">Tren transaksi minggu ini</h2>
                    </div>
                </div>

                <div class="mt-6 h-72 rounded-3xl bg-gradient-to-br from-slate-950 via-slate-800 to-slate-900 p-6 text-slate-100">
                    <p class="text-sm text-slate-400">Grafik garis penjualan mingguan</p>
                    <div class="mt-8 flex h-full items-end gap-3">
                        <div class="h-24 w-10 rounded-3xl bg-cyan-400"></div>
                        <div class="h-32 w-10 rounded-3xl bg-cyan-300"></div>
                        <div class="h-40 w-10 rounded-3xl bg-cyan-500"></div>
                        <div class="h-28 w-10 rounded-3xl bg-cyan-400"></div>
                        <div class="h-36 w-10 rounded-3xl bg-cyan-300"></div>
                        <div class="h-44 w-10 rounded-3xl bg-cyan-500"></div>
                        <div class="h-30 w-10 rounded-3xl bg-cyan-400"></div>
                    </div>
                </div>
            </div>

            <aside class="space-y-6">
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-medium uppercase tracking-[0.3em] text-slate-500">Top Produk Terlaris</p>
                    <ul class="mt-6 space-y-4">
                        <li class="flex items-center justify-between rounded-3xl bg-slate-50 p-4">
                            <div>
                                <p class="font-semibold text-slate-900">Minyak Goreng 2L</p>
                                <p class="text-sm text-slate-500">Terjual 320 pcs</p>
                            </div>
                            <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">Terlaris</span>
                        </li>
                        <li class="flex items-center justify-between rounded-3xl bg-slate-50 p-4">
                            <div>
                                <p class="font-semibold text-slate-900">Beras 5kg</p>
                                <p class="text-sm text-slate-500">Terjual 214 pcs</p>
                            </div>
                            <span class="rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700">Stabil</span>
                        </li>
                        <li class="flex items-center justify-between rounded-3xl bg-slate-50 p-4">
                            <div>
                                <p class="font-semibold text-slate-900">Susu UHT 1L</p>
                                <p class="text-sm text-slate-500">Terjual 187 pcs</p>
                            </div>
                            <span class="rounded-full bg-sky-100 px-3 py-1 text-xs font-semibold text-sky-700">Naik</span>
                        </li>
                    </ul>
                </div>
            </aside>
        </section>
    </div>
</x-admin-layout>
