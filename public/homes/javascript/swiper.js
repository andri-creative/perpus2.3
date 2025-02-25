// ================================ Reskomedasi Start ========================================= //
var swiper = new Swiper(".rekomendasiSwiper", {
  slidesPerView: 4,
  spaceBetween: 30,
  freeMode: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".rekomendasi",
    clickable: true,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    576: {
      slidesPerView: 2,
      spaceBetween: 15,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: 30,
    },
  },
});

// ================================ Reskomedasi End ========================================= //
