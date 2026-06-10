# Mini Market Management System

Sistem Manajemen Terpadu untuk Bisnis Retail Multi-Cabang dengan fitur pengelolaan transaksi, stok barang, dan laporan terintegrasi.

## 📋 Studi Kasus

Sistem ini dibangun untuk mengatasi permasalahan Pak Jayusman dalam mengelola 5 cabang mini market di berbagai kota. Dengan kurangnya pengawasan terpusat, terkadang ada pegawai yang tidak jujur dengan memanipulasi transaksi dan stok barang.

### Solusi yang Disediakan:
- ✅ Dashboard terpusat untuk monitoring transaksi dan stok real-time
- ✅ Pengelolaan transaksi penjualan dan retur
- ✅ Kontrol stok dengan audit log lengkap
- ✅ Role-based access control (Owner, Manager, Supervisor, Cashier, Warehouse)
- ✅ Laporan transaksi dan stok per periode
- ✅ Pencegahan manipulasi data dengan sistem pencatatan lengkap

## 🏗️ Struktur Sistem

### Users & Roles
- **Owner (Pemilik)**: Akses penuh ke semua cabang, lihat dashboard global dan laporan
- **Manager (Manajer Cabang)**: Kelola cabang tertentu, lihat laporan per cabang
- **Supervisor**: Monitoring harian transaksi dan stok
- **Cashier (Kasir)**: Proses transaksi penjualan/retur
- **Warehouse**: Kelola pergerakan stok barang

### Database Schema
- `users` - Data pengguna dengan role
- `branches` - Daftar cabang mini market
- `products` - Data produk
- `inventory` - Stok barang per cabang
- `transactions` - Transaksi penjualan/retur
- `transaction_details` - Detail item transaksi
- `inventory_logs` - Audit log perubahan stok

## 🚀 Instalasi & Setup

### 1. Clone Repository
```bash
cd c:\laragon\www\Tugas
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Copy Environment File
```bash
copy .env.example .env
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Konfigurasi Database
Edit file `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=minimarket
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Jalankan Migrations
```bash
php artisan migrate
```

### 7. Jalankan Seeder
```bash
php artisan db:seed
```

### 8. Build Tailwind CSS
```bash
npm run build
```

### 9. Jalankan Aplikasi
```bash
php artisan serve
```

Akses di: http://localhost:8000

## 👤 Akun Test

Setelah menjalankan seeder, gunakan akun berikut untuk login:

### Owner (Pemilik)
- Email: `owner@minimarket.local`
- Password: `password`

### Manager - Cabang Jakarta
- Email: `budi.santoso@minimarket.local`
- Password: `password`

### Supervisor - Cabang Jakarta
- Email: `supervisor1@minimarket.local`
- Password: `password`

### Cashier - Cabang Jakarta
- Email: `cashier11@minimarket.local` (Kasir 1)
- Email: `cashier12@minimarket.local` (Kasir 2)
- Email: `cashier13@minimarket.local` (Kasir 3)
- Password: `password`

### Warehouse - Cabang Jakarta
- Email: `warehouse1@minimarket.local`
- Password: `password`

*Pattern yang sama berlaku untuk cabang lain (2, 3, 4, 5)*

## 📱 Fitur-Fitur Utama

### 1. Dashboard
- **Owner**: Ringkasan semua cabang, total transaksi, pendapatan bulan ini
- **Manager**: Transaksi terakhir, produk stok rendah, pendapatan cabang
- **Supervisor**: Transaksi hari ini, monitoring real-time
- **Cashier**: Informasi cabang
- **Warehouse**: Status stok normal dan rendah

### 2. Manajemen Cabang (Owner Only)
- Tambah/Edit/Hapus cabang
- Lihat detail cabang dan pengguna
- Monitor statistik per cabang

### 3. Manajemen Produk (Owner & Manager)
- CRUD produk
- Set harga dan kategori
- Tentukan minimum stok reorder

### 4. Transaksi
- **Cashier**: Membuat transaksi (penjualan/retur)
- Pilih produk, masukkan qty dan harga
- Support multiple payment methods (Cash, Card, Transfer)
- Otomatis update stok dan buat inventory log

### 5. Manajemen Stok
- Lihat stok semua cabang (Owner) atau per cabang (Manager)
- Alert untuk produk stok rendah
- Adjust stok dengan alasan (Receiving, Damage, Expired, dll)
- Lihat log perubahan stok

### 6. Laporan
- Laporan transaksi per periode dengan filter cabang
- Laporan stok barang dengan nilai total
- Download/Print laporan

## 🎨 UI/UX Design

Sistem menggunakan **Tailwind CSS 4.0** dengan desain modern:
- Sidebar navigation responsif
- Dashboard dengan cards dan statistik
- Tables yang mudah dibaca
- Modal untuk form adjust stok
- Print-friendly layouts
- Dark mode ready

## 🔐 Keamanan

- Autentikasi berbasis Laravel Sanctum
- Role-based middleware untuk route protection
- Soft delete untuk audit trail
- Audit log lengkap untuk semua perubahan stok
- Password hashing dengan bcrypt

## 📊 Teknologi Stack

- **Backend**: Laravel 12
- **Frontend**: Blade Templates + Tailwind CSS 4
- **Database**: MySQL
- **Node.js Package Manager**: npm
- **Build Tool**: Vite

## 📝 Tips Penggunaan

1. **Mulai dari Dashboard** untuk melihat overview sistem
2. **Setup Produk terlebih dahulu** sebelum membuat transaksi
3. **Kasir gunakan fitur Transaksi Baru** untuk menjual produk
4. **Manager monitor Stok Rendah** untuk tim warehouse restok
5. **Owner review Laporan** untuk decision making

## 🐛 Troubleshooting

### Port 8000 sudah terpakai?
```bash
php artisan serve --port=8001
```

### Migration error?
```bash
php artisan migrate:refresh
php artisan db:seed
```

### Tailwind tidak ter-compile?
```bash
npm run build
```

atau dalam development:
```bash
npm run dev
```

## 📚 File Penting

- Routes: `routes/web.php`
- Controllers: `app/Http/Controllers/`
- Models: `app/Models/`
- Views: `resources/views/`
- Migrations: `database/migrations/`
- Seeders: `database/seeders/`

## 🤝 Kontribusi

Sistem ini dapat dikembangkan lebih lanjut dengan fitur:
- Multi-bahasa support
- Export ke Excel/PDF lebih detail
- SMS/Email notifications
- Mobile app
- API untuk integrasi pihak ketiga

## 📄 License

Sistem ini dikembangkan untuk studi kasus manajemen retail multi-cabang.

---

**Dibuat dengan ❤️ menggunakan Laravel & Tailwind CSS**
