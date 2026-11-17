document.addEventListener("DOMContentLoaded", function () {
  const categoryItems = document.querySelectorAll(".category-item");
  const allCards = document.querySelectorAll(".card-box");
  const cardsContainer = document.querySelector(".cards-container");

  categoryItems.forEach((item) => {
    item.addEventListener("click", function () {
      const category = this.querySelector(".category-label")
        .innerText.trim()
        .toLowerCase();

      let hasResults = false;

      allCards.forEach((card) => {
        // Jika kategori "semua", tampilkan semua card
        if (category === "semua") {
          card.style.display = "block";
          hasResults = true;
        } else {
          // Cek apakah card memiliki class sesuai kategori yang dipilih
          if (card.classList.contains(category)) {
            card.style.display = "block";
            hasResults = true;
          } else {
            card.style.display = "none";
          }
        }
      });

      // Atur tata letak berdasarkan hasil filter
      if (category !== "semua" && hasResults) {
        cardsContainer.classList.add("justify-content-start");
        cardsContainer.classList.remove("justify-content-around");
      } else {
        cardsContainer.classList.add("justify-content-around");
        cardsContainer.classList.remove("justify-content-start");
      }
    });
  });
});

// search
document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.querySelector(".form-control");
  const cards = document.querySelectorAll(".card-box");
  const cardsContainer = document.querySelector(".cards-container");

  searchInput.addEventListener("input", function () {
    const query = searchInput.value.trim().toLowerCase();
    let hasResults = false;

    cards.forEach((card) => {
      const titleElements = card.querySelectorAll("h1, h5");
      let combinedTitle = "";

      titleElements.forEach((element) => {
        combinedTitle += element.textContent.toLowerCase() + " ";
      });

      if (combinedTitle.includes(query)) {
        card.style.display = "block";
        hasResults = true;
      } else {
        card.style.display = "none";
      }
    });

    if (hasResults) {
      cardsContainer.classList.add("justify-content-start");
      cardsContainer.classList.remove("justify-content-around");
    } else {
      cardsContainer.classList.add("justify-content-around");
      cardsContainer.classList.remove("justify-content-start");
    }
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
