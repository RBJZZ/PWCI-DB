function cargarCarrito() {
    fetch('../api/CarritoAPI.php', {
        method: 'GET',
        headers: { 'Content-Type': 'application/json' }
    })
    .then(response => response.json())
    .then(data => {
        console.log('Respuesta de la API:', data);
        if (data.success) {
            renderizarTabla(data.data);
        } else {
            console.error(data.message);
            mostrarMensaje("No hay productos en el carrito.");
        }
    })
    .catch(error => console.error('Error al cargar el carrito:', error));
}

function renderizarTabla(items) {
    const tbody = document.querySelector('.table tbody');
    tbody.innerHTML = '';

    if (items.length === 0) {
        tbody.innerHTML = `
            <tr>
                <td colspan="5" class="text-center">Tu carrito está vacío.</td>
            </tr>
        `;
        return;
    }

    items.forEach((item) => {
        const precio = parseFloat(item.prod_price);

        tbody.innerHTML += `
            <tr>
                <td><input type="checkbox" class="delete-checkbox form-check-input hide-column" style="visibility: hidden;" data-id="${item.cartdt_ID}"></td>
                <th scope="row">${item.cartdt_quantity}</th>
                <td>
                    <a href="product-view.html"><img src="${item.prod_thumbnail}" alt="${item.prod_name}" class="img-thumbnail"></a>
                </td>
                <td>${item.prod_name}</td>
                <td>$${!isNaN(precio) ? precio.toFixed(2) : 'N/A'}</td>
            </tr>
        `;
    });
}

function mostrarMensaje(mensaje) {
    const tbody = document.querySelector('table tbody');
    tbody.innerHTML = `<tr><td colspan="5">${mensaje}</td></tr>`;
}

document.addEventListener('DOMContentLoaded', () => {
    cargarCarrito();
});


function obtenerSeleccionados() {
    const checkboxes = document.querySelectorAll('.delete-checkbox:checked');
    return Array.from(checkboxes).map(checkbox => parseInt(checkbox.dataset.id));
}

function eliminarSeleccionados(idsSeleccionados) {
    if (idsSeleccionados.length === 0) {
        alert('No hay ítems seleccionados para eliminar.');
        return;
    }

    console.log('IDs seleccionados:', idsSeleccionados);

    fetch('../api/CarritoAPI.php', {
        method: 'DELETE',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ ids: idsSeleccionados }) 
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Productos eliminados exitosamente');
        } else {
            console.error('Error al eliminar productos:', data.message);
        }
        cargarCarrito(); 
    })
    .catch(error => console.error('Error al eliminar productos:', error));
}
