export default class NameLotties {
  constructor(element) {
    this.element = element;
    this.init();
  }

  init() {
    const lottiesUnderline = this.element.querySelectorAll(
      '.js-lottie-underline'
    );
    const lottiesVolantCTA = this.element.querySelectorAll(
      '.js-lottie-volantCTA'
    );
    const nomIdentifiantUnderline = 'underline-';
    for (let i = 0; i < lottiesUnderline.length; i++) {
      const lottieUnderline = lottiesUnderline[i];
      lottieUnderline.setAttribute('id', nomIdentifiantUnderline + i);
    }
    const nomIdentifiantVolantCTA = 'volantCTA-';
    for (let i = 0; i < lottiesVolantCTA.length; i++) {
      const lottieVolantCTA = lottiesVolantCTA[i];
      lottieVolantCTA.setAttribute('id', nomIdentifiantVolantCTA + i);
    }
  }
}
