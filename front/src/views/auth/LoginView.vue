<template>
    <MainLayout>
      <div class="min-h-screen flex flex-col justify-center">
        <div class="max-w-md w-full mx-auto">
          <h2 class="text-center text-4xl font-extrabold text-white">Iniciar Sesión en TickEventor</h2>
        </div>
        <div class="max-w-md w-full mx-auto mt-4  p-8 border border-gray-300 rounded-lg shadow-lg">
          <form @submit.prevent="login" class="space-y-6">
            <div>
              <label for="email" class="text-sm font-bold text-gray-700 block">Correo electrónico</label>
              <input type="email" id="email" v-model="email" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:border-blue-800 focus:ring-1 focus:ring-blue-800" required>
            </div>
            <div>
              <label for="password" class="text-sm font-bold text-gray-700 block">Contraseña</label>
              <input type="password" id="password" v-model="password" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:border-blue-800 focus:ring-1 focus:ring-blue-800" required>
            </div>
            <div>
              <button type="submit" class="w-full p-2 bg-blue-600 text-white rounded hover:bg-blue-800 transition-colors duration-300 ease-in-out">Ingresar</button>
            </div>
          </form>
        </div>
      </div>
    </MainLayout>
</template>


  <script>
  import MainLayout from '@/views/layouts/MainLayout.vue';
  
  export default {
    name: 'LoginView',
    components: {
      MainLayout
    },
    data() {
      return {
        email: '',
        password: ''
      };
    },
    methods: {
      login() {
        // Lógica de inicio de sesión
      }
    }
  };
  </script>
  