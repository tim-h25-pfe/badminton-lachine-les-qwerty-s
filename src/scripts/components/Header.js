export default class Header {
  constructor(element) {
    this.element = element;
    this.options = {
      threshold: 0.02, // Valeur par défaut
      autoHide: false, // Par défaut, on masque le header au scroll
    };

    this.scrollPosition = 0;
    this.lastScrollPosition = 0;
    this.html = document.documentElement;

    this.overlay = document.querySelector('.overlay');

    this.searchToggle = this.element.querySelector('.search-toggle');
    this.searchContainer = this.element.querySelector('.search-bar');

    this.init();
    this.initNavMobile();
  }

  init() {
    this.searchToggle.addEventListener('click', this.toggleSearch.bind(this));
    if (this.closeButton && this.alertBanner) {
      this.closeButton.addEventListener('click', this.closeAlert.bind(this));
    }
    this.setOptions();
    window.addEventListener('scroll', this.onScroll.bind(this));
  }

  setOptions() {
    // Récupération des options depuis les attributs data-*
    if (this.element.dataset.threshold) {
      this.options.threshold = parseFloat(this.element.dataset.threshold);
    }
    document.querySelector('.closing').addEventListener('click', function () {
      this.closest('.alert-banner').style.display = 'none';
    });
  }

  onScroll() {
    this.lastScrollPosition = this.scrollPosition;
    this.scrollPosition = document.scrollingElement.scrollTop;

    this.setHeaderState();
    this.setDirections();
  }

  setHeaderState() {
    const scrollLimit =
      document.documentElement.scrollHeight * this.options.threshold;

    if (this.scrollPosition > scrollLimit && !this.options.autoHide) {
      this.html.classList.add('header-is-hidden');
    } else {
      this.html.classList.remove('header-is-hidden');
    }

    // Si on remonte, réafficher le header
    if (this.scrollPosition < this.lastScrollPosition) {
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
    if (burger) {
      burger.addEventListener('click', this.onToggleNav.bind(this));
    }
  }

  // Dans la classe Header
  onToggleNav(e) {
    e.preventDefault();
    const toggleButton = this.element.querySelector('.js-toggle');
    this.html.classList.toggle('nav-is-active');
    document.querySelector('.nav_menu').classList.toggle('active');
    const whatif = this.searchContainer.classList.contains('active');
    if (whatif) {
      this.searchContainer.classList.remove('active');
    } else {
      this.overlay.classList.toggle('active');
    }
    document.body.classList.toggle('no-scroll');

    // Ajoutez/retirez la classe is-active sur le bouton
    toggleButton.classList.toggle('is-active');
  }

  toggleSearch() {
    this.overlay.classList.toggle('active');
    this.searchContainer.classList.toggle('active');
  }
}

const searchContainer = document.querySelector('.search-bar');

// Ajoutez ce code pour fermer le menu en cliquant ailleurs
// Modifiez l'écouteur d'événement de l'overlay
document.querySelector('.overlay').addEventListener('click', () => {
  const toggleButton = document.querySelector('.js-toggle');
  document.querySelector('.nav_menu').classList.remove('active');
  searchContainer.classList.remove('active');
  document.querySelector('.overlay').classList.remove('active');
  document.body.classList.remove('no-scroll');

  // Retirez les classes actives
  toggleButton.classList.remove('is-active');
  document.documentElement.classList.remove('nav-is-active');
});

// Dans la fonction de fermeture
document.querySelector('.menu-close').addEventListener('click', function () {
  const toggleButton = document.querySelector('.js-toggle');

  // Fermer le menu
  document.querySelector('.nav_menu').classList.remove('active');
  document.querySelector('.overlay').classList.remove('active');
  document.body.classList.remove('no-scroll');

  // Réinitialiser le burger original
  toggleButton.classList.remove('is-active');
  document.documentElement.classList.remove('nav-is-active');
});
