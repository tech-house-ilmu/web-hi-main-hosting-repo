@extends('layout.app')

@section('title', 'Alumni Stories | House Ilmu Indonesia')
@section('meta_description', 'Cerita tentang proses belajar, relasi, dan kontribusi para alumni setelah bertumbuh bersama House Ilmu Indonesia.')

@section('content')
<main class="career-page">
    <div class="stories-page" style="max-width: 1200px; margin: auto; padding: 65px 24px 80px;">
        <div style="margin-bottom: 24px;">
            <a href="{{ route('career.index') }}" style="color: #245fb5; font-weight: 800; text-decoration: none; font-size: 14px;">
                ← Kembali ke Career
            </a>
        </div>

        <div class="stories-header" style="text-align: center; margin-bottom: 45px;">
            <h1 style="font-family: 'Nunito', sans-serif; font-size: clamp(32px, 4vw, 48px); font-weight: 900; color: #ff8517; margin: 0 0 14px;">
                Alumni Stories
            </h1>
            <p style="color: #71839b; line-height: 1.8; font-size: 16px; max-width: 650px; margin: 0 auto;">
                Cerita tentang proses belajar, relasi, dan kontribusi setelah bertumbuh bersama House Ilmu Indonesia.
            </p>
            <div style="width: 42px; height: 3px; background: #ff8517; margin: 18px auto 0;"></div>
        </div>

        <div class="stories-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
            @if(isset($testimoniAlumni) && $testimoniAlumni->count() > 0)
                @foreach($testimoniAlumni as $alumni)
                    <article class="story-card" style="background: #fff; border-radius: 14px; overflow: hidden; box-shadow: 0 5px 18px rgba(16,45,92,.08);">
                        <div class="story-image" style="width: 100%; height: 220px; background: #e9edf2; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                            @if($alumni->testimoni_alumni_img)
                                <img src="{{ Storage::url($alumni->testimoni_alumni_img) }}" alt="{{ $alumni->testimoni_alumni_name }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <span style="color: #77869a; font-size: 12px; font-weight: 800; letter-spacing: 1px;">FOTO ALUMNI</span>
                            @endif
                        </div>
                        <div class="story-content" style="padding: 24px;">
                            <span class="quote-mark" style="color: #ff8517; font-size: 28px; font-weight: 900; line-height: 1;">“</span>
                            <h2 style="font-size: 20px; font-weight: 800; color: #102d5c; margin: 12px 0 6px;">{{ $alumni->testimoni_alumni_name }}</h2>
                            <div class="story-role" style="color: #8191a8; font-size: 13px; font-weight: 600; margin-bottom: 12px;">{{ $alumni->testimoni_alumni_position }}</div>
                            <p style="color: #556882; font-size: 14px; line-height: 1.8; margin-bottom: 16px;">
                                {{ $alumni->testimoni_alumni_description }}
                            </p>
                            <button type="button" class="open-alumni-modal" style="background: none; border: none; padding: 0; color: #245fb5; font-weight: 800; font-size: 13px; cursor: pointer;">
                                Selengkapnya →
                            </button>
                        </div>
                    </article>
                @endforeach
            @else
                <!-- Default Stories from Design -->
                @php
                    $defaultStories = [
                        [
                            'name' => 'Aiko',
                            'role' => 'Peserta dan Relawan HI',
                            'story' => 'House Ilmu bukan cuma tempat untuk belajar, tapi juga tempat untuk bertemu orang-orang hebat, menemukan kesempatan baru, dan terus berkembang bersama dalam suasana yang hangat dan penuh dukungan.'
                        ],
                        [
                            'name' => 'Lina Dwi',
                            'role' => 'Staf House Ilmu Indonesia',
                            'story' => 'Di HI saya mendapatkan pengalaman, teman, dan pengetahuan baru. Saya juga bisa menerapkan pengetahuan yang saya miliki untuk mendukung kegiatan bersama serta melatih kepemimpinan.'
                        ],
                        [
                            'name' => 'Melinda',
                            'role' => 'Peserta Risyk',
                            'story' => 'Pengalamannya terasa berdampak karena saya belajar tentang team building, manajemen, dan pola pikir kepemimpinan yang langsung dapat diterapkan dalam dunia profesional.'
                        ],
                        [
                            'name' => 'Syifau',
                            'role' => 'Relawan Batch 2024',
                            'story' => 'Bergabung di House Ilmu membuka perspektif baru tentang bagaimana edukasi berbasis komunitas dapat menyentuh anak muda secara langsung dan inklusif.'
                        ],
                        [
                            'name' => 'Fadhila',
                            'role' => 'Alumni Event Review CV',
                            'story' => 'Review CV di House Ilmu memberikan feedback yang sangat detail dan aplikatif. Berkat masukan mentor, saya berhasil lolos program magang impian saya.'
                        ],
                        [
                            'name' => 'Rifky',
                            'role' => 'Alumni Program Sudut Karir',
                            'story' => 'Diskusi bersama praktisi di Sudut Karir membuat saya lebih percaya diri saat menghadapi sesi wawancara kerja dan mengasah critical thinking.'
                        ],
                    ];
                @endphp

                @foreach($defaultStories as $story)
                    <article class="story-card" style="background: #fff; border-radius: 14px; overflow: hidden; box-shadow: 0 5px 18px rgba(16,45,92,.08);">
                        <div class="story-image" style="width: 100%; height: 200px; background: #e9edf2; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                            <span style="color: #77869a; font-size: 12px; font-weight: 800; letter-spacing: 1px;">FOTO ALUMNI</span>
                        </div>
                        <div class="story-content" style="padding: 24px;">
                            <span class="quote-mark" style="color: #ff8517; font-size: 28px; font-weight: 900; line-height: 1;">“</span>
                            <h2 style="font-size: 20px; font-weight: 800; color: #102d5c; margin: 12px 0 6px;">{{ $story['name'] }}</h2>
                            <div class="story-role" style="color: #8191a8; font-size: 13px; font-weight: 600; margin-bottom: 12px;">{{ $story['role'] }}</div>
                            <p style="color: #556882; font-size: 14px; line-height: 1.8; margin-bottom: 16px;">
                                {{ $story['story'] }}
                            </p>
                            <button type="button" class="open-alumni-modal" style="background: none; border: none; padding: 0; color: #245fb5; font-weight: 800; font-size: 13px; cursor: pointer;">
                                Selengkapnya →
                            </button>
                        </div>
                    </article>
                @endforeach
            @endif
        </div>
    </div>
</main>
@endsection
