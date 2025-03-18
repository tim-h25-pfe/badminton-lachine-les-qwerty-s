import NameLotties from './components/NameLotties';
import Carousel from './components/Carousel';
import Header from './components/Header';
import Tabs from './components/Tabs';
import Accordeon from './components/Accordeon';
import Ariane from './components/Ariane';
import Lottie from './components/Lottie';
import Alert from './components/Alert';
import Scrolly from './components/Scrolly';
export default class ComponentFactory {
  constructor() {
    this.componentInstances = [];
    this.componentList = {
      NameLotties,
      Carousel,
      Header,
      Alert,
      Tabs,
      Accordeon,
      Ariane,
      Lottie,
      Scrolly,
    };
    this.init();
  }

  init() {
    const components = document.querySelectorAll('[data-component]');

    for (let i = 0; i < components.length; i++) {
      const element = components[i];

      // va chercher le data-component et sort un tableau plutôt qu'un string
      const componentNames = element.dataset.component.split(/[\s,]+/);

      // boucle pour aller chercher toutes les composantes dans le tableau
      for (let i = 0; i < componentNames.length; i++) {
        const componentName = componentNames[i];

        if (this.componentList[componentName]) {
          const instance = new this.componentList[componentName](element);
          this.componentInstances.push(instance);
        } else {
          console.log(`La composante ${componentName} n'existe pas`);
        }
      }
    }
  }
}
