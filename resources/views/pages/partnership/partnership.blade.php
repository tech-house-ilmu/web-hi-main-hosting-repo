@extends('layout.app')

@section('title', 'Partnership | House Ilmu Indonesia')

@section('content')
    <!-- Start partnership text section -->
    <section class="partnership-title max-w-7xl mx-auto px-4 mt-12">
        <div class="partnership-title-container max-w-5xl mx-auto flex flex-col justify-center items-center"
            data-aos="fade">
            <h1 class="py-4 mb-6 text-center text-3xl md:text-4xl font-bold" style="color: #1746A2;">Kenapa Memilih Kami?</h1>
            <div class="flex flex-col gap-4 p-6 bg-[#04284E] rounded-xl outline outline-4 outline-[#ff9900]">
                <p class="text-start text-white w-full md:text-center">House Ilmu Indonesia adalah platform edusociopreneur yang bergerak
                    memberikan konten-konten edukasi career development dan program-program soft skill serta life skill yang
                    berkonstribusi langsung membantu para Kawaners (muda-mudi Indonesia) House Ilmu Indonesia untuk
                    berkembang dan berprestasi.</p>
                <p class="text-start text-white w-full md:text-center">Kami berdedikasi untuk memberikan dampak positif melalui berbagai
                    inovasi program yang kami jalankan. Dengan pengalaman dan jaringan luas yang kami miliki, kami
                    menawarkan kesempatan kolaborasi yang dapat memberikan manfaat besar bagi mitra kami. Beberapa alasan
                    mengapa Anda harus memilih kami sebagai mitra:</p>
                <ol class="text-white w-full list-decimal list-inside space-y-2">
                    <li class="my-1"><span class="font-semibold">Reputasi dan Kredibilitas:</span> Kami memiliki track record
                        yang solid dalam menjalankan berbagai program dan acara yang sukses.</li>
                    <li class="my-1"><span class="font-semibold">Jaringan Luas:</span> Kami memiliki koneksi dengan berbagai
                        pihak yang relevan dan berpengaruh di industri.</li>
                    <li class="my-1"><span class="font-semibold">Tim Profesional:</span> Tim kami terdiri dari
                        individu-individu yang berkompeten dan berpengalaman di bidangnya.</li>
                    <li class="my-1"><span class="font-semibold">Peluang Publikasi:</span> Kolaborasi dengan kami akan
                        meningkatkan eksposur dan publikasi brand Anda melalui berbagai kanal media kami.</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End partnership text section -->

    <!-- Start partnership box list section -->
    <section id="partnership-list" class="partnership-list max-w-7xl mx-auto px-4 my-12">
        <div class="partnership-list-container max-w-7xl mx-auto flex flex-wrap justify-center gap-6">
            <h1 class="w-full py-4 text-center text-3xl md:text-4xl font-bold" style="color: #1746A2;">Jenis Kolaborasi</h1>
            <!-- Start partnership box -->
            <div class="partnership-list-choice w-full md:w-[45%] lg:w-[30%] flex flex-col gap-2 items-center py-6 rounded-2xl shadow-lg bg-[#FF9900]"
                data-aos="fade-right">
                <h1 class="py-2 mt-3 font-bold text-xl text-center text-white bg-[#04284e] w-full px-0">Partnership</h1>
                <p class="py-2 px-4 w-full text-white text-base md:text-lg">Kolaborasi yang mencakup promosi bersama melalui platform media sosial
                    yang House Ilmu Indonesia miliki yaitu pada Instagram story dan/atau juga Instagram feeds</p>
                <a class="py-2 w-[90%] text-lg text-center text-white font-medium mt-auto bg-[#04284E] rounded-xl transition duration-300 hover:scale-105 hover:bg-[#1746a2]" href="partnership-details/">Learn more...</a>
            </div>
            <!-- End partnership box -->

            <!-- Start partnership box -->
            <div class="partnership-list-choice w-full md:w-[45%] lg:w-[30%] flex flex-col gap-2 items-center py-6 rounded-2xl shadow-lg bg-[#FF9900]"
                data-aos="fade-right">
                <h1 class="py-2 mt-3 font-bold text-xl text-center text-white bg-[#04284e] w-full px-0">Affiliate</h1>
                <ol class="py-2 px-6 w-full text-white list-disc list-inside space-y-2">
                    <li>Kami menerima kerjasama berupa Affiliate untuk mempromosikan suatu produk atau jasa anda yang
                        masih sejalan mendukung visi-misi House Ilmu Indonesia</li>
                    <li>Kami dapat membuatkan konten khusus Berbentuk reels untuk kebutuhan kerjasama affiliate</li>
                    <li>Kerjasama ini dapat membantu mendukung engagement produk anda</li>
                </ol>
                <a class="py-2 w-[90%] text-lg text-center text-white font-medium mt-auto bg-[#04284E] rounded-xl transition duration-300 hover:scale-105 hover:bg-[#1746a2]" href="partnership-affiliate-details/">Learn more...</a>
            </div>
            <!-- End partnership box -->
            <!-- Start partnership box -->
            <div class="partnership-list-choice w-full md:w-[45%] lg:w-[30%] flex flex-col gap-2 items-center py-6 rounded-2xl shadow-lg bg-[#FF9900]"
                data-aos="fade-left">
                <h1 class="py-2 mt-3 font-bold text-xl text-center text-white bg-[#04284e] w-full px-0">Event Collaboration</h1>
                <ol class="py-4 px-6 w-full text-white list-disc list-inside space-y-2">
                    <li>Bekerjasama dalam penyelenggaraan acara, baik offline maupun online</li>
                    <li>Kolaborasi ini merupakan kerjasama pembagian kepanitiaan dalam perencanaan, promosi, hingga
                        pelaksanaan acara dari kedua belah pihak</li>
                    <li>Jadilah bagian dari acara-acara inspiratif yang kami adakan untuk memperluas jaringan dan
                        exposure bisnis Anda.</li>
                </ol>
                <a class="py-2 w-[90%] text-lg text-center text-white font-medium mt-auto bg-[#04284E] rounded-xl transition duration-300 hover:scale-105 hover:bg-[#1746a2]" href="partnership-event-details/">Learn more...</a>
            </div>
            <!-- End partnership box -->
        </div>
    </section>
    <!-- End partnership box list section -->
@endsection
