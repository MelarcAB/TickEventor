import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from './router'

import { IonIcon } from '@ionic/vue';




createApp(App)
    .component('IonIcon', IonIcon)
    .use(router)
    .mount('#app')
