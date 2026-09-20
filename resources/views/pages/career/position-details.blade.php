@extends('layout.app')

@section('title', 'Career | House Ilmu Indonesia')

@section('head')

@section('content')
    <!-- Start career apply section -->
    <section class="details-career max-w-7xl mx-auto px-4 mt-12 mb-16">
        <div class="back inline-block mb-4">
            <a href="{{ route('career.division', $division->slug) }}" class="text-[#1746A2] font-semibold hover:underline"><i class="fa-solid fa-chevron-left mr-1"></i> Kembali</a>
        </div>
        <div class="details-career-container max-w-4xl mx-auto flex flex-col justify-center items-start">
            <h1 class="py-4 font-bold text-3xl md:text-4xl text-left" style="color: #FF731D;">{{ $position->title }}</h1>
            <h2 class="py-2 text-2xl font-bold text-[#1746A2]">Job Description</h2>
            <ol class="py-2 list-decimal list-inside space-y-2 text-gray-700">
                @foreach (explode("\n", $position->job_description) as $desc)
                    <li>{!! $desc !!}</li>
                @endforeach
            </ol>

            <h2 class="py-4 text-2xl font-bold text-[#1746A2]">Requirement</h2>
            <ul class="py-2 list-disc list-inside space-y-2 text-gray-700">
                @foreach (explode("\n", $position->requirements) as $req)
                    <li>{!! $req !!}</li>
                @endforeach
            </ul>
        </div>
    </section>
    <!-- End career apply section -->
@endsection
