<div class="bg-white rounded-[24px] overflow-hidden shadow-[0_4px_24px_rgba(0,0,0,0.04)] border border-black/5 flex flex-col transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl">
  <!-- Program Image -->
  <div class="w-full h-[190px] sm:h-[210px] overflow-hidden bg-gray-100">
    <img src="{{ asset($program['image']) }}" alt="{{ $program['title'] }}" class="w-full h-full object-cover transition duration-500 hover:scale-105" loading="lazy" decoding="async" />
  </div>
  <!-- Card Body -->
  <div class="p-6 sm:p-7 flex flex-col justify-between flex-1">
    <div>
      <div class="flex items-center justify-between gap-2 mb-3">
        <span class="px-3.5 py-1 rounded-full text-[11px] font-bold tracking-wider uppercase {{ ($program['badge'] ?? '') === 'ONLINE' ? 'bg-[#181E5F] text-white' : 'bg-[#FFF2E5] text-[#F5821F]' }}">
          {{ $program['badge'] }}
        </span>
        <span class="text-xs text-gray-400 font-medium">{{ $program['category'] }}</span>
      </div>
      <h4 class="font-black text-xl sm:text-[22px] text-[#152A5E] {{ !empty($program['subtitle']) ? 'mb-1' : 'mb-2.5' }}">
        {{ $program['title'] }}
      </h4>
      @if(!empty($program['subtitle']))
        <p class="text-xs font-semibold text-[#F5821F] mb-2.5">
          {{ $program['subtitle'] }}
        </p>
      @endif
      <p class="text-xs sm:text-sm text-[#5D5B62] leading-relaxed mb-6">
        {{ $program['description'] }}
      </p>
    </div>
    <a href="{{ route($program['route']) }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-bold text-[#F5821F] hover:text-[#e06505] transition-all hover:gap-2.5">
      <span>Learn More</span>
      <span class="text-base leading-none">&rarr;</span>
    </a>
  </div>
</div>
