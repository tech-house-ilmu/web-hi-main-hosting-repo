@extends('layout.app')

@section('title', 'Career | House Ilmu Indonesia')

@section('head')

@section('content')
        <!-- Start career apply section -->
    <section class="available container-xl mt-5">
        <!-- back button -->
        <div class="back d-inline">
            <a href="/career#career-info"><i class="fa-solid fa-chevron-left"></i> Kembali</a>
        </div>
        <div class="available-container container-xl d-flex flex-column justify-content-center align-items-center mb-16">
            <h1 class="py-4 text-center fw-bold" style="color: #1746A2;">Available Position &mdash; {{ $division->name }}</h1>
            <div class="apply-info container-xl d-flex flex-column justify-content-center align-items-center gap-3">
                <!-- // odd untuk container biru // even untuk container abu // -->
                <!-- Start position available box -->
                @forelse ($positions as $i => $position)
                <div
                    class="container-xl flex flex-wrap justify-center items-center text-center p-3 gap-4 rounded-3 md:!flex-nowrap md:justify-start md:!text-start md:gap-0"
                    style="background-color: {{ $i % 2 == 0 ? '#1746A2' : '#D9D9D9' }};">
                    <h4 class="col-12 col-md-7 text-base md:ps-4 md:text-lg lg:text-xl font-semibold"
                        style="color: {{ $i % 2 == 0 ? 'white' : 'black' }};">
                        {{ $position->title }}
                    </h4>
                    <a class="details bg-[#ff9900] text-white col-5 col-md-2 p-2 mx-1 rounded-3 text-center font-medium transition-bg duration-300 cursor-pointer hover:bg-[#1746a2] hover:outline hover:outline-2 hover:outline-white"
                    href="{{ url('/career/' . $division->slug . '/' . $position->slug) }}">
                        Details
                    </a>
                    <a class="apply bg-[#ff9900] text-white col-5 col-md-2 p-2 mx-1 rounded-3 text-center font-medium transition-bg duration-300 cursor-pointer hover:bg-[#1746a2] hover:outline hover:outline-2 hover:outline-white"
                    href="{{ $position->apply_link }}" target="_blank">
                        Daftar
                    </a>
                </div>
                @empty
                <div class="p-5 text-center bg-white rounded-4 shadow-sm w-100">
                    <p class="text-muted m-0">Saat ini belum ada posisi yang dibuka untuk divisi {{ $division->name }}.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- End career apply section -->
@endsection
