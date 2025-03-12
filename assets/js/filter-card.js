document.addEventListener("DOMContentLoaded", function () {
  const categoryItems = document.querySelectorAll(".category-item");
  const allCards = document.querySelectorAll(".col-md-4");

  categoryItems.forEach((item) => {
    item.addEventListener("click", function () {
      const category = this.querySelector(".category-label")
        .innerText.trim()
        .toLowerCase();

      allCards.forEach((card) => {
        let isMatch = false;

        // Ambil teks dari <h5> dan semua <p> dalam card
        const titleElement = card.querySelector(".card-body h5");
        const paragraphs = card.querySelectorAll(".card-body p");
        const titleText = titleElement
          ? titleElement.innerText.trim().toLowerCase()
          : "";
        let paragraphText = "";

        paragraphs.forEach((p) => {
          paragraphText += p.innerText.trim().toLowerCase() + " ";
        });

        // kategori berdasarkan judul atau teks dalam paragraf
        const categoryMap = {
          internship: ["internship"],
          competition: ["competition", "lomba", "seni","akademik", "menulis"],
          volunteer: ["volunteer"],
          exchange: ["exchange"],
        };

        if (category in categoryMap) {
          categoryMap[category].forEach((keyword) => {
            if (
              titleText.includes(keyword) ||
              paragraphText.includes(keyword)
            ) {
              isMatch = true;
            }
          });
        }
        if (category === "semua") {
          isMatch = true;
        }
        card.style.display = isMatch ? "block" : "none";
      });
    });
  });
});


// search
document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.querySelector(".form-control");
  const cards = document.querySelectorAll(".card-custom");

  searchInput.addEventListener("input", function () {
    const query = searchInput.value.toLowerCase();

    cards.forEach((card) => {
      const title = card.querySelector("h5").textContent.toLowerCase();
      if (title.includes(query)) {
        card.style.display = "block"; 
      } else {
        card.style.display = "none";
      }
    });
  });
});



document.addEventListener("DOMContentLoaded", function () {
  const cards = document.querySelectorAll(".clickable-card");

  cards.forEach((card) => {
    card.addEventListener("click", function () {
      const url = card.getAttribute("data-url");
      if (url) {
        window.location.href = url;
      }
    });
  });
});
