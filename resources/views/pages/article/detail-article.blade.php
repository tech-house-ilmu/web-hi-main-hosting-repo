@extends('layout.app')

@php
    $imgSrc = asset('img/homepage/article/research1.webp');
    if (!empty($article->img)) {
        if (str_starts_with($article->img, 'http://') || str_starts_with($article->img, 'https://')) {
            $imgSrc = $article->img;
        } elseif (file_exists(public_path('storage/' . $article->img))) {
            $imgSrc = asset('storage/' . $article->img);
        } elseif (file_exists(public_path($article->img))) {
            $imgSrc = asset($article->img);
        }
    }
@endphp

@section('title', $article->title . ' | House Ilmu Indonesia')
@section('meta_description', Str::limit(strip_tags($article->text), 150))
@section('og_title', $article->title)
@section('og_description', Str::limit(strip_tags($article->text), 150))
@section('og_image', $imgSrc)
@section('twitter_title', $article->title)
@section('twitter_description', Str::limit(strip_tags($article->text), 150))
@section('twitter_image', $imgSrc)

@section('content')
    <section class="article max-w-4xl mx-auto px-4 sm:px-6 mt-6 sm:mt-12 mb-12 sm:mb-16">
        <!-- Back button -->
        <div class="back inline-block mb-3 sm:mb-4">
            <a href="{{ route('article.index') }}" class="text-primary_HI font-semibold hover:underline inline-flex items-center text-sm sm:text-base">
                <i class="fa-solid fa-chevron-left mr-2"></i> Kembali
            </a>
        </div>

        <div class="article-container w-full flex flex-col justify-center items-start">
            <!-- Title & author details section -->
            <div class="article-info flex flex-col w-full">
                <h1 class="py-2 sm:py-4 font-bold text-2xl sm:text-3xl md:text-4xl leading-snug sm:leading-tight" style="color: #174EA6; font-family: 'Libre Baskerville', Georgia, serif;">
                    {{ $article->title }}
                </h1>
                <p class="py-1 sm:py-2 text-xs sm:text-sm text-gray-500">{{ \Carbon\Carbon::parse($article->date)->translatedFormat('l, d F Y') }}</p>
                <div class="flex flex-col sm:flex-row sm:gap-6 text-xs sm:text-sm text-gray-700 mt-1">
                    <p><span class="font-semibold">Penulis :</span> {{ $article->author }}</p>
                    <p><span class="font-semibold">Editor :</span> {{ $article->editor }}</p>
                </div>
            </div>

            <!-- Article image -->
            <div class="w-full my-4 sm:my-6 overflow-hidden rounded-xl sm:rounded-2xl bg-gray-100 flex items-center justify-center">
                <img class="w-full max-h-[460px] object-cover sm:object-contain rounded-xl sm:rounded-2xl"
                     src="{{ $imgSrc }}"
                     alt="gambar artikel {{ Str::slug($article->title) }}"
                     loading="lazy"
                     decoding="async">
            </div>

            <!-- Article content -->
            <div class="article-text w-full bg-secondary_HI border-4 sm:border-8 border-primary_HI p-4 sm:p-6 rounded-xl sm:rounded-2xl text-white prose max-w-none break-words">
                {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $article->text) !!}
            </div>

            <!-- Share social media -->
            <div class="article-sosmed w-full flex flex-wrap items-center gap-3 sm:gap-4 py-6 sm:py-8">
                <p class="font-semibold text-primary_HI text-sm sm:text-base">Share with :</p>
                <div class="flex items-center gap-4">
                    <a class="text-xl sm:text-2xl text-primary_HI hover:text-hover_HI transition"
                       href="https://www.linkedin.com/company/house-ilmu-indonesia"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="Share to LinkedIn">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                    <a class="text-xl sm:text-2xl text-primary_HI hover:text-hover_HI transition"
                       href="https://www.tiktok.com/@houseilmu.id"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="Follow TikTok">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                    <a class="text-xl sm:text-2xl text-primary_HI hover:text-hover_HI transition"
                       href="https://www.instagram.com/houseilmu.id"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="Follow Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection