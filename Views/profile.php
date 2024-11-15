<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./src/css/main.css">
        <link rel="stylesheet" href="./src/css/bootstrap.min.css">
        <script src="./src/js/bootstrap.js"></script>
        <link rel="icon" href="./src/src/logo1.png" type="image/x-icon">
        <title>Perfil</title>
    </head>
</head>
<body>

    <?php include 'navbar.php';?>
    
      <div class="container-fluid justify-content-center text-center" style="margin-top: 60px;">
        <div class="row justify-content-center">
            <div class="col-lg-11">
               
      <div class="profile-container container-fluid justify-content-center">

        <div class="row justify-content-center text-center">
            <div class="col-lg-8 shadow-lg" style="background-color: white; border-radius: 30px;">
                <div class="row justify-content-start">
                    <div class="col-lg-3 rounded-5" style="background-color: #cfe0dc;">
                        <img class="m-1 my-5 rounded-circle object-fit-fill" src="./src/src/avatar.png" alt="" style="width: 200px; height: 200px;">
                        <p style="margin-top: 20px; margin-left:0px">Bienvenido nuevamente, @username</p>
                        <a href="./index.html"><button class="btn btn-light rounded-pill m-3">Cerrar sesión</button></a>
                    </div>
                    <div class="col-lg-9 justify-content-center">
                        <div class="col-lg-11 m-3 p-1">
                            <form action="" class="edit-profile" method="post">
                                <input type="text" class="form-control my-2" placeholder="Username">
                                <input type="text" class="form-control my-2" placeholder="E-mail">
                                
                                <div class="row">
                                    <div class="col-lg-4">
                                        <input type="text" name="name-profile" id="" class="form-control my-2" placeholder="Nombre">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" name="ln1-profile" id="" class="form-control my-2" placeholder="Apellido Paterno">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" name="ln2-profile" id="" class="form-control my-2" placeholder="Apellido Materno">
                                    </div>
                                </div>
                                
                                <input type="password" name="pass-profile" id="" class="form-control my-2" placeholder="Contraseña">
                                <input type="password" name="passconfirm-profile" id="" class="form-control my-2" placeholder="Confirmación de contraseña" disabled>
                                <input type="date" name="bday-profile" id="" class="form-control my-2">
                                <select class="form-select my-2" aria-label="Default select example">
                                    <option selected>Género</option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>
                                    <option value="3">No binario</option>
                                  </select>
                                <input type="file" name="picture-profile" id="" class="form-control my-2">
                                

                                <button type="submit" class="btn btn-secondary rounded-pill my-1" disabled>Guardar</button>
                                
                            </form>
                            <button class="edit btn rounded-pill my-1">Editar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      </div>
</body>
</html>