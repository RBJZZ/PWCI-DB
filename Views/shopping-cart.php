<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/main.css">
    <link rel="stylesheet" href="./src/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="./src/js/bootstrap.js"></script>
    <link rel="icon" href="./src/src/logo1.png" type="image/x-icon">
    <title>Carrito</title>
</head>
<body>

  <?php include 'navbar.php';?>

  <div class="container-fluid justify-content-center" style="margin-top: 100px;">
    <div class="row justify-content-center m-5">
      
      <div class="col-lg-9">

        <h1 class="m-4">Tu carrito</h1>

        <div class="row justify-content-start">

          <button id="editButton" class="btn btn-light btn-md border shadow-sm rounded-3 user-active mb-2 mt-2" style="width: 200px;">Editar lista</button>
          <button id="deleteButton" class="btn btn-danger border shadow-sm rounded-3 mb-2 ms-2 mt-2" style="display: none; width:200px;">Eliminar</button>

      </div>
      
      <div class="table-responsive-sm">

        <table class="table">
          <thead>
            <tr>
              <th scope="col" class="item-select hide-column" style="width: 20px;"><span><i class="bi bi-check2-square"></i></span></th>
              <th scope="col">Producto</th>
              <th scope="col">Thumbnail</th>
              <th scope="col">Nombre del producto</th>
              <th scope="col">Precio</th>
            </tr>
          </thead>
          <tbody>
            <tr>
  
              <td><input type="checkbox" class="delete-checkbox form-check-input hide-column" style="visibility: hidden;"></td>
  
              <th scope="row">1</th>
              <td>
                <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
              </td>
              <td>Producto 1</td>
              <td>$45.00</td>
            </tr>
            <tr>
  
              <td><input type="checkbox" class="delete-checkbox form-check-input hide-column" style="visibility: hidden;"></td>
              <th scope="row">1</th>
              <td>
                <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
              </td>
              <td>Producto 2</td>
              <td>$900.00</td>
            </tr>
            <tr>
              <td><input type="checkbox" class="delete-checkbox form-check-input hide-column" style="visibility: hidden;"></td>
              <th scope="row">1</th>
              <td>
                <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
              </td>
              <td>Producto 3</td>
              <td>$500.00</td>
            </tr>
          </tbody>
        </table>
        <!--MODAL DE ADVERTENCIA-->
        <div class="modal fade" id="ModalConfirmDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Advertencia</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                ¿Estás seguro de que deseas eliminar de la lista?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-light border modal-cancel" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger modal-confirm">Eliminar</button>
              </div>
            </div>
          </div>
        </div>

        <script>

          /**eliminar**/

          var Editactive=false;
          var rowsToDelete=[];
          
          document.getElementById('editButton').addEventListener('click', function() {
                  Editactive=!Editactive;

                  var checkboxes = document.querySelectorAll('.delete-checkbox');
                  var Selectcolumn=document.querySelectorAll('.item-select');
                  checkboxes.forEach(function(checkbox) {
                      checkbox.style.visibility = Editactive ? 'visible' : 'hidden';
                  });

                  Selectcolumn.forEach(function(column){
                    column.classList.toggle('hide-column',!Editactive);
                  });

                  document.getElementById('deleteButton').style.display = Editactive ? 'block' : 'none';
                  this.textContent=Editactive ? 'Cancelar Selección' : 'Editar Lista';
              });

              document.getElementById('deleteButton').addEventListener('click', function() {
                  rowsToDelete=[];
                  var checkboxes = document.querySelectorAll('.delete-checkbox:checked');
                  checkboxes.forEach(function(checkbox) {
                      rowsToDelete.push(checkbox.closest('tr'));
                  });

                
                  var modal =new bootstrap.Modal(document.getElementById('ModalConfirmDelete'));
                  modal.show();

              });

              document.querySelector('.modal-confirm').addEventListener('click', function(){
                 rowsToDelete.forEach(function(row){
                  row.remove();
                 });

                 rowsToDelete=[];
                 var modal=bootstrap.Modal.getInstance(document.getElementById('ModalConfirmDelete'));
                 modal.hide();

              });

              document.querySelector('.modal-cancel').addEventListener('click', function() {
                rowsToDelete = [];
                var modal = bootstrap.Modal.getInstance(document.getElementById('ModalConfirmDelete'));
                modal.hide();
              });

         </script>
  
          <table class="table text-end">
            <thead>
              <tr>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              
              <tr>
                <td><h2>$500.00</h2></td>
              </tr>
              
            </tbody>
          </table>

      </div>
      
      <div class="d-flex justify-content-center">
        <button class="btn btn-primary btn-lg shadow-lg border" id="button-redirect" onclick="Payment()">Proceder a los métodos de pago</button>
      </div>
      

      </div>
      
      

    </div>

    <div class="row justify-content-center text-center m-3 p-2">

      <h2 class="mb-4" style="margin-left: 0%;">También podría interesarte...</h2>
      <div class="col-lg-2 col-md-6">
        <div class="card shadow-lg" style="width: 18rem;">
          <img src="./src/src/img1.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="./product-view.html" class="btn btn-secondary">Go somewhere</a>
          </div>
        </div>
      </div>

      <div class="col-lg-2 col-md-6">
        <div class="card shadow-lg" style="width: 18rem;">
          <img src="./src/src/img2.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="./product-view.html" class="btn btn-secondary">Go somewhere</a>
          </div>
        </div>
      </div>

      <div class="col-lg-2 col-md-6">
        <div class="card shadow-lg" style="width: 18rem;">
          <img src="./src/src/img3.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="./product-view.html" class="btn btn-secondary">Go somewhere</a>
          </div>
        </div>
      </div>

      <div class="col-lg-2 col-md-6">
        <div class="card shadow-lg" style="width: 18rem;">
          <img src="./src/src/img4.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="./product-view.html" class="btn btn-secondary">Go somewhere</a>
          </div>
        </div>
      </div>

      <div class="col-lg-2 col-md-6">
        <div class="card shadow-lg" style="width: 18rem;">
          <img src="./src/src/img1.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="./product-view.html" class="btn btn-secondary">Go somewhere</a>
          </div>
        </div>
      </div>

      <div class="col-lg-2 col-md-6">
        <div class="card shadow-lg" style="width: 18rem;">
          <img src="./src/src/img2.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="./product-view.html" class="btn btn-secondary">Go somewhere</a>
          </div>
        </div>
      </div>
      
      



    </div>

  </div>

  <script>

    function Payment(){
      window.location.href="./payment-page.html";
    }
  </script>




</body>
</html>

