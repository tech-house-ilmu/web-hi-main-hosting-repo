@extends('layout.app')

@section('title', $history->nama_event . ' | Event History')

@section('content')
<section class="container-xxl mt-10 mb-16">
    <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
        <div>
            <p class="text-secondary_HI font-semibold uppercase tracking-[0.3em]">Event History</p>
            <h1 class="mt-4 text-4xl font-bold text-[#083D77]">{{ $history->nama_event }}</h1>
            <p class="mt-3 text-gray-600">Kategori: <strong>{{ $history->category }}</strong></p>
        </div>
        <a href="{{ route('event-history.index') }}" class="inline-flex items-center rounded-full border border-primary_light_HI bg-primary_light_HI px-6 py-3 text-sm font-semibold text-white transition hover:bg-secondary_HI">Kembali ke Daftar</a>
    </div>

    <div class="mt-10 grid gap-8 lg:grid-cols-[1.3fr_0.7fr]">
        <div class="space-y-6 rounded-[32px] border border-[#E5E7EB] bg-white p-6 shadow-sm">
            <img src="{{ asset('storage/' . $history->img) }}" alt="{{ $history->nama_event }}" class="h-[420px] w-full rounded-[28px] object-cover" />
            <div class="space-y-4">
                <div class="flex flex-wrap gap-4 text-sm text-gray-500">
                    <span>Tanggal: {{ \Carbon\Carbon::parse($history->tanggal_event)->format('d F Y') }}</span>
                    <span class="inline-block rounded-full bg-gray-100 px-3 py-1">{{ $history->category }}</span>
                </div>
                <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $history->deskripsi }}</p>
            </div>
        </div>

        <aside class="rounded-[32px] border border-[#E5E7EB] bg-white p-6 shadow-sm">
            <h2 class="text-xl font-semibold text-[#083D77]">Informasi Event</h2>
            <ul class="mt-6 space-y-4 text-gray-700">
                <li><span class="font-semibold">Nama Event:</span> {{ $history->nama_event }}</li>
                <li><span class="font-semibold">Kategori:</span> {{ $history->category }}</li>
                <li><span class="font-semibold">Tanggal Event:</span> {{ \Carbon\Carbon::parse($history->tanggal_event)->format('d F Y') }}</li>
                <li><span class="font-semibold">Slug:</span> {{ $history->slug }}</li>
            </ul>
        </aside>
    </div>
</section>
@endsection
