<template>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mt-10">
            <h1 class="text-5xl font-bold text-blue-700">Bienvenido a TickEventor</h1>
            <p class="mt-4 text-xl text-gray-800">La solución innovadora para la gestión de eventos y tickets.</p>
        </div>

        <div class="mt-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-white">
                <!-- Cards con colores y sombras más vibrantes -->
                <div class="p-6 rounded-lg shadow-lg bg-gradient-to-br from-green-500 to-blue-500 transform hover:scale-105 transition duration-300">
                    <h2 class="text-2xl font-semibold">Crea Eventos Fácilmente</h2>
                    <p class="mt-2">Organiza tus eventos en pocos pasos con una interfaz intuitiva.</p>
                </div>
                <div class="p-6 rounded-lg shadow-lg bg-gradient-to-br from-purple-500 to-pink-500 transform hover:scale-105 transition duration-300">
                    <h2 class="text-2xl font-semibold">Venta de Tickets Segura</h2>
                    <p class="mt-2">Plataforma segura y confiable para la venta de tickets.</p>
                </div>
                <div class="p-6 rounded-lg shadow-lg bg-gradient-to-br from-red-500 to-yellow-500 transform hover:scale-105 transition duration-300">
                    <h2 class="text-2xl font-semibold">Gestión en Tiempo Real</h2>
                    <p class="mt-2">Controla y gestiona tu evento en tiempo real.</p>
                </div>
            </div>
        </div>

        <div class="mt-12 text-center">
            <p class="text-lg font-semibold text-gray-800">Únete a la comunidad de TickEventor</p>
            <a href="#registro" class="mt-4 inline-block bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-300">Regístrate Ahora</a>
            <a href="login" class="mt-4 inline-block bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-300">Iniciar sesión</a>
        </div>

        <div class="mt-12">
            <h2 class="text-center text-3xl font-semibold text-gray-800">Lo que dicen nuestros usuarios</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <div class="p-4 rounded-lg bg-gray-100">
                    <p class="text-gray-800">"TickEventor ha transformado la forma en que organizamos eventos. ¡Esencial para cualquier organizador!"</p>
                    <span class="block mt-2 font-semibold">- Usuario Satisfecho</span>
                </div>
                <div class="p-4 rounded-lg bg-gray-100">
                    <p class="text-gray-800">"La venta de tickets nunca había sido tan fácil y segura. Totalmente recomendado."</p>
                    <span class="block mt-2 font-semibold">- Organizador de Eventos</span>
                </div>
            </div>
        </div>

        <footer class="mt-12 mb-6">
            <p class="text-center text-gray-700 text-sm">
                © 2023 TickEventor. Todos los derechos reservados.
            </p>
        </footer>
    </div>
</template>



  
<script>
export default {
    name: "IndexView"
};
</script>
  
  