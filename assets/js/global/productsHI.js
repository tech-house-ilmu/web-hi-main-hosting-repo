document.addEventListener("DOMContentLoaded", function () {
  const elements = [
    { id: "opp-HIproducts1", file: "/partials/productsHI1.html" },
    { id: "opp-HIproducts2", file: "/partials/productsHI2.html" },
    { id: "opp-HIproducts3", file: "/partials/productsHI3.html" },
    { id: "opp-HIproducts4", file: "/partials/productsHI4.html" },
  ];

  elements.forEach(({ id, file }) => {
    fetch(file)
      .then((response) => {
        if (!response.ok) {
          throw new Error(`Gagal memuat ${file}`);
        }
        return response.text();
      })
      .then((data) => {
        document.getElementById(id).innerHTML = data;
      })
      .catch((error) => console.error("Error:", error));
  });
});
