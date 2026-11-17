@php
$cards = $opportunities instanceof \Illuminate\Support\Collection ? $opportunities->take(7) : collect([$opportunities]);
@endphp

<div class="cards-container max-w-7xl mx-auto flex flex-wrap gap-3 my-4 justify-around items-center">

    {{-- Loop kartu --}}
    @foreach($cards as $opp)
        <div class="card-box-home flex justify-center items-center px-4 md:px-0" style="width: 300px;">
            <a href="{{ route('programme.hi.show', ['category' => $opp->category->slug ?? 'general', 'slug' => $opp->slug]) }}" class="card-custom flex flex-col" style="height: 280px; border-radius: 8px; overflow: hidden; position: relative;">
                
                {{-- Top background --}}
                <div class="bg-top" style="height: 60%; background-image: url('{{ $opp->bg_poster_img ? Storage::url($opp->bg_poster_img) : asset('img/homepage/img-opp/default.png') }}'); background-size: cover; background-position: center;"></div>
                
                {{-- Bottom white with gradient --}}
                <div class="bg-bottom absolute bottom-0 left-0 right-0" style="height: 100%; background: linear-gradient(180deg,rgba(0, 0, 0, 0) 0%, rgba(255, 255, 255, 1) 55%);"></div>

                {{-- Overlay --}}
                <div class="card-overlay-home absolute w-full h-full bg-black opacity-0" style="top:0; left:0;"></div>

                {{-- Body --}}
                <div class="card-body-home absolute top-0 ms-2 w-full h-full flex flex-col justify-center items-start px-3 py-2" style="z-index: 1;">
                    <div class="card-title-home flex items-center gap-2 mb-2">
                        <img src="{{ $opp->logo_company_img ? Storage::url($opp->logo_company_img) : asset('img/logo.webp') }}" class="logo w-1/4" alt="Logo" loading="lazy" decoding="async">
                        <div class="w-3/4 flex flex-col gap-1 text-black">
                            <h1 class="m-0" style="font-size: clamp(1rem, 1vw, 1.4rem);">{{ $opp->title_program }}</h1>
                            <p class="m-0" style="font-size: clamp(0.9rem, 1vw, 1rem);">{{ $opp->company_name }}</p>
                        </div>
                    </div>

                    {{-- Card details --}}
                    <div class="card-details-home flex gap-3 items-center mt-4 text-black">
                        <div class="card-icon-home flex flex-col items-center gap-3 w-1/4 text-sm">
                            @switch($opp->category->slug ?? 'general')
                                @case('internship')
                                    <i class="text-2xl fa-solid fa-user text-transparent bg-clip-text bg-linear-to-r from-blue-800 to-blue-900"></i>
                                    <i class="text-2xl fa-solid fa-briefcase text-transparent bg-clip-text bg-linear-to-b from-[#4B2A14] to-[#D29B6D]"></i>
                                    <i class="text-2xl fa-solid fa-clock text-transparent bg-clip-text bg-linear-to-tr from-orange-400 to-yellow-500"></i>
                                    @break
                                @case('scholarship')
                                    <i class="text-2xl fa-solid fa-money-bill-wave text-transparent bg-clip-text bg-linear-to-r from-green-800 to-green-700"></i>
                                    <i class="text-2xl fa-solid fa-graduation-cap text-transparent bg-clip-text bg-linear-to-b from-black to-red-700"></i>
                                    <i class="text-2xl fa-solid fa-clock text-transparent bg-clip-text bg-linear-to-tr from-orange-400 to-yellow-500"></i>
                                    @break
                                @case('competition')
                                    <i class="text-2xl fa-solid fa-user text-transparent bg-clip-text bg-linear-to-r from-blue-800 to-blue-900"></i>
                                    <i class="text-2xl fa-solid fa-award text-transparent bg-clip-text bg-linear-to-r from-yellow-400 to-yellow-700"></i>
                                    <i class="text-2xl fa-solid fa-clock text-transparent bg-clip-text bg-linear-to-tr from-orange-400 to-yellow-500"></i>
                                    @break
                                @case('volunteer')
                                    <i class="text-2xl fa-solid fa-money-bill-wave text-transparent bg-clip-text bg-linear-to-r from-green-800 to-green-700"></i>
                                    <i class="text-2xl fa-solid fa-handshake-angle text-transparent bg-clip-text bg-linear-to-r from-yellow-400 to-pink-500"></i>
                                    <i class="text-2xl fa-solid fa-clock text-transparent bg-clip-text bg-linear-to-tr from-orange-400 to-yellow-500"></i>
                                    @break
                                @case('exchange')
                                    <i class="text-2xl fa-solid fa-money-bill-wave text-transparent bg-clip-text bg-linear-to-r from-green-800 to-green-700"></i>
                                    <i class="text-2xl fa-solid fa-user-graduate text-transparent bg-clip-text bg-linear-to-b from-black to-yellow-500"></i>
                                    <i class="text-2xl fa-solid fa-clock text-transparent bg-clip-text bg-linear-to-tr from-orange-400 to-yellow-500"></i>
                                    @break
                                @default
                                    <i class="text-2xl fa-solid fa-money-bill-wave text-transparent bg-clip-text bg-linear-to-r from-green-800 to-green-700"></i>
                                    <i class="text-2xl fa-solid fa-user text-transparent bg-clip-text bg-linear-to-r from-blue-800 to-blue-900"></i>
                                    <i class="text-2xl fa-solid fa-clock text-transparent bg-clip-text bg-linear-to-tr from-orange-400 to-yellow-500"></i>
                            @endswitch
                        </div>

                        <div class="card-info-home flex flex-col gap-4 w-3/4 text-primary_HI">
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
    <div class="card-box-home flex justify-center content-around px-4 md:px-0" style="width: 300px;">
        <a href="{{ route('programme.hi.index') }}" class="card-custom flex flex-col justify-center items-center" style="height: 280px; border-radius: 8px; background: url('{{ asset('img/homepage/poster-HITCC.webp') }}') center/cover;">
            <div class="card-body flex justify-center items-center absolute top-0 left-0 w-full h-full" style="z-index:1;">
                <p class="text-white text-2xl m-0">See More...</p>
            </div>
        </a>
    </div>

</div>
