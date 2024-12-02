document.getElementById('rateProductModal').addEventListener('hidden.bs.modal', function () {
    const form = document.getElementById('rating-form');
    form.reset(); 
});

function submitRating() {
    const form = document.getElementById('rating-form');
    const formData = new FormData(form);

    fetch('../api/PedidosAPI.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert(`Error: ${data.error}`);
        } else {
            alert(data.message);
            document.getElementById('rateProductModal').modal('hide');
            fetchPedidos();
        }
    })
    .catch(error => console.error('Error al guardar calificación:', error));
}


function openRatingModal(button) {
    const productId = button.getAttribute('data-product-id');
    const productName = button.getAttribute('data-product-name');

    document.getElementById('modal-product-id').value = productId;
    document.getElementById('modal-product-name').value = productName;
}

document.addEventListener('DOMContentLoaded', () => {
    fetchPedidos();

    document.getElementById('consult-type').addEventListener('change', fetchPedidos);
    document.querySelector('.category-filter').addEventListener('change', fetchPedidos);
});

function fetchPedidos() {
    const order = document.getElementById('consult-type').value === '1' ? 'asc' : 'desc';
    const categoryElement = document.querySelector('.category-filter');
    const category = categoryElement.value === "" ? null : categoryElement.value; 

    let url = `../api/PedidosAPI.php?order=${order}`;
    if (category !== null) {
        url += `&category=${category}`;
    }

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error('Error:', data.error);
            } else {
                console.log(data);
                renderPedidos(data.pedidos);
            }
        })
        .catch(error => console.error('Error al obtener pedidos:', error));
}


function renderPedidos(pedidos) {
    const tbody = document.querySelector('#detailed-consult tbody');
    tbody.innerHTML = '';

    pedidos.forEach((pedido, index) => {
        const row = `
            <tr>
                <td>${index + 1}</td>
                <td>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" 
                        data-bs-target="#rateProductModal" 
                        onclick="openRatingModal(this)" 
                        data-product-id="${pedido.product_id}" 
                        data-product-name="${pedido.product_name}">
                        Calificar/Estado
                    </button>
                </td>
                <td>${pedido.order_date}</td>
                <td>
                    <a href="product-view.html">
                        <img src="${pedido.thumbnail}" alt="" class="img-thumbnail">
                    </a>
                </td>
                <td>${pedido.product_name}</td>
                <td>$${pedido.unitary_price}</td>
                <td>
                    <a href="../Controllers/SellerController.php?view=sellerpf&uid=${pedido.seller_id}">${pedido.seller_name}</a>
                </td>
            </tr>
        `;
        tbody.innerHTML += row;
    });
}
