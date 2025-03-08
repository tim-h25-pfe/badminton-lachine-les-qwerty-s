import Swiper from 'swiper/bundle';

export default class Carousel {
  constructor(element) {
    this.element = element;
    this.options = {};
    if (this.element.classList.contains('js-swiper-partenaire')) {
      this.options = {
        slidesPerView: 1, // Nombre de slides visibles (ajuste selon ton besoin)
        spaceBetween: 70, // Espacement entre les slides
        loop: true, // Active le mode boucle
        speed: 5000, // Définit la vitesse du scroll (ajuste selon ton besoin)
        autoplay: {
          delay: 0, // Pas de pause entre les slides
          disableOnInteraction: false, // Ne s'arrête pas au survol ou clic
        },
        breakpoints: {
          // when window width is >= 320px
          600: {
            slidesPerView: 2,
            spaceBetween: 150,
          },

          1000: {
            slidesPerView: 3,
            spaceBetween: 300,
          },
          // when window width is >= 480px
        },
        freeMode: true, // Permet un glissement fluide et continu
        momentum: true,
        momentumBounce: false,
        allowTouchMove: false, // Empêche le swipe manuel pour éviter des arrêts
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
          500: {
            spaceBetween: 75,
            slidesPerView: 1.25,
          },
          768: {
            spaceBetween: 75,
            slidesPerView: 2,
          },
          1024: {
            spaceBetween: 100,
            slidesPerView: 2,
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
    } else if (this.element.classList.contains('js-swiper-gallerySwiper')) {
      this.options = {
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        slidesPerView: 4.25,
        spaceBetween: 50,
        breakpoints: {
          0: {
            spaceBetween: 50,
            slidesPerView: 1.25,
          },
          768: {
            spaceBetween: 75,
            slidesPerView: 2.25,
          },
          1024: {
            spaceBetween: 100,
            slidesPerView: 3.25,
          },
        },
      };
    } else {
      console.log("pas d'options pour ce swiper");
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
