@php
    $categoryLabels = [
        'internship' => 'Magang',
        'volunteer' => 'Relawan',
        'scholarship' => 'Beasiswa',
        'exchange' => 'Pertukaran',
        'competition' => 'Kompetisi',
    ];
@endphp

<!-- Header Row: Title & Results Count -->
<div class="flex items-center justify-between mb-6 sm:mb-8">
    <h2 class="font-editorial text-2xl sm:text-3xl font-bold text-[#152A5E]">
        Jelajahi Peluang
    </h2>
    <span class="text-xs sm:text-sm text-gray-400 font-normal font-sans-clean" id="results-count">
        {{ $opportunities->total() }} hasil
    </span>
</div>

<!-- Opportunity Cards Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
    @forelse($opportunities as $opp)
        @php
            $catSlug = strtolower($opp->category->slug ?? '');
            $badgeName = $categoryLabels[$catSlug] ?? ($opp->category->name ?? 'Peluang');
            $descText = $opp->company_desc ?: ($opp->registration_info ?: 'Temukan program dan kesempatan terbaik untuk mengembangkan potensimu bersama House Ilmu Indonesia.');
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
                        <i class="fa-regular fa-image text-3xl"></i>
                        <span class="text-[10px] tracking-[0.2em] font-bold text-gray-400 uppercase">GAMBAR KESEMPATAN</span>
                    </div>
                @endif
            </div>

            <!-- Bottom: Content Body -->
            <div class="p-6 flex flex-col justify-between flex-1">
                <div>
                    <!-- Category Badge -->
                    <span class="bg-[#EBF3FF] text-[#1856C9] px-3.5 py-1 rounded-full text-xs font-semibold inline-block mb-3 w-fit tracking-wide font-sans-clean">
                        {{ $badgeName }}
                    </span>

                    <!-- Title -->
                    <h3 class="font-editorial text-lg sm:text-xl font-bold text-[#152A5E] leading-snug mb-2 line-clamp-2">
                        {{ $opp->title_program }}
                    </h3>

                    <!-- Description -->
                    <p class="text-xs sm:text-[13px] text-gray-600 leading-relaxed font-sans-clean mb-6 line-clamp-3">
                        {{ $descText }}
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

<!-- Pagination if needed -->
@if($opportunities->hasPages())
    <div class="mt-10 flex items-center justify-center gap-2">
        {{ $opportunities->links('partials.pagination') }}
    </div>
@endif
