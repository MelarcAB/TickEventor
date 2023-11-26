<template>
    <MainLayout>
        <div class="flex flex-col min-h-[calc(100vh-4rem)]">
            <div class="mx-auto my-auto">
                <div class="max-w-md w-full mx-auto bg-white rounded-lg shadow-xl overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-center text-3xl font-extrabold text-gray-800">Iniciar Sesión en TickEventor</h2>
                        <form @submit.prevent="login" class="mt-8 space-y-6">
                            <div>
                                <label for="email" class="sr-only">Correo electrónico</label>
                                <div class="flex items-center border border-gray-300 rounded-md">
                                    <IonIcon :icon="mailIcon" class="h-6 w-6 text-gray-500 m-2" />
                                    <input type="email" id="email" v-model="email" placeholder="Correo electrónico"
                                        class="w-full p-3 rounded-md focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                        required>
                                </div>
                            </div>
                            <div>
                                <label for="password" class="sr-only">Contraseña</label>
                                <div class="flex items-center border border-gray-300 rounded-md">
                                    <IonIcon :icon="lockIcon" class="h-6 w-6 text-gray-500 m-2" />
                                    <input type="password" id="password" v-model="password" placeholder="Contraseña"
                                        class="w-full p-3 rounded-md focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                        required>
                                </div>
                            </div>
                            <div>
                                <button type="submit"
                                    class="w-full p-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                                    Ingresar</button>
                            </div>
                            <div>
                                <button type="button" @click="handleGoogleLogin"
                                    class="w-full p-3 flex items-center justify-center bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 focus:outline-none focus:bg-gray-100">
                                    <IonIcon :icon="logoGoogle" class="h-6 w-6 text-red-500" />
                                    <span class="ml-2">Iniciar Sesión con Google</span>
                                </button>
                            </div>
                            <div class="mt-6 text-center">
                                <p class="text-sm text-gray-600">¿No tienes cuenta? <a href="/register"
                                        class="text-blue-600 hover:text-blue-800">Regístrate aquí</a></p>

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
import { IonIcon } from "@ionic/vue";
import { mailOutline, lockClosedOutline, logoGoogle } from 'ionicons/icons';

export default {
    name: 'LoginView',
    components: {
        MainLayout,
        IonIcon
    },
    setup() {
        return {
            mailIcon: mailOutline,
            lockIcon: lockClosedOutline,
            logoGoogle: logoGoogle
        };
    },
    data() {
        return {
            email: '',
            password: '',
            newWindow: null,
            checkTokenInterval: null
        };
    },
    methods: {
        login() {
            // Lógica de inicio de sesión
        },
        showAlert() {
            this.$swal({
                title: '¡Alerta de Ejemplo!',
                text: 'Este es un texto de alerta',
                icon: 'success',
            });
        },
        async handleGoogleLogin() {
            this.$swal.showLoading();
            let url_back = (import.meta.env.VITE_BACKEND_URL);
            let url = `${url_back}/auth/google`;
            // Asignar a this.newWindow en lugar de una variable local
            this.newWindow = window.open(url, '_blank', 'width=500,height=600');

        }
    },
    mounted() {

        this.checkTokenInterval = setInterval(() => {
            const token = localStorage.getItem('token');
            if (token) {
                this.$swal.close();
                clearInterval(this.checkTokenInterval);
                this.$router.push('/');
            }
        }, 1000);

        if (this.newWindow) {
            this.newWindow.addEventListener('message', (event) => {
                if (event.data.authSuccess) {
                    console.log("entro");
                    this.newWindow.close();
                    this.$router.push('/');
                } else {
                    this.$swal.close();
                    this.$swal({
                        title: 'Error',
                        text: 'Ha ocurrido un error al iniciar sesión con Google, por favor vuelva a intentarlo',
                        icon: 'error',
                    });
                }
            });
        }
     

    }
};
</script>

