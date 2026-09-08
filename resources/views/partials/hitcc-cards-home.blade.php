@php
$cards = $opportunities instanceof \Illuminate\Support\Collection ? $opportunities->take(7) : collect([$opportunities]);
@endphp

<div class="cards-container container-xxl d-flex flex-wrap gap-3 my-4 justify-content-around align-items-center">

    {{-- Loop kartu --}}
    @foreach($cards as $opp)
        <div class="card-box-home d-flex justify-content-center align-items-center px-4 px-md-0" style="width: 300px;">
            <a href="{{ route('programme.hi.show', ['category' => $opp->category->slug ?? 'general', 'slug' => $opp->slug]) }}" class="card-custom d-flex flex-column" style="height: 280px; border-radius: 8px; overflow: hidden; position: relative;">
                
                {{-- Top background --}}
                <div class="bg-top" style="height: 60%; background-image: url('{{ $opp->bg_poster_img ? Storage::url($opp->bg_poster_img) : asset('img/homepage/img-opp/default.png') }}'); background-size: cover; background-position: center;"></div>
                
                {{-- Bottom white with gradient --}}
                <div class="bg-bottom absolute bottom-0 left-0 right-0" style="height: 100%; background: linear-gradient(180deg,rgba(0, 0, 0, 0) 0%, rgba(255, 255, 255, 1) 55%);"></div>

                {{-- Overlay --}}
                <div class="card-overlay-home position-absolute w-100 h-100 bg-black opacity-0" style="top:0; left:0;"></div>

                {{-- Body --}}
                <div class="card-body-home position-absolute top-0 ms-2 w-100 h-100 d-flex flex-column justify-content-center align-items-start px-3 py-2" style="z-index: 1;">
                    <div class="card-title-home d-flex align-items-center gap-2 mb-2">
                        <img src="{{ $opp->logo_company_img ? Storage::url($opp->logo_company_img) : asset('img/logo.webp') }}" class="logo col-3" alt="Logo">
                        <div class="col-9 d-flex flex-column gap-1 text-black">
                            <h1 class="m-0" style="font-size: clamp(1rem, 1vw, 1.4rem);">{{ $opp->title_program }}</h1>
                            <p class="m-0" style="font-size: clamp(0.9rem, 1vw, 1rem);">{{ $opp->company_name }}</p>
                        </div>
                    </div>

                    {{-- Card details --}}
                    <div class="card-details-home d-flex gap-3 align-items-center mt-4 text-black">
                        <div class="card-icon-home d-flex flex-column align-items-center gap-3 col-3 text-sm">
                            @switch($opp->category->slug ?? 'general')
                                @case('internship')
                                    <i class="text-2xl fa-solid fa-user text-transparent bg-clip-text bg-gradient-to-r from-blue-800 to-blue-900"></i>
                                    <i class="text-2xl fa-solid fa-briefcase text-transparent bg-clip-text bg-gradient-to-b from-[#4B2A14] to-[#D29B6D]"></i>
                                    <i class="text-2xl fa-solid fa-clock text-transparent bg-clip-text bg-gradient-to-tr from-orange-400 to-yellow-500"></i>
                                    @break
                                @case('scholarship')
                                    <i class="text-2xl fa-solid fa-money-bill-wave text-transparent bg-clip-text bg-gradient-to-r from-green-800 to-green-700"></i>
                                    <i class="text-2xl fa-solid fa-graduation-cap text-transparent bg-clip-text bg-gradient-to-b from-black to-red-700"></i>
                                    <i class="text-2xl fa-solid fa-clock text-transparent bg-clip-text bg-gradient-to-tr from-orange-400 to-yellow-500"></i>
                                    @break
                                @case('competition')
                                    <i class="text-2xl fa-solid fa-user text-transparent bg-clip-text bg-gradient-to-r from-blue-800 to-blue-900"></i>
                                    <i class="text-2xl fa-solid fa-award text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-700"></i>
                                    <i class="text-2xl fa-solid fa-clock text-transparent bg-clip-text bg-gradient-to-tr from-orange-400 to-yellow-500"></i>
                                    @break
                                @case('volunteer')
                                    <i class="text-2xl fa-solid fa-money-bill-wave text-transparent bg-clip-text bg-gradient-to-r from-green-800 to-green-700"></i>
                                    <i class="text-2xl fa-solid fa-handshake-angle text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-pink-500"></i>
                                    <i class="text-2xl fa-solid fa-clock text-transparent bg-clip-text bg-gradient-to-tr from-orange-400 to-yellow-500"></i>
                                    @break
                                @case('exchange')
                                    <i class="text-2xl fa-solid fa-money-bill-wave text-transparent bg-clip-text bg-gradient-to-r from-green-800 to-green-700"></i>
                                    <i class="text-2xl fa-solid fa-user-graduate text-transparent bg-clip-text bg-gradient-to-b from-black to-yellow-500"></i>
                                    <i class="text-2xl fa-solid fa-clock text-transparent bg-clip-text bg-gradient-to-tr from-orange-400 to-yellow-500"></i>
                                    @break
                                @default
                                    <i class="text-2xl fa-solid fa-money-bill-wave text-transparent bg-clip-text bg-gradient-to-r from-green-800 to-green-700"></i>
                                    <i class="text-2xl fa-solid fa-user text-transparent bg-clip-text bg-gradient-to-r from-blue-800 to-blue-900"></i>
                                    <i class="text-2xl fa-solid fa-clock text-transparent bg-clip-text bg-gradient-to-tr from-orange-400 to-yellow-500"></i>
                            @endswitch
                        </div>

                        <div class="card-info-home d-flex flex-column gap-4 col-9 text-primary_HI">
                            @switch($opp->category->slug ?? 'general')
                                @case('internship')
                                    <p class="m-0">Internship</p>
                                    <p class="m-0">{{ $opp->internship->hitcc_internship_position ?? '-' }}</p>
                                    <p class="m-0">{{ \Carbon\Carbon::parse($opp->registration_deadline)->format('d M Y') }}</p>
                                    @break
                                @case('scholarship')
                                    <p class="m-0">{{ $opp->scholarship->hitcc_scholarship_scholar_type ?? '-' }}</p>
                                    <p class="m-0">Beasiswa</p>
                                    <p class="m-0">{{ \Carbon\Carbon::parse($opp->registration_deadline)->format('d M Y') }}</p>
                                    @break
                                @case('competition')
                                    <p class="m-0">{{ $opp->competition->hitcc_competition_category ?? '-' }}</p>
                                    <p class="m-0">{{ $opp->competition->hitcc_competition_competition_type ?? '-' }}</p>
                                    <p class="m-0">{{ \Carbon\Carbon::parse($opp->registration_deadline)->format('d M Y') }}</p>
                                    @break
                                @case('volunteer')
                                    <p class="m-0">{{ $opp->volunteer->hitcc_volunteer_type ?? '-' }}</p>
                                    <p class="m-0">{{ $opp->volunteer->hitcc_volunteer_volunteer_type ?? '-' }}</p>
                                    <p class="m-0">{{ \Carbon\Carbon::parse($opp->registration_deadline)->format('d M Y') }}</p>
                                    @break
                                @case('exchange')
                                    <p class="m-0">{{ $opp->exchange->hitcc_exchange_type ?? '-' }}</p>
                                    <p class="m-0">{{ $opp->exchange->hitcc_exchange_exchange_type ?? '-' }}</p>
                                    <p class="m-0">{{ \Carbon\Carbon::parse($opp->registration_deadline)->format('d M Y') }}</p>
                                    @break
                                @default
                                    <p class="m-0">-</p>
                                    <p class="m-0">-</p>
                                    <p class="m-0">-</p>
                            @endswitch
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach

    {{-- Kotak See More --}}
    <div class="card-box-home d-flex justify-content-center align-content-around px-4 px-md-0" style="width: 300px;">
        <a href="{{ route('programme.hi.index') }}" class="card-custom d-flex flex-column justify-content-center align-items-center" style="height: 280px; border-radius: 8px; background: url('{{ asset('img/homepage/poster-HITCC.webp') }}') center/cover;">
            <div class="card-body d-flex justify-content-center align-items-center position-absolute top-0 start-0 w-100 h-100" style="z-index:1;">
                <p class="text-white fs-4 m-0">See More...</p>
            </div>
        </a>
    </div>

</div>
