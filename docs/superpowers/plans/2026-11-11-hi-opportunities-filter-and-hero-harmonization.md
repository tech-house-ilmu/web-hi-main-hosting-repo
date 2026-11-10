# Rencana Implementasi: Perbaikan Filter HI Opportunities & Harmonisasi Hero Section

> **Untuk Pekerja Agentik:** SUB-SKILL TERKAIT: Gunakan `superpowers:subagent-driven-development` atau eksekusi bertahap task-by-task. Setiap langkah menggunakan format checkbox (`- [ ]`) untuk pelacakan progres.
> **Batasan Khusus Pengguna:** JANGAN LAKUKAN GIT COMMIT ATAU GIT PUSH.

**Tujuan:** Memperbaiki sistem filter kategori dan live search pada halaman HI Opportunities agar responsif dan berfungsi 100%, serta menyamakan ukuran dimensi, padding, container, dan vertical rhythm section hero antara halaman HI Opportunities dan Article.

**Arsitektur:** 
1. Backend Controller (`HITCCProgrammeController.php`): Deteksi ketersediaan data database via `HITCCProgramme::exists()`. Jika tabel database belum memiliki record (seperti pada environment lokal/staging saat ini yang bernilai 0), delegasikan filter dan pencarian ke in-memory fallback paginator secara dinamis sehingga filter kategori (`internship`, `volunteer`, `scholarship`, `exchange`, `competition`) dan kata kunci search menghasilkan item yang sesuai (bukan kosong 0 hasil).
2. Frontend AJAX (`opportunitiesFilter.js`): Tangani active state pill kategori, debounced search (300ms), URL sync via `history.pushState`, dan graceful partial view swap (`partials.hitcc-cards`).
3. Slicing & Styling CSS (`opportunities.css` & `article.css`): Harmonisasi token styling hero (padding `52px 20px 50px 20px`, H1 `40px / 60px`, subtitle `13px / 19.5px` margin `24px`, search box `520px x 41px` margin `18px`, dan pill filter `35px` gap `10px`) agar tinggi section hero persis sama dan tidak terjadi visual layout jump saat berpindah halaman.

**Tech Stack:** PHP 8.2+, Laravel 11, Blade Templates, Tailwind CSS v4, Vanilla JavaScript (ES Module), Vite.

---

## Global Constraints

- **Git Guard:** Jangan menjalankan `git commit` maupun `git push` (sesuai instruksi ketat pengguna: *"jangan lakukan commit dlu"*).
- **Code Style:** Clean code, modularitas, KISS, idiomatic Laravel & modern ES JavaScript.
- **Visual Accuracy:** Ukuran hero, spacing, font sizes, line heights, dan warna harus identik antara halaman HI Opportunities dan Article.

---

## Review Focus

1. **Category Filter Click on Opportunities:** Mengklik pill kategori (misal: "Magang", "Relawan", "Beasiswa", "Pertukaran", "Kompetisi") harus langsung menyaring daftar peluang via AJAX dan mengupdate URL tanpa reload halaman.
2. **Search Input Interaction:** Mengetik kata kunci pencarian (misal: "Marketing", "Relawan") harus langsung memfilter hasil secara real-time (debounced 300ms) dan menampilkan jumlah hasil yang sesuai.
3. **Empty / Reset State:** Mengklik "Semua" atau menghapus isi search box harus mengembalikan seluruh data (5 hasil). Jika pencarian tidak menemukan hasil (misal kata kunci acak), tampilkan empty state ramah pengguna.
4. **Hero Dimensions Parity:** Tinggi total, padding atas/bawah, lebar container, ukuran judul H1, ukuran subtitle, dan search box pada section hero halaman HI Opportunities harus sama persis dengan halaman Article (menghilangkan lonjakan layout/shift).
5. **No Visual Regressions:** Tidak merusak rendering kartu peluang di desktop maupun mobile, dan build Vite (`npm run build`) harus sukses bersih tanpa error.

---

## Tasks Terstruktur

### Task 1: Perbaikan Filter & Search pada Backend Controller

**Files:**
- Modify: `app/Http/Controllers/HITCCProgrammeController.php:80-165`

**Interfaces:**
- Consumes: `Request` dengan query parameter `category`, `search`, `page`, `sort`.
- Produces: `LengthAwarePaginator` yang berisi item hasil filter/search baik dari Database (jika ada data) maupun dari fallback Figma dataset.

- [ ] **Step 1: Analisis kegagalan kondisi filter di controller**
  Saat ini baris 112 menggunakan kondisi:
  `if ($opportunities->total() === 0 && empty($search) && (empty($category) || $category === 'all'))`
  Ketika pengguna memilih kategori selain 'all' atau mengetik pencarian, kondisi ini bernilai `false`, sehingga paginator kosong dari DB (0 data) dikembalikan ke view.

- [ ] **Step 2: Refactor logika query fallback di `HITCCProgrammeController@index`**
  Ganti pengecekan dengan mengecek apakah tabel database memiliki record (`HITCCProgramme::exists()`).
  - Jika tabel kosong: Jalankan `$this->buildFallbackPaginator($request, $category, $search)` secara langsung.
  - Jika tabel terisi: Jalankan query Eloquent normal dengan filter `category`, `search`, dan `sort`.

- [ ] **Step 3: Perkaya pencarian multi-kolom di `buildFallbackPaginator`**
  Pastikan in-memory search mencakup:
  - `title_program`
  - `company_name`
  - `company_desc`
  - `registration_info`
  - `category->name` / `category->slug`

- [ ] **Step 4: Uji coba controller via Artisan Tinker**
  Verifikasi query:
  - `category=internship` -> Menghasilkan 1 item (Marketing Internship)
  - `category=volunteer` -> Menghasilkan 1 item (HI Programme Volunteer)
  - `category=scholarship` -> Menghasilkan 1 item (Future Leaders Scholarship)
  - `category=exchange` -> Menghasilkan 1 item (Student Exchange Programme)
  - `category=competition` -> Menghasilkan 1 item (Youth Innovation Competition)
  - `category=all` -> Menghasilkan 5 item
  - `search=marketing` -> Menghasilkan 1 item

---

### Task 2: Verifikasi & Optimasi AJAX Client-Side Filter

**Files:**
- Modify: `resources/js/modules/opportunitiesFilter.js`
- Modify: `resources/views/partials/hitcc-cards.blade.php`

**Interfaces:**
- Consumes: Event klik tombol `.opportunities-pill-btn` dan event input `#search-input`.
- Produces: Fetch request dengan header `X-Requested-With: XMLHttpRequest` dan update DOM `#hitcc-cards-container`.

- [ ] **Step 1: Cek event listener dan sinkronisasi state di `opportunitiesFilter.js`**
  Pastikan saat tombol filter diklik:
  - Active class berpindah secara instan.
  - Reset page ke 1 saat mengubah filter atau search.
  - Nilai pencarian aktif diikutsertakan saat mengganti kategori, dan sebaliknya.
  - Tombol keyboard `Enter` pada form search tidak me-refresh halaman (prevent default).

- [ ] **Step 2: Pastikan partial view `partials/hitcc-cards.blade.php` merender hasil dan badge dengan tepat**
  Verifikasi teks header `{{ $opportunities->total() }} hasil` diperbarui secara akurat dan kartu-kartu peluang tampil rapi.

---

### Task 3: Harmonisasi Dimensi & Styling Section Hero (Opportunities vs Article)

**Files:**
- Modify: `resources/css/pages/opportunities.css:6-135`
- Modify: `resources/views/pages/programme/HI-opportunities/index.blade.php:8-60`
- Reference: `resources/views/pages/article/index.blade.php:10-64` & `375-520`

**Spesifikasi Harmonisasi:**
| Elemen | Nilai Terstandarisasi |
| :--- | :--- |
| **Section Background** | `#205DB6` (Brand Blue Header) |
| **Section Padding** | `52px 20px 50px 20px` (Atas: 52px, Kanan/Kiri: 20px, Bawah: 50px) |
| **Container Max-Width** | `1240px` (margin: `0 auto`, text-align: `center`) |
| **H1 Title Font & Size** | `Libre Baskerville 700`, `40px`, line-height `60px`, letter-spacing `-1px` |
| **H1 Margin Bottom** | `14px` |
| **Subtitle Font & Size** | `Poppins 400`, `13px`, line-height `19.5px`, color `#FFFFFF` |
| **Subtitle Margin Bottom** | `24px`, max-width `600px` (terpusat) |
| **Search Box Size** | Width `100%`, max-width `520px`, height `41px`, border-radius `9999px` |
| **Search Box Margin** | Margin bottom `18px` |
| **Search Box Shadow** | `0 2px 10px rgba(0, 0, 0, 0.08)`, focus: `0 0 0 2px #FF8716` |
| **Search Input Text** | `Poppins 400 13px`, color `#1E293B`, icon `14px #94A3B8` |
| **Filter Pills Height** | `35px`, border-radius `9999px`, font `Poppins 700 11px / 16.5px` |
| **Filter Pills Gap** | `10px`, active background `#FF8716`, active color `#FFFFFF` |

- [ ] **Step 1: Samakan padding dan container pada `opportunities.css`**
  Update `.opportunities-hero-section` dan `.opportunities-hero-container` dengan padding `52px 20px 50px 20px` dan `max-width: 1240px`.

- [ ] **Step 2: Samakan vertical rhythm H1, subtitle, dan search box**
  Sesuaikan margin H1 (`margin-bottom: 14px`), subtitle (`margin-bottom: 24px`, `max-width: 600px`), dan search box (`margin-bottom: 18px`).

- [ ] **Step 3: Samakan search box visual style**
  Terapkan styling search box dengan padding, box-shadow halus, dan icon styling yang identik dengan search box di halaman Article.

- [ ] **Step 4: Pastikan section hero Article menggunakan aturan yang seirama**
  Pastikan class-class hero di halaman Article dan Opportunities menggunakan nilai token dimensi yang konsisten.

---

### Task 4: Kompilasi Aset, Pembersihan Cache, & Pengujian Menyeluruh

**Files:**
- Execute: `npm run build`
- Execute: `php artisan view:clear`

- [ ] **Step 1: Jalankan build Vite**
  Jalankan `npm run build` untuk memverifikasi tidak ada sintaks error di CSS dan JS modul.

- [ ] **Step 2: Bersihkan cache view Blade**
  Jalankan `php artisan view:clear` agar view terbaru segera aktif.

- [ ] **Step 3: Uji fungsionalitas filter dengan request nyata**
  Simulasikan request AJAX dan standard GET untuk memastikan response status 200, konten HTML kartu valid, dan hitungan hasil akurat.

- [ ] **Step 4: Dokumentasikan hasil verifikasi ke walkthrough**
  Catat hasil pengujian dan pastikan TIDAK ADA `git commit` yang dieksekusi.
