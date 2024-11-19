<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Views/src/css/main.css">
    <link rel="stylesheet" href="../Views/src/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Views/src/css/consult-client.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="../Views/src/js/bootstrap.js"></script>
    <link rel="icon" href="../Views/src/src/logo1.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <title>Consultar compras</title>
</head>
<body>

    <?php include 'navbar.php';?>
    

          <div class="container-fluid" style="margin-top:58px">

            <div class="row justify-content-center">
                <div class="col-lg-11 bg-light d-flex justify-content-center">
    
                    <div class="input-group my-3 " style="max-width: 600px;">
                        <span class="input-group-text" id="basic-addon1">
                          <i class="bi bi-search"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Ingresa una fecha, vendedor o categoría..." aria-label="Buscar" aria-describedby="basic-addon1">
                      </div>
    
                </div>
            </div>

            <div class="row justify-content-center mt-2">

                <div class="col-lg-2">
                    <select class="form-select" id="consult-type" aria-label="Default select example">
                        <option selected>Ordenar</option>
                        <option value="1">Orden Ascendente</option>
                        <option value="2">Orden Descendente</option>
                      </select>
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

            <div class="row justify-content-center my-2 mx-5" id="detailed-consult" style="display:flex">
                <div class="col-lg-10">
                    
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Resultado</th>
                            <th scope="col">Acciones</th>
                            <th scope="col">Fecha de compra</th>
                            <th scope="col" style="max-width: 200px;">Thumbnail</th>
                            <th scope="col">Nombre del producto</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Vendedor</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                      <tr>
      
                      
                        
                      <td>001</td>

                        <td><button class="btn btn-primary btn-sm" data-bs-toggle="modal" 
                                  data-bs-target="#rateProductModal" 
                                  onclick="openRatingModal(this)" 
                                  data-product-id="001" 
                                  data-product-name="Producto 1">
                              Calificar/Estado
                          </button>
                      </td>
                            
                     <th scope="row">DD/MM/YYYY</th>
                     <td>
                       <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                     </td>
                     <td>Producto 1</td>
                     <td>$45.00</td>
                     <td>
                         <a href="./profile-seller.html">USERSELLER001</a>
                     </td>
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

          </div>

          <div class="modal fade" id="rateProductModal" tabindex="-1" aria-labelledby="rateProductLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rateProductLabel">Calificar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="rating-form">
                    <input type="hidden" id="modal-product-id" name="product-id">

                    <div class="mb-3">
                        <label for="modal-product-name" class="form-label">Producto</label>
                        <input type="text" class="form-control" id="modal-product-name" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="product-rating" class="form-label">Calificación</label>
                        <select class="form-select" id="product-rating" name="rating">
                            <option value="5">5 - Excelente</option>
                            <option value="4">4 - Bueno</option>
                            <option value="3">3 - Regular</option>
                            <option value="2">2 - Malo</option>
                            <option value="1">1 - Muy Malo</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="product-comment" class="form-label">Comentario</label>
                        <textarea class="form-control" id="product-comment" name="comment" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="product-status" class="form-label">Estado</label>
                        <select class="form-select" id="product-status" name="status">
                            <option value="received">Recibido</option>
                            <option value="pending">Pendiente</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="submitRating()">Guardar</button>
            </div>
        </div>
    </div>
</div>
    
<script src="../Views/src/js/consult-client.js"></script>
</body>
</html>