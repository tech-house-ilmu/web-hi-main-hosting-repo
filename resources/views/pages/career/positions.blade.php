@extends('layout.app')

@section('title', 'Career | House Ilmu Indonesia')

@section('content')
    <!-- Start career apply section -->
    <section class="available max-w-7xl mx-auto px-4 mt-12">
        <!-- back button -->
        <div class="back inline-block mb-4">
            <a href="{{ route('career.index') }}#career-info" class="text-[#1746A2] font-semibold hover:underline"><i class="fa-solid fa-chevron-left mr-1"></i> Kembali</a>
        </div>
        <div class="available-container max-w-7xl mx-auto flex flex-col justify-center items-center mb-16">
            <h1 class="py-4 text-3xl font-bold text-center" style="color: #1746A2;">Available Position - {{ $division->name }}</h1>
            <div class="apply-info max-w-7xl w-full flex flex-col justify-center items-center">
                @forelse ($positions as $i => $position)
                    <div
                        class="w-full flex flex-wrap justify-center items-center text-center p-3 gap-4 md:flex-nowrap md:justify-start md:text-left md:gap-0 rounded-lg mb-2"
                        style="background-color: {{ $i % 2 == 0 ? '#1746A2' : '#D9D9D9' }};">
                        <h4 class="w-full md:w-7/12 text-base md:pl-4 md:text-lg lg:text-xl font-medium"
                            style="color: {{ $i % 2 == 0 ? 'white' : 'black' }};">
                            {{ $position->title }}
                        </h4>
                        <a class="details bg-[#ff9900] text-white w-5/12 md:w-2/12 p-2 mx-1 rounded-lg text-center font-medium transition duration-300 cursor-pointer hover:bg-[#1746a2] hover:outline hover:outline-2 hover:outline-white"
                           href="{{ route('career.show', ['division' => $division->slug, 'slug' => $position->slug]) }}">
                            Details
                        </a>
                        <a class="apply bg-[#ff9900] text-white w-5/12 md:w-2/12 p-2 mx-1 rounded-lg text-center font-medium transition duration-300 cursor-pointer hover:bg-[#1746a2] hover:outline hover:outline-2 hover:outline-white"
                           href="{{ $position->apply_link }}" target="_blank" rel="noopener noreferrer">
                            Daftar
                        </a>
                    </div>
                @empty
                    <p class="text-center text-gray-500 my-4">Belum ada posisi yang tersedia untuk divisi ini.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
