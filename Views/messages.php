<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/messages.css">
    <link rel="stylesheet" href="./src/css/main.css">
    <link rel="stylesheet" href="./src/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="./src/js/bootstrap.js"></script>
    <link rel="icon" href="./src/src/logo1.png" type="image/x-icon">
    <title>Mensajes</title>
</head>
<body>

    
    <?php include 'navbar.php';?>
    <?php if(isset($_SESSION['user_id'])&&$_SESSION['user_type']==='seller'){?>
      <input type="text" id="sellerId" hidden value="<?php echo htmlspecialchars($_SESSION['user_id']);?>">
      <?php } ?>
    <div class="container-fluid" style="margin-top: 58px;">
        <div class="row justify-content-center">
            <div class="col-lg-3 text-center border">
                <h4 class="mt-3 p-2">Mensajes</h4>
                <ul class="list-group list-lg" style="height: 900px;">
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3 my-1">
                        Usuario01
                      <span class="badge text-bg-primary rounded-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3 my-1">
                      Usuario02
                      <span class="badge text-bg-primary rounded-pill">2</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3 my-1">
                      Usuario03
                      <span class="badge text-bg-primary rounded-pill">1</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3 my-1">
                        Usuario04
                        <span class="badge text-bg-primary rounded-pill">78</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center p-3 my-1">
                        Usuario05
                        <span class="badge text-bg-primary rounded-pill">2</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center p-3 my-1">
                        Usuario06
                        <span class="badge text-bg-primary rounded-pill">16</span>
                      </li>
                  </ul>
            </div>
            <div class="col-lg-9 bg-light border">

                <div class="row justify-content-center bg-light border">
                    <h4 class="p-3 text-center border">TEST</h4>
                    <div class="row justify-content-center text-center bg-light">
                      <div class="d-flex col-lg-7">
                      
                       <div class="col-1">
                           <img src="../Views/src/src/img-placeholder.png" alt="" id="thumb-product" style="width:50px; height:50px; object-fit:contain;">
                       </div> 
                       
                       <div class="col-4">
                          <p style="margin-left:0%; margin-bottom:0%" id="product-name">Nombre del producto</p>
                        </div>
                       
                       <div class="col-3">
                         <input class="form-control" type="text" id="cantidad" name="cantidad" placeholder="0 pz">
                       </div>
                        
                        <div class="col-3">
                           <input class="form-control" type="text" id="precio" name="precio" placeholder="$0.00">
                        </div>

                        <div class="col-">
                          <button type="submit" class="btn btn-md btn-light border shadow-sm" onclick=""><span><svg style="margin-left:3px; margin-bottom:4px;" xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16
                             0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477
                              9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97
                               11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75
                                0 0 0-.01-1.05z"/>
                          </svg></span></button>
                        </div>
                      
                        
                      
                         <input class="form-control" type="text" hidden id="product-id" name="product-id">
                         <input class="form-control" type="text" hidden id="seller-id" name="seller-id">
                      
                        
                       
                      </form>
                      </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <ul class="list-group p-2 m-2 d-flex flex-column" id="message-list">
                        
                    </ul>

                    <div class="input-container">
                      <div class="container">
                          <div class="row">
                              <div class="col-lg-10 col-sm-6">
                                <input type="hidden" id="chatId" value="">
                                <input type="hidden" id="senderId" value="<?php echo ($user_id);?>">
                                  <input class="form-control form-control-md rounded-pill" type="text" name="message" id="newmessage" placeholder="Escribe un mensaje...">
                              </div>
                              <div class="col-lg-2 col-sm-2">
                                  <button class="btn btn-primary btn-md rounded-pill w-100" type="button" id="sendButton"><span><i class="bi bi-send-fill"></i></span> Enviar</button>
                              </div>
                          </div>
                      </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    <script src="../Views/src/js/messages.js"></script>
</body>
</html>