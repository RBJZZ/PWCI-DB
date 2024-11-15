<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Views/src/css/main.css">
    <link rel="stylesheet" href="../Views/src/css/advanced-search.css">
    <link rel="stylesheet" href="../Views/src/css/bootstrap.min.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="../Views/src/js/bootstrap.js"></script>
    <link rel="icon" href="../Views/src/src/logo1.png" type="image/x-icon">
    <title>Búsqueda</title>
</head>
<body>

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
            <h2 class="mb-4" style="margin-left: 0%;">
              
            <?php if (!empty($keyword)): ?>
            Resultados en: "<?php echo htmlspecialchars($keyword); ?>"
            <?php else: ?>
            Todos los productos
            <?php endif; ?>

            <?php 
            $count = 0;
            foreach ($productos as $producto): 
               
                if ($count % 6 === 0): ?>
                    <div class="result-product-row row justify-content-center text-center m-3 p-2" id="producttype">
                <?php endif; ?>
                
                <div class="col-lg-2 col-md-6 mb-3">
                    <div class="card shadow-md border rounded-0" style="width: 18rem;">
                        <div class="simg-container">
                        <img src="../Views/<?php echo htmlspecialchars($producto['pic']); ?>" class="card-img-top rounded-0" alt="Imagen del producto">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($producto['namep']); ?></h5>
                            <a href="../Controllers/ProductosController.php?id=<?php echo htmlspecialchars($producto['id']); ?>" class="btn btn-card rounded-0">Ver Producto</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">$<?php echo htmlspecialchars($producto['price']); ?></small>
                        </div>
                    </div>
                </div>

                <?php 
                $count++;
                
                if ($count % 6 === 0): ?>
                    </div>
                <?php endif; 
                endforeach; 

            
                if ($count % 6 !== 0): ?>
                </div>
            <?php endif; ?>

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

        foreach ($cat as $categoria) {
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