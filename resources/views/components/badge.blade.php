@props([
    'variant' => 'website',
])

@php
    $variantClasses = match($variant) {
        'free' => 'bg-[#E4F7EC] text-[#14713C] font-black text-[10px] tracking-wide uppercase px-3 py-1.5 rounded-full inline-flex items-center justify-center',
        'website' => 'bg-[#EAF2FF] text-[#1656A5] font-bold text-[10px] px-2.5 py-1 rounded-[15px] inline-flex items-center justify-center',
        'category' => 'bg-[#EAF2FF] text-[#1656A5] font-bold text-[10px] px-2.5 py-1 rounded-[15px] inline-flex items-center justify-center',
        'status' => 'text-[#FF8A18] font-bold text-xs inline-flex items-center',
        default => 'bg-gray-100 text-gray-700 font-semibold text-xs px-2.5 py-1 rounded-full inline-flex items-center',
    };
@endphp

<span {{ $attributes->merge(['class' => $variantClasses]) }}>
    {{ $slot }}
</span>
