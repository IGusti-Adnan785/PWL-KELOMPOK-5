# Component-Based View Structure Documentation

Dokumentasi lengkap struktur komponen yang telah dibuat untuk project Mini Market Management.

## 📁 Struktur Folder Components

```
resources/views/components/
├── layout/              # Komponen layout utama
├── navigation/          # Komponen navigasi
├── dashboard/           # Komponen khusus dashboard
└── common/             # Komponen umum yang reusable
```

## 🎨 Komponen Layout (`components/layout/`)

### 1. **sidebar.blade.php** - Sidebar Navigation
Komponen sidebar yang menampilkan logo, navigasi menu, dan user section.
```blade
<x-layout.sidebar />
```
**Fitur:**
- Logo Mini Market
- Menu navigasi dinamis berdasarkan role
- User section dengan logout button
- Design responsif

### 2. **header.blade.php** - Page Header
Komponen header yang menampilkan judul halaman dan informasi cabang.
```blade
<x-layout.header :title="'Dashboard'" />
```
**Props:**
- `title` - Judul halaman (default: 'Dashboard')

### 3. **user-section.blade.php** - User Profile
Komponen profil user di bagian bawah sidebar.
```blade
<x-layout.user-section />
```

## 🧭 Komponen Navigation (`components/navigation/`)

### 1. **menu-items.blade.php** - Dynamic Menu Items
Menampilkan menu berdasarkan role user (Owner/Manager/Cashier/Supervisor/Warehouse).
```blade
<x-navigation.menu-items />
```

### 2. **menu-item.blade.php** - Single Menu Item
Komponen single menu item dengan active state.
```blade
<x-navigation.menu-item 
    route="dashboard" 
    label="Dashboard"
    routePrefix="optional_prefix"
>
    <svg><!-- Icon --></svg>
</x-navigation.menu-item>
```
**Props:**
- `route` - Route name
- `label` - Teks menu
- `routePrefix` - Prefix untuk cek active state (opsional)

## 📊 Komponen Dashboard (`components/dashboard/`)

### 1. **stat-card.blade.php** - Statistics Card
Menampilkan statistik dengan warna yang berbeda.
```blade
<x-dashboard.stat-card 
    title="Total Transaksi"
    value="150"
    color="blue"
/>
```
**Props:**
- `title` - Judul statistik
- `value` - Nilai yang ditampilkan
- `color` - Warna (blue, green, red, yellow, purple)
- `icon` - Icon opsional (slot)

### 2. **stats-grid.blade.php** - Statistics Grid Container
Container untuk menampilkan multiple stat cards.
```blade
<x-dashboard.stats-grid :cols="3">
    <x-dashboard.stat-card ... />
    <x-dashboard.stat-card ... />
</x-dashboard.stats-grid>
```
**Props:**
- `cols` - Jumlah kolom (2 atau 3, default: 3)

### 3. **table-card.blade.php** - Table Container
Container untuk menampilkan tabel dengan judul dan tombol aksi.
```blade
<x-dashboard.table-card 
    title="Daftar Transaksi"
    addButtonText="Tambah"
    addButtonRoute="transactions.create"
>
    <table>...</table>
</x-dashboard.table-card>
```
**Props:**
- `title` - Judul tabel
- `addButtonText` - Teks tombol tambah
- `addButtonRoute` - Route untuk tombol tambah

### 4. **welcome-card.blade.php** - Welcome Card
Kartu selamat datang untuk dashboard cashier.
```blade
<x-dashboard.welcome-card :branch="$branch" />
```

### 5. **branch-info-card.blade.php** - Branch Information
Menampilkan informasi cabang.
```blade
<x-dashboard.branch-info-card :branch="$branch" />
```

## 🛠️ Komponen Common (`components/common/`)

### 1. **alert.blade.php** - Alert Messages
Komponen untuk menampilkan pesan alert (success, error, warning, info).
```blade
<x-common.alert type="success" dismissible="true">
    Operasi berhasil dilakukan!
</x-common.alert>
```
**Props:**
- `type` - Tipe alert (success, error, warning, info)
- `dismissible` - Bisa ditutup manual (default: true)

### 2. **card.blade.php** - Generic Card
Kartu generic untuk konten apapun.
```blade
<x-common.card title="Judul Kartu" padding="p-6">
    <!-- Konten -->
</x-common.card>
```
**Props:**
- `title` - Judul kartu (opsional)
- `padding` - Padding CSS (default: 'p-6')

## 📄 Contoh Penggunaan lengkap

### Layout Utama (app.blade.php)
```blade
<!DOCTYPE html>
<html>
<head>...</head>
<body>
    @auth
        <x-layout.sidebar />
        <x-layout.header :title="$__env->yieldContent('header', 'Dashboard')" />
        
        @if ($errors->any())
            <x-common.alert type="error">
                <!-- Errors -->
            </x-common.alert>
        @endif
        
        @if(session('success'))
            <x-common.alert type="success">
                {{ session('success') }}
            </x-common.alert>
        @endif
        
        @yield('content')
    @endauth
</body>
</html>
```

### Dashboard View (dashboard/cashier.blade.php)
```blade
@extends('layouts.app')

@section('title', 'Dashboard Kasir')
@section('header', 'Dashboard Kasir - ' . $branch->name)

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-dashboard.welcome-card :branch="$branch" />
        <x-dashboard.branch-info-card :branch="$branch" />
    </div>
@endsection
```

## ✅ Keuntungan Struktur Component-Based

1. **Reusability** - Komponen dapat digunakan kembali di berbagai halaman
2. **Maintainability** - Mudah untuk mengubah dan memperbarui komponen
3. **Consistency** - Interface yang konsisten di seluruh aplikasi
4. **Scalability** - Mudah menambah komponen baru
5. **Testability** - Komponen dapat ditest secara terpisah
6. **Code Organization** - Kode lebih terorganisir dan mudah dipahami

## 🎯 Komponen Yang Bisa Dikembangkan Lebih Lanjut

1. **Form Components** - Untuk input fields, select, checkbox, dll
2. **Modal Components** - Untuk dialog/modal
3. **Pagination Component** - Untuk pagination
4. **Badge Component** - Untuk label/badge status
5. **Button Component** - Untuk button yang konsisten
6. **Input Component** - Untuk form input wrapper
7. **Breadcrumb Component** - Untuk navigasi breadcrumb
8. **Notification Component** - Untuk toast notifications

## 📌 Tips Penggunaan

- Selalu gunakan component untuk elemen yang berulang
- Buat component reusable dengan props yang flexible
- Gunakan slot untuk konten dinamis
- Dokumentasikan setiap component dengan props yang tersedia
- Test component di berbagai kondisi sebelum production

## 🔄 Migrasi Views yang Ada

Semua dashboard views telah dimigrasi:
- ✅ dashboard/cashier.blade.php
- ✅ dashboard/manager.blade.php
- ✅ dashboard/owner.blade.php
- ✅ dashboard/supervisor.blade.php
- ✅ dashboard/warehouse.blade.php

Anda dapat melanjutkan membuat component untuk views lainnya seperti:
- Branches (create, edit, index, show)
- Products (create, edit, index, show)
- Transactions (create, edit, index, show)
- Inventory (branch, index, logs, report)
