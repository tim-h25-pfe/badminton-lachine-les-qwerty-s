export default class Accordeon {
  constructor(element) {
    this.element = element;
    this.containers = element.querySelectorAll('.accordion__container');
    this.options = {
      autoOpen: 'autoOpen' in element.dataset,
      notClosing: 'notClosing' in element.dataset,
    };

    this.init();
  }

  init() {
    this.setOptions();

    for (let i = 0; i < this.containers.length; i++) {
      const accordion = this.containers[i];
      accordion.addEventListener('click', this.openAccordion.bind(this));
    }
  }

  setOptions() {
    if (this.options.autoOpen) {
      for (let i = 0; i < this.containers.length; i++) {
        this.containers[i].classList.add('is-active');
      }
    }
  }

  openAccordion(event) {
    if (event.currentTarget.classList.contains('is-active')) {
      event.currentTarget.classList.remove('is-active');
    } else {
      if (!this.options.notClosing) {
        for (let i = 0; i < this.containers.length; i++) {
          if (this.containers[i] != event.currentTarget) {
            this.containers[i].classList.remove('is-active');
          }
        }
      }

      event.currentTarget.classList.add('is-active');
    }
  }
}
