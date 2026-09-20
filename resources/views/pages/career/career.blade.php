@extends('layout.app')

@section('title', 'Career | House Ilmu Indonesia')

@section('content')
    <!-- Start career page title section -->
    <section class="career-title max-w-7xl mx-auto px-4 mt-12">
        <div class="career-title-container flex flex-col items-start md:items-center text-left md:text-center" data-aos="fade">
            <h1 class="py-4 px-3 md:px-0 text-3xl md:text-4xl font-bold" style="color: #1746A2;">Grow Together With Us</h1>
            <p class="text-xl w-full md:w-10/12 px-3 md:px-0 text-gray-700">Jangan sia-siakan kesempatan ini! Ayo, bergabung dengan kami
                di House Ilmu. Jadilah bagian dari kami bersama tim yang seru dan penuh semangat!</p>
        </div>
    </section>
    <!-- End career page title section -->

    <!-- Start career culture section -->
    <section class="culture w-full mt-12 py-8" style="background-color: #FF9900;">
        <div class="culture-container max-w-7xl mx-auto px-4 flex flex-col items-center">
            <h1 class="py-4 mt-4 text-3xl md:text-4xl font-bold" style="color: #1746A2;" data-aos="fade-left">Our Culture</h1>
            <!-- Start culture icons -->
            <div class="culture-icons flex flex-wrap justify-center items-center mb-8 gap-4 md:gap-8" data-aos="fade-right">
                <div class="cultures flex flex-col items-center mx-2 md:mx-4">
                    <i class="fa-regular fa-smile text-4xl py-3 text-white"></i>
                    <p class="font-semibold text-white">Fun</p>
                </div>
                <div class="cultures flex flex-col items-center mx-2 md:mx-4">
                    <i class="fa-solid fa-lightbulb text-4xl py-3 text-white"></i>
                    <p class="font-semibold text-white">Innovative</p>
                </div>
                <div class="cultures flex flex-col items-center mx-2 md:mx-4">
                    <i class="fa fa-balance-scale text-4xl py-3 text-white"></i>
                    <p class="font-semibold text-white">Equitable</p>
                </div>
                <div class="cultures flex flex-col items-center mx-2 md:mx-4">
                    <i class="fa fa-book text-4xl py-3 text-white"></i>
                    <p class="font-semibold text-white">Learning</p>
                </div>
                <div class="cultures flex flex-col items-center mx-2 md:mx-4">
                    <i class="fa-solid fa-clock text-4xl py-3 text-white"></i>
                    <p class="font-semibold text-white">Discipline</p>
                </div>
                <div class="cultures flex flex-col items-center mx-2 md:mx-4">
                    <i class="fa fa-heart text-4xl py-3 text-white"></i>
                    <p class="font-semibold text-white">Caring</p>
                </div>
                <div class="cultures flex flex-col items-center mx-2 md:mx-4">
                    <i class="fa fa-comments text-4xl py-3 text-white"></i>
                    <p class="font-semibold text-white">Communication</p>
                </div>
            </div>
            <!-- End culture icons -->
        </div>
    </section>
    <!-- End career culture section -->

    <!-- Start career alumni section -->
    <section class="alumni max-w-7xl mx-auto px-4 mt-12">
        <div class="alumni-container max-w-7xl mx-auto flex flex-col justify-center items-center">
            <h1 class="w-full text-center font-bold text-3xl md:text-4xl py-4 my-2" style="color: #083D77;" data-aos="fade-down">
                From the Alumni to You
            </h1>
            
            <!-- Start Splide alumni -->
            <div id="alumniSplide" class="splide my-4 w-full" data-aos="fade-up">
                <div class="splide__track">
                    <ul class="splide__list">
                        @forelse($testimoniAlumni as $alumni)
                            <li class="splide__slide p-4 rounded-lg" style="background: white; box-shadow: 0 8px 25px rgba(8, 61, 119, 0.15); border: 1px solid rgba(8, 61, 119, 0.1); min-height: 250px; display: flex; flex-direction: column;">
                                <!-- Profile section - Left aligned -->
                                <div class="alumni-profile-section flex items-start mb-3 pb-3" style="border-bottom: 2px solid #f8f9fa;">
                                    <div class="alumni-img mr-3 shrink-0">
                                        @if($alumni->testimoni_alumni_img)
                                            <img style="width: 65px; height: 65px; object-fit: cover; border: 3px solid #083D77; box-shadow: 0 4px 12px rgba(8, 61, 119, 0.3);" 
                                                src="{{ Storage::url($alumni->testimoni_alumni_img) }}" 
                                                alt="{{ $alumni->testimoni_alumni_name }}"
                                                loading="lazy" decoding="async"
                                                class="rounded-full">
                                        @else
                                            <img style="width: 65px; height: 65px; object-fit: cover; border: 3px solid #083D77; box-shadow: 0 4px 12px rgba(8, 61, 119, 0.3);" 
                                                src="{{ asset('img/logo.webp') }}" 
                                                alt="logo house ilmu"
                                                loading="lazy" decoding="async"
                                                class="rounded-full">
                                        @endif
                                    </div>
                                    <div class="alumni-details text-left grow">
                                        <p class="alumni-name mb-1" style="font-size: 1.1rem; font-weight: 700; color: #083D77; margin: 0;">{{ $alumni->testimoni_alumni_name }}</p>
                                        <p class="alumni-position" style="font-size: 0.9rem; color: #6c757d; margin: 0; font-weight: 500; font-style: italic;">{{ $alumni->testimoni_alumni_position }}</p>
                                    </div>
                                </div>
                                
                                <!-- Testimonial text - Centered -->
                                <div class="testimonial-content flex items-center justify-center text-center grow relative">
                                    <p style="font-size: 1rem; line-height: 1.6; color: #495057; font-weight: 600; font-style: italic; white-space: normal; word-break: break-word; overflow-wrap: break-word; width: 100%; margin: 0;">
                                        "{{ $alumni->testimoni_alumni_description }}"
                                    </p>
                                </div>
                            </li>
                        @empty
                            <!-- Fallback jika tidak ada data -->
                            <li class="splide__slide p-4 rounded-lg" style="background: white; box-shadow: 0 8px 25px rgba(8, 61, 119, 0.15); border: 1px solid rgba(8, 61, 119, 0.1); min-height: 250px; display: flex; flex-direction: column;">
                                <!-- Profile section - Left aligned -->
                                <div class="alumni-profile-section flex items-start mb-3 pb-3" style="border-bottom: 2px solid #f8f9fa;">
                                    <div class="alumni-img mr-3 shrink-0">
                                        <img style="width: 65px; height: 65px; object-fit: cover; border: 3px solid #083D77; box-shadow: 0 4px 12px rgba(8, 61, 119, 0.3);" 
                                            src="{{ asset('img/logo.webp') }}" 
                                            alt="logo house ilmu"
                                            loading="lazy" decoding="async"
                                            class="rounded-full">
                                    </div>
                                    <div class="alumni-details text-left grow">
                                        <p class="alumni-name mb-1" style="font-size: 1.1rem; font-weight: 700; color: #083D77; margin: 0;">Testimoni akan segera tersedia</p>
                                        <p class="alumni-position" style="font-size: 0.9rem; color: #6c757d; margin: 0; font-weight: 500; font-style: italic;">House Ilmu Team</p>
                                    </div>
                                </div>
                                
                                <!-- Testimonial text - Centered -->
                                <div class="testimonial-content flex items-center justify-center text-center grow">
                                    <p style="font-size: 1rem; line-height: 1.6; color: #495057; font-weight: 600; font-style: italic; white-space: normal; word-break: break-word; overflow-wrap: break-word; width: 100%; margin: 0;">
                                        "Testimoni alumni akan ditampilkan di sini setelah data dimasukkan melalui admin panel."
                                    </p>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
            <!-- End Splide alumni -->
        </div>
    </section>

    <!-- Start career info section -->
    <section id="career-info" class="career-info max-w-7xl mx-auto px-4 mt-12">
        <div class="career-info-container max-w-7xl mx-auto flex flex-col justify-center items-center">
            <h1 class="py-4 text-3xl md:text-4xl font-bold" style="color: #1746A2;">Career Opportunity</h1>
            <div class="career-box max-w-7xl w-full flex flex-col justify-around items-center text-white">
                @php $half = ceil($divisions->count() / 2); @endphp
                <div class="order-box-1 max-w-7xl w-full flex flex-wrap justify-center items-stretch gap-4">
                    @foreach($divisions->take($half) as $division)
                        <div class="career-link w-full md:w-5/12 lg:w-4/12 flex flex-col rounded-2xl p-6 md:p-8" data-aos="fade-right">
                            <h2 class="font-bold text-2xl py-3">{{ $division->name }}</h2>
                            <div class="flex justify-start items-center">
                                <a class="py-4 rounded-2xl" href="{{ route('career.division', $division->slug) }}">
                                    <span class="font-bold p-3 rounded-2xl">See More...</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="order-box-2 max-w-7xl w-full flex flex-wrap justify-center items-start gap-4 mt-4">
                    @foreach($divisions->skip($half) as $division)
                        <div class="career-link w-full md:w-5/12 lg:w-4/12 flex flex-col rounded-2xl p-6 md:p-8" data-aos="fade-left">
                            <h2 class="font-bold text-2xl py-3">{{ $division->name }}</h2>
                            <div class="flex justify-start items-center">
                                <a class="py-4 rounded-2xl" href="{{ route('career.division', $division->slug) }}">
                                    <span class="font-bold p-3 rounded-2xl">See More...</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End career info section -->

    <!-- Start career message section -->
    <section class="message max-w-7xl mx-auto px-4 my-12">
        <div class="message-container max-w-7xl mx-auto flex flex-col justify-center items-center">
            <h1 class="py-4 text-center text-3xl md:text-4xl font-bold"><span id="text-blue">Let’s</span> <span id="text-orange">Learn</span> <span
                    id="text-blue">,</span> <span id="text-orange">Grow</span> <span id="text-blue">and</span> <span
                    id="text-orange">Get <br> Achievement</span> <span id="text-blue">Together</span> </h1>
            <div class="message-sosmed w-full md:w-10/12 lg:w-7/12 flex flex-col justify-center items-center p-8 rounded-2xl"
                style="background-color: #FF9900;">
                <h2 class="w-full text-center text-white font-bold text-2xl md:text-3xl">Any Question?</h2>
                <div class="sosmed flex flex-col md:flex-row justify-center items-center py-4 w-full gap-6">
                    <!-- Start message via email -->
                    <div class="sosmed flex-1 flex flex-col items-center my-2 md:my-0"  data-aos="fade-right">
                        <h4 class="font-bold text-xl" style="color: #1746A2;">Email</h4>
                        <i class="fa-regular fa-envelope text-3xl my-2" style="color: #1746a2;"></i>
                        <a href="mailto:houseilmu.id@gmail.com" target="_blank"
                            class="py-2 px-6 rounded-2xl font-bold bg-white text-[#1746A2] border border-gray-300 transition-transform duration-200 hover:scale-105">Chat</a>
                    </div>
                    <!-- End message via email -->
                    <!-- Start message via instagram -->
                    <div class="sosmed flex-1 flex flex-col items-center my-2 md:my-0"  data-aos="fade-left">
                        <h4 class="font-bold text-xl" style="color: #1746A2;">Instagram</h4>
                        <i class="fa-brands fa-instagram text-3xl my-2" style="color: #1746a2;"></i>
                        <a href="https://www.instagram.com/houseilmu.id" target="_blank"
                            class="py-2 px-6 rounded-2xl font-bold bg-white text-[#1746A2] border border-gray-300 transition-transform duration-200 hover:scale-105">Chat</a>
                    </div>
                    <!-- End message via instagram -->
                </div>
            </div>
        </div>
    </section>
    <!-- End career message section -->
@endsection