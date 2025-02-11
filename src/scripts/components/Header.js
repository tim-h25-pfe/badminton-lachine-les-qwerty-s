export default class Header {
  constructor(element) {
    this.element = element;
    this.options = {
      treshold: 0.0001,
      autoHide: false,
      // mettre a true pour ne pas cacher le header
    };
    this.scrollPosition = 0;
    this.lastScrollPosition = 0;
    this.html = document.documentElement;

    this.init();
    this.initNavMobile();
  }

  init() {
    this.setOptions();

    window.addEventListener('scroll', this.onScroll.bind(this));
  }

  setOptions() {
    if ('treshold' in this.element.dataset) {
      this.options.treshold = this.element.dataset.treshold;
    }
    if ('autoHide' in this.element.dataset) {
      this.options.autoHide = true;
    }
  }

  onScroll() {
    this.lastScrollPosition = this.scrollPosition;
    this.scrollPosition = document.scrollingElement.scrollTop;

    this.setHeaderState();
    this.setDirections();
  }

  setHeaderState() {
    if (
      this.scrollPosition >
        document.scrollingElement.scrollHeight * this.options.treshold &&
      this.options.autoHide == false
    ) {
      this.html.classList.add('header-is-hidden');
    } else {
      this.html.classList.remove('header-is-hidden');
    }
  }

  setDirections() {
    if (this.scrollPosition >= this.lastScrollPosition) {
      this.html.classList.add('is-scrolling-down');
      this.html.classList.remove('is-scrolling-up');
    } else {
      this.html.classList.remove('is-scrolling-down');
      this.html.classList.add('is-scrolling-up');
    }
  }

  initNavMobile() {
    const burger = this.element.querySelector('.js-toggle');
    burger.addEventListener('click', this.onToggleNav.bind(this));
  }

  onToggleNav() {
    document.documentElement.classList.toggle('nav-is-active');
  }
}
