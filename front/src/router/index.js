import { createRouter, createWebHistory } from 'vue-router';
import IndexView from '@/views/IndexView.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: IndexView,
    beforeEnter: (to, from, next) => {
      if (isAuthenticated()) {
        next('/main');
      } else {
        next();
      }
    }

  },
  {
    path: '/login',
    name: 'Login',
    component: () => import('@/views/auth/LoginView.vue')
  },
  {
    path: '/register',
    name: 'Register',
    component: () => import('@/views/auth/RegisterView.vue')
  },
  {
    path: '/auth/google',
    name: 'AuthGoogle',
  },
  {
    path: '/auth/google/callback',
    name: 'GoogleCallback',
    component: () => import('@/views/auth/GoogleCallback.vue') 
  },
  //main
  {
    path: '/main',
    name: 'Main',
    component: () => import('@/views/app/main/MainView.vue'),
    meta: { requiresAuth: true }
  },


];

const router = createRouter({
  history: createWebHistory(),
  routes
});

function isAuthenticated() {
  return !!localStorage.getItem('token'); // Retorna true si el token existe, false de lo contrario
}



export default router;
