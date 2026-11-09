console.log("✅ navbar-homepage.js loaded");

export function initNavbarToggle() {
    const burger = document.getElementById("burger");
    const nav = document.getElementById("navbarNavAltMarkup");

    if (!burger || !nav) {
        console.warn("Navbar toggle elements not found.");
        return;
    }

    const closeNav = () => {
        nav.style.maxHeight = "0px";
        nav.style.overflow = "hidden";
    };

    const openNav = () => {
        nav.style.maxHeight = nav.scrollHeight + "px";
        nav.style.overflow = "visible";
    };

    burger.addEventListener("click", () => {
        if (nav.style.maxHeight && nav.style.maxHeight !== "0px") {
            closeNav();
        } else {
            openNav();
        }
    });

    window.addEventListener("resize", () => {
        if (window.innerWidth >= 1024) {
            nav.style.maxHeight = "none";
            nav.style.overflow = "visible";
        } else {
            closeNav();
        }
    });

    // Set awal
    if (window.innerWidth >= 1024) {
        nav.style.maxHeight = "none";
        nav.style.overflow = "visible";
    } else {
        closeNav();
    }
}
