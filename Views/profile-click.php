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
    
      <div class="container-fluid" style="margin-top: 30px;">
        <div class="row justify-content-center justify-items-center">
            <div class="col-lg-4 p-4 m-4">
                <div class="row justify-items-center justify-content-center text-center p-2">
                    <input type="hidden" id="usid" value="<?php echo htmlspecialchars($user_id)?>">
                    <div class="col-lg-8 bg-light p-3 rounded-4">
                        <img id="img-preview" class="img-fluid border border-rounded rounded-pill m-1" src="./<?php echo htmlspecialchars($user_pic)?>" alt="user(name) profile" style="width: 100px; height:100px;">
                        <h2 class="m-0 mb-2"><?php echo htmlspecialchars($user_name);?></h2>

                        <div class="justify-items-center text-center">
                          <p style="margin-left:0px; margin-bottom:3px;" class="text-bold"> Se unió el: <span class="text-primary"><?php echo htmlspecialchars($user_logdate);?></span></p>
                        </div>
                        
                        <button class="btn btn-sm btn-light border shadow-sm rounded-pill" onclick="Desactivar(<?php echo $user_id;?>)"><span><svg style="margin-bottom:3px; color:red; margin-right: 3px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1
                         0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646
                          2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                        </svg></span>Desactivar</button>

                        <form action="editProfile" class="edit-profile" onsubmit="EditarPerfil(event, <?php echo $user_id; ?>)" enctype="multipart/form-data">
                            <input type="text" id="user-input" name="user-profile" class="form-control my-2 focus-ring" value="<?php echo htmlspecialchars($username);?>" disabled oninput="CheckUserFormat()">
                            <input type="text" id="email-input" name="email-profile"class="form-control my-2 border focus-ring" value="<?php echo htmlspecialchars($user_email);?>" disabled>
                            
                            <div class="row mx-1">
                                <div class="col-lg-4 mx-0 px-0">
                                    <input type="text" name="name-profile" id="name-input" class="form-control my-2 border focus-ring" value="<?php echo htmlspecialchars($user_name);?>" disabled oninput="NameCheck()">
                                </div>
                                <div class="col-lg-4 mx-0 px-0">
                                    <input type="text" name="ln1-profile" id="fname-input" class="form-control my-2 border focus-ring" value="<?php echo htmlspecialchars($user_AP);?>" disabled oninput="FirstCheck()">
                                </div>
                                <div class="col-lg-4 mx-0 px-0">
                                    <input type="text" name="ln2-profile" id="lname-input" class="form-control my-2 border focus-ring" value="<?php echo htmlspecialchars($user_AM);?>" disabled oninput="LastCheck()">
                                </div>
                            </div>
                            
                            <input type="password" name="pass-profile" id="pass-input" class="form-control my-2 border focus-ring" placeholder="Contraseña" disabled oninput="CheckPassword()">
                            <input type="password" name="passconfirm-profile" id="pass-input2" class="form-control my-2 border focus-ring" placeholder="Confirmación de contraseña" disabled oninput="ConfirmPassword()">
                            <div class="mt-1 mb-0">
                                  <p id="no-spaces" class="mb-0" style="margin-left:0; display: none;">¡La contraseña no debe tener espacios!</p>
                                  <p id="pass-confirm" class="mb-0" style="margin-left:0; display: none;">¡Las contraseñas no coinciden!</p>
                              </div>
                            <div>

                                    <div id="pass-bar" class="pass-checkbar mt-3 col-lg-12" style="height: 10px; border-radius: 20px;"></div>
                                </div>

                                <p class="pass-checkbar mt-1 m-1">¿la contraseña es segura?</p>
                                
                            
                            <input type="date" name="bday-profile" id="date-register" class="form-control my-2 border focus-ring" value="<?php echo htmlspecialchars(date('Y-m-d', strtotime($user_bday))); ?>" disabled>
                            <select class="form-select my-2" aria-label="Default select example" disabled name="gender">
                                <option value="" disabled>Género</option>
                                <option value="1" <?php echo ($user_gender == '1') ? 'selected' : '';?>>Femenino</option>
                                <option value="2" <?php echo ($user_gender == '2') ? 'selected' : '';?>>Masculino</option>
                                <option value="3" <?php echo ($user_gender == '3') ? 'selected' : '';?>>Otro</option>
                              </select>
                            <input type="file" name="picture-profile" id="pic-input" class="form-control my-2 border focus-ring" accept="image/*">
                            
                            
                            <button type="submit" class="btn btn-secondary rounded-pill my-1" id="button-register" style="width:150px;" disabled>Guardar</button>
                            
                        </form>
                        <button class="btn btn-danger rounded-pill my-1 mb-1 border"  style="width:150px;" onclick="ToggleInputs()">Editar</button>
                        


                    </div>

                    
                </div>
            </div>
            <div class="col-lg-7 mt-0" >

                <div class="hidden-profile text-center">
                    <h2 class="ms-0 p-5 mt-5"><span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                      </svg></span> Este usuario bloqueó su perfil</h2>
                </div>
                
                <div class="user-list hidden-list p-4" style="margin-top:100px">
                    <div class="d-flex">
                        <a href="../Controllers/CategoryController.php?view=pedidos" class="btn bg-white border shadow-sm"><svg style="margin-bottom:4px; margin-right:4px; color:lightsteelblue" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5
                         0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2
                          2 0 0 0 2 2h10a2 2 0 0 0 2-2V4z"/>
                        </svg>Consultar mis pedidos</button></a>
                        <a href="../Views/messages.php?id=<?php echo $user_id;?>"><button class="ms-2 btn bg-white border shadow-sm"><svg style="margin-bottom:3px; margin-right:4px; color:lightsteelblue" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 
                        2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7
                         4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15
                          11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1
                           1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                        </svg>Mis Mensajes</button></a>
                    </div>
                    
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