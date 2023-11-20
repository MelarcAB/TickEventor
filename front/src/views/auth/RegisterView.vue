<template>
    <MainLayout>
        <div class="flex flex-col min-h-[calc(100vh-4rem)] ">
            <div class="mx-auto my-auto">
                <div class="max-w-md w-full mx-auto bg-white rounded-lg shadow-xl overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-center text-3xl font-extrabold text-gray-800">Registrarse en TickEventor</h2>
                        <form @submit.prevent="register" class="mt-8 space-y-6">
                            <div>
                                <label for="name" class="sr-only">Nombre</label>
                                <input type="text" id="name" v-model="name" placeholder="Nombre"
                                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                    required>
                            </div>
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
                                <label for="password-confirm" class="sr-only">Confirmar Contraseña</label>
                                <input type="password" id="password-confirm" v-model="passwordConfirm" placeholder="Confirmar Contraseña"
                                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                    required>
                            </div>
                            <div>
                                <button type="submit"
                                    class="w-full p-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Registrarse</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <AcademicCapIcon class="h-6 w-6" />
        </div>
    </MainLayout>
</template>
  
<script>
import { AcademicCapIcon } from "@vue-hero-icons/outline"


let url_back = (import.meta.env.VITE_BACKEND_URL);

export default {
    name: 'RegisterView',
    components: {
        MainLayout
    },
    data() {
        return {
            name: '',
            email: '',
            password: '',
            passwordConfirm: ''
        };
    },
    methods: {
        register() {
        }
    }
};
</script>
