<footer class="border-t border-slate-200 bg-white/90 px-4 py-6 sm:px-6">
    <div class="mx-auto max-w-7xl">
        <div class="grid gap-6 md:grid-cols-3">
            <div>
                <p class="text-sm font-semibold text-slate-900">MiniMarket Admin</p>
                <p class="mt-2 text-sm text-slate-600">Panel administrasi untuk mengelola minimarket dengan mudah dan
                    efisien.</p>
            </div>
            <div>
                <p class="text-sm font-semibold text-slate-900">Navigasi Cepat</p>
                <div class="mt-2 space-y-1">
                    <a href="{{ route('admin.dashboard') }}"
                        class="block text-sm text-slate-600 hover:text-slate-900 transition">Dashboard</a>
                    <a href="{{ route('admin.products') }}"
                        class="block text-sm text-slate-600 hover:text-slate-900 transition">Produk</a>
                    <a href="{{ route('admin.sales') }}"
                        class="block text-sm text-slate-600 hover:text-slate-900 transition">Penjualan</a>
                    <a href="{{ route('admin.reports') }}"
                        class="block text-sm text-slate-600 hover:text-slate-900 transition">Laporan</a>
                </div>
            </div>
            <div>
                <p class="text-sm font-semibold text-slate-900">Bantuan & Dukungan</p>
                <div class="mt-2 space-y-1">
                    <a href="#" class="block text-sm text-slate-600 hover:text-slate-900 transition">Dokumentasi</a>
                    <a href="#" class="block text-sm text-slate-600 hover:text-slate-900 transition">FAQ</a>
                    <a href="#" class="block text-sm text-slate-600 hover:text-slate-900 transition">Kontak Support</a>
                </div>
            </div>
        </div>
    </div>
</footer>