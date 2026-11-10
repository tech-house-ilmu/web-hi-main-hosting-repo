/**
 * High-performance Throttled Scroll To Top Module
 */
export function initScrollToTop() {
    const scrollBtn = document.getElementById('scrollToTopBtn');
    if (!scrollBtn) return;

    let ticking = false;

    window.addEventListener('scroll', () => {
        if (!ticking) {
            window.requestAnimationFrame(() => {
                if (window.scrollY > 400) {
                    scrollBtn.classList.remove('opacity-0', 'pointer-events-none');
                    scrollBtn.classList.add('opacity-100', 'pointer-events-auto');
                } else {
                    scrollBtn.classList.remove('opacity-100', 'pointer-events-auto');
                    scrollBtn.classList.add('opacity-0', 'pointer-events-none');
                }
                ticking = false;
            });
            ticking = true;
        }
    }, { passive: true });

    scrollBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}
