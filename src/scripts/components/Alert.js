export default class Alert {
  constructor(element) {
    this.element = element;
    this.options = {};

    this.active = this.element.dataset.active === 'true';
    this.text = this.element.querySelector('.alert-text');
    this.close = this.element.querySelector('.closing');

    this.init();
  }
  init() {
    if (!this.active) {
      this.element.style.display = 'none'; // Si l'alerte est désactivée, on la cache immédiatement
      return;
    }

    const today = new Date().toISOString().split('T')[0]; // Récupère la date du jour
    const lastClosed = localStorage.getItem('alert-closed-date');
    const lastText = localStorage.getItem('alert-text');

    if (lastClosed !== today || this.text.textContent !== lastText) {
      this.showAlert();
    }

    this.close.addEventListener('click', this.closeAlert.bind(this));
  }

  showAlert() {
    this.element.style.display = 'flex'; // Affiche le bandeau
    localStorage.setItem('alert-text', this.text.textContent); // Sauvegarde le texte actuel
  }

  closeAlert() {
    this.element.style.display = 'none'; // Cache le bandeau
    const today = new Date().toISOString().split('T')[0];
    localStorage.setItem('alert-closed-date', today); // Sauvegarde la date de fermeture
  }
}
