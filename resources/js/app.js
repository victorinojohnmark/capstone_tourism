import './bootstrap';
import 'flowbite';
import VCalendar from 'v-calendar';
// import VDatePicker from 'v-calendar';
import 'v-calendar/style.css';
import { createPinia } from 'pinia';
import { createApp } from 'vue';

// Import Components
import HeaderComponent from './components/HeaderComponent.vue'
import BeachResortSlider from './components/BeachResortSlider.vue'
import BookingCalendar from './components/BookingCalendar.vue'

const pinia = createPinia();

const app = createApp({});

app.use(pinia);

app.use(VCalendar, {});
// app.use(VDatePicker, {});

// Register Components
app.component('header-component', HeaderComponent);
app.component('beach-slider', BeachResortSlider);
app.component('booking-calendar', BookingCalendar);


app.mount('#app');
