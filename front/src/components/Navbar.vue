<template>
  <nav class="bg-blue-800 shadow-lg">
    <div class="max-w-6xl mx-auto px-4">
      <div class="flex justify-between items-center py-3">
        <!-- logo -->
        <div>
          <router-link to="/" class="flex items-center text-white hover:text-gray-300">
            <span class="font-bold text-lg">TickEventor</span>
          </router-link>
        </div>

        <!-- primary nav -->
        <div class="hidden md:flex items-center space-x-4">
          <router-link to="/" class="text-white hover:text-gray-300 py-2 px-3 text-sm md:text-md">Inicio</router-link>
          <router-link to="/eventos"
            class="text-white hover:text-gray-300 py-2 px-3 text-sm md:text-md">Eventos</router-link>

          <!-- Dropdown -->
          <div class="relative" @mouseover="isDropdownOpen = true" @mouseleave="isDropdownOpen = false">
            <button class="text-white hover:text-gray-300 py-2 px-3 text-sm md:text-md flex items-center">
              Contacto
            </button>
            <div v-show="isDropdownOpen" class="absolute mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
              <router-link to="/contacto/info"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 hover:text-white">Información</router-link>
              <router-link to="/contacto/ayuda"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 hover:text-white">Ayuda</router-link>
            </div>
          </div>
        </div>

        <!-- mobile button -->
        <div class="md:hidden">
          <button @click="isMobileMenuOpen = !isMobileMenuOpen" class="text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path v-if="isMobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 18L18 6M6 6l12 12" />
              <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- mobile menu -->
    <div class="md:hidden overflow-hidden transition-all duration-300" :style="mobileMenuStyle">
      <router-link to="/" class="block py-2 px-4 text-white hover:bg-blue-700">Inicio</router-link>
      <router-link to="/eventos" class="block py-2 px-4 text-white hover:bg-blue-700">Eventos</router-link>

      <!-- Mobile Dropdown -->
      <button @click="isMobileDropdownOpen = !isMobileDropdownOpen"
        class="w-full text-left py-2 px-4 text-white hover:bg-blue-700 flex justify-between items-center">
        Contacto
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            :d="isMobileDropdownOpen ? 'M6 18L18 6M6 6l12 12' : 'M4 6h16M4 12h16m-7 6h7'" />
        </svg>
      </button>
      <div v-show="isMobileDropdownOpen" class="py-2">
        <router-link to="/contacto/info"
          class="block py-2 px-4 text-sm text-white hover:bg-blue-600">Información</router-link>
        <router-link to="/contacto/ayuda" class="block py-2 px-4 text-sm text-white hover:bg-blue-600">Ayuda</router-link>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: 'Navbar',
  data() {
    return {
      isMobileMenuOpen: false,
      isDropdownOpen: false,
      isMobileDropdownOpen: false,
    };
  },
  computed: {
    mobileMenuStyle() {
      return this.isMobileMenuOpen ? { maxHeight: '300px' } : { maxHeight: '0' };
    },
  },
}
</script>
