<div id="scrollToTopBtn"
    class="opacity-0 fixed right-3 bottom-4 flex justify-center items-center z-50 transition-opacity duration-300 ease-in-out lg:right-5 lg:bottom-4 2xl:right-16 2xl:bottom-10">
    <button type="button"
            class="p-3 text-xl text-white bg-primary_HI rounded-xl border-none transition duration-300 lg:text-2xl xl:p-4 xl:text-2xl 2xl:!p-8 2xl:text-6xl 2xl:rounded-3xl hover:bg-secondary_HI hover:text-green-500">
        <i class="fa-solid fa-chevron-up"></i>
    </button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const scrollBtn = document.getElementById('scrollToTopBtn');
        if (!scrollBtn) return;

        // Scroll listener untuk muncul / hilang tombol
        window.addEventListener('scroll', function () {
            if (window.scrollY > 1000) {
                scrollBtn.classList.remove('opacity-0');
                scrollBtn.classList.add('opacity-100');
            } else {
                scrollBtn.classList.remove('opacity-100');
                scrollBtn.classList.add('opacity-0');
            }
        });

        // Aksi scroll ke atas saat tombol diklik
        scrollBtn.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    });
</script>