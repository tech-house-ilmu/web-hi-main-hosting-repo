import "./bootstrap";
import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";

import { initAOS } from "./global/aosConfig";
import { initNavbarToggle } from "./global/navbarHomepage";
import { initSplides } from "./modules/splideConfig";
import { initSwiper } from "./modules/swiperConfig";
import { initAllCardsFilter } from "./filter-card";
import { initProgrammeCarousel } from "./modules/programmeCarousel";
import { initOpportunitiesFilter } from "./modules/opportunitiesFilter";
import { initScrollToTop } from "./modules/scrollToTop";

// DOM Initializer with element presence checks
document.addEventListener("DOMContentLoaded", () => {
    initAOS();
    initNavbarToggle();
    initSwiper();
    initSplides();
    initAllCardsFilter();
    initProgrammeCarousel();
    initOpportunitiesFilter();
    initScrollToTop();
});

Alpine.plugin(collapse);
window.Alpine = Alpine;
Alpine.start();
