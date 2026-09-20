@extends('layout.app')

@section('title', 'HI Programmes | House Ilmu Indonesia')

@section('content')
        <!-- Start programme title section -->
    <section class="program-title max-w-7xl mx-auto px-4 mt-12">
        <div
            class="program-title-container flex flex-col md:flex-row justify-between items-start gap-4">
            <h1 class="w-full md:w-5/12 xl:w-4/12 font-bold text-3xl md:text-4xl" style="color: #083D77;" data-aos="fade-right">Let’s Join Our
                Programs</h1>
            <p class="w-full md:w-7/12 xl:w-8/12 font-medium text-gray-700 mt-3 md:mt-0" data-aos="fade-left">Pilih program yang sesuai
                dengan kebutuhan dan tujuan karirmu. Program program kami dirancang khusus untuk membantu mempersiapkan
                karirmu. Tentunya dengan bimbingan para ahli yang berpengalaman.</p>
        </div>
    </section>
    <!-- End programme title section -->

    <!-- Start programme section -->
    <section class="programs max-w-7xl mx-auto px-4 mt-12">
        <div id="counter" class="programs-container flex flex-col md:flex-row justify-around items-center md:items-stretch gap-6">

            <div class="card my-2 md:my-0 w-full md:w-1/2 max-w-sm rounded-2xl overflow-hidden shadow-lg" data-aos="fade-up">
                <img src="{{ asset('img/homepage/programme/review-cv.webp') }}" class="w-full h-48 object-cover" alt="gambar review cv" loading="lazy" decoding="async">
                <div class="card-body p-6 flex flex-col grow" style="background-color: #FFDD95;">
                    <a href="#review">
                        <h3 id="card-1" class="card-title py-3 my-4 rounded-full font-bold text-center text-white bg-[#04284E] 
                        outline outline-2 outline-[#ff9900] transition duration-300 hover:bg-[#ff9900] hover:outline-primary_light_HI">Review CV</h3>
                    </a>
                    <p class="card-text font-semibold mb-6" style="color: #083D77;">Hybrid event yang membahas tentang career
                        preparation secara menyeluruh dari tiap tahapan recruitment.</p>
                    <div class="flex flex-row justify-center mt-auto">
                        <div class="card-icon flex flex-row items-center text-[#ff9900] bg-[#04284E] rounded-l-lg w-fit px-3 py-2">
                            <i class="fa-solid fa-user px-2 text-base"></i>
                            <p class="text-white" id="counter1"></p>
                        </div>
                        <div class="card-icon flex flex-row items-center text-[#ff9900] bg-[#04284E] rounded-r-lg w-fit px-3 py-2">
                            <i class="fa-solid fa-star px-2 text-base"></i>
                            <p class="text-white">5,0</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card my-2 md:my-0 w-full md:w-1/2 max-w-sm rounded-2xl overflow-hidden shadow-lg" data-aos="fade-up">
                <img src="{{ asset('img/homepage/programme/sudut-karir2.webp') }}" class="w-full h-48 object-cover" alt="gambar sudut karir" loading="lazy" decoding="async">
                <div class="card-body p-6 flex flex-col grow" style="background-color: #F69259;">
                    <a href="#sudutkarir">
                        <h3 id="card-2" class="card-title py-3 my-4 rounded-full font-bold text-center text-white bg-[#04284E] 
                        outline outline-2 outline-[#ff9900] transition duration-300 hover:bg-[#ff9900] hover:outline-primary_light_HI">Sudut Karir</h3>
                    </a>
                    <p class="card-text font-semibold mb-6" style="color: #083D77;">Program diskusi santai untuk mengembangkan
                        soft skill dan life skill bersama expert</p>
                    <div class="flex flex-row justify-center mt-auto">
                        <div class="card-icon flex flex-row items-center text-[#ff9900] bg-[#04284E] rounded-l-lg w-fit px-3 py-2">
                            <i class="fa-solid fa-user px-2 text-base"></i>
                            <p class="text-white" id="counter2"></p>
                        </div>
                        <div class="card-icon flex flex-row items-center text-[#ff9900] bg-[#04284E] rounded-r-lg w-fit px-3 py-2">
                            <i class="fa-solid fa-star px-2 text-base"></i>
                            <p class="text-white">5,0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End programme section -->

    <!-- Start programme review section -->
    <section id="review" class="programs1-desc w-full mt-12 py-8" style="background-color: #FFDD95;" data-aos="fade-left">
        <div class="programs-desc max-w-7xl flex flex-col justify-center mx-auto p-4 gap-4 md:gap-20 lg:flex-row">
            <div class="flex flex-col justify-center items-center px-2">
                <h1 class="rounded-full text-center text-white font-bold w-full py-2 my-2 bg-secondary_HI lg:py-3">Review CV</h1>
                <div class="relative flex flex-col justify-center items-center">
                    <img class="w-full max-w-md py-2 rounded-2xl" src="{{ asset('img/homepage/programme/review-cv.webp') }}" alt="gambar review cv" loading="lazy" decoding="async">
                    <div class="programs-rate inline py-2 px-3 rounded-lg" style="background-color: #fff;">
                        <i class="fa-solid fa-star" style="color: #ffd233;"></i>
                        <span class="font-bold">5.0</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-center items-center px-2 lg:flex-row">
                <div class="flex flex-col justify-start items-start">
                    <h1 class="py-2 font-bold text-2xl" style="color: #083D77;">Goals</h1>
                    <ul class="p-4 text-white bg-[#04284E] rounded-lg space-y-2">
                        <li class="font-medium">Costumer CV Review dapat membuat CV yang sesuai dengan latar belakang
                            pendidikan dan didukung oleh pengalamannya.</li>
                        <li class="font-medium">Costumer CV Review mendapatkan feedback tentang CV-nya</li>
                    </ul>
                    <h1 class="py-3 mt-4 font-bold text-2xl md:mt-0 md:py-2" style="color: #083D77;">Why</h1>
                    <p class="font-medium p-4 text-white bg-[#04284E] rounded-lg">Kebutuhan generasi muda akan platform review CV yang mudah dijangkau terutama
                        dari segi harga. Product CV Review House Ilmu Indonesia dapat membantu kawaners HI yang ingin
                        mempersiapkan karirnya. Kawaners HI akan mendapatkan saran dan review dari pembuatan CV-nya</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End programme review section -->

    <!-- Start programme sudutkarir section -->
    <section id="sudutkarir" class="programs1-desc w-full my-12 py-8" style="background-color: #F4D35E;" data-aos="fade-right">
        <div class="programs-desc max-w-7xl flex flex-col justify-center mx-auto p-4 gap-4 md:gap-20 lg:flex-row">
            <div class="flex flex-col justify-center items-center px-2">
                <h1 class="rounded-full text-center text-white font-bold w-full py-2 my-2 bg-secondary_HI lg:py-3">Sudut Karir</h1>
                <div class="relative flex flex-col justify-center items-center">
                    <img class="w-full max-w-md py-2 rounded-2xl" src="{{ asset('img/homepage/programme/sudut-karir2.webp') }}" alt="gambar sudut karir" loading="lazy" decoding="async">
                    <div class="programs-rate inline py-2 px-3 rounded-lg" style="background-color: #fff;">
                        <i class="fa-solid fa-star" style="color: #ffd233;"></i>
                        <span class="font-bold">5.0</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-center items-center px-2 lg:flex-row">
                <div class="flex flex-col justify-start items-start">
                    <h1 class="py-2 font-bold text-2xl" style="color: #083D77;">Goals</h1>
                    <p class="font-medium p-4 text-white bg-[#04284E] rounded-lg">House Ilmu Indonesia sebagai wadah pelatihan persiapan karir bagi generasi
                        muda. House Ilmu Indonesia mempersiapkan beberapa kegiatan pelatihan tentang persiapan karir
                        yang dapat di akses di kota-kota di Indonesia</p>
                    <h1 class="py-3 mt-4 font-bold text-2xl md:mt-0 md:py-2" style="color: #083D77;">Why</h1>
                    <p class="font-medium p-4 text-white bg-[#04284E] rounded-lg">Sudut Karir House Ilmu Indonesia perlu diadakan untuk memfasilitasi
                        pengembangan dan perencanaan karir kamu secara terstruktur melalui beberapa kegiatan pelatihan
                        dan eksplorasi peluang karir. Dengan ini, House Ilmu sebagai wadah yang memberikan panduan bagi
                        kamu dalam merencanakan karir selaras dengan pengalaman dan latar belakang pendidikan.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End programme review section -->
@endsection

@section('scripts')
    <script>
        function animateCounter(id, target, duration = 1000) {
            const el = document.getElementById(id);
            let start = 0;
            const step = Math.max(Math.floor(duration / target), 1);

            const timer = setInterval(() => {
            el.textContent = ++start;
            if (start >= target) clearInterval(timer);
            }, step);
        }

        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(({ isIntersecting, target }) => {
            if (!isIntersecting) return;

            setTimeout(() => {
                animateCounter('counter1', 74, 4000);
                animateCounter('counter2', 48, 4000);
            }, 2000);

            obs.unobserve(target);
            });
        }, { threshold: 0.5 });

        observer.observe(document.getElementById('counter'));
    </script>
@endsection