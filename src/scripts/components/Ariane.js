export default class Ariane {
  constructor(element) {
    this.element = element;
    this.options = {
      rootMargin: '0px 0px -50% 0px',
      repeat: true,
      threshold: 0.1, // Se déclenche seulement quand au moins 10% de l'élément est visible
    };
    this.nav = this.element.querySelector('.ariane-nav');
    this.links = [];
    this.headings = this.element.querySelectorAll('[data-ariane-section]');
    this.ups = [];

    this.type = null;

    this.init();
  }
  init() {
    if (this.element.hasAttribute('data-ariane-single')) {
      this.type = 'single';
    } else if (this.element.hasAttribute('data-ariane-progress')) {
      this.type = 'progress';
    } else {
      this.type = 'undefined';
    }

    if (this.type != 'undefined') {
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
    } else {
      const pe = document.createElement('p');
      pe.innerText = 'Type de nav non spécifié';
      if (this.nav) {
        this.nav.appendChild(pe);
      }
    }
  }

  initNav() {
    for (let i = 0; i < this.headings.length; i++) {
      const heading = this.headings[i];

      const text = heading.innerText;

      const id = 'heading' + i;
      heading.id = id;

      const link = document.createElement('a');
      const line = document.createElement('hr');
      const div = document.createElement('div');

      div.appendChild(link);
      div.appendChild(line);

      link.href = `#${id}`;
      link.innerText = text;

      if (this.nav) {
        this.nav.appendChild(div);
      }

      this.links.push(link);

      this.createLink(link, heading, id);

      if (this.type == 'progress') {
        const linkeu = heading.getAttribute('data-link');
        const bond = this.element.querySelector(`[data-linked="${linkeu}"]`);

        const rect = heading.getBoundingClientRect();
        if (rect.bottom < 0) {
          console.log(
            `Le heading "${heading.innerText}" est au-dessus du viewport`
          );
          bond.classList.add('active');
        }
      }
      if (this.type == 'single') {
        for (let i = 0; i < this.links.length; i++) {
          const link = this.links[i];
          link.classList.remove('active');
        }
      }
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

      if (!entry.isIntersecting && entry.boundingClientRect.top >= 0) {
        if (this.type == 'progress') {
          // pour la progression
          for (let i = 0; i < this.headings.length; i++) {
            const heading = this.headings[i];

            if (heading == target) {
              bond.classList.remove('active');
            }
          }
        }

        if (this.type == 'single') {
          const index = Array.from(this.headings).indexOf(target);
          if (index != 0) {
            const previousElement = this.headings[index - 1];

            const linkName = previousElement.getAttribute('data-link');
            let previousLink = this.element.querySelector(
              `[data-linked="${linkName}"]`
            );

            previousLink.classList.add('active');

            const l = target.getAttribute('data-link');
            const ll = this.element.querySelector(`[data-linked="${l}"]`);
            ll.classList.remove('active');
          }
        }
      }

      if (entry.isIntersecting) {
        // -------- pour voir le seul actif ---------
        if (this.type == 'single') {
          for (let i = 0; i < this.links.length; i++) {
            const linke = this.links[i];
            linke.classList.remove('active');
          }
          bond.classList.add('active');
        }

        //  ------- pour voir une progression -------
        if (this.type == 'progress') {
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
}
