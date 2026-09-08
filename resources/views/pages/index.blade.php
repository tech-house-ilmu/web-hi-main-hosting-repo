@extends('layout.app')

@section('title', 'Beranda | House Ilmu Indonesia')
@section('meta_description', 'Persiapkan karir dan temukan jalan karirmu dengan mentoring bersama House Ilmu Indonesia!')
@section('meta_keywords', 'house ilmu indonesia, career, mentoring, internship, karir, cv, volunteer, mahasiswa, pengembangan karir, mahasiswa')
@section('canonical', url()->current())

@section('og_title', 'Mentoring, Review CV, & Webinar Karir – House Ilmu Indonesia')
@section('og_description', 'Platform mentoring buat persiapin karir kamu! Yuk bergabung bersama House Ilmu Indonesia!')
@section('og_image', asset('img/house-ilmu-indonesia.webp'))

@section('twitter_title', 'Mentoring, Review CV, & Webinar Karir – House Ilmu Indonesia')
@section('twitter_description', 'Platform mentoring buat persiapin karir kamu! Yuk bergabung bersama House Ilmu Indonesia!')
@section('twitter_image', asset('img/house-ilmu-indonesia.webp'))

@section('head')
  <style>
    @media only screen and (max-width: 767px) {
      .upcoming .upcoming-desc img {
        width: 70vw;
      }
    }

    .upcoming .upcoming-event-desc p,
    .upcoming .upcoming-event-desc ul li {
      font-size: clamp(0.8rem, 1vw, 0.9rem);
    }

    @media only screen and (max-width: 767px) {
      .upcoming .upcoming-event-desc p,
      .upcoming .upcoming-event-desc ul li {
        font-size: clamp(0.8rem, 1vw, 0.8rem);
      }
    }

    .upcoming .upcoming-event-desc ul {
      list-style: none;
      text-align: start;
      padding: 0;
    }

    /* CSS untuk foto testimoni */
.testimonial-box img {
    width: 100px !important;
    height: 100px !important;
    border-radius: 50% !important;
    object-fit: cover !important;
    object-position: center !important;
}

.splide__slide .testimonial-box {
    display: flex;
    flex-direction: column;
    justify-content: flex-start !important;
    align-items: flex-start;
    gap: 1rem;
    min-height: 280px; /* sesuaikan sesuai desain */
    border-radius: 12px;
    background-color: #f7d58b;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

  </style>
@endsection

@section('content')
    <!-- Banner section -->
    <section class="banner container-fluid" style="background-color: #01153e">
      <div class="banner-container container-xl d-flex flex-row justify-content-center align-items-center">
        <!-- Start banner text -->
        <div class="banner-text col-12 col-lg-6 px-2 py-4" data-aos="fade-right">
          <h1 style="color: #ffdd95; font-size: 4rem" class="fw-bold mb-3">
            Prepare Your Career With Us!
          </h1>
          <p class="text-light lh-base fs-5" style="letter-spacing: 3px">
            Persiapkan karirmu bersama para ahli yang siap memandumu dalam
            mencapai karir impian
          </p>
          <div class="container-xl col-0 col-md-12 d-flex flex-row align-items-center pt-4 gap-1">
            <i class="fa-solid fa-user fs-4" style="color: #f69259"></i>
            <p style="color: #f69259; font-size: clamp(0.7rem, 1vw, 1rem)">
              > 100 Orang Mempersiapkan Karir
            </p>
          </div>
        </div>
        <!-- End banner text -->

        <!-- Start banner image -->
        <div class="banner-img col-0 col-lg-6 d-none d-lg-flex justify-content-center align-items-center ms-5" data-aos="fade-left">
          <img src="{{ asset('img/homepage/banner-cindy2.webp') }}" alt="banner person image" />
        </div>
        <!-- End banner image -->
      </div>
    </section>
    <!-- Banner section -->

    <!-- start upcoming event section-->
    <section class="upevent">
    <div class="container">
        <h1 class="text-center mb-5 fw-bold text-shadow-lg" style="color: #083d77">Upcoming Events</h1>

        @if($events->isEmpty())
            <p class="text-center">Belum ada event yang akan datang. Cek kembali nanti!</p>
        @else
            <div class="swiper main-swiper">
                <div class="swiper-wrapper">

                    @foreach ($events as $event)
                        <div class="swiper-slide px-5">
                            <div class="row g-0 align-items-stretch event-container mb-5 justify-content-center">
                                <div class="col-md-5 event-image-container">
                                    @if(count($event->images) > 1)
                                        <div class="swiper nested-swiper h-100">
                                            <div class="swiper-wrapper">
                                                @foreach ($event->images as $image)
                                                    <div class="swiper-slide nested-swiper-slide" style="background-image: url('{{ Storage::url($image) }}');">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="swiper-pagination nested-swiper-pagination"></div>
                                        </div>
                                    @else
                                        <div class="single-image-poster" style="background-image: url('{{ count($event->images) > 0 ? Storage::url($event->images[0]) : '' }}');">
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="col-md-7 p-4 p-md-5 event-text-container">
                                    <div class="text-center">
                                        <h2 class="fw-bolder">{{ $event->title }}</h2>
                                        <p class="text-muted fs-5 fw-bold">{{ $event->tagline }}</p>
                                    </div>
                                    <div class="mt-3 description-content">
                                        {!! $event->description !!}
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ $event->registration_link }}" style="background-color: #174ea6" target="_blank" class="btn btn-primary fs-5 mt-4 btn-daftar">
                                            Daftar Sekarang
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                @if($events->count() > 1)
                <div class="swiper-pagination "></div>
                    <div class="swiper-button-next "></div>
                    <div class="swiper-button-prev "></div>
                @endif
            </div>
        @endif
    </div>
    </section>
    <!-- End Upcoming Events Section -->

    <!--Start oppt section-->
    <section class="opportunities mt-4" data-aos="fade">
        <div class="opp-title text-center my-4">
            <h1>
                <span class="blue-HI fw-bold">House of</span>
                <span class="oranye-HI fw-bold">opportunities</span>
            </h1>
            <h3>
                <span class="blue-HI">"From </span>
                <span class="oranye-HI">Students </span>
                <span class="blue-HI">to </span>
                <span class="oranye-HI">Students </span>
                <span class="blue-HI">with House Ilmu!"</span>
            </h3>
        </div>

        <div class="opp-card container-xxl">
              @include('partials.hitcc-cards-home', ['opportunities' => $programmes])
        </div>
    </section>
    <!--End oppt section-->

    <!-- Start programme section -->
    <section class="programme container-xl mt-4">
      <div class="programme-container d-flex flex-column justify-content-center align-items-center py-5">
        <h1 class="col-12 text-center pb-5 fw-bold" style="color: #083d77">
          Choose the program that works for you
        </h1>
        <div class="programme-box d-flex flex-column flex-lg-row justify-content-around align-items-center">
          <!-- Start programme box -->
          <div class="programme-list col-12 col-lg-4 d-flex flex-column align-items-start justify-content-center rounded-4 mb-2 mb-lg-0 px-5 py-5" style="background-color: #ee964b" data-aos="fade-right">
            <h2 class="pt-3 pb-3 fw-bold" style="color: #1746a2">Sudut Karir</h2>
            <p class="text-white">Hybrid event yang membahas tentang career preparation secara menyeluruh dari tiap tahapan recruitment.</p>
            <a class="text-white text-center w-full py-2 rounded-lg bg-primary_HI mx-auto mt-auto fw-semibold transition duration-300 hover:bg-primary_light_HI hover:scale-110" href="programme/#sudutkarir">Learn More...</a>
          </div>
          <!-- End programme box -->

          <!-- Start programme box -->
          <div class="programme-list col-12 col-lg-4 d-flex flex-column align-items-start justify-content-center rounded-4 mt-2 mt-lg-0 px-5 py-5" style="background-color: #fe9000" data-aos="fade-left">
            <h2 class="pt-3 pb-3 fw-bold" style="color: #1746a2">Review CV</h2>
            <p class="text-white">Program diskusi santai untuk mengembangkan soft skill dan life skill bersama expert</p>
            <a class="text-white text-center w-full py-2 rounded-lg bg-primary_HI mx-auto mt-auto fw-semibold transition duration-300 hover:bg-primary_light_HI hover:scale-110" href="programme/#review">Learn More...</a>
          </div>
          <!-- End programme box -->
        </div>
      </div>
    </section>
    <!-- End programme section -->

    <!-- Start partner section -->
    <section class="partner container my-5">
      <h1 class="col-12 text-center fw-bold pt-5 mt-2" style="color: #083d77">
        Who work with us?
      </h1>
      <div id="partnerSplide" class="splide mt-4">
        <div class="splide__track">
          <ul class="splide__list flex items-center">
            <li class="splide__slide">
              <img src="{{ asset('img/homepage/logo-cakap.webp') }}" class="w-56 mx-auto d-block" alt="logo partner cakap">
            </li>
            <li class="splide__slide">
              <img src="{{ asset('img/homepage/logo-indorelawan.webp') }}" class="w-56 mx-auto d-block" alt="logo partner indorelawan">
            </li>
            <li class="splide__slide">
              <img src="{{ asset('img/homepage/logo-pemimpinid.webp') }}" class="w-56 mx-auto d-block" alt="logo partner pemimpinid">
            </li>
            <li class="splide__slide">
              <img src="{{ asset('img/homepage/logo-institut-id.webp') }}" class="w-56 mx-auto d-block" alt="logo partner institut id">
            </li>
            <li class="splide__slide">
              <img src="{{ asset('img/homepage/logo-phillip-sekuritas.webp') }}" class="w-56 mx-auto d-block" alt="logo partner phillip sekuritas">
            </li>
          </ul>
        </div>
      </div>
    </section>
    <!-- End partner section -->

    <!-- Start testimonial section -->
    <section class="testimonial container-xxl mt-5">
      <div class="testimonial-container container-xxl d-flex flex-column justify-content-center align-items-center">
        <h1 class="col-12 text-center fw-bold my-4" style="color: #083d77">
          What they says about us?
        </h1>
        <div id="testimonialSplide" class="splide my-4 w-100">
            <div class="splide__track">
                <ul class="splide__list">
              @foreach($testimonis as $index => $testimoni)  
                <li class="splide__slide even rounded-lg bg-transparent flex">
    <div class="testimonial-box flex flex-col p-8 gap-4 w-full h-full" style="background-color: #f7d58b">
        <div class="flex justify-start">
            <img src="{{ asset('storage/' . $testimoni->testimoni_img) }}" style="width: 100px;" alt="" />

            <div class="ms-3 mt-2">
                <p id="testi-name" class="fw-bold m-0">{{ $testimoni->testimoni_name }}</p>
                <p id="testi-role">{{ $testimoni->testimoni_position }}</p>
            </div>
        </div>
        <p class="font-semibold">
            "{{ $testimoni->testimoni_description }}"
        </p>
    </div>
</li>

              @endforeach  
                </ul>
            </div>
        </div>

      </div>
    </section>
    <!-- End testimonial section -->

    <!-- Start mentors section -->
    <section class="mentors container-fluid mt-5" style="background-color: #ffdd95">
      <div class="mentors-container container-xl d-flex flex-column justify-content-center align-items-center py-4">
        <h1 class="col-12 text-center fw-bold py-3 mt-2" style="color: #083d77">
          Learn From The Experts
        </h1>

        @if($experts->isEmpty())
          <p class="text-center">Belum ada data expert yang tersedia.</p>
        @else
          {{-- Perbaikan 1: Hapus align-items-center --}}
          <div class="mentors-img d-flex flex-wrap flex-md-row justify-content-around py-3 mb-3" data-aos="fade-up">
            @foreach ($experts as $expert)
              {{-- Pastikan pembungkus per kartu memiliki lebar maks dan margin --}}
              <div class="d-flex flex-column me-5 m-2 " style="width: 250px;">
                
                {{-- Area Gambar (tidak ada perubahan) --}}
                <div class="mentors-info d-flex flex-column justify-content-center align-items-center position-relative">
                  <img style="width: 100%" class="rounded-top-3 img-fluid" src="{{ Storage::url($expert->image) }}" alt="{{ $expert->name }}" />
                  <div class="mentors-exp d-flex justify-content-evenly align-items-center gap-2 rounded-top-3">
                    <ul>
                      @foreach ($expert->skills as $skill)
                        <li>{{ $skill }}</li>
                      @endforeach
                    </ul>
                  </div>
                </div>

                {{-- Perbaikan 2: Tambahkan kelas flexbox di sini --}}
                <div class="text-center px-2 p-4 rounded-bottom mentors-text d-flex flex-column justify-content-center" style="background-color: #1746a2; width: 100%">
                  <h4 class="fw-bold">{{ $expert->name }}</h4>
                  <h6 class="text-light fw-semibold">{{ $expert->position }}</h6>
                </div>
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </section>
    <!-- End mentors section -->

    <!-- Start faq section -->
    <section class="faq container-xl mt-5" x-data="{ openItem: null }">
      <div class="faq-container flex flex-col justify-center py-8 gap-4">
          <h1 class="col-12 text-center font-bold py-3 mt-2" style="color: #083d77;">
              Frequently Ask Questions
          </h1>
          <div class="faq-list space-y-0">
        <!-- FAQ 1 -->
        <div class="accordion-item overflow-hidden bg-white !rounded-t-xl shadow transition-all duration-300">
            <button @click="openItem = openItem === 1 ? null : 1"
                class="w-full text-left text-base px-4 py-3 border border-neutral-500 flex justify-between items-center font-normal rounded-t-xl transition-colors duration-300 lg:text-lg"
                :class="openItem === 1 ? 'bg-[#1746A2] text-white' : 'bg-white text-black'">
                Apa itu house ilmu?
                <svg :class="{'transform rotate-180': openItem === 1}"
                    class="w-7 h-7 transition-transform duration-300 md:w-10 md:h-10"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div class="overflow-hidden transition-[max-height,opacity]"
                :class="openItem === 1 ? 'max-h-[999px] opacity-100 duration-700' : 'max-h-0 opacity-0 duration-500'">
                <div class="accordion-body border-t border-gray-300 px-4 py-3 text-gray-700 xl:text-lg bg-white">
                    House Ilmu adalah platform career development dengan impact sosial bagi generasi muda.
                </div>
            </div>
        </div>

        <!-- FAQ 2 -->
        <div class="accordion-item overflow-hidden bg-white shadow transition-all duration-300">
            <button @click="openItem = openItem === 2 ? null : 2"
                class="w-full text-left text-base px-4 py-3 border border-neutral-500 flex justify-between items-center font-normal transition-colors duration-300 lg:text-lg"
                :class="openItem === 2 ? 'bg-[#1746A2] text-white' : 'bg-white text-black'">
                Apa saja layanan House Ilmu?
                <svg :class="{'transform rotate-180': openItem === 2}"
                    class="w-7 h-7 transition-transform duration-300 md:w-10 md:h-10"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div class="overflow-hidden transition-[max-height,opacity]"
                :class="openItem === 2 ? 'max-h-[999px] opacity-100 duration-700' : 'max-h-0 opacity-0 duration-500'">
                <div class="accordion-body border-t border-gray-300 px-4 py-3 text-gray-700 xl:text-lg bg-white">
                    Layanan bimbingan karir, review CV, dan sudut karir.
                </div>
            </div>
        </div>

        <!-- FAQ 3 -->
        <div class="accordion-item overflow-hidden bg-white shadow transition-all duration-300">
            <button @click="openItem = openItem === 3 ? null : 3"
                class="w-full text-left text-base px-4 py-3 border border-neutral-500 flex justify-between items-center font-normal transition-colors duration-300 lg:text-lg"
                :class="openItem === 3 ? 'bg-[#1746A2] text-white' : 'bg-white text-black'">
                Bagaimana mendaftar program House Ilmu?
                <svg :class="{'transform rotate-180': openItem === 3}"
                    class="w-7 h-7 transition-transform duration-300 md:w-10 md:h-10"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div class="overflow-hidden transition-[max-height,opacity]"
                :class="openItem === 3 ? 'max-h-[999px] opacity-100 duration-700' : 'max-h-0 opacity-0 duration-500'">
                <div class="accordion-body border-t border-gray-300 px-4 py-3 text-gray-700 xl:text-lg bg-white">
                    Daftar lewat form website, nanti tim kami akan menghubungi ya!
                </div>
            </div>
        </div>

        <!-- FAQ 4 (rounded bawah dikontrol penuh) -->
        <div class="accordion-item overflow-hidden bg-white !rounded-b-xl shadow transition-all duration-300"
            :class="openItem === 4 ? 'rounded-b-none' : 'rounded-b-lg'">
            <button @click="openItem = openItem === 4 ? null : 4"
                class="w-full text-left text-base px-4 py-3 border border-neutral-500 flex justify-between items-center font-normal rounded-b-xl transition-colors duration-300 lg:text-lg"
                :class="openItem === 4 ? 'bg-[#1746A2] text-white' : 'bg-white text-black'">
                Bagaimana menghubungi tim House Ilmu?
                <svg :class="{'transform rotate-180': openItem === 4}"
                    class="w-7 h-7 transition-transform duration-300 md:w-10 md:h-10"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div class="overflow-hidden transition-[max-height,opacity]"
                :class="openItem === 4 ? 'max-h-[999px] opacity-100 duration-700' : 'max-h-0 opacity-0 duration-500'">
                <div class="accordion-body border-t border-gray-300 px-4 py-3 text-gray-700 xl:text-lg bg-white">
                    Hubungi kami via email, telepon, atau form kontak di website ya!
                </div>
            </div>
        </div>
      </div>
            </div>
    </section>
    <!-- End faq section -->
@endsection