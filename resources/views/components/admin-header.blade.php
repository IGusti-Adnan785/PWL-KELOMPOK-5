@props(['title' => 'Ringkasan Minimarket'])

<header class="border-b border-slate-200 bg-white/90 px-4 py-4 shadow-sm backdrop-blur sm:px-6">
    <div class="mx-auto flex max-w-7xl flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-slate-500">{{ ucfirst(request()->route()->getName() ? str_replace('admin.', '', request()->route()->getName()) : 'Dashboard') }}</p>
            <h1 class="mt-2 text-2xl font-semibold text-slate-900">{{ $title }}</h1>
        </div>
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
            <div class="hidden sm:flex items-center rounded-full border border-slate-200 bg-slate-50 px-3 py-2 text-slate-500 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-none" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.817-4.817A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
                <input type="search" placeholder="Cari produk, pelanggan, pesanan" class="ml-3 w-72 border-0 bg-transparent text-sm text-slate-700 outline-none placeholder:text-slate-400" />
            </div>
            <button class="inline-flex items-center justify-center rounded-full bg-emerald-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-500">+ Tambah Produk</button>
            <div class="relative">
                <button class="inline-flex items-center gap-3 rounded-full border border-slate-200 bg-white px-3 py-2 shadow-sm hover:bg-slate-50 transition" onclick="toggleDropdown()">
                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-emerald-500 text-sm font-semibold text-white">A</span>
                    <div class="hidden sm:block text-left">
                        <p class="text-sm font-semibold text-slate-900">Admin</p>
                        <p class="text-xs text-slate-500">admin@minimarket.id</p>
                    </div>
                    <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="dropdown-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-3xl border border-slate-200 shadow-lg hidden z-10">
                    <div class="py-2">
                        <a href="#" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100">Profil</a>
                        <a href="{{ route('admin.settings') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100">Pengaturan</a>
                        <hr class="my-1">
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</header>

<script>
function toggleDropdown() {
    const menu = document.getElementById('dropdown-menu');
    menu.classList.toggle('hidden');
}

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    const dropdown = document.querySelector('.relative');
    const menu = document.getElementById('dropdown-menu');
    if (!dropdown.contains(event.target)) {
        menu.classList.add('hidden');
    }
});
</script>


