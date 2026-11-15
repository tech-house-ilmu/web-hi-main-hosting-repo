/**
 * Programme 3D Carousel & Event Interaction Module
 */
export function initProgrammeCarousel() {
    const slides = Array.from(document.querySelectorAll('.carousel-slide-item'));
    if (!slides.length) return;

    const prevBtn = document.getElementById('carousel-prev-btn');
    const nextBtn = document.getElementById('carousel-next-btn');
    const titleEl = document.getElementById('carousel-active-title');
    const typeEl = document.getElementById('carousel-active-type');
    const counterEl = document.getElementById('carousel-active-counter');
    const dots = Array.from(document.querySelectorAll('.carousel-dot'));

    let currentIndex = 0;
    const totalSlides = slides.length;
    let autoplayTimer = null;

    function updateCarousel() {
        slides.forEach((slide, idx) => {
            slide.classList.remove('active', 'prev', 'next', 'hidden-slide');

            if (idx === currentIndex) {
                slide.classList.add('active');
            } else if (idx === (currentIndex - 1 + totalSlides) % totalSlides) {
                slide.classList.add('prev');
            } else if (idx === (currentIndex + 1) % totalSlides) {
                slide.classList.add('next');
            } else {
                slide.classList.add('hidden-slide');
            }
        });

        // Update info panel
        const activeSlide = slides[currentIndex];
        if (activeSlide) {
            const title = activeSlide.dataset.title || '';
            const type = activeSlide.dataset.type || '';
            if (titleEl) titleEl.textContent = title;
            if (typeEl) typeEl.textContent = type;
            if (counterEl) {
                const formattedNum = String(currentIndex + 1).padStart(2, '0');
                const formattedTotal = String(totalSlides).padStart(2, '0');
                counterEl.textContent = `${formattedNum} / ${formattedTotal}`;
            }
        }

        // Update dot indicators
        dots.forEach((dot, idx) => {
            if (idx === currentIndex) {
                dot.className = 'carousel-dot active-dot';
            } else {
                dot.className = 'carousel-dot inactive-dot';
            }
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateCarousel();
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        updateCarousel();
    }

    function goToSlide(idx) {
        currentIndex = idx;
        updateCarousel();
    }

    if (prevBtn) prevBtn.addEventListener('click', () => { prevSlide(); restartAutoplay(); });
    if (nextBtn) nextBtn.addEventListener('click', () => { nextSlide(); restartAutoplay(); });

    dots.forEach(dot => {
        dot.addEventListener('click', function () {
            const idx = parseInt(this.dataset.dotIndex, 10);
            if (!isNaN(idx)) {
                goToSlide(idx);
                restartAutoplay();
            }
        });
    });

    slides.forEach(slide => {
        slide.addEventListener('click', function () {
            const idx = parseInt(this.dataset.index, 10);
            if (!isNaN(idx) && idx !== currentIndex) {
                goToSlide(idx);
                restartAutoplay();
            }
        });
    });

    function startAutoplay() {
        autoplayTimer = setInterval(nextSlide, 5000);
    }

    function stopAutoplay() {
        if (autoplayTimer) {
            clearInterval(autoplayTimer);
            autoplayTimer = null;
        }
    }

    function restartAutoplay() {
        stopAutoplay();
        startAutoplay();
    }

    const container = document.querySelector('.hero-carousel-stage') || document.querySelector('.hero-carousel-container');
    if (container) {
        container.addEventListener('mouseenter', stopAutoplay);
        container.addEventListener('mouseleave', startAutoplay);

        let touchStartX = 0;
        let touchEndX = 0;
        container.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });
        container.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            if (touchStartX - touchEndX > 50) {
                nextSlide();
                restartAutoplay();
            } else if (touchEndX - touchStartX > 50) {
                prevSlide();
                restartAutoplay();
            }
        }, { passive: true });
    }

    updateCarousel();
    startAutoplay();

    // Explore Program anchor scroll & highlight
    const exploreLinks = document.querySelectorAll('.explore-program-link');
    exploreLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.dataset.target;
            const targetEl = document.getElementById(targetId);
            if (targetEl) {
                targetEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
                targetEl.classList.remove('card-highlight');
                void targetEl.offsetWidth;
                targetEl.classList.add('card-highlight');
            }
        });
    });

    // Event Modal Handling
    const modal = document.getElementById('event-detail-modal');
    const modalCard = document.getElementById('modal-card');
    const closeModalBtn = document.getElementById('close-modal-btn');
    const modalCancelBtn = document.getElementById('modal-cancel-btn');
    const openDetailBtns = document.querySelectorAll('.open-detail-btn');

    const modalImg = document.getElementById('modal-img');
    const modalBadge = document.getElementById('modal-badge');
    const modalTitle = document.getElementById('modal-title');
    const modalStatus = document.getElementById('modal-status');
    const modalDesc = document.getElementById('modal-desc');

    function openModal(data) {
        if (!modal) return;
        if (modalImg) modalImg.src = data.image || '';
        if (modalBadge) modalBadge.textContent = data.badge || '';
        if (modalTitle) modalTitle.textContent = data.title || '';
        if (modalStatus) modalStatus.textContent = data.status || '';
        if (modalDesc) modalDesc.textContent = data.desc || '';

        modal.classList.remove('opacity-0', 'pointer-events-none');
        if (modalCard) {
            modalCard.classList.remove('scale-95');
            modalCard.classList.add('scale-100');
        }
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        if (!modal) return;
        modal.classList.add('opacity-0', 'pointer-events-none');
        if (modalCard) {
            modalCard.classList.remove('scale-100');
            modalCard.classList.add('scale-95');
        }
        document.body.style.overflow = '';
    }

    openDetailBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            openModal({
                image: this.dataset.image,
                badge: this.dataset.badge,
                title: this.dataset.title,
                status: this.dataset.status,
                desc: this.dataset.desc,
            });
        });
    });

    if (closeModalBtn) closeModalBtn.addEventListener('click', closeModal);
    if (modalCancelBtn) modalCancelBtn.addEventListener('click', closeModal);

    if (modal) {
        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                closeModal();
            }
        });
    }

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && modal && !modal.classList.contains('pointer-events-none')) {
            closeModal();
        }
    });
}
