@extends('layout.app')

@section('title', 'Recruitment Announcement | House Ilmu Indonesia')
@section('meta_description', 'Informasi dan tahapan rekrutmen House Ilmu Indonesia.')

@section('content')
<main class="career-page">
    <div style="background: #fff9f0; min-height: 80vh;">
        <!-- Hero -->
        <section style="background: #2560b5; color: white; padding: 42px 0 68px;">
            <div style="width: min(1120px, 90%); margin: auto;">
                <a href="{{ route('career.index') }}"
                   style="display: inline-block; color: white; text-decoration: none; font-size: 14px; font-weight: 800; margin-bottom: 30px;">
                    ← Kembali ke Career
                </a>

                <div style="color: #ff941f; font-size: 12px; font-weight: 900; letter-spacing: 2px;">
                    RECRUITMENT ANNOUNCEMENT
                </div>

                <h1 style="font-family: 'Nunito', sans-serif; font-size: clamp(32px, 5vw, 48px); font-weight: 900; margin: 16px 0; line-height: 1.2;">
                    Informasi &amp; Tahapan Rekrutmen
                </h1>

                <div style="font-size: 15px; color: rgba(255,255,255,.9);">
                    House Ilmu Indonesia <span style="color: #ff9b32; margin: 0 10px;">•</span> Periode Terbaru
                </div>
            </div>
        </section>

        <!-- Content -->
        <section style="padding: 60px 20px 75px;">
            <div style="text-align: center; max-width: 760px; margin: 0 auto 40px;">
                <h2 style="font-size: clamp(24px, 3vw, 32px); font-weight: 800; margin-bottom: 16px; color: #123363;">
                    Proses Rekrutmen yang Terbuka &amp; Terstruktur
                </h2>
                <p style="color: #71809a; line-height: 1.8; font-size: 16px;">
                    Kami mengundang generasi muda berenergi positif untuk belajar, berkontribusi, dan berkembang bersama melalui program kerja nyata di House Ilmu Indonesia.
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px; max-width: 1020px; margin: 0 auto;">
                <div style="background: #fff; border: 1px solid #e0e6ef; border-radius: 14px; padding: 28px 30px; box-shadow: 0 4px 12px rgba(16,43,82,0.04);">
                    <div style="color: #ff8517; font-size: 18px; font-weight: 800; margin-bottom: 12px;">
                        01. Tahapan Seleksi
                    </div>
                    <ul style="color: #435b7d; font-size: 14px; line-height: 1.9; padding-left: 20px; margin: 0;">
                        <li>Pengisian Formulir Pendaftaran online</li>
                        <li>Pemeriksaan berkas &amp; portfolio (jika disyaratkan)</li>
                        <li>Sesi Wawancara / Focus Group Discussion</li>
                        <li>Pengumuman akhir &amp; Welcoming Onboarding</li>
                    </ul>
                </div>

                <div style="background: #fff; border: 1px solid #e0e6ef; border-radius: 14px; padding: 28px 30px; box-shadow: 0 4px 12px rgba(16,43,82,0.04);">
                    <div style="color: #ff8517; font-size: 18px; font-weight: 800; margin-bottom: 12px;">
                        02. Benefit Bergabung
                    </div>
                    <ul style="color: #435b7d; font-size: 14px; line-height: 1.9; padding-left: 20px; margin: 0;">
                        <li>Sertifikat resmi pengalaman kerja &amp; kontribusi</li>
                        <li>Mentoring langsung dari leader &amp; profesional</li>
                        <li>Relasi komunitas pemuda se-Indonesia</li>
                        <li>Portofolio nyata program berskala nasional</li>
                    </ul>
                </div>

                <div style="background: #fff; border: 1px solid #e0e6ef; border-radius: 14px; padding: 28px 30px; box-shadow: 0 4px 12px rgba(16,43,82,0.04);">
                    <div style="color: #ff8517; font-size: 18px; font-weight: 800; margin-bottom: 12px;">
                        03. Ketentuan Umum
                    </div>
                    <ul style="color: #435b7d; font-size: 14px; line-height: 1.9; padding-left: 20px; margin: 0;">
                        <li>Mahasiswa aktif, fresh graduate, atau pemuda antusias</li>
                        <li>Memiliki komitmen waktu selama masa bakti</li>
                        <li>Mampu berkomunikasi dengan baik secara daring</li>
                        <li>Memiliki inisiatif dan semangat belajar tinggi</li>
                    </ul>
                </div>

                <div style="background: #fff; border: 1px solid #e0e6ef; border-radius: 14px; padding: 28px 30px; box-shadow: 0 4px 12px rgba(16,43,82,0.04);">
                    <div style="color: #ff8517; font-size: 18px; font-weight: 800; margin-bottom: 12px;">
                        04. Bantuan &amp; Pertanyaan
                    </div>
                    <p style="color: #435b7d; font-size: 14px; line-height: 1.8; margin-bottom: 14px;">
                        Ada pertanyaan seputar posisi dan proses seleksi? Hubungi tim Human Capital kami melalui email resmi atau media sosial House Ilmu.
                    </p>
                    <a href="mailto:houseilmu.id@gmail.com"
                       style="display: inline-block; color: #245fb5; font-weight: 800; font-size: 14px; text-decoration: underline;">
                        houseilmu.id@gmail.com ↗
                    </a>
                </div>
            </div>

            <div style="text-align: center; margin-top: 50px;">
                <a href="{{ route('career.index') }}#career-opportunities"
                   class="career-btn"
                   style="display: inline-block; padding: 12px 28px;">
                    Lihat Posisi Tersedia ↗
                </a>
            </div>
        </section>
    </div>
</main>
@endsection
