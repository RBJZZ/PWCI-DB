<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <link rel="stylesheet" href="../Views/src/css/product.css">
    <link rel="stylesheet" href="../Views/src/css/bootstrap.min.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="../Views/src/js/bootstrap.js"></script>
    <link rel="icon" href="../Views/src/src/logo1.png" type="image/x-icon">
    <?php if (isset($producto)): ?>
    <title>Vista de producto</title>
</head>
<body>

    <?php include 'navbar.php';?>

      <div class="container-fluid" style="margin-top: 60px; padding-top:20px;">
      <input type="hidden" id="producto-id" value="<?php echo htmlspecialchars($product_id)?>">

        <div class="row justify-content-center">

            <div class="col-lg-1 col-sm-3 m-2 product-thumbnail">
              <div class="mt-5 p-0">

              <?php foreach($producto['imgs'] as $imagen):?>
                <div class="mini-thumb m-1 p-0">
                <img class="img-thumbnail" src="../Views/<?php echo htmlspecialchars($imagen['img_url']);?>" alt="">
                </div>
                <?php endforeach;?>
                <!--/div-->

              </div>
                
            </div>

            <div class="col-lg-5 m-2">
                <div id="carouselExample" class="carousel slide mt-5">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="../<?php echo htmlspecialchars($producto['dt']['icon']);?>" class="d-block w-100 img-fluid" alt="...">
                      </div>
                      <?php foreach($producto['imgs'] as $imagen):?>
                      <div class="carousel-item">
                        <img src="../Views/<?php echo htmlspecialchars($imagen['img_url']);?>" class="d-block w-100 img-fluid" alt="...">
                      </div>
                      <?php endforeach;?>
                      <div class="carousel-item">
                      <iframe class="embed-responsive-item" 
                              src="<?php echo htmlspecialchars($producto['dt']['videolink'])?>" 
                              allowfullscreen 
                              style="width: 100%; height: 500px; border: none;">
                      </iframe>
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
            </div>
            <div class="col-lg-4 m-2">
              <a class="link-secondary text-decoration-none" href="../Controllers/SellerController.php?view=sellerpf&uid=<?php echo htmlspecialchars($producto['dt']['seller_id'])?>"><h5 class="mx-3"><?php echo htmlspecialchars($producto['dt']['seller_name'])?></h5></a>
                <h2 class="mx-3" style="background-color: white; margin-bottom: 0%;"><?php echo htmlspecialchars($producto['dt']['title']);?></h2>


                <div class="row justify-content-start px-3">
                  <div class="col-lg-9">

                    <div class="rating__average_top my-3" style="padding:0%; width: 150px; background-color: rgba(239, 239, 239, 0.711);">
                        <div class="star-outer-top">
                          <div class="star-inner-top">
                          </div>
                        </div>
                       
                    </div>


                    <a class="link-secondary text-decoration-none" href="../Controllers/SearchController.php?c=<?php echo htmlspecialchars($producto['dt']['category'])?>"><h5>#<?php echo htmlspecialchars($producto['dt']['category']);?></h5></a>
                  </div>
                </div>

                
                      <?php if(isset($producto['dt']['quotable']) && $producto['dt']['quotable']!=1){?>
                <h4 class="m-2 px-2" style=>$<?php echo htmlspecialchars($producto['dt']['price']);?></h4>
                      <?php }?>
              <div class="row justify-content-center justify-items-center text-center">
                <div class="col-lg-9">
                  <button onclick="quitItem()" class="btn-action btn bg-light border shadow-sm" id="minus">-</button>
                  <button class="btn-action btn bg-light border shadow-sm" id="items" disabled>1</button>   
                  <button onclick="addItem()" class="btn-action btn bg-light border shadow-sm" id="plus">+</button>
                  <button class="btn-action btn bg-light border shadow-sm" onclick="agregarACarrito(<?php echo $user_id?>,<?php echo $producto['dt']['id']?>,items)"><span><svg style="margin-bottom:3px;"xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                  </svg></span> Agregar al carrito</button>
                  <button class="btn-action btn bg-light border shadow-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-heart" viewBox="0 0 16 16">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                  </svg></span></button>
                </div>
                <p class="mb-0 mt-2 fw-bold">Pieza(s) disponible(s): <?php echo htmlspecialchars($producto['dt']['stock']);?></p>
                <?php if(isset($producto['dt']['quotable'])&& $producto['dt']['quotable']!=0){?>
                <p class="mb-3">¿Deseas hacer una cotización? Solicitala <span class="fw-bold"><a class="text-decoration-none createconv" href="../Views/messages.php"
                data-us="<?php echo htmlspecialchars($user_id);?>"
                data-p="<?php echo htmlspecialchars($producto['dt']['id']);?>"
                data-s="<?php echo htmlspecialchars($producto['dt']['seller_id']);?>">aquí</a></span></p>
                <?php }?>
              </div>


                  <script>

                    const cartItems=document.getElementById('items');
                    let items=1;

                    function addItem(){
                      items++;
                      cartItems.textContent=items;
                    }

                    function quitItem(){
                      if(items>1){
                        items--;
                        cartItems.textContent=items;
                      }
                    }



                  </script>

               

                <!--MODAL PARA AGREGAR A NUEVA LISTA-->

                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar a una lista</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row justify-content-center p-3 m-2">

                          <div class="col-12 justify-content-center">

                            <div class="row">
                              <div class="col-11 ms-2">
                                <div class="mb-3 d-flex justify-content-center">
                                  <button class="btn btn-md btn-light border listform-toggle rounded-pill" onclick="ToggleCreatelist()">Nueva Lista</button>
                                </div>
                                

                              </div>

                              <div class="col-11 mb-3">
                                <form action="#" method="post" class="create-list ms-4">

                                  <div class="mb-3 pt-2 pb-2">
                                    <label for="Listname" class="form-label">Nombre de la lista</label>
                                    <input type="text" class="form-control" id="Listname" placeholder="Ej:'Skincare'">
                                  </div>
                                  <div class="mb-3">
                                    <label for="Listdesc" class="form-label">Descripcion</label>
                                    <textarea class="form-control" name="Listdesc" id="Listdesc" rows="3" placeholder="Ej:'Productos para la piel'"></textarea>
                                  </div>
                                  <div class="mb-3">
                                  <input type="checkbox" name="ListVisible" id="ListVisible" class="form-check-input for"><span><label for="ListVisible" class="ms-1 p-1 pb-1 form-label">Privada </label></span>
                                  </div>
                                  <div class="mb-3 d-flex justify-content-center">
                                    <button class="btn btn-md btn-light rounded-pill" type="submit" disabled>Guardar</button>
                                  </div>
                                  

                                </form>
                               
                              </div>
                            </div>
                            
                            <script>

                              let showform=null;

                              function ToggleCreatelist(){

                                const togglebtn=document.querySelector('.listform-toggle');
                                const form=document.querySelector('.create-list');

                                if(showform===null){
                                 form.style.display='block';
                                 showform=true;
                                }else{
                                  form.style.display='none';
                                  showform=null;
                                }

                                if(showform===true){
                                  togglebtn.textContent='Ocultar Formulario';
                                }else{
                                  togglebtn.textContent='Nueva Lista';
                                }
                                
                              }

                            </script>

                            <div class="lists">
                            <div class="card text-bg-dark checkbox" id="1" onclick="ListClick(this)">
                              <img src="../Views/src/src/img2.png" class="card-img" alt="...">
                              <div class="card-img-overlay">
                                <h5 class="card-title">LISTA 1</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small>Last updated 3 mins ago</small></p>
                              </div>
                            </div>


                            <div class="card text-bg-dark checkbox" id="2" onclick="ListClick(this)">
                              <img src="../Views/src/src/img4.png" class="card-img" alt="...">
                              <div class="card-img-overlay">
                                <h5 class="card-title">LISTA 2</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small>Last updated 3 mins ago</small></p>
                              </div>
                            </div>

                            <div class="card text-bg-dark checkbox" id="3" onclick="ListClick(this)">
                              <img src="../Views/src/src/img1.png" class="card-img" alt="...">
                              <div class="card-img-overlay">
                                <h5 class="card-title">LISTA 3</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small>Last updated 3 mins ago</small></p>
                              </div>
                            </div>

                          </div>
                            
                          </div>

                          


                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-light border" onclick="toggleSelection()">Guardar</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!--SCRIPT SELECCION DE OPCIONES-->
                
                <script>

                  let selectedElement = null;
                  let selectionID = null;

                  function ListClick(element) {
                    
                    if (selectedElement && selectedElement !== element) {
                      selectedElement.style.border = "";
                    }
                    selectedElement = element;

                    element.style.border = "2px solid green";

                    selectionID = element.id;
                    console.log("ID:", selectionID);
                  }

                  function toggleSelection(){
                    if(selectionID!=null){
                      console.log("Se enviará a la base de datos el ID:",selectionID);
                      agregarALista(selectionID, <?php echo $producto['dt']['id']?>);
                    }else{
                      console.log("No seleccionaste nada jaja");
                    }
                  }

                
                </script>


                <!--FIN DEL MODAL-->

                <!--ACORDION-->
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" style="margin-left: 0px;">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Product description
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <p><?php echo htmlspecialchars($producto['dt']['product_desc']);?></p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" style="margin-left: 0px;">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Promotions
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum eum, reiciendis cupiditate hic nostrum, illo ipsam repudiandae expedita eveniet officia libero itaque laborum qui voluptas porro illum, consectetur tenetur. Corporis?</p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" style="margin-left: 0px;">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Payment methods
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        <?php foreach ($producto['mp'] as $metodo): ?>
                        <li><?php echo htmlspecialchars($metodo['method_type']); ?></li>
                        <?php endforeach; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <!--FIN DEL ACORDION-->
                
            </div>
            
        </div>
        <!--CALIFICACION DE ESTRELLAS-->
        <div class="row justify-content-center justify-items-center mt-5">
          <h2 class="text-center">Calificación del producto</h2>
          <div class="col-lg-6 app">
            <div class="rating">
              <div class="rating__average">
                <h2><?php echo htmlspecialchars($producto['stars']);?></h1>
                  <div class="star-outer">
                    <div class="star-inner">

                    </div>
                  </div>
                  <p>290,291</p>
              </div>
              <div class="rating__progress">

              </div>
            </div>
          </div>
        </div>
        <!--SCRIPT BARRA DINAMICA DE RATING-->
        <script>
          let data=[{
            'star':5,
            'count':100098,
          },
          {
            'star':4,
            'count':13990,
          },
          {
            'star':3,
            'count':25050,
          },
          {
            'star':2,
            'count':1340,
          },
          {
            'star':1,
            'count':567,
          }
        ]
        
        let total_rating=0,
        rating_based_on_stars=0;

        data.forEach(rating=>{
          total_rating+=rating.count;
          rating_based_on_stars+=rating.count*rating.star;
        });

        data.forEach(rating=>{
          let rating_progress=`
                <div class="rating__progress-value">
                  <p>${rating.star}<span class="star">&#9733;</span></p>
                  <div class="prog">
                    <div class="bar" style="width: ${(rating.count/total_rating)*100}%;"></div>
                  </div>
                  <p>${rating.count.toLocaleString()}</p>
                </div>
          `;
          document.querySelector('.rating__progress').innerHTML+=rating_progress;
        });

        let rating_average=(rating_based_on_stars/total_rating).toFixed(1);
        document.querySelector('.rating__average h2').innerHTML=rating_average;
        document.querySelector('.rating__average p').innerHTML=total_rating.toLocaleString();
        document.querySelector('.star-inner').style.width= (rating_average / 5)*100 +"%";
        document.querySelector('.star-inner-top').style.width= (rating_average / 5)*100 +"%";

        </script>
        <!--SCRIPT BARRA DINAMICA DE RATING-->

        <!--FIN CALIFICACION DE ESTRELLAS-->

        <!--SECCION DE COMENTARIOS-->
        <div class="row justify-content-center justify-items-center text-center">
          <div class="col-lg-6">
            <h2>Comentarios de compradores</h2>
          </div>
        </div>
       
        <div class="row justify-content-center m-3">
           
            <div id="comentarios-dinamicos" class="col-lg-10 col-sm-11">
               
            
            </div>
        
        </div>
        <!--OTROS ARTICULOS-->
        <div class="row justify-content-center text-center mx-5">
          
          <h2 class="my-5">Otros artículos de <span><a href="#"><?php echo htmlspecialchars($producto['dt']['seller_name']);?></a></span></h2>
          
          <div class="horizontal-scroll-container">
            <div class="horizontal-scroll">
  
            <?php
          if(isset($prodvend) && !empty($prodvend)){
          foreach ($prodvend as $p) {
              ?>
                  <div class="card shadow-md rounded-0" style="width: 18rem;">
                    
                      <div class="img-container">
                      <img src="../<?php echo htmlspecialchars($p['thumb']); ?>" class="card-img-top rounded-0 img-thumbnail" alt="Product Image">
                      </div>
                      
                      <div class="card-body">
                          
                          <h5 class="card-title"><?php echo htmlspecialchars($p['title']); ?></h5>
                          
                          <p class="card-text">$<?php echo number_format($p['price'], 2); ?></p>
                          
                          <a href="../Controllers/ProductosController.php?id=<?php echo $p['id'];?>" class="btn btn-card rounded-0">Ver Producto</a>
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

      </div>

      <?php else: ?>
        <p>No se encontraron detalles del producto</p>
      <?php endif; ?>

      <script src="../Views/src/js/product.js"></script>

</body>
</html>