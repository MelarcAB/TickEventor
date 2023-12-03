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

// Guardia de ruta global
router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth) && !isAuthenticated()) {
    // Si la ruta requiere autenticación y el usuario no está autenticado,
    // redirigir a la página de inicio de sesión.
    next('/login');
  } else {
    // En cualquier otro caso, continuar con la ruta solicitada.
    next();
  }
});

/**
 * Función que verifica si el usuario está autenticado
 * @returns {boolean} true si el usuario está autenticado, false de lo contrario
 */
function isAuthenticated() {
  const token = localStorage.getItem('token');
  if (!token) {
    return false;
  }

  // Opcional: Verifica si el token ha expirado
  const payload = JSON.parse(atob(token.split('.')[1]));
  return payload.exp > Date.now() / 1000;
}

export default router;
