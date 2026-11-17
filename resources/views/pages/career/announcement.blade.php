@extends('layout.app')

@section('title', 'Recruitment Announcement | House Ilmu Indonesia')
@section('meta_description', 'Informasi dan tahapan rekrutmen House Ilmu Indonesia.')

@section('content')
<main class="career-page" style="background: linear-gradient(180deg, #fffaf2 0%, #fff 100%);">
    <section style="padding: 42px 20px 18px;">
        <div style="max-width: 1180px; margin: 0 auto;">
            <a href="{{ route('career.index') }}" style="display:inline-block; color:#1a3d68; text-decoration:none; font-weight:800; margin-bottom:18px;">← Kembali ke Career</a>
        </div>
    </section>

    <section style="padding: 0 20px 56px;">
        <div style="max-width: 1180px; margin: 0 auto; background: linear-gradient(135deg, #0d2d5e 0%, #163f7a 100%); border-radius: 28px; overflow: hidden; box-shadow: 0 26px 80px rgba(12, 33, 61, .18);">
            <div style="padding: clamp(26px, 4vw, 52px);">
                <div style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:18px;">
                    <div>
                        <div style="font-size:12px; letter-spacing:2.2px; font-weight:900; color:#ffb15b; text-transform:uppercase;">Recruitment Announcement</div>
                        <h1 style="margin:12px 0 0; color:#fff; font-size:clamp(30px,5vw,58px); line-height:1; font-weight:900; letter-spacing:-.04em;">Pengumuman Hasil Seleksi</h1>
                    </div>
                    <div style="background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.12); border-radius: 18px; padding: 12px 18px; color:#fff; min-width:180px; text-align:center;">
                        <div style="font-size:11px; letter-spacing:1.5px; text-transform:uppercase; opacity:.8;">Status</div>
                        <div style="font-size:26px; font-weight:900; margin-top:6px; color:#ffd24b;">HI 2026</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="padding: 0 20px 80px;">
        <div style="max-width: 1040px; margin: 0 auto; background: #fff; border: 1px solid #ebeff5; border-radius: 28px; box-shadow: 0 18px 44px rgba(12, 35, 67, .08); overflow: hidden;">
            <div style="background: linear-gradient(180deg, #fff9f2 0%, #fff 100%); padding: clamp(24px, 4vw, 42px);">
                <div style="text-align:center; margin-bottom: 26px;">
                    <div style="display:inline-block; background:#ff8a1d; color:#fff; font-weight:900; font-size:12px; letter-spacing:2px; padding:8px 14px; border-radius:999px; text-transform:uppercase;">UTBK-style Result Check</div>
                    <h2 style="margin:18px 0 8px; font-size:clamp(26px,4vw,42px); color:#102d5f; font-weight:900; letter-spacing:-.04em;">Cek Status Lolos atau Tidak Lolos</h2>
                    <p style="margin:0 auto; max-width:620px; color:#5f6f87; line-height:1.8;">Masukkan nama lengkap kamu yang mendaftar di rekrutmen House Ilmu Indonesia untuk melihat hasil seleksi secara personal.</p>
                </div>

                <div style="max-width: 620px; margin: 0 auto;">
                    <div style="display:flex; flex-direction:column; gap:14px;">
                        <label for="recruitment-name" style="font-size:12px; font-weight:800; color:#233d63; letter-spacing:1.4px; text-transform:uppercase;">Nama Lengkap</label>
                        <input id="recruitment-name" type="text" placeholder="Contoh: Aulia Rahma" style="width:100%; border:1.5px solid #dfe8f4; background:#f8fbff; border-radius:16px; padding:18px 18px; font-size:18px; color:#0f274a; outline:none; box-sizing:border-box; box-shadow: inset 0 1px 2px rgba(8,31,69,.02);">
                        <button id="check-result" type="button" style="border:none; border-radius:16px; background: linear-gradient(135deg, #ff8a1d 0%, #ffaf47 100%); color:#fff; font-size:16px; font-weight:900; letter-spacing:.02em; padding:18px 24px; cursor:pointer; box-shadow: 0 16px 32px rgba(255,138,29,.25);">Cek Status</button>
                    </div>

                    <div id="result-box" style="margin-top:26px; border-radius:22px; background: linear-gradient(135deg, #f2f8ff 0%, #fefaf0 100%); border: 1px solid #dfeaf9; min-height:200px; display:flex; align-items:center; justify-content:center; text-align:center; padding:26px 18px;">
                        <div>
                            <div style="font-size:12px; letter-spacing:2.5px; text-transform:uppercase; color:#5d718d; font-weight:800;">Hasil Pemeriksaan</div>
                            <div id="result-text" style="margin-top:14px; font-size:clamp(22px,3vw,34px); line-height:1.2; color:#183b6a; font-weight:900; letter-spacing:-.04em;">Tunggu hasilnya, yuk!</div>
                            <div id="result-subtext" style="margin-top:10px; font-size:15px; color:#586d88; line-height:1.7; max-width:470px; margin-left:auto; margin-right:auto;">Masukkan nama kamu dan klik tombol di atas untuk melihat status lamaran di rekrutmen House Ilmu Indonesia.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="padding: 0 20px 80px;">
        <div style="max-width: 980px; margin: 0 auto; display:grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap:22px;">
            <div style="background:#fff; border:1px solid #ebeef3; border-radius:20px; padding:24px 22px; box-shadow:0 14px 30px rgba(17,46,83,.05);">
                <div style="font-size:12px; letter-spacing:2px; font-weight:900; color:#ff8a1d; text-transform:uppercase;">Tahapan</div>
                <h3 style="margin:12px 0 10px; font-size:24px; color:#122d56; font-weight:900;">Seleksi Terstruktur</h3>
                <p style="margin:0; color:#5f6f87; line-height:1.7;">Proses rekrutmen kami dirancang supaya jelas, adil, dan transparan untuk semua kandidat.</p>
            </div>
            <div style="background:#fff; border:1px solid #ebeef3; border-radius:20px; padding:24px 22px; box-shadow:0 14px 30px rgba(17,46,83,.05);">
                <div style="font-size:12px; letter-spacing:2px; font-weight:900; color:#ff8a1d; text-transform:uppercase;">Benefit</div>
                <h3 style="margin:12px 0 10px; font-size:24px; color:#122d56; font-weight:900;">Berkembang Bersama</h3>
                <p style="margin:0; color:#5f6f87; line-height:1.7;">Belajar, berkontribusi, dan membangun relasi dengan tim dan komunitas House Ilmu.</p>
            </div>
            <div style="background:#fff; border:1px solid #ebeef3; border-radius:20px; padding:24px 22px; box-shadow:0 14px 30px rgba(17,46,83,.05);">
                <div style="font-size:12px; letter-spacing:2px; font-weight:900; color:#ff8a1d; text-transform:uppercase;">Motto</div>
                <h3 style="margin:12px 0 10px; font-size:24px; color:#122d56; font-weight:900;">Bertumbuh, Bermanfaat, Bermakna</h3>
                <p style="margin:0; color:#5f6f87; line-height:1.7;">Kami menyiapkan ruang yang mendorong setiap orang tumbuh menjadi pribadi yang lebih siap.</p>
            </div>
        </div>
    </section>

    <script>
        const passedNames = [
            'Aulia Rahma',
            'Dimas Pratama',
            'Nadia Putri',
            'Rafi Maulana',
            'Salsabila',
            'Farhan',
            'Mei Lestari',
            'Reza Ardiansyah'
        ];

        const input = document.getElementById('recruitment-name');
        const resultText = document.getElementById('result-text');
        const resultSubtext = document.getElementById('result-subtext');
        const resultBox = document.getElementById('result-box');

        document.getElementById('check-result').addEventListener('click', function () {
            const name = (input.value || '').trim();
            if (!name) {
                resultText.textContent = 'Nama belum diisi';
                resultSubtext.textContent = 'Silakan tulis nama lengkap kamu agar hasil seleksi bisa muncul.';
                resultBox.style.borderColor = '#f1d2d2';
                resultBox.style.background = 'linear-gradient(135deg, #fff5f5 0%, #fff9f3 100%)';
                return;
            }

            const lowerName = name.toLowerCase();
            const passed = passedNames.some((item) => item.toLowerCase() === lowerName);

            if (passed) {
                resultText.textContent = 'SELAMAT! KAMU LOLOS';
                resultSubtext.textContent = 'Selamat, ' + name + '! Kamu dinyatakan lolos pada rekrutmen House Ilmu Indonesia. Tim kami akan menghubungi kamu untuk tahapan selanjutnya.';
                resultBox.style.borderColor = '#d7efdc';
                resultBox.style.background = 'linear-gradient(135deg, #edfdf1 0%, #f7fff8 100%)';
            } else {
                resultText.textContent = 'MOHON MAAF, KAMU BELUM LOLOS';
                resultSubtext.textContent = 'Terima kasih sudah mengikuti proses rekrutmen House Ilmu Indonesia. Tetap semangat dan terus berproses — kesempatan berikutnya pasti datang.';
                resultBox.style.borderColor = '#f4e2d0';
                resultBox.style.background = 'linear-gradient(135deg, #fff8ef 0%, #fff7f2 100%)';
            }
        });
    </script>
</main>
@endsection
