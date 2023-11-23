<template>
    <div>Redirigiendo a Google...</div>
</template>
  
<script>
let url_back = (import.meta.env.VITE_BACKEND_URL);
let url = `${url_back}/auth/google`;

export default {
    name: 'AuthGoogle',
    mounted() {
        console.log("cagondeu")
        window.location.href = url;

        if (window.opener) {
            window.opener.location.href = '/';
            window.close();
        } else {
            this.$router.push('/');
        }

    }
};
</script>
  