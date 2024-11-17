document.getElementById('filterForm').addEventListener('submit', function(event) {
    event.preventDefault(); 
    const form = document.getElementById('filterForm');
    const formData = new FormData(form);

    fetch('../Controllers/SearchController.php?action=advanced', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        updateProductContainer(data);
    })
    .catch(error => console.error('Error:', error));
});

function updateProductContainer(productos) {
    const container = document.getElementById('product-container'); 
    container.innerHTML = ''; 

    let row; 
    productos.forEach((producto, index) => {
        if (index % 6 === 0) {
            if (row) container.appendChild(row); 
            row = document.createElement('div'); 
            row.className = 'row justify-content-center text-center m-3 p-2 productcontainer';
        }

        const productCard = `
            <div class="col-lg-2 col-md-6 mb-3">
                <div class="card shadow-md border rounded-0" style="width: 18rem;">
                    <div class="simg-container">
                        <img src="../Views/${producto.pic}" class="card-img-top rounded-0" alt="Imagen del producto">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">${producto.namep}</h5>
                        <a href="../Controllers/ProductosController.php?id=${producto.id}" class="btn btn-card rounded-0">Ver Producto</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">$${producto.price}</small>
                    </div>
                </div>
            </div>
        `;
        row.innerHTML += productCard;
    });

    if (row) container.appendChild(row); 
}