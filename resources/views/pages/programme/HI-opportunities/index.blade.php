@extends('layout.app')

@section('title', 'HI Opportunities | House Ilmu Indonesia')

@section('content')
<section class="container-xxl my-4">
    <!-- Search Bar -->
    <div class="search-container container text-white">
        <form id="search-form" method="GET" action="{{ route('programme.hi.index') }}" class="input-group">
            <input type="text" name="search" value="{{ request('search') }}" 
                  class="form-control" placeholder="Search by Internship, Competition, Volunteer, & Exchange"/>
            <button class="btn search-btn-custom btn-lg" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i> Search
            </button>
        </form>
    </div>

    <!-- Category Cards -->
    @php
        $categoryImages = [
            'internship' => 'img/homepage/img-opp/internship.webp',
            'volunteer' => 'img/homepage/img-opp/volunteer.webp',
            'exchange' => 'img/homepage/img-opp/exchange.webp',
            'scholarship' => 'img/homepage/img-opp/beasiswa.webp',
            'competition' => 'img/homepage/img-opp/competition.webp',
        ];
    @endphp

    <div class="category-card container justify-content-between mt-4 gap-1">
        <!-- Semua -->
        <a href="#" data-category="all" 
          class="category-item text-center border-custom p-0 {{ request('category') == 'all' || !request('category') ? 'active' : '' }}">
            <img src="{{ asset('img/homepage/img-opp/semua.webp') }}" alt="Semua"/>
            <div class="d-flex justify-content-center card-img">
                <span class="category-label">Semua</span>
            </div>
        </a>

        @foreach($categories as $category)
            @php
                $imagePath = $categoryImages[$category->slug] ?? 'img/homepage/img-opp/default.jpg';
            @endphp
            <a href="#" data-category="{{ $category->slug }}" 
              class="category-item text-center border-custom p-0 {{ request('category') == $category->slug ? 'active' : '' }}">
                <img src="{{ asset($imagePath) }}" alt="{{ $category->name }}"/>
                <div class="card-img d-flex justify-content-center">
                    <span class="category-label">{{ $category->name }}</span>
                </div>
            </a>
        @endforeach
    </div>

    <!-- Opportunity Cards -->
    <div id="hitcc-cards">
        @include('partials.hitcc-cards', ['opportunities' => $opportunities])
    </div>
</section>

@endsection

@section('scripts')
  <script>
  document.addEventListener('DOMContentLoaded', function () {
      const cardsContainer = document.getElementById('hitcc-cards');
      const categoryLinks = document.querySelectorAll('.category-item');
      const searchForm = document.getElementById('search-form');

      let currentCategory = '{{ request("category") ?? "all" }}';
      let currentSearch = '{{ request("search") ?? "" }}';
      
      function fetchOpportunities(page = 1) {
          const params = new URLSearchParams({
              category: currentCategory,
              search: currentSearch,
              page: page
          });

          fetch(`{{ route('programme.hi.index') }}?${params.toString()}`, {
              headers: {
                  'X-Requested-With': 'XMLHttpRequest'
              }
          })
          .then(res => res.text())
          .then(html => {
              cardsContainer.innerHTML = html;
              attachPaginationLinks();
          })
          .catch(err => console.error(err));
      }

      function attachPaginationLinks() {
          const links = cardsContainer.querySelectorAll('.pagination a');
          links.forEach(link => {
              link.addEventListener('click', function(e) {
                  e.preventDefault();
                  const url = new URL(this.href);
                  const page = url.searchParams.get('page') || 1;
                  fetchOpportunities(page);
              });
          });
      }

      // Category filter
      categoryLinks.forEach(link => {
          link.addEventListener('click', function(e) {
              e.preventDefault();
              currentCategory = this.dataset.category;
              // update active class
              categoryLinks.forEach(l => l.classList.remove('active'));
              this.classList.add('active');
              fetchOpportunities();
          });
      });

      // Search
      searchForm.addEventListener('submit', function(e) {
          e.preventDefault();
          currentSearch = this.querySelector('input[name="search"]').value;
          fetchOpportunities();
      });
  });
  </script>
@endsection
