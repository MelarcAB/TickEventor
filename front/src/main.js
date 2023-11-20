import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from './router'

import { IonIcon } from '@ionic/vue';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';




createApp(App)
    .component('IonIcon', IonIcon)
    .use(VueSweetalert2)
    .use(router)
    .mount('#app')
