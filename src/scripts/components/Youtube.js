export default class Youtube {
  constructor(element) {
    this.element = element;
    this.options = {
      controls: 2,
    };

    this.videoContainer = this.element.querySelector('.js-video');
    this.poster = this.element.querySelector('.js-poster');
    this.videoId = this.element.dataset.videoId;
    this.autoplay = this.poster ? 1 : 0;

    Youtube.instances.push(this);

    if (this.videoId) {
      Youtube.loadScript();
    } else {
      console.log('check ton code le gros, sa chie solide');
    }
  }

  static loadScript() {
    if (!Youtube.scriptIsLoading) {
      Youtube.scriptIsLoading = true;
      const script = document.createElement('script');
      script.src = 'https://www.youtube.com/iframe_api';
      document.body.appendChild(script);
    }
  }

  init() {
    this.setOptions();

    if (this.poster) {
      this.element.addEventListener('click', this.initPlayer.bind(this));
    } else {
      this.initPlayer();
    }
  }

  setOptions() {
    if ('noControls' in this.element.dataset) {
      this.options.controls = 0;
    }
  }

  initPlayer(event) {
    if (event) {
      this.element.removeEventListener('click', this.initPlayer);
    }

    this.player = new YT.Player(this.videoContainer, {
      height: '100%',
      width: '100%',
      videoId: this.videoId,
      playerVars: {
        rel: 0,
        autoplay: this.autoplay,
        controls: this.options.controls,
      },
      events: {
        onReady: () => {
          const observer = new IntersectionObserver(this.watch.bind(this), {
            rootMargin: '0px 0px 0px 0px',
          });
          observer.observe(this.element);
        },
        onStateChange: (event) => {
          if (event.data == YT.PlayerState.PLAYING) {
            Youtube.pauseAll(this);
          }
        },
      },
    });
  }

  watch(entries) {
    if (!entries[0].isIntersecting) {
      this.player.pauseVideo();
    }
  }

  static initAll() {
    document.documentElement.classList.add('is-video-ready');
    for (let i = 0; i < Youtube.instances.length; i++) {
      const instance = Youtube.instances[i];
      instance.init();
    }
  }

  static pauseAll(currentInstance) {
    for (let i = 0; i < Youtube.instances.length; i++) {
      const instance = Youtube.instances[i];
      if (instance.player && instance !== currentInstance) {
        instance.player.pauseVideo();
      }
    }
  }
}

Youtube.instances = [];
window.onYouTubeIframeAPIReady = Youtube.initAll;
