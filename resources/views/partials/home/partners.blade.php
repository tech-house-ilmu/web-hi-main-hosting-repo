<!-- Partner Section -->
<section class="partner max-w-7xl mx-auto px-4 my-5">
  <h1 class="w-full text-center font-bold text-3xl pt-5 mt-2" style="color: #083d77">
    Who work with us?
  </h1>
  <div id="partnerSplide" class="splide mt-4">
    <div class="splide__track">
      <ul class="splide__list flex items-center">
        @foreach($partners as $partner)
          <li class="splide__slide">
            <img src="{{ asset($partner['logo']) }}" class="w-56 mx-auto block" alt="logo partner {{ strtolower($partner['name']) }}" loading="lazy" decoding="async">
          </li>
        @endforeach
      </ul>
    </div>
  </div>
</section>
