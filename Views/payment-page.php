<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/main.css">
    <link rel="stylesheet" href="./src/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="./src/js/bootstrap.js"></script>
    <link rel="icon" href="./src/src/logo1.png" type="image/x-icon">
    <title>Pago</title>
</head>
<body>

  <?php include 'navbar.php';?>

      <div class="container-fluid bg-primary" style="margin-top:58px">
        

        <div class="row justify-content-center bg-light">
            

            <div class="col-lg-9 bg-light m-5 mb-1 p-4">

                <div class="text-center">
                    <h4>Seleccione un método de pago</h4>
                </div>

                <div class="row justify-content-center">


                <div class="justify-content-center d-flex">

                    <ul class="col-lg-6 list-group mx-4">
                        <li class="list-group-item">
                          <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="PaypalPM" id="PaypalPM" checked onclick="PaymentMethod()">
                          <label class="form-check-label" for="firstRadio"><span><i class="bi bi-paypal"></i></span>Paypal</label>
                        </li>
                        <li class="list-group-item">
                          <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="DebitPM" id="DebitPM" onclick="PaymentMethod()">
                          <label class="form-check-label" for="secondRadio"><span><i class="bi bi-credit-card-fill"></i></span> Tarjeta de débito</label>
                        </li>
                        <li class="list-group-item">
                          <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="CreditPM" id="CreditPM" onclick="PaymentMethod()">
                          <label class="form-check-label" for="thirdRadio"><span><i class="bi bi-credit-card-fill"></i></span> Tarjeta de crédito</label>
                        </li>

                      </ul>
                </div>

                <button class="btn btn-md btn-danger border mt-2 rounded-3" style="width: 10%;" data-bs-toggle="modal" data-bs-target="#cancel-notif">Cancelar</button>

                </div>
                

                <div class="d-flex justify-content-center px-5 py-3 bg-light">

                    <div class="row justify-content-center bg-light m-3 my-0 p-5" id="credit-debit-form" style="display:none">
                        <form action="#" method="post">
        
                            <div class="mb-3 my-0">
                                <label for="" class="form-label">Nombre</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1">
                              </div>
        
                              <div class="row justify-content-center">
        
                                <div class="col-lg-6">
                                    
                                <div class="mb-3">
                                    <label for="#" class="form-label">Apellido Paterno</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1">
                                  </div>
        
                                </div>
        
                                <div class="col-lg-6">
        
                                    <div class="mb-3">
                                        <label for="#" class="form-label">Apellido Materno</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1">
                                      </div>
                                  </div>
        
                                </div>
        
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
        
                                        <div class="mb-3">
                                            <label for="" class="form-label">Número de tarjeta</label>
                                            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="**** **** **** ****">
                                          </div>
                                        
                                    </div>
                                    <div class="col-lg-4">
        
                                        <div class="mb-3">
                                            <label for="" class="form-label">CVV*</label>
                                            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="***">
                                          </div>
        
                                    </div>
                                </div>
        
                                <div class="row justify-content-start">
        
                                    <div class="mb-3">
                                        <label for="" class="form-label">Expiración</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1">
                                      </div>
                                </div>
        
                                 
                              
                              <div class="mb-3">
                                <label for="#" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1">
                              </div>
        
        
                              <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary border shadow-sm">Continuar</button>
                              </div>
                              
                            
        
                        </form>
                    </div>

                    <div class="row justify-content-center bg-light m-3 my-0 p-5" id="paypal-redirect" style="display:none">
                    
                      <div class="mb-3">
                        
                        <h4>Serás redireccionado a la página de <span><i class="bi bi-paypal"></i></span> Paypal</h4>
                        <div class="btn-container d-flex justify-content-center">
                            <button class="btn btn-primary btn-md mt-2 border">Aceptar</button>
                        </div>
                       
                      </div>

                    </div>

                    

                </div>
            
            </div>

        </div>

      </div>

      <!--MODAL DE ADVERTENCIA, CIERRE DE VENTANA-->

      <div class="modal fade" id="cancel-notif" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cancel-notif-label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="cancel-notif-label">Solicitud de cancelación</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              ¿Está seguro de cancelar el procedimiento?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Volver</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="Redirect()">Confirmar</button>
              
            </div>
            <script>
              function Redirect(){
                window.location.href="./shopping-cart.php";
              }
            </script>
          </div>
        </div>
      </div>


    <script src="./src/js/payment-page.js"></script>
    
</body>
</html>