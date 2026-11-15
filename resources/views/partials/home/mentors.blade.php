<!-- Mentors Section -->
<section class="mentors w-full mt-5" style="background-color: #ffdd95">
  <div class="mentors-container max-w-7xl mx-auto px-4 flex flex-col justify-center items-center py-4">
    <h1 class="w-full text-center font-bold text-3xl py-3 mt-2" style="color: #083d77">
      Learn From The Experts
    </h1>

    @if($experts->isEmpty())
      <p class="text-center">Belum ada data expert yang tersedia.</p>
    @else
      <div class="mentors-img flex flex-wrap md:flex-row justify-around py-3 mb-3 w-full" data-aos="fade-up">
        @foreach ($experts as $expert)
          <div class="flex flex-col me-5 m-2" style="width: 250px;">
            {{-- Mentor Image & Skills --}}
            <div class="mentors-info flex flex-col justify-center items-center relative">
              <img style="width: 100%" class="rounded-t-lg max-w-full h-auto" src="{{ Storage::url($expert->image) }}" alt="{{ $expert->name }}" loading="lazy" decoding="async" />
              <div class="mentors-exp flex justify-evenly items-center gap-2 rounded-t-lg">
                <ul>
                  @foreach ($expert->skills as $skill)
                    <li>{{ $skill }}</li>
                  @endforeach
                </ul>
              </div>
            </div>

            <div class="text-center px-2 p-4 rounded-b-lg mentors-text flex flex-col justify-center" style="background-color: #1746a2; width: 100%">
              <h4 class="font-bold text-lg text-white">{{ $expert->name }}</h4>
              <h6 class="text-white font-semibold text-sm">{{ $expert->position }}</h6>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</section>
