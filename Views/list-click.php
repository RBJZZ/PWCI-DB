<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/main.css">
    <link rel="stylesheet" href="./src/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/css/list-click.css">
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
        
                
                <div class="d-flex align-items-center mt-4">
                    <h1 id="list-name" class="me-3">Lista 1</h1>
                    <button class="btn btn-md btn-light border shadow-sm" onclick="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                        </svg>
                    </button>
                </div>
              
                
                <h3 class="ms-4" id="user-name">@Usuario</h3>
                
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
                  const seleccionados=obtenerSeleccionados();
                  if(seleccionados.length===0){
                    alert('No hay items seleccionados');
                    return
                  }
                  
                  mostrarModalAdvertencia(
                      'Eliminar Ítems',
                      `¿Estás seguro de que deseas eliminar los ${seleccionados.length} ítems seleccionados?`,
                      function () {
                          eliminarSeleccionados(seleccionados);
                      }
                  );
                  
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


      <script src="../Views/src/js/list-click.js"></script>

</body>
</html>