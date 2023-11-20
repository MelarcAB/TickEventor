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
                                <input type="password" id="password-confirm" v-model="passwordConfirm"
                                    placeholder="Confirmar Contraseña"
                                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                    required>
                            </div>
                            <div>
                                <button type="submit"
                                    class="w-full p-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Registrarse</button>
                            </div>
                        </form>

                        <div>
                            <button type="button"
                                class="w-full p-3 flex items-center justify-center bg-white text-gray-700 rounded-md hover:bg-gray-100 focus:outline-none focus:bg-gray-100 mt-4">
                                <IonIcon :icon="logoGoogle" class="h-6 w-6 text-red-500" />
                                <span class="ml-2">Registrarse con Google</span>
                            </button>
                        </div>

                        <p class="mt-6 text-center text-sm text-gray-600">
                            ¿Ya tienes una cuenta?
                            <router-link to="/login" class="font-medium text-blue-600 hover:text-blue-500">
                                Iniciar sesión
                            </router-link>
                        </p>
                    </div>
                </div>
            </div>
            <AcademicCapIcon class="h-6 w-6" />
        </div>
    </MainLayout>
</template>
  
<script>
import MainLayout from '@/views/layouts/MainLayout.vue';

import { IonIcon } from "@ionic/vue";
import { logoGoogle } from 'ionicons/icons';
import axios from 'axios';

let url_back = (import.meta.env.VITE_BACKEND_URL);

export default {
    name: 'RegisterView',
    components: {
        MainLayout,
        IonIcon
    },
    setup() {
        return {
            logoGoogle: logoGoogle
        };
    },
    data() {
        return {
            name: '',
            email: '',
            password: '',
            password_confirmation: ''
        };
    },
    methods: {
        async register() {
            this.$swal.showLoading();
            console.log(this.name);
            try {
                const response = await axios.post(`${url_back}/api/register`, {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.passwordConfirm,
                });

                this.$swal.close();
                this.$swal({
                    title: 'Registrado',
                    text: 'Registro exitoso',
                    icon: 'success',
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.$router.push('/login');
                    }
                });
            } catch (error) {
                //if isset (error.response.data.message)
                if (error.response.data.message) {
                    this.$swal.close();
                    this.$swal('Error', error.response.data.message, 'error');
                } else {
                    this.$swal.close();
                    this.$swal('Error', 'Error al procesar la solicitud', 'error');
                }
            }
        }

    }
};
</script>
