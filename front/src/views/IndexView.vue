<template>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-white">
        <div class="text-center mt-16">
            <h1 class="text-6xl font-bold">Bienvenido a TickEventor</h1>
            <p class="mt-4 text-xl">La solución innovadora para la gestión de eventos y tickets.</p>
        </div>

        <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-6 rounded-lg shadow-lg bg-blue-700 transform hover:scale-105 transition duration-300">
                <IonIcon :icon="homeIcon" class="text-4xl"></IonIcon>
                <h2 class="text-2xl font-semibold mt-2">
                    Crea Eventos Fácilmente</h2>
                <p class="mt-2">Organiza tus eventos en pocos pasos con una interfaz intuitiva.</p>
            </div>

            <div class="p-6 rounded-lg shadow-lg bg-blue-700 transform hover:scale-105 transition duration-300">
                <IonIcon :icon="ticketIcon" class="text-4xl"></IonIcon>
                <h2 class="text-2xl font-semibold mt-2">Venta de Tickets Segura</h2>
                <p class="mt-2">Plataforma segura y confiable para la venta de tickets.</p>
            </div>

            <div class="p-6 rounded-lg shadow-lg bg-blue-700 transform hover:scale-105 transition duration-300">
                <IonIcon :icon="analyticsIcon" class="text-4xl"></IonIcon>
                <h2 class="text-2xl font-semibold mt-2">Gestión en Tiempo Real</h2>
                <p class="mt-2">Controla y gestiona tu evento en tiempo real.</p>
            </div>
        </div>

        <div class="mt-16 text-center">
            <p class="text-lg font-semibold">Únete a la comunidad de TickEventor</p>
            <a href="register" class="mt-4 inline-block bg-white text-blue-800 py-2 px-4 rounded-lg hover:bg-gray-200 transition-colors duration-300 mr-4">Regístrate Ahora</a>
            <a href="login" class="mt-4 inline-block bg-white text-blue-800 py-2 px-4 rounded-lg hover:bg-gray-200 transition-colors duration-300">Iniciar sesión</a>
        </div>


        <!-- Footer -->
        <footer class="mt-16 mb-6">
            <p class="text-center text-sm">
                © 2023 TickEventor. Todos los derechos reservados.
            </p>
        </footer>
    </div>
</template>

<script>
import { IonIcon } from "@ionic/vue";
import { home, ticket, analytics } from 'ionicons/icons';

export default {
    name: "IndexView",
    components: {
        IonIcon
    },
    setup() {
        return {
            homeIcon: home,
            ticketIcon: ticket,
            analyticsIcon: analytics
        };
    }
};
</script>
