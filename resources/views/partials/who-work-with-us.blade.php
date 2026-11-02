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
    ];
@endphp

<!-- Start partner section -->
<section class="partner container my-5 py-4" data-aos="fade-up">
    <h1 class="col-12 text-center fw-bold pt-5 mt-2" style="color: #083d77">
        Who work with us?
    </h1>
    <div id="partnerSplide" class="splide mt-4">
        <div class="splide__track">
            <ul class="splide__list flex items-center">
                @foreach ($partners as $partner)
                    <li class="splide__slide flex items-center justify-center p-2">
                        <div class="d-flex align-items-center justify-content-center w-100 px-2" style="height: 90px;">
                            <img src="{{ asset('img/partners/' . $partner['file']) }}"
                                 class="mx-auto d-block object-contain rounded-2"
                                 style="max-height: 75px; max-width: 175px; width: auto; height: auto;"
                                 alt="{{ $partner['alt'] }}"
                                 title="{{ $partner['name'] }}"
                                 loading="lazy">
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
<!-- End partner section -->
