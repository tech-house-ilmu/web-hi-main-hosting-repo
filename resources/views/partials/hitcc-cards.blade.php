<div class="cards-container container-xxl d-flex flex-wrap my-4 gap-3 justify-content-center align-items-start">
    @forelse($opportunities as $opp)
    <div class="card-box px-4 px-md-0">
        <a href="{{ route('programme.hi.show', ['category' => $opp->category->slug, 'slug' => $opp->slug]) }}" class="card-custom d-flex align-items-center" style="height: 300px;">
            <img src="{{ $opp->bg_poster_img ? Storage::url($opp->bg_poster_img) : asset('img/homepage/img-opp/default.png') }}" style="background: cover/center no-repeat; width: 100%; height: 100%;" alt="{{ $opp->title }}">
            <div class="card-overlay"></div>
            <div class="card-body small-text">
                <div class="card-title d-flex align-items-center gap-2">
                    <img src="{{ $opp->logo_company_img ? Storage::url($opp->logo_company_img) : asset('img/logo.webp') }}" class="logo col-3" alt="Logo">
                    <div class="col-9 d-flex flex-column gap-2 text-primary_HI">
                        <h1 style="font-size: clamp(0.8rem, 1vw, 0.9rem);">{{ $opp->title_program }}</h1>
                        <h5 style="font-size: clamp(0.8rem, 1vw, 0.8rem);">{{ $opp->company_name }}</h5>
                    </div>
                </div>

                {{-- Card details sesuai kategori --}}
                <div class="card-details mt-3 d-flex flex-row align-items-center gap-2">
                    <div class="card-icon col-3 d-flex flex-column align-items-center justify-content-start gap-3">
                        @switch($opp->category->slug)
                            @case('internship')
                                <i class="fa-solid fa-user text-transparent bg-clip-text bg-gradient-to-r from-blue-800 to-blue-900"></i>
                                <i class="fa-solid fa-briefcase text-transparent bg-clip-text bg-gradient-to-b from-[#4B2A14] to-[#D29B6D]"></i>
                                <i class="fa-solid fa-clock text-transparent bg-clip-text bg-gradient-to-tr from-orange-400 to-yellow-500"></i>
                                @break
                            @case('scholarship')
                                <i class="fa-solid fa-money-bill-wave text-transparent bg-clip-text bg-gradient-to-r from-green-800 to-green-700"></i>
                                <i class="fa-solid fa-graduation-cap text-transparent bg-clip-text bg-gradient-to-b from-black to-red-700"></i>
                                <i class="fa-solid fa-clock text-transparent bg-clip-text bg-gradient-to-tr from-orange-400 to-yellow-500"></i>
                                @break
                            @case('competition')
                                <i class="fa-solid fa-user text-transparent bg-clip-text bg-gradient-to-r from-blue-800 to-blue-900"></i>
                                <i class="fa-solid fa-award text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-700"></i>
                                <i class="fa-solid fa-clock text-transparent bg-clip-text bg-gradient-to-tr from-orange-400 to-yellow-500"></i>
                                @break
                            @case('volunteer')
                                <i class="fa-solid fa-money-bill-wave text-transparent bg-clip-text bg-gradient-to-r from-green-800 to-green-700"></i>
                                <i class="fa-solid fa-handshake-angle text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-pink-500"></i>
                                <i class="fa-solid fa-clock text-transparent bg-clip-text bg-gradient-to-tr from-orange-400 to-yellow-500"></i>
                                @break
                            @case('exchange')
                                <i class="fa-solid fa-money-bill-wave text-transparent bg-clip-text bg-gradient-to-r from-green-800 to-green-700"></i>
                                <i class="fa-solid fa-user-graduate text-transparent bg-clip-text bg-gradient-to-b from-black to-yellow-500"></i>
                                <i class="fa-solid fa-clock text-transparent bg-clip-text bg-gradient-to-tr from-orange-400 to-yellow-500"></i>
                                @break
                            @default
                                <i class="fa-solid fa-money-bill-wave text-transparent bg-clip-text bg-gradient-to-r from-green-800 to-green-700"></i>
                                <i class="fa-solid fa-user text-transparent bg-clip-text bg-gradient-to-r from-blue-800 to-blue-900"></i>
                                <i class="fa-solid fa-clock text-transparent bg-clip-text bg-gradient-to-tr from-orange-400 to-yellow-500"></i>
                        @endswitch
                    </div>

                    <div class="card-info col-9 d-flex flex-column align-items-start gap-2 text-primary_HI">
                        @switch($opp->category->slug)
                            @case('internship')
                                <p>Internship</p>
                                <p>{{ $opp->internship->hitcc_internship_position ?? '-' }}</p>
                                <p>{{ \Carbon\Carbon::parse($opp->registration_deadline)->format('d M Y') }}</p>
                                @break
                            @case('scholarship')
                                <p>{{ $opp->scholarship->hitcc_scholarship_scholar_type ?? '-' }}</p>
                                <p>Beasiswa</p>
                                <p>{{ \Carbon\Carbon::parse($opp->registration_deadline)->format('d M Y') }}</p>
                                @break
                            @case('competition')
                                <p>{{ $opp->competition->hitcc_competition_category ?? '-' }}</p>
                                <p>{{ $opp->competition->hitcc_competition_competition_type ?? '-' }}</p>
                                <p>{{ \Carbon\Carbon::parse($opp->registration_deadline)->format('d M Y') }}</p>
                                @break
                            @case('volunteer')
                                <p>{{ $opp->volunteer->hitcc_volunteer_type ?? '-' }}</p>
                                <p>{{ $opp->volunteer->hitcc_volunteer_volunteer_type ?? '-' }}</p>
                                <p>{{ \Carbon\Carbon::parse($opp->registration_deadline)->format('d M Y') }}</p>
                                @break
                            @case('exchange')
                                <p>{{ $opp->exchange->hitcc_exchange_type ?? '-' }}</p>
                                <p>{{ $opp->exchange->hitcc_exchange_exchange_type ?? '-' }}</p>
                                <p>{{ \Carbon\Carbon::parse($opp->registration_deadline)->format('d M Y') }}</p>
                                @break
                            @default
                                <p>-</p>
                                <p>-</p>
                                <p>-</p>
                        @endswitch
                    </div>
                </div>
            </div>
        </a>
    </div>
    @empty
        <p class="text-center text-muted">Belum ada program untuk kategori ini.</p>
    @endforelse
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $opportunities->links() }}
</div>
