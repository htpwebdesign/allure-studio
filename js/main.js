const swiper = new Swiper(".swiper", {
    // Optional parameters
    loop: true,

    // If we need pagination
    pagination: {
        el: ".swiper-pagination",
    },

    // Navigation arrows
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    // And if we need scrollbar
    scrollbar: {
        el: ".swiper-scrollbar",
    },
});

let gallery = document.getElementById("gallery-list");
lightGallery(gallery, {
    download: false,
    controls: false,
    counter: false,
    keyPress: false,
    enableDrag: false,
    enableSwipe: false,
});

// Isotope filtering
let isoButtons = document.querySelector(".isotope-buttons");
let isoGallery = document.querySelector(".gallery-list");
let iso = new Isotope(isoGallery, {
    // options
    itemSelector: ".isotope-item",
    layoutMode: "fitRows",
    percentPosition: true
});

isoButtons.addEventListener("click", function (event) {
    // only work with li
    if (!matchesSelector(event.target, "li")) {
        return;
    }
    let filterValue = event.target.getAttribute('data-filter');
    console.log(filterValue);
    iso.arrange({filter: filterValue});
});

// isoButtons.addEventListener("click", function (e) {
//     let li = e.target;
//     let filter = li.dataset.filter;
//     isoButtons.arrange({ filter: filter });
// });