<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/main.css">
    <link rel="stylesheet" href="./src/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/css/messages.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="./src/js/bootstrap.js"></script>
    <link rel="icon" href="./src/src/logo1.png" type="image/x-icon">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <title>Admin</title>
</head>
<body>

 <?php include 'navbar.php';?>

      <div class="container-fluid bg-white" style="margin-top:58px">
        <div class="row justify-content-center text-center">
            <h4 class="m-3 p-2"> <span><img class="m-1 p-1" src="<?php echo htmlspecialchars($user_pic)?>" alt="admin-pic" style="height: 60px; border-radius: 50%;"></span> Bienvenido, <span style="text-decoration: underline;"><?php echo htmlspecialchars($user_name);?></span></h4>
        </div>
        <div class="row justify-content-center text-center border">
            <h5 class="m-2"><span><i class="bi bi-bell-fill"></i></span> Notificaciones <span><span class="badge text-bg-danger rounded-pill">1589</span></span></h5>
        </div>

        <div class="row justify-content-center">
         

            <div class="col-lg-9 bg-light border" id="approval-div" style="visibility:visible">

                <div class="row justify-content-center my-2 mx-5" id="for-approval" style="display:flex">
                    <div class="col-lg-10">

               
                        
                        <table class="table" id="approval-table">
                            <thead>
                              <tr>
                                <th scope="col">Folio</th>
                                <th scope="col">Fecha de solicitud</th>
                                <th scope="col" style="max-width: 200px;">Nombre del producto</th>
                                <th scope="col">Vendedor</th>
                                <th scope="col">Thumbnail</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Preview</th>
                               
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
          
                                
                                <td>001</td>
                                <th scope="row">DD/MM/YYYY</th>
                                <td>
                                    <button class="btn border-0" type="button"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail" data-bs-toggle="modal" data-bs-target="#preview-product"></button>
                                </td>
                                <td>Producto 1</td>
                                <td>
                                    <a href="#">USERSELLER001</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary border-0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                      <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                      <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                    </svg></button>
                                </td>
                              </tr>
                              <tr>
          
                             
                              
                            </tbody>
                          </table>
        
                          <div class="row justify-content-center">
        
                            <div class="col-lg-6 pt-3 d-flex justify-content-center mb-5">
        
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                      <li class="page-item disabled">
                                        <a class="page-link">Previous</a>
                                      </li>
                                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                                      <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                      </li>
                                    </ul>
                                  </nav>
        
        
                            </div>
        
                            
        
                          </div>
        
        
        
                    </div>
                </div>
                
            </div>






        </div>
      </div>


      <div class="modal fade" id="product-preview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="edit-disp-label" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="edit-disp-label">Vista previa de la publicación</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                      <div class="col-lg-12" id="edit-post">
                        <form id="edit-product-form">

                        
                        <input type="hidden" name="product-id" id="product-id">


                            <div class="mb-3">
                                <label for="product-name" class="form-label">Nombre del producto</label>
                                <input type="text" class="form-control" id="product-name" name="product-name" placeholder="Ej: Lavadora" disabled>
                              </div>

                              <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                                <textarea class="form-control" id="product-desc" name="product-desc" rows="3" placeholder="Ej: Pet-friendly" disabled></textarea>
                              </div>

                              <div class="row justify-content-center">

                                <label for="form-check" class="form-label">Si es cotizable, activa el campo:</label>
                                  <div class="form-check form-switch d-flex justify-content-center">
                                    
                                    <input class="form-check-input p-2 border" type="checkbox" role="switch" id="quotable" name="quotable" disabled>
                                    <label class="form-check-label ms-2" for="flexSwitchCheckDefault">Cotizable</label>
                                  </div>

                                  <div class="mb-3">
                                    <label for="product-price" class="form-label">Precio del producto</label>
                                    <input type="text" class="form-control" id="product-price" name="product-price" placeholder="$00.00" disabled>
                                  </div>

                                  <div class="mb-3">
                                    <label for="product-stock" class="form-label">Piezas disponibles</label>
                                    <input type="text" class="form-control" id="product-stock" name="product-stock" placeholder="# piezas" disabled>
                                  </div>

                                  <div class="mb-3">
                                    <label for="list-group" class="form-label">Métodos de pago aceptados</label>
                                    <ul class="list-group">
                                    <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" value="PayPal" id="paypalCheckbox" name="payment_methods[]" checked disabled>
                                            <label class="form-check-label" for="paypalCheckbox"><span><i class="bi bi-paypal"></i></span> Paypal</label>
                                          </li>
                                          <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" value="Tarjeta Crédito" id="creditCheckbox" name="payment_methods[]" disabled>
                                            <label class="form-check-label" for="creditCheckbox"><span><i class="bi bi-credit-card-fill"></i></span> Tarjetas de crédito</label>
                                          </li>
                                          <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" value="Tarjeta Débito" id="debitCheckbox" name="payment_methods[]" disabled>
                                            <label class="form-check-label" for="debitCheckbox"><span><i class="bi bi-credit-card-fill"></i></span> Tarjetas de débito</label>
                                          </li>
                                          <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" value="Transferencia" id="transferCheckbox" name="payment_methods[]" disabled>
                                            <label class="form-check-label" for="transferCheckbox"><span><i class="bi bi-arrow-down-up"></i></span> Transferencia electrónica</label>
                                          </li>
                                          <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" value="Depósito" id="depositCheckbox" name="payment_methods[]" disabled>
                                            <label class="form-check-label" for="depositCheckbox"><span><i class="bi bi-coin"></i></span> Depósitos</label>
                                          </li>
                                      
                                    </ul>
                                  </div>



                              
                              </div>
                            
                              <div class="row justify-content-center p-2">
                                <div class="col-lg-3">
                                  <img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail" id="img-thumb">
                                </div>
                                <div class="col-lg-9">
                                  <label for="thumbnail-upload" class="form-label">Miniatura</label>
                                </div>
                              </div>

                              <div class="row justify-content-center p-2">

                              <div class="mb-3">
                                     
                                     
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
                                <input type="text" class="form-control" id="product-video" name="product-video" placeholder="Ej: https://youtu.be/..." readonly>
                              </div>

                              <div class="mb-3">
                                    <label for="category-select" class="form-label">Categoría del producto</label>
                                    <div class="row justify-content-center">
                                      <div class="col-lg-10">
                                        <select class="form-select select2 cat" id="category-select" name="category-select" aria-label="Default select example">
                                          
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

                                        <script>
                                            $(document).ready(function() {
                                                $('.cat').select2();
                                            });
                                        </script>
                                      </div>
                              
                                    </div>
                                

                                    
                                  </div>

                          <div class="row justify-content-center">
                            <div class="col-auto justify-content-center">
                              <button class="btn btn-md btn-primary border shadow-sm"type="submit" onclick="sendProductID()">Aprobar publicación</button>
                            </div>
                          </div>
                         
                        </form>
                    </div>

                    


                      
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancelar</button>
                      <!--button type="button" class="btn btn-primary" onclick="editarProducto()">Guardar</button-->
                    </div>
                  </div>
                </div>
              </div>

      <!--MODAL DE REGISTRO DE NUEVOS ADMINISTRADORES-->

      



    <script src="./src/js/admin-dashboard.js"></script>
</body>
</html>