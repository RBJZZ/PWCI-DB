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
    <title>Vendedor</title>
</head>
<body>

     <!--BARRA DE NAVEGACIÓN-->
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
                </svg></span> Usuario</a>
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

      <!--FINAL DE VENTANA MODAL-->
    
      <div class="container-fluid " style="margin-top: 58px;">

        <div class="row justify-content-center p-3 mt-5">
            <div class="col-lg-3 col-sm-10 bg-light d-flex justify-content-center p-2">
                <img src="./src/src/avatar.png" alt="seller profile picture" class="rounded-5" style="width: 200px;">
            </div>
            <div class="col-lg-9 col-sm-10 bg-light border border-rounded rounded-3">
                <div class="row justify-content-center">

                    <h1 class="ms-5 mt-3"><span><i class="bi bi-patch-check-fill" style="color:blue"></i></span> USERSELLER001</h1>
                    <h4 class="ms-5 mb-2">@usereseller_001</h4>
                    <div class="col-lg-4 pt-2 border text-center">
                        <h3><span><i class="bi bi-bag-check"></i></span> Articulos publicados: 192</h3>
                    </div>
                    <div class="col-lg-4 pt-2 border text-center">
                        <h3><span><i class="bi bi-award"></i></span> Preferencia: 98%</h3>
                    </div>
                    <div class="col-lg-4 pt-2 border text-center">
                        <h3><span><i class="bi bi-calendar-date"></i></span> Se unió en 08/05/19</h3>
                    </div>

                </div>

                <div class="row justify-content-center text-center pt-3 pb-2">
                    <h5>"Descripcion del vendedor"</h5>
                </div>




            </div>
            <hr class="mt-2">
        </div>
        <!--SECCION DE OPCIONES PARA EL VENDEDOR-->
        <div class="row justify-content-center px-3">
            <div class="col-lg-3 bg-light seller-options" style="display:block">

                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" style="margin-left:0%">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                          Consultas
                        </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row justify-content-start my-2">
                                <a href="./consult-sales.html">Consulta de ventas</a>
                            </div>

                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" style="margin-left:0%">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                          Artículos
                        </button>
                      </h2>
                      <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">

                            <div class="row justify-content-start my-2">
                                <a href="./publish-product.html">Publicar</a>
                            </div>

                            <div class="row justify-content-start my-2">
                              <a href="#">Estatus de publicación</a>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" style="margin-left:0%">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Cotizaciones
                        </button>
                      </h2>
                      <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">

                            <div class="row justify-content-start my-2">
                                <a href="./messages.html">Mensajes</a>
                            </div>

                        </div>
                      </div>
                    </div>
                  </div>


            </div>

            <div class="col-lg-9">
                
                <div class="row justify-content-center p-3 mt-1 mx-3">

                    <div class="input-group mb-3" style="max-width: 600px;">
                        <span class="input-group-text" id="basic-addon1">
                          <i class="bi bi-search"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Escribe algún nombre, o categoría..." aria-label="Buscar" aria-describedby="basic-addon1">
                      </div>

                      <div class="row justify-content-center my-3">
                        
                        <div class="card-group">
                            <div class="card mx-1">
                              <a href="./product-view.html"><img src="./src/src/img1.png" class="card-img-top" alt="..."></a>
                              <div class="card-body">
                                <h5 class="card-title">Producto</h5>
                              </div>
                              <div class="card-footer">
                                <small class="text-body-secondary">$56</small>
                              </div>
                            </div>
                            <div class="card mx-1">
                              <a href="./product-view.html"><img src="./src/src/img2.png" class="card-img-top" alt="..."></a>
                              <div class="card-body">
                                <h5 class="card-title">Producto</h5>
                              </div>
                              <div class="card-footer">
                                <small class="text-body-secondary">$900</small>
                              </div>
                            </div>
                            <div class="card mx-1">
                              <a href="./product-view.html"><img src="./src/src/img3.png" class="card-img-top" alt="..."></a>
                              <div class="card-body">
                                <h5 class="card-title">Producto</h5>
                              </div>
                              <div class="card-footer">
                                <small class="text-body-secondary">$123</small>
                              </div>
                            </div>
                            <div class="card mx-1">
                                <a href="./product-view.html"><img src="./src/src/img4.png" class="card-img-top" alt="..."></a>
                                <div class="card-body">
                                  <h5 class="card-title">Producto</h5>
                                </div>
                                <div class="card-footer">
                                  <small class="text-body-secondary">$2388</small>
                                </div>
                              </div>

                              <div class="card mx-1">
                                <a href="./product-view.html"><img src="./src/src/img1.png" class="card-img-top" alt="..."></a>
                                <div class="card-body">
                                  <h5 class="card-title">Producto</h5>
                                 
                                </div>
                                <div class="card-footer">
                                  <small class="text-body-secondary">$100</small>
                                </div>
                              </div>





                          </div>

                      </div>


                </div>




            </div>
        </div>


      </div>


</body>
</html>