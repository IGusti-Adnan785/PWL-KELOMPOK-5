# 🏗️ Component Architecture Diagram

## Hierarchy & Relationships

```
┌─────────────────────────────────────────────────────────────────────┐
│                         APPLICATION LAYER                          │
└─────────────────────────────────────────────────────────────────────┘
                                    │
                                    ▼
        ┌───────────────────────────────────────────────────┐
        │          layouts/app.blade.php (MAIN)             │
        │                                                   │
        │  ┌─────────────────────────────────────────────┐  │
        │  │  <x-layout.sidebar />                       │  │
        │  │  ├─ Uses: <x-navigation.menu-items />     │  │
        │  │  │   ├─ Iterates: <x-navigation.menu-item/>  │  │
        │  │  │   │                                      │  │
        │  │  └─ Uses: <x-layout.user-section />       │  │
        │  └─────────────────────────────────────────────┘  │
        │                                                   │
        │  ┌─────────────────────────────────────────────┐  │
        │  │  <x-layout.header />                        │  │
        │  └─────────────────────────────────────────────┘  │
        │                                                   │
        │  ┌─────────────────────────────────────────────┐  │
        │  │  IF ERRORS:                                 │  │
        │  │  <x-common.alert type="error" />           │  │
        │  └─────────────────────────────────────────────┘  │
        │                                                   │
        │  ┌─────────────────────────────────────────────┐  │
        │  │  IF SUCCESS:                                │  │
        │  │  <x-common.alert type="success" />         │  │
        │  └─────────────────────────────────────────────┘  │
        │                                                   │
        │  ┌─────────────────────────────────────────────┐  │
        │  │  @yield('content')                          │  │
        │  │  ↓ Rendered Content                         │  │
        │  └─────────────────────────────────────────────┘  │
        │                                                   │
        └───────────────────────────────────────────────────┘
                                    │
                    ┌───────────────┼───────────────┐
                    ▼               ▼               ▼
            Dashboard Views    Other Views    Admin Views
            
            
┌──────────────────────────────────────────────────────────────┐
│                    DASHBOARD VIEWS                           │
│                 (Specific Implementations)                   │
└──────────────────────────────────────────────────────────────┘

CASHIER DASHBOARD (dashboard/cashier.blade.php)
├─ <x-dashboard.stats-grid :cols="2">
│  ├─ <x-dashboard.welcome-card :branch="$branch" />
│  │   └─ <x-common.card>    [Contains: Title, Welcome Msg, Button]
│  │
│  └─ <x-dashboard.branch-info-card :branch="$branch" />
│      └─ <x-common.card>    [Contains: Title, Branch Info]

MANAGER DASHBOARD (dashboard/manager.blade.php)
├─ <x-dashboard.stats-grid :cols="2">
│  ├─ <x-dashboard.stat-card ... color="green" />
│  └─ <x-dashboard.stat-card ... color="red" />
│
├─ <x-dashboard.table-card title="Transaksi Terbaru Bulan Ini">
│  └─ <table> [Transaction List]
│
└─ <x-dashboard.table-card title="Produk Stok Rendah">
   └─ <table> [Low Stock Products]

OWNER DASHBOARD (dashboard/owner.blade.php)
├─ <x-dashboard.stats-grid :cols="3">
│  ├─ <x-dashboard.stat-card ... color="blue" />     [Total Cabang]
│  ├─ <x-dashboard.stat-card ... color="green" />    [Transaksi]
│  └─ <x-dashboard.stat-card ... color="purple" />   [Revenue]
│
└─ <x-dashboard.table-card addButtonRoute="branches.create">
   └─ <table> [Branch List]

SUPERVISOR DASHBOARD (dashboard/supervisor.blade.php)
├─ <x-dashboard.stats-grid :cols="3">
│  ├─ <x-dashboard.stat-card ... color="blue" />     [Transaksi Hari Ini]
│  ├─ <x-dashboard.stat-card ... color="green" />    [Pendapatan]
│  └─ <x-dashboard.stat-card ... color="purple" />   [Status]
│
└─ <x-dashboard.table-card title="Transaksi Hari Ini">
   └─ <table> [Daily Transactions]

WAREHOUSE DASHBOARD (dashboard/warehouse.blade.php)
├─ <x-dashboard.stats-grid :cols="2">
│  ├─ <x-dashboard.stat-card ... color="green" />    [Normal Stock]
│  └─ <x-dashboard.stat-card ... color="red" />      [Low Stock]
│
├─ <x-dashboard.table-card title="⚠️ Produk Stok Rendah">
│  └─ <table> [Low Stock Products]
│
└─ <x-dashboard.table-card title="✓ Stok Normal">
   └─ <table> [Normal Stock Products]
```

## Component Relationship Map

```
┌─────────────────────────────────────────────────────────────┐
│                    TOP LEVEL                               │
│          layouts/app.blade.php (CONTROLLER)                │
└─────────────────────────────────────────────────────────────┘
           │               │               │
           │               │               │
    ┌──────▼──────┐  ┌─────▼────┐  ┌──────▼──────┐
    │   LAYOUT    │  │   COMMON │  │   CONTENT  │
    │ COMPONENTS  │  │ COMPONENTS│  │   YIELD    │
    └──────┬──────┘  └─────┬────┘  └──────┬──────┘
           │               │              │
      ┌────┴────────┐      │         ┌────▼───────┐
      │             │      │         │             │
    ┌─▼──────┐  ┌──▼──┐  ┌─▼────┐ ┌─▼──────────┐
    │SIDEBAR │  │HEADER│ │ALERT │ │  DASHBOARD │
    │--------│  │------│ │------|  │   VIEWS    │
    │ Menu   │  │Title │ │Error │  │  --------  │
    │ Items  │  │Branch│ │Success   │  Stats   │
    │ User   │  │      │ │Warning   │  Tables  │
    │Section │  │      │ │Info      │  Cards   │
    └─┬──────┘  └──────┘ └───────┘ └──┬────────┘
      │                           │
   ┌──▼──────────────┐        ┌───▼──────────────┐
   │  NAVIGATION     │        │   DASHBOARD      │
   │  COMPONENTS     │        │   COMPONENTS     │
   │  ----------     │        │   ----------     │
   │ menu-items      │        │ stat-card        │
   │ menu-item       │        │ stats-grid       │
   │                 │        │ table-card       │
   │                 │        │ welcome-card     │
   │                 │        │ branch-info-card │
   │                 │        │ warehouse-stats  │
   └─────────────────┘        └──────────────────┘
```

## Data Flow through Components

```
┌─────────────────────────────────────────┐
│  Laravel Controller                     │
│  - Query data from Models              │
│  - Process business logic              │
│  - Pass to view with data              │
└───────────┬─────────────────────────────┘
            │
            │ view('dashboard.cashier', ['branch' => $branch])
            │
            ▼
┌─────────────────────────────────────────┐
│  View File                              │
│  dashboard/cashier.blade.php            │
│  @extends('layouts.app')               │
│  @section('content')                   │
│  <x-dashboard.welcome-card :branch />  │
│  @endsection                           │
└───────────┬─────────────────────────────┘
            │
            │ Pass data via props
            │
            ▼
┌─────────────────────────────────────────┐
│  Component File                         │
│  components/dashboard/welcome-card     │
│  @props(['branch'])                    │
│  <x-common.card title="Selamat Datang">│
│  {% $branch->name %}                   │
│  </x-common.card>                      │
└───────────┬─────────────────────────────┘
            │
            │ Render HTML using Tailwind CSS
            │
            ▼
┌─────────────────────────────────────────┐
│  HTML Output                            │
│  <div class="bg-white rounded-lg...">  │
│    <h3>Selamat Datang</h3>             │
│    <p>Anda sedang bekerja di...</p>   │
│  </div>                                │
└─────────────────────────────────────────┘
```

## Component Props & Data

```
     Component Props Flow

   Controller                View               Component
   ---------                ----               ---------
   
   $branch          ───►  :branch       ───►  @props(['branch'])
   $transactions    ───►  :transactions ───►  @props(['transactions'])
   $stats           ───►  :stats        ───►  @props(['stats'])
   
   
     Slot Data Flow
   
   View Content             Component           Rendered Output
   ──────────────           ---------           ────────────────
   
   <x-common.card>                             <div class="...">
     Some content    ───►   {{ $slot }}   ───►   Some content
   </x-common.card>                            </div>
```

## Nesting Example

```
┌────────────────────────────────────────────────────────────┐
│  dashboard/manager.blade.php                             │
│  ┌──────────────────────────────────────────────────────┐ │
│  │ <x-dashboard.stats-grid :cols="2">                  │ │
│  │   ┌────────────────────────────────────────────┐    │ │
│  │   │ <x-dashboard.stat-card                     │    │ │
│  │   │      title="Pendapatan"                    │    │ │
│  │   │      value="Rp 1.500.000"                 │    │ │
│  │   │      color="green">                        │    │ │
│  │   │   Slot Content: Icon                       │    │ │
│  │   │ </x-dashboard.stat-card>                   │    │ │
│  │   │                                            │    │ │
│  │   │ <x-dashboard.stat-card                     │    │ │
│  │   │      title="Stok Rendah"                   │    │ │
│  │   │      :value="5"                            │    │ │
│  │   │      color="red">                          │    │ │
│  │   │   Slot Content: Icon                       │    │ │
│  │   │ </x-dashboard.stat-card>                   │    │ │
│  │   └────────────────────────────────────────────┘    │ │
│  │ </x-dashboard.stats-grid>                          │ │
│  └──────────────────────────────────────────────────────┘ │
└────────────────────────────────────────────────────────────┘
         │                                          │
         └──────────────────┬───────────────────────┘
                            │
                 (All nested in grid)
```

## Component Usage Patterns

### Pattern 1: Simple Component
```
Component: <x-common.alert />
Props: type, dismissible
Slot: message content
Usage: Single use, simple rendering
```

### Pattern 2: Container Component
```
Component: <x-dashboard.stats-grid />
Props: cols
Slot: stat-card components
Usage: Wraps multiple child components
```

### Pattern 3: Data Display Component
```
Component: <x-dashboard.stat-card />
Props: title, value, color
Slot: icon (optional)
Usage: Shows statistics
```

### Pattern 4: Table Wrapper Component  
```
Component: <x-dashboard.table-card />
Props: title, addButtonRoute, addButtonText
Slot: table HTML
Usage: Wraps table with header
```

---

**Component Architecture Diagram - Version 1.0**  
**Last Updated: 2026-04-09**
