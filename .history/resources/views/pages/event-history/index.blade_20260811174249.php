@extends('layout.app')

@section('title', 'Event History | House Ilmu Indonesia')

@section('content')
<section class="container-xxl mt-10 mb-16">
    <div class="text-center mb-12">
        <p class="text-secondary_HI font-semibold uppercase tracking-[0.3em]">Event History</p>
        <h1 class="mt-4 text-4xl font-bold text-[#083D77]">Rekam Jejak Kegiatan</h1>
        <p class="mx-auto mt-4 max-w-2xl text-gray-600">Lihat program dan event kami yang telah dilaksanakan, bersama dokumentasi dan kategori acara.</p>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
        @forelse($historyItems as $item)
            <a href="{{ route('event-history.show', $item->slug) }}" class="block overflow-hidden rounded-[32px] border border-[#E5E7EB] bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                <img src="{{ asset('storage/' . $item->img) }}" alt="{{ $item->nama_event }}" class="h-64 w-full object-cover" />
                <div class="p-6">
                    <span class="mb-3 inline-block rounded-full bg-primary_light_HI px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-white">{{ $item->category }}</span>
                    <h2 class="text-2xl font-semibold text-[#083D77]">{{ $item->nama_event }}</h2>
                    <p class="mt-4 text-gray-700 leading-relaxed line-clamp-4">{{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 140) }}</p>
                    <div class="mt-6 flex items-center justify-between text-sm text-gray-500">
                        <span>{{ \Carbon\Carbon::parse($item->tanggal_event)->format('d F Y') }}</span>
                        <span class="font-semibold text-secondary_HI">Selengkapnya →</span>
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-full rounded-[32px] border border-[#E5E7EB] bg-white p-10 text-center text-gray-500">
                Belum ada riwayat event tersedia saat ini.
            </div>
        @endforelse
    </div>
</section>
@endsection
