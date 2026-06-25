# SIAKAD - Sistem Informasi Akademik Sederhana

Aplikasi web berbasis Laravel 12 untuk mensimulasikan Sistem Informasi Akademik (SIAKAD) sederhana. Dibuat sebagai Tugas Besar Mata Kuliah Web II IF53413.

---

## 🚀 Teknologi yang Digunakan

- Laravel 12
- PHP 8.2
- MySQL
- Bootstrap 5
- Bootstrap Icons

---

## 👤 Akun Default

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@siakad.com | admin123 |
| Mahasiswa | andi.pratama@mhs.com | mhs123 |
| Mahasiswa | bela.safitri@mhs.com | mhs123 |
| Mahasiswa | candra.wijaya@mhs.com | mhs123 |

---

## 📋 Fitur Aplikasi

### 🔐 Authentication
- Login & Logout menggunakan Laravel Breeze
- 2 Role: Admin dan Mahasiswa
- Middleware untuk proteksi route berdasarkan role

### 👨‍💼 Admin
- **Dashboard** — Statistik total dosen, mahasiswa, mata kuliah, jadwal, dan KRS
- **Kelola Dosen** — Tambah, edit, hapus, dan lihat data dosen
- **Kelola Mahasiswa** — Tambah, edit, hapus, dan lihat data mahasiswa
- **Kelola Mata Kuliah** — Tambah, edit, hapus, dan lihat data mata kuliah
- **Kelola Jadwal** — Tambah, edit, hapus, dan lihat jadwal perkuliahan (termasuk dosen pengajar, hari, jam, dan kelas)
- **Lihat KRS** — Melihat semua data KRS mahasiswa

### 🎓 Mahasiswa
- **Dashboard** — Informasi mata kuliah yang diambil dan jadwal tersedia
- **Lihat Jadwal** — Melihat semua jadwal perkuliahan
- **KRS** — Mengambil dan drop mata kuliah

---

## 📄 Penjelasan Halaman

| Halaman | URL | Keterangan |
|---------|-----|------------|
| Login | `/login` | Halaman login untuk semua user |
| Dashboard Admin | `/admin/dashboard` | Statistik dan akses cepat admin |
| Data Dosen | `/admin/dosen` | CRUD data dosen |
| Tambah Dosen | `/admin/dosen/create` | Form tambah dosen baru |
| Edit Dosen | `/admin/dosen/{nidn}/edit` | Form edit data dosen |
| Data Mahasiswa | `/admin/mahasiswa` | CRUD data mahasiswa |
| Tambah Mahasiswa | `/admin/mahasiswa/create` | Form tambah mahasiswa baru |
| Edit Mahasiswa | `/admin/mahasiswa/{npm}/edit` | Form edit data mahasiswa |
| Data Mata Kuliah | `/admin/matakuliah` | CRUD data mata kuliah |
| Tambah Mata Kuliah | `/admin/matakuliah/create` | Form tambah mata kuliah baru |
| Edit Mata Kuliah | `/admin/matakuliah/{kode}/edit` | Form edit data mata kuliah |
| Data Jadwal | `/admin/jadwal` | CRUD jadwal perkuliahan |
| Tambah Jadwal | `/admin/jadwal/create` | Form tambah jadwal baru |
| Edit Jadwal | `/admin/jadwal/{id}/edit` | Form edit data jadwal |
| Data KRS (Admin) | `/admin/krs` | Lihat semua KRS mahasiswa |
| Dashboard Mahasiswa | `/mahasiswa/dashboard` | Info KRS dan jadwal mahasiswa |
| Jadwal (Mahasiswa) | `/mahasiswa/jadwal` | Lihat jadwal perkuliahan |
| KRS Saya | `/mahasiswa/krs` | Lihat dan drop mata kuliah |
| Ambil Mata Kuliah | `/mahasiswa/krs/tambah` | Form ambil mata kuliah |

---

## 🗄️ Struktur Database

### Tabel `dosen`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| nidn | char(10) | Primary Key |
| nama | varchar(50) | Nama dosen |

### Tabel `mahasiswa`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| npm | char(10) | Primary Key |
| nama | varchar(50) | Nama mahasiswa |

### Tabel `matakuliah`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| kode_matakuliah | char(8) | Primary Key |
| nama_matakuliah | varchar(50) | Nama mata kuliah |
| sks | int | Jumlah SKS |

### Tabel `jadwal`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | int | Primary Key |
| kode_matakuliah | char(8) | Foreign Key ke matakuliah |
| nidn | char(10) | Foreign Key ke dosen |
| kelas | char(1) | Kelas (A/B/C/D) |
| hari | varchar(10) | Hari kuliah |
| jam | time | Jam kuliah |

### Tabel `krs`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | int | Primary Key |
| npm | char(10) | Foreign Key ke mahasiswa |
| kode_matakuliah | char(8) | Foreign Key ke matakuliah |

---

## ⚙️ Cara Instalasi

1. Clone repository
```bash
git clone https://github.com/username/tubes-siakad-[kelas]-[npm]-[nama].git
cd tubes-siakad-[kelas]-[npm]-[nama]
```

2. Install dependencies
```bash
composer install
npm install
```

3. Copy file environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Setting database di file `.env`