<!-- Meta bar: Counts & Sort -->
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
    <div class="flex flex-wrap items-center gap-2 text-xs sm:text-sm font-medium text-gray-800">
        <span>Menampilkan <span class="text-[#FF731D] font-bold">{{ $opportunities->count() }}</span> dari <span class="font-bold text-gray-900">{{ $opportunities->total() }}</span> Peluang Terbaru</span>
        <span class="px-2.5 py-0.5 rounded-full bg-[#FFE8D6] text-[#FF731D] text-[11px] font-bold tracking-wide">Update Harian</span>
    </div>

    <div class="relative w-full sm:w-auto">
        <select id="sort-select" class="w-full sm:w-auto appearance-none bg-white border border-gray-200 text-gray-700 text-xs sm:text-sm font-semibold py-2 pl-4 pr-9 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#FF731D]/20 shadow-xs cursor-pointer">
            <option value="deadline_asc" {{ request('sort', 'deadline_asc') == 'deadline_asc' ? 'selected' : '' }}>Urutkan: Batas Waktu Terdekat</option>
            <option value="deadline_desc" {{ request('sort') == 'deadline_desc' ? 'selected' : '' }}>Urutkan: Batas Waktu Terjauh</option>
            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Urutkan: Terbaru</option>
        </select>
        <i class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs pointer-events-none"></i>
    </div>
</div>

<!-- Opportunity Cards Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
    @forelse($opportunities as $opp)
        @php
            $deadline = $opp->registration_deadline ? \Carbon\Carbon::parse($opp->registration_deadline) : null;
            $now = \Carbon\Carbon::now();
            $daysLeft = $deadline ? (int) ceil($now->floatDiffInDays($deadline, false)) : null;
            $deadlineFormatted = $deadline ? $deadline->locale('id')->isoFormat('D MMMM Y') : 'Segera';

            $categoryName = $opp->category->name ?? 'Opportunity';
            $categorySlug = $opp->category->slug ?? '';
            $workMode = 'Hybrid';
            $companyLocation = 'Jakarta (Hybrid)';
            $locationDetail = 'Hybrid • Jakarta Selatan';
            $benefitDetail = 'Paid Internship & Mentoring 1-on-1';

            if ($categorySlug === 'internship' && $opp->internship) {
                $loc = $opp->internship->hitcc_internship_location ?: 'Jakarta (Hybrid)';
                $workMode = str_contains(strtolower($loc), 'remote') || str_contains(strtolower($loc), 'wfh') ? 'Remote' : (str_contains(strtolower($loc), 'onsite') ? 'Onsite' : 'Hybrid');
                $companyLocation = $loc;
                $locationDetail = $loc;
                $benefitDetail = $opp->internship->hitcc_internship_allowance ?: ($opp->internship->hitcc_internship_position ?: 'Paid Internship');
            } elseif ($categorySlug === 'volunteer' && $opp->volunteer) {
                $workMode = $opp->volunteer->hitcc_volunteer_type ?: 'Hybrid';
                $loc = $opp->volunteer->hitcc_volunteer_location ?: 'Jakarta (Hybrid)';
                $companyLocation = $loc;
                $locationDetail = $loc;
                $benefitDetail = $opp->volunteer->hitcc_volunteer_volunteer_type ?: 'Social Impact & Networking';
            } elseif ($categorySlug === 'scholarship' && $opp->scholarship) {
                $workMode = 'Online';
                $companyLocation = 'Nasional';
                $locationDetail = 'Nasional & Online';
                $benefitDetail = $opp->scholarship->hitcc_scholarship_scholar_type ?: 'Bantuan Pendidikan & Mentoring';
            } elseif ($categorySlug === 'exchange' && $opp->exchange) {
                $workMode = $opp->exchange->hitcc_exchange_type ?: 'Fully Funded';
                $loc = $opp->exchange->hitcc_exchange_location ?: 'Tokyo, Jepang';
                $companyLocation = $loc;
                $locationDetail = $loc;
                $benefitDetail = $opp->exchange->hitcc_exchange_duration ? 'Durasi ' . $opp->exchange->hitcc_exchange_duration : 'International Exposure';
            } elseif ($categorySlug === 'competition' && $opp->competition) {
                $workMode = 'Kompetisi';
                $loc = $opp->competition->hitcc_competition_venue ?: 'Online';
                $companyLocation = $loc;
                $locationDetail = $loc;
                $benefitDetail = $opp->competition->hitcc_competition_prize ?: 'Total Hadiah & Sertifikat';
            }

            // Poster image fallback
            $poster = $opp->bg_poster_img ? Storage::url($opp->bg_poster_img) : asset('img/homepage/poster-HITCC.webp');
        @endphp

        <div class="bg-white border-[3px] border-[#0A192F] rounded-[24px] p-5 sm:p-6 flex flex-col justify-between shadow-xs transition-transform duration-300 hover:-translate-y-1">
            <div>
                <!-- Top Tags -->
                <div class="flex items-center justify-between text-xs text-[#8C6D46] font-semibold mb-3">
                    <span>{{ $categoryName }} • {{ $workMode }}</span>
                    @if($daysLeft !== null)
                        <span class="flex items-center gap-1.5">
                            <i class="fa-regular fa-clock"></i>
                            @if($daysLeft > 0)
                                {{ $daysLeft }} Hari Lagi
                            @elseif($daysLeft == 0)
                                Hari Terakhir
                            @else
                                Ditutup
                            @endif
                        </span>
                    @endif
                </div>

                <!-- Poster Area (Kosongan / Clean Placeholder) -->
                @if($opp->bg_poster_img && Storage::disk('public')->exists($opp->bg_poster_img))
                    <div class="w-full aspect-[4/3] rounded-[16px] overflow-hidden bg-gray-50 mb-3.5 border border-gray-100 flex items-center justify-center">
                        <img 
                            src="{{ Storage::url($opp->bg_poster_img) }}" 
                            alt="{{ $opp->title_program }}" 
                            class="w-full h-full object-cover object-top hover:scale-105 transition duration-500" 
                            loading="lazy" 
                            decoding="async"
                        >
                    </div>
                @else
                    <div class="w-full aspect-[4/3] rounded-[16px] bg-[#EEF2F7] mb-3.5 border border-gray-200/70 flex items-center justify-center">
                        <i class="fa-regular fa-image text-3xl text-gray-300"></i>
                    </div>
                @endif

                <!-- Title -->
                <h3 class="font-extrabold text-[#0A192F] text-base sm:text-lg leading-snug line-clamp-2 mb-2 min-h-[46px]">
                    {{ $opp->title_program }}
                </h3>

                <!-- Company & Location Summary -->
                <div class="flex items-center gap-1.5 text-xs text-gray-500 font-medium mb-3.5">
                    <i class="fa-regular fa-building text-gray-400 shrink-0"></i>
                    <span class="truncate">{{ $opp->company_name }} • {{ $companyLocation }}</span>
                </div>

                <!-- Detail Information Box -->
                <div class="bg-[#FFF9F2] border border-[#FFE7D0] rounded-[16px] p-3.5 flex flex-col gap-2.5 mb-5">
                    <div class="flex items-center gap-2 text-xs text-[#4A3B32]">
                        <i class="fa-solid fa-location-dot text-[#FF731D] w-4 text-center shrink-0"></i>
                        <span class="truncate font-semibold">{{ $locationDetail }}</span>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-[#4A3B32]">
                        <i class="fa-solid fa-briefcase text-[#FF731D] w-4 text-center shrink-0"></i>
                        <span class="truncate font-semibold">{{ $benefitDetail }}</span>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-[#4A3B32]">
                        <i class="fa-regular fa-calendar-check text-[#FF731D] w-4 text-center shrink-0"></i>
                        <span class="truncate font-semibold">Batas: {{ $deadlineFormatted }}</span>
                    </div>
                </div>
            </div>

            <!-- Action Button -->
            <div>
                <a 
                    href="{{ route('programme.hi.show', ['category' => $opp->category->slug, 'slug' => $opp->slug]) }}" 
                    class="w-full py-2.5 px-4 rounded-full bg-[#FF731D] hover:bg-[#E8620D] text-black font-black text-xs sm:text-sm tracking-wider uppercase text-center border-2 border-[#0A192F] transition duration-200 block shadow-xs"
                >
                    DAFTAR SEKARANG
                </a>
            </div>
        </div>
    @empty
        <div class="col-span-full py-16 text-center">
            <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-orange-100 flex items-center justify-center text-[#FF731D] text-2xl">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <h4 class="font-bold text-gray-800 text-lg mb-1">Peluang tidak ditemukan</h4>
            <p class="text-sm text-gray-500">Coba ubah kata kunci pencarian atau pilih kategori yang lain.</p>
        </div>
    @endforelse
</div>

<!-- Pagination -->
<div class="mt-8">
    {{ $opportunities->links('partials.pagination') }}
</div>
