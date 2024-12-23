<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/main.css">
    <link rel="stylesheet" href="./src/css/bootstrap.min.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="./src/js/bootstrap.js"></script>
    <link rel="icon" href="./src/src/logo1.png" type="image/x-icon">
    <title>Log In</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <!--CREDITS: REBECA EVANGELISTA & DAVID AGUILAR-->
</head>
<body>

    <nav class="navbar navbar-expand-lg mi-navbar fixed-top">
        <div style="background-color: #88aaa3;"class="container-fluid">

          <a class="navbar-brand" href="#">
            <img class="icon-logo" src="./src/src/logo1.png">
            <span id="brand">D&B</span>
          </a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              
              <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true" style="color: white;">¿No tienes una cuenta?</a>
              </li>
            </ul>
            <a href="./registro.php"><button class="btn btn-light mx-1 rounded-pill">Regístrate</button></a>
          </div>
        </div>
      </nav>

      <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

        <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background-image: #3C3D37;">

            <div class="featured-image mb-3">
                <img src="src/src/login1.png" alt="" class="img-fluid" style="width: 600px; border-radius: 25px;">

            </div>

        </div>

        <div class="col-md-6 right-box">
        <div class="row align-items-center">

          <div class="header-text mb-4">
            <h2 style="margin-top: 50px">Bienvenido a <span id="brand">D&B</span></h2>
            <p>Nos alegramos de verte de nuevo.</p>

            <!--LOGIN FORM START-->
            <form id="loginForm" method="post" action="../Controllers/UsuarioController.php?action=login">
                <div class="input-group mb-3">
                    <input id="key" name="key" type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Username / E-mail" required>
                </div>
                <div class="input-group mb-1">
                    <input id="password" name="password" type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" required>
                </div>
                <div class="input-group mb-5 d-flex justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="formCheck">
                        <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                    </div>
        
                    <div class="forgot">
                        <small><a href="#">¿Olvidaste tu contraseña?</a></small>
                    </div>
                </div>
        
                <div class="input-group mb-3" style="max-width: 200px;">
                    <button type="submit" style="background-color: #88aaa3; border-style: none; border-radius: 20px;" class="btn btn-lg btn-primary w-100 fs-6">Iniciar sesión</button>
                </div>
        
            </form>
            <!--LOGIN FORM END-->
         

            </div>
        </div>
       

        </div>

      </div>

      <script src="./src/js/index.js"></script>
      <script type="module" src="../Views/src/js/firebase-login.js"></script>
  
</body>
</html>