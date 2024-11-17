function agregarACarrito(user, productoId, cantidad) {
    fetch('../api/CarritoAPI.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            usuario: user,
            producto_id: productoId,
            cantidad:cantidad
         })
        
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Producto agregado al carrito');
        } else {
            alert('Error al agregar al carrito');
        }
    })
    .catch(error => console.error('Error:', error));
}

function agregarALista(productoId, listaId) {
    fetch('../Controllers/ListasController.php?list=addItem', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ producto_id: productoId, lista_id: listaId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Producto agregado a la lista');
        } else {
            alert('Error al agregar a la lista');
        }
    })
    .catch(error => console.error('Error:', error));
}