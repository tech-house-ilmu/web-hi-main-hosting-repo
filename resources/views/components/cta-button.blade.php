@props([
    'href' => '#',
    'external' => false,
    'arrow' => true,
    'full' => false,
    'variant' => 'orange',
])

@php
    $baseClasses = 'inline-flex items-center justify-center gap-1.5 font-extrabold text-xs transition duration-200 cursor-pointer text-decoration-none select-none';
    $variantClasses = match($variant) {
        'orange' => 'bg-[#FF8A16] hover:bg-[#E8730C] border border-[#E8730C] text-white rounded-lg shadow-sm hover:shadow hover:-translate-y-0.5',
        'outline' => 'bg-white hover:bg-orange-50 border border-[#FF8A16] text-[#FF8A16] rounded-lg',
        default => 'bg-[#FF8A16] hover:bg-[#E8730C] border border-[#E8730C] text-white rounded-lg',
    };
    $widthClasses = $full ? 'w-full' : 'w-fit';
    $paddingClasses = 'px-4 py-2.5';
@endphp

<a 
    href="{{ $href }}"
    @if($external) target="_blank" rel="noopener noreferrer" @endif
    {{ $attributes->merge(['class' => "$baseClasses $variantClasses $widthClasses $paddingClasses"]) }}
>
    <span>{{ $slot }}</span>
    @if($arrow)
        <span class="text-xs leading-none">&#8599;</span>
    @endif
</a>
