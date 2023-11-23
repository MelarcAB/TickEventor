<template>
  <div>Manejando respuesta...</div>
</template>

<script>
export default {
  name: 'GoogleCallback',
  mounted() {
    const token = this.$route.query.token;
    if (token) {
      // Guardar token en localStorage
      localStorage.setItem('token', token);

      // Notificar a la ventana principal en caso de que se haya abierto desde una ventana emergente
      if (window.opener) {
        window.opener.postMessage({ authSuccess: true }, '*');
        window.close(); // Cierra la ventana emergente
      } else {
        // Si no es una ventana emergente, redirigir a la página principal
        window.opener.postMessage({ authSuccess: false }, '*');
        this.$router.push('/');
        window.close(); // Cierra la ventana emergente

      }
    } else {
      // Manejar la ausencia de token o errores
      console.error('No se recibió token de autenticación');

      // Redirigir a la página de inicio de sesión o mostrar un mensaje de error, según sea necesario
      this.$router.push('/login');
    }
  }
};
</script>
