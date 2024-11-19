import { onAuthStateChanged } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-auth.js";
import { signOut } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-auth.js";

const auth = getAuth();
onAuthStateChanged(auth, (user) => {
    if (user) {
        console.log(`Usuario autenticado: ${user.email}`);
    } else {
        console.log("No hay usuario autenticado.");
    }
});

document.getElementById('logout').addEventListener('click', async () => {
    const auth = getAuth();
    try {
        await signOut(auth);
        alert("Sesión cerrada");
    } catch (error) {
        console.error("Error al cerrar sesión:", error.message);
    }
});

onAuthStateChanged(auth, (user) => {
    if (user) {
        console.log(`Usuario autenticado: ${user.email}`);
        if (window.location.pathname === '/login.html' || window.location.pathname === '/register.html') {
            window.location.href = '/dashboard.html';
        }
    } else {
        console.log("No hay usuario autenticado.");
        if (window.location.pathname === '/dashboard.html') {
            window.location.href = '/login.html';
        }
    }
});

