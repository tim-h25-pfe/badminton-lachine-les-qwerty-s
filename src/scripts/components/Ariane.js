export default class Ariane {
  constructor(element) {
    this.element = element;
    this.options = {
      // rootMargin: '0px 0px -95% 0px',
      repeat: true,
    };
    this.lastScrollY = window.scrollY; // Stocke la position initiale du scroll
    this.nav = this.element.querySelector('.ariane-nav');
    this.links = [];
    this.headings = this.element.querySelectorAll('[data-ariane-section]');

    this.init();
  }
  init() {
    console.log('ariane est ici');
    console.log(this.headings);

    this.initNav();

    const observer = new IntersectionObserver(
      this.watch.bind(this),
      this.options
    );

    for (let i = 0; i < this.headings.length; i++) {
      const heading = this.headings[i];
      observer.observe(heading);
    }
    if (this.headings.length == 0) {
      console.log('pas de section enregistrée');
    }
  }

  initNav() {
    for (let i = 0; i < this.headings.length; i++) {
      const heading = this.headings[i];

      const text = heading.innerText;

      const id = 'heading' + i;
      heading.id = id;

      const link = document.createElement('a');

      link.href = `#${id}`;
      link.innerText = text;

      if (this.nav) {
        this.nav.appendChild(link);
      }

      this.links.push(link);

      this.createLink(link, heading, id);
    }
  }

  createLink(lien, titre, nom) {
    titre.setAttribute('data-link', nom);
    lien.setAttribute('data-linked', nom);
  }

  watch(entries) {
    let scrollDown = window.scrollY > this.lastScrollY; // Détecte la direction
    this.lastScrollY = window.scrollY; // Met à jour la position du scroll

    for (let i = 0; i < entries.length; i++) {
      const entry = entries[i];
      const target = entry.target;
      const link = target.getAttribute('data-link');
      const bond = this.element.querySelector(`[data-linked="${link}"]`);
      if (entry.isIntersecting && scrollDown) {
        // -------- pour voir le seul actif ---------

        for (let i = 0; i < this.links.length; i++) {
          const linke = this.links[i];
          linke.classList.remove('active');
        }
        bond.classList.add('active');

        //  ------- pour voir une progression -------
        // for (let i = 0; i < this.links.length; i++) {
        //   const linke = this.links[i];
        //   linke.classList.remove('active');
        // }
        // for (let i = 0; i < this.links.length; i++) {
        //   const linke = this.links[i];
        //   linke.classList.add('active');
        //   if (linke == bond) {
        //     return;
        //   }
        // }
      }
    }
  }
}
