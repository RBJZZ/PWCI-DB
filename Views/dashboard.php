<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Views/src/css/main.css">
    <link rel="stylesheet" href="../Views/src/css/dashboard.css">
    <link rel="stylesheet" href="../Views/src/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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

            <div class="col-lg-1 col-md-4 m-3 shadow-sm categories-ball" style="background-color: #88aaa3; height: 200px; width: 200px;">
          
            </div>

            <div class="col-lg-1 col-md-4 m-3 shadow-sm categories-ball" style="background-color: #0D7C66; height: 200px; width: 200px;">
            </div>
            
            <div class="col-lg-1 col-md-4 m-3 shadow-sm categories-ball" style="background-color: #41B3A2; height: 200px; width: 200px;">
            </div>
            <div class="col-lg-1 col-md-4 m-3 shadow-sm categories-ball" style="background-color: #BDE8CA; height:200px; width: 200px;">
            </div>
            <div class="col-lg-1 col-md-4 m-3 shadow-sm categories-ball" style="background-color: #D7C3F1; height: 200px; width: 200px;">
            </div>
            <div class="col-lg-1 col-md-4 m-3 shadow-sm categories-ball" style="background-color: #cfbfe2; height: 200px; width: 200px;">
            </div>
            <div class="col-lg-1 col-md-4 m-3 shadow-sm categories-ball" style="background-color: #7b678c; height: 200px; width: 200px;">
            </div>
            <!--
            <div class="col-lg-1 col-md-4 m-3 shadow-sm categories-ball" style="background-color: #674188;">
            </div>
            <div class="col-lg-1 col-md-4 m-3 shadow-sm categories-ball" style="background-color: #421a64;">
            </div>
          -->
            
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
          <h2 style="margin-left:0px; background-color: white;">Basados en tu última visita</h2>
        </div>

        <div class="row justify-content-center mx-2 px-5">

          <div class="horizontal-scroll-container2">
            <div class="horizontal-scroll2">
  
              <div class="card shadow-md rounded-0" style="width: 18rem;">
                <img src="../Views/src/src/img1.png" class="card-img-top rounded-0" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">$$$</p>
                  <a href="./product-view.php" class="btn btn-card rounded-0">Go somewhere</a>
                </div>
              </div>
  
              <div class="card shadow-md rounded-0" style="width: 18rem;">
                <img src="../Views/src/src/img2.png" class="card-img-top rounded-0" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">$$$</p>
                  <a href="./product-view.php" class="btn btn-card rounded-0">Go somewhere</a>
                </div>
              </div>
  
              <div class="card shadow-md rounded-0" style="width: 18rem;">
                <img src="../Views/src/src/img3.png" class="card-img-top rounded-0" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">$$$</p>
                  <a href="./product-view.php" class="btn btn-card rounded-0">Go somewhere</a>
                </div>
              </div>
  
              <div class="card shadow-md rounded-0" style="width: 18rem;">
                <img src="../Views/src/src/img4.png" class="card-img-top rounded-0" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">$$$</p>
                  <a href="./product-view.php" class="btn btn-card rounded-0">Go somewhere</a>
                </div>
              </div>
  
              
              <div class="card shadow-md rounded-0" style="width: 18rem;">
                <img src="../Views/src/src/img1.png" class="card-img-top rounded-0" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">$$$</p>
                  <a href="./product-view.php" class="btn btn-card rounded-0">Go somewhere</a>
                </div>
              </div>
  
              
              <div class="card shadow-md rounded-0" style="width: 18rem;">
                <img src="../Views/src/src/img2.png" class="card-img-top rounded-0" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">$$$</p>
                  <a href="./product-view.php" class="btn btn-card rounded-0">Go somewhere</a>
                </div>
              </div>
  
              
              <div class="card shadow-md rounded-0" style="width: 18rem;">
                <img src="../Views/src/src/img3.png" class="card-img-top rounded-0" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">$$$</p>
                  <a href="./product-view.php" class="btn btn-card rounded-0">Go somewhere</a>
                </div>
              </div>
  
              
              <div class="card shadow-md rounded-0" style="width: 18rem;">
                <img src="../Views/src/src/img4.png" class="card-img-top rounded-0" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">$$$</p>
                  <a href="./product-view.php" class="btn btn-card rounded-0">Go somewhere</a>
                </div>
              </div>
  
              <div class="card shadow-md rounded-0" style="width: 18rem;">
                <img src="../Views/src/src/img1.png" class="card-img-top rounded-0" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">$$$</p>
                  <a href="./product-view.php" class="btn btn-card rounded-0">Go somewhere</a>
                </div>
              </div>
  
              <div class="card shadow-md rounded-0" style="width: 18rem;">
                <img src="../Views/src/src/img2.png" class="card-img-top rounded-0" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">$$$</p>
                  <a href="./product-view.php" class="btn btn-card rounded-0">Go somewhere</a>
                </div>
              </div>
  
  
            </div>
          </div>

        </div>


        <div class="row justify-content-center" style="height: 300px; background-color: white;">
          
        </div>

      </div>

      <script src="../Views/src/js/dashboard.js"></script>

</body>
</html>