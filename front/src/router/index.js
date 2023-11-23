import { createRouter, createWebHistory } from 'vue-router';
import IndexView from '@/views/IndexView.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: IndexView,
    meta: { requiresAuth: true }

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


];

const router = createRouter({
  history: createWebHistory(),
  routes
});



export default router;
