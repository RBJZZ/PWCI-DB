<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/main.css">
    <link rel="stylesheet" href="./src/css/profile.css">
    <link rel="stylesheet" href="./src/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="./src/js/bootstrap.js"></script>
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
                        <img class="img-fluid border m-1" src="./src/src/avatar.png" alt="user(name) profile" style="width: auto;">
                        <h2 class="m-0 mb-2">Profile name</h2>

                        <div class="justify-items-center text-start">
                          <p class="text-bold"> Se unió en: <span class="text-primary">FECHA DATABASE</span></p>
                        </div>

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
                        <button class="btn rounded-pill my-1 mb-4" hidden>Editar</button>
                        


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
                    <h2 class="ms-2 mt-2">Lista de deseos</h2>

                    <div class="card-group">
                
                        <div class="card mx-1 shadow-sm">
                          <a href="./product-view.html"><img src="./src/src/img1.png" class="card-img-top" alt="..."></a>
                        <div class="card-body">
                          <h5 class="card-title">$0.00</h5>
                          
                        </div>
                      </div>
                    
                      <div class="card mx-1 shadow-sm">
                      <a href="./product-view.html"><img src="./src/src/img2.png" class="card-img-top" alt="..."></a>
                      <div class="card-body">
                        <h5 class="card-title">$0.00</h5>
                      
                      </div>
                    </div>
                    
                      <div class="card mx-1 shadow-sm">
                      <a href="./product-view.html"><img src="./src/src/img3.png" class="card-img-top" alt="..."></a>
                      <div class="card-body">
                        <h5 class="card-title">$0.00</h5>
                        
                      </div>
                    </div>
                    
                      <div class="card mx-1 shadow-sm">
                      <a href="./product-view.html"><img src="./src/src/img4.png" class="card-img-top" alt="..."></a>
                      <div class="card-body">
                        <h5 class="card-title">$0.00</h5>
                      </div>
                    </div>
                   
                      <div class="card mx-1 shadow-sm">
                      <a href="./product-view.html"><img src="./src/src/img1.png" class="card-img-top" alt="..."></a>
                      <div class="card-body">
                        <h5 class="card-title">$0.00</h5>
                      </div>
                    </div>
                   
                      <div class="card mx-1 shadow-sm">
                      <a href="./product-view.html"><img src="./src/src/img2.png" class="card-img-top" alt="..."></a>
                      <div class="card-body">
                        <h5 class="card-title">$0.00</h5>
                        
                      </div>
                    </div>
                    
                  </div>

                  <h2 class="ms-2 mt-2">Otras listas</h2>

                  <h4 class="ms-2 mt-2"> Lista 2</h4>

                  <div class="card-group">
              
                      <div class="card mx-1 shadow-sm">
                        <a href="./product-view.html"><img src="./src/src/img1.png" class="card-img-top" alt="..."></a>
                      <div class="card-body">
                        <h5 class="card-title">$0.00</h5>
                        
                      </div>
                    </div>
                  
                    <div class="card mx-1 shadow-sm">
                    <a href="./product-view.html"><img src="./src/src/img2.png" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                      <h5 class="card-title">$0.00</h5>
                    
                    </div>
                  </div>
                  
                    <div class="card mx-1 shadow-sm">
                    <a href="./product-view.html"><img src="./src/src/img3.png" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                      <h5 class="card-title">$0.00</h5>
                      
                    </div>
                  </div>
                  
                    <div class="card mx-1 shadow-sm">
                    <a href="./product-view.html"><img src="./src/src/img4.png" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                      <h5 class="card-title">$0.00</h5>
                    </div>
                  </div>
                 
                    <div class="card mx-1 shadow-sm">
                    <a href="./product-view.html"><img src="./src/src/img1.png" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                      <h5 class="card-title">$0.00</h5>
                    </div>
                  </div>
                 
                    <div class="card mx-1 shadow-sm">
                    <a href="./product-view.html"><img src="./src/src/img2.png" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                      <h5 class="card-title">$0.00</h5>
                      
                    </div>
                  </div>
                  
                </div>

                <h4 class="ms-2 mt-2"> Lista 3</h4>

                <div class="card-group">
            
                    <div class="card mx-1 shadow-sm">
                      <a href="./product-view.html"><img src="./src/src/img1.png" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                      <h5 class="card-title">$0.00</h5>
                      
                    </div>
                  </div>
                
                  <div class="card mx-1 shadow-sm">
                  <a href="./product-view.html"><img src="./src/src/img2.png" class="card-img-top" alt="..."></a>
                  <div class="card-body">
                    <h5 class="card-title">$0.00</h5>
                  
                  </div>
                </div>
                
                  <div class="card mx-1 shadow-sm">
                  <a href="./product-view.html"><img src="./src/src/img3.png" class="card-img-top" alt="..."></a>
                  <div class="card-body">
                    <h5 class="card-title">$0.00</h5>
                    
                  </div>
                </div>
                
                  <div class="card mx-1 shadow-sm">
                  <a href="./product-view.html"><img src="./src/src/img4.png" class="card-img-top" alt="..."></a>
                  <div class="card-body">
                    <h5 class="card-title">$0.00</h5>
                  </div>
                </div>
               
                  <div class="card mx-1 shadow-sm">
                  <a href="./product-view.html"><img src="./src/src/img1.png" class="card-img-top" alt="..."></a>
                  <div class="card-body">
                    <h5 class="card-title">$0.00</h5>
                  </div>
                </div>
               
                  <div class="card mx-1 shadow-sm">
                  <a href="./product-view.html"><img src="./src/src/img2.png" class="card-img-top" alt="..."></a>
                  <div class="card-body">
                    <h5 class="card-title">$0.00</h5>
                    
                  </div>
                </div>
                
              </div>

                </div>
                
                
            </div>
        </div>
      </div>

      <script src="./src/js/bootstrap.bundle.min.js"></script>

</body>
</html>