// button close pad untuk sidebar silahkan costumise
const toggleSidebarButton = document.getElementById("toggleSidebar");
const sidebar = document.getElementById("sidebar");

if (toggleSidebarButton && sidebar) {
    toggleSidebarButton.addEventListener("click", () => {
        sidebar.classList.toggle("collapsed");
    });
}

// Mengontrol ikon toggle untuk menu
document.querySelectorAll(".toggleIcon").forEach(function (icon) {
    icon.addEventListener("click", function () {
        const menu = this.closest(".menu");
        const text = menu.querySelector(".hiddenText");
        const icon = this;

        // Toggle visibility of the hidden text with animation
        text.classList.toggle("show");
        icon.classList.toggle("fa-chevron-down");
        icon.classList.toggle("fa-chevron-up");
    });
});

// main menu controlling page
document.addEventListener("DOMContentLoaded", function () {
    const programmeLink = document.querySelector(
        '.nav-link[href="#programme"]'
    );
    const overviewLink = document.querySelector('.nav-link[href="#overview"]');
    const careerLink = document.querySelector('.nav-link[href="#career"]');
    const mainContent = document.querySelector(".overview-menu");

    // Fungsi untuk menangani permintaan fetch
    function handleFetchRequest(url) {
        fetch(url)
            .then((response) => response.text())
            .then((html) => {
                mainContent.innerHTML = html;
            })
            .catch((error) =>
                console.error(`Error fetching ${url} content:`, error)
            );
    }

    // Event listener untuk klik tombol Programme
    programmeLink?.addEventListener("click", function (e) {
        e.preventDefault();
        handleFetchRequest("/programme");
    });

    // Event listener untuk klik tombol Overview
    overviewLink?.addEventListener("click", function (e) {
        e.preventDefault();
        handleFetchRequest("/overview");
    });

    // Event listener untuk klik tombol Career
    careerLink?.addEventListener("click", function (e) {
        e.preventDefault();
        handleFetchRequest("/career");
    });
});

// Menampilkan dan menyembunyikan bagian input
function showInputSection() {
    document.getElementById("programmeSection").classList.add("d-none");
    document.getElementById("inputSection").classList.remove("d-none");
}

function showProgrammeSection() {
    document.getElementById("inputSection").classList.add("d-none");
    document.getElementById("programmeSection").classList.remove("d-none");
}

// Menampilkan form input testimoni
function showTestimoniInputSection() {
    document.getElementById("testimoniSection").classList.add("d-none"); // Sembunyikan daftar testimoni
    document.getElementById("create-testimoni-form").classList.remove("d-none"); // Tampilkan form input
}

// Menampilkan kembali daftar testimoni
function showTestimoniSection() {
    document.getElementById("create-testimoni-form").classList.add("d-none"); // Sembunyikan form input
    document.getElementById("testimoniSection").classList.remove("d-none"); // Tampilkan daftar testimoni
}

