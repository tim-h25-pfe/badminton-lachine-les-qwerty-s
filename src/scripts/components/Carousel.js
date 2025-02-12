import Swiper from 'swiper/bundle';

export default class Carousel {
  constructor(element) {
    this.element = element;
    this.options = {
      slidesPerView: 3,
      speed: 4000,

      delay: 1,
      spaceBetween: 0,
    };
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
