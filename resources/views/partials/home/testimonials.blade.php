<!-- Testimonial Section -->
<section class="testimonial max-w-7xl mx-auto px-4 mt-5">
  <div class="testimonial-container max-w-7xl mx-auto flex flex-col justify-center items-center">
    <h1 class="w-full text-center font-bold text-3xl my-4" style="color: #083d77">
      What they says about us?
    </h1>
    <div id="testimonialSplide" class="splide my-4 w-full">
      <div class="splide__track">
        <ul class="splide__list">
          @foreach($testimonis as $testimoni)
            <li class="splide__slide even rounded-lg bg-transparent flex">
              <div class="testimonial-box flex flex-col p-8 gap-4 w-full h-full" style="background-color: #f7d58b">
                <div class="flex justify-start">
                  <img src="{{ asset('storage/' . $testimoni->testimoni_img) }}" style="width: 100px;" alt="{{ $testimoni->testimoni_name }}" loading="lazy" decoding="async" />
                  <div class="ms-3 mt-2">
                    <p id="testi-name" class="font-bold m-0">{{ $testimoni->testimoni_name }}</p>
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
