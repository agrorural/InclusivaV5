// Swiper
import Swiper from 'swiper/dist/js/swiper.js';

export default {
  init() {
    // JavaScript to be fired on the about us page
    if(wp.header_type === "slider") {
      let landingSliderSelector = '#landing__slider',
      landingSliderOptions = {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        navigation: {
          nextEl: '#landing-arrow-right',
          prevEl: '#landing-arrow-left',
        },
        // Events
        on: {
          imagesReady: function(){
            this.el.classList.remove('loading');
          },
        },
      };

      let landingSlider = new Swiper(landingSliderSelector, landingSliderOptions);

      // Initialize landingSlider
      landingSlider.init();
    }

    if(wp.has_banners === "1") {
      let bannerSliderSelector = '#banner__slider',
      bannerSliderOptions = {
        slidesPerView: 4,
        spaceBetween: 30,
        loop: false,
        navigation: {
          nextEl: '#banner-arrow-right',
          prevEl: '#banner-arrow-left',
        },
        breakpoints: {
          320: {
            slidesPerView: 1,
          },
          576: {
            slidesPerView: 2,
          },
          768: {
            slidesPerView: 3,
          },
        },
        // Events
        on: {
          imagesReady: function(){
            this.el.classList.remove('loading');
          },
        },
      };

      let bannerSlider = new Swiper(bannerSliderSelector, bannerSliderOptions);

      // Initialize bannerSlider
      bannerSlider.init();
    }

    if(wp.has_videos === "1") {
      let videoSliderSelector = '#video__slider',
      videoSliderOptions = {
        slidesPerView: 4,
        spaceBetween: 30,
        loop: false,
        navigation: {
          nextEl: '#video-arrow-right',
          prevEl: '#video-arrow-left',
        },
        breakpoints: {
          320: {
            slidesPerView: 1,
          },
          576: {
            slidesPerView: 2,
          },
          768: {
            slidesPerView: 3,
          },
        },
        // Events
        on: {
          imagesReady: function(){
            this.el.classList.remove('loading');
          },
        },
      };

      let videoSlider = new Swiper(videoSliderSelector, videoSliderOptions);

      // Initialize videoSlider
      videoSlider.init();
    }
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
