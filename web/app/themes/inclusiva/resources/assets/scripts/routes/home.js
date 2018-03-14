// Swiper
import Swiper from 'swiper/dist/js/swiper.js';

export default {
  init() {
    // JavaScript to be fired on the home page
    // Params
    let homeSliderSelector = '#home__slider',
      homeSliderOptions = {
        init: false,
        loop: true,
        speed: 800,
        slidesPerView: 2, // or 'auto'
        // spaceBetween: 10,
        centeredSlides : true,
        effect: 'coverflow', // 'cube', 'fade', 'coverflow',
        coverflowEffect: {
          rotate: 50, // Slide rotate in degrees
          stretch: 0, // Stretch space between slides (in px)
          depth: 100, // Depth offset in px (slides translate in Z axis)
          modifier: 1, // Effect multipler
          slideShadows : true, // Enables slides shadows
        },
        grabCursor: true,
        parallax: true,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: {
          767: {
            slidesPerView: 1,
            spaceBetween: 0,
          },
        },
        // Events
        on: {
          imagesReady: function(){
            this.el.classList.remove('loading');
          },
        },
      };
    let homeSlider = new Swiper(homeSliderSelector, homeSliderOptions);

    // Initialize homeSlider
    homeSlider.init();

    let servicesSliderSelector = '#services__slider',
      options = {
        init: false,
        loop: true,
        speed: 800,
        slidesPerView: 4,
        spaceBetween: 30,
        centeredSlides : true,
        grabCursor: true,
        freMode: true,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: {
          767: {
            slidesPerView: 2,
          },
        },
        // Events
        on: {
          imagesReady: function(){
            this.el.classList.remove('loading');
          },
        },
      };
    let servicesSlider = new Swiper(servicesSliderSelector, options);

    // Initialize servicesSlider
    servicesSlider.init();
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
