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

@section('content')
  @include('partials.home.hero')
  @include('partials.home.upcoming-events')
  @include('partials.home.explore-programs')
  @include('partials.home.our-impact')
  @include('partials.home.partners')
  @include('partials.home.testimonials')
  @include('partials.home.faq')
  @include('partials.home.cta')
@endsection