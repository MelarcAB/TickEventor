<template>
    <MainLayout>
        <div class="flex flex-col min-h-[calc(100vh-4rem)] bg-blue-500">
            <div class="text-white text-center py-10">
                <h1 class="text-4xl font-bold">Bienvenido a EventosApp</h1>
                <p class="mt-2 text-xl">Gestiona y descubre increíbles eventos</p>
            </div>

            <div class="flex justify-center mb-6">
                <div class="w-full max-w-md">
                    <input type="text"
                        class="w-full px-4 py-2 rounded-full shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-opacity-50"
                        placeholder="Buscar eventos...">
                </div>
            </div>

            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4 mb-10">

                <button
                    class="btn transition duration-300 ease-in-out transform hover:scale-105 bg-blue-700 hover:bg-blue-800 text-white px-6 py-3 rounded-full shadow-lg">
                    <i class="icon ion-md-search mr-2"></i> Buscar Eventos
                </button>

                <button
                    class="btn transition duration-300 ease-in-out transform hover:scale-105 bg-blue-700 hover:bg-blue-800 text-white px-6 py-3 rounded-full shadow-lg">
                    <i class="icon ion-md-add mr-2"></i> Crear Evento
                </button>
            </div>

            <div class="flex flex-wrap justify-center gap-4 px-4">
                <div class="bg-white rounded-lg p-6 shadow-lg w-full md:w-1/2">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Tu Actividad Reciente</h2>
                </div>

                <div class="bg-white rounded-lg p-6 shadow-lg w-full md:w-1/2">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Notificaciones</h2>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script>
import MainLayout from '@/views/layouts/MainLayout.vue';

export default {
    name: 'MainView',
    components: {
        MainLayout,
    },

    data() {
        return {
        };
    },
    methods: {
    }
};
</script>

