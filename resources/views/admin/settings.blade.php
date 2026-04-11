<x-admin-layout title="Atur preferensi minimarket">
    <div class="mx-auto max-w-7xl space-y-6">
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-medium uppercase tracking-[0.3em] text-slate-500">Pengaturan</p>
                    <h1 class="mt-2 text-2xl font-semibold text-slate-900">Atur preferensi minimarket</h1>
                </div>
                <button class="inline-flex items-center justify-center rounded-full bg-slate-950 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-slate-800">Simpan Pengaturan</button>
            </div>

            <div class="mt-6 grid gap-6 md:grid-cols-2">
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
                    <p class="text-sm font-medium text-slate-700">Informasi Toko</p>
                    <div class="mt-4 space-y-4 text-sm text-slate-600">
                        <div>
                            <p class="font-semibold text-slate-900">Nama Toko</p>
                            <p class="text-slate-500">MiniMarket Karya</p>
                        </div>
                        <div>
                            <p class="font-semibold text-slate-900">Alamat</p>
                            <p class="text-slate-500">Jl. Kebon Jeruk No. 12, Jakarta</p>
                        </div>
                    </div>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
                    <p class="text-sm font-medium text-slate-700">Preferensi</p>
                    <div class="mt-4 space-y-4 text-sm text-slate-600">
                        <div>
                            <p class="font-semibold text-slate-900">Zona Pajak</p>
                            <p class="text-slate-500">Jakarta Selatan</p>
                        </div>
                        <div>
                            <p class="font-semibold text-slate-900">Metode Pembayaran</p>
                            <p class="text-slate-500">Tunai / QRIS / Transfer</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-admin-layout>
