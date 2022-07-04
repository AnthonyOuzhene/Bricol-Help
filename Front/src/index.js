import { createApp } from "vue";

import App from "./App.vue";

import customRouter from './router.js';
import store from './store.js';


const app = createApp(App);
// on utilise le router défini dans router.js
// avec app.use on rend le router accessible partout dans l'application
app.use(customRouter);

// Install the store instance as a plugin
app.use(store)

app.mount("#app");
