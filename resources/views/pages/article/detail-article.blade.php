@extends('layout.app')

@section('title', $article->title . ' | House Ilmu Indonesia')
@section('meta_description', Str::limit(strip_tags($article->text), 150))
@section('og_title', $article->title)
@section('og_description', Str::limit(strip_tags($article->text), 150))
@section('og_image', asset('storage/' . $article->img))
@section('twitter_title', $article->title)
@section('twitter_description', Str::limit(strip_tags($article->text), 150))
@section('twitter_image', asset('storage/' . $article->img))

@section('content')
    <section class="article max-w-4xl mx-auto px-4 mt-12 mb-16">
        <!-- Start back button -->
        <div class="back inline-block mb-4">
            <a href="{{ route('article.index') }}" class="text-primary_HI font-semibold hover:underline inline-flex items-center"><i class="fa-solid fa-chevron-left mr-2"></i> Kembali</a>
        </div>
        <!-- End back button -->
        <div class="article-container w-full flex flex-col justify-center items-start">
            <!-- Start title & author details section -->
            <div class="article-info flex flex-col">
                <h1 class="py-4 font-bold text-3xl md:text-4xl" style="color: #174EA6;">{{ $article->title }}</h1>
                <p class="py-2 text-gray-500">{{ \Carbon\Carbon::parse($article->date)->translatedFormat('l, d F Y') }}</p>
                <p class="text-gray-700"><span class="font-semibold">Penulis :</span> {{ $article->author }}</p>
                <p class="text-gray-700"><span class="font-semibold">Editor :</span> {{ $article->editor }}</p>
            </div>
            <!-- End title & author details section -->
            <!-- Start article text section -->
            <img class="min-h-[300px] max-h-[500px] w-full object-contain rounded-2xl my-6" src="{{ asset('storage/' . $article->img) }}"
                alt="gambar artikel {{ Str::slug($article->title) }}" loading="lazy" decoding="async">
            <div class="article-text w-full bg-secondary_HI outline outline-8 outline-primary_HI p-6 rounded-2xl text-white prose max-w-none">
                {!! str_replace('<img', '<img class="max-w-full h-auto rounded-lg"', $article->text) !!}
            </div>
            <!-- End article text section -->
            <!-- Start article social media section -->
            <div class="article-sosmed w-full flex items-center py-8">
                <p class="font-semibold text-primary_HI">Share with :</p>
                <a class="mx-3 text-2xl text-primary_HI hover:text-hover_HI transition" href="https://www.linkedin.com/company/house-ilmu-indonesia"
                    target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                <a class="mx-3 text-2xl text-primary_HI hover:text-hover_HI transition" href="https://www.tiktok.com/@houseilmu.id" target="_blank"><i
                        class="fa-brands fa-tiktok"></i></a>
                <a class="mx-3 text-2xl text-primary_HI hover:text-hover_HI transition" href="https://www.instagram.com/houseilmu.id" target="_blank"><i
                        class="fa-brands fa-instagram"></i></a>
            </div>
            <!-- End article social media section -->
            <!-- Start article comment form -->
            <div class="article-comment w-full flex flex-col mb-12">
                <h1 class="py-2 font-bold text-2xl" style="color: #174EA6;">Leave a Reply</h1>
                <p class="py-2 text-gray-600">Your email address will not be published. Required fields are marked <span
                        class="text-red-500">*</span></p>
                <form class="comment-form flex flex-col gap-4 mt-2" action="" method="">
                    <div>
                        <h5 class="font-bold text-gray-800 mb-1">Comment <span class="text-red-500">*</span></h5>
                        <textarea class="w-full p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary_HI" name="comment" id="comment" cols="30" rows="6"
                            required></textarea>
                    </div>
                    <div>
                        <h5 class="font-bold text-gray-800 mb-1">Name <span class="text-red-500">*</span></h5>
                        <input class="w-full p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary_HI" type="text" name="name" id="name" required>
                    </div>
                    <div>
                        <h5 class="font-bold text-gray-800 mb-1">Email <span class="text-red-500">*</span></h5>
                        <input class="w-full p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary_HI" type="email" name="email" id="email" required>
                    </div>
                    <div>
                        <button class="post-btn float-right font-bold py-3 px-6 rounded-xl bg-primary_HI text-white hover:bg-hover_HI transition cursor-pointer" type="submit"
                            name="send_comment">Post a comment</button>
                    </div>
                </form>
            </div>
            <!-- End article comment form -->
        </div>
    </section>
@endsection