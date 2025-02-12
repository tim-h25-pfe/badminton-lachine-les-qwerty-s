export default class Header {
  constructor(element) {
    this.element = element;
    this.options = {
      threshold: 0.1, // Valeur par défaut
      autoHide: false, // Par défaut, on masque le header au scroll
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
    // Récupération des options depuis les attributs data-*
    if (this.element.dataset.threshold) {
      this.options.threshold = parseFloat(this.element.dataset.threshold);
    }
    if (this.element.dataset.autoHide) {
      this.options.autoHide = this.element.dataset.autoHide === 'true';
    }
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

  onToggleNav() {
    this.html.classList.toggle('nav-is-active');
  }
}

document.addEventListener('DOMContentLoaded', function () {
  const searchToggle = document.querySelector('.search-toggle');
  const searchBar = document.querySelector('.search-bar');
  const searchClose = document.querySelector('.search-close');

  if (!searchToggle || !searchBar || !searchClose) {
    console.error('Un des éléments de la recherche est introuvable !');
    return;
  }

  searchToggle.addEventListener('click', function (e) {
    e.preventDefault(); // Empêche le lien d'agir comme un lien classique
    searchBar.classList.toggle('active');
  });

  searchClose.addEventListener('click', function () {
    searchBar.classList.remove('active');
  });

  // Fermer si on clique en dehors
  document.addEventListener('click', function (e) {
    if (!searchBar.contains(e.target) && !searchToggle.contains(e.target)) {
      searchBar.classList.remove('active');
    }
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const toggleButton = document.querySelector(".header__toggle");

  if (toggleButton) {
      toggleButton.addEventListener("click", (event) => {
          event.preventDefault(); // Empêche le lien `<a>` de recharger la page
          toggleButton.classList.toggle("is-active");
      });
  }
});
