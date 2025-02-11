export default class Accordeon {
  constructor(element) {
    this.element = element;
    this.children = this.element.querySelectorAll('.js-header');
    this.autoOpen = this.element.querySelectorAll('[data-auto-open]');
    this.options = {};
    this.init();
  }

  init() {
    this.setOptions();
    if (
      this.element.hasAttribute('data-not-closing') ||
      this.autoOpen.length >= 2
    ) {
      for (let i = 0; i < this.children.length; i++) {
        const child = this.children[i];
        child.addEventListener('click', this.notCloseAccordeon.bind(this));
      }
    } else {
      for (let i = 0; i < this.children.length; i++) {
        const child = this.children[i];
        child.addEventListener('click', this.closeAccordeon.bind(this));
      }
    }
  }

  setOptions() {
    for (let i = 0; i < this.autoOpen.length; i++) {
      const autoOpen = this.autoOpen[i];
      autoOpen.classList.add('is-active');
    }
  }

  closeAccordeon(event) {
    console.log('closing');
    for (let i = 0; i < this.children.length; i++) {
      const child = this.children[i];
      child.classList.remove('is-active');
      if (
        child == event.currentTarget &&
        event.currentTarget.classList.contains('is-active')
      ) {
        console.log('eille pas lui');
        event.currentTarget.classList.remove('is-active');
        return true;
      }
      // event.currentTarget.classList.add('is-active');
    }
    event.currentTarget.classList.toggle('is-active');
  }

  notCloseAccordeon(event) {
    console.log('notclosing');
    if (event.currentTarget.classList.contains('is-active')) {
      event.currentTarget.classList.remove('is-active');
    } else if (!event.currentTarget.classList.contains('is-active')) {
      event.currentTarget.classList.add('is-active');
    }
  }
}
