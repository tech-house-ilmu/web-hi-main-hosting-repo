@extends('layout.app')

@section('title', $article->title . ' | House Ilmu Indonesia')

@section('content')
    <section class="article container-xl mt-5">
        <!-- Start back button -->
        <div class="back d-inline">
            <a href="{{ route('article.index') }}"><i class="fa-solid fa-chevron-left"></i> Kembali</a>
        </div>
        <!-- End back button -->
        <div class="article-container container-xl d-flex flex-column justify-content-center align-items-start">
            <!-- Start title & author details section -->
            <div class="article-info d-flex flex-column">
                <h1 class="py-4 fw-bold" style="color: #174EA6;">{{ $article->title }}</h1>
                <p class="py-3" style="color: #797676;">{{ \Carbon\Carbon::parse($article->date)->translatedFormat('l, d F Y') }}</p>
                <p>Penulis : {{ $article->author }}</p>
                <p>Editor : {{ $article->editor }}</p>
            </div>
            <!-- End title & author details section -->
            <!-- Start article text section -->
            <img class="min-h-[300px] max-h-[500px] w-full object-contain rounded-4 my-5" src="{{ asset('storage/' . $article->img) }}"
                alt="gambar artikel {{ Str::slug($article->title) }}">
            <div class="article-text container-xl bg-secondary_HI outline outline-8 outline-primary_HI p-4 rounded-lg text-white">
                {!! str_replace('<img', '<img class="img-fluid"', $article->text) !!}
            </div>
            <!-- End article text section -->
            <!-- Start article social media section -->
            <div class="article-sosmed container-xl d-flex align-items-center py-5">
                <p style="color: #1746A2;">Share with :</p>
                <a class="rounded-5 mx-3" href="https://www.linkedin.com/company/house-ilmu-indonesia"
                    target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                <a class="rounded-5 mx-3" href="https://www.tiktok.com/@houseilmu.id" target="_blank"><i
                        class="fa-brands fa-tiktok"></i></a>
                <a class="rounded-5 mx-3" href="https://www.instagram.com/houseilmu.id" target="_blank"><i
                        class="fa-brands fa-instagram"></i></a>
            </div>
            <!-- End article social media section -->
            <!-- Start article comment form -->
            <div class="article-comment container-xl d-flex flex-column mb-4">
                <h1 class="py-2 fw-bold" style="color: #174EA6;">Leave a Reply</h1>
                <p class="py-2">Your email address will not be published. Required fields are marked <span
                        style="color:#FF0000;">*</span></p>
                <form class="comment-form" action="" method="">
                    <div class="mb-4">
                        <h5 class="fw-bold">Comment <span style="color:#FF0000;">*</span></h5>
                        <textarea class="py-2 px-1 rounded-4" name="comment" id="comment" cols="30" rows="10"
                            required></textarea>
                    </div>
                    <div class="mb-4">
                        <h5 class="fw-bold">Name <span style="color:#FF0000;">*</span></h5>
                        <input class="py-2 px-1 rounded-4" type="text" name="name" id="name" required>
                    </div>
                    <div class="mb-2">
                        <h5 class="fw-bold">Email <span style="color:#FF0000;">*</span></h5>
                        <input class="py-2 px-1 rounded-4" type="email" name="email" id="email" required>
                    </div>
                    <br>
                    <button class="post-btn float-end fw-bold py-3 px-4 rounded-4" type="submit"
                        name="send_comment">Post a comment</button>
                </form>
            </div>
            <!-- End article comment form -->
        </div>
    </section>
@endsection