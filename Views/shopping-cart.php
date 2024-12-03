<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/main.css">
    <link rel="stylesheet" href="./src/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/css/shopping-cart.css">
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
              <th scope="col">Cantidad</th>
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
                  
                  const modal =new bootstrap.Modal(document.getElementById('ModalConfirmDelete'));
                  modal.show();

                  document.querySelector('.modal-confirm').addEventListener('click', function() {
                    eliminarSeleccionados(seleccionados); 
                    const modalInstance = bootstrap.Modal.getInstance(document.getElementById('ModalConfirmDelete'));
                    modalInstance.hide();
                  });

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
                <td><h2 id="totalAmount">$0.00</h2></td>
              </tr>
              
            </tbody>
          </table>

      </div>
      
      <div class="d-flex justify-content-center">
        <button class="btn btn-primary btn-lg shadow-lg border" id="button-redirect" data-bs-toggle="modal" data-bs-target="#paymentModal">Proceder al Pago</button>
      </div>
      

      </div>
      
      

    </div><!--FIN DEL ROW-->



   

  </div>


  <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Seleccione un método de pago</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="PaypalPM" id="PaypalPM" checked onclick="PaymentMethod()">
                                <label class="form-check-label" for="PaypalPM"><i class="bi bi-paypal"></i> PayPal</label>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="DebitPM" id="DebitPM" onclick="PaymentMethod()">
                                <label class="form-check-label" for="DebitPM"><i class="bi bi-credit-card-fill"></i> Tarjeta de Débito</label>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="CreditPM" id="CreditPM" onclick="PaymentMethod()">
                                <label class="form-check-label" for="CreditPM"><i class="bi bi-credit-card-fill"></i> Tarjeta de Crédito</label>
                            </li>
                        </ul>
                    </div>
                </div>

               
                <div id="credit-debit-form" class="mt-4" style="display:none;">
                <form id="paymentForm">
                  <div class="mb-3">
                      <label for="cardName" class="form-label">Nombre Completo</label>
                      <input type="text" class="form-control" id="cardName" placeholder="Nombre Completo">
                  </div>
                  <div class="mb-3">
                      <label for="cardNumber" class="form-label">Número de Tarjeta</label>
                      <input type="text" class="form-control" id="cardNumber" placeholder="**** **** **** ****">
                  </div>
                  <div class="row">
                      <div class="col-md-6 mb-3">
                          <label for="cardExpiry" class="form-label">Fecha de Expiración</label>
                          <input type="text" class="form-control" id="cardExpiry" placeholder="MM/AA">
                      </div>
                      <div class="col-md-6 mb-3">
                          <label for="cardCVV" class="form-label">CVV</label>
                          <input type="text" class="form-control" id="cardCVV" placeholder="***">
                      </div>
                  </div>
                  <div class="mb-3">
                      <label for="cardEmail" class="form-label">Correo Electrónico</label>
                      <input type="email" class="form-control" id="cardEmail" placeholder="correo@ejemplo.com">
                  </div>
                  <div class="text-center">
                      <button type="submit" class="btn btn-primary" id="confirmPaymentButton">Confirmar Pago</button>
                  </div>
              </form>
                </div>

                
                <div id="paypal-redirect" class="mt-4 text-center" style="display:none;">
                    <p style="margin-left:0%">Serás redirigido a la página de PayPal para completar el pago.</p>
                    <button class="btn btn-primary" onclick="redirigirPayPal()">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="../Views/src/js/shopping-cart.js"></script>
</body>
</html>

