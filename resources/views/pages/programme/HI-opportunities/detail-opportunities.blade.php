@extends('layout.app')

@section('title', $programme->title_program . ' | House Ilmu Indonesia')

@section('content')
<section class="breadcrumb w-full bg-gray-100 py-3">
    <div class="max-w-7xl mx-auto px-4 flex flex-row items-center gap-2 text-sm text-gray-600">
        <a href="{{ route('programme.hi.index') }}" class="hover:text-primary_HI">Semua</a>
        <i class="fa-solid fa-chevron-right text-xs"></i>
        <p class="font-medium text-gray-800">{{ $programme->category->name }}</p>
    </div>
</section>

<div class="opp-container max-w-7xl mx-auto px-4 flex flex-col lg:flex-row justify-start items-start gap-6 py-8 text-white">
    <div class="opp-details w-full lg:w-7/12 flex flex-col">
        <div class="opp-titles flex flex-row py-4 px-4 relative rounded-t-2xl overflow-hidden"
            style="background: url('{{ $programme->bg_poster_img ? Storage::url($programme->bg_poster_img) : asset('assets/img-opp/default-poster.png') }}') center/cover no-repeat;">
            <div class="overlay absolute inset-0 bg-black/60"></div>
            <img class="w-24 md:w-32 logo p-2 z-10 shrink-0 object-contain rounded-xl"
                src="{{ $programme->logo_company_img ? Storage::url($programme->logo_company_img) : asset('assets/img/logo.webp') }}"
                alt="{{ $programme->title_program }}">
            <div class="opp-organizer flex-1 flex flex-col gap-2 z-10 pl-4">
                <h1 style="font-size: clamp(1.2rem, 2vw, 2.5rem);" class="font-bold">{{ $programme->title_program }}</h1>
                <h3 style="font-size: clamp(1rem, 1.5vw, 2rem);" class="font-medium text-gray-200">{{ $programme->company_name }}</h3>
                <div class="flex items-center gap-3">
                    <!-- ICON -->
                    <div class="opp-icon flex flex-col gap-1 text-center">
                        @switch($programme->category->slug)
                            @case('internship')
                                <i class="fa-solid fa-user py-1"></i>
                                <i class="fa-solid fa-briefcase py-1"></i>
                                <i class="fa-solid fa-clock py-1"></i>
                                @break
                            @case('scholarship')
                                <i class="fa-solid fa-money-bill-wave py-1"></i>
                                <i class="fa-solid fa-graduation-cap py-1"></i>
                                <i class="fa-solid fa-clock py-1"></i>
                                @break
                            @case('competition')
                                <i class="fa-solid fa-user py-1"></i>
                                <i class="fa-solid fa-award py-1"></i>
                                <i class="fa-solid fa-clock py-1"></i>
                                @break
                            @case('volunteer')
                                <i class="fa-solid fa-money-bill-wave py-1"></i>
                                <i class="fa-solid fa-handshake-angle py-1"></i>
                                <i class="fa-solid fa-clock py-1"></i>
                                @break
                            @case('exchange')
                                <i class="fa-solid fa-money-bill-wave py-1"></i>
                                <i class="fa-solid fa-user-graduate py-1"></i>
                                <i class="fa-solid fa-clock py-1"></i>
                                @break
                            @default
                                <i class="fa-solid fa-money-bill-wave py-1"></i>
                                <i class="fa-solid fa-user py-1"></i>
                                <i class="fa-solid fa-clock py-1"></i>
                        @endswitch
                    </div>

                    <!-- INFO -->
                    <div class="opp-info flex flex-col gap-1 text-sm">
                        @switch($programme->category->slug)
                            @case('internship')
                                <p>Internship</p>
                                <p>{{ $programme->internship->hitcc_internship_position ?? '-' }}</p>
                                <p>{{ $programme->registration_deadline?->format('d M Y') ?? '-' }}</p>
                                @break
                            @case('scholarship')
                                <p>{{ $programme->scholarship->hitcc_scholarship_scholar_type ?? '-' }}</p>
                                <p>Beasiswa</p>
                                <p>{{ $programme->registration_deadline?->format('d M Y') ?? '-' }}</p>
                                @break
                            @case('competition')
                                <p>{{ $programme->competition->hitcc_competition_category ?? '-' }}</p>
                                <p>{{ $programme->competition->hitcc_competition_competition_type ?? '-' }}</p>
                                <p>{{ $programme->registration_deadline?->format('d M Y') ?? '-' }}</p>
                                @break
                            @case('volunteer')
                                <p>{{ $programme->volunteer->hitcc_volunteer_type ?? '-' }}</p>
                                <p>{{ $programme->volunteer->hitcc_volunteer_volunteer_type ?? '-' }}</p>
                                <p>{{ $programme->registration_deadline?->format('d M Y') ?? '-' }}</p>
                                @break
                            @case('exchange')
                                <p>{{ $programme->exchange->hitcc_exchange_type ?? '-' }}</p>
                                <p>{{ $programme->exchange->hitcc_exchange_exchange_type ?? '-' }}</p>
                                <p>{{ $programme->registration_deadline?->format('d M Y') ?? '-' }}</p>
                                @break
                            @default
                                <p>-</p>
                                <p>-</p>
                                <p>-</p>
                        @endswitch
                    </div>
                </div>
                <a id="button-apply" class="w-full md:w-auto inline-block text-center mt-2 px-6 py-2.5 rounded-xl font-bold bg-[#ff9900] text-white hover:bg-[#e68a00] transition cursor-pointer" href="{{ $programme->link_apply }}" target="_blank">Apply now</a>
            </div>
        </div>
        <div class="opp-details-container flex flex-col gap-3 p-4 bg-[#083D77] rounded-b-2xl">

            {{-- Internship --}}
            @if($programme->category->slug === 'internship' && $programme->internship)
                <div class="opp-information p-3">
                    <h4>Informasi :</h4>
                    <ul>
                        <li>Nama Program: {{ $programme->title_program }}</li>
                        <li>Nama Perusahaan: {{ $programme->company_name }}</li>
                        <li>Lokasi: {{ $programme->internship->hitcc_internship_location }}</li>
                        <li>Durasi: {{ $programme->internship->hitcc_internship_duration }}</li>
                        <li>Keterangan Gaji: {{ $programme->internship->hitcc_internship_allowance }}</li>
                    </ul>
                </div>
                <div class="opp-jobdesc p-3">
                    <h4>Jobdesc :</h4>
                    <ul>
                        <li>Jobdesc: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->internship->hitcc_internship_jobdesc_detail) !!}</li>
                        <li>Posisi: {{ $programme->internship->hitcc_internship_position }}</li>
                        <li>Gaji: {{ $programme->internship->hitcc_internship_salary }}</li>
                        <li>Benefit: {{ $programme->internship->hitcc_internship_benefit }}</li>
                    </ul>
                </div>
                <div class="opp-condition p-3">
                    <h4>Kualifikasi :</h4>
                    <ul>
                        <li>Pendidikan: {{ $programme->internship->hitcc_internship_education }}</li>
                        <li>Jurusan: {{ $programme->internship->hitcc_internship_major }}</li>
                        <li>IPK: {{ $programme->internship->hitcc_internship_gpa }}</li>
                        <li>Bahasa: {{ $programme->internship->hitcc_internship_language }}</li>
                        <li>Skill Teknis Non Teknis: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->internship->hitcc_internship_technical_non_technical_skills) !!}</li>
                    </ul>
                </div>
                <div class="opp-register p-3">
                    <h4>Pendaftaran :</h4>
                    <ul>
                        <li>{!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->registration_info) !!}</li>
                        <li>Batas Pendaftaran: {{ \Carbon\Carbon::parse($programme->registration_deadline)->format('d M Y') }}</li>
                        <li>Dokumen: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->internship->hitcc_internship_documents) !!}</li>
                        <li>Kontak: {{ $programme->internship->hitcc_internship_contact }}</li>
                    </ul>
                </div>
                <div class="opp-additional p-3">
                    <h4>Informasi Tambahan :</h4>
                    <ul>
                        <li>Fasilitas: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->internship->hitcc_internship_facilities) !!}</li>
                        <li>Jam kerja: {{ $programme->internship->hitcc_internship_work_hours }}</li>
                        <li>Aturan dan Ketentuan: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->internship->hitcc_internship_rules) !!}</li>
                        <li>Detail atau Guidebook: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->internship->hitcc_internship_detail_information) !!}</li>
                    </ul>
                </div>
            @endif

            {{-- Volunteer --}}
            @if($programme->category->slug === 'volunteer' && $programme->volunteer)
                <div class="opp-information p-3">
                    <h4>Informasi :</h4>
                    <ul>
                        <li>Nama Program: {{ $programme->title_program }}</li>
                        <li>Tujuan Program: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->volunteer->hitcc_volunteer_program_goals) !!}</li>
                        <li>Lokasi: {{ $programme->volunteer->hitcc_volunteer_location }}</li>
                        <li>Durasi: {{ $programme->volunteer->hitcc_volunteer_duration }}</li>
                        <li>Benefit: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->volunteer->hitcc_volunteer_benefit) !!}</li>
                    </ul>
                </div>
                <div class="opp-jobdesc p-3">
                    <h4>Jobdesc :</h4>
                    <ul>
                        <li>Kegiatan: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->volunteer->hitcc_volunteer_activities) !!}</li>
                        <li>Jadwal: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->volunteer->hitcc_volunteer_schedule_times) !!}</li>
                    </ul>
                </div>
                <div class="opp-condition p-3">
                    <h4>Kualifikasi :</h4>
                    <ul>
                        <li>Kualifikasi: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->volunteer->hitcc_volunteer_qualification_list) !!}</li>
                    </ul>
                </div>
                <div class="opp-register p-3">
                    <h4>Pendaftaran :</h4>
                    <ul>
                        <li>{!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->registration_info) !!}</li>
                        <li>Batas Pendaftaran: {{ \Carbon\Carbon::parse($programme->registration_deadline)->format('d M Y') }}</li>
                        <li>Link Tambahan: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->volunteer->hitcc_volunteer_additional_link) !!}</li>
                    </ul>
                </div>
                <div class="opp-additional p-3">
                    <h4>Informasi Tambahan :</h4>
                    <ul>
                        <li>Fasilitas: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->volunteer->hitcc_volunteer_facilities) !!}</li>
                        <li>Aturan: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->volunteer->hitcc_volunteer_rules) !!}</li>
                        <li>Detail Informasi: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->volunteer->hitcc_volunteer_detail_information) !!}</li>
                    </ul>
                </div>
            @endif

            {{-- Scholarship --}}
            @if($programme->category->slug === 'scholarship' && $programme->scholarship)
                <div class="opp-information p-3">
                    <h4>Informasi :</h4>
                    <ul>
                        <li>Nama Program: {{ $programme->title_program }}</li>
                        <li>Deskripsi Program: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->scholarship->hitcc_scholarship_program_desc) !!}</li>
                        <li>Jenis: {{ $programme->scholarship->hitcc_scholarship_scholar_type }}</li>
                    </ul>
                </div>
                <div class="opp-condition p-3">
                    <h4>Persyaratan :</h4>
                    <ul>
                        <li>{!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->scholarship->hitcc_scholarship_requirements_scholar) !!}</li>
                    </ul>
                </div>
                <div class="opp-jobdesc p-3">
                    <h4>Benefit :</h4>
                    <ul>
                        <li>{!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->scholarship->hitcc_scholarship_benefit_scholar) !!}</li>
                    </ul>
                </div>
                <div class="opp-register p-3">
                    <h4>Pendaftaran :</h4>
                    <ul>
                        <li>{!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->registration_info) !!}</li>
                        <li>Batas Pendaftaran: {{ \Carbon\Carbon::parse($programme->registration_deadline)->format('d M Y') }}</li>
                        <li>Dokumen: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->scholarship->hitcc_scholarship_documents) !!}</li>
                    </ul>
                </div>
                <div class="opp-additional p-3">
                    <h4>Informasi Tambahan :</h4>
                    <ul>
                        <li>Detail Penyelenggara: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->scholarship->hitcc_scholarship_company_details) !!}</li>
                        <li>Commitment Fee: {{ $programme->scholarship->hitcc_scholarship_commitment_fee }}</li>
                        <li>Biaya yang ditanggung: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->scholarship->hitcc_scholarship_costs_covered) !!}</li>
                        <li>Tahapan Seleksi: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->scholarship->hitcc_scholarship_selection_phase) !!}</li>
                        <li>Guidebook: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->scholarship->hitcc_scholarship_guidebook) !!}</li>
                    </ul>
                </div>
            @endif

            {{-- Exchange --}}
            @if($programme->category->slug === 'exchange' && $programme->exchange)
                <div class="opp-information p-3">
                    <h4>Informasi :</h4>
                    <ul>
                        <li>Deskripsi: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->exchange->hitcc_exchange_program_desc) !!}</li>
                        <li>Lokasi: {{ $programme->exchange->hitcc_exchange_location }}</li>
                        <li>Durasi: {{ $programme->exchange->hitcc_exchange_duration }}</li>
                        <li>Jenis: {{ $programme->exchange->hitcc_exchange_type }}</li>
                        <li>Tipe Exchange: {{ $programme->exchange->hitcc_exchange_exchange_type }}</li>
                        <li>Benefit: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->exchange->hitcc_exchange_benefit) !!}</li>
                    </ul>
                </div>
                <div class="opp-condition p-3">
                    <h4>Persyaratan :</h4>
                    <ul>
                        <li>Pendidikan Minimal: {{ $programme->exchange->hitcc_exchange_minimal_education }}</li>
                        <li>Usia Maksimal: {{ $programme->exchange->hitcc_exchange_max_age }}</li>
                        <li>IPK: {{ $programme->exchange->hitcc_exchange_gpa }}</li>
                        <li>Pengalaman: {{ $programme->exchange->hitcc_exchange_relevant_experience }}</li>
                    </ul>
                </div>
                <div class="opp-jobdesc p-3">
                    <h4>Kriteria Seleksi :</h4>
                    <ul>
                        <li>{!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->exchange->hitcc_exchange_selection_criteria) !!}</li>
                    </ul>
                </div>
                <div class="opp-register p-3">
                    <h4>Pendaftaran :</h4>
                    <ul>
                        <li>{!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->registration_info) !!}</li>
                        <li>Batas Pendaftaran: {{ \Carbon\Carbon::parse($programme->registration_deadline)->format('d M Y') }}</li>
                        <li>Dokumen: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->exchange->hitcc_exchange_documents) !!}</li>
                        <li>Biaya Registrasi: {{ $programme->exchange->hitcc_exchange_registration_fee }}</li>
                    </ul>
                </div>
                <div class="opp-additional p-3">
                    <h4>Informasi Tambahan :</h4>
                    <ul>
                        <li>Fasilitas: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->exchange->hitcc_exchange_facilities) !!}</li>
                        <li>Akomodasi: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->exchange->hitcc_exchange_accomodation) !!}</li>
                        <li>Aturan: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->exchange->hitcc_exchange_rules) !!}</li>
                        <li>Detail Informasi: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->exchange->hitcc_exchange_detail_information) !!}</li>
                    </ul>
                </div>
            @endif

            {{-- Competition --}}
            @if($programme->category->slug === 'competition' && $programme->competition)
                <div class="opp-information p-3">
                    <h4>Informasi :</h4>
                    <ul>
                        <li>Nama Program: {{ $programme->title_program }}</li>
                        <li>Tujuan Program: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->competition->hitcc_competition_program_goals) !!}</li>
                        <li>Tipe Program: {{ $programme->competition->hitcc_competition_type }}</li>
                        <li>Kategori: {{ $programme->competition->hitcc_competition_category }}</li>
                        <li>Hadiah: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->competition->hitcc_competition_prize) !!}</li>
                    </ul>
                </div>
                <div class="opp-condition p-3">
                    <h4>Persyaratan :</h4>
                    <ul>
                        <li>Usia Maksimal: {{ $programme->competition->hitcc_competition_max_age }}</li>
                        <li>Pendidikan Minimal: {{ $programme->competition->hitcc_competition_minimal_education }}</li>
                        <li>Persyaratan Lain: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->competition->hitcc_competition_other_requirements) !!}</li>
                    </ul>
                </div>
                <div class="opp-register p-3">
                    <h4>Pendaftaran & Timeline :</h4>
                    <ul>
                        <li>{!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->registration_info) !!}</li>
                        <li>Timeline: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->competition->hitcc_competition_timeline) !!}</li>
                        <li>Batas Pendaftaran: {{ \Carbon\Carbon::parse($programme->registration_deadline)->format('d M Y') }}</li>
                        <li>Tipe Biaya: {{ $programme->competition->hitcc_competition_fee_type }}</li>
                        <li>Tempat: {{ $programme->competition->hitcc_competition_venue }}</li>
                        <li>Pengumuman: {{ $programme->competition->hitcc_competition_announcement }}</li>
                    </ul>
                </div>
                <div class="opp-additional p-3">
                    <h4>Informasi Tambahan :</h4>
                    <ul>
                        <li>Aturan: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->competition->hitcc_competition_rules) !!}</li>
                        <li>Juri: {{ $programme->competition->hitcc_competition_jury }}</li>
                        <li>Syarat & Ketentuan: {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $programme->competition->hitcc_competition_terms_condition) !!}</li>
                    </ul>
                </div>
            @endif

        </div>
    </div>

    <div class="opp-contact-container w-full lg:w-5/12">
        <div class="opp-contact flex flex-col justify-start p-4 bg-[#083D77] rounded-2xl mb-6">
            <div class="opp-details-organizer p-3 break-words space-y-2">
                <h4 class="text-xl font-bold text-[#ff9900] mb-3">Informasi Kontak</h4>
                @if(!empty($programme->company_number))
                    <p><span class="font-medium text-gray-300">No. Telepon :</span> {{ $programme->company_number }}</p>
                @endif
                @if(!empty($programme->company_email))
                    <p><span class="font-medium text-gray-300">Email :</span> <a href="mailto:{{ $programme->company_email }}" class="text-[#ff9900] hover:underline">{{ $programme->company_email }}</a></p>
                @endif
                @if(!empty($programme->company_website))
                    <p><span class="font-medium text-gray-300">Website :</span> <a href="{{ $programme->company_website }}" target="_blank" class="text-[#ff9900] hover:underline">{{ $programme->company_website }}</a></p>
                @endif
                @if(!empty($programme->company_social_media))
                    <p><span class="font-medium text-gray-300">Media Sosial :</span> <a href="{{ $programme->company_social_media }}" target="_blank" class="text-[#ff9900] hover:underline">{{ $programme->company_social_media }}</a></p>
                @endif
            </div>
        </div>
        @include('partials.hi-products')
    </div>
</div>
@endsection
