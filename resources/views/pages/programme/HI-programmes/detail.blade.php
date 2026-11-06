@extends('layout.app')

@section('title', $event['title'] . ' | House Ilmu Indonesia')
@section('meta_description', 'Detail program ' . $event['title'] . ' di House Ilmu Indonesia. ' . $event['desc'])
@section('hide_comments', true)

@section('head')
<!-- Google Fonts: Editorial Serif and Clean Display -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;0,900;1,600;1,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    .font-editorial {
        font-family: 'Playfair Display', Georgia, serif;
    }
    .font-sans-clean {
        font-family: 'Plus Jakarta Sans', var(--font-sans), sans-serif;
    }
</style>
@endsection

@section('content')
<div class="bg-[#FFF9F0] w-full text-[#152A5E] font-sans-clean min-h-[calc(100vh-220px)]">
    <div class="max-w-[1020px] w-full mx-auto px-4 sm:px-6 lg:px-8 pt-7 sm:pt-9 pb-20 sm:pb-28">
        
        <!-- Back Link -->
        <div class="mb-6 sm:mb-8">
            <a 
                href="{{ route('programme.programmes') }}" 
                class="inline-flex items-center gap-1.5 text-xs font-semibold text-[#152A5E] hover:text-[#FF731D] transition-colors group"
            >
                <span class="group-hover:-translate-x-0.5 transition-transform">&larr;</span>
                <span>Kembali ke HI Programme</span>
            </a>
        </div>

        <!-- Main Detail Grid -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-12 items-center">
            
            <!-- Left Column: Poster Image -->
            <div class="md:col-span-5 flex justify-center md:justify-start">
                <div class="w-full max-w-[330px] sm:max-w-[360px] aspect-[3/4] rounded-[24px] overflow-hidden shadow-[0_10px_30px_rgba(0,0,0,0.06)] border border-gray-100/80 bg-white relative">
                    <img 
                        src="{{ asset($event['image']) }}" 
                        alt="{{ $event['title'] }}" 
                        class="w-full h-full object-cover"
                        loading="eager"
                    >
                </div>
            </div>

            <!-- Right Column: Info & Action -->
            <div class="md:col-span-7 flex flex-col items-start">
                
                <!-- Badges -->
                <div class="flex flex-wrap items-center gap-2 mb-3.5">
                    <span class="bg-[#E6F8F0] text-[#0D8050] px-3.5 py-1 rounded-full text-[11px] sm:text-xs font-bold uppercase tracking-wider inline-block">
                        {{ $event['event_type'] ?? 'EVENT GRATIS' }}
                    </span>
                    <span class="bg-[#EBF3FF] text-[#1856C9] px-3.5 py-1 rounded-full text-[11px] sm:text-xs font-medium inline-block tracking-wide">
                        {{ $event['registration_badge'] ?? 'Pendaftaran Google Form' }}
                    </span>
                </div>

                <!-- Event Title -->
                <h1 class="font-editorial text-3xl sm:text-4xl lg:text-[42px] font-bold text-[#152A5E] leading-[1.18] mb-3.5">
                    {{ $event['title'] }}
                </h1>

                <!-- Event Description -->
                <p class="text-xs sm:text-[13.5px] text-gray-600 leading-relaxed font-sans-clean mb-6 max-w-xl">
                    {{ $event['desc'] }}
                </p>

                <!-- 3 Meta Information Cards -->
                <div class="grid grid-cols-3 gap-2.5 sm:gap-3.5 w-full max-w-lg mb-6">
                    <!-- Tanggal -->
                    <div class="bg-white rounded-2xl border border-gray-100/90 shadow-[0_2px_12px_rgba(0,0,0,0.03)] p-3.5 sm:p-4 flex flex-col justify-center">
                        <span class="text-[10px] sm:text-[11px] font-bold tracking-wider text-gray-400 uppercase font-sans-clean mb-1">
                            TANGGAL
                        </span>
                        <span class="text-xs sm:text-[13px] font-bold text-[#152A5E] font-sans-clean leading-snug">
                            {{ $event['date'] ?? 'Tanggal akan diumumkan' }}
                        </span>
                    </div>

                    <!-- Tempat -->
                    <div class="bg-white rounded-2xl border border-gray-100/90 shadow-[0_2px_12px_rgba(0,0,0,0.03)] p-3.5 sm:p-4 flex flex-col justify-center">
                        <span class="text-[10px] sm:text-[11px] font-bold tracking-wider text-gray-400 uppercase font-sans-clean mb-1">
                            TEMPAT
                        </span>
                        <span class="text-xs sm:text-[13px] font-bold text-[#152A5E] font-sans-clean leading-snug">
                            {{ $event['location'] ?? 'Daring' }}
                        </span>
                    </div>

                    <!-- Biaya -->
                    <div class="bg-white rounded-2xl border border-gray-100/90 shadow-[0_2px_12px_rgba(0,0,0,0.03)] p-3.5 sm:p-4 flex flex-col justify-center">
                        <span class="text-[10px] sm:text-[11px] font-bold tracking-wider text-gray-400 uppercase font-sans-clean mb-1">
                            BIAYA
                        </span>
                        <span class="text-xs sm:text-[13px] font-bold text-[#152A5E] font-sans-clean leading-snug">
                            {{ $event['price'] ?? 'Gratis' }}
                        </span>
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="mb-3">
                    <a 
                        href="{{ $event['form_url'] ?? 'https://forms.gle/houseilmu' }}" 
                        target="_blank" 
                        rel="noopener noreferrer"
                        class="inline-flex items-center justify-center gap-2 px-6 sm:px-7 py-3 rounded-xl bg-[#FF731D] hover:bg-[#E8620D] text-white font-bold text-xs sm:text-sm tracking-wide transition-all duration-200 shadow-md hover:shadow-lg cursor-pointer transform hover:-translate-y-0.5 font-sans-clean"
                    >
                        <span>Daftar melalui Google Form</span>
                        <span class="text-sm">↗</span>
                    </a>
                </div>

                <!-- Footer Disclaimer -->
                <p class="text-[11px] sm:text-xs text-gray-500 font-sans-clean leading-relaxed">
                    Pendaftaran dan pembayaran, jika diperlukan, dilanjutkan pada formulir eksternal.
                </p>

            </div>

        </div>

    </div>
</div>
@endsection
