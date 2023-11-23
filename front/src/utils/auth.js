// src/utils/auth.js
export function isAuthenticated() {
    const token = localStorage.getItem('user-token');
    return !!token; // Esto es un ejemplo simple, podrías querer validar el token de alguna manera
}
