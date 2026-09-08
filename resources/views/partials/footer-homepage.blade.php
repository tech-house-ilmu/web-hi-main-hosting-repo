<footer>
    <section class="footer-container container-fluid p-0" style="background-color: #FFDD95;">
        <div class="footer-info container-xl d-flex flex-column flex-md-row justify-content-around align-items-start pt-4">
            <div class="col-12 col-md-4 d-flex flex-column align-items-start gap-2">
                <img class="mt-1 w-32" src="{{ asset('img/homepage/logo.webp') }}" alt="logo house ilmu">
                <p class="font-semibold pe-5 text-[#04284e] text-2xl md:text-xl lg:text-3xl">"Grow, <span class="text-[#ff731d]">Learn</span> and <span class="text-[#ff731d]">Get Achievement</span> Together"</p>
            </div>
            <!-- Start footer navigation -->
            <div class="footer-nav col-12 col-md-4 ps-2 ps-md-2 mt-4 d-flex flex-column align-items-start" style="border-left: 2px solid #083D77 ">
                <h5 class="text-xl font-semibold mb-2 text-[#ff731d]">MENU</h5>
                <a class="my-1 font-medium" href="{{ route('programme.programmes') }}">HI Programme</a>
                <a class="my-1 font-medium" href="{{ route('programme.hi.index') }}">HI Opportunities</a>
                <a class="my-1 font-medium" href="{{ route('partnership.index') }}">Partnership</a>
                <a class="my-1 font-medium" href="{{ route('article.index') }}">Article</a>
                <a class="my-1 font-medium" href="{{ route('career.index') }}">Career</a>
                <a class="my-1 font-medium" href="{{ route('about') }}">About us</a>
            </div>
            <!-- End footer navigation -->
            <!-- Start footer sosmed links -->
            <div class="footer-sosmed col-12 col-md-4 ps-2 ps-md-2 mt-4 d-flex flex-column align-items-start px-1" style="border-left: 2px solid #083D77 ">
                <h5 class="text-xl font-semibold mb-2 text-[#ff731d]">SOCIAL MEDIA</h5>
                <div class="flex gap-2">
                    <i class="fa-brands fa-linkedin text-2xl text-[#1746A2]"></i>
                    <a class="my-1 font-medium" href="https://www.linkedin.com/company/house-ilmu-indonesia"
                        target="_blank" rel="noopener noreferrer">LinkedIn</a>
                </div>
                <div class="flex gap-2">
                    <i class="fa-brands fa-instagram text-2xl text-[#1746A2]"></i>
                    <a class="my-1 font-medium" href="https://www.instagram.com/houseilmu.id" target="_blank" rel="noopener noreferrer">Instagram</a>
                </div>
                <div class="flex gap-2">
                    <i class="fa-brands fa-tiktok text-2xl text-[#1746A2]"></i>
                    <a class="my-1 font-medium" href="https://www.tiktok.com/@houseilmu.id" target="_blank" rel="noopener noreferrer">Tiktok</a>
                </div>
            </div>
            <!-- End footer sosmed links -->
        </div>
        <div class="footer-copyright flex flex-col justify-center items-center w-full bg-[#ff731d] mt-4 md:flex-row">
            <p class="col-12 my-2 text-center font-medium text-white">houseilmu.id@gmail.com | &copy; 2025 House Ilmu Indonesia | All rights reserved.
            </p>
        </div>
    </section>
</footer>
