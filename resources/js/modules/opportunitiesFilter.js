/**
 * HI Opportunities Live Search & Category AJAX Filtering
 */
export function initOpportunitiesFilter() {
    const cardsContainer = document.getElementById('hitcc-cards-container');
    if (!cardsContainer) return;

    const categoryButtons = document.querySelectorAll('.opportunities-pill-btn');
    const searchForm = document.getElementById('search-form');
    const searchInput = document.getElementById('search-input');
    const sectionTop = document.getElementById('opportunities-section');

    const urlParams = new URLSearchParams(window.location.search);
    let currentCategory = urlParams.get('category') || 'all';
    let currentSearch = urlParams.get('search') || '';
    let searchDebounce = null;
    let abortController = null;

    function fetchOpportunities(page = 1, scrollToCards = false, pushState = true) {
        if (abortController) {
            abortController.abort();
        }
        abortController = new AbortController();

        const params = new URLSearchParams();
        if (currentCategory && currentCategory !== 'all') {
            params.set('category', currentCategory);
        }
        if (currentSearch) {
            params.set('search', currentSearch);
        }
        if (page > 1) {
            params.set('page', page);
        }

        const newUrl = `${window.location.pathname}${params.toString() ? '?' + params.toString() : ''}`;
        if (pushState) {
            window.history.pushState({}, '', newUrl);
        }

        cardsContainer.style.opacity = '0.5';

        fetch(newUrl, {
            signal: abortController.signal,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => res.text())
        .then(html => {
            cardsContainer.innerHTML = html;
            cardsContainer.style.opacity = '1';
            attachPaginationListeners();

            if (scrollToCards && sectionTop) {
                sectionTop.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        })
        .catch(err => {
            if (err.name === 'AbortError') return;
            console.error('Error loading opportunities:', err);
            cardsContainer.style.opacity = '1';
        });
    }

    function syncPillsUI() {
        categoryButtons.forEach(btn => {
            if (btn.dataset.category === currentCategory) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });
    }

    function attachPaginationListeners() {
        const paginationLinks = cardsContainer.querySelectorAll('.pagination-link');
        paginationLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const url = new URL(this.href, window.location.origin);
                const page = url.searchParams.get('page') || 1;
                fetchOpportunities(page, true);
            });
        });
    }

    categoryButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            currentCategory = this.dataset.category;
            syncPillsUI();
            fetchOpportunities(1);
        });
    });

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            clearTimeout(searchDebounce);
            searchDebounce = setTimeout(() => {
                currentSearch = searchInput.value.trim();
                fetchOpportunities(1);
            }, 300);
        });
    }

    if (searchForm) {
        searchForm.addEventListener('submit', function (e) {
            e.preventDefault();
            clearTimeout(searchDebounce);
            currentSearch = searchInput ? searchInput.value.trim() : '';
            fetchOpportunities(1);
        });
    }

    window.addEventListener('popstate', () => {
        const params = new URLSearchParams(window.location.search);
        currentCategory = params.get('category') || 'all';
        currentSearch = params.get('search') || '';
        if (searchInput) {
            searchInput.value = currentSearch;
        }
        syncPillsUI();
        fetchOpportunities(1, false, false);
    });

    attachPaginationListeners();
}
