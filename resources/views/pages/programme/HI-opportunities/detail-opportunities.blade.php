@extends('layout.app')

@section('title', $programme->title_program . ' | House Ilmu Indonesia')

@section('content')
<section class="breadcrumb container-fluid">
    <div class="container-xxl d-flex flex-row align-items-center py-3 gap-2">
        <a href="{{ route('programme.hi.index') }}" title="">Semua</a>
        <i class="fa-solid fa-chevron-right"></i>
        <p>{{ $programme->category->name }}</p>
    </div>
</section>

<div class="opp-container container-xl d-flex flex-column flex-lg-row justify-content-start align-items-start gap-3 py-4 text-white">
    <div class="opp-details col-12 col-lg-7 d-flex flex-column">
        <div class="opp-titles d-flex flex-row py-3 px-2 position-relative"
            style="background: url('{{ $programme->bg_poster_img ? Storage::url($programme->bg_poster_img) : asset('assets/img-opp/default-poster.png') }}') center/cover no-repeat;">
            <div class="overlay position-absolute"></div>
            <img class="col-3 col-md-2 logo p-2"
                src="{{ $programme->logo_company_img ? Storage::url($programme->logo_company_img) : asset('assets/img/logo.webp') }}"
                alt="{{ $programme->title_program }}" style="height: 100%;">
            <div class="opp-organizer col-9 col-md-10 d-flex flex-column gap-2">
                <h1 style="font-size: clamp(1.2rem, 2vw, 2.5rem);">{{ $programme->title_program }}</h1>
                <h3 style="font-size: clamp(1rem, 1.5vw, 2rem);">{{ $programme->company_name }}</h3>
                <div class="d-flex align-items-center gap-3">
                    <!-- ICON -->
                    <div class="opp-icon d-flex flex-column gap-1 text-center">
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
                    <div class="opp-info d-flex flex-column gap-1">
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
                <a id="button-apply" class="col-12 col-md-4" href="{{ $programme->link_apply }}" target="_blank">Apply now</a>
            </div>
        </div>
        <div class="opp-details-container d-flex flex-column gap-3 p-4">

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
                        <li>Jobdesc: {!! str_replace('<img', '<img class="img-fluid"', $programme->internship->hitcc_internship_jobdesc_detail) !!}</li>
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
                        <li>Skill Teknis Non Teknis: {!! str_replace('<img', '<img class="img-fluid"', $programme->internship->hitcc_internship_technical_non_technical_skills) !!}</li>
                    </ul>
                </div>
                <div class="opp-register p-3">
                    <h4>Pendaftaran :</h4>
                    <ul>
                        <li>{!! str_replace('<img', '<img class="img-fluid"', $programme->registration_info) !!}</li>
                        <li>Batas Pendaftaran: {{ \Carbon\Carbon::parse($programme->registration_deadline)->format('d M Y') }}</li>
                        <li>Dokumen: {!! str_replace('<img', '<img class="img-fluid"', $programme->internship->hitcc_internship_documents) !!}</li>
                        <li>Kontak: {{ $programme->internship->hitcc_internship_contact }}</li>
                    </ul>
                </div>
                <div class="opp-additional p-3">
                    <h4>Informasi Tambahan :</h4>
                    <ul>
                        <li>Fasilitas: {!! str_replace('<img', '<img class="img-fluid"', $programme->internship->hitcc_internship_facilities) !!}</li>
                        <li>Jam kerja: {{ $programme->internship->hitcc_internship_work_hours }}</li>
                        <li>Aturan dan Ketentuan: {!! str_replace('<img', '<img class="img-fluid"', $programme->internship->hitcc_internship_rules) !!}</li>
                        <li>Detail atau Guidebook: {!! str_replace('<img', '<img class="img-fluid"', $programme->internship->hitcc_internship_detail_information) !!}</li>
                    </ul>
                </div>
            @endif

            {{-- Volunteer --}}
            @if($programme->category->slug === 'volunteer' && $programme->volunteer)
                <div class="opp-information p-3">
                    <h4>Informasi :</h4>
                    <ul>
                        <li>Nama Program: {{ $programme->title_program }}</li>
                        <li>Tujuan Program: {!! str_replace('<img', '<img class="img-fluid"', $programme->volunteer->hitcc_volunteer_program_goals) !!}</li>
                        <li>Lokasi: {{ $programme->volunteer->hitcc_volunteer_location }}</li>
                        <li>Durasi: {{ $programme->volunteer->hitcc_volunteer_duration }}</li>
                        <li>Benefit: {!! str_replace('<img', '<img class="img-fluid"', $programme->volunteer->hitcc_volunteer_benefit) !!}</li>
                    </ul>
                </div>
                <div class="opp-jobdesc p-3">
                    <h4>Jobdesc :</h4>
                    <ul>
                        <li>Kegiatan: {!! str_replace('<img', '<img class="img-fluid"', $programme->volunteer->hitcc_volunteer_activities) !!}</li>
                        <li>Jadwal: {!! str_replace('<img', '<img class="img-fluid"', $programme->volunteer->hitcc_volunteer_schedule_times) !!}</li>
                    </ul>
                </div>
                <div class="opp-condition p-3">
                    <h4>Kualifikasi :</h4>
                    <ul>
                        <li>Kualifikasi: {!! str_replace('<img', '<img class="img-fluid"', $programme->volunteer->hitcc_volunteer_qualification_list) !!}</li>
                    </ul>
                </div>
                <div class="opp-register p-3">
                    <h4>Pendaftaran :</h4>
                    <ul>
                        <li>{!! str_replace('<img', '<img class="img-fluid"', $programme->registration_info) !!}</li>
                        <li>Batas Pendaftaran: {{ \Carbon\Carbon::parse($programme->registration_deadline)->format('d M Y') }}</li>
                        <li>Link Tambahan: {!! str_replace('<img', '<img class="img-fluid"', $programme->volunteer->hitcc_volunteer_additional_link) !!}</li>
                    </ul>
                </div>
                <div class="opp-additional p-3">
                    <h4>Informasi Tambahan :</h4>
                    <ul>
                        <li>Fasilitas: {!! str_replace('<img', '<img class="img-fluid"', $programme->volunteer->hitcc_volunteer_facilities) !!}</li>
                        <li>Aturan: {!! str_replace('<img', '<img class="img-fluid"', $programme->volunteer->hitcc_volunteer_rules) !!}</li>
                        <li>Detail Informasi: {!! str_replace('<img', '<img class="img-fluid"', $programme->volunteer->hitcc_volunteer_detail_information) !!}</li>
                    </ul>
                </div>
            @endif

            {{-- Scholarship --}}
            @if($programme->category->slug === 'scholarship' && $programme->scholarship)
                <div class="opp-information p-3">
                    <h4>Informasi :</h4>
                    <ul>
                        <li>Nama Program: {{ $programme->title_program }}</li>
                        <li>Deskripsi Program: {!! str_replace('<img', '<img class="img-fluid"', $programme->scholarship->hitcc_scholarship_program_desc) !!}</li>
                        <li>Jenis: {{ $programme->scholarship->hitcc_scholarship_scholar_type }}</li>
                    </ul>
                </div>
                <div class="opp-condition p-3">
                    <h4>Persyaratan :</h4>
                    <ul>
                        <li>{!! str_replace('<img', '<img class="img-fluid"', $programme->scholarship->hitcc_scholarship_requirements_scholar) !!}</li>
                    </ul>
                </div>
                <div class="opp-jobdesc p-3">
                    <h4>Benefit :</h4>
                    <ul>
                        <li>{!! str_replace('<img', '<img class="img-fluid"', $programme->scholarship->hitcc_scholarship_benefit_scholar) !!}</li>
                    </ul>
                </div>
                <div class="opp-register p-3">
                    <h4>Pendaftaran :</h4>
                    <ul>
                        <li>{!! str_replace('<img', '<img class="img-fluid"', $programme->registration_info) !!}</li>
                        <li>Batas Pendaftaran: {{ \Carbon\Carbon::parse($programme->registration_deadline)->format('d M Y') }}</li>
                        <li>Dokumen: {!! str_replace('<img', '<img class="img-fluid"', $programme->scholarship->hitcc_scholarship_documents) !!}</li>
                    </ul>
                </div>
                <div class="opp-additional p-3">
                    <h4>Informasi Tambahan :</h4>
                    <ul>
                        <li>Detail Penyelenggara: {!! str_replace('<img', '<img class="img-fluid"', $programme->scholarship->hitcc_scholarship_company_details) !!}</li>
                        <li>Commitment Fee: {{ $programme->scholarship->hitcc_scholarship_commitment_fee }}</li>
                        <li>Biaya yang ditanggung: {!! str_replace('<img', '<img class="img-fluid"', $programme->scholarship->hitcc_scholarship_costs_covered) !!}</li>
                        <li>Tahapan Seleksi: {!! str_replace('<img', '<img class="img-fluid"', $programme->scholarship->hitcc_scholarship_selection_phase) !!}</li>
                        <li>Guidebook: {!! str_replace('<img', '<img class="img-fluid"', $programme->scholarship->hitcc_scholarship_guidebook) !!}</li>
                    </ul>
                </div>
            @endif

            {{-- Exchange --}}
            @if($programme->category->slug === 'exchange' && $programme->exchange)
                <div class="opp-information p-3">
                    <h4>Informasi :</h4>
                    <ul>
                        <li>Deskripsi: {!! str_replace('<img', '<img class="img-fluid"', $programme->exchange->hitcc_exchange_program_desc) !!}</li>
                        <li>Lokasi: {{ $programme->exchange->hitcc_exchange_location }}</li>
                        <li>Durasi: {{ $programme->exchange->hitcc_exchange_duration }}</li>
                        <li>Jenis: {{ $programme->exchange->hitcc_exchange_type }}</li>
                        <li>Tipe Exchange: {{ $programme->exchange->hitcc_exchange_exchange_type }}</li>
                        <li>Benefit: {!! str_replace('<img', '<img class="img-fluid"', $programme->exchange->hitcc_exchange_benefit) !!}</li>
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
                        <li>{!! str_replace('<img', '<img class="img-fluid"', $programme->exchange->hitcc_exchange_selection_criteria) !!}</li>
                    </ul>
                </div>
                <div class="opp-register p-3">
                    <h4>Pendaftaran :</h4>
                    <ul>
                        <li>{!! str_replace('<img', '<img class="img-fluid"', $programme->registration_info) !!}</li>
                        <li>Batas Pendaftaran: {{ \Carbon\Carbon::parse($programme->registration_deadline)->format('d M Y') }}</li>
                        <li>Dokumen: {!! str_replace('<img', '<img class="img-fluid"', $programme->exchange->hitcc_exchange_documents) !!}</li>
                        <li>Biaya Registrasi: {{ $programme->exchange->hitcc_exchange_registration_fee }}</li>
                    </ul>
                </div>
                <div class="opp-additional p-3">
                    <h4>Informasi Tambahan :</h4>
                    <ul>
                        <li>Fasilitas: {!! str_replace('<img', '<img class="img-fluid"', $programme->exchange->hitcc_exchange_facilities) !!}</li>
                        <li>Akomodasi: {!! str_replace('<img', '<img class="img-fluid"', $programme->exchange->hitcc_exchange_accomodation) !!}</li>
                        <li>Aturan: {!! str_replace('<img', '<img class="img-fluid"', $programme->exchange->hitcc_exchange_rules) !!}</li>
                        <li>Detail Informasi: {!! str_replace('<img', '<img class="img-fluid"', $programme->exchange->hitcc_exchange_detail_information) !!}</li>
                    </ul>
                </div>
            @endif

            {{-- Competition --}}
            @if($programme->category->slug === 'competition' && $programme->competition)
                <div class="opp-information p-3">
                    <h4>Informasi :</h4>
                    <ul>
                        <li>Nama Program: {{ $programme->title_program }}</li>
                        <li>Tujuan Program: {!! str_replace('<img', '<img class="img-fluid"', $programme->competition->hitcc_competition_program_goals) !!}</li>
                        <li>Tipe Program: {{ $programme->competition->hitcc_competition_type }}</li>
                        <li>Kategori: {{ $programme->competition->hitcc_competition_category }}</li>
                        <li>Hadiah: {!! str_replace('<img', '<img class="img-fluid"', $programme->competition->hitcc_competition_prize) !!}</li>
                    </ul>
                </div>
                <div class="opp-condition p-3">
                    <h4>Persyaratan :</h4>
                    <ul>
                        <li>Usia Maksimal: {{ $programme->competition->hitcc_competition_max_age }}</li>
                        <li>Pendidikan Minimal: {{ $programme->competition->hitcc_competition_minimal_education }}</li>
                        <li>Persyaratan Lain: {!! str_replace('<img', '<img class="img-fluid"', $programme->competition->hitcc_competition_other_requirements) !!}</li>
                    </ul>
                </div>
                <div class="opp-register p-3">
                    <h4>Pendaftaran & Timeline :</h4>
                    <ul>
                        <li>{!! str_replace('<img', '<img class="img-fluid"', $programme->registration_info) !!}</li>
                        <li>Timeline: {!! str_replace('<img', '<img class="img-fluid"', $programme->competition->hitcc_competition_timeline) !!}</li>
                        <li>Batas Pendaftaran: {{ \Carbon\Carbon::parse($programme->registration_deadline)->format('d M Y') }}</li>
                        <li>Tipe Biaya: {{ $programme->competition->hitcc_competition_fee_type }}</li>
                        <li>Tempat: {{ $programme->competition->hitcc_competition_venue }}</li>
                        <li>Pengumuman: {{ $programme->competition->hitcc_competition_announcement }}</li>
                    </ul>
                </div>
                <div class="opp-additional p-3">
                    <h4>Informasi Tambahan :</h4>
                    <ul>
                        <li>Aturan: {!! str_replace('<img', '<img class="img-fluid"', $programme->competition->hitcc_competition_rules) !!}</li>
                        <li>Juri: {{ $programme->competition->hitcc_competition_jury }}</li>
                        <li>Syarat & Ketentuan: {!! str_replace('<img', '<img class="img-fluid"', $programme->competition->hitcc_competition_terms_condition) !!}</li>
                    </ul>
                </div>
            @endif

        </div>
    </div>

    <div class="opp-contact-container col-12 col-lg-5">
        <div class="opp-contact d-flex flex-column justify-content-start align-content-start p-3">
            <div class="opp-details-organizer p-3 text-break">
                <h4>Informasi Kontak</h4>
                @if(!empty($programme->company_number))
                    <p>No. Telepon : {{ $programme->company_number }}</p>
                @endif
                @if(!empty($programme->company_email))
                    <p>Email : <a href="mailto:{{ $programme->company_email }}">{{ $programme->company_email }}</a></p>
                @endif
                @if(!empty($programme->company_website))
                    <p>Website : <a href="{{ $programme->company_website }}" target="_blank">{{ $programme->company_website }}</a></p>
                @endif
                @if(!empty($programme->company_social_media))
                    <p>Media Sosial : <a href="{{ $programme->company_social_media }}" target="blank">{{ $programme->company_social_media }}</a></p>
                @endif
            </div>
        </div>
        @include('partials.hi-products')
    </div>
</div>
@endsection
