<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Views/src/css/main.css">
    <link rel="stylesheet" href="../Views/src/css/advanced-search.css">
    <link rel="stylesheet" href="../Views/src/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.1/nouislider.min.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="../Views/src/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.1/nouislider.min.js"></script>
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
            <div class="row justify-content-center text-center m-3 p-2">
            <h2 class="mb-4" style="margin-left: 0%;">
              <?php if (!empty($keyword)): ?>
              Resultados en: "<?php echo htmlspecialchars($keyword); ?>"
              <?php else:?>
              Todos los productos
              <?php endif; ?>
            </h2>
            </div>
            <div class="result-product-row row justify-content-center text-center m-3 p-2 productcontainer" id="product-container">
            
              
           
            <?php 
            $count = 0;
            foreach ($productos as $producto): 
               
                if ($count % 6 === 0): ?>
                    
                    <div class="result-product-row row justify-content-center text-center m-3 p-2" id="producttype-<?php echo $count?>">
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
                <?php endif; ?>
              </div>
            

            </div>
            
            <div class="result-user-row row justify-content-center text-center m-3 p-2" id="user-container">
              <h2 class="ms-0 mt-3 mb-4">Usuarios Encontrados</h2>
              <?php if (!empty($usuarios)): ?>
                  <?php foreach ($usuarios as $usuario): ?>
                  <div class="col-lg-2 col-md-4 mb-4">
                      <div class="card shadow-md border rounded-0">
                        <div class="img-user">
                          <img src="../Views/<?php echo htmlspecialchars($usuario['pfp']); ?>" class="card-img-top" alt="Foto de perfil">
                        </div>  
                          <div class="card-body">
                              <h5 class="card-title"><?php echo htmlspecialchars($usuario['username']); ?></h5>
                              <p class="card-text"><?php echo htmlspecialchars($usuario['role']); ?></p>
                              <p class="card-text"><small class="text-body-secondary">Desde: <?php echo htmlspecialchars(date('d/m/Y', strtotime($usuario['join_date']))); ?></small></p>

                              <?php if ($usuario['role'] === 'seller'): ?>
                                  <a href="../Controllers/SellerController.php?view=sellerpf&uid=<?php echo htmlspecialchars($usuario['id']); ?>" 
                                    class="btn btn-card rounded-0">Ver Productos</a>
                              <?php elseif ($usuario['role'] === 'user'): ?>
                                  
                                  <a href="../Controllers/UsuarioController.php?action=view&id=<?php echo htmlspecialchars($usuario['id']); ?>" 
                                    class="btn btn-card rounded-0">Ver Perfil</a>
                              <?php endif; ?>
                              
                          </div>
                      </div>
                  </div>
                  <?php endforeach; ?>
              <?php else: ?>
                  <p style="margin-left:0px">No se encontraron usuarios relacionados con la búsqueda.</p>
              <?php endif; ?>
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

            <form id="filterForm" action="../Controllers/SearchController.php?action=advanced" method="POST">

            <input type="hidden" name="keyword" id="keywordInput" value="<?php echo htmlspecialchars($keyword); ?>">
            <input type="hidden" name="minPrice" value="" id="minPrice">
            <input type="hidden" name="maxPrice" value="" id="maxPrice">
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

            <input type="checkbox" class="btn-check" name="categorias[]" value="<?php echo htmlspecialchars($categoria['cat_ID'])?>" id="<?php echo htmlspecialchars($categoria['cat_ID']);?>" autocomplete="off">
            <label class="btn btn-outline-secondary rounded-pill mb-1" for="<?php echo $categoria['cat_ID']; ?>">
            <?php echo "#" . htmlspecialchars(strtoupper($categoria['cat_name'])); ?>
            </label><br>

            <?php
            $count++;
        }

        
        echo '</div>';
        ?>

        </div>

            <div class="row justify-content-center justify-items-center m-2 p-4" style="border-radius: 25px; background-color: rgba(205, 205, 205, 0.24);">
              <h5 class="mb-3">Opinión de los clientes</h5>
              <input type="checkbox" class="btn-check" name="rating" id="btn-check-ranking" value="4" autocomplete="off">
              <label class="btn btn-outline-secondary rounded-pill mb-1" for="btn-check-ranking">&#9733;&#9733;&#9733;&#9733;+
              </label><br>

             

              <div class="mt-4 mb-2" id="priceRangeSlider"></div>
              <span>Precio mínimo:$<span id="minPriceDisplay"></span></span>
              <span>Precio máximo:$<span id="maxPriceDisplay"></span></span>

              <h5 class="mt-3">Filtrar por</h5>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled>
                <label class="form-check-label" for="flexCheckDefault">
                  Más vendidos
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled>
                <label class="form-check-label" for="flexCheckDefault">
                  Menos vendidos
                </label>
              </div>
              <button type="submit" class="btn-secondary border btn-md btn mt-2">Filtrar</button>
              </form>
            </div>
            
          </div>
        </div>

      </div>
     <script>

              <?php
              $precioMinimo = isset($precios['precio_minimo']) ? $precios['precio_minimo'] : 0;
              $precioMaximo = isset($precios['precio_maximo']) ? $precios['precio_maximo'] : 0;
              ?>
      const precioMinimo = parseFloat(<?php echo json_encode($precios['precio_minimo']); ?>);
      const precioMaximo = parseFloat(<?php echo json_encode($precios['precio_maximo']); ?>);

      var slider = document.getElementById('priceRangeSlider');

      noUiSlider.create(slider, {
          start: [precioMinimo, precioMaximo], 
          connect: true,
          range: {
              'min': precioMinimo,
              'max': precioMaximo  
          },
          step: 10
      });

      
      var minPriceDisplay = document.getElementById('minPriceDisplay');
      var maxPriceDisplay = document.getElementById('maxPriceDisplay');

      slider.noUiSlider.on('update', function(values, handle) {
          if (handle === 0) {
              minPriceDisplay.textContent = Math.round(values[0]);
          } else {
              maxPriceDisplay.textContent = Math.round(values[1]);
          }
      });

      
      slider.noUiSlider.on('change', function(values) {
          document.getElementById('minPrice').value = Math.round(values[0]);
          document.getElementById('maxPrice').value = Math.round(values[1]);
      });
     </script>
     <script src="../Views/src/js/advanced-search.js"></script>
</body>
</html>