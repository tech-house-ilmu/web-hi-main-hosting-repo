@extends('layout.app')

@section('title', 'Career | House Ilmu Indonesia')

@section('head')

@section('content')
        <!-- Start career apply section -->
    <section class="details-career container-xl mt-5 mb-5">
        <div class="back d-inline mb-4">
            <a href="{{ url('/career/' . $division->slug) }}" class="fw-semibold text-decoration-none" style="color: #1746A2;">
                <i class="fa-solid fa-chevron-left"></i> Kembali ke Daftar Posisi
            </a>
        </div>
        <div class="details-career-container container bg-white rounded-4 shadow-sm p-4 p-md-5 mt-4 d-flex flex-column align-items-start">
            <div class="w-100 text-center pb-3 border-bottom">
                <span class="badge px-3 py-2 rounded-pill text-uppercase mb-2" style="background-color: #e8f0fe; color: #1746A2; font-size: 0.8rem; letter-spacing: 0.05em;">
                    Divisi: {{ $division->name }}
                </span>
                <h1 class="fw-bold" style="color: #FF731D;">{{ $position->title }}</h1>
            </div>

            <div class="w-100 py-3">
                <h3 class="fw-bold my-3" style="color: #1746A2; font-size: 1.4rem;">
                    <i class="fa-solid fa-briefcase me-2"></i> Job Description
                </h3>
                <ol class="ps-4 lh-lg" style="color: #334155; font-size: 0.95rem;">
                    @foreach (array_filter(array_map('trim', explode("\n", $position->job_description))) as $desc)
                        <li class="mb-2">{!! $desc !!}</li>
                    @endforeach
                </ol>

                <h3 class="fw-bold mt-5 mb-3" style="color: #1746A2; font-size: 1.4rem;">
                    <i class="fa-solid fa-list-check me-2"></i> Requirements
                </h3>
                <ul class="ps-4 lh-lg" style="color: #334155; font-size: 0.95rem;">
                    @foreach (array_filter(array_map('trim', explode("\n", $position->requirements))) as $req)
                        <li class="mb-2">{!! $req !!}</li>
                    @endforeach
                </ul>

                @if(!empty($position->apply_link))
                <div class="mt-5 pt-3 text-center border-top">
                    <a href="{{ $position->apply_link }}" target="_blank" rel="noopener noreferrer" 
                       class="btn text-white fw-bold px-5 py-3 rounded-pill shadow-sm"
                       style="background-color: #FF731D; font-size: 1rem; transition: transform 0.2s ease;">
                        Daftar Posisi Ini <i class="fa-solid fa-arrow-up-right-from-square ms-2"></i>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- End career apply section -->
@endsection
