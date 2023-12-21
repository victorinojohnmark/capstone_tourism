import '../css/app.css'

import './bootstrap';
import 'flowbite';
import { createApp } from 'vue';

const app = createApp({});

// Import Components
import HeaderComponent from './components/HeaderComponent.vue'

// Register Components
app.component('header-component', HeaderComponent);
app.mount('#app');
