<!-- Upcoming Events Section -->
<section class="upevent">
  <div class="max-w-7xl mx-auto px-4">
    <h1 class="text-center mb-5 font-bold text-shadow-lg text-3xl" style="color: #083d77">Upcoming Events</h1>

    @if($events->isEmpty())
      <p class="text-center">Belum ada event yang akan datang. Cek kembali nanti!</p>
    @else
      <div class="swiper main-swiper">
        <div class="swiper-wrapper">
          @foreach ($events as $event)
            <div class="swiper-slide px-5">
              <div class="flex flex-wrap lg:flex-nowrap items-stretch event-container mb-5 justify-center">
                <div class="w-full md:w-5/12 event-image-container">
                  @if(count($event->images) > 1)
                    <div class="swiper nested-swiper h-full">
                      <div class="swiper-wrapper">
                        @foreach ($event->images as $image)
                          <div class="swiper-slide nested-swiper-slide" style="background-image: url('{{ Storage::url($image) }}');"></div>
                        @endforeach
                      </div>
                      <div class="swiper-pagination nested-swiper-pagination"></div>
                    </div>
                  @else
                    <div class="single-image-poster" style="background-image: url('{{ count($event->images) > 0 ? Storage::url($event->images[0]) : '' }}');"></div>
                  @endif
                </div>

                <div class="w-full md:w-7/12 p-4 md:p-5 event-text-container">
                  <div class="text-center">
                    <h2 class="font-black text-2xl">{{ $event->title }}</h2>
                    <p class="text-gray-600 text-xl font-bold">{{ $event->tagline }}</p>
                  </div>
                  <div class="mt-3 description-content">
                    {!! $event->description !!}
                  </div>
                  <div class="flex justify-center">
                    <a href="{{ $event->registration_link }}" style="background-color: #174ea6" target="_blank" class="px-6 py-2.5 rounded-full text-white font-semibold text-lg mt-4 btn-daftar inline-block text-center">
                      Daftar Sekarang
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        @if($events->count() > 1)
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        @endif
      </div>
    @endif
  </div>
</section>
