<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Views/src/css/main.css">
    <link rel="stylesheet" href="../Views/src/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="../Views/src/js/bootstrap.js"></script>
    <link rel="icon" href="../Views/src/src/logo1.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <title>Publicar</title>
</head>
<body>

  <?php include 'navbar.php';?>

          <div class="container-fluid" style="margin-top:58px">
            
            <div class="row justify-content-center">

                <div class="col-lg-8 bg-light border border-rounded rounded-3 mt-4">
                    <h2 class="text-center mt-3 p-5" style="margin-left:0;">Publicar nuevo artículo</h2>

                    <div class="row justify-content-center">

                        <div class="col-lg-5 mb-3">
                          <div class="row justify-content-center">

                              <div class="col-lg-12">
                                <h5 class="p-2 mt-3 ms-4">Estimado colaborador, para la corrrecta presentación de tu artículo, te pedimos cumplas los siguientes requisitos.</h5>
                                  <ul class="list-group border mt-2">
                                      <li class="list-group-item border-0">
                                        <input class="form-check-input me-1" type="checkbox" value="" id="filter1" disabled>
                                        <label class="form-check-label" for="firstCheckbox">Tu producto debe tener un nombre y una descripción</label>
                                      </li>
                                      <li class="list-group-item border-0">
                                        <input class="form-check-input me-1" type="checkbox" value="" id="filter2" disabled>
                                        <label class="form-check-label" for="secondCheckbox">Debe tener una miniatura</label>
                                      </li>
                                      <li class="list-group-item border-0">
                                        <input class="form-check-input me-1" type="checkbox" value="" id="filter3" disabled>
                                        <label class="form-check-label" for="thirdCheckbox">Debe tener un precio, o ser etiquetado como cotizable</label>
                                      </li>
                                      <li class="list-group-item border-0">
                                        <input class="form-check-input me-1" type="checkbox" value="" id="filter4" disabled>
                                        <label class="form-check-label" for="forthCheckbox">Debe tener al menos 3 imágenes</label>
                                      </li>
                                      <li class="list-group-item border-0">
                                        <input class="form-check-input me-1" type="checkbox" value="" id="filter5" disabled>
                                        <label class="form-check-label" for="fifthCheckbox">Debe tener al menos 1 vídeo</label>
                                      </li>
                                      <li class="list-group-item border-0">
                                        <input class="form-check-input me-1" type="checkbox" value="" id="filter6" disabled>
                                        <label class="form-check-label" for="sixthCheckbox">Debes seleccionar los métodos de pago (<span style="text-decoration: underline;">PayPal obligatorio</span>)</label>
                                      </li>
                                      <li class="list-group-item border-0">
                                        <input class="form-check-input me-1" type="checkbox" value="" id="filter7" disabled>
                                        <label class="form-check-label" for="seventhCheckbox">Debes seleccionar/crear una categoría</label>
                                      </li>
                                      
                                    </ul>
                              </div>
                          </div>
                      </div>




                        <div class="col-lg-6 mx-4">
    <form action="../Controllers/ProductosController.php?action=publicar" method="POST" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <label for="product-name" class="form-label">Nombre del producto</label>
                                    
                                    <input type="text" class="form-control border focus-ring" id="product-name" name="product-name" placeholder="Ej: Lavadora" required oninput="checkName()">
                                  </div>

                                  <div class="mb-3">
                                    <label for="product-desc" class="form-label">Descripción</label>
                                    <textarea class="form-control border focus-ring" id="product-desc" name="product-desc" rows="3" placeholder="Ej: Pet-friendly" required oninput="checkDesc()"></textarea>
                                  </div>

                                  <div class="row justify-content-center">
           
                                    <label for="form-check" class="form-label">Si es cotizable, activa el campo:</label>
                                      <div class="form-check form-switch d-flex justify-content-center">
                                        
                                        <input class="form-check-input p-2 border" type="checkbox" role="switch" id="quotable">
                                        <label class="form-check-label ms-2" for="quotable">Cotizable</label>
                                      </div>

                                      <div class="mb-3">
                                        <label for="product-price" class="form-label">Precio del producto</label>
                                        <input type="text" class="form-control focus-ring border" id="product-price" name="product-price" placeholder="$00.00" disabled oninput="checkPrice()">
                                      </div>

                                      <div class="mb-3">
                                        <label for="product-stock" class="form-label">Piezas disponibles</label>
                                        <input type="text" class="form-control focus-ring border" id="product-stock" name="product-stock" placeholder="# piezas" oninput="checkStock()">
                                      </div>

                                      <div class="mb-3">
                                        <label for="list-group" class="form-label">Métodos de pago aceptados</label>
                                        <ul class="list-group">
                                          <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" value="PayPal" id="paypalCheckbox" name="payment_methods[]" checked disabled>
                                            <label class="form-check-label" for="paypalCheckbox"><span><i class="bi bi-paypal"></i></span> Paypal</label>
                                          </li>
                                          <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" value="Tarjeta Crédito" id="creditCheckbox" name="payment_methods[]">
                                            <label class="form-check-label" for="creditCheckbox"><span><i class="bi bi-credit-card-fill"></i></span> Tarjetas de crédito</label>
                                          </li>
                                          <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" value="Tarjeta Débito" id="debitCheckbox" name="payment_methods[]">
                                            <label class="form-check-label" for="debitCheckbox"><span><i class="bi bi-credit-card-fill"></i></span> Tarjetas de débito</label>
                                          </li>
                                          <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" value="Transferencia" id="transferCheckbox" name="payment_methods[]">
                                            <label class="form-check-label" for="transferCheckbox"><span><i class="bi bi-arrow-down-up"></i></span> Transferencia electrónica</label>
                                          </li>
                                          <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" value="Depósito" id="depositCheckbox" name="payment_methods[]">
                                            <label class="form-check-label" for="depositCheckbox"><span><i class="bi bi-coin"></i></span> Depósitos</label>
                                          </li>
                                          
                                        </ul>
                                      </div>



                                   
                                  </div>
                                
                                  <div class="row justify-content-center p-2">
                                    <div class="col-lg-3">
                                      <img src="../Views/src/src/img-placeholder.png" alt="" class="img-thumbnail" id="tmb-preview">
                                    </div>
                                    <div class="col-lg-9">
                                      <label for="thumbnail-upload" class="form-label">Miniatura</label>
                                      <input type="file" name="thumbnail-upload" id="thumbnail-upload" class="form-control">
                                    </div>
                                  </div>

                                  <div class="row justify-content-center p-2">

                                    <div class="mb-3">
                                      <label for="multiple-pic-input" class="form-label">Seleccione las imágenes</label>
                                      <input class="form-control" type="file" id="multiple-pic-input" name="multiple-pic-input[]" multiple accept="image/*">
                                    </div>

                                    <div class="col-lg-3 col-sm-3">
                                      <img src="../Views/src/src/img-placeholder.png" alt="image1" class="img-thumbnail p-picture1" id="preview1">
                                    </div>

                                    <div class="col-lg-3 col-sm-3">
                                      <img src="../Views/src/src/img-placeholder.png" alt="image1" class="img-thumbnail p-picture1" id="preview2">
                                    </div>

                                    <div class="col-lg-3 col-sm-3">
                                      <img src="../Views/src/src/img-placeholder.png" alt="image1" class="img-thumbnail p-picture1" id="preview3">
                                    </div>

                                    <div class="col-lg-3 col-sm-3">
                                      <img src="../Views/src/src/img-placeholder.png" alt="image1" class="img-thumbnail p-picture1" id="preview4">
                                    </div>

                                  </div>

                                  <div class="mb-3">
                                    <label for="product-video" class="form-label"><span><i class="bi bi-link-45deg"></i></span> Enlace de vídeo</label>
                                    <input type="text" class="form-control focus-ring border" id="product-video" name="product-video" placeholder="Ej: https://youtu.be/..." oninput="checkURL()">
                                  </div>

                                  <div class="mb-3">
                                    <label for="category-select" class="form-label">Selecciona una categoría</label>
                                    <select class="form-select" id="category-select" name="category-select" aria-label="Default select example">
                                      <option selected disabled>Categoría</option>
                                      <?php 
                                      if(isset($cat) && !empty($cat)){
                                      foreach ($cat as $categoria): ?>
                                      <option value="<?php echo $categoria['cat_ID']; ?>">
                                      <?php echo htmlspecialchars($categoria['cat_name']); ?>
                                      </option>
                                      <?php endforeach; ?>
                                      <?php }else{?>
                                      <option value="0">No encontré nada jasjja</option>
                                      
                                      <?php }?>
                                    </select>

                                    
                                  </div>

                                  <div class="mb-3">
                                    
                                    <label for="trigger-cat-creator" class="form-label">¿Ninguna categoría encaja?</label>
                                    <button type="button" class="btn btn-md bg-light shadow-sm ms-1 border" data-bs-toggle="modal" data-bs-target="#newCategory">Crear nueva categoría</button>
                                  </div>
                                        </div>

                                    </div>

                                    <div class="row justify-content-center text-center p-2 border">
                                      <h5 class="mt-2">Tu publicación será verificada por un administrador antes de ser publicada en el sitio.</h5>
                                      <div class="col-lg-6 d-flex justify-content-center">
                                        <button class="btn btn-primary shadow-sm mb-5 border mt-2" id="register-product" data-bs-toggle="modal" data-bs-target="#save-notif">
                                          Guardar publicación
                                        </button>
                                      </div>
                                    </div>
    </form>



                      <!--MODAL DE NOTIFICACION-->
                    <div class="modal fade" id="save-notif" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="save-notif-label" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="save-notif-label">¡Cambios guardados!</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Tu publicación ha sido asignada a un administrador para su revisión y aprobación.
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="Redirect()">OK</button>
                          </div>
                          <script>
                            function Redirect(){
                              window.location.href="./profile-seller.php";
                            }
                          </script>
                        </div>
                      </div>
                    </div>

                </div>
            </div>
          </div>

                   <!--MODAL PARA CREAR NUEVAS CATEGORÍAS-->

                   <div class="modal fade" id="newCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newCategoryLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="newCategoryLabel">Crear nueva categoría</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row justify-content-center p-3 m-2">
  
                            <div class="col-12 justify-content-center">
  
                              <div class="row">
                                <div class="col-11 ms-2">
                                 
                                </div>
  
                                <div class="col-11 mb-3">
                                  <form action="#" method="post" class="create-list ms-4">
  
                                    <div class="mb-3 pt-2 pb-2">
                                      <label for="Catname" class="form-label">Nombre de la categoría</label>
                                      <input type="text" class="form-control" id="Catname" placeholder="Ej:'Electrónica'">
                                    </div>
                                    <div class="mb-3">
                                      <label for="CatDesc" class="form-label">Descripcion</label>
                                      <textarea class="form-control" id="CatDesc" rows="3" placeholder="Ej:'Productos tecnológicos'"></textarea>
                                    </div>

                                  </form>
                                 
                                </div>
                              </div>
                              
                            </div>
  
                            
  
  
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cerrar</button>
                          <button type="button" class="btn btn-success border">Guardar</button>
                        </div>
                      </div>
                    </div>
                  </div>

    <script src="../Views/src/js/publish-product.js"></script>

</body>
</html>