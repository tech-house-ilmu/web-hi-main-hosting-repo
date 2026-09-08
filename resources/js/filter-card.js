export function initAllCardsFilter() {
    initFilterCard();
    initSearchCard();
    initClickCard();
}

export function initFilterCard() {
    const categoryItems = document.querySelectorAll(".category-item");
    const allCards = document.querySelectorAll(".card-box");
    const cardsContainer = document.querySelector(".cards-container");

    if (!categoryItems.length || !allCards.length || !cardsContainer) {
        return;
    }

    categoryItems.forEach((item) => {
        item.addEventListener("click", function () {
            const labelEl = this.querySelector(".category-label");
            if (!labelEl) return;

            const category = labelEl.innerText.trim().toLowerCase();
            let hasResults = false;

            allCards.forEach((card) => {
                if (category === "semua" || card.classList.contains(category)) {
                    card.style.display = "block";
                    hasResults = true;
                } else {
                    card.style.display = "none";
                }
            });

            if (category !== "semua" && hasResults) {
                cardsContainer.classList.add("justify-content-start");
                cardsContainer.classList.remove("justify-content-around");
            } else {
                cardsContainer.classList.add("justify-content-around");
                cardsContainer.classList.remove("justify-content-start");
            }
        });
    });
}

export function initSearchCard() {
    const searchInput = document.querySelector(".search-container input, .form-control");
    const cards = document.querySelectorAll(".card-box");
    const cardsContainer = document.querySelector(".cards-container");

    if (!searchInput || !cards.length || !cardsContainer) {
        return;
    }

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
}

export function initClickCard() {
    const cards = document.querySelectorAll(".clickable-card");
    if (!cards.length) return;

    cards.forEach((card) => {
        card.addEventListener("click", function () {
            const url = card.getAttribute("data-url");
            if (url) {
                window.location.href = url;
            }
        });
    });
}
