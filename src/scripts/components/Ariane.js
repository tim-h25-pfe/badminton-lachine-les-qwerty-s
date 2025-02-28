export default class Ariane {
  constructor(element) {
    this.element = element;
    this.options = {
      // rootMargin: '0px 0px -95% 0px',
      repeat: true,
    };
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

      this.nav.appendChild(link);
      this.links.push(link);

      this.createLink(link, heading, id);
    }
  }

  createLink(lien, titre, nom) {
    titre.setAttribute('data-link', nom);
    lien.setAttribute('data-linked', nom);
  }

  watch(entries) {
    for (let i = 0; i < entries.length; i++) {
      const entry = entries[i];
      const target = entry.target;
      const link = target.getAttribute('data-link');
      const bond = this.element.querySelector(`[data-linked="${link}"]`);
      if (entry.isIntersecting) {
        // -------- pour voir le seul actif ---------

        // for (let i = 0; i < this.links.length; i++) {
        //   const linke = this.links[i];
        //   linke.classList.remove('active');
        // }
        // bond.classList.add('active');

        //  ------- pour voir une progression -------
        for (let i = 0; i < this.links.length; i++) {
          const linke = this.links[i];
          linke.classList.remove('active');
        }
        for (let i = 0; i < this.links.length; i++) {
          const linke = this.links[i];
          linke.classList.add('active');
          if (linke == bond) {
            return;
          }
        }
      }
    }
  }
}
