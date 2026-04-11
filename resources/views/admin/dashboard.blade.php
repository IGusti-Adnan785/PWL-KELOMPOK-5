<x-admin-layout>
    @section('title', 'Ringkasan Minimarket')
    <div class="mx-auto max-w-7xl space-y-6">
        <section class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
            <x-metric-card title="Pendapatan Hari Ini" value="Rp 12.450.000" change="+8.3%" icon="💰" color="bg-emerald-500/10 text-emerald-700" />
            <x-metric-card title="Transaksi" value="145" change="+4.1%" icon="🧾" color="bg-sky-500/10 text-sky-700" />
            <x-metric-card title="Produk Tersedia" value="1.254" change="+2.3%" icon="📦" color="bg-amber-500/10 text-amber-700" />
            <x-metric-card title="Pelanggan Baru" value="62" change="+12.9%" icon="👥" color="bg-fuchsia-500/10 text-fuchsia-700" />
        </section>

        <section class="grid gap-6 xl:grid-cols-[1.6fr_1fr]">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm font-medium uppercase tracking-[0.3em] text-slate-500">Ringkasan Penjualan</p>
                        <h2 class="mt-3 text-2xl font-semibold text-slate-900">Saldo dan aktivitas kas</h2>
                    </div>
                    <button class="inline-flex items-center justify-center rounded-full bg-slate-950 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-800">Lihat Laporan</button>
                </div>

                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-3xl bg-slate-950 p-6 text-white shadow-sm">
                        <p class="text-sm text-slate-300">Total Pendapatan Bulanan</p>
                        <p class="mt-5 text-3xl font-semibold">Rp 385.200.000</p>
                        <p class="mt-3 text-sm text-slate-400">Target tercapai 82% dari limit.</p>
                    </div>
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <div class="flex items-center justify-between text-slate-900">
                            <p class="text-sm font-medium">Pengeluaran Operasional</p>
                            <span class="rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700">Stabil</span>
                        </div>
                        <p class="mt-5 text-3xl font-semibold">Rp 98.750.000</p>
                        <p class="mt-3 text-sm text-slate-500">Pengeluaran dipantau setiap minggu.</p>
                    </div>
                </div>

                <div class="mt-8 overflow-hidden rounded-3xl border border-slate-200 bg-slate-50 p-6">
                    <div class="flex items-center justify-between gap-3">
                        <div>
                            <p class="text-sm font-medium uppercase tracking-[0.3em] text-slate-500">Tren Penjualan</p>
                            <p class="mt-2 text-3xl font-semibold text-slate-900">+24% dibandingkan minggu lalu</p>
                        </div>
                        <span class="rounded-full bg-emerald-500/10 px-3 py-1 text-sm font-semibold text-emerald-700">Positif</span>
                    </div>
                    <div class="mt-8 h-48 rounded-3xl bg-gradient-to-br from-emerald-400/20 via-transparent to-transparent p-6 text-slate-700">
                        <p class="text-sm text-slate-500">Grafik penjualan harian akan ditampilkan di sini.</p>
                        <div class="mt-8 flex items-end gap-3">
                            <div class="h-20 w-10 rounded-3xl bg-emerald-500"></div>
                            <div class="h-28 w-10 rounded-3xl bg-emerald-400"></div>
                            <div class="h-16 w-10 rounded-3xl bg-emerald-600"></div>
                            <div class="h-24 w-10 rounded-3xl bg-emerald-500"></div>
                            <div class="h-12 w-10 rounded-3xl bg-emerald-300"></div>
                            <div class="h-32 w-10 rounded-3xl bg-emerald-500"></div>
                            <div class="h-20 w-10 rounded-3xl bg-emerald-400"></div>
                        </div>
                    </div>
                </div>
            </div>

            <aside class="space-y-6">
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-medium uppercase tracking-[0.3em] text-slate-500">Stok Hampir Habis</p>
                    <ul class="mt-6 space-y-4">
                        <li class="flex items-center justify-between rounded-3xl bg-slate-50 p-4">
                            <div>
                                <p class="font-semibold text-slate-900">Susu UHT 1L</p>
                                <p class="text-sm text-slate-500">Sisa 12 pcs</p>
                            </div>
                            <span class="rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700">Kurang</span>
                        </li>
                        <li class="flex items-center justify-between rounded-3xl bg-slate-50 p-4">
                            <div>
                                <p class="font-semibold text-slate-900">Roti Tawar</p>
                                <p class="text-sm text-slate-500">Sisa 8 pcs</p>
                            </div>
                            <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">Kritis</span>
                        </li>
                        <li class="flex items-center justify-between rounded-3xl bg-slate-50 p-4">
                            <div>
                                <p class="font-semibold text-slate-900">Minyak Goreng 2L</p>
                                <p class="text-sm text-slate-500">Sisa 24 pcs</p>
                            </div>
                            <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">Aman</span>
                        </li>
                    </ul>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium uppercase tracking-[0.3em] text-slate-500">Promo Minggu Ini</p>
                            <p class="mt-2 text-xl font-semibold text-slate-900">Diskon 10% untuk sembako</p>
                        </div>
                        <span class="rounded-full bg-sky-100 px-3 py-1 text-xs font-semibold text-sky-700">Aktif</span>
                    </div>
                    <p class="mt-5 text-sm text-slate-500">Tingkatkan penjualan produk kebutuhan pokok dengan promo harian.</p>
                </div>
            </aside>
        </section>

        <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-medium uppercase tracking-[0.3em] text-slate-500">Transaksi Terbaru</p>
                    <h2 class="mt-2 text-2xl font-semibold text-slate-900">20 transaksi terakhir</h2>
                </div>
                <button class="inline-flex items-center justify-center rounded-full bg-slate-950 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-800">Lihat Semua</button>
            </div>

            <div class="mt-6 overflow-x-auto">
                <table class="min-w-full text-left text-sm text-slate-600">
                    <thead class="border-b border-slate-200 text-slate-900">
                        <tr>
                            <th class="px-4 py-3 font-semibold">Invoice</th>
                            <th class="px-4 py-3 font-semibold">Pelanggan</th>
                            <th class="px-4 py-3 font-semibold">Jumlah</th>
                            <th class="px-4 py-3 font-semibold">Status</th>
                            <th class="px-4 py-3 font-semibold">Waktu</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-4 font-semibold text-slate-900">INV-0123</td>
                            <td class="px-4 py-4">Dina S.</td>
                            <td class="px-4 py-4">Rp 185.000</td>
                            <td class="px-4 py-4"><span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">Selesai</span></td>
                            <td class="px-4 py-4">10:24 WIB</td>
                        </tr>
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-4 font-semibold text-slate-900">INV-0122</td>
                            <td class="px-4 py-4">Arman H.</td>
                            <td class="px-4 py-4">Rp 79.000</td>
                            <td class="px-4 py-4"><span class="rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700">Proses</span></td>
                            <td class="px-4 py-4">09:18 WIB</td>
                        </tr>
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-4 font-semibold text-slate-900">INV-0121</td>
                            <td class="px-4 py-4">Rini P.</td>
                            <td class="px-4 py-4">Rp 56.000</td>
                            <td class="px-4 py-4"><span class="rounded-full bg-sky-100 px-3 py-1 text-xs font-semibold text-sky-700">Pending</span></td>
                            <td class="px-4 py-4">08:56 WIB</td>
                        </tr>
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-4 font-semibold text-slate-900">INV-0120</td>
                            <td class="px-4 py-4">Budi S.</td>
                            <td class="px-4 py-4">Rp 142.000</td>
                            <td class="px-4 py-4"><span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">Selesai</span></td>
                            <td class="px-4 py-4">08:12 WIB</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-admin-layout>
