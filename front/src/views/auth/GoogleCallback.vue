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
        console.log('Enviando mensaje a la ventana principal');
        window.opener.postMessage({ authSuccess: true }, 'http://localhost:5173');
        window.close();
      } else {
        // Simplemente redirige a la página principal si no es una ventana emergente
        this.$router.push('/');
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
