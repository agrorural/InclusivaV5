// Swiper
import Swiper from 'swiper/dist/js/swiper.js';

export default {
  init() {
    // JavaScript to be fired on the home page
    // Media Query event handler
    if (matchMedia) {
      const mq = window.matchMedia("(min-width: 768px)");
      mq.addListener(WidthChange);
      WidthChange(mq);
  }

  // Media Query change
  function WidthChange(mq) {
      if (!mq.matches) {
          jQuery('body').addClass('content-expanded');
          jQuery('body').removeClass('content-collapsed');
      }
  }

  // Params
  let homeSliderSelector = '#home__slider',
    homeSliderOptions = {
      init: false,
      loop: true,
      speed: 800,
      autoplay: {
        delay: 2500,
        disableOnInteraction: true,
      },
      slidesPerView: 1,
      effect: 'cube',
      // spaceBetween: 10,
      centeredSlides : true,
      // effect: 'fade', // 'cube', 'fade', 'coverflow',
      // coverflowEffect: {
      //   rotate: 50, // Slide rotate in degrees
      //   stretch: 0, // Stretch space between slides (in px)
      //   depth: 100, // Depth offset in px (slides translate in Z axis)
      //   modifier: 1, // Effect multipler
      //   slideShadows : true, // Enables slides shadows
      // },
      grabCursor: true,
      pagination: {
        el: '#home-pagination',
        // type: 'progressbar',
      },
      navigation: {
        nextEl: '#home-arrow-right',
        prevEl: '#home-arrow-left',
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
    servicesSliderOptions = {
      init: false,
      speed: 800,
      slidesPerView: 4,
      spaceBetween: 30,
      grabCursor: true,
      pagination: {
        el: '#services-pagination',
        type: 'fraction',
      },
      navigation: {
        nextEl: '#services-arrow-right',
        prevEl: '#services-arrow-left',
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

  let servicesSlider = new Swiper(servicesSliderSelector, servicesSliderOptions);

  // Initialize servicesSlider
  servicesSlider.init();

  let multimediaSliderSelector = '#multimedia__slider',
    multimediaSliderOptions = {
      init: false,
      direction: 'vertical',
      speed: 800,
      // grabCursor: true,
      pagination: {
        el: '#multimedia-pagination',
        clickable: true,
        bulletClass: 'nav-link',
        bulletActiveClass: 'active',
        renderBullet: function (index, className) {
          let indexName = '';
          
          if ( index == 0) {
            indexName = 'Videos';
          }else{
            indexName = 'Fotos';
          }

          return '<a href="#" class=" ' + className + '">' + indexName + '</a>';
        },
      },
      // Events
      on: {
        imagesReady: function(){
          this.el.classList.remove('loading');
        },
      },
    };

  let multimediaSlider = new Swiper(multimediaSliderSelector, multimediaSliderOptions);

  // Initialize multimediaSlider
  multimediaSlider.init();

  let multimediaVideoSliderSelector = '#multimedia__video__slider',
    multimediaVideoSliderOptions = {
      init: false,
      speed: 800,
      slidesPerView: 1,
      grabCursor: true,
      effect: 'fade',
      navigation: {
        nextEl: '#video-arrow-right',
        prevEl: '#video-arrow-left',
      },
      // Events
      on: {
        imagesReady: function(){
          this.el.classList.remove('loading');
        },
      },
    };

  let multimediaVideoSlider = new Swiper(multimediaVideoSliderSelector, multimediaVideoSliderOptions);

  // Initialize multimediaVideoSlider
  multimediaVideoSlider.init();

  let multimediaGallerySliderSelector = '#multimedia__gallery__slider',
    multimediaGallerySliderOptions = {
      init: false,
      speed: 800,
      slidesPerView: 1,
      effect: 'fade',
      grabCursor: true,
      navigation: {
        nextEl: '#gallery-arrow-right',
        prevEl: '#gallery-arrow-left',
      },
      // Events
      on: {
        imagesReady: function(){
          this.el.classList.remove('loading');
        },
      },
    };

  let multimediaGallerySlider = new Swiper(multimediaGallerySliderSelector, multimediaGallerySliderOptions);

  // Initialize multimediaGallerySlider
  multimediaGallerySlider.init();
  
  let linksSliderSelector = '#links__slider',
    linksSliderOptions = {
      init: false,
      // loop: true,
      speed: 800,
      slidesPerView: 4,
      slidesPerColumn: 2,
      spaceBetween: 30,
      navigation: {
        nextEl: '#links-arrow-right',
        prevEl: '#links-arrow-left',
      },
      breakpoints: {
        767: {
          slidesPerView: 2,
          slidesPerColumn: 2,
        },
      },
      // Events
      on: {
        imagesReady: function(){
          this.el.classList.remove('loading');
        },
      },
    };
  let linksSlider = new Swiper(linksSliderSelector, linksSliderOptions);

  // Initialize linksSlider
  linksSlider.init();

  // Direcciones Zonales SVG
  $( "[data-id]" ).on('mouseenter mouseleave',function () {
    $("[data-class=\"" + $(this).data("id") + "\"]").toggleClass("active");
  });

  // $( "[data-id]" ).hover(function(e) {
  //   $("[data-class=\"" + $(this).data("id") + "\"]").trigger(e.type);
  // });

  $( "[data-class]" ).on('mouseenter mouseleave',function () {
    $("[data-id=\"" + $(this).data("class") + "\"]").toggleClass("active");
  });
    
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
