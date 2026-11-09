@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex flex-wrap items-center justify-center gap-2 sm:gap-3 my-8 text-xs sm:text-sm font-semibold select-none">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="flex items-center gap-1.5 text-gray-400 cursor-not-allowed px-3 py-1.5 transition">
                <i class="fa-solid fa-chevron-left text-[10px]"></i> Sebelumnya
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-link flex items-center gap-1.5 text-gray-700 hover:text-[#FF731D] px-3 py-1.5 transition cursor-pointer">
                <i class="fa-solid fa-chevron-left text-[10px]"></i> Sebelumnya
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="px-2 py-1 text-gray-400 cursor-default">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-[#FF731D] text-white flex items-center justify-center font-bold text-xs sm:text-sm shadow-xs">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" class="pagination-link w-7 h-7 sm:w-8 sm:h-8 rounded-full text-gray-700 hover:bg-orange-50 hover:text-[#FF731D] flex items-center justify-center text-xs sm:text-sm font-semibold transition cursor-pointer">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination-link flex items-center gap-1.5 text-gray-700 hover:text-[#FF731D] px-3 py-1.5 transition cursor-pointer">
                Berikutnya <i class="fa-solid fa-chevron-right text-[10px]"></i>
            </a>
        @else
            <span class="flex items-center gap-1.5 text-gray-400 cursor-not-allowed px-3 py-1.5 transition">
                Berikutnya <i class="fa-solid fa-chevron-right text-[10px]"></i>
            </span>
        @endif
    </nav>
@endif
