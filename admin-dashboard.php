<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ../index.php"); 
    exit();
}

$user_id = $_SESSION["user_id"];
$user_name = $_SESSION["user_name"];
$user_type = $_SESSION["user_type"];
$type_desc = $_SESSION["type_desc"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/main.css">
    <link rel="stylesheet" href="./src/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/css/messages.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="./src/js/bootstrap.js"></script>
    <link rel="icon" href="./src/src/logo1.png" type="image/x-icon">
    <title>Admin</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg mi-navbar fixed-top">
        <div style="background-color: #88aaa3;"class="container-fluid">
    
          <a class="navbar-brand" href="dashboard.html">
            <img class="icon-logo" src="./src/src/logo1.png">
            <span id="brand">D&B</span></a>
    
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="./profile.html" class="nav-link"><span><svg style="margin-bottom:2px" xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1
                   1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 
                   11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 
                   5.468 2.37A7 7 0 0 0 8 1"/>
                </svg></span> <?php echo htmlspecialchars($user_name);?> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./shopping-cart.html">
                  <span><svg style="margin-bottom:5px" xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 
                    .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5
                     8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01
                      3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1
                       0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0
                        0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 
                        1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                  </svg></i> Carrito</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./advanced-search.html"><span><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-tags-fill" viewBox="0 0 16 16">
                  <path d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 
                  1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 
                  4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 
                  6.586zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 
                  0 0 0 3"/>
                  <path d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1
                   1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 
                   0 0 0 1.414 0l.043-.043z"/>
                </svg></span> Categorías</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./lists.html"><span><svg style="margin-bottom:2px"xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 
                  .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 
                  0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 
                  1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3.854 2.146a.5.5 0 0 1 
                  0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 
                  3.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 
                  0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 
                  1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 
                  0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0"/>
                </svg></span> Listas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true" style="color:white">¿Deseas encontrar algo?</a>
              </li>
            </ul>
    
            <button type="button" class="rounded-pill btn btn-light px-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <span ><svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
              </svg></span> Buscar
            </button>
    
          </div>
        </div>
      </nav>
    
      <!--VENTANA MODAL DE BUSQUEDA-->
    
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content" style="background-color:#a7d6c4;">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel" style="color:#2c523d">¿Qué es lo que buscas?</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="./advanced-search.html" method="get">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><box-icon name='search-alt-2' rotate='90' color='#2c523d' ></box-icon></span>
                  <input type="text" class="form-control" placeholder="Escribe algo..." aria-label="search-bar" aria-describedby="basic-addon1">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid bg-white" style="margin-top:58px">
        <div class="row justify-content-center text-center">
            <h4 class="m-3 p-2"> <span><img class="m-1 p-1" src="./src/src/avatar.png" alt="admin-pic" style="height: 60px; border-radius: 50%;"></span> Bienvenido, <span style="text-decoration: underline;"><?php echo htmlspecialchars($user_name);?></span></h4>
        </div>
        <div class="row justify-content-center text-center border">
            <h5 class="m-2"><span><i class="bi bi-bell-fill"></i></span> Notificaciones <span><span class="badge text-bg-danger rounded-pill">1589</span></span></h5>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-3 bg-white" style="max-height: 70%;">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                          Productos y vendedores
                        </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="option d-flex justify-content-center">
                                <button class="bg-white border-0 m-1" type="button">Solicitudes por aprobar <span class="badge text-bg-danger rounded-pill">1579</span></button>
                            </div>

                            <div class="option d-flex justify-content-center">
                                <button class="bg-white border-0 m-1" type="button" onclick="MessageRedirect()">Mensajes <span class="badge text-bg-danger rounded-pill">10</span></button>
                            </div>
                            
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                          Administración
                        </button>
                      </h2>
                      <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">

                            <div class="option d-flex justify-content-center">
                                <button class="bg-white border-0 m-1" type="button" style="text-decoration: underline; color:#3B71CA;">Reportes</button>
                            </div>

                            <div class="option d-flex justify-content-center">
                                <button class="bg-white border-0 m-1" type="button" style="text-decoration: underline; color:#3B71CA;">Publicaciones</button>
                            </div>

                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                          Altas
                        </button>
                      </h2>
                      <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">

                            <div class="option d-flex justify-content-center">
                                <button class="bg-white border-0 m-1" type="button" style="text-decoration: underline; color:#3B71CA;">Administradores</button>
                            </div>
                            
                    
                            
                        </div>
                      </div>
                    </div>
                  </div>
                  
            </div>

            <div class="col-lg-9 bg-light border" id="approval-div" style="visibility:visible">

                <div class="row justify-content-center">
                    <div class="col-lg-11 bg-light d-flex justify-content-center">
        
                        <div class="input-group my-3 " style="max-width: 600px;">
                            <span class="input-group-text" id="basic-addon1">
                              <i class="bi bi-search"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar" aria-describedby="basic-addon1">
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
                    
                </div>


                <div class="row justify-content-center my-2 mx-5" id="for-approval" style="display:flex">
                    <div class="col-lg-10">
                        
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Folio</th>
                                <th scope="col">Fecha de solicitud</th>
                                <th scope="col" style="max-width: 200px;">Thumbnail</th>
                                <th scope="col">Nombre del producto</th>
                                <th scope="col">Vendedor</th>
                               
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
                              </tr>
                              <tr>
          
                                <td>002</td>
                                <th scope="row">DD/MM/YYYY</th>
                                <td>
                                  <button class="btn border-0" type="button"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail" data-bs-toggle="modal" data-bs-target="#preview-product"></button>
                                </td>
                                <td>Producto 2</td>
                                <td>
                                    <a href="./profile-seller.html">USERSELLER001</a>
                                </td>
                              </tr>
                              <tr>
        
        
                                <td>003</td>
                                <th scope="row">DD/MM/YYYY</th>
                                <td>
                                    <button class="btn border-0" type="button"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail" data-bs-toggle="modal" data-bs-target="#preview-product"></button>
                                </td>
                                <td>Producto 3</td>
                                <td>
                                    <a href="./profile-seller.html">USERSELLER001</a>
                                </td>
                              </tr>
        
        
                              <td>004</td>
                                <th scope="row">DD/MM/YYYY</th>
                                <td>
                                    <button class="btn border-0" type="button"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail" data-bs-toggle="modal" data-bs-target="#preview-product"></button>
                                <td>Producto 4</td>
                                <td>
                                    <a href="./profile-seller.html">USERSELLER001</a>
                                </td>
                              </tr>
        
        
                              <td>005</td>
                                <th scope="row">DD/MM/YYYY</th>
                                <td>
                                    <button class="btn border-0" type="button"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail" data-bs-toggle="modal" data-bs-target="#preview-product"></button>
                                </td>
                                <td>Producto 5</td>
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






        </div>
      </div>


      <div class="modal fade" id="preview-product" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="preview-product-label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="preview-product-label">PREVIEW DEL PRODUCTO</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <div class="col-lg-12" id="edit-post" style="display:flex">
                <form action="#" method="post">

                    <div class="mb-3">
                        <label for="product-name" class="form-label">Nombre del producto</label>
                        <input type="text" class="form-control" id="product-name" placeholder="ASUS TUF F15" disabled>
                      </div>

                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ej: AMD RYZEN 7, 16GB DDR4, RTX 3060" disabled></textarea>
                      </div>

                      <div class="row justify-content-center">

                        <label for="form-check" class="form-label">¿Cotizable?</label>
                          <div class="form-check form-switch d-flex justify-content-center">
                            
                            <input class="form-check-input p-2 border" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked disabled>
                            <label class="form-check-label ms-2" for="flexSwitchCheckDefault">Cotizable</label>
                          </div>

                          <div class="mb-3">
                            <label for="product-price" class="form-label">Precio del producto</label>
                            <input type="text" class="form-control" id="product-price" placeholder="$1299.00" disabled>
                          </div>

                          <div class="mb-3">
                            <label for="product-stock" class="form-label">Piezas disponibles</label>
                            <input type="text" class="form-control" id="product-stock" placeholder="167 piezas" disabled>
                          </div>

                          <div class="mb-3">
                            <label for="list-group" class="form-label">Métodos de pago aceptados</label>
                            <ul class="list-group">
                              <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" id="firstCheckbox" checked disabled>
                                <label class="form-check-label" for="firstCheckbox"><span><i class="bi bi-paypal"></i></span> Paypal</label>
                              </li>
                              <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" id="secondCheckbox" checked disabled>
                                <label class="form-check-label" for="secondCheckbox"><span><i class="bi bi-credit-card-fill"></i></span> Tarjetas de crédito</label>
                              </li>
                              <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" id="secondCheckbox" disabled>
                                <label class="form-check-label" for="secondCheckbox"><span><i class="bi bi-credit-card-fill"></i></span> Tarjetas de débito</label>
                              </li>
                              <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" id="thirdCheckbox" checked disabled>
                                <label class="form-check-label" for="thirdCheckbox"><span><i class="bi bi-arrow-down-up"></i></span> Transferencia electrónica</label>
                              </li>
                              <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" id="thirdCheckbox" disabled>
                                <label class="form-check-label" for="thirdCheckbox"><span><i class="bi bi-coin"></i></span> Depósitos</label>
                              </li>
                              
                            </ul>
                          </div>



                      
                      </div>
                    
                      <div class="row justify-content-center p-2">
                        <div class="col-lg-3">
                          <img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail">
                        </div>
                        <div class="col-lg-9">
                          <label for="thumbnail-upload" class="form-label">Miniatura</label>
                          <input type="text" name="" id="thumbnail-url" class="form-control" placeholder="img.png" disabled>
                        </div>
                      </div>

                      <div class="row justify-content-center p-2">

                        <div class="mb-3">
                          <label for="formFileMultiple" class="form-label">Preview de las imágenes</label>
                          <input class="form-control" type="text" id="product-files" placeholder="img1.png, img2.png, kaskfkas.png, img4.png" disabled>
                        </div>

                        <div class="col-lg-3 col-sm-3">
                          <img src="./src/src/img-placeholder.png" alt="image1" class="img-thumbnail p-picture1">
                        </div>

                        <div class="col-lg-3 col-sm-3">
                          <img src="./src/src/img-placeholder.png" alt="image1" class="img-thumbnail p-picture1">
                        </div>

                        <div class="col-lg-3 col-sm-3">
                          <img src="./src/src/img-placeholder.png" alt="image1" class="img-thumbnail p-picture1">
                        </div>

                        <div class="col-lg-3 col-sm-3">
                          <img src="./src/src/img-placeholder.png" alt="image1" class="img-thumbnail p-picture1">
                        </div>

                      </div>

                      <div class="mb-3">
                        <label for="product-video" class="form-label"><span><i class="bi bi-link-45deg"></i></span> Enlace de vídeo</label>
                        <input type="text" class="form-control" id="product-video" placeholder="Ej: https://youtu.be/aS29938SK" disabled>
                      </div>

                      <div class="mb-3">
                        <label for="category-select" class="form-label">Categoría seleccionada</label>
                        <select class="form-select" id="category-select" aria-label="Default select example" disabled>
                          <option disabled>Categoría</option>
                          <option selected>Categoria 1</option>
                          <option value="2">Categoría 2</option>
                          <option value="3">Ninguna de las anteriores</option>
                        </select>
                      </div>

                      
                </form>
            </div>

              
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Volver</button>
              <button type="button" class="btn btn-success">Aprobar</button>
            </div>
          </div>
        </div>
      </div>

      <!--MODAL DE REGISTRO DE NUEVOS ADMINISTRADORES-->

      



    <script src="./src/js/admin-dashboard.js"></script>
</body>
</html>