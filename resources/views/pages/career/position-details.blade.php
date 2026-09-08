@extends('layout.app')

@section('title', 'Career | House Ilmu Indonesia')

@section('head')

@section('content')
        <!-- Start career apply section -->
    <section class="details-career container-xl mt-5">
        <div class="back d-inline">
            <a href="{{ route('career.division', $division->slug) }}"><i class="fa-solid fa-chevron-left"></i> Kembali</a>
        </div>
        <div class="details-career-container container d-flex flex-column justify-content-center align-items-start">
            <h1 class="py-4 fw-bold text-center" style="color: #FF731D;">{{ $position->title }}</h1>
            <h1 class="py-4">Job Description</h1>
            <ol class="py-4">
                @foreach (explode("\n", $position->job_description) as $desc)
                    <li>{!! $desc !!}</li>
                @endforeach
            </ol>

            <h1 class="py-4">Requirement</h1>
            <ul class="py-4">
                @foreach (explode("\n", $position->requirements) as $req)
                    <li>{!! $req !!}</li>
                @endforeach
            </ul>
        </div>
    </section>
    <!-- End career apply section -->
@endsection
