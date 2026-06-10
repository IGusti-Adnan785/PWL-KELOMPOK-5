@if(auth()->user()->isOwner())
    <!-- Owner Menu -->
    <x-navigation.menu-item 
        route="dashboard" 
        label="Dashboard"
    >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l4-4m0 0l4-4m-4 4l-4-4m4 4l4 4"></path>
        </svg>
    </x-navigation.menu-item>

    <x-navigation.menu-item 
        route="branches.index" 
        label="Cabang"
        routePrefix="branches"
    >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"></path>
        </svg>
    </x-navigation.menu-item>

    <x-navigation.menu-item 
        route="products.index" 
        label="Produk"
        routePrefix="products"
    >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 012 12V7a2 2 0 012-2z"></path>
        </svg>
    </x-navigation.menu-item>

    <x-navigation.menu-item 
        route="inventory.index" 
        label="Stok"
        routePrefix="inventory"
    >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 012.646 2.646 9.003 9.003 0 0015.354 20.354z"></path>
        </svg>
    </x-navigation.menu-item>

    <x-navigation.menu-item 
        route="transactions.index" 
        label="Transaksi"
        routePrefix="transactions"
    >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
        </svg>
    </x-navigation.menu-item>
@else
    <!-- Staff Menu -->
    <x-navigation.menu-item 
        route="dashboard" 
        label="Dashboard"
    >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l4-4m0 0l4-4m-4 4l-4-4m4 4l4 4"></path>
        </svg>
    </x-navigation.menu-item>

    @if(auth()->user()->isManager())
        <x-navigation.menu-item 
            route="inventory.index" 
            label="Stok"
            routePrefix="inventory"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 012.646 2.646 9.003 9.003 0 0015.354 20.354z"></path>
            </svg>
        </x-navigation.menu-item>

        <x-navigation.menu-item 
            route="transactions.report" 
            label="Laporan"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
            </svg>
        </x-navigation.menu-item>
    @endif

    @if(auth()->user()->isCashier() || auth()->user()->isSupervisor())
        <x-navigation.menu-item 
            route="transactions.index" 
            label="Transaksi"
            routePrefix="transactions"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
        </x-navigation.menu-item>
    @endif

    @if(auth()->user()->isCashier())
        <x-navigation.menu-item 
            route="transactions.create" 
            label="Transaksi Baru"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
        </x-navigation.menu-item>
    @endif

    @if(auth()->user()->isWarehouse())
        <x-navigation.menu-item 
            route="inventory.index" 
            label="Stok"
            routePrefix="inventory"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 012.646 2.646 9.003 9.003 0 0015.354 20.354z"></path>
            </svg>
        </x-navigation.menu-item>
    @endif
@endif
