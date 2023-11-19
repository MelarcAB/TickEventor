 

<template>
  <div>
    <nav>
      <slot name="navbar">
        <Navbar />
      </slot>
    </nav>
    <main>
      <!-- Slot para el contenido principal -->
      <slot></slot>
    </main>
    <footer>
      <!-- Footer aquí -->
    </footer>
  </div>
</template>
  
<script>
import Navbar from '@/components/Navbar.vue';

export default {
  name: "MainLayout",
  components: {
    Navbar
  },
};
</script>
  
<style>
/* Estilos generales del layout */
</style>
  