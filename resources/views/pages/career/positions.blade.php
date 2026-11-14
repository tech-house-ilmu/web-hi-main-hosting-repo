@extends('layout.app')

@section('title', 'Available Positions - ' . $division->name . ' | House Ilmu Indonesia')
@section('meta_description', 'Lihat posisi yang tersedia di divisi ' . $division->name . ' House Ilmu Indonesia.')

@section('content')
<main class="career-page detail-page">
    <div class="detail-container">
        <!-- Breadcrumb -->
        <nav class="detail-breadcrumb" aria-label="Breadcrumb">
            <a href="{{ route('home') }}">Beranda</a>
            <span style="color: #8191a8;">/</span>
            <a href="{{ route('career.index') }}">Career</a>
            <span style="color: #8191a8;">/</span>
            <span class="detail-badge">{{ $division->name }}</span>
        </nav>

        <!-- Heading -->
        <div class="detail-heading">
            <h1>{{ $division->name }}</h1>
            <p>
                Temukan posisi yang sesuai dengan keahlian dan minatmu. Bersama House Ilmu Indonesia, kembangkan soft skill, leadership, dan portofolio profesionalmu.
            </p>
        </div>

        <!-- Available Positions List -->
        <div style="max-width: 928px; margin: 0 auto 40px; display: flex; flex-direction: column; gap: 16px;">
            @forelse ($positions as $position)
                <div style="background: #ffffff; border: 1.5px solid #245fb5; border-radius: 12px; padding: 22px 28px; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 16px; box-shadow: 0 4px 14px rgba(16,45,92,0.06); transition: transform .2s ease;">
                    <div style="flex: 1 1 300px;">
                        <span style="display: inline-block; background: #fff9f0; color: #ff8517; border: 1px solid #ffd4a8; border-radius: 20px; padding: 4px 12px; font-size: 11px; font-weight: 800; margin-bottom: 8px;">
                            {{ $division->name }}
                        </span>
                        <h2 style="font-size: 20px; font-weight: 800; color: #102d5c; margin: 0 0 4px;">
                            {{ $position->title }}
                        </h2>
                        <span style="color: #71839b; font-size: 13px; font-weight: 600;">
                            Daring &amp; Hibrida · Indonesia
                        </span>
                    </div>

                    <div style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
                        <a href="{{ route('career.show', ['division' => $division->slug, 'slug' => $position->slug]) }}"
                           style="display: inline-block; background: #fff; color: #245fb5; border: 1.5px solid #245fb5; border-radius: 8px; padding: 9px 18px; font-weight: 800; font-size: 13px; text-decoration: none; transition: .2s;">
                            Detail Posisi →
                        </a>

                        @if($position->apply_link)
                            <a href="{{ $position->apply_link }}" target="_blank" rel="noopener noreferrer"
                               style="display: inline-block; background: #ff8517; color: white; border-radius: 8px; padding: 9px 20px; font-weight: 800; font-size: 13px; text-decoration: none; box-shadow: 0 2px 0 #d66a0a; transition: .2s;">
                                Daftar Sekarang ↗
                            </a>
                        @endif
                    </div>
                </div>
            @empty
                <div style="background: #ffffff; border: 1.5px dashed #bccde3; border-radius: 12px; padding: 48px 24px; text-align: center;">
                    <i class="fa-solid fa-briefcase" style="font-size: 40px; color: #bccde3; margin-bottom: 16px;"></i>
                    <h3 style="font-size: 18px; font-weight: 800; color: #102d5c; margin-bottom: 8px;">Belum Ada Posisi Dibuka</h3>
                    <p style="color: #71839b; font-size: 14px; margin: 0;">
                        Saat ini belum ada posisi aktif di divisi {{ $division->name }}. Pantau terus kanal resmi kami untuk rekrutmen berikutnya!
                    </p>
                </div>
            @endforelse
        </div>

        <!-- Back Button -->
        <div style="text-align: center; margin-top: 30px;">
            <a href="{{ route('career.index') }}#career-opportunities"
               style="color: #245fb5; font-weight: 800; font-size: 14px; text-decoration: none;">
                ← Kembali ke Daftar Divisi
            </a>
        </div>
    </div>
</main>
@endsection
