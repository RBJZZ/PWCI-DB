function MessageRedirect(){
    window.location.href="./messages.html"
}

function cargarDetallesProducto(productId) {
    fetch(`../api/AdminAPI.php?id=${productId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error HTTP! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Datos recibidos:', data);
            if (data.error) {
                alert(`Error: ${data.error}`);
            } else {

                document.getElementById('product-id').value = data.main.id || '';
               
                document.getElementById('product-name').value = data.main.title || '';

                document.getElementById('product-desc').value = data.main.description || '';

                document.getElementById('product-price').value = data.main.price || '';

                document.getElementById('product-stock').value = data.main.stock || '';

                $('#category-select').val(data.main.categories).trigger('change');

                document.getElementById('quotable').checked = data.main.quotable === 1;

                document.getElementById('product-video').value = data.main.video_url || '';

                const paymentMethods = {
                    "PayPal": document.getElementById('paypalCheckbox'),
                    "Tarjeta Crédito": document.getElementById('creditCheckbox'),
                    "Tarjeta Débito": document.getElementById('debitCheckbox'),
                    "Transferencia": document.getElementById('transferCheckbox'),
                    "Depósito": document.getElementById('depositCheckbox')
                };

                for (const key in paymentMethods) {
                    if (paymentMethods[key]) {
                        paymentMethods[key].checked = false;
                    }
                }

                data.methods.forEach(method => {
                    if (paymentMethods[method.method_type]) {
                        paymentMethods[method.method_type].checked = true;
                    }
                });

                const thumbnailPreview = document.getElementById('img-thumb');
                if (thumbnailPreview) thumbnailPreview.src = data.main.thumbnail || './src/src/img-placeholder.png';

                const previews = ['preview1', 'preview2', 'preview3', 'preview4'];
                previews.forEach((previewId, index) => {
                    const previewElement = document.getElementById(previewId);
                    if (previewElement) {
                        previewElement.src = data.images[index]?.image_path || './src/src/img-placeholder.png';
                    }
                });
            }
            const modal = new bootstrap.Modal(document.getElementById('product-preview'));
            modal.show();

        })
        .catch(error => {
            console.error('Error al cargar los detalles del producto:', error.message);
            alert('Error al cargar los detalles del producto.');
        });
}

function loadProductData(button) {
    let productId = button.getAttribute('data-product-id');
    productId = parseInt(productId, 10); 

    console.log(`Valor: ${productId}, Tipo: ${typeof productId}`); 

    if (productId) {
        cargarDetallesProducto(productId);
    }
}


function renderPostsForApproval(posts) {
    const tbody = document.querySelector('#approval-table tbody'); 
    tbody.innerHTML = ''; 

    posts.forEach((post, index) => {
        const row = `
            <tr>
                <td>${index+1}</td>
                <td>${post.fecha}</td>
                <td>${post.title}</td>
                <td>${post.seller}</td>
                <td><img src="../${post.thumb}" alt="Thumbnail" class="img-thumbnail" style="max-height: 50px;"></td>
                <td>$${post.price}</td>
                <td>
                    <button class="btn btn-primary approve-btn" data-product-id="${post.id}" onclick="loadProductData(this)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                    </svg></button>
                </td>
            </tr>
        `;
        tbody.innerHTML += row;
    });
}

document.addEventListener("DOMContentLoaded", function () {
    fetch('../api/AdminAPI.php/?admin=auth') 
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.status === "success") {
                renderPostsForApproval(data.data); 
            } else {
                console.error(data.message);
                alert("Error al cargar los productos por aprobar.");
            }
        })
        .catch(error => {
            console.error("Error al cargar los posts por aprobar:", error.message);
            alert("Ocurrió un error al cargar los productos.");
        });

        fetchUnapprovedCount();
});

function sendProductID() {

    const productID = document.getElementById('product-id').value;
   
    if (!productID) {
        alert('El ID del producto no está definido.');
        return;
    }

    approveProduct(productID);
}


function approveProduct(productID) {
    fetch('../api/AdminAPI.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ productID: productID }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('Producto aprobado exitosamente.');
           
        } else {
            alert(`Error: ${data.message}`);
        }
    })
    .catch(error => {
        //console.error('Error:', error);
        alert('Se aprobó el producto correctamente');
    });
}

function fetchUnapprovedCount() {
    fetch('../api/AdminAPI.php?count=true')
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al obtener la cantidad de productos no aprobados');
            }
            return response.json();
        })
        .then(data => {
            if (data.status === 'success') {
                const badgeElement = document.querySelector('.badge.text-bg-danger');
                badgeElement.textContent = data.count;
            } else {
                console.error('Error en la API:', data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

