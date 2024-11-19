import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-auth.js";
import { auth } from './config.js';
document.getElementById('register-form').addEventListener('submit', async (event) => {
    event.preventDefault();

    const email = document.getElementById('email-input').value;
    const password = document.getElementById('pass-input').value;

    const auth = getAuth();
    try {
        const userCredential = await createUserWithEmailAndPassword(auth, email, password);
        const user = userCredential.user;
        alert(`Usuario registrado: ${user.email}`);
        document.getElementById('register-form').submit();
       
    } catch (error) {
        console.error("Error en el registro:", error.message);
        alert(`Error: ${error.message}`);
    }
});
