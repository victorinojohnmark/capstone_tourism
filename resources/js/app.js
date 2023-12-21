import '../css/app.css'

import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

// Import Components
import ExampleComponent from './components/ExampleComponent.vue';

// Register Components
app.component('example-component', ExampleComponent);
app.mount('#app');
