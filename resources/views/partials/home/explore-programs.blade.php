<!-- Explore Our Program Section -->
<section id="our-programs" class="explore-programs w-full bg-[#FFF8F0] py-16 sm:py-20 lg:py-24" data-aos="fade-up">
  <div class="max-w-[1440px] mx-auto px-6 sm:px-10 lg:px-[80px]">
    <!-- Section Header -->
    <div class="flex flex-col items-center text-center mb-12 sm:mb-16">
      <h2 class="font-black text-3xl sm:text-4xl lg:text-[40px] text-[#F5821F] tracking-tight uppercase mb-4">
        EXPLORE OUR PROGRAM
      </h2>
      <p class="text-[#44464E] text-sm sm:text-base md:text-lg max-w-3xl leading-relaxed">
        Temukan program yang sesuai dengan kebutuhanmu – mulai dari eksplorasi career path, belajar skill, menemukan opportunity, hingga mendapatkan pengalaman langsung di dunia kerja.
      </p>
    </div>

    <!-- Group 1: ONLINE PROGRAMS -->
    <div class="mb-14 sm:mb-16">
      <div class="w-full max-w-[1280px] h-[36px] flex items-center justify-between mb-6 sm:mb-8">
        <h3 class="font-bold text-2xl leading-[36px] text-[#152A5E] tracking-wider uppercase">
          ONLINE PROGRAMS
        </h3>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
        @foreach($onlinePrograms as $program)
          @include('partials.home.program-card', ['program' => $program])
        @endforeach
      </div>
    </div>

    <!-- Group 2: OFFLINE PROGRAMS -->
    <div>
      <div class="w-full max-w-[1280px] h-[36px] flex items-center justify-between mb-6 sm:mb-8">
        <h3 class="font-bold text-2xl leading-[36px] text-[#152A5E] tracking-wider uppercase">
          OFFLINE PROGRAMS
        </h3>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
        @foreach($offlinePrograms as $program)
          @include('partials.home.program-card', ['program' => $program])
        @endforeach
      </div>
    </div>
  </div>
</section>
