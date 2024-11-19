<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/main.css">
    <link rel="stylesheet" href="./src/css/profile.css">
    <link rel="stylesheet" href="./src/css/bootstrap.min.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="../Views/src/js/bootstrap.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <link rel="icon" href="./src/src/logo1.png" type="image/x-icon">
    <title>Búsqueda</title>
</head>
<body>

    <?php include 'navbar.php';?>
    
      <div class="container-fluid" style="margin-top: 58px;">
        <div class="row justify-content-center justify-items-center">
            <div class="col-lg-4 p-4 m-4">
                <div class="row justify-items-center justify-content-center text-center p-2">

                    <div class="col-lg-8 bg-light p-4 rounded-4">
                        <img id="img-preview" class="img-fluid border border-rounded rounded-pill m-1" src="./<?php echo htmlspecialchars($user_pic)?>" alt="user(name) profile" style="width: 200px;">
                        <h2 class="m-0 mb-2"><?php echo htmlspecialchars($user_name);?></h2>

                        <div class="justify-items-center text-start">
                          <p class="text-bold"> Se unió el: <span class="text-primary"><?php echo htmlspecialchars($user_logdate);?></span></p>
                        </div>

                        


                    </div>

                    
                </div>
            </div>
            <div class="col-lg-7">

                <!--esta seccion se mantiene oculta-->
                <div class="hidden-profile text-center">
                    <h2 class="ms-0 p-5 mt-5"><span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                      </svg></span> Este usuario bloqueó su perfil</h2>
                </div>
                <!--fin de la seccion-->
                <div class="user-list hidden-list mt-5 p-3">
                    <h2 class="ms-2 mt-2">Listas del usuario</h2>
                    <div class="card-group" id="user-lists-container">
                       
                    
                    </div>
                </div>



                </div>
                
                
            </div>
        </div>
      </div>

      <script src="./src/js/bootstrap.bundle.min.js"></script>
      <script src="./src/js/profile-click.js"></script>

</body>
</html>