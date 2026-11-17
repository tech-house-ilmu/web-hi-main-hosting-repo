export function initSplides() {
    const partnerSplideEl = document.querySelector("#partnerSplide");
    if (partnerSplideEl) {
        const partnerSplide = new Splide(partnerSplideEl, {
            type: "loop",
            perPage: 3,
            perMove: 1,
            gap: "1rem",
            autoplay: true,
            pauseOnHover: true,
            arrows: true,
            pagination: true,
            breakpoints: {
                1960: { perPage: 4 },
                1440: { perPage: 3 },
                768: { perPage: 2 },
                500: { perPage: 1 },
            },
        });

        partnerSplide.on("mounted resize", () => {
            partnerSplide.set({ arrows: window.innerWidth > 500 });
        });

        if (!partnerSplide.state.is(Splide.STATES.MOUNTED)) {
            partnerSplide.mount();
        }
    }

    const testimonialSplideEl = document.querySelector("#testimonialSplide");
    if (testimonialSplideEl) {
        const testimonialSplide = new Splide(testimonialSplideEl, {
            type: "loop",
            perPage: 3,
            perMove: 1,
            gap: "1rem",
            autoplay: true,
            pauseOnHover: true,
            arrows: true,
            pagination: true,
            breakpoints: {
                1200: { perPage: 3 },
                992: { perPage: 3 },
                768: { perPage: 2 },
                500: { perPage: 1 },
            },
        });

        testimonialSplide.on("mounted resize", () => {
            testimonialSplide.set({ arrows: window.innerWidth > 500 });
        });

        if (!testimonialSplide.state.is(Splide.STATES.MOUNTED)) {
            testimonialSplide.mount();
        }
    }

    const alumniSplideEl = document.querySelector("#alumniSplide");
    if (alumniSplideEl) {
        const alumniSplide = new Splide(alumniSplideEl, {
            type: "loop",
            autoplay: true,
            perPage: 3,
            perMove: 1,
            pauseOnHover: true,
            arrows: true,
            pagination: true,
            gap: "1rem",
            breakpoints: {
                1200: { perPage: 4 },
                992: { perPage: 3 },
                768: { perPage: 2 },
                576: { perPage: 1 },
            },
        });

        alumniSplide.on("mounted resize", () => {
            alumniSplide.set({ arrows: window.innerWidth > 500 });
        });

        if (!alumniSplide.state.is(Splide.STATES.MOUNTED)) {
            alumniSplide.mount();
        }
    }
}
