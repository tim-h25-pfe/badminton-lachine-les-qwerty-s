export default class NameLotties {
  constructor(element) {
    this.element = element;
    this.init();
  }

  init() {
    const lottiesUnderline = this.element.querySelectorAll(
      '.js-lottie-underline'
    );
    console.log(lottiesUnderline);
    const nomIdentifiant = 'underline' + '-';
    for (let i = 0; i < lottiesUnderline.length; i++) {
      const lottieUnderline = lottiesUnderline[i];
      lottieUnderline.setAttribute('id', nomIdentifiant + i);
    }
  }
}
