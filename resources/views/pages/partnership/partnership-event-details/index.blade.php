@extends('layout.app')

@section('title', 'Partnership Event | House Ilmu Indonesia')

@section('content')
    <!-- Start partnership section -->
    <section class="partnership-details max-w-4xl mx-auto px-4 my-12">
        <div class="partnership-details-desc flex flex-col">
            <a href="../#partnership-list" class="inline-flex items-center text-primary_HI font-semibold hover:underline mb-4"><i class="fa-solid fa-chevron-left mr-2"></i>Kembali</a>
            <h1 class="my-4 font-bold text-3xl md:text-4xl text-left md:text-center" style="color: #FF731D;">Event Collaboration</h1>
            <h4 class="my-3 font-bold text-xl" style="color: #174EA6">Persyaratan</h4>
            <ol class="list-decimal list-inside space-y-3 text-gray-700">
                <li><span class="font-semibold text-gray-900">Kesesuaian Misi dan Visi:</span> <br>
                    Kami mencari mitra yang memiliki misi dan visi yang sejalan dengan nilai-nilai organisasi kami.</li>
                <li><span class="font-semibold text-gray-900">Komitmen:</span> <br>
                    Kami mengharapkan komitmen penuh dari mitra dalam menjalankan setiap bentuk kolaborasi.</li>
                <li><span class="font-semibold text-gray-900">Transparansi:</span> <br>
                    Keterbukaan dalam komunikasi dan laporan kinerja adalah hal yang kami utamakan.</li>
            </ol>
            <h4 class="my-3 font-bold text-xl" style="color: #174EA6">Link Form</h4>
            <p class="text-gray-700 leading-relaxed">Untuk memulai proses kolaborasi, silakan mengisi form berikut ini dengan lengkap : <a
                    href="https://bit.ly/PartnershipHouseilmu" target="_blank" class="text-primary_HI font-semibold underline">bit.ly/PartnershipHouseilmu</a>
                <br><br>
                Terima kasih atas minat Anda untuk berkolaborasi dengan kami. Kami berharap dapat menjalin kemitraan
                yang saling menguntungkan dan memberikan dampak positif bagi kedua belah pihak. Jika Anda memiliki
                pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami.</p>
            <h4 class="my-3 font-bold text-xl" style="color: #174EA6">Hubungi Kami</h4>
            <p class="text-gray-700 font-medium">CP: +6285779170428 (Fia)</p>
        </div>
    </section>
    <!-- End partnership section -->
@endsection
