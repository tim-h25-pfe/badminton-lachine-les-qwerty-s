import Swiper from 'swiper/bundle';

export default class Carousel {
  constructor(element) {
    this.element = element;
    this.options = {};
    if (this.element.classList.contains('js-swiper-partenaire')) {
      this.options = {
        slidesPerView: 3,
        speed: 4000,
        delay: 1,
        spaceBetween: 0,
      };
    } else if (this.element.classList.contains('js-swiper-accueilServices')) {
      this.options = {
        slidesPerView: 1.25,
        effect: 'coverflow',
        coverflowEffect: {
          rotate: 0,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows: false,
        },
        breakpoints: {
          0: {
            spaceBetween: 50,
          },
          768: {
            spaceBetween: 75,
          },
          1024: {
            spaceBetween: 100,
          },
        },
      };
    } else if (this.element.classList.contains('js-swiper-coursPrives')) {
      this.options = {
        slidesPerView: 2,
        spaceBetween: 25,
        autoHeight: true,
        navigation: {
          nextEl: document.querySelector('.content .swiper-button-next'),
          prevEl: document.querySelector('.content .swiper-button-prev'),
        },
      };
    } else if (this.element.classList.contains('js-swiper-fullGallerySwiper')) {
      this.options = {
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        slidesPerView: 1,
        spaceBetween: 0,
      };
    }
    this.init();
  }

  init() {
    this.setOptions();
    new Swiper(this.element, this.options);
  }

  setOptions() {
    if ('autoplay' in this.element.dataset) {
      this.options.autoplay = {
        autoplay: {
          delay: 0,
          disableOnInteraction: false,
        },
      };
    }
    if ('loop' in this.element.dataset) {
      this.options.loop = {
        loop: true,
      };
    }
    if ('freemode' in this.element.dataset) {
      this.options.freeMode = {
        enabled: true,
        momentum: false,
      };
    }
    if ('centered' in this.element.dataset) {
      this.options.centeredSlides = true;
    }
  }
}
