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
                    <select class="form-select" id="consult-type" aria-label="Default select example" onchange="ChangeFilters()">
                        <option selected>Ordenar</option>
                        <option value="1">Orden Ascendente</option>
                        <option value="2">Orden Descendente</option>
                      </select>
                </div>
    
                <div class="col-lg-2" id="box-hide">
                    <input class="form-control detailed-input" type="date" name="" id="">
                    <input class="form-control general-input" type="month" placeholder="Mes" style="display:none">
                </div>
    
                <div class="col-lg-2 detailed-input">
                    <input class="form-control" type="date" name="" id="">
                </div>
    
                <div class="col-lg-2">
                    <select class="form-select category-filter" aria-label="Default select example">
                        <option selected>Seleccione categoría</option>
                        <option value="1">Todas</option>
                        <option value="2">Jardinería</option>
                        <option value="3">Línea Blanca</option>
                        <option value="4">Zapatos</option>
                        <option value="5">Libros</option>
                        <option value="6">etc...</option>
                      </select>
                </div>
                
            </div>

            <div class="row justify-content-center my-2 mx-5" id="detailed-consult" style="display:flex">
                <div class="col-lg-10">
                    
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Resultado</th>
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
                          <tr>
      
                            <td>002</td>
                            <th scope="row">DD/MM/YYYY</th>
                            <td>
                              <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                            </td>
                            <td>Producto 2</td>
                            <td>$45.00</td>
                            <td>
                                <a href="./profile-seller.html">USERSELLER001</a>
                            </td>
                          </tr>
                          <tr>
    
    
                            <td>003</td>
                            <th scope="row">DD/MM/YYYY</th>
                            <td>
                              <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                            </td>
                            <td>Producto 3</td>
                            <td>$45.00</td>
                            <td>
                                <a href="./profile-seller.html">USERSELLER001</a>
                            </td>
                          </tr>
    
    
                          <td>004</td>
                            <th scope="row">DD/MM/YYYY</th>
                            <td>
                              <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                            </td>
                            <td>Producto 4</td>
                            <td>$45.00</td>
                            <td>
                                <a href="./profile-seller.html">USERSELLER001</a>
                            </td>
                          </tr>
    
    
                          <td>005</td>
                            <th scope="row">DD/MM/YYYY</th>
                            <td>
                              <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                            </td>
                            <td>Producto 5</td>
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
    
</body>
</html>