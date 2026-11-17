document.addEventListener("DOMContentLoaded", function () {
  const elements = [
    { id: "singleEvent", file: "/partials/single-event.html" },
    { id: "singleEventSwiper", file: "/partials/single-event-swiper.html" },
    { id: "multiEvents", file: "/partials/multi-events.html" },
    { id: "multiEventsSwiper", file: "/partials/multi-events-swiper.html" },
  ];

  // Array untuk menyimpan semua fetch request
  let fetchPromises = elements.map(({ id, file }) => {
    return fetch(file)
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

  // Setelah semua partial selesai dimuat, baru jalankan Swiper
  Promise.all(fetchPromises).then(() => {
    import("/assets/js/modules/swiperConfig.js").then(({ initSwipers }) => {
      initSwipers();
    });
  });
});
