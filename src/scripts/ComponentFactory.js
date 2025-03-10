import Carousel from './components/Carousel';
import Header from './components/Header';
import Tabs from './components/Tabs';
import Accordeon from './components/Accordeon';
import Ariane from './components/Ariane';
import Lottie from './components/Lottie';
import Alert from './components/Alert';
export default class ComponentFactory {
  constructor() {
    this.componentInstances = [];
    this.componentList = {
      Carousel,
      Header,
      Alert,
      Tabs,
      Accordeon,
      Ariane,
      Lottie,
    };
    this.init();
  }
  init() {
    const components = document.querySelectorAll('[data-component]');

    for (let i = 0; i < components.length; i++) {
      const element = components[i];
      const componentName = element.dataset.component;

      if (this.componentList[componentName]) {
        const instance = new this.componentList[componentName](element);
        this.componentInstances.push(instance);
      } else {
        console.log(`La composante ${componentName} n'existe pas`);
      }
    }
  }
}
