<!-- Our Impact Section -->
<section class="our-impact w-full bg-[#1A5CBA] py-12 sm:py-16 lg:py-[72px]" data-aos="fade-up">
  <div class="max-w-[1440px] mx-auto px-6 sm:px-10 lg:px-[80px] flex flex-col items-center gap-8 lg:gap-[32px]">
    <!-- Header -->
    <div class="flex flex-col items-center text-center max-w-2xl">
      <h2 class="font-black text-3xl sm:text-4xl lg:text-[40px] text-[#F5821F] tracking-tight uppercase mb-3">
        OUR IMPACT
      </h2>
      <p class="text-[#D1D5DB] text-sm sm:text-base md:text-lg font-normal leading-relaxed">
        Berbagai program House Ilmu Indonesia menjadi ruang belajar, eksplorasi, dan koneksi bagi mahasiswa yang ingin bertumbuh
      </p>
    </div>

    <!-- Cards Grid -->
    <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      @foreach($impacts as $impact)
        <div class="bg-white rounded-[20px] p-6 sm:p-7 flex flex-col justify-between min-h-[170px] sm:min-h-[185px] shadow-[0_4px_20px_rgba(0,0,0,0.06)] transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
          <span class="text-xs font-bold tracking-wider uppercase text-[#F5821F]">
            {{ $impact['tag'] }}
          </span>
          <span class="font-black text-4xl sm:text-5xl lg:text-[48px] leading-tight text-[#152A5E] my-2">
            {{ $impact['value'] }}
          </span>
          <span class="text-sm sm:text-base font-medium text-[#44464E]">
            {{ $impact['label'] }}
          </span>
        </div>
      @endforeach
    </div>
  </div>
</section>
