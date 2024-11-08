<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/main.css">
    <link rel="stylesheet" href="./src/css/advanced-search.css">
    <link rel="stylesheet" href="./src/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="./src/js/bootstrap.js"></script>
    <link rel="icon" href="./src/src/logo1.png" type="image/x-icon">
    <title>Búsqueda</title>
</head>
<body>
  <?php include '../PWCI-DB/php/obtenercategorias.php';?>
  <?php include 'navbar.php';?>
    

      <!--CONTENIDO-->
      <div class="container-fluid" style="margin-top: 58px;">

        <div class="row justify-content-center">
          <div class="col-lg-12 mt-4">
  
            <div class="row justify-content-center justify-items-center text-center">
              <div class="col-lg-10">
                <button class="btn btn-lg border shadow-sm rounded-0" id="btn-filter" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Filtrar búsqueda</button>
              </div>
            </div>
  
            <div class="result-product-row row justify-content-center text-center m-3 p-2" id="producttype">
  
              <h2 class="mb-4" style="margin-left: 0%;">Resultados en: #tubúsqueda</h2>
              <div class="col-lg-2 col-md-6 mb-3">
                <div class="card shadow-md border rounded-0" style="width: 18rem;">
                  <img src="./src/src/img1.png" class="card-img-top rounded-0" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="./product-view.html" class="btn btn-card rounded-0">Go somewhere</a>
                  </div>
                </div>
              </div>
        
              <div class="col-lg-2 col-md-6 mb-3">
                <div class="card shadow-md border rounded-0" style="width: 18rem;">
                  <img src="./src/src/img2.png" class="card-img-top rounded-0" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="./product-view.html" class="btn btn-card rounded-0">Go somewhere</a>
                  </div>
                </div>
              </div>
        
              <div class="col-lg-2 col-md-6 mb-3">
                <div class="card shadow-md rounded-0 border" style="width: 18rem;">
                  <img src="./src/src/img3.png" class="card-img-top rounded-0" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="./product-view.html" class="btn btn-card rounded-0">Go somewhere</a>
                  </div>
                </div>
              </div>
        
              <div class="col-lg-2 col-md-6 mb-3">
                <div class="card shadow-md rounded-0 border" style="width: 18rem;">
                  <img src="./src/src/img4.png" class="card-img-top rounded-0" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="./product-view.html" class="btn btn-card rounded-0">Go somewhere</a>
                  </div>
                </div>
              </div>

              <div class="col-lg-2 col-md-6 mb-3">
                <div class="card shadow-md rounded-0 border" style="width: 18rem;">
                  <img src="./src/src/img1.png" class="card-img-top rounded-0" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="./product-view.html" class="btn btn-card rounded-0">Go somewhere</a>
                  </div>
                </div>
              </div>

              <div class="col-lg-2 col-md-6 mb-3">
                <div class="card shadow-md rounded-0 border" style="width: 18rem;">
                  <img src="./src/src/img2.png" class="card-img-top rounded-0" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="./product-view.html" class="btn btn-card rounded-0">Go somewhere</a>
                  </div>
                </div>
              </div>
            </div>
  
            
            <div class="result-pf-row row justify-content-center text-center m-3 p-2" id="usertype" style="display:none">
              <h2 class="ms-0 mt-3 mb-4">Usuarios de D&B</h2>

              <div class="card-group">
                
                    <div class="card mx-1 shadow-lg">
                      <a href="./profile-click.html"><img src="./src/src/avatar.png" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                      <h5 class="card-title">Usuario</h5>
                      <p class="card-text">Cliente</p>
                      <p class="card-text"><small class="text-body-secondary">Since DD/MM/YY</small></p>
                    </div>
                  </div>
                
                  <div class="card mx-1 shadow-sm">
                  <a href="./profile-click.html"><img src="./src/src/avatar.png" class="card-img-top" alt="..."></a>
                  <div class="card-body">
                    <h5 class="card-title">Usuario</h5>
                    <p class="card-text">Cliente</p>
                    <p class="card-text"><small class="text-body-secondary">Since DD/MM/YY</small></p>
                  </div>
                </div>
                
                  <div class="card mx-1 shadow-sm">
                  <a href="./profile-click.html"><img src="./src/src/avatar.png" class="card-img-top" alt="..."></a>
                  <div class="card-body">
                    <h5 class="card-title">Usuario</h5>
                    <p class="card-text">Vendedor</p>
                    <p class="card-text"><small class="text-body-secondary">Since DD/MM/YY</small></p>
                  </div>
                </div>
                
                  <div class="card mx-1 shadow-sm">
                  <a href="./profile-click.html"><img src="./src/src/avatar.png" class="card-img-top" alt="..."></a>
                  <div class="card-body">
                    <h5 class="card-title">Usuario</h5>
                    <p class="card-text">Vendedor</p>
                    <p class="card-text"><small class="text-body-secondary">Since DD/MM/YY</small></p>
                  </div>
                </div>
               
                  <div class="card mx-1 shadow-sm">
                  <a href="./profile-click.html"><img src="./src/src/avatar.png" class="card-img-top" alt="..."></a>
                  <div class="card-body">
                    <h5 class="card-title">Usuario</h5>
                    <p class="card-text">Vendedor</p>
                    <p class="card-text"><small class="text-body-secondary">Since DD/MM/YY</small></p>
                  </div>
                </div>
               
                  <div class="card mx-1 shadow-sm">
                  <a href="./profile-click.html"><img src="./src/src/avatar.png" class="card-img-top" alt="..."></a>
                  <div class="card-body">
                    <h5 class="card-title">Usuario</h5>
                    <p class="card-text">Cliente</p>
                    <p class="card-text"><small class="text-body-secondary">Since DD/MM/YY</small></p>
                  </div>
                </div>
                
              </div>
              
            </div>
  
  
          </div>
        </div>

        <!--OFF CANVAS FILTROS DE BUSQUEDA + CATEGORIAS-->

        <div style="margin-top: 58px;"class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Categorías en D&B</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body justify-content-center justify-items-center ms-3">
            <div class="row">

            <?php
        $count = 0;
        $maxPerColumn = 5;

        foreach ($categorias as $categoria) {
            if ($count % $maxPerColumn == 0) {
                if ($count > 0) {
                    echo '</div>'; 
                }
                echo '<div class="col-lg-6">'; 
            }
            ?>

            <input type="checkbox" class="btn-check" id="categoria-<?php echo $categoria['cat_ID']; ?>" autocomplete="off">
            <label class="btn btn-outline-secondary rounded-pill mb-1" for="categoria-<?php echo $categoria['cat_ID']; ?>">
            <?php echo "#" . htmlspecialchars(strtoupper($categoria['cat_name'])); ?>
            </label><br>

            <?php
            $count++;
        }

        
        echo '</div>';
        ?>
              <!--
              <div class="col-lg-6">
               
                  <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                  <label class="btn btn-outline-secondary rounded-pill mb-1" for="btn-check-outlined">#JARDINERÍA</label><br>

                  <input type="checkbox" class="btn-check" id="btn-check-2-outlined" autocomplete="off">
                  <label class="btn btn-outline-secondary rounded-pill mb-1" for="btn-check-2-outlined">#LINEA BLANCA</label><br>

                  <input type="checkbox" class="btn-check" id="btn-check-3-outlined" autocomplete="off">
                  <label class="btn btn-outline-secondary rounded-pill mb-1" for="btn-check-3-outlined">#COCINA</label><br>

                  <input type="checkbox" class="btn-check" id="btn-check-4-outlined" autocomplete="off">
                  <label class="btn btn-outline-secondary rounded-pill mb-1" for="btn-check-4-outlined">#ELECTRÓNICA</label><br>

                  <input type="checkbox" class="btn-check" id="btn-check-5-outlined" autocomplete="off">
                  <label class="btn btn-outline-secondary rounded-pill mb-1" for="btn-check-5-outlined">#DECORACION</label><br>

                  <input type="checkbox" class="btn-check" id="btn-check-6-outlined" autocomplete="off">
                  <label class="btn btn-outline-secondary rounded-pill mb-1" for="btn-check-6-outlined">#HERRAMIENTA</label><br>

                  <input type="checkbox" class="btn-check" id="btn-check-7-outlined" autocomplete="off">
                  <label class="btn btn-outline-secondary rounded-pill mb-1" for="btn-check-7-outlined">#ROPA</label><br>
              </div>
              <div class="col-lg-6">

                <input type="checkbox" class="btn-check" id="btn-check-8-outlined" autocomplete="off">
                <label class="btn btn-outline-secondary rounded-pill mb-1" for="btn-check-8-outlined">#ZAPATOS</label><br>

                <input type="checkbox" class="btn-check" id="btn-check-9-outlined" autocomplete="off">
                <label class="btn btn-outline-secondary rounded-pill mb-1" for="btn-check-9-outlined">#LIBROS</label><br>

                <input type="checkbox" class="btn-check" id="btn-check-10-outlined" autocomplete="off">
                <label class="btn btn-outline-secondary rounded-pill mb-1" for="btn-check-10-outlined">#VIDEOJUEGOS</label><br>

                <input type="checkbox" class="btn-check" id="btn-check-11-outlined" autocomplete="off">
                <label class="btn btn-outline-secondary rounded-pill mb-1" for="btn-check-11-outlined">#MAYOREO</label><br>

                <input type="checkbox" class="btn-check" id="btn-check-12-outlined" autocomplete="off">
                <label class="btn btn-outline-secondary rounded-pill mb-1" for="btn-check-12-outlined">#BACK2SCHOOL</label><br>

                <input type="checkbox" class="btn-check" id="btn-check-13-outlined" autocomplete="off">
                <label class="btn btn-outline-secondary rounded-pill mb-1" for="btn-check-13-outlined">#TELEFONÍA</label><br>

                <input type="checkbox" class="btn-check" id="btn-check-14-outlined" autocomplete="off">
                <label class="btn btn-outline-secondary rounded-pill mb-1" for="btn-check-14-outlined">#PERIFERICOS</label><br>

              </div>

-->

            </div>

            <div class="row justify-content-center justify-items-center m-2 p-4" style="border-radius: 25px; background-color: rgba(205, 205, 205, 0.24);">
              <h5 class="mb-3">Opinión de los clientes</h5>
              <input type="checkbox" class="btn-check" id="btn-check-ranking" autocomplete="off">
              <label class="btn btn-outline-secondary rounded-pill mb-1" for="btn-check-ranking">&#9733;&#9733;&#9733;&#9733;+
              </label><br>

              <h5 class="mb-3 mt-3">Rango de precio</h5>
              <label for="price-range" class="form-label">$0.00 - $10.00</label>
              <input type="range" class="form-range" min="0" max="5" id="price-range">

              <h5 class="mt-3">Filtrar por</h5>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Más vendidos
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Menos vendidos
                </label>
              </div>




            </div>
          </div>
        </div>

      </div>
     

</body>
</html>