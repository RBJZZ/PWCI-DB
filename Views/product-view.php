<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <link rel="stylesheet" href="../Views/src/css/product.css">
    <link rel="stylesheet" href="../Views/src/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="./src/js/bootstrap.js"></script>
    <link rel="icon" href="../Views/src/src/logo1.png" type="image/x-icon">
    <?php if (isset($producto)): ?>
    <title>Vista previa</title>
</head>
<body>

    <?php include 'navbar.php';?>

      <div class="container-fluid" style="margin-top: 60px; padding-top:20px;">
        <div class="row justify-content-center">

            <div class="col-lg-1 col-sm-3 m-2 product-thumbnail">
              <div class="mt-5 p-0">

              <?php foreach($producto['imgs'] as $imagen):?>
                <img class="img-thumbnail m-1" src="../Views/<?php echo htmlspecialchars($imagen['img_url']);?>" alt="">
                <?php endforeach;?>

              </div>
                
            </div>

            <div class="col-lg-5 m-2">
                <div id="carouselExample" class="carousel slide mt-5">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="../Views/<?php echo htmlspecialchars($producto['dt']['icon']);?>" class="d-block w-100 img-fluid" alt="...">
                      </div>
                      <?php foreach($producto['imgs'] as $imagen):?>
                      <div class="carousel-item">
                        <img src="../Views/<?php echo htmlspecialchars($imagen['img_url']);?>" class="d-block w-100 img-fluid" alt="...">
                      </div>
                      <?php endforeach;?>
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
              <a class="link-secondary text-decoration-none" href="./profile-seller.html"><h5 class="mx-3"><?php echo htmlspecialchars($producto['dt']['seller_name'])?></h5></a>
                <h2 class="mx-3" style="background-color: white; margin-bottom: 0%;"><?php echo htmlspecialchars($producto['dt']['title']);?></h2>


                <div class="row justify-content-start px-3">
                  <div class="col-lg-9">

                    <div class="rating__average_top my-3" style="padding:0%; width: 150px; background-color: rgba(239, 239, 239, 0.711);">
                        <div class="star-outer-top">
                          <div class="star-inner-top">
                          </div>
                        </div>
                       
                    </div>


                    <!--ESTRELLAS PARA CALIFICAR-->

                    <div class="hidden">
                    <button class="star">&#9734;</button>
                    <button class="star">&#9734;</button>
                    <button class="star">&#9734;</button>
                    <button class="star">&#9734;</button>
                    <button class="star">&#9734;</button>
                   
                    <script>
                      const allStars=document.querySelectorAll('.star');
                      console.log(allStars);
                      
                      allStars.forEach((star,i)=>{
                        star.onclick=function(){
                     
                          let current_star_level=i+1;
                          console.log(current_star_level);
                          allStars.forEach((star,j)=>{
                            if(current_star_level>=j+1){
                              star.innerHTML='&#9733';
                            }else{
                              star.innerHTML="&#9734";
                            }

                          })
                        }
                      })
                      

                    </script>
                    </div>
                    

                    <!--FIN DE LAS ESTRELLAS PARA CALIFICAR-->


                    <a class="link-secondary text-decoration-none" href="#"><h5>#<?php echo htmlspecialchars($producto['dt']['category']);?></h5></a>
                  </div>
                </div>


                <h4 class="m-2 px-2" style=>$<?php echo htmlspecialchars($producto['dt']['price']);?></h4>
              <div class="row justify-content-center justify-items-center text-center">
                <div class="col-lg-9">
                  <button onclick="quitItem()" class="btn-action btn bg-light border shadow-sm" id="minus">-</button>
                  <button class="btn-action btn bg-light border shadow-sm" id="items" disabled>1</button>
                  <button onclick="addItem()" class="btn-action btn bg-light border shadow-sm" id="plus">+</button>
                  <button class="btn-action btn bg-light border shadow-sm"><span><svg style="margin-bottom:3px;"xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                  </svg></span> Agregar al carrito</button>
                  <button class="btn-action btn bg-light border shadow-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-heart" viewBox="0 0 16 16">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                  </svg></span></button>
                </div>
                <p class="mb-0 mt-2 fw-bold">Pieza(s) disponible(s): <?php echo htmlspecialchars($producto['dt']['stock']);?></p>
                <p class="mb-3">¿Deseas hacer una cotización? Solicitala <span class="fw-bold"><a class="text-decoration-none" href="./messages.html">aquí</a></span></p>
              </div>

                
                <!--SCRIPT PARA AUMENTO DE ITEMS DE LA COMPRA-->

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



                <!--FIN DEL SCRIPT DE AUMENTO DE ITEMS-->

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
                                    <textarea class="form-control" id="Listdesc" rows="3" placeholder="Ej:'Productos para la piel'"></textarea>
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


                            <div class="card text-bg-dark checkbox" id="1" onclick="ListClick(this)">
                              <img src="./src/src/img2.png" class="card-img" alt="...">
                              <div class="card-img-overlay">
                                <h5 class="card-title">LISTA 1</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small>Last updated 3 mins ago</small></p>
                              </div>
                            </div>


                            <div class="card text-bg-dark checkbox" id="2" onclick="ListClick(this)">
                              <img src="./src/src/img4.png" class="card-img" alt="...">
                              <div class="card-img-overlay">
                                <h5 class="card-title">LISTA 2</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small>Last updated 3 mins ago</small></p>
                              </div>
                            </div>

                            <div class="card text-bg-dark checkbox" id="3" onclick="ListClick(this)">
                              <img src="./src/src/img1.png" class="card-img" alt="...">
                              <div class="card-img-overlay">
                                <h5 class="card-title">LISTA 3</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small>Last updated 3 mins ago</small></p>
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
           
            <div class="col-lg-10 col-sm-11">
                <article class="media">
                    <figure class="media-left">
                      <p class="image is-64x64">
                        <img src="https://bulma.io/assets/images/placeholders/128x128.png" />
                      </p>
                    </figure>
                    <div class="media-content">
                      <div class="content">
                        <p>
                          <strong>Barbara Middleton</strong>
                          <br />
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta eros
                          lacus, nec ultricies elit blandit non. Suspendisse pellentesque mauris
                          sit amet dolor blandit rutrum. Nunc in tempus turpis.
                          <br />
                          <small><a>Like</a> · <a>Reply</a> · 3 hrs</small>
                        </p>
                      </div>
                  
                      <article class="media">
                        <figure class="media-left">
                          <p class="image is-48x48">
                            <img src="https://bulma.io/assets/images/placeholders/96x96.png" />
                          </p>
                        </figure>
                        <div class="media-content">
                          <div class="content">
                            <p>
                              <strong>Sean Brown</strong>
                              <br />
                              Donec sollicitudin urna eget eros malesuada sagittis. Pellentesque
                              habitant morbi tristique senectus et netus et malesuada fames ac
                              turpis egestas. Aliquam blandit nisl a nulla sagittis, a lobortis
                              leo feugiat.
                              <br />
                              <small><a>Like</a> · <a>Reply</a> · 2 hrs</small>
                            </p>
                          </div>
                  
                          <article class="media">
                            Vivamus quis semper metus, non tincidunt dolor. Vivamus in mi eu lorem
                            cursus ullamcorper sit amet nec massa.
                          </article>
                  
                          <article class="media">
                            Morbi vitae diam et purus tincidunt porttitor vel vitae augue.
                            Praesent malesuada metus sed pharetra euismod. Cras tellus odio,
                            tincidunt iaculis diam non, porta aliquet tortor.
                          </article>
                        </div>
                      </article>
                  
                      <article class="media">
                        <figure class="media-left">
                          <p class="image is-48x48">
                            <img src="https://bulma.io/assets/images/placeholders/96x96.png" />
                          </p>
                        </figure>
                        <div class="media-content">
                          <div class="content">
                            <p>
                              <strong>Kayli Eunice </strong>
                              <br />
                              Sed convallis scelerisque mauris, non pulvinar nunc mattis vel.
                              Maecenas varius felis sit amet magna vestibulum euismod malesuada
                              cursus libero. Vestibulum ante ipsum primis in faucibus orci luctus
                              et ultrices posuere cubilia Curae; Phasellus lacinia non nisl id
                              feugiat.
                              <br />
                              <small><a>Like</a> · <a>Reply</a> · 2 hrs</small>
                            </p>
                          </div>
                        </div>
                      </article>
                    </div>
                  </article>
                  
                  <article class="media">
                    <figure class="media-left">
                      <p class="image is-64x64">
                        <img src="https://bulma.io/assets/images/placeholders/128x128.png" />
                      </p>
                    </figure>
                    <div class="media-content">
                      <div class="field">
                        <p class="control">
                          <textarea class="textarea" placeholder="Escribe un comentario..." style="background-color: white; color: black;"></textarea>
                        </p>
                      </div>
                      <div class="field">
                        <p class="control">
                          <button class="button">Publicar comentario</button>
                        </p>
                      </div>
                    </div>
                  </article>
            </div>
        
        </div>
        <!--OTROS ARTICULOS-->
        <div class="row justify-content-center text-center mx-5">
          
          <h2 class="my-5">Otros artículos similares de <span><a href="./profile-seller.html">USERSELLER001</a></span></h2>
          <div class="col-lg-2 col-md-6 mb-3">
            <div class="card shadow-lg" style="width: 18rem;">
              <img src="./src/src/img1.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="./product-view.html" class="btn btn-secondary">Go somewhere</a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 mb-3">
            <div class="card shadow-lg" style="width: 18rem;">
              <img src="./src/src/img2.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="./product-view.html" class="btn btn-secondary">Go somewhere</a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 mb-3">
            <div class="card shadow-lg" style="width: 18rem;">
              <img src="./src/src/img3.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="./product-view.html" class="btn btn-secondary">Go somewhere</a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6">
            <div class="card shadow-lg" style="width: 18rem;">
              <img src="./src/src/img4.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="./product-view.html" class="btn btn-secondary">Go somewhere</a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6">
            <div class="card shadow-lg" style="width: 18rem;">
              <img src="./src/src/img1.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="./product-view.html" class="btn btn-secondary">Go somewhere</a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6">
            <div class="card shadow-lg" style="width: 18rem;">
              <img src="./src/src/img2.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="./product-view.html" class="btn btn-secondary">Go somewhere</a>
              </div>
            </div>
          </div>


        </div>

      </div>

      <?php else: ?>
        <p>No se encontraron detalles del producto</p>
      <?php endif; ?>


</body>
</html>