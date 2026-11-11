<div id="scrollToTopBtn"
    class="opacity-0 pointer-events-none fixed right-4 bottom-5 sm:right-6 sm:bottom-6 flex justify-center items-center z-50 transition-all duration-300 ease-in-out">
    <button type="button"
            aria-label="Scroll to top"
            class="w-9 h-9 sm:w-10 sm:h-10 text-sm text-white bg-[#103467] hover:bg-[#FF8A18] rounded-full border-none shadow-md flex items-center justify-center transition-all duration-200 hover:scale-105 active:scale-95 cursor-pointer">
        <i class="fa-solid fa-arrow-up"></i>
    </button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const scrollBtn = document.getElementById('scrollToTopBtn');
        if (!scrollBtn) return;

        window.addEventListener('scroll', function () {
            if (window.scrollY > 400) {
                scrollBtn.classList.remove('opacity-0', 'pointer-events-none');
                scrollBtn.classList.add('opacity-100', 'pointer-events-auto');
            } else {
                scrollBtn.classList.remove('opacity-100', 'pointer-events-auto');
                scrollBtn.classList.add('opacity-0', 'pointer-events-none');
            }
        });

        scrollBtn.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    });
</script>
