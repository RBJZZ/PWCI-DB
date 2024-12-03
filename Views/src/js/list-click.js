function actualizarDatosLista(nombreLista, nombreUsuario) {
    
    const listNameElement = document.getElementById('list-name');
    const userNameElement = document.getElementById('user-name');

    
    listNameElement.textContent = nombreLista;
    userNameElement.textContent = `@${nombreUsuario}`;
}

function obtenerParametrosLista() {
    const params = new URLSearchParams(window.location.search);
    return {
        id: params.get('id'),
        ul: params.get('ul') 
    };
}

function obtenerIdLista() {
    const id = new URLSearchParams(window.location.search);
    return id.get('id');
}


function cargarItemsLista() {
    const { id, ul } = obtenerParametrosLista();
    if (!id) {
        console.error("No se proporcionó un ID de lista.");
        return;
    }

    const url = ul ? `../api/ListasAPI.php?id=${id}&ul=${ul}` : `../api/ListasAPI.php?id=${id}`;

    fetch(url, {
        method: 'GET',
        headers: { 'Content-Type': 'application/json' }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            renderizarItems(data.data, data.esPropietario);
        } else {
            console.error('Error al cargar ítems de la lista:', data.message);
        }
    })
    .catch(error => console.error('Error al cargar los ítems:', error));
}


function renderizarItems(items, esPropietario) {
    const tbody = document.querySelector('table tbody');
    const listNameElement = document.getElementById('list-name');
    const userNameElement = document.getElementById('user-name');
    tbody.innerHTML = '';

    if (items.length === 0) {
        tbody.innerHTML = `
            <tr>
                <td colspan="5" class="text-center">No hay productos en esta lista.</td>
            </tr>
        `;
        listNameElement.textContent = "Lista vacía";
        userNameElement.textContent = "@Usuario";
        return;
    }

    listNameElement.textContent = items[0].lista_nombre;
    userNameElement.textContent = `@${items[0].usuario_nombre}`;

    items.forEach((item, index )=> {
        const precio = parseFloat(item.prod_price);
        tbody.innerHTML += `
            <tr>
                ${
                    esPropietario
                        ? `<td><input type="checkbox" class="delete-checkbox form-check-input" data-id="${item.listdt_ID}"></td>`
                        : `<td></td>`
                }
                <th scope="row">${index+1}</th>
                <td>
                    <a href="product-view.html?id=${item.prod_ID}">
                        <img src="${item.prod_thumbnail || './src/src/img-placeholder.png'}" alt="${item.prod_name}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                    </a>
                </td>
                <td>${item.prod_name}</td>
                <td>$${!isNaN(precio) ? precio.toFixed(2) : 'N/A'}</td>
            </tr>
        `;
    });

    if (!esPropietario) {
        document.querySelector('.btn.btn-light.border.shadow-sm').style.display = 'none';
        document.getElementById('editButton').style.display='none';
    }
}


function obtenerSeleccionados() {
    const checkboxes = document.querySelectorAll('.delete-checkbox:checked');
    return Array.from(checkboxes).map(checkbox => parseInt(checkbox.dataset.id));
}

function eliminarSeleccionados(seleccionados) {
    fetch('../api/ListasAPI.php', {
        method: 'DELETE',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ ids: seleccionados })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Ítems eliminados exitosamente');
            cargarItemsLista();
        } else {
            console.error('Error al eliminar ítems:', data.message);
            alert('Hubo un error al intentar eliminar los ítems');
        }
    })
    .catch(error => console.error('Error al eliminar ítems:', error));
}

function eliminarLista(listaId) {
    fetch('../api/ListasAPI.php', {
        method: 'DELETE',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id: listaId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Lista eliminada exitosamente');
            window.location.href = './lists.php';
        } else {
            console.error('Error al eliminar la lista:', data.message);
            alert('Hubo un error al intentar eliminar la lista');
        }
    })
    .catch(error => console.error('Error al eliminar la lista:', error));
}


function mostrarModalAdvertencia(titulo, mensaje, callbackConfirmar) {
   
    const modalTitle = document.getElementById('staticBackdropLabel');
    const modalBody = document.querySelector('#ModalConfirmDelete .modal-body');

    
    modalTitle.textContent = titulo;
    modalBody.textContent = mensaje;

    
    const modal = new bootstrap.Modal(document.getElementById('ModalConfirmDelete'));
    modal.show();

   
    const confirmButton = document.querySelector('.modal-confirm');
    confirmButton.onclick = function () {
        callbackConfirmar();
        modal.hide(); 
        resetModal();
    };
}


document.querySelector('.btn.btn-light.border.shadow-sm').addEventListener('click', function () {
    const listaId = obtenerIdLista(); 
    if (!listaId) {
        alert('No se encontró el ID de la lista.');
        return;
    }

    mostrarModalAdvertencia(
        'Eliminar Lista', 
        '¿Estás seguro de que deseas eliminar esta lista completa? Esta acción no se puede deshacer.',
        function () {
            eliminarLista(listaId); 
        }
    );
});


document.addEventListener('DOMContentLoaded', () => {
    cargarItemsLista();

});


