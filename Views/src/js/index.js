// Función para manejar el inicio de sesión
/**
function Login(event) {
    // Evitar el envío del formulario por defecto
    event.preventDefault();

    var userinput = document.getElementById('userName').value;
    var passinput = document.getElementById('password').value;
    var rememberMe = document.getElementById('formCheck').checked; // Comprobar si el usuario marcó "Recuérdame"

    // Validación simple
    if (userinput !== "" && passinput !== "") {
        if (rememberMe) {
            // Guardar en localStorage si el usuario marcó "Recuérdame"
            localStorage.setItem('username', userinput);
        } else {
            // Eliminar cualquier usuario guardado previamente si no marcó "Recuérdame"
            localStorage.removeItem('username');
        }

        // Simular redirección a dashboard.html (puedes hacer un envío real)
        window.location.href = "./php/login.php";
    } else {
        alert("Por favor, completa ambos campos.");
    }
}
**/
// Función para cargar el nombre de usuario si se guardó
function checkRememberedUser() {
    var rememberedUser = localStorage.getItem('username');
    if (rememberedUser) {
        document.getElementById('userName').value = rememberedUser;
        document.getElementById('formCheck').checked = true; // Marca la casilla si el usuario fue recordado
    }
}

// Asignar el evento submit al formulario
document.getElementById('loginForm').addEventListener('submit', Login);

// Ejecutar al cargar la página para ver si hay un usuario recordado
window.onload = checkRememberedUser;