
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

    <?php include 'navbar.php';?>
    
      <div class="container-fluid " style="margin-top: 58px;">

        <div class="row justify-content-center p-3 mt-5">
            <div class="col-lg-3 col-sm-10 bg-light d-flex justify-content-center p-2">
                <img src="./<?php echo htmlspecialchars($user_pic);?>" alt="seller profile picture" class="rounded-5" style="width: 200px;">
            </div>
            <div class="col-lg-9 col-sm-10 bg-light border border-rounded rounded-3">
                <div class="row justify-content-center">

                    <h1 class="ms-5 mt-3"><span><i class="bi bi-patch-check-fill" style="color:blue"></i></span> <?php echo htmlspecialchars($user_name);?></h1>
                    <h4 class="ms-5 mb-2"> @<?php echo htmlspecialchars($username);?></h4>
                    <div class="col-lg-4 pt-2 border text-center">
                        <h3><span><i class="bi bi-bag-check"></i></span> Articulos publicados: 192</h3>
                    </div>
                    <div class="col-lg-4 pt-2 border text-center">
                        <h3><span><i class="bi bi-award"></i></span> Preferencia: 98%</h3>
                    </div>
                    <div class="col-lg-4 pt-2 border text-center">
                        <h3><span><i class="bi bi-calendar-date"></i></span> Desde <?php echo htmlspecialchars($user_logdate);?></h3>
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