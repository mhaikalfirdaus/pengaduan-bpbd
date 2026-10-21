<h1 align="center">📢 Pengaduan Masyarakat</h1>

<p align="center">
  Aplikasi web untuk menyampaikan, memproses, dan menanggapi pengaduan masyarakat.
  <br>
  <img src="https://img.shields.io/badge/Laravel-8-FF2D20?logo=laravel&logoColor=white" alt="Laravel 8">
  <img src="https://img.shields.io/badge/PHP-7.3%20%7C%208.x-777BB4?logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-8-4479A1?logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Bootstrap-4-7952B3?logo=bootstrap&logoColor=white" alt="Bootstrap">
  <img src="https://img.shields.io/badge/license-MIT-green" alt="MIT">
</p>

---

## 📖 Tentang Aplikasi

**Pengaduan Masyarakat** memudahkan warga melaporkan keluhan (misalnya jalan rusak) lengkap dengan foto pendukung, lalu petugas menindaklanjuti dan memberi tanggapan. Status laporan dapat dipantau dari awal sampai selesai.

## ✨ Fitur

**Masyarakat**
- Registrasi dan login (menggunakan NIK)
- Membuat pengaduan dengan judul, isi laporan, dan foto (maks. 2 MB)
- Melihat daftar dan detail pengaduan beserta tanggapan

**Petugas**
- Login khusus petugas
- Melihat pengaduan dan memberi tanggapan
- Status pengaduan otomatis berubah: `0` (baru) → `proses` → `selesai`
- Melihat dan mencetak laporan tanggapan

**Admin**
- Seluruh fitur petugas
- Mengelola data petugas (tambah, lihat, ubah, hapus)

## 🛠️ Teknologi

| Komponen | Keterangan |
| --- | --- |
| Framework | Laravel 8 |
| Bahasa | PHP 7.3+ / 8.x |
| Database | MySQL / MariaDB |
| Tampilan | Blade + Bootstrap |

## 📋 Prasyarat

- PHP 7.3 atau lebih baru
- [Composer](https://getcomposer.org/)
- MySQL / MariaDB (bisa lewat XAMPP, Laragon, dll.)
- Git

## 🚀 Instalasi

```bash
# 1. Clone repository
git clone https://github.com/mhaikalfirdaus/pengaduan-bpbd.git
cd pengaduan-bpbd

# 2. Install dependensi
composer install

# 3. Salin file environment lalu generate key
cp .env.example .env
php artisan key:generate
```

**4. Atur database** di file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pengaduan
DB_USERNAME=root
DB_PASSWORD=
```

Buat database kosong bernama `pengaduan`, lalu pilih salah satu cara berikut:

**Opsi A — Migrasi + seeder**

```bash
php artisan migrate --seed
```

> Seeder bawaan hanya membuat akun masyarakat. Untuk membuat akun petugas dan admin, aktifkan baris `PetugasSeeder` di `database/seeders/DatabaseSeeder.php` atau jalankan `php artisan db:seed --class=PetugasSeeder`.

**Opsi B — Import SQL**

Import file `database/pengaduan.sql` lewat phpMyAdmin atau perintah:

```bash
mysql -u root -p pengaduan < database/pengaduan.sql
```

**5. Jalankan aplikasi**

```bash
php artisan serve
```

Buka <http://127.0.0.1:8000>.

## 🔑 Akun Contoh

| Peran | Username | Password | URL Login |
| --- | --- | --- | --- |
| Masyarakat | `masyarakat1` | `masyarakat1` | `/masyarakat/login` |
| Petugas | `petugas1` | `petugas1` | `/petugas/login` |
| Admin | `admin` | `admin` | `/petugas/login` |

> ⚠️ Akun di atas hanya untuk pengembangan. **Ganti semua password** sebelum aplikasi dipakai di server sungguhan.

## 🗺️ Rute Utama

| URL | Fungsi |
| --- | --- |
| `/` | Halaman beranda |
| `/masyarakat/login`, `/masyarakat/register` | Login & registrasi masyarakat |
| `/petugas/login` | Login petugas / admin |
| `/pengaduan` | Daftar pengaduan |
| `/pengaduan/create` | Buat pengaduan (login masyarakat) |
| `/tanggapan/{id}` | Beri tanggapan (login petugas) |
| `/petugas` | Kelola petugas (admin) |
| `/report` | Laporan tanggapan |

## 📁 Struktur Folder

```
pengaduan-bpbd/
├── app/
│   ├── Http/Controllers/   # Auth, Pengaduan, Tanggapan, User, Report
│   ├── Http/Middleware/    # PetugasRoleMiddleware
│   └── Models/             # Masyarakat, Petugas, Pengaduan, Tanggapan
├── database/
│   ├── migrations/         # Skema tabel
│   └── seeders/            # Data awal
├── public/uploads/         # Foto pendukung pengaduan
├── resources/views/        # Tampilan Blade
├── routes/web.php          # Definisi rute
└── .env.example            # Contoh konfigurasi
```

## 🗃️ Struktur Database

- `masyarakat` — data warga (NIK, username, nama, no. telp)
- `petugas` — data petugas dengan `level` `admin` / `petugas`
- `pengaduan` — laporan warga beserta foto dan status
- `tanggapan` — balasan petugas untuk setiap pengaduan

## 🤝 Kontribusi

1. Fork repository ini
2. Buat branch fitur: `git checkout -b fitur-baru`
3. Commit perubahan: `git commit -m "Tambah fitur baru"`
4. Push ke branch: `git push origin fitur-baru`
5. Buat Pull Request
