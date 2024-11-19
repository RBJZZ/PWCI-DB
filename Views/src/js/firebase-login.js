import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-auth.js";
import { auth } from './config.js';
document.getElementById('loginForm').addEventListener('submit', async (event) => {
    event.preventDefault();

    const email = document.getElementById('key').value;
    const password = document.getElementById('password').value;

    const auth = getAuth();
    try {
        const userCredential = await signInWithEmailAndPassword(auth, email, password);
        const user = userCredential.user;
        alert(`Bienvenido: ${user.email}`);
        document.getElementById('loginForm').submit();
    } catch (error) {
        console.error("Error en el inicio de sesión:", error.message);
        alert(`Error: ${error.message}`);
    }
});
