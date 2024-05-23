import './bootstrap';
import { createApp } from 'vue';
import router from './router/index.js';
import App from './components/app.vue';


const app = createApp(App);

const token = document.head.querySelector('meta[name="csrf-token"]');
if (token) app.config.globalProperties.$csrfToken = token.content;



app.use(router).mount("#app");
