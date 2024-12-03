<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Views/src/css/main.css">
    <link rel="stylesheet" href="../Views/src/css/dashboard.css">
    <link rel="stylesheet" href="../Views/src/css/bootstrap.min.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="../Views/src/js/bootstrap.js"></script>
    <link rel="icon" href="../Views/src/src/logo1.png" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <title>Inicio</title>
</head>
<body>

<?php include '../Views/navbar.php';?>

<script>
              function adjustClasses() {
                const element = document.getElementById('starter');
                if (window.innerWidth < 768) {
                    element.classList.add('ms-5');
                } else {
                    element.classList.remove('ms-5');
                }
            }
            window.addEventListener('resize', adjustClasses);
            window.addEventListener('load', adjustClasses);
    </script>

      <!--CATEGORIAS OFFCANVAS-->

      <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasTopLabel">Categorías</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <div class="row justify-content-center mx-5">
            <div class="col-lg-3 bg-primary">
              hola
            </div>
            <div class="col-lg-3 bg-secondary">
              hola2
            </div> 
            <div class="col-lg-3 bg-danger">
              hola3
            </div>
            <div class="col-lg-3 bg-warning">
              hola4
            </div>
          </div>
        </div>
      </div>


      <div class="container-fluid justify-content-center text-center" style="margin-top: 60px;">
        <div class="row justify-content-center">
            <div class="col-lg-11">

                <!-- CARRUSEL -->
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner rounded">
                      <div class="carousel-item active">
                        <img src="../Views/src/src/img1.png" class="d-block w-100 dashboard-img" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="../Views/src/src/img2.png" class="d-block w-100 dashboard-img" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="../Views/src/src/img3.png" class="d-block w-100 dashboard-img" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="../Views/src/src/img4.png" class="d-block w-100 dashboard-img" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
                <!--FIN DEL CARRUSEL-->

                

            </div>
        </div>
        <div class="text-center m-2">
          <h1 style="background-color: white; border-radius: 30px;">Categorías populares</h1>
        </div>
        <div class="row justify-content-center m-2" style=" border-radius: 40px;">

            
          
          <a class="col-lg-1 col-md-2 mb-0 tag" id="starter" href="../Controllers/SearchController.php?c=Consolas"><div class="border shadow-sm categories-ball" style="background-image:url('../Views/src/src/consolas.png'); background-position:center; background-size:cover; height: 200px; width: 200px;"></div></a>
          <a class="col-lg-1 col-md-2 ms-5 mb-0 tag" href="../Controllers/SearchController.php?c=Telefonía"><div class="border shadow-sm categories-ball" style="background-image:url('../Views/src/src/telefonia.png'); background-position:center; background-size:cover; height:200px; width: 200px;"></div></a>
          <a class="col-lg-1 col-md-2 ms-5 mb-0 tag" href="../Controllers/SearchController.php?c=Jardinería"><div class="border shadow-sm categories-ball" style="background-image:url('../Views/src/src/jardinería.png'); background-position:center; background-size:cover; height: 200px; width: 200px;"></div></a>
          <a class="col-lg-1 col-md-2 ms-5 mb-0 tag" href="../Controllers/SearchController.php?c=Musica"><div class="border shadow-sm categories-ball" style="background-image:url('../Views/src/src/audio.png'); background-position:center; background-size:cover; height:200px; width: 200px;"></div></a>
          <a class="col-lg-1 col-md-2 ms-5 mb-0 tag" href="../Controllers/SearchController.php?c=Ropa"><div class="border shadow-sm categories-ball" style="background-image:url('../Views/src/src/ropa.png'); background-position:center; background-size:cover; height: 200px; width: 200px;"></div></a>
          <a class="col-lg-1 col-md-2 ms-5 mb-0 tag" href="../Controllers/SearchController.php?c=Cosmeticos"><div class="border shadow-sm categories-ball" style="background-image:url('../Views/src/src/cosmeticos.png'); background-position:center; background-size:cover; height: 200px; width: 200px;"></div></a>
          <a class="col-lg-1 col-md-2 ms-5 mb-0 tag" href="../Controllers/SearchController.php?c=Electrodomesticos"><div class="border shadow-sm categories-ball" style="background-image:url('../Views/src/src/electrodomesticos.png'); background-position:center; background-size:cover; height: 200px; width: 200px;"></div></a>
            
        </div>

        <div class="text-center m-2">
          <h2 style="margin-left:0px; background-color: white;">Tendencias </h2>
        </div>

        <div class="row justify-content-center mx-2 px-5">

          <div class="horizontal-scroll-container">
            <div class="horizontal-scroll">
  
            <?php


    if(isset($productos) && !empty($productos)){
    foreach ($productos as $product) {
        ?>
        
            <div class="card shadow-md rounded-0" style="width: 18rem;">
               
                 <div class="img-container">
                 <img src="../Views/<?php echo htmlspecialchars($product['pic']); ?>" class="card-img-top rounded-0 img-thumbnail" alt="Product Image">
                 </div>
                
                <div class="card-body">
                    
                    <h5 class="card-title"><?php echo htmlspecialchars($product['namep']); ?></h5>
                    
                    <p class="card-text">$<?php echo number_format($product['price'], 2); ?></p>
                    
                    <a href="../Controllers/ProductosController.php?id=<?php echo $product['id'];?>" class="btn btn-card rounded-0">Ver Producto</a>
                </div>
            </div>
       
        <?php
    }
    }else{
      echo "<p>No se encontraron productos. </p>";

      
    }
    ?>





            </div>
          </div>

        </div>
       
        
        <div class="text-center m-2">
          <h2 style="margin-left:0px; background-color: white;">Publicados recientemente</h2>
        </div>

        <div class="row justify-content-center mx-2 px-5">

          <div class="horizontal-scroll-container2">
            <div class="horizontal-scroll2">
  
            <?php


            if(isset($recientes) && !empty($recientes)){
            foreach ($recientes as $rec) {
                ?>
                
                    <div class="card shadow-md rounded-0" style="width: 18rem;">
                      
                        <div class="img-container">
                        <img src="<?php echo htmlspecialchars($rec['prod_thumbnail']); ?>" class="card-img-top rounded-0 img-thumbnail" alt="Product Image">
                        </div>
                        
                        <div class="card-body">
                            
                            <h5 class="card-title"><?php echo htmlspecialchars($rec['prod_name']); ?></h5>
                            
                            <p class="card-text">$<?php echo number_format($rec['prod_price'], 2); ?></p>
                            
                            <a href="../Controllers/ProductosController.php?id=<?php echo $rec['prod_ID'];?>" class="btn btn-card rounded-0">Ver Producto</a>
                        </div>
                    </div>
              
                <?php
            }
            }else{
              echo "<p>No se encontraron productos. </p>";

              
            }
            ?>
              
            </div>
          </div>

        </div>


        <div class="row justify-content-center" style="height: 300px; background-color: white;">
          
        </div>

      </div>

      <script src="../Views/src/js/dashboard.js"></script>

</body>
</html>