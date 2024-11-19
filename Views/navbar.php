
<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION["user_id"])) {
    header("Location: ../index.php"); 
    exit();
}

$user_id = $_SESSION["user_id"];
$user_name = $_SESSION["user_name"];
$user_AP = $_SESSION["user_AP"];
$user_AM = $_SESSION["user_AM"];
$user_bday=$_SESSION["user_bday"];
$user_email=$_SESSION["user_email"];
$user_type = $_SESSION["user_type"];
$type_desc = $_SESSION["type_desc"];
$user_logdate=$_SESSION["user_logdate"];
$user_pic=$_SESSION["user_pic"];
$username=$_SESSION["username"];
$user_gender=$_SESSION["usergender"];
?>

<script type="module" src="../Views/src/js/auth.js"></script>
<script type="module" src="../Views/src/js/config.js"></script>
<nav class="navbar navbar-expand-lg mi-navbar fixed-top">
        <div style="background-color: #88aaa3;"class="container-fluid">
    
          <a class="navbar-brand" href="../Controllers/ProductosController.php" style="height:43px !important;">
            <img class="icon-logo" src="../Views/src/src/logo1.png">
            <span id="brand">D&B</span></a>
    
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="<?php
                    if ($user_type == "admin") {
                        echo "../Views/admin-dashboard.php";
                    } elseif ($user_type == "user") {
                        echo "../Views/profile-click.php";
                    } elseif ($user_type == "seller") {
                        echo "../Controllers/SellerController.php?id=$user_id";
                    } else {
                        echo "../Views/index.php";
                    }
                ?>" class="nav-link"><span><svg style="margin-bottom:2px" xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1
                   1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 
                   11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 
                   5.468 2.37A7 7 0 0 0 8 1"/>
                </svg></span> <?php echo htmlspecialchars($user_name);?> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../Views/shopping-cart.php">
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
                <a class="nav-link" href="../Controllers/SearchController.php?view=buscador"><span><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-tags-fill" viewBox="0 0 16 16">
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
                <a class="nav-link" href="../Views/lists.php"><span><svg style="margin-bottom:2px"xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
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
                <a class="nav-link" id="logout" href="../Controllers/LogoutController.php" aria-disabled="true"><span ><svg style="margin-bottom:3px;" xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5
                   0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1
                    0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0
                     1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                </svg></span> Cerrar sesión</a>
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
              <form action="../Controllers/SearchController.php?view=buscador" method="POST">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><box-icon name='search-alt-2' rotate='90' color='#2c523d' ></box-icon></span>
                  <input type="text" name="keyword" class="form-control" placeholder="Escribe algo..." aria-label="search-bar" aria-describedby="basic-addon1">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>