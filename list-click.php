<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/main.css">
    <link rel="stylesheet" href="./src/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="./src/js/bootstrap.js"></script>
    <link rel="icon" href="./src/src/logo1.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

    <title>Lista seleccionada</title>
</head>
<body>

    <?php include 'navbar.php';?>

          <div class="container-fluid justify-content-center" style="margin-top: 100px;">
            <div class="row justify-content-center m-5">
              
              <div class="col-lg-9">
        
                <h1 class="mt-4 ">Lista 1</h1>
                <h3 class="ms-4 ">@Usuario</h3>

                <div class="row justify-content-start">

                    <button id="editButton" class="btn btn-light btn-md border shadow-sm rounded-3 user-active mb-2 mt-2" style="width: 200px;">Editar lista</button>
                    <button id="deleteButton" class="btn btn-danger border shadow-sm rounded-3 mb-2 ms-2 mt-2" style="display: none; width:200px;">Eliminar</button>

                </div>
                
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col" class="item-select hide-column"><span><i class="bi bi-check2-square"></i></span></th>
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
        
             
        
              </div>
              
              
        
            </div>
        
         
        
          </div>


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


      <script src="./src/js/bootstrap.bundle.min.js"></script>

</body>
</html>