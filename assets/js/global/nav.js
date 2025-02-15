document.addEventListener("DOMContentLoaded", function () {
  fetch("/partials/nav.html")
    .then((response) => {
      if (!response.ok) throw new Error("Gagal memuat navigasi");
      return response.text();
    })
    .then((data) => {
      // Masukkan HTML ke dalam nav-container
      document.getElementById("nav-container").innerHTML = data;

      // Tunggu hingga DOM diperbarui
      setTimeout(() => {
        // Pastikan elemen sudah ada sebelum melakukan query
        const navLinks = document.querySelectorAll(
          ".nav-link:not(.dropdown-toggle)"
        );

        if (navLinks.length === 0) {
          console.error("Tidak ada link navigasi yang ditemukan.");
          return;
        }

        // Fungsi normalisasi trailing slash
        const normalizePath = (path) =>
          path.endsWith("/") && path.length > 1 ? path.slice(0, -1) : path;

        const currentUrl = normalizePath(window.location.pathname);

        // Urutkan dari path terpanjang ke terpendek untuk mencegah false positive
        const sortedLinks = Array.from(navLinks).sort(
          (a, b) =>
            (b.getAttribute("href") || "").length -
            (a.getAttribute("href") || "").length
        );

        // Cek dan tambahkan class active
        sortedLinks.forEach((link) => {
          const linkUrl = normalizePath(
            new URL(link.getAttribute("href"), window.location.origin).pathname
          );

          // Tambahkan pengecekan khusus untuk Home
          if (linkUrl === "/" && currentUrl !== "/") {
            link.classList.remove("active");
            return; // Jika bukan di Home, jangan aktifkan Home
          }

          // Exact match
          if (currentUrl === linkUrl) {
            // Hapus class active dari semua link terlebih dahulu
            navLinks.forEach((item) => item.classList.remove("active"));
            // Tambahkan class active pada link yang sesuai
            link.classList.add("active");
          }
        });

        // Handle active state untuk dropdown items
        const dropdownItems = document.querySelectorAll(".dropdown-item");
        dropdownItems.forEach((item) => {
          const itemUrl = normalizePath(
            new URL(item.getAttribute("href"), window.location.origin).pathname
          );

          if (currentUrl === itemUrl) {
            item.classList.add("active");
            item
              .closest(".dropdown")
              .querySelector(".nav-link")
              .classList.add("active");
          }
        });
      }, 100); // Memberikan jeda 100ms untuk DOM update
    })
    .catch((error) => console.error("Error:", error));
});
