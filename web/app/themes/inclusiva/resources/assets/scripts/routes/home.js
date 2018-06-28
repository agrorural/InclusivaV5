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
  
  var homeSliderSelector = '#home__slider',
  isMove = false,
  homeSliderOptions = {
    init: false,
    loop: true,
    speed: 800,
    autoplay: {
      delay: 7000,
      disableOnInteraction: false,
    },
    effect: 'cube', // 'cube', 'fade', 'coverflow',
    cubeEffect: {
      shadow: false,
      // shadow: true,
      // slideShadows: true,
      // shadowOffset: 5,
      // shadowScale: 0.94,
    },
    grabCursor: true,
    // pagination: {
    //   el: '.swiper-pagination',
    //   clickable: true,
    // },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    // Events
    on: {
      init: function(){
        this.autoplay.stop();
      },
      imagesReady: function(){
        this.el.classList.remove('loading');
        this.autoplay.start();
      },
      touchMove: function(){
        if (!isMove) {
          this.el.classList.remove('scale-in');
          this.el.classList.add('scale-out');
          isMove = true;
        }
      },
      touchEnd: function(){
        this.el.classList.remove('scale-out');
        this.el.classList.add('scale-in');
        setTimeout(function(){
          isMove = false;
        }, 300);
      },
      slideChangeTransitionStart: function(){
        // console.log('slideChangeTransitionStart '+this.activeIndex);
        if (!isMove) {
          this.el.classList.remove('scale-in');
          this.el.classList.add('scale-out');
        }
      },
      slideChangeTransitionEnd: function(){
        // console.log('slideChangeTransitionEnd '+this.activeIndex);
        if (!isMove) {
          this.el.classList.remove('scale-out');
          this.el.classList.add('scale-in');
        }
      },
      transitionStart: function(){
        // console.log('transitionStart '+this.activeIndex);
      },
      transitionEnd: function(){
        // console.log('transitionEnd '+this.activeIndex);
      },
      slideChange:function(){
        // console.log('slideChange '+this.activeIndex);
        // console.log(this);
      },
    },
  },
  homeSlider = new Swiper(homeSliderSelector, homeSliderOptions);

// Initialize slider
homeSlider.init();


  let servicesSliderSelector = '#services__slider',
    servicesSliderOptions = {
      init: false,
      speed: 800,
      slidesPerView: 4,
      slidesPerGroup: 4,
      spaceBetween: 0,
      grabCursor: true,
      pagination: {
        el: '#services-pagination',
        bullets: true,
        clickable: true,
      },
      // navigation: {
      //   nextEl: '#services-arrow-right',
      //   prevEl: '#services-arrow-left',
      // },
      breakpoints: {
        576: {
          slidesPerView: 2,
          slidesPerGroup: 2,
        },
        768: {
          slidesPerView: 3,
          slidesPerGroup: 3,
        },
        992: {
          slidesPerView: 3,
          slidesPerGroup: 3,
        },
        1200: {
          slidesPerView: 4,
          slidesPerGroup: 4,
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
      spaceBetween: 15,
      navigation: {
        nextEl: '#links-arrow-right',
        prevEl: '#links-arrow-left',
      },
      breakpoints: {
        576: {
          slidesPerView: 2,
          slidesPerColumn: 1,
        },
        768: {
          slidesPerView: 2,
          slidesPerColumn: 2,
        },
        992: {
          slidesPerView: 3,
          slidesPerColumn: 2,
        },
        1200: {
          slidesPerView: 4,
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
