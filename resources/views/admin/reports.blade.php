<x-admin-layout title="Analisis bisnis minimarket">
    <div class="mx-auto max-w-7xl space-y-6">
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-medium uppercase tracking-[0.3em] text-slate-500">Laporan</p>
                    <h1 class="mt-2 text-2xl font-semibold text-slate-900">Analisis bisnis minimarket</h1>
                </div>
                <button class="inline-flex items-center justify-center rounded-full bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500">Unduh Laporan</button>
            </div>

            <div class="mt-6 grid gap-4 md:grid-cols-3">
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Laporan Mingguan</p>
                    <p class="mt-4 text-2xl font-semibold text-slate-900">Disiapkan</p>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Laporan Bulanan</p>
                    <p class="mt-4 text-2xl font-semibold text-slate-900">Siap</p>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Laporan Tahunan</p>
                    <p class="mt-4 text-2xl font-semibold text-slate-900">Dalam Proses</p>
                </div>
            </div>
        </section>

        <section class="grid gap-6 xl:grid-cols-[1.2fr_0.8fr]">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm font-medium uppercase tracking-[0.3em] text-slate-500">Ringkasan Laporan</p>
                <h2 class="mt-2 text-xl font-semibold text-slate-900">Kondisi bisnis dan rekomendasi</h2>
                <div class="mt-6 space-y-4">
                    <div class="rounded-3xl bg-slate-50 p-5">
                        <p class="font-semibold text-slate-900">Penjualan naik 24% dibandingkan minggu sebelumnya.</p>
                        <p class="mt-2 text-sm text-slate-500">Fokus pada stok sembako dan promo agar margin tetap sehat.</p>
                    </div>
                    <div class="rounded-3xl bg-slate-50 p-5">
                        <p class="font-semibold text-slate-900">Stok roti tawar sedang kritis.</p>
                        <p class="mt-2 text-sm text-slate-500">Rekomendasi reorder minimal 6 dus dalam 2 hari.</p>
                    </div>
                    <div class="rounded-3xl bg-slate-50 p-5">
                        <p class="font-semibold text-slate-900">Rasio pelanggan kembali tinggi.</p>
                        <p class="mt-2 text-sm text-slate-500">Pertahankan program loyalty dengan diskon reguler.</p>
                    </div>
                </div>
            </div>

            <aside class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-sm font-medium uppercase tracking-[0.3em] text-slate-500">Filter Laporan</p>
                        <p class="mt-2 text-slate-600">Pilih periode dan jenis laporan.</p>
                    </div>
                    <button class="rounded-full bg-slate-950 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-800">Terapkan</button>
                </div>

                <div class="mt-6 space-y-4">
                    <label class="block text-sm font-medium text-slate-700">Periode</label>
                    <select class="w-full rounded-3xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 outline-none">
                        <option>Mingguan</option>
                        <option>Bulanan</option>
                        <option>Tahunan</option>
                    </select>

                    <label class="block text-sm font-medium text-slate-700">Jenis Laporan</label>
                    <select class="w-full rounded-3xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 outline-none">
                        <option>Penjualan</option>
                        <option>Inventaris</option>
                        <option>Keuangan</option>
                    </select>
                </div>
            </aside>
        </section>
    </div>
</x-admin-layout>
