@extends('layout.app')

@section('title', $programme->title_program . ' | House Ilmu Indonesia')
@section('meta_description', $programme->company_desc ?: 'Detail program dan kesempatan ' . $programme->title_program . ' di House Ilmu Indonesia.')
@section('hide_comments', true)

@php
    $categoryLabels = [
        'internship' => 'Magang',
        'volunteer' => 'Relawan',
        'scholarship' => 'Beasiswa',
        'exchange' => 'Pertukaran',
        'competition' => 'Kompetisi',
    ];
    $catSlug = strtolower($programme->category->slug ?? '');
    $categoryLabel = $categoryLabels[$catSlug] ?? ($programme->category->name ?? 'Peluang');

    // Gambaran Umum
    $overviewText = $programme->company_desc ?: 'Kesempatan belajar mengelola kampanye edukasi dan komunikasi digital bersama tim House Ilmu Indonesia.';

    // Deskripsi
    $descriptionText = match($catSlug) {
        'internship' => $programme->internship?->hitcc_internship_jobdesc_detail,
        'volunteer' => $programme->volunteer?->hitcc_volunteer_program_goals,
        'scholarship' => $programme->scholarship?->hitcc_scholarship_program_desc,
        'exchange' => $programme->exchange?->hitcc_exchange_program_desc,
        'competition' => $programme->competition?->hitcc_competition_program_goals,
        default => null,
    } ?: 'Peserta akan mengikuti proses pembelajaran terarah, berkolaborasi dengan tim, dan menyelesaikan aktivitas sesuai ruang lingkup kesempatan.';

    // Persyaratan & Kelayakan
    $rawRequirements = match($catSlug) {
        'internship' => $programme->internship?->hitcc_internship_technical_non_technical_skills,
        'volunteer' => $programme->volunteer?->hitcc_volunteer_qualification_list,
        'scholarship' => $programme->scholarship?->hitcc_scholarship_requirements_scholar,
        'exchange' => $programme->exchange?->hitcc_exchange_selection_criteria,
        'competition' => $programme->competition?->hitcc_competition_other_requirements,
        default => null,
    };
    $requirementsList = $rawRequirements 
        ? array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', strip_tags($rawRequirements))))
        : [
            'Pelajar, mahasiswa, atau lulusan baru yang relevan',
            'Berkomitmen mengikuti seluruh rangkaian',
            'Memiliki minat belajar dan bekerja sama',
        ];

    // Manfaat
    $rawBenefits = match($catSlug) {
        'internship' => $programme->internship?->hitcc_internship_benefit,
        'volunteer' => $programme->volunteer?->hitcc_volunteer_benefit,
        'scholarship' => $programme->scholarship?->hitcc_scholarship_benefit_scholar,
        'exchange' => $programme->exchange?->hitcc_exchange_benefit,
        'competition' => $programme->competition?->hitcc_competition_prize,
        default => null,
    };
    $benefitsList = $rawBenefits 
        ? array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', strip_tags($rawBenefits))))
        : [
            'Pengalaman proyek nyata',
            'Pendampingan bersama tim',
            'Sertifikat kontribusi',
        ];

    // Linimasa & Batas Pendaftaran
    $deadlineText = $programme->registration_deadline 
        ? \Carbon\Carbon::parse($programme->registration_deadline)->translatedFormat('d F Y')
        : 'Pendaftaran berikutnya segera diumumkan';

    // Cara Mendaftar
    $rawRegistration = $programme->registration_info;
    $registrationSteps = $rawRegistration 
        ? array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', strip_tags($rawRegistration))))
        : [
            'Pelajari deskripsi dan persyaratan.',
            'Siapkan CV serta dokumen pendukung.',
            'Isi formulir resmi saat pendaftaran dibuka.',
        ];

    // Lokasi / Mode
    $locationModeText = match($catSlug) {
        'internship' => $programme->internship?->hitcc_internship_location,
        'volunteer' => $programme->volunteer?->hitcc_volunteer_location,
        'scholarship' => 'Daring · Indonesia',
        'exchange' => $programme->exchange?->hitcc_exchange_location,
        'competition' => $programme->competition?->hitcc_competition_venue,
        default => null,
    } ?: 'Hibrida · Indonesia';
@endphp

@section('content')
<div class="bg-[#FFF9F0] w-full text-[#152A5E]">
    <div class="max-w-[940px] mx-auto px-4 sm:px-6 pt-7 pb-16">
        
        <!-- Back Link -->
        <div class="mb-3">
            <a href="{{ route('programme.hi.index') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-[#152A5E] hover:text-[#FF731D] transition-colors group">
                <span class="group-hover:-translate-x-0.5 transition-transform">&larr;</span>
                <span>Kembali ke Kesempatan HI</span>
            </a>
        </div>

        <!-- Breadcrumbs -->
        <nav class="flex items-center flex-wrap gap-1.5 text-[11px] sm:text-xs text-gray-500 font-sans-clean mb-10">
            <a href="{{ route('programme.hi.index') }}" class="hover:text-[#152A5E] transition-colors">Kesempatan HI</a>
            <span class="text-gray-400">/</span>
            <a href="{{ route('programme.hi.index', ['category' => $programme->category->slug]) }}" class="hover:text-[#152A5E] transition-colors">{{ $categoryLabel }}</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-700 font-medium">{{ $programme->title_program }}</span>
        </nav>

        <!-- Hero: Poster + Title + CTA -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-14 items-center mb-16">
            <!-- Left: Poster Image / Placeholder -->
            <div class="md:col-span-5 flex justify-center md:justify-start">
                <div class="w-full max-w-[305px] h-[390px] bg-[#EEF2F7] rounded-[22px] overflow-hidden flex flex-col items-center justify-center relative shadow-sm select-none border border-gray-100/80">
                    @if($programme->bg_poster_img && Storage::disk('public')->exists($programme->bg_poster_img))
                        <img 
                            src="{{ Storage::url($programme->bg_poster_img) }}" 
                            alt="{{ $programme->title_program }}" 
                            class="w-full h-full object-cover"
                        >
                    @else
                        <div class="flex flex-col items-center justify-center gap-2 text-gray-400/80 p-4 text-center">
                            <i class="fa-regular fa-image text-3xl"></i>
                            <span class="text-[10px] tracking-[0.25em] font-bold text-gray-400 uppercase font-sans-clean">
                                POSTER {{ strtoupper($categoryLabel) }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right: Title, Subtitle, Apply Button -->
            <div class="md:col-span-7 flex flex-col justify-center">
                <!-- Category Badge -->
                <span class="bg-[#EBF3FF] text-[#1856C9] px-3.5 py-1 rounded-full text-xs font-semibold inline-block mb-3.5 w-fit tracking-wide font-sans-clean">
                    {{ $categoryLabel }}
                </span>

                <!-- Title -->
                <h1 class="font-editorial text-3xl sm:text-4xl lg:text-[46px] font-bold text-[#152A5E] leading-[1.18] mb-3.5">
                    {{ $programme->title_program }}
                </h1>

                <!-- Subtitle / Short description -->
                <p class="text-xs sm:text-[13.5px] text-gray-600 leading-relaxed font-sans-clean mb-6 max-w-lg">
                    {{ $overviewText }}
                </p>

                <!-- CTA Button -->
                <div>
                    <a 
                        href="{{ $programme->link_apply ?: '#' }}" 
                        target="_blank" 
                        class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-[#FF731D] hover:bg-[#E8620D] text-white font-bold text-xs sm:text-sm tracking-wide transition duration-200 shadow-sm cursor-pointer font-sans-clean"
                    >
                        <span>Daftar Sekarang</span>
                        <span class="text-sm">↗</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Body Content: Left Details, Right Sidebar -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-14 mb-20">
            <!-- Left Column: Details Sections -->
            <div class="lg:col-span-8 space-y-7">
                <!-- 1. Gambaran Umum -->
                <section>
                    <h2 class="font-editorial text-xl sm:text-2xl font-bold text-[#152A5E] mb-2">
                        Gambaran Umum
                    </h2>
                    <p class="text-xs sm:text-[13.5px] text-gray-600 leading-relaxed font-sans-clean">
                        {{ $overviewText }}
                    </p>
                </section>

                <!-- 2. Deskripsi -->
                <section>
                    <h2 class="font-editorial text-xl sm:text-2xl font-bold text-[#152A5E] mb-2">
                        Deskripsi
                    </h2>
                    <p class="text-xs sm:text-[13.5px] text-gray-600 leading-relaxed font-sans-clean">
                        {{ $descriptionText }}
                    </p>
                </section>

                <!-- 3. Persyaratan & Kelayakan -->
                <section>
                    <h2 class="font-editorial text-xl sm:text-2xl font-bold text-[#152A5E] mb-2">
                        Persyaratan & Kelayakan
                    </h2>
                    <div class="space-y-1 text-xs sm:text-[13.5px] text-gray-600 font-sans-clean leading-relaxed">
                        @foreach($requirementsList as $req)
                            <p>{{ $req }}</p>
                        @endforeach
                    </div>
                </section>

                <!-- 4. Manfaat -->
                <section>
                    <h2 class="font-editorial text-xl sm:text-2xl font-bold text-[#152A5E] mb-2">
                        Manfaat
                    </h2>
                    <div class="space-y-1 text-xs sm:text-[13.5px] text-gray-600 font-sans-clean leading-relaxed">
                        @foreach($benefitsList as $ben)
                            <p>{{ $ben }}</p>
                        @endforeach
                    </div>
                </section>

                <!-- 5. Linimasa & Batas Pendaftaran -->
                <section>
                    <h2 class="font-editorial text-xl sm:text-2xl font-bold text-[#152A5E] mb-2">
                        Linimasa & Batas Pendaftaran
                    </h2>
                    <p class="text-xs sm:text-[13.5px] text-gray-600 leading-relaxed font-sans-clean">
                        {{ $deadlineText }}
                    </p>
                </section>

                <!-- 6. Cara Mendaftar -->
                <section>
                    <h2 class="font-editorial text-xl sm:text-2xl font-bold text-[#152A5E] mb-2">
                        Cara Mendaftar
                    </h2>
                    <div class="space-y-1 text-xs sm:text-[13.5px] text-gray-600 font-sans-clean leading-relaxed">
                        @foreach($registrationSteps as $step)
                            <p>{{ $step }}</p>
                        @endforeach
                    </div>
                </section>
            </div>

            <!-- Right Column: Sidebar Card -->
            <div class="lg:col-span-4">
                <div class="sticky top-6 sm:top-8 bg-white rounded-[22px] p-6 shadow-[0_4px_25px_rgba(0,0,0,0.03)] border border-gray-100">
                    <h3 class="font-bold text-xs tracking-wider text-[#152A5E] uppercase mb-4 font-sans-clean">
                        INFORMASI KESEMPATAN
                    </h3>

                    <div class="space-y-4 mb-6 text-xs font-sans-clean">
                        <div>
                            <p class="font-bold text-[#152A5E] mb-0.5">Penyelenggara</p>
                            <p class="text-gray-600">{{ $programme->company_name ?: 'House Ilmu Indonesia' }}</p>
                        </div>

                        <div>
                            <p class="font-bold text-[#152A5E] mb-0.5">Batas Pendaftaran</p>
                            <p class="text-gray-600">{{ $deadlineText }}</p>
                        </div>

                        <div>
                            <p class="font-bold text-[#152A5E] mb-0.5">Lokasi / Mode</p>
                            <p class="text-gray-600">{{ $locationModeText }}</p>
                        </div>
                    </div>

                    <a 
                        href="{{ $programme->link_apply ?: '#' }}" 
                        target="_blank" 
                        class="w-full py-2.5 px-4 rounded-xl bg-[#FF731D] hover:bg-[#E8620D] text-white font-bold text-xs tracking-wide text-center transition duration-200 block shadow-sm flex items-center justify-center gap-1.5 font-sans-clean cursor-pointer mb-2.5"
                    >
                        <span>Daftar Sekarang</span>
                        <span class="text-xs">↗</span>
                    </a>

                    @if($programme->company_website || $programme->link_apply)
                        <a 
                            href="{{ $programme->company_website ?: $programme->link_apply }}" 
                            target="_blank" 
                            class="block text-center text-[11px] font-medium text-[#FF731D] hover:underline transition font-sans-clean"
                        >
                            Buka tautan referensi &rarr;
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Related Opportunities -->
        @if(isset($relatedOpportunities) && $relatedOpportunities->count() > 0)
            <div class="pt-8 pb-4">
                <!-- Heading -->
                <div class="text-center mb-9">
                    <h2 class="font-editorial text-2xl sm:text-[26px] font-bold text-[#FF731D] tracking-wide uppercase mb-2">
                        RELATED OPPORTUNITIES
                    </h2>
                    <div class="w-14 h-[2px] bg-[#FF731D] mx-auto"></div>
                </div>

                <!-- Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($relatedOpportunities as $opp)
                        @php
                            $catOppSlug = strtolower($opp->category->slug ?? '');
                            $badgeOppName = $categoryLabels[$catOppSlug] ?? ($opp->category->name ?? 'Peluang');
                            $descOppText = $opp->company_desc ?: ($opp->registration_info ?: 'Temukan program dan kesempatan terbaik bersama House Ilmu Indonesia.');
                        @endphp

                        <div class="bg-white rounded-[22px] border-[1.5px] border-[#2563EB]/40 overflow-hidden flex flex-col justify-between shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-lg hover:-translate-y-1 transition duration-300">
                            <!-- Top: Image / Placeholder Area -->
                            <div class="w-full aspect-[16/10] bg-[#EEF2F7] border-b border-gray-100 flex flex-col items-center justify-center p-4 relative overflow-hidden select-none">
                                @if($opp->bg_poster_img && Storage::disk('public')->exists($opp->bg_poster_img))
                                    <img 
                                        src="{{ Storage::url($opp->bg_poster_img) }}" 
                                        alt="{{ $opp->title_program }}" 
                                        class="w-full h-full object-cover object-top hover:scale-105 transition duration-500" 
                                        loading="lazy" 
                                        decoding="async"
                                    >
                                @else
                                    <div class="flex flex-col items-center justify-center gap-1.5 text-gray-400/80">
                                        <i class="fa-regular fa-image text-2xl"></i>
                                        <span class="text-[9px] tracking-[0.2em] font-bold text-gray-400 uppercase">GAMBAR KESEMPATAN</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Bottom: Content Body -->
                            <div class="p-5 sm:p-6 flex flex-col justify-between flex-1">
                                <div>
                                    <!-- Category Badge -->
                                    <span class="bg-[#EBF3FF] text-[#1856C9] px-3 py-0.5 rounded-full text-xs font-semibold inline-block mb-3 w-fit tracking-wide font-sans-clean">
                                        {{ $badgeOppName }}
                                    </span>

                                    <!-- Title -->
                                    <h3 class="font-editorial text-base sm:text-lg font-bold text-[#152A5E] leading-snug mb-2 line-clamp-2">
                                        {{ $opp->title_program }}
                                    </h3>

                                    <!-- Description -->
                                    <p class="text-xs text-gray-600 leading-relaxed font-sans-clean mb-6 line-clamp-3">
                                        {{ $descOppText }}
                                    </p>
                                </div>

                                <!-- Action Button -->
                                <div class="pt-2">
                                    <a 
                                        href="{{ route('programme.hi.show', ['category' => $opp->category->slug, 'slug' => $opp->slug]) }}" 
                                        class="w-full py-2.5 px-4 rounded-xl bg-[#FF731D] hover:bg-[#E8620D] text-white font-bold text-xs sm:text-sm tracking-wide text-center transition duration-200 block shadow-sm flex items-center justify-center gap-1.5 cursor-pointer font-sans-clean"
                                    >
                                        <span>Lihat Selengkapnya</span>
                                        <span class="text-sm">↗</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>
@endsection
