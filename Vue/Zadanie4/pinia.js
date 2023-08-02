import { createPinia } from 'pinia';
import { createApp } from 'vue';

export const pinia = createPinia();

const app = createApp(App);
app.use(pinia);
app.mount('#app');