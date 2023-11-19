import { createRouter, createWebHistory } from 'vue-router';
import IndexView from '@/views/IndexView.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: IndexView
  },
  {
    path: '/login',
    name: 'Login',
    component: () => import('@/views/auth/LoginView.vue')
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
