<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Views/src/css/main.css">
    <link rel="stylesheet" href="../Views/src/css/bootstrap.min.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="../Views/src/js/bootstrap.js"></script>
    <link rel="icon" href="../Views/src/src/logo1.png" type="image/x-icon">
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
                <img src="../Views/<?php echo htmlspecialchars($usuario->getPfp());?>" alt="seller profile picture" class="rounded-5" style="width: 200px;">
            </div>
            <div class="col-lg-9 col-sm-10 bg-light border border-rounded rounded-3">
                <div class="row justify-content-center">

                    <h1 class="ms-5 mt-3"><span><i class="bi bi-patch-check-fill" style="color:blue"></i></span> <?php echo htmlspecialchars($usuario->getName());?></h1>
                    <h4 class="ms-5 mb-2"> @<?php echo htmlspecialchars($usuario->getUsername());?></h4>
                    <div class="col-lg-4 pt-2 border text-center">
                        <h3><span><i class="bi bi-bag-check"></i></span> Articulos publicados: <?php echo htmlspecialchars($usuario->getPosts())?></h3>
                    </div>
                    <div class="col-lg-4 pt-2 border text-center">
                        <h3><span><i class="bi bi-award"></i></span> Preferencia: 98%</h3>
                    </div>
                    <div class="col-lg-4 pt-2 border text-center">
                        <h3><span><i class="bi bi-calendar-date"></i></span> Desde <?php echo htmlspecialchars($usuario->getLog());?></h3>
                    </div>

                </div>

                <div class="row justify-content-center text-center pt-3 pb-2">
                    <h5>""</h5>
                </div>




            </div>
            <hr class="mt-2">
        </div>
        <!--SECCION DE OPCIONES PARA EL VENDEDOR-->
        <div class="row justify-content-center px-3">
          
            <div class="col-lg-3 bg-light seller-options" style="display:none">

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
                                <a href="./consult-sales.php">Consulta de ventas</a>
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
                                <a href="../Controllers/CategoryController.php?view=publicar">Publicar</a>
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
                                <a href="./messages.php">Mensajes</a>
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
                        <?php foreach ($publicaciones as $producto): ?>
                            <div class="card mx-1" style="width: 18rem;">

                                <a href="../Controllers/ProductosController.php?id=<?php echo htmlspecialchars($producto['id']); ?>">
                                  <div class="simg-container">
                                <img src="../<?php echo htmlspecialchars($producto['thumb']); ?>" class="card-img-top" alt="Imagen del producto">
                                  </div>
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($producto['title']); ?></h5>
                                    <p class="card-text">#<?php echo htmlspecialchars($producto['category_name']); ?></p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-body-secondary">$<?php echo htmlspecialchars($producto['price']); ?></small>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                      </div>


                </div>




            </div>
        </div>


      </div>


</body>
</html>