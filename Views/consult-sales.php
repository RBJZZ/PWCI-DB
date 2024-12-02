<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Views/src/css/main.css">
    <link rel="stylesheet" href="../Views/src/css/consult-sales.css">
    <link rel="stylesheet" href="../Views/src/css/bootstrap.min.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="../Views/src/js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" href="./src/src/logo1.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" />
    <script src="vendor/select2/dist/js/select2.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <title>Consultar ventas</title>

</head>
<body>

  <?php include 'navbar.php';?>

      <div class="container-fluid" style="margin-top:58px">

        <div class="row justify-content-center">
            <div class="col-lg-11 bg-light d-flex justify-content-center">

                <div class="input-group my-3 d-none" style="max-width: 600px;">
                    <span class="input-group-text" id="basic-addon1">
                      <i class="bi bi-search"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar" aria-describedby="basic-addon1">
                  </div>

            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-lg-2">
                <select class="form-select" id="consult-type" aria-label="Tipo de consulta" onchange="ChangeFilters()">
                    <option selected disabled value="">Tipo de consulta</option>
                    <option value="1">Detallada</option>
                    <option value="2">General</option>
                    <option value="3">Edición de stock</option>
                </select>
            </div>

            <div class="col-lg-2" id="box-hide">
                <input class="form-control detailed-input" type="date" id="fecha-inicio">
                <input class="form-control general-input d-none" type="month" id="mes-general">
            </div>

            <div class="col-lg-2 detailed-input">
                <input class="form-control" type="date" id="fecha-fin">
            </div>

            <div class="col-lg-2">
                <select class="form-select category-filter" id="category-filter" aria-label="Filtro por categoría">
                  <option value="">Todo</option>
                    <?php 
                    if(isset($cat) && !empty($cat)){
                        foreach ($cat as $categoria): ?>
                        <option value="<?php echo $categoria['cat_ID']; ?>">
                            <?php echo htmlspecialchars($categoria['cat_name']); ?>
                        </option>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        <option value="0">No encontré nada</option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="row justify-content-center my-2 mx-5" >
          <button class="btn btn-light btn-md border shadow-sm" type="submit" style="width:200px;" id="consult-button">Consultar</button>
        </div>

        <div class="row justify-content-center my-2 mx-5 d-none" id="detailed-consult">
      <div class="col-lg-10">
          <table class="table">
              <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Fecha de venta</th>
                      <th scope="col" style="max-width: 200px;">Thumbnail</th>
                      <th scope="col">Nombre del producto</th>
                      <th scope="col">Categoría</th>
                      <th scope="col">Rating</th>
                      <th scope="col">Precio</th>
                      <th scope="col">Disponibles</th>
                  </tr>
              </thead>
              <tbody>
                 
                  
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

        <div class="row justify-content-center my-2 mx-5 d-none" id="general-consult">
            <div class="col-lg-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Mes</th>
                            <th scope="col">Año</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Total de Ventas</th>
                        </tr>
                    </thead>
                    <tbody id="general-results">
                        
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



        <div class="row justify-content-center my-2 mx-5 d-none" id="disponibility-consult">

          <div class="col-lg-10">


            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Editar</th>
                  <th scope="col">Eliminar</th>
                  <th scope="col">Publicado</th>
                  <th scope="col" style="max-width: 200px;">Thumbnail</th>
                  <th scope="col">Nombre del producto</th>
                  <th scope="col">Categoría</th>
                  <th scope="col">Disponibles</th>
                </tr>
              </thead>
              <tbody id="disponibility-consult">
                <tr>

                  
                  <td><button class="btn" data-bs-toggle="modal" data-bs-target="#edit-disp"><span><i class="bi bi-pencil-square"></i></span></button></td>
                  <th scope="row">DD/MM/YYYY</th>
                  <td>
                    <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                  </td>
                  <td>Producto 1</td>
                  <td>Categoría</td>
                  <td>10</td>
                </tr>
                <tr>

                  <td><button class="btn" data-bs-toggle="modal" data-bs-target="#edit-disp"><span><i class="bi bi-pencil-square"></i></span></button></td>
                  <th scope="row">DD/MM/YYYY</th>
                  <td>
                    <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                  </td>
                  <td>Producto 2</td>
                  <td>Categoría</td>
                  <td>122</td>
                </tr>
                <tr>


                  <td><button class="btn" data-bs-toggle="modal" data-bs-target="#edit-disp"><span><i class="bi bi-pencil-square"></i></span></button></td>
                  <th scope="row">DD/MM/YYYY</th>
                  <td>
                    <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                  </td>
                  <td>Producto 3</td>
                  <td>Categoría</td>
                  <td>14</td>
                </tr>


                <td><button class="btn" data-bs-toggle="modal" data-bs-target="#edit-disp"><span><i class="bi bi-pencil-square"></i></span></button></td>
                  <th scope="row">DD/MM/YYYY</th>
                  <td>
                    <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                  </td>
                  <td>Producto 4</td>
                  <td>Categoría</td>
                  <td>67</td>
                </tr>


                <td><button class="btn" data-bs-toggle="modal" data-bs-target="#edit-disp"><span><i class="bi bi-pencil-square"></i></span></button></td>
                  <th scope="row">DD/MM/YYYY</th>
                  <td>
                    <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                  </td>
                  <td>Producto 5</td>
                  <td>Categoría</td>
                  <td>45</td>
                </tr>
                
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

        <div class="row justify-content-center my-2 mx-5" id="noresults">

          <div class="col-lg-10 text-center mt-4">

              <h3><span><i class="bi bi-heartbreak-fill" style="color:red"></i></span> No se encontraron resultados</h3>

          </div>

        </div>

          
      </div>


              <div class="modal fade" id="edit-disp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="edit-disp-label" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="edit-disp-label">Edición</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <div class="mb-3 d-flex justify-content-center">
                        <button class="btn bg-primary text-white border shadow-sm"  id="toggle-edit" onclick="ToggleDivs()">Editar disponibilidad</button>
                      </div>

                      <div class="col-lg-12 d-none" id="edit-post">
                        <form id="edit-product-form">

                        <input type="hidden" id="product-id" name="product-id" value="">


                            <div class="mb-3">
                                <label for="product-name" class="form-label">Nombre del producto</label>
                                <input type="text" class="form-control" id="product-name" name="product-name" placeholder="Ej: Lavadora">
                              </div>

                              <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                                <textarea class="form-control" id="product-desc" name="product-desc" rows="3" placeholder="Ej: Pet-friendly"></textarea>
                              </div>

                              <div class="row justify-content-center">

                                <label for="form-check" class="form-label">Si es cotizable, activa el campo:</label>
                                  <div class="form-check form-switch d-flex justify-content-center">
                                    
                                    <input class="form-check-input p-2 border" type="checkbox" role="switch" id="quotable" name="quotable">
                                    <label class="form-check-label ms-2" for="flexSwitchCheckDefault">Cotizable</label>
                                  </div>

                                  <div class="mb-3">
                                    <label for="product-price" class="form-label">Precio del producto</label>
                                    <input type="text" class="form-control" id="product-price" name="product-price" placeholder="$00.00" disabled>
                                  </div>

                                  <div class="mb-3">
                                    <label for="product-stock" class="form-label">Piezas disponibles</label>
                                    <input type="text" class="form-control" id="product-stock" name="product-stock" placeholder="# piezas">
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
                                  <img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail" id="img-thumb">
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
                                <input type="text" class="form-control" id="product-video" name="product-video" placeholder="Ej: https://youtu.be/...">
                              </div>

                              <div class="mb-3">
                                    <label for="category-select" class="form-label">Selecciona una categoría</label>
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
                              <button class="btn btn-md btn-primary border shadow-sm"type="submit" onclick="editarProducto()">Guardar cambios</button>
                            </div>
                          </div>
                         
                        </form>
                    </div>

                    <div class="row justify-content-center" id="edit-stock">
                      <div class="col-lg-10">

                        <form action="#" method="post">

                          <div class="mb-3">
                            <label for="product-stock-solo" class="form-label">Ingrese la disponibilidad</label>
                            <input type="text" class="form-control" id="product-stock-solo" value="10">
                          </div>

                        </form>

                        
                        

                      </div>
                    </div>


                      
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancelar</button>
                      <!--button type="button" class="btn btn-primary" onclick="editarProducto()">Guardar</button-->
                    </div>
                  </div>
                </div>
              </div>


      <script src="../Views/src/js/consult-sales.js"></script>
    
</body>
</html>