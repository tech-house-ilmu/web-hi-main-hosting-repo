@extends('layout.app')

@section('title', 'Beranda | House Ilmu Indonesia')
@section('meta_description', 'Persiapkan karir dan temukan jalan karirmu dengan mentoring bersama House Ilmu Indonesia!')
@section('meta_keywords', 'house ilmu indonesia, career, mentoring, internship, karir, cv, volunteer, mahasiswa, pengembangan karir, mahasiswa')
@section('canonical', url()->current())

@section('og_title', 'Mentoring, Review CV, & Webinar Karir – House Ilmu Indonesia')
@section('og_description', 'Platform mentoring buat persiapin karir kamu! Yuk bergabung bersama House Ilmu Indonesia!')
@section('og_image', asset('img/house-ilmu-indonesia.webp'))

@section('twitter_title', 'Mentoring, Review CV, & Webinar Karir – House Ilmu Indonesia')
@section('twitter_description', 'Platform mentoring buat persiapin karir kamu! Yuk bergabung bersama House Ilmu Indonesia!')
@section('twitter_image', asset('img/house-ilmu-indonesia.webp'))

@section('head')
  <style>
    /* CSS untuk foto testimoni */
    .testimonial-box img {
        width: 100px !important;
        height: 100px !important;
        border-radius: 50% !important;
        object-fit: cover !important;
        object-position: center !important;
    }

    .splide__slide .testimonial-box {
        display: flex;
        flex-direction: column;
        justify-content: flex-start !important;
        align-items: flex-start;
        gap: 1rem;
        min-height: 280px;
        border-radius: 12px;
        background-color: #f7d58b;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
  </style>
@endsection

@section('content')
  @include('partials.home.hero')
  @include('partials.home.our-impact')
  {{-- @include('partials.home.upcoming-events') --}}
  @include('partials.home.explore-programs')
  @include('partials.home.partners')
  @include('partials.home.testimonials')
  @include('partials.home.mentors')
  @include('partials.home.faq')
@endsection