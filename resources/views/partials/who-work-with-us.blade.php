@php
    $partners = [
        ['name' => 'House Ilmu Indonesia', 'file' => 'logo-house-ilmu.png', 'alt' => 'Logo House Ilmu Indonesia'],
        ['name' => 'Black Swan Community', 'file' => 'black-swan-community.jpg', 'alt' => 'Logo Black Swan Community'],
        ['name' => 'Doteens', 'file' => 'doteens.png', 'alt' => 'Logo Doteens'],
        ['name' => 'FYI Psikologi', 'file' => 'fyi-psikologi.jpg', 'alt' => 'Logo FYI Psikologi'],
        ['name' => 'Gritty.', 'file' => 'gritty.jpg', 'alt' => 'Logo Gritty.'],

        ['name' => 'ImproveHub', 'file' => 'improve-hub.png', 'alt' => 'Logo ImproveHub'],
        ['name' => 'Kelas Kampus', 'file' => 'kelas-kampus.png', 'alt' => 'Logo Kelas Kampus'],
        ['name' => 'Growth Education', 'file' => 'growth-education.png', 'alt' => 'Logo Growth Education'],
        ['name' => 'GrowthHub', 'file' => 'growth-hub.png', 'alt' => 'Logo GrowthHub'],
        ['name' => 'HCK', 'file' => 'hck.png', 'alt' => 'Logo HCK'],

        ['name' => 'Ideal', 'file' => 'ideal.png', 'alt' => 'Logo Ideal'],
        ['name' => 'Kejar Mimpi Jakarta', 'file' => 'kejar-mimpi-jakarta.png', 'alt' => 'Logo Kejar Mimpi Jakarta'],
        ['name' => 'Mataharikita', 'file' => 'mataharikita.png', 'alt' => 'Logo Mataharikita'],
        ['name' => 'Oh Be Shine', 'file' => 'oh-be-shine.png', 'alt' => 'Logo Oh Be Shine'],
        ['name' => 'Ousean', 'file' => 'ousean.png', 'alt' => 'Logo Ousean'],

        ['name' => 'Quria', 'file' => 'quria.jpg', 'alt' => 'Logo Quria'],
        ['name' => 'Teman Ambiss', 'file' => 'teman-ambiss.png', 'alt' => 'Logo Teman Ambiss'],
        ['name' => 'Young On Top (YOT)', 'file' => 'yot.png', 'alt' => 'Logo Young On Top'],
        ['name' => 'Omah Jiwa', 'file' => 'omah-jiwa.png', 'alt' => 'Logo Omah Jiwa'],
        ['name' => 'Cakap', 'file' => 'cakap.png', 'alt' => 'Logo Cakap'],

        ['name' => 'Indorelawan', 'file' => 'indorelawan.png', 'alt' => 'Logo Indorelawan'],
        ['name' => 'Pemimpin.id', 'file' => 'pemimpin-id.jpg', 'alt' => 'Logo Pemimpin.id'],
        ['name' => 'Institut.id', 'file' => 'institut-id.png', 'alt' => 'Logo Institut.id'],
        ['name' => 'Phillip Sekuritas', 'file' => 'phillip-sekuritas.png', 'alt' => 'Logo Phillip Sekuritas'],
        ['name' => 'Girls Beyond', 'file' => 'girls-beyond.png', 'alt' => 'Logo Girls Beyond'],
    ];
@endphp

<!-- Start Who Work With Us Section (5x5 Grid) -->
<section class="partner container my-5 py-4" data-aos="fade-up">
    <div class="text-center mb-8">
        <h2 class="col-12 text-center fw-bold pt-4 mb-2" style="color: #083d77; font-size: clamp(1.75rem, 3.2vw, 2.5rem);">
            Who work with us?
        </h2>
        <div style="width: 54px; height: 3.5px; background-color: #f57c00; margin: 10px auto 0; border-radius: 9999px;"></div>
    </div>

    <!-- 5 Rows x 5 Columns Grid (25 items) -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3 sm:gap-4 md:gap-5 max-w-6xl mx-auto mt-6">
        @foreach ($partners as $partner)
            <div class="partner-grid-card">
                <img src="{{ asset('img/partners/' . $partner['file']) }}"
                     alt="{{ $partner['alt'] }}"
                     title="{{ $partner['name'] }}"
                     loading="lazy"
                     class="partner-grid-img">
            </div>
        @endforeach
    </div>
</section>

<style>
.partner-grid-card {
    background: #ffffff;
    border: 1px solid #edf2f7;
    border-radius: 12px;
    height: 95px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 12px 14px;
    box-shadow: 0 2px 8px rgba(8, 61, 119, 0.04);
    transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
}
.partner-grid-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(8, 61, 119, 0.09);
    border-color: #f57c00;
}
.partner-grid-img {
    max-height: 58px;
    max-width: 100%;
    width: auto;
    height: auto;
    object-fit: contain;
    border-radius: 4px;
}
@media (max-width: 576px) {
    .partner-grid-card {
        height: 80px;
        padding: 8px 10px;
    }
    .partner-grid-img {
        max-height: 46px;
    }
}
</style>
<!-- End Who Work With Us Section -->
