# 🏪 Sistem Manajemen Mini Market Terpusat

> Solusi Aplikasi Web untuk Manajemen Multi-Cabang Mini Market dengan Sistem Monitoring Transaksi dan Stok Real-Time

![Laravel](https://img.shields.io/badge/Laravel-11-red?logo=laravel)
![MySQL](https://img.shields.io/badge/MySQL-8.0-blue?logo=mysql)
![PHP](https://img.shields.io/badge/PHP-8.2-purple?logo=php)
![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-3-06B6D4?logo=tailwind-css)

---

## 📋 Daftar Isi

- [Latar Belakang Studi Kasus](#latar-belakang-studi-kasus)
- [Solusi yang Ditawarkan](#solusi-yang-ditawarkan)
- [Fitur Utama](#fitur-utama)
- [Teknologi & Stack](#teknologi--stack)
- [Struktur Database](#struktur-database)
- [Peran Pengguna & Permissions](#peran-pengguna--permissions)
- [Instalasi & Setup](#instalasi--setup)
- [Akun Test](#akun-test)
- [Panduan Penggunaan](#panduan-penggunaan)
- [Struktur Proyek](#struktur-proyek)
- [Fitur Detail](#fitur-detail)
- [Tim Pengembang](#tim-pengembang)

---

## 🎯 Latar Belakang Studi Kasus

### Permasalahan
Pak Jayusman memiliki 5 cabang mini market di berbagai kota dengan sistem operasional yang kurang terintegrasi. Masalah utama yang dihadapi:

- ❌ **Kurang Pengawasan Terpusat**: Pak Jayusman harus datang ke setiap cabang untuk melakukan pengecekan transaksi dan stok barang
- ❌ **Manipulasi Data**: Beberapa pegawai tidak jujur dengan memanipulasi data transaksi dan stok barang
- ❌ **Tidak Ada Audit Trail**: Perubahan data tidak tercatat dengan lengkap, sulit untuk melacak siapa yang melakukan apa dan kapan
- ❌ **Laporan Manual**: Laporan transaksi dan stok harus dibuat secara manual, memakan waktu dan rentan kesalahan

### Struktur Organisasi Saat Ini
```
Pak Jayusman (Owner)
    ├── Manajer Cabang
    │   ├── Supervisor
    │   ├── Kasir
    │   └── Pegawai Gudang
    ├── Manajer Cabang
    │   ├── Supervisor
    │   ├── Kasir
    │   └── Pegawai Gudang
    └── ... (5 cabang total)
```

---

## ✨ Solusi yang Ditawarkan

Aplikasi web berbasis **Laravel + MySQL** yang menyediakan:

### Dashboard Terpusat
- 📊 **Monitoring Real-Time**: Lihat data transaksi dan stok semua cabang dalam satu platform
- 📈 **Statistik Komprehensif**: Revenue, jumlah transaksi, status stok per cabang
- 🔍 **Visibility Penuh**: Tracking lengkap setiap aktivitas di setiap cabang

### Pencegahan Manipulasi Data
- 🔐 **Role-Based Access Control**: Setiap pengguna hanya dapat mengakses data sesuai peran mereka
- 📝 **Audit Log Lengkap**: Setiap perubahan data dicatat dengan detail (siapa, kapan, apa, alasan)
- 🔒 **Soft Delete**: Data tidak pernah dihapus, hanya ditandai sebagai terhapus untuk keperluan audit

### Pengelolaan Transaksi
- 💳 **Sistem POS Terintegrasi**: Proses penjualan dan retur barang dengan mudah
- 🧾 **Generate Nomor Transaksi Otomatis**: Format TRX-[timestamp]
- 📋 **Tracking Transaksi**: Terlihat siapa kasir, supervisor, jumlah uang, metode pembayaran, waktu, dsb

### Manajemen Stok
- 📦 **Real-Time Stock Updates**: Stok otomatis berkurang/bertambah saat transaksi
- ⚠️ **Low Stock Alert**: Notifikasi produk dengan stok di bawah minimum
- 📊 **Inventory Log**: Riwayat lengkap setiap perubahan stok (receiving, penjualan, adjustment, damage, expired)
- 🔄 **Reserved Quantity**: Tracking stok yang sudah dipesan tapi belum diambil

### Laporan & Analisis
- 📋 **Laporan Transaksi**: Filter per periode, cabang, status, dan tipe transaksi
- 📋 **Laporan Stok**: Status stok per cabang dengan detail pergerakan
- 🖨️ **Export & Print**: Cetak laporan untuk keperluan presentasi dan arsip
- 📈 **Grafik & Chart**: Visualisasi data untuk analisis bisnis

---

## 🚀 Fitur Utama

| Fitur | Owner | Manager | Supervisor | Kasir | Gudang |
|-------|:-----:|:-------:|:----------:|:-----:|:------:|
| Dashboard Global | ✅ | - | - | - | - |
| Dashboard Cabang | ✅ | ✅ | ✅ | ✅ | ✅ |
| Kelola Cabang | ✅ | - | - | - | - |
| Kelola Produk | ✅ | ✅ | - | - | - |
| Input Transaksi | - | - | - | ✅ | - |
| View Transaksi | ✅ | ✅ | ✅ | ✅ | - |
| Approve Transaksi | ✅ | ✅ | ✅ | - | - |
| Lihat Stok | ✅ | ✅ | ✅ | ✅ | ✅ |
| Adjustment Stok | ✅ | ✅ | - | - | ✅ |
| View Audit Log | ✅ | ✅ | ✅ | - | ✅ |
| Laporan Transaksi | ✅ | ✅ | ✅ | - | - |
| Laporan Stok | ✅ | ✅ | ✅ | - | ✅ |

---

## 🛠️ Teknologi & Stack

### Backend
- **Laravel 11** - Framework PHP modern
- **PHP 8.2+** - PHP runtime
- **MySQL 8.0+** - Database

### Frontend
- **Blade Templates** - Laravel templating engine
- **Tailwind CSS 3** - CSS framework
- **Alpine.js** - Reactive components
- **Chart.js** - Data visualization

### Development Tools
- **Composer** - PHP package manager
- **npm/Vite** - Asset pipeline dan build tool
- **Laravel Sail** - Docker development environment (optional)

---

## 🗄️ Struktur Database

### Tabel Utama

#### `users`
Menyimpan data pengguna dengan peran berbeda
```
- id, name, email, password, phone
- role (owner, manager, supervisor, cashier, warehouse)
- branch_id (referensi ke cabang)
- soft delete (deleted_at)
```

#### `branches`
Data cabang mini market
```
- id, name, city, address, phone
- manager_name (referensi manajer)
- timestamps (created_at, updated_at)
- soft delete (deleted_at)
```

#### `products`
Katalog produk
```
- id, sku, name, description
- price (decimal:2)
- category, unit
- reorder_point (minimum stok)
- soft delete
```

#### `inventory`
Stok barang per cabang
```
- id, branch_id, product_id
- quantity (jumlah stok)
- reserved_quantity (stok yang dipesan)
- timestamps
- soft delete
```

#### `inventory_logs`
**Audit Trail untuk Stok** - Mencatat setiap perubahan stok
```
- id, branch_id, product_id, user_id
- type (in/out)
- reason (receiving, adjustment, damage, expired)
- quantity (jumlah perubahan)
- transaction_id (referensi transaksi jika ada)
- notes
- timestamps
```

#### `transactions`
Data transaksi penjualan/retur
```
- id, transaction_number (TRX-[timestamp])
- branch_id, cashier_id, supervisor_id
- type (sale/return)
- total_amount, paid_amount, change_amount (decimal:2)
- payment_method (cash, card, transfer)
- status (pending, completed, cancelled)
- completed_at, timestamps
- soft delete
```

#### `transaction_details`
Detail item per transaksi
```
- id, transaction_id, product_id
- quantity, price, subtotal
- timestamps
- soft delete
```

---

## 👥 Peran Pengguna & Permissions

### 1️⃣ **Owner (Pemilik)** - Pak Jayusman
**Akses**: Global ke semua cabang
- Melihat dashboard global dengan KPI semua cabang
- Kelola cabang (tambah, edit, lihat)
- Kelola produk global
- Melihat semua transaksi di semua cabang
- Melihat semua stok di semua cabang
- Akses penuh ke audit logs
- Generate laporan komprehensif
- **Tujuan**: Monitoring dan oversight bisnis secara keseluruhan

### 2️⃣ **Manager (Manajer Cabang)**
**Akses**: Terbatas ke cabang mereka
- Dashboard cabang khusus mereka
- Lihat & kelola produk untuk cabang mereka
- Lihat semua transaksi di cabang
- Approve/reject transaksi (untuk oversight)
- Lihat dan adjust stok
- Akses audit log cabang
- Generate laporan cabang
- **Tujuan**: Manajemen operasional cabang

### 3️⃣ **Supervisor (Pengawas)**
**Akses**: Terbatas ke cabang
- Dashboard monitoring harian
- Lihat transaksi real-time
- Monitor stok barang
- Lihat audit log
- Approve transaksi kasir
- **Tujuan**: Pengawasan harian transaksi dan stok

### 4️⃣ **Cashier (Kasir)**
**Akses**: Fungsional untuk input transaksi
- Input transaksi penjualan/retur
- Lihat produk dan harga
- Lihat dashboard personal
- **Tujuan**: Proses transaksi penjualan

### 5️⃣ **Warehouse (Pegawai Gudang)**
**Akses**: Fungsional untuk manajemen stok
- Lihat stok barang
- Adjustment stok (receiving, damage, expired)
- Lihat audit log stok
- Lihat dashboard personal
- **Tujuan**: Kelola pergerakan barang masuk/keluar

---

## 📦 Instalasi & Setup

### Prasyarat
- PHP 8.2 atau lebih tinggi
- MySQL 8.0 atau lebih tinggi
- Composer
- Node.js & npm
- Git (opsional)

### Langkah Instalasi

#### 1. Clone/Download Repository
```bash
cd d:\Smstr\ 6\PWL\Kelas
```

#### 2. Masuk ke Direktori Proyek
```bash
cd PWL-KELOMPOK-5
```

#### 3. Install PHP Dependencies
```bash
composer install
```

#### 4. Install JavaScript Dependencies
```bash
npm install
```

#### 5. Copy Environment File
```bash
copy .env.example .env
```

#### 6. Generate Application Key
```bash
php artisan key:generate
```

#### 7. Konfigurasi Database di `.env`
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=minimarket
DB_USERNAME=root
DB_PASSWORD=
```

#### 8. Jalankan Database Migrations
```bash
php artisan migrate
```

#### 9. Jalankan Database Seeder (untuk data dummy)
```bash
php artisan db:seed
```

#### 10. Build Frontend Assets
```bash
npm run build
```

Untuk development mode:
```bash
npm run dev
```

#### 11. Jalankan Development Server
```bash
php artisan serve
```

Server akan berjalan di: `http://localhost:8000`

---

## 🔑 Akun Test

Setelah seeder berhasil, gunakan akun berikut untuk testing:

### 👑 Owner (Pemilik - Pak Jayusman)
```
Email: owner@minimarket.local
Password: password
```
**Akses**: Dashboard global, kelola semua cabang, lihat laporan komprehensif

### 🏢 Manager - Cabang Jakarta
```
Email: budi.santoso@minimarket.local
Password: password
Role: Manager
Branch: Jakarta
```

### 🏢 Manager - Cabang Bandung
```
Email: siti.rahayu@minimarket.local
Password: password
Role: Manager
Branch: Bandung
```

### 👔 Supervisor - Jakarta
```
Email: rudi.hartono@minimarket.local
Password: password
Role: Supervisor
Branch: Jakarta
```

### 💳 Cashier - Jakarta
```
Email: tita.kumala@minimarket.local
Password: password
Role: Cashier
Branch: Jakarta
```

### 📦 Warehouse - Jakarta
```
Email: hendra.wijaya@minimarket.local
Password: password
Role: Warehouse
Branch: Jakarta
```

---

## 📖 Panduan Penggunaan

### A. Untuk Owner (Pak Jayusman)

#### Dashboard Global
1. Login dengan akun owner
2. Lihat overview semua cabang
3. Monitor total revenue bulan ini
4. Lihat cabang dengan performa terbaik

#### Kelola Cabang
- **Add Branch**: Klik "Tambah Cabang" → isi data cabang → assign manager
- **Edit Branch**: Klik edit → ubah informasi
- **View Details**: Klik nama cabang untuk lihat detail

#### Kelola Produk
- **Add Product**: Klik "Tambah Produk" → isi sku, nama, harga, kategori
- **Set Reorder Point**: Atur minimum stok untuk trigger alarm
- **View Inventory**: Lihat stok di semua cabang

#### Laporan
1. Klik menu "Laporan Transaksi"
2. Filter: Cabang, tanggal awal-akhir, status, tipe
3. Lihat tabel hasil
4. Klik "Cetak" untuk print atau "Export" untuk Excel

### B. Untuk Manager Cabang

#### Dashboard Cabang
1. Lihat ringkasan transaksi bulan ini
2. Monitor revenue cabang
3. Alert: Produk dengan stok rendah
4. Recent transactions list

#### Manajemen Stok
1. Klik "Inventory" → lihat stok semua produk
2. Untuk perubahan stok:
   - Klik product → "Adjustment"
   - Pilih reason: receiving, adjustment, damage, expired
   - Input jumlah baru
   - Sistem otomatis mencatat di audit log

#### Laporan Cabang
1. Klik "Laporan"
2. Data otomatis filter untuk cabang Anda saja
3. Bisa cetak untuk presentasi ke owner

### C. Untuk Supervisor

#### Monitor Transaksi Real-Time
1. Klik "Transaksi"
2. Lihat semua transaksi hari ini
3. Klik detail untuk lihat breakdown item

#### Approve Transaksi
1. Transaksi pending terlihat dengan badge khusus
2. Review detail transaksi
3. Klik "Approve" atau "Reject"
4. Catatan audit otomatis tersimpan

### D. Untuk Kasir

#### Input Transaksi
1. Klik "Transaksi Baru"
2. Pilih tipe: Penjualan atau Retur
3. Pilih cabang
4. Tambah item:
   - Pilih produk dari dropdown
   - Input jumlah & harga
   - Klik "Add Item"
5. Input jumlah uang diterima
6. Klik "Process Transaction"
7. Sistem otomatis update stok dan buat audit log

### E. Untuk Warehouse

#### Manajemen Stok
1. Klik "Inventory"
2. Lihat stok barang
3. Saat barang masuk/rusak/expired:
   - Klik product → "Adjustment"
   - Pilih reason (receiving, damage, expired)
   - Input jumlah baru
   - Tambah notes (nomor PO, alasan, dsb)

#### Audit Log
1. Klik "Inventory Logs"
2. Lihat setiap perubahan stok
3. Track siapa, kapan, jumlah, dan alasan

---

## 🏗️ Struktur Proyek

```
PWL-KELOMPOK-5/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── DashboardController.php      # Logic dashboard per role
│   │   │   ├── BranchController.php          # Kelola cabang
│   │   │   ├── ProductController.php         # Kelola produk
│   │   │   ├── InventoryController.php       # Kelola stok & audit log
│   │   │   ├── TransactionController.php     # Proses transaksi
│   │   │   └── Controller.php
│   │   └── Middleware/
│   ├── Models/
│   │   ├── User.php                         # Model pengguna
│   │   ├── Branch.php                       # Model cabang
│   │   ├── Product.php                      # Model produk
│   │   ├── Inventory.php                    # Model stok
│   │   ├── InventoryLog.php                 # Audit log stok
│   │   ├── Transaction.php                  # Model transaksi
│   │   └── TransactionDetail.php            # Detail item transaksi
│   └── Providers/
│
├── database/
│   ├── migrations/
│   │   ├── create_users_table.php
│   │   ├── create_branches_table.php
│   │   ├── create_products_table.php
│   │   ├── create_inventory_table.php
│   │   ├── create_transactions_table.php
│   │   ├── create_transaction_details_table.php
│   │   ├── create_inventory_logs_table.php
│   │   └── modify_users_table_for_minimarket.php
│   ├── seeders/
│   │   └── DatabaseSeeder.php               # Dummy data
│   └── factories/
│       └── UserFactory.php
│
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   ├── app.blade.php                # Layout utama
│   │   │   └── guest.blade.php              # Layout guest
│   │   ├── auth/
│   │   │   ├── login.blade.php
│   │   │   └── register.blade.php
│   │   ├── dashboard/
│   │   │   ├── owner.blade.php              # Dashboard owner
│   │   │   ├── manager.blade.php            # Dashboard manager
│   │   │   └── staff.blade.php              # Dashboard staff
│   │   ├── branches/
│   │   │   ├── index.blade.php
│   │   │   ├── create.blade.php
│   │   │   └── show.blade.php
│   │   ├── products/
│   │   │   ├── index.blade.php
│   │   │   └── create.blade.php
│   │   ├── inventory/
│   │   │   ├── index.blade.php
│   │   │   ├── logs.blade.php               # Audit log
│   │   │   └── report.blade.php
│   │   ├── transactions/
│   │   │   ├── index.blade.php
│   │   │   ├── create.blade.php
│   │   │   └── show.blade.php
│   │   └── welcome.blade.php
│   ├── css/
│   │   └── app.css
│   └── js/
│       ├── app.js
│       └── bootstrap.js
│
├── routes/
│   ├── web.php                              # Route definisi
│   └── console.php
│
├── config/
│   ├── app.php                              # Config aplikasi
│   ├── database.php
│   ├── auth.php
│   └── ... (konfigurasi lainnya)
│
├── public/
│   └── index.php                            # Entry point
│
├── .env                                     # Environment variables
├── .env.example
├── composer.json
├── package.json
├── vite.config.js
├── phpunit.xml
├── artisan                                  # CLI tool
└── README.md                                # File ini
```

---

## 🎯 Fitur Detail

### 1. Dashboard Adaptif Berdasarkan Role

**Owner Dashboard:**
- Total revenue semua cabang (periode bulan)
- Jumlah cabang aktif
- Top performing branches
- Recent transactions chart
- Branch performance table

**Manager Dashboard:**
- Revenue cabang spesifik
- Recent transactions di cabang
- Low stock alerts
- Supervisor & staff stats
- Monthly trend chart

**Supervisor Dashboard:**
- Real-time transaction monitor
- Cash flow tracking
- Transaction approval queue
- Performance metrics

**Cashier Dashboard:**
- Today's transactions
- Personal performance
- Quick transaction entry link

**Warehouse Dashboard:**
- Inventory overview
- Stock movements
- Alert untuk low stock
- Recent adjustments

### 2. Sistem Transaksi Lengkap

**Fitur Transaksi:**
- ✅ Auto generate nomor transaksi (TRX-YYYYMMDDHHmmss)
- ✅ Tipe transaksi: Penjualan & Retur
- ✅ Metode pembayaran: Cash, Card, Transfer
- ✅ Tracking: Siapa kasir, supervisor, waktu, lokasi
- ✅ Auto calculate change
- ✅ Multiple items per transaksi
- ✅ Notes & remarks
- ✅ Status: Pending, Completed, Cancelled

**Pencegahan Fraud:**
- Setiap transaksi dicatat dengan timestamp detail
- Kasir yang input tercatat
- Supervisor approval diperlukan
- Tidak bisa edit transaksi yang sudah completed
- All history tercatat di inventory log

### 3. Inventory Management dengan Audit Trail

**Fitur Stok:**
- ✅ Real-time inventory updates
- ✅ Reserved quantity tracking (pre-order)
- ✅ Low stock alerts (customizable reorder point)
- ✅ Multi-reason adjustments:
  - Receiving (barang masuk)
  - Adjustment (koreksi stok)
  - Damage (barang rusak)
  - Expired (barang expired)

**Audit Log Lengkap:**
Setiap perubahan stok tercatat dengan:
- Siapa yang melakukan (user_id)
- Kapan (timestamp)
- Tipe perubahan (in/out)
- Alasan (reason)
- Jumlah
- Catatan tambahan
- Link ke transaksi (jika ada)

### 4. Role-Based Access Control (RBAC)

Sistem permission yang ketat:
- Owner: Akses penuh semua cabang
- Manager: Akses cabang spesifik saja
- Supervisor: View & approve di cabang
- Cashier: Hanya input transaksi
- Warehouse: Hanya stok management

Middleware custom meng-enforce permissions di setiap route.

### 5. Laporan & Export

**Tipe Laporan:**
- 📋 Laporan Transaksi (filter: cabang, tanggal, status, tipe)
- 📋 Laporan Stok (status inventory per cabang)
- 📋 Audit Log (riwayat perubahan stok)

**Format Output:**
- View di web
- Print ke PDF
- Export ke Excel (opsional)

**Filter Tersedia:**
- Range tanggal
- Cabang tertentu
- Status transaksi
- Tipe transaksi
- User/operator

### 6. Data Integrity & Soft Delete

- ❌ Tidak ada permanent delete untuk data transaksi & stok
- 🔒 Soft delete menjaga audit trail intact
- 📝 Restore data jika diperlukan (admin only)
- 🔐 Backup database recommendation

---

## 🔐 Keamanan

### Implementasi Keamanan:

1. **Authentication**
   - Laravel default auth dengan bcrypt password hashing
   - Session management
   - CSRF token protection

2. **Authorization**
   - Role-based middleware
   - Policy-based permissions
   - Branch-scoped access control

3. **Data Protection**
   - Soft deletes untuk audit trail
   - Inventory logs untuk tracking perubahan
   - Transaction history tidak bisa diubah

4. **SQL Injection Prevention**
   - Eloquent ORM (parameterized queries)
   - Input validation di semua controller

5. **XSS Prevention**
   - Blade template auto-escaping
   - Sanitized user input

---

## 🚦 Workflow Transaksi Lengkap

### Transaksi Penjualan Harian:

```
1. KASIR INPUT TRANSAKSI
   ├─ Buka POS (transactions/create)
   ├─ Scan/Pilih produk
   ├─ Qty & harga
   ├─ Input jumlah uang diterima
   └─ Klik "Process"
          │
2. SISTEM PROSES
   ├─ Validate stok cukup?
   ├─ Generate nomor transaksi
   ├─ Create transaction record
   ├─ Create transaction_details
   ├─ Update inventory (quantity --)
   ├─ Create inventory_log (penjualan)
   └─ Return receipt
          │
3. SUPERVISOR REVIEW
   ├─ Lihat transaksi pending
   ├─ Review jumlah & items
   ├─ Approve atau reject
   └─ Audit log auto created
          │
4. OWNER/MANAGER VIEW
   ├─ Laporan transaksi
   ├─ Analisis trend
   └─ Detect anomali
```

### Adjustment Stok:

```
WAREHOUSE/MANAGER → ADJUST STOK
   ├─ Select produk
   ├─ Input quantity baru
   ├─ Pilih reason (receiving/damage/expired)
   ├─ Tambah notes
   └─ Klik "Save"
          │
SISTEM PROSES
   ├─ Calculate difference (new - old)
   ├─ Update inventory.quantity
   ├─ Create inventory_log
   │  └─ type: in (jika +) / out (jika -)
   │  └─ reason: [pilihan user]
   │  └─ quantity: absolute difference
   ├─ Audit trail tercatat
   └─ Alert jika low stock
```

---

## 📊 Database Relations

```
User
├── has_many: Transactions (sebagai cashier)
├── has_many: Transactions (sebagai supervisor)
├── has_many: InventoryLogs
└── belongs_to: Branch

Branch
├── has_many: Users
├── has_many: Products (via inventory)
├── has_many: Transactions
├── has_many: Inventory
└── has_many: InventoryLogs

Product
├── has_many: Inventory
├── has_many: TransactionDetails
└── has_many: InventoryLogs

Inventory
├── belongs_to: Branch
├── belongs_to: Product
└── has_many: InventoryLogs

Transaction
├── belongs_to: Branch
├── belongs_to: User (cashier)
├── belongs_to: User (supervisor)
└── has_many: TransactionDetails

TransactionDetail
├── belongs_to: Transaction
└── belongs_to: Product

InventoryLog
├── belongs_to: Branch
├── belongs_to: Product
├── belongs_to: User
└── belongs_to: Transaction
```

---

## 🎓 Learning Points - Teknik yang Diimplementasikan

### Backend (Laravel)
- ✅ **Model Relationships** (hasMany, belongsTo, polymorphic)
- ✅ **Database Migrations & Seeding**
- ✅ **Middleware** (authentication, authorization, role-checking)
- ✅ **Eloquent ORM** dengan eager loading
- ✅ **Validation** (form validation dengan rules)
- ✅ **Resource Controllers** (RESTful)
- ✅ **Soft Deletes** untuk audit trail
- ✅ **Scoping** untuk branch-based access

### Frontend (Blade)
- ✅ **Blade Templating** (loops, conditionals, includes)
- ✅ **Component Reusability**
- ✅ **Form Handling** (CSRF token, validation display)
- ✅ **Responsive Design** (Tailwind CSS)

### Database Design
- ✅ **Normalization** (3NF)
- ✅ **Foreign Keys** & relationships
- ✅ **Indexes** untuk performance
- ✅ **Audit Logging** patterns

### Security
- ✅ **Authentication & Authorization**
- ✅ **RBAC** (Role-Based Access Control)
- ✅ **CSRF Protection**
- ✅ **SQL Injection Prevention**
- ✅ **Password Hashing** (bcrypt)

---

## 📝 Catatan Implementasi

### Fitur yang Diimplementasikan:
- ✅ Multi-branch management
- ✅ Role-based dashboard
- ✅ Transaction management dengan approval flow
- ✅ Inventory tracking dengan audit log
- ✅ Real-time stock updates
- ✅ Low stock alerts
- ✅ Complete audit trail
- ✅ Report generation (transaksi & stok)

### Fitur Optional yang Bisa Ditambahkan di Masa Depan:
- 📱 Mobile app (Flutter/React Native)
- 📊 Advanced analytics dashboard
- 🔔 Email/SMS notifications
- 💾 Automatic backup
- 🌐 Multi-warehouse support
- 💰 Multi-currency support
- 🛍️ Supplier management
- 📈 Forecasting & demand planning
- 🔌 API untuk integrasi POS hardware
- 📲 WhatsApp integration untuk alerts

---

## 🐛 Troubleshooting

### Database Connection Error
```bash
# Check .env file
# Pastikan DB_HOST, DB_DATABASE, DB_USERNAME benar

# Re-run migrations
php artisan migrate:fresh --seed
```

### Permission Denied Error
```bash
# Fix folder permissions
chmod -R 755 storage bootstrap
chmod -R 644 storage/* bootstrap/*
```

### Missing CSS/JS
```bash
# Rebuild assets
npm run build

# Clear cache
php artisan cache:clear
```

### Login Error
```bash
# Re-run seeder untuk data dummy
php artisan db:seed

# Pastikan password: password (default)
```

---

## 📚 Dokumentasi Tambahan

- [Laravel Documentation](https://laravel.com/docs)
- [Tailwind CSS](https://tailwindcss.com/docs)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [PHP Documentation](https://www.php.net/manual/en/)

---

## 👥 Tim Pengembang

Dikembangkan sebagai solusi studi kasus mini market untuk mata kuliah PWL (Pemrograman Web Lanjut).

**Anggota Kelompok:**
- I Gusti Adnan Sanubi - [Pemilik Repositori]
- Fauzi Afrizal - [Contributor]
- Mita Atsil - [Contributor]

**Dosen Pembimbing:**
- [Nama Dosen]

---

## 📄 Lisensi

Proyek ini dibuat untuk keperluan pendidikan dan pengajaran.

---

## 🤝 Support & Feedback

Untuk pertanyaan, masukan, atau laporan bug, silakan hubungi tim pengembang atau dosen pembimbing.

---

<div align="center">

**Terima kasih telah menggunakan Sistem Manajemen Mini Market Terpusat** 🙏

Dibuat dengan ❤️ oleh Kelompok 5 PWL

</div>
