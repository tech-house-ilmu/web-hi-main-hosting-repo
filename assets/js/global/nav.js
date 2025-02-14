// Fungsi untuk memuat navigasi
document.addEventListener("DOMContentLoaded", function () {
  fetch("/partials/nav.html")
    .then((response) => {
      if (!response.ok) {
        throw new Error("Gagal memuat navigasi");
      }
      return response.text();
    })
    .then((data) => {
      document.getElementById("nav-container").innerHTML = data;

      // Pindahkan script di sini agar dijalankan setelah navigasi selesai dimuat
      const navLinks = document.querySelectorAll(".nav-link");
      const currentUrl = window.location.pathname;

      navLinks.forEach((link) => {
        const linkUrl = new URL(link.href).pathname;

        // Cek apakah URL saat ini diawali dengan link href
        if (currentUrl.startsWith(linkUrl)) {
          // Hapus semua kelas active di link lain
          navLinks.forEach((item) => item.classList.remove("active"));

          // Tambahkan kelas active di link yang sesuai
          link.classList.add("active");
        }
      });
    })
    .catch((error) => {
      console.error("Error:", error);
    });
});
