import Swiper from "swiper";
import { Navigation, Pagination, Autoplay } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

export function initSwiper() {
    if (document.querySelector(".main-swiper")) {
        new Swiper(".main-swiper", {
            modules: [Navigation, Pagination],
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        document.querySelectorAll(".nested-swiper").forEach((nestedSwiperEl) => {
            new Swiper(nestedSwiperEl, {
                modules: [Autoplay, Pagination],
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".nested-swiper-pagination",
                    clickable: true,
                },
            });
        });
    }
}
