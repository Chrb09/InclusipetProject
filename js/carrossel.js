const swiper_index = new Swiper(".swiper-index", {
  // Optional parametersautoplay: {
  autoplay: {
    delay: 3000,
  },
  direction: "horizontal",
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
});

var swiper_blog = new Swiper(".swiper_blog", {
  slidesPerView: 1,
  spaceBetween: 20,
  freeMode: true,
  breakpoints: {
    475: {
      slidesPerView: 1.5,
    },
    // when window width is >= 640px
    640: {
      slidesPerView: 2.5,
    },
  },
});

var swiper_hero = new Swiper(".swiper_hero", {
  slidesPerView: 1.2,
  spaceBetween: 25,
  freeMode: true,
  breakpoints: {
    475: {
      slidesPerView: 1.6,
      spaceBetween: 35,
    },
  },
});

var swiper_ong = new Swiper(".swiper_ong", {
  slidesPerView: 1.2,
  spaceBetween: 10,
  grid: {
    rows: 2,
  },
  breakpoints: {
    400: {
      slidesPerView: 1.5,
    },
  },
});
