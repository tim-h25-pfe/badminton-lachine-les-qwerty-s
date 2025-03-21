import '@lottiefiles/lottie-player';
import { create } from '@lottiefiles/lottie-interactivity';

export default class Lottie {
  constructor(element) {
    this.element = element;
    this.init();
  }

  init() {
    document.addEventListener('DOMContentLoaded', () => {
      if (this.element.classList.contains('js-volantBlanc')) {
        create({
          player: '#VolantBlancMontantAccueil',
          mode: 'scroll',
          actions: [
            {
              visibility: [0, 1.0],
              type: 'playOnce',
            },
          ],
        });
        document
          .querySelector('#VolantBlancMontantAccueil')
          .addEventListener('complete', function () {
            document.querySelector('#VolantBlancAccueil').play();
          });
        create({
          player: '#VolantContactAccueil',
          mode: 'scroll',
          actions: [
            {
              visibility: [0, 1.0],
              type: 'playOnce',
            },
          ],
        });
      } else if (
        this.element.classList.contains('js-lottie-underline') ||
        this.element.classList.contains('js-volantNoir')
      ) {
        const idElement = this.element.id;
        create({
          player: `#${idElement}`,
          mode: 'scroll',
          actions: [
            {
              visibility: [0.3, 0.7],
              type: 'playOnce',
            },
          ],
        });
      }
    });
  }

  /*AnimVolantBlanc() {
    const player = document.getElementById('lottie-logo-header');
    const logoDefaultHeader = document.querySelector('.logoDefaultHeader');
    if (player) {
      player.addEventListener('ready', () => {
        player.addEventListener('mouseover', () => {
          logoDefaultHeader.style.display = 'none';
          player.play();
        });
        player.addEventListener('mouseout', () => {
          player.stop();
          logoDefaultHeader.style.display = 'block';
        });
      });
    }
  }

  AnimLogoFooter() {
    const player = document.getElementById('lottie-logo-footer');
    const logoDefaultHeader = document.querySelector('.logoDefaultFooter');
    if (player) {
      player.addEventListener('ready', () => {
        player.addEventListener('mouseover', () => {
          logoDefaultHeader.style.display = 'none';
          player.play();
        });
        player.addEventListener('mouseout', () => {
          player.stop();
          logoDefaultHeader.style.display = 'block';
        });
      });
    }
  }

  AnimPortraitVecto() {
    const player = document.getElementById('lottie-portrait-vecto');
    const imageDefault = document.querySelector('.portraitDefault');
    if (player) {
      player.addEventListener('ready', () => {
        player.addEventListener('mouseover', () => {
          player.setDirection(1);
          player.play();
        });
        player.addEventListener('mouseout', () => {
          player.setDirection(-1);
          player.play();
          imageDefault.style.display = 'block';
        });
      });
    }
  }
  AnimPortraitVectoPointage() {
    const player = document.getElementById('lottie-portrait-vecto-pointage');
    let direction = 1;
    if (player) {
      player.addEventListener('click', () => {
        player.setDirection(direction);
        player.play();
        direction = direction === 1 ? -1 : 1;
      });
    }
  }*/
}
