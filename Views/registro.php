<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/main.css">
    <link rel="stylesheet" href="./src/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/css/registro.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="./src/js/bootstrap.js"></script>
    <link rel="icon" href="./src/src/logo1.png" type="image/x-icon">
    <title>Registro</title>
    <!--CREDITS: REBECA EVANGELISTA & DAVID AGUILAR-->
</head>
<body>

    <nav class="navbar navbar-expand-lg mi-navbar fixed-top">
        <div style="background-color: #88aaa3;"class="container-fluid">

          <a class="navbar-brand" href="#">
            <img class="icon-logo" src="./src/src/logo1.png">
            <span id="brand">D&B</span></a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

            <!--
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
            -->
              
              <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true" style="color: white;">¿Ya tienes una cuenta?</a>
              </li>
            </ul>

            <a href="./index.php"><button class=" mx-1 btn btn-light rounded-pill" type="button">Inicia Sesión</button></a>
          </div>
        </div>
      </nav>

     
<!--CONTAINER DEL FORM DE REGISTRO PARA CLIENTES-->
      <div class="container p-5 container-clientR" style="margin-top: 60px;">
        
        
        <div class="row justify-content-center">
            <div class="col-lg-8 bg-light text-center shadow-lg rounded-5">
                <div class="row justify-content-center rounded-top-4" style="background-color:white">
                        
                    <nav>
                        <div class="nav nav-tabs bg-light" id="nav-tab" role="tablist">
                        <button class="nav-link-active rounded-top bg-light" id="nav-client-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-client" type="button" role="tab" aria-controls="nav-client"
                        aria-selected="true" style="border-style: none;">Cliente</button>
                    

                    
                        <button class="nav-link" id="nav-seller-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-seller" type="button" role="tab" aria-controls="nav-seller"
                        aria-selected="false" style="display:none">Vendedor</button>
                    

                        </div>
                    </nav>
                </div>

                <div class="row justify-content-center p-4 tab-content border" id="nav-tabContent" style="border-radius: 20px; background-color: white;">

                    
                    <!--FORM CLIENTE-->
                    
                        <div class="col-lg-8 tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-client-tab">
                            <form id="register-form" action="../Controllers/UsuarioController.php?action=registrar" method="post" class="needs-validation" enctype="multipart/form-data">
                              <div class="row justify-items-center justify-content-center p-3 m-2" style="border-radius: 20px;">
                                <h3 class="mt-3 text-center">Registro estándar</h3>
                                <p style="margin: 0%;">Bienvenido a D&B</p>

                                <img id="pic-preview" src="https://uxwing.com/wp-content/themes/uxwing/download/peoples-avatars/default-avatar-profile-picture-male-icon.png" alt="" style="width: 250px; border-radius: 50%;">

                                <input type="file" id="pic-input" name="pic-register"  class="form-control form-control-lg mt-3 border focus-ring" accept="image/*" required>
                                <input type="text" id="email-input" name="email-register" class="form-control form-control-lg mt-3 focus-ring" placeholder="E-mail" required>
                                <input type="text" id="user-input" name="username-register" class="form-control form-control-lg mt-3 border focus-ring" placeholder="Username" required oninput="CheckUserFormat()">
                                <input type="password" id="pass-input" name="password-register" class="form-control form-control-lg mt-3 focus-ring border" placeholder="Contraseña" required oninput="CheckPassword()">
                                <input type="password" id="pass-input2" name="checkpassword-register" class="form-control form-control-lg mt-3 focus-ring border" placeholder="Confirmar contraseña" required oninput="ConfirmPassword()">
                                
                                <div class="mt-1 mb-0">
                                  <p id="no-spaces" class="mb-0" style="margin-left:0; display: none;">¡La contraseña no debe tener espacios!</p>
                                  <p id="pass-confirm" class="mb-0" style="margin-left:0; display: none;">¡Las contraseñas no coinciden!</p>
                              </div>

                                <div>
                                    <div id="pass-bar" class="pass-checkbar mt-3 col-lg-12" style="height: 10px; border-radius: 20px;"></div>
                                </div>

                                <p class="pass-checkbar mt-1 m-1">¿la contraseña es segura?</p>
                                    
                                    <div class="row justify-content-center m-0" style="background-color: white; padding:0%; border-radius: 20px;">
                                      <h4 style="margin-top:10px; margin-bottom: 10px;">Datos personales</h4>
                                        <div class="col-lg-6">
                                          
                                            <input id="name-input" name="name-register" type="text" class="form-control form-control-lg mt-3 border focus-ring" placeholder="Nombre" required oninput="NameCheck()">
                                            <input id="lname-input" name="lname-register" type="text" class="form-control form-control-lg my-3 border focus-ring" placeholder="Apellido Materno" required oninput="LastCheck()"> 
                                            <input id="date-input" name="date-register"type="date" class="form-control-lg form-control my-3" required>
                                        </div>

                                        <div class="col-lg-6">
                                            <input id="fname-input" name="fname-register" type="text" class="form-control form-control-lg my-3 border focus-ring" placeholder="Apellido Paterno" required oninput="FirstCheck()"> 
                                            <select id="gender-input" name="gender-register" class="form-select form-select-lg mt-3" aria-label="Form for gender selection" required>
                                                <option value="" selected disabled>Género</option>
                                                <option value="1">Femenino</option>
                                                <option value="2">Masculino</option>
                                                <option value="3">Otro</option>
                                            </select>

                                            <select id="role-selection" name="role-selection" class="form-select form-select-lg mt-3" aria-label="Form for role selection" required>
                                              <option value="" selected disabled>Rol de usuario</option>
                                              <option value="2">Cliente</option>
                                              <option value="3">Vendedor</option>
                                              
                                          </select>
                                            
                                        </div>

                                        <input type="submit" id="button-register" class="btn btn-secondary mt-3 rounded-pill" value="Registrar" style="width: 150px; margin-bottom:20px;">
                                        
                                    </div>
                                    
                            </div>
                          
                            
                          </form>
                            
                        </div>
                      


                        <!--FORM VENDEDOR-->

                        <div class="col-lg-8 tab-pane fade" id="nav-seller" role="tabpanel" aria-labelledby="nav-seller-tab" style="display:none">
                          <form action="" method="post">
                            <div class="row justify-items-center justify-content-center p-3 m-2" style="border-radius: 20px;">
                              <h3 class="mt-3 text-center">Registro vendedor</h3>
                              <p style="margin: 0%;">Bienvenido a D&B</p>

                              <img src="https://uxwing.com/wp-content/themes/uxwing/download/peoples-avatars/default-avatar-profile-picture-male-icon.png" alt="" style="width: 250px; border-radius: 50%;">

                              <input type="file" name="" id="" class="form-control form-control-lg mt-3">
                              <input type="text" class="form-control form-control-lg mt-3" placeholder="E-mail">
                              <input type="text" class="form-control form-control-lg mt-3" placeholder="Username">
                              <input type="text" class="form-control form-control-lg mt-3" placeholder="Contraseña">
                              <input type="text" class="form-control form-control-lg mt-3" placeholder="Confirmar contraseña">
                              
                              <div>
                                  <div class="pass-checkbar mt-3 col-lg-12" style="height: 10px; background-color: yellow; border-radius: 20px;"></div>
                              </div>

                              <p class="pass-checkbar mt-1 m-1">¿la contraseña es segura?</p>

                              
                              
                                  
                                  
                                  <div class="row justify-content-center m-0" style="background-color: white; padding:0%; border-radius: 20px;">
                                    <h4 style="margin-top:10px; margin-bottom: 10px;">Datos personales</h4>
                                      <div class="col-lg-6">
                                        
                                          <input type="text" class="form-control form-control-lg mt-3" placeholder="Nombre">
                                          <input type="text" class="form-control form-control-lg my-3" placeholder="Apellido Paterno"> 
                                          <input type="date" class="form-control-lg form-control my-3">
                                      </div>

                                      <div class="col-lg-6">
                                          <input type="text" class="form-control form-control-lg my-3" placeholder="Apellido Materno"> 
                                          <select class="form-select form-select-lg mt-3" aria-label="Default select example">
                                              <option selected>Género</option>
                                              <option value="1">Masculino</option>
                                              <option value="2">Femenino</option>
                                              <option value="3">Otro</option>
                                          </select>

                                          
                                      </div>

                                      <input type="button" class="btn btn-secondary mt-3 rounded-pill" value="Registrar" style="width: 150px; margin-bottom:20px ;">
                                  
                                  </div>
                                  
                          </div>
                        
                          
                        </form>
                          
                      </div>
                       

                        
                        
                    
                </div>
            </div>

            
        </div>
      </div>


    <!--FIN CONTAINER REGISTRO CLIENTES-->

    <script src="./src/js/registro.js"></script>
    <script type="module" src="../Views/src/js/firebase-register.js"></script>
</body>
</html>