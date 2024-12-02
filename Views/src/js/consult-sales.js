document.addEventListener("DOMContentLoaded", function() {
    const quotableSwitch = document.getElementById("quotable");
    const productPrice = document.getElementById("product-price");
    const priceinput = document.getElementById('product-price');

    function togglePriceInput() {
        if (quotableSwitch.checked) {
            productPrice.disabled = true;
            productPrice.value = ''; 
            priceinput.classList.remove('focus-ring-danger', 'border-danger');
            priceinput.classList.remove('focus-ring-success', 'border-success');
            formbtn.disabled = false;
        } else {
            productPrice.disabled = false;
        }
    }

    
    quotableSwitch.addEventListener("change", togglePriceInput);

    togglePriceInput();

});


document.getElementById('thumbnail-upload').addEventListener('change', function(event){

    const file=event.target.files[0];
    if(file){
        const preview=document.getElementById('img-thumb');
        preview.src=URL.createObjectURL(file);
    }
});


document.getElementById("multiple-pic-input").addEventListener("change", function(event) {
    const files = event.target.files;
    
    for (let i = 0; i < 4; i++) {
        const preview = document.getElementById(`preview${i + 1}`);
        
        if (files[i]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            
            reader.readAsDataURL(files[i]);
        } else {

            preview.src = './src/src/img-placeholder.png';
        }
    }
});


function resetVisibility() {
    document.getElementById('detailed-consult').classList.add('d-none');
    document.getElementById('general-consult').classList.add('d-none');
    document.getElementById('disponibility-consult').classList.add('d-none');
}

function ChangeFilters() {
    const typeconsult = document.getElementById("consult-type").value;

    const detailedfilters = document.querySelectorAll('.detailed-input');
    const generalfilters = document.querySelectorAll('.general-input');
    const detailedresults = document.getElementById("detailed-consult");
    const generalresults = document.getElementById("general-consult");
    const dispresults = document.getElementById("disponibility-consult");
    const notfound = document.getElementById("noresults");
    const boxhide = document.getElementById("box-hide");

    const resetVisibility = () => {
        detailedfilters.forEach(input => input.classList.add('d-none'));
        generalfilters.forEach(input => input.classList.add('d-none'));
        detailedresults.classList.add('d-none');
        generalresults.classList.add('d-none');
        dispresults.classList.add('d-none');
        notfound.classList.add('d-none');
        boxhide.classList.add('d-none');
    };

    resetVisibility(); 

    if (typeconsult === "1") {
       
        boxhide.classList.remove('d-none');
        detailedfilters.forEach(input => input.classList.remove('d-none'));
        detailedresults.classList.remove('d-none');

    } else if (typeconsult === "2") {
       
        boxhide.classList.remove('d-none');
        generalfilters.forEach(input => input.classList.remove('d-none'));
        generalresults.classList.remove('d-none');
    } else if (typeconsult === "3") {
      
        dispresults.classList.remove('d-none');
    } else {
       
        notfound.classList.remove('d-none');
    }
}

function ToggleDivs() {
    const stockdiv = document.getElementById("edit-post");
    const editdiv = document.getElementById("edit-stock");
    const btntoggle = document.getElementById("toggle-edit");

    const isStockVisible = stockdiv.classList.contains('d-none');
    stockdiv.classList.toggle('d-none', !isStockVisible);
    editdiv.classList.toggle('d-none', isStockVisible);

    btntoggle.textContent = isStockVisible
        ? "Editar disponibilidad"
        : "Editar artículo completo";
}

function renderDetailedResults(response) {
    if (!response || !Array.isArray(response.data)) {
        console.error("Error: los datos no son un arreglo válido", response);
        return;
    }
    const data = response.data; 
    const tbody = document.querySelector('#detailed-consult tbody');
    tbody.innerHTML = ''; 

    data.forEach((venta, index) => {
        const row = `
            <tr>
                <td>${index + 1}</td>
                <td>${venta.FechaHoraVenta}</td>
                <td>
                    <a href="../Controllers/ProductosController.php?id=${venta.PID}">
                        <img src="${venta.Thumbnail}" alt="Imagen" class="img-thumbnail">
                    </a>
                </td>
                <td>${venta.Producto}</td>
                <td>${venta.Categoria}</td>
                <td>${venta.Rating}</td>
                <td>$${venta.Precio}</td>
                <td>${venta.ExistenciaActual}</td>
            </tr>
        `;
        tbody.innerHTML += row;
    });

    document.getElementById('detailed-consult').classList.remove('d-none'); 
}



function renderGeneralResults(response) {
    if (!response || !Array.isArray(response.data)) {
        console.error("Error: los datos no son un arreglo válido", response);
        return;
    }
    const data = response.data;
    const tbody = document.querySelector('#general-results');
    tbody.innerHTML = ''; 

    data.forEach((venta, index) => {
        const row = `
            <tr>
                <td>${index + 1}</td>
                <td>${venta.MesVenta}</td>
                <td>${venta.AnioVenta}</td>
                <td>${venta.Categoria}</td>
                <td>${venta.TotalVentas}</td>
            </tr>
        `;
        tbody.innerHTML += row;
    });

    document.getElementById('general-consult').classList.remove('d-none'); 
}


function cargarDetallesProducto(productId) {
    fetch(`../api/ProductosAPI.php?id=${productId}`)
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
        })
        .catch(error => {
            console.error('Error al cargar los detalles del producto:', error.message);
            alert('Error al cargar los detalles del producto.');
        });
}



function loadProductData(button) {
    const productId = button.getAttribute('data-product-id');
    const productName = button.getAttribute('data-product-name');
    const productStock = button.getAttribute('data-product-stock');

    document.getElementById('product-name').value = productName;
    document.getElementById('product-stock-solo').value = productStock;
    document.getElementById('product-id').value=productId;

    document.getElementById('edit-disp').setAttribute('data-product-id', productId);
    document.getElementById('edit-post').setAttribute('data-product-id', productId);

    const productDiv = document.getElementById('edit-post');
    if (!productDiv) {
        console.error("El div con el ID 'product-container' no existe.");
        return;
    }

    
    const prod = productDiv.getAttribute('data-product-id');
    if (productId) {
        
        cargarDetallesProducto(prod);
    } else {
        console.error("El atributo 'data-product-id' no está definido en el div.");
    }
    
}


function EliminarProducto(button) {
    const productId = button.getAttribute('data-product-id');

    if (productId) {
        if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
            fetch('../api/ProductosAPI.php', {
                method: 'DELETE',
                headers: { 'Content-Type': 'application/json', },
                body: JSON.stringify({ productID: productId })                
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => {
                        throw new Error(err.message || 'Error al eliminar el producto');
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.status === 'success') {
                    alert('Producto eliminado exitosamente.');
                    
                    const productRow = button.closest('tr'); 
                    if (productRow) {
                        productRow.remove();
                    }
                } else {
                    alert(`Error: ${data.message}`);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Ocurrió un error al intentar eliminar el producto.');
            });
        }
    } else {
        alert('ID del producto no encontrado.');
    }
}


function renderDisponibilityResults(data) {
    const tbody = document.querySelector('#disponibility-consult tbody');
    tbody.innerHTML = ''; 

    data.forEach((producto, index) => {
        const row = `
            <tr>
                <td>
                    <button class="btn" data-bs-toggle="modal" 
                            data-bs-target="#edit-disp"
                            data-product-id="${producto.ProductoID}" 
                            data-product-name="${producto.NombreProducto}" 
                            data-product-stock="${producto.StockDisponible}" 
                            onclick="loadProductData(this)">
                        <span><i class="bi bi-pencil-square"></i></span>
                    </button>
                </td>
                <td>
                <button class="btn btn-danger" data-product-id="${producto.ProductoID}" onclick="EliminarProducto(this)">
                <span><i class="bi bi-trash3-fill"></i></span>
                </button>
                </td>
                <td>${producto.FechaPublicacion}</td>
                <td>
                    <a href="product-view.html">
                        <img src="${producto.Thumbnail}" alt="Imagen" class="img-thumbnail">
                    </a>
                </td>
                <td>${producto.NombreProducto}</td>
                <td>${producto.Categoria}</td>
                <td>${producto.StockDisponible}</td>
            </tr>
        `;
        tbody.innerHTML += row;
    });

    document.getElementById('disponibility-consult').classList.remove('d-none');
}

document.getElementById('consult-button').addEventListener('click', () => {
    const tipoConsulta = document.getElementById('consult-type').value;
    const fechaInicio = document.getElementById('fecha-inicio').value || null;
    const fechaFin = document.getElementById('fecha-fin').value || null;
    const categoriaId = document.getElementById('category-filter').value || null; 

    if (!tipoConsulta) {
        alert("Selecciona un tipo de consulta.");
        return;
    }

    if (tipoConsulta === "1" || tipoConsulta === "2") {
        fetch('../api/ConsultasAPI.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                tipoConsulta: tipoConsulta,
                fechaInicio: fechaInicio,
                fechaFin: fechaFin,
                categoriaId: categoriaId
            })
        })
        .then(response => {
            if (response.headers.get('Content-Type')?.includes('application/json')) {
                return response.json();
            } else {
                throw new Error("Response is not JSON");
            }
        })
        .then(data => {
            console.log(data);
            if (tipoConsulta === "1") {
                renderDetailedResults(data);
            } else if (tipoConsulta === "2") {
                renderGeneralResults(data);
            }
        })
        .catch(error => console.error('Error:', error));
    } else if (tipoConsulta === "3") {
        const url = categoriaId 
            ? `../api/ConsultasAPI.php?categoriaId=${encodeURIComponent(categoriaId)}`
            : '../api/ConsultasAPI.php';
        
        fetch(url, {
            method: 'GET',
            headers: { 'Content-Type': 'application/json' }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            if (data.error) {
                console.error('Error desde la API:', data.error);
                alert('No se pudieron cargar los productos. Verifica tu conexión.');
            } else {
                renderDisponibilityResults(data);
            }
        })
        .catch(error => {
            console.error('Error en la solicitud:', error.message);
            alert('Ocurrió un error al cargar los productos.');
        });
    }
});


function editarProducto() {
    const form = document.getElementById('edit-product-form');
    const formData = new FormData(form);

    fetch('../api/ProductosAPI.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            return response.text().then(text => {
                throw new Error(`Error HTTP! status: ${response.status} - ${text}`);
            });
        }
        return response.json();
    })
    .then(data => {
        if (data.error) {
            alert(`Error: ${data.error}`);
        } else {
            alert(data.message);
            location.reload();
        }
    })
    .catch(error => {
        console.error('Error al editar el producto:', error.message);
        alert('Error al enviar los datos.');
        location.href = '../Views/dashboard.php';
    });
}

