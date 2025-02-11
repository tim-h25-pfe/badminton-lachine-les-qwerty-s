export default class Contrast {
  constructor(element) {
    this.element = element;
    this.options = {
      rootMargin: '0px 0px -95% 0px',
      repeat: true,
    };

    this.sections = this.element.getElementsByTagName('section');
    this.contrast = this.element.querySelectorAll('[data-contrast]');

    this.init();
  }
  init() {
    console.log('le contraste est ajusté');

    this.setOptions();

    this.checkColors();

    const observer = new IntersectionObserver(
      this.watch.bind(this),
      this.options
    );

    for (let i = 0; i < this.sections.length; i++) {
      const section = this.sections[i];
      observer.observe(section);
    }
  }

  setOptions() {
    if ('noRepeat' in this.element.dataset) {
      this.options.repeat = false;
    }
  }

  watch(entries) {
    for (let i = 0; i < entries.length; i++) {
      const entry = entries[i];
      const target = entry.target;
      const color = target.dataset.contrast;
      if (entry.isIntersecting) {
        for (let i = 0; i < this.contrast.length; i++) {
          const element = this.contrast[i];
          element.classList.add(`contrast-${color}`);
        }

        // if ('noRepeat' in target.dataset) {
        //   observer.unobserve(target);
        // }
      } else {
        for (let i = 0; i < this.contrast.length; i++) {
          const element = this.contrast[i];
          element.classList.remove(`contrast-${color}`);
        }
      }
    }
  }

  isDarkColor(color) {
    let rgb = color.match(/\d+/g); // Récupère [R, G, B]
    if (!rgb) return false;

    let [r, g, b] = rgb.map(Number);

    // Calcul de la luminance relative (YIQ)
    let brightness = (r * 299 + g * 587 + b * 114) / 1000;

    return brightness < 128; // Seuil : <128 = sombre, >=128 = clair
  }

  checkColors() {
    for (let i = 0; i < this.sections.length; i++) {
      const section = this.sections[i];

      let bgColor = window.getComputedStyle(section).backgroundColor; // Récupère la couleur de fond

      if (this.isDarkColor(bgColor)) {
        section.setAttribute('data-contrast', 'dark'); // Texte clair sur fond sombre
      } else {
        section.setAttribute('data-contrast', 'light'); // Texte sombre sur fond clair
      }
    }
  }
}
