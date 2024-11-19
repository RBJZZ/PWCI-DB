document.addEventListener('DOMContentLoaded', () => {
    cargarListas();
});

function cargarListas() {
    fetch('../api/ListasAPI.php', {
        method: 'GET',
        headers: { 'Content-Type': 'application/json' }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            renderizarListas(data.data);
        } else {
            console.error('Error al cargar listas:', data.message);
            mostrarMensaje('No tienes listas creadas.');
        }
    })
    .catch(error => console.error('Error al cargar las listas:', error));
}

function renderizarListas(listas) {
    const container = document.querySelector('.list-container'); 
    container.innerHTML = ''; 

    if (listas.length === 0) {
        mostrarMensaje('No tienes listas creadas.');
        return;
    }

    listas.forEach(lista => {
        const cardHTML = `
            <div class="card mx-1 shadow-sm">
                <a href="./list-click.php?id=${lista.id}">
                    <img src="${lista.imagen || './src/src/img1.png'}" class="card-img-top" alt="${lista.nombre}">
                </a>
                <div class="card-body">
                    <h5 class="card-title">${lista.nombre}</h5>
                </div>
            </div>
        `;

        container.innerHTML += cardHTML;
    });
}
function mostrarMensaje(mensaje) {
    const container = document.getElementById('list-container');
    container.innerHTML = `<p class="text-center">${mensaje}</p>`;
}