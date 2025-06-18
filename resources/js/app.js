import './bootstrap';

import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'

Alpine.plugin(persist)
window.Alpine = Alpine
Alpine.start()



document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("search-input");
    const searchButton = document.getElementById("search-button");

    function focusSearchInput() {
        searchInput.focus();
    }

    searchButton.addEventListener("click", focusSearchInput);

    document.addEventListener("keydown", function (event) {
        if ((event.metaKey || event.ctrlKey) && event.key === "k") {
            event.preventDefault();
            focusSearchInput();
        }
    });

    document.addEventListener("keydown", function (event) {
        if (event.key === "/" && document.activeElement !== searchInput) {
            event.preventDefault();
            focusSearchInput();
        }
    });


});


document.addEventListener("DOMContentLoaded", () => {
    const year = document.getElementById("year");
    if (year) {
        year.textContent = new Date().getFullYear();
    }
});
