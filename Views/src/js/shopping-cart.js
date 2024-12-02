function calcularTotal() {
    const filas = document.querySelectorAll('table tbody tr');
    let total = 0;

    filas.forEach(fila => {
        
        const cantidadCelda = fila.querySelector('th');
        const precioCelda = fila.querySelector('td:last-child');

        if (!cantidadCelda || !precioCelda) {
            return; 
        }

        const cantidad = parseInt(cantidadCelda.textContent.trim());
        const precioTexto = precioCelda.textContent.trim().replace('$', '');
        const precio = parseFloat(precioTexto);

        if (!isNaN(cantidad) && !isNaN(precio)) {
            total += cantidad * precio;
        }
    });

    
    const totalElement = document.querySelector('#totalAmount');
    if (totalElement) {
        totalElement.textContent = `$${total.toFixed(2)}`;
    }
}


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
                <td colspan="5" class="text-center"><h2 style="margin-left:0%;">Tu carrito está vacío.</h2></td>
            </tr>
        `;
        calcularTotal();
        return;
    }

    items.forEach((item) => {
        const precio = parseFloat(item.final_price);
        const sellerName = item.us_user || 'Vendedor desconocido'; 
        const sellerId = item.prod_seller;

        tbody.innerHTML += `
            <tr data-seller-id="${sellerId}">
                <td><input type="checkbox" class="delete-checkbox form-check-input hide-column" style="visibility: hidden;" data-id="${item.cartdt_ID}"></td>
                <th scope="row">${item.cartdt_quantity}</th>
                <td>
                    <a href="../Controllers/ProductosController.php?id=${item.cartdt_product}"><img src="${item.prod_thumbnail}" alt="${item.prod_name}" class="img-thumbnail"></a>
                </td>
                <td>${item.prod_name}</td>
                <br>
                <small class="text-muted" hidden>${sellerName}</small>
                <td>$${!isNaN(precio) ? precio.toFixed(2) : 'N/A'}</td>
            </tr>
        `;
    });

    calcularTotal();
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


function PaymentMethod() {
    const paypalRedirect = document.getElementById('paypal-redirect');
    const creditDebitForm = document.getElementById('credit-debit-form');

    if (document.getElementById('PaypalPM').checked) {
        paypalRedirect.style.display = 'block';
        creditDebitForm.style.display = 'none';
    } else {
        paypalRedirect.style.display = 'none';
        creditDebitForm.style.display = 'block';
    }
}

function redirigirPayPal() {
    alert('Redirigiendo a PayPal...');
    window.location.href = "https://www.paypal.com"; 
}

function procesarPago() {
    const metodoPago = document.querySelector('input[name="listGroupRadio"]:checked').value;

    const metodoPagoMapeado = {
        'PaypalPM': 'PayPal',
        'DebitPM': 'Tarjeta Débito',
        'CreditPM': 'Tarjeta Crédito'
    };

    const metodoPagoFinal = metodoPagoMapeado[metodoPago];
    fetch('../api/CarritoAPI.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            accion: 'procesar_pago',
            metodo_pago: metodoPagoFinal
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Pedido generado exitosamente.');
            console.log('Órdenes:', data.ordenes);
            window.location.reload();
        } else {
            alert(`Error: ${data.message}`);
        }
    })
    .catch(error => console.error('Error:', error));
}

document.addEventListener('DOMContentLoaded', () => {

    const confirmButton = document.querySelector('#confirmPaymentButton');
    if (confirmButton) {
        confirmButton.addEventListener('click', (e) => {
            e.preventDefault(); 
            procesarPago();
        });
    }
});


//VALIDACIONES PARA CAMPOS DE MÉTODOS DE PAGO//

const paymentForm = document.getElementById('paymentForm');
const confirmPaymentButton = document.getElementById('confirmPaymentButton');
confirmPaymentButton.disabled = true; 


document.getElementById('cardName').addEventListener('input', function () {
    const nameInput = this;
    if (nameInput.value.trim() === '') {
        setFieldInvalid(nameInput, "El nombre no puede estar vacío");
    } else {
        setFieldValid(nameInput);
    }
    toggleSubmitButton();
});

document.getElementById('cardNumber').addEventListener('input', function () {
    const cardNumberInput = this;
    const cardNumber = cardNumberInput.value.replace(/\s/g, ''); // Quitar espacios
    if (!/^\d{16}$/.test(cardNumber)) {
        setFieldInvalid(cardNumberInput, "Debe tener 16 dígitos");
    } else {
        setFieldValid(cardNumberInput);
    }
    toggleSubmitButton();
});

document.getElementById('cardExpiry').addEventListener('input', function () {
    const expiryInput = this;
    if (!/^(0[1-9]|1[0-2])\/?([0-9]{2})$/.test(expiryInput.value)) {
        setFieldInvalid(expiryInput, "Formato inválido (MM/AA)");
    } else {
        setFieldValid(expiryInput);
    }
    toggleSubmitButton();
});

document.getElementById('cardCVV').addEventListener('input', function () {
    const cvvInput = this;
    if (!/^\d{3}$/.test(cvvInput.value)) {
        setFieldInvalid(cvvInput, "Debe tener 3 dígitos");
    } else {
        setFieldValid(cvvInput);
    }
    toggleSubmitButton();
});


document.getElementById('cardEmail').addEventListener('input', function () {
    const emailInput = this;
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value)) {
        setFieldInvalid(emailInput, "Formato de correo inválido");
    } else {
        setFieldValid(emailInput);
    }
    toggleSubmitButton();
});


function toggleSubmitButton() {
    const inputs = paymentForm.querySelectorAll('input');
    let allValid = true;
    inputs.forEach(input => {
        if (input.classList.contains('border-danger')) {
            allValid = false;
        }
    });
    confirmPaymentButton.disabled = !allValid;
}

function setFieldValid(input) {
    input.classList.remove('border-danger', 'focus-ring-danger');
    input.classList.add('border-success', 'focus-ring-success');
    const errorText = input.nextElementSibling;
    if (errorText && errorText.classList.contains('error-text')) {
        errorText.textContent = '';
    }
}

function setFieldInvalid(input, message) {
    input.classList.add('border-danger', 'focus-ring-danger');
    input.classList.remove('border-success', 'focus-ring-success');
    let errorText = input.nextElementSibling;
    if (!errorText || !errorText.classList.contains('error-text')) {
        errorText = document.createElement('small');
        errorText.classList.add('error-text', 'text-danger');
        input.parentNode.appendChild(errorText);
    }
    errorText.textContent = message;
}
