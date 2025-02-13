export default class Tabs {
  constructor(element) {
    this.element = element;

    this.containers = this.element.querySelectorAll('[data-tab-container]');
    this.openers = this.element.querySelectorAll('[data-tab-open]');

    this.init();
  }

  init() {
    this.initTabs();

    for (let i = 0; i < this.openers.length; i++) {
      const opener = this.openers[i];
      opener.addEventListener('click', this.changeTab.bind(this));
    }
  }

  initTabs() {
    console.log('reset tabs');
    const firstOpener = this.openers[0];
    firstOpener.classList.add('active');
    const firstTab = this.containers[0];
    firstTab.classList.add('active');
  }

  changeTab() {
    const activeOpener = event.currentTarget;
    const openerType = activeOpener.getAttribute('data-tab-open');
    for (let i = 0; i < this.openers.length; i++) {
      const opener = this.openers[i];
      opener.classList.remove('active');
    }
    activeOpener.classList.add('active');

    for (let i = 0; i < this.containers.length; i++) {
      const container = this.containers[i];
      container.classList.remove('active');
    }
    const currentTab = this.element.querySelector(
      `[data-tab-container='${openerType}']`
    );
    currentTab.classList.add('active');
  }
}
