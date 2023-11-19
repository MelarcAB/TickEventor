<template>
    <nav class="bg-white shadow-lg">
      <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between">
          <div class="flex space-x-4">
            <!-- logo -->
            <div>
              <a href="#" class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900">
                <span class="font-bold">TickEventor</span>
              </a>
            </div>
  
            <!-- primary nav -->
            <div class="hidden md:flex items-center space-x-1">
              <a href="#" class="py-5 px-3 text-gray-700 hover:text-gray-900">Inicio</a>
              <a href="#" class="py-5 px-3 text-gray-700 hover:text-gray-900">Eventos</a>
              <a href="#" class="py-5 px-3 text-gray-700 hover:text-gray-900">Contacto</a>
            </div>
          </div>
  
          <!-- mobile button -->
          <div class="md:hidden flex items-center">
            <button @click="isMobileMenuOpen = !isMobileMenuOpen" class="mobile-menu-button">
              <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M4 6h16M4 12h16m-7 6h7"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
  
      <!-- mobile menu -->
      <div class="md:hidden" v-if="isMobileMenuOpen">
        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Inicio</a>
        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Eventos</a>
        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Contacto</a>
      </div>
    </nav>
  </template>
  
  <script>
  export default {
    name: 'Navbar',
    data() {
      return {
        isMobileMenuOpen: false,
      };
    },
  }
  </script>
  