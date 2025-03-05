import '@lottiefiles/lottie-player';
//import { create } from '@lottiefiles/lottie-interactivity';

export default class Lottie {
  constructor() {
    this.init();
  }

  init() {
    //const logo_container = document.querySelector('.logo-container');

    // ---------- BKG HERO ACCUEIL ---------- //
    /*if (document.getElementById('lottie-lignesCroisee')) {
      document
        .getElementById('lottie-lignesCroisee')
        .addEventListener('load', () => {
          create({
            player: '#lottie-lignesCroisee',
            mode: 'cursor',
            actions: [
              {
                position: { x: [0, 1], y: [0, 1] },
                frames: [0, 900],
              },
              {
                position: { x: -1, y: -1 },
                type: 'stop',
                frames: [0],
              },
            ],
          });
        });
    }*/

    // ---------- FLECHE HERO ACCUEIL ---------- //
    /*if (document.getElementById('lottie-fleche')) {
      document.getElementById('lottie-fleche').addEventListener('load', () => {
        setTimeout(() => {
          create({
            player: '#lottie-fleche',
            mode: 'chain',
            actions: [
              {
                position: { x: [0, 1], y: [0, 1] },
                frames: [0, 20],
                forceFlag: false,
              },
              {
                position: { x: -1, y: -1 },
                type: 'stop',
                frames: [20],
              },
            ],
          });
        }, 2000);
      });
    }*/

    // ---------- LOGO HEADER ---------- //
    this.AnimLogoHeader();

    // ---------- LOGO FOOTER ---------- //
    this.AnimLogoFooter();

    // ---------- PORTRAIT VECTORIEL ---------- //
    this.AnimPortraitVecto();
    this.AnimPortraitVectoPointage();
  }

  AnimLogoHeader() {
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
  }
}
