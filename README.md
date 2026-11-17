# Dokumentasi Proyek Laravel 11. || Dashboard_HI

## Deskripsi

Ini adalah repositori test untuk pengujian penambahan fitur sebelum di merge ke main-repo / web-hi-main-hosting-repo
Repositori ini di manage oleh Head of sub divisi web development, divisi Technology, House Ilmu Indonesia
Repositori ini terbuka untuk staff web development


# 📌 Panduan Menjalankan Admin Panel Filament (v3.2) di Lokal  

info: admin panel yang awal tetap bisa di akses saat aplikasi pertama kali di jalankan. jika ingin menjalankan aplikasi dashboard defolt
filamentnya, maka akses url http://127.0.0.1:8000 dan tambahkan /admin dibelanagnya exct: http://127.0.0.1:8000/admin

lakukan penyesuain di tampilan fronendnya di bagian masing-masing seperti yang tela diberikan sebelumnya.  

## 🛠️ **Persyaratan**  
Sebelum menjalankan Filament Admin Panel, pastikan Anda memiliki:  
- PHP 8.1 atau lebih baru  
- Composer  
- Laravel 10 atau lebih baru   
- Database yang sudah dikonfigurasi  

## 🚀 **Langkah-Langkah Menjalankan Admin Panel Filament**  

### 1️⃣ **Clone atau Update Repository local dan Install Dependency**  
```bash
git clone https://github.com/NAMA_REPO.git
cd NAMA_REPO
composer install
npm install && npm run build
```

### 2️⃣ **Konfigurasi `.env`**
Salin file `.env.example` menjadi `.env` jika belum ada:  
```bash
cp .env.example .env
```
Kemudian edit file `.env` untuk menyesuaikan konfigurasi database.

### 3️⃣ **Generate Application Key**
```bash
php artisan key:generate
```

### 4️⃣ **Migrasi Database dan Seeder (Opsional)**
```bash
php artisan migrate --seed
```

### 5️⃣ **Buat Akun Admin**
Filament menggunakan sistem authentication Laravel. Anda bisa membuat admin dengan command:  
```bash
php artisan make:filament-user
```
Masukkan detail admin seperti email, password, dan nama.

### 6️⃣ **Menjalankan Server**
Jalankan Laravel:
```bash
php artisan serve
```
Admin panel Filament dapat diakses melalui:  
```
http://127.0.0.1:8000/admin
```
Login dengan akun admin yang sudah dibuat sebelumnya.

# 

Jika login admin gagal atau kredensial tidak valid coba jalankan
```
php artisan db:seed
```

Jika admin panel mengalami Internal server error pastikan extension `intl` aktif.
Pada linux untuk mengaktikan extension intl yaitu dengan mengedit file pada
```
/etc/php/php.ini
```

cari `;extension=intl` lalu hilangkan `;`
---



## 📚 **Referensi**
- Dokumentasi Filament: [https://filamentphp.com/docs](https://filamentphp.com/docs)  
- Dokumentasi Laravel: [https://laravel.com/docs](https://laravel.com/docs)  


---



## Spesifikasi

-   **Laravel Version**: 11.x
-   **PHP Version**: 8.4.1
-   **Database**: MySQL (mengganti SQLite)

## 1. Instalasi dan Pengaturan Awal

### Persyaratan Sistem

-   PHP 8.4.1 atau lebih baru
-   Composer (untuk mengelola dependensi Laravel)
-   MySQL 5.7 atau lebih baru
-   MySQL Workbench atau phpMyAdmin untuk mengelola database

### Langkah 1: Menginstal Laravel 11

1. Pastikan Anda sudah menginstal Composer. Jika belum, silakan instal dari [sini](https://getcomposer.org/).
2. Setelah itu, jalankan perintah berikut untuk membuat proyek Laravel baru:

    ```bash
    composer create-project --prefer-dist laravel/laravel nama-proyek
    ```

3. Setelah proyek Laravel berhasil diinstal, masuk ke direktori proyek:
    ```bash
    cd nama-proyek
    ```

### Langkah 2: Konfigurasi `.env` untuk Database MySQL

Secara default, Laravel menggunakan SQLite di file `.env`. Anda perlu mengubahnya untuk menggunakan MySQL.

1. Buka file `.env` yang ada di direktori root proyek Laravel Anda.
2. Temukan bagian konfigurasi database dan sesuaikan seperti berikut:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database
    DB_USERNAME=nama_pengguna
    DB_PASSWORD=password_anda
    ```

    Sesuaikan `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` sesuai dengan pengaturan MySQL Anda.

### Langkah 3: Membuat Database di MySQL

1. **Masuk ke MySQL** menggunakan terminal atau phpMyAdmin:

    - Jika menggunakan MySQL Workbench atau phpMyAdmin, buatlah database baru dengan nama yang sesuai dengan `DB_DATABASE` yang Anda masukkan di file `.env`.

2. **Jika menggunakan terminal**, jalankan perintah berikut untuk membuat database baru:

    ```bash
    mysql -u root -p
    CREATE DATABASE nama_database;
    ```

    Pastikan `nama_database` sesuai dengan yang Anda masukkan di file `.env`.

### Langkah 4: Migrasi Database

Setelah mengonfigurasi database, jalankan migrasi untuk membuat tabel-tabel default Laravel:

```bash
php artisan migrate
```

Jika Anda mendapatkan pesan kesalahan terkait koneksi database, pastikan pengaturan di file `.env` sudah benar.

---

## 2. Menjalankan `php artisan serve` dan Menangani Error

### Error Umum: "Unable to locate a class or view for" atau Koneksi Database Gagal

Jika Anda menjalankan `php artisan serve` dan mendapatkan kesalahan terkait koneksi database atau file yang hilang, Anda dapat mencoba beberapa solusi berikut:

### 2.1. Periksa Koneksi Database

Jika Anda menggunakan MySQL dan tidak dapat terkoneksi, periksa file `.env` dan pastikan pengaturan database Anda sudah benar. Pastikan:

-   `DB_HOST=127.0.0.1` (atau host MySQL lainnya).
-   `DB_PORT=3306` (port default untuk MySQL).
-   Nama database, username, dan password yang benar.

Jika Anda masih mengalami masalah, coba restart MySQL dan pastikan layanan MySQL berjalan dengan baik.

### 2.2. Mengatasi Error Saat Menjalankan `php artisan serve`

Jika Anda mendapatkan error yang berkaitan dengan `php artisan serve`, coba langkah-langkah berikut:

1. **Pastikan PHP 8.4.1 terinstal dengan benar**. Cek dengan perintah:

    ```bash
    php -v
    ```

2. **Periksa ekstensi PHP yang diperlukan**. Laravel membutuhkan beberapa ekstensi PHP, seperti `pdo_mysql`. Pastikan ekstensi ini terpasang dan diaktifkan dalam konfigurasi PHP Anda. Jika Anda menggunakan `php.ini`, pastikan baris berikut tidak dikomentari (tanpa tanda `;`):

    ```ini
    extension=pdo_mysql
    ```

3. **Hapus cache konfigurasi dan autoloader**. Jika masalah tetap ada, coba bersihkan cache dan autoloader dengan perintah berikut:

    ```bash
    php artisan config:clear
    php artisan cache:clear
    composer dump-autoload
    ```

4. **Restart layanan PHP** jika Anda menggunakan server lokal seperti XAMPP atau Laragon.

### 2.3. Error Koneksi Database di `php artisan serve`

Jika Anda masih mendapatkan error terkait database saat menjalankan `php artisan serve`, pastikan file `.env` sudah terkonfigurasi dengan benar dan MySQL berjalan dengan lancar. Berikut adalah langkah-langkah tambahan yang bisa dicoba:

-   **Cek Status MySQL**:
    Jika Anda menggunakan XAMPP atau Laragon, pastikan MySQL telah berjalan. Anda bisa memulai ulang MySQL dari dashboard XAMPP/Laragon.
-   **Periksa File `.env`**: Pastikan Anda sudah mengubah database driver dari `sqlite` ke `mysql` di file `.env`:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database
    DB_USERNAME=nama_pengguna
    DB_PASSWORD=password_anda
    ```

### 2.4. Menjalankan `php artisan serve`

Setelah Anda menyelesaikan langkah-langkah di atas, jalankan perintah ini untuk menjalankan aplikasi Laravel Anda:

```bash
php artisan serve
```

Ini akan memulai server development di alamat `http://127.0.0.1:8000`.

---

## 3. Apakah PHP 8.4.1 Mendukung MySQL atau PHPMyAdmin 6.0 ke atas?

Ya, **PHP 8.4.1** mendukung MySQL, dan Anda dapat menggunakan **phpMyAdmin 6.0 ke atas** untuk mengelola database MySQL.

### Pastikan:

-   Anda menggunakan MySQL 5.7 atau lebih baru (dapat menggunakan phpMyAdmin 6.x atau lebih baru untuk memanage database).
-   PHP 8.4.1 sudah terinstal dengan benar dan mendukung ekstensi `pdo_mysql` untuk koneksi ke MySQL.

---

## 4. Kesimpulan

Dengan mengikuti langkah-langkah di atas, Anda dapat berhasil mengonfigurasi Laravel 11 dengan MySQL, mengatasi masalah yang sering terjadi saat menjalankan `php artisan serve`, serta memastikan kompatibilitas dengan PHP 8.4.1 dan phpMyAdmin 6.0 ke atas. Jangan lupa untuk selalu memeriksa file `.env` dan konfigurasi server lokal Anda.
