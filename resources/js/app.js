import './bootstrap';
import 'flowbite';
import { createApp } from 'vue';

const app = createApp({});

// Import Components
import HeaderComponent from './components/HeaderComponent.vue'
import BeachResortSlider from './components/BeachResortSlider.vue'

// Register Components
app.component('header-component', HeaderComponent);
app.component('beach-slider', BeachResortSlider);
app.mount('#app');
