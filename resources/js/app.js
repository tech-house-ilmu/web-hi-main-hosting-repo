import "./bootstrap";
import "bootstrap";
import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";
import mixitup from "mixitup";

import { initAOS } from "./global/aosConfig";
import { initNavbarToggle } from "./global/navbarHomepage";
import { initSplides } from "./modules/splideConfig";
import { initSwiper } from "./modules/swiperConfig";
import { initAllCardsFilter } from "./filter-card";

// Expose mixitup globally for blade views
window.mixitup = mixitup;

document.addEventListener("DOMContentLoaded", () => {
    initAOS();
    initNavbarToggle();
    initSwiper();
    initSplides();
    initAllCardsFilter();
});

Alpine.plugin(collapse);
window.Alpine = Alpine;
Alpine.start();
