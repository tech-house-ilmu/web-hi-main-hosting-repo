@extends('layout.app')

@section('title', 'Article | House Ilmu Indonesia')

@section('content')
    <!-- Start articles section -->
    <section class="filter container-xxl mt-5">
        <!-- Filter Buttons - Desktop -->
        <div class="hidden md:flex justify-center w-[90%] mx-auto py-2 mb-4 gap-10 text-center bg-primary_light_HI rounded-lg">
            <button type="button" class="filter-btn active-filter text-white px-3 py-1 border-none bg-transparent !hover:text-secondary_HI" data-filter="all">Semua</button>
            <button type="button" class="filter-btn text-white px-3 py-1 border-none bg-transparent hover:text-secondary_HI" data-filter=".entrepreneur">Entrepreneur</button>
            <button type="button" class="filter-btn text-white px-3 py-1 border-none bg-transparent hover:text-secondary_HI" data-filter=".skill-development">Skill Development</button>
            <button type="button" class="filter-btn text-white px-3 py-1 border-none bg-transparent hover:text-secondary_HI" data-filter=".career-development">Career Development</button>
        </div>

        <!-- Filter Dropdown - Mobile -->
        <div class="md:hidden w-[90%] mx-auto py-2 px-2 mb-4 text-center bg-primary_light_HI rounded-lg">
            <select id="mobileFilter" class="w-full px-3 py-2 rounded bg-secondary_HI text-white border-none">
                <option value="all">Semua</option>
                <option value=".entrepreneur">Entrepreneur</option>
                <option value=".skill-development">Skill Development</option>
                <option value=".career-development">Career Development</option>
            </select>
        </div>

        <div class="articles-container my-5 px-4">
            <div id="mix-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($articles as $article)
                    <a href="{{ route('article.show', $article->slug) }}" class="mix {{ Str::slug($article->category) }} transition duration-200 hover:scale-105">
                        <div 
                            class="flex flex-col h-full p-4 bg-yellow-200 rounded-xl shadow-md hover:shadow-lg transition-all duration-300"
                            data-ref="mixitup-target"
                            data-category="{{ Str::slug($article->category) }}"
                        >
                            <img class="w-full h-60 object-cover rounded-md mb-4" src="{{ asset('storage/' . $article->img) }}" alt="gambar article {{ Str::slug($article->category) }}">
                            
                            <h2 class="text-lg font-semibold mb-2 line-clamp-2">{{ $article->title }}</h2>
                            
                            <p class="text-sm text-gray-700 mb-4 line-clamp-4">{{ Str::limit(strip_tags($article->text), 150) }}</p>
                            
                            <div class="flex items-center mt-auto pt-4 border-t border-gray-300">
                                <img class="w-10 h-10 rounded-full mr-3" src="{{ asset('img/logo.webp') }}" alt="logo house ilmu">
                                <div>
                                    <p class="text-sm font-medium">{{ $article->author }}</p>
                                    <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($article->date)->format('d F Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="col-span-full text-center text-muted">Belum ada artikel yang tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const containerEl = document.querySelector('#mix-container');
        if (!containerEl || typeof mixitup !== 'function') return;

        const mixer = mixitup(containerEl, {
            selectors: {
                target: '.mix'
            },
            animation: {
                duration: 300
            }
        });

        const mobileFilter = document.getElementById("mobileFilter");
        if (mobileFilter) {
            mobileFilter.addEventListener("change", function () {
                mixer.filter(this.value);
            });
        }

        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const filter = this.getAttribute('data-filter');
                mixer.filter(filter);

                document.querySelectorAll('.filter-btn').forEach(b => {
                    b.classList.remove('active-filter', 'text-secondary_HI');
                    b.classList.add('text-white');
                });

                this.classList.add('active-filter', 'text-secondary_HI');
                this.classList.remove('text-white');

                if (mobileFilter) {
                    mobileFilter.value = filter;
                }
            });
        });
    });
</script>
@endsection
