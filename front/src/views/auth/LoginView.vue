<template>
    <MainLayout>
        <div class="flex flex-col min-h-[calc(100vh-4rem)] "> <!-- Ajusta 4rem según sea necesario -->
            <div class="mx-auto my-auto">
                <div class="max-w-md w-full mx-auto bg-white rounded-lg shadow-xl overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-center text-3xl font-extrabold text-gray-800">Iniciar Sesión en TickEventor</h2>
                        <form @submit.prevent="login" class="mt-8 space-y-6">
                            <div>
                                <label for="email" class="sr-only">Correo electrónico</label>
                                <input type="email" id="email" v-model="email" placeholder="Correo electrónico"
                                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                    required>
                            </div>
                            <div>
                                <label for="password" class="sr-only">Contraseña</label>
                                <input type="password" id="password" v-model="password" placeholder="Contraseña"
                                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                    required>
                            </div>
                            <div>
                                <UserIcon class="h-6 w-6 text-blue-500" />

                                <button type="submit"
                                    class="w-full p-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">

                                    Ingresar</button>
                            </div>
                            <div>
                                <button type="button"
                                    class="w-full p-3 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">
                                    Iniciar Sesión con Google
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>
  
<script>
import MainLayout from '@/views/layouts/MainLayout.vue';
import { UserIcon } from "@vue-hero-icons/outline"

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
  
<style>
/* Puedes agregar estilos adicionales aquí si es necesario */
</style>
  