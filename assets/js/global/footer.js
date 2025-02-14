// assets/js/global/nav.js

// Fungsi untuk memuat navigasi
document.addEventListener("DOMContentLoaded", function () {
  fetch("/partials/footer.html")
    .then((response) => {
      if (!response.ok) {
        throw new Error("Gagal memuat navigasi");
      }
      return response.text();
    })
    .then((data) => {
      document.getElementById("footer-container").innerHTML = data;
    })
    .catch((error) => {
      console.error("Error:", error);
    });
});
