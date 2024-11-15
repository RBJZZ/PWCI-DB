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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <title>Consultar ventas</title>

</head>
<body>

  <?php include 'navbar.php';?>

      <div class="container-fluid" style="margin-top:58px">

        <div class="row justify-content-center">
            <div class="col-lg-11 bg-light d-flex justify-content-center">

                <div class="input-group my-3 " style="max-width: 600px;">
                    <span class="input-group-text" id="basic-addon1">
                      <i class="bi bi-search"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar" aria-describedby="basic-addon1">
                  </div>

            </div>
        </div>

        <div class="row justify-content-center mt-2">

            <div class="col-lg-2">
                <select class="form-select" id="consult-type" aria-label="Default select example" onchange="ChangeFilters()">
                    <option selected>Tipo de consulta</option>
                    <option value="1">Detallada</option>
                    <option value="2">General</option>
                    <option value="3">Edición de stock</option>
                  </select>
            </div>

            <div class="col-lg-2" id="box-hide">
                <input class="form-control detailed-input" type="date" name="" id="">
                <input class="form-control general-input" type="month" placeholder="Mes" style="display:none">
            </div>

            <div class="col-lg-2 detailed-input">
                <input class="form-control" type="date" name="" id="">
            </div>

            <div class="col-lg-2">
                <select class="form-select category-filter" aria-label="Default select example">
                    <option selected>Seleccione categoría</option>
                    <option value="1">Todas</option>
                    <option value="2">Jardinería</option>
                    <option value="3">Línea Blanca</option>
                    <option value="4">Zapatos</option>
                    <option value="5">Libros</option>
                    <option value="6">etc...</option>
                  </select>
            </div>
            
        </div>

        <div class="row justify-content-center my-2 mx-5" id="detailed-consult" style="display:none">
            <div class="col-lg-10">
                
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fecha de venta</th>
                        <th scope="col" style="max-width: 200px;">Thumbnail</th>
                        <th scope="col">Nombre del producto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Disponibles</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
  
                        
                        <td>001</td>
                        <th scope="row">DD/MM/YYYY</th>
                        <td>
                          <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                        </td>
                        <td>Producto 1</td>
                        <td>$45.00</td>
                        <td>10</td>
                      </tr>
                      <tr>
  
                        <td>002</td>
                        <th scope="row">DD/MM/YYYY</th>
                        <td>
                          <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                        </td>
                        <td>Producto 2</td>
                        <td>$45.00</td>
                        <td>122</td>
                      </tr>
                      <tr>


                        <td>003</td>
                        <th scope="row">DD/MM/YYYY</th>
                        <td>
                          <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                        </td>
                        <td>Producto 3</td>
                        <td>$45.00</td>
                        <td>14</td>
                      </tr>


                      <td>004</td>
                        <th scope="row">DD/MM/YYYY</th>
                        <td>
                          <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                        </td>
                        <td>Producto 4</td>
                        <td>$45.00</td>
                        <td>67</td>
                      </tr>


                      <td>005</td>
                        <th scope="row">DD/MM/YYYY</th>
                        <td>
                          <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                        </td>
                        <td>Producto 5</td>
                        <td>$45.00</td>
                        <td>45</td>
                      </tr>
                      
                    </tbody>
                  </table>

                  <div class="row justify-content-center">

                    <div class="col-lg-6 pt-3 d-flex justify-content-center mb-5">

                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                              <li class="page-item disabled">
                                <a class="page-link">Previous</a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                              </li>
                            </ul>
                          </nav>


                    </div>

                    

                  </div>



            </div>
        </div>

        <div class="row justify-content-center my-2 mx-5" id="general-consult" style="display:none">

            <div class="col-lg-10">


              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mes</th>
                    <th scope="col">Año</th>
                    <th scope="col" style="max-width: 200px;">Thumbnail</th>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Vendidos</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>

                    
                    <td>001</td>
                    <th scope="row">Enero</th>
                    <td>2024</td>
                    <td>
                      <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                    </td>
                    <td>Producto 1</td>
                    <td>#Belleza</td>
                    <td>10</td>
                  </tr>
                  <tr>

                    <td>002</td>
                    <th scope="row">Enero</th>
                    <td>2024</td>
                    <td>
                      <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                    </td>
                    <td>Producto 2</td>
                    <td>#Belleza</td>
                    <td>122</td>
                  </tr>
                  <tr>


                    <td>003</td>
                    <th scope="row">Enero</th>
                    <td>2024</td>
                    <td>
                      <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                    </td>
                    <td>Producto 3</td>
                    <td>#Belleza</td>
                    <td>14</td>
                  </tr>


                  <td>004</td>
                    <th scope="row">Enero</th>
                    <td>2024</td>
                    <td>
                      <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                    </td>
                    <td>Producto 4</td>
                    <td>#Belleza</td>
                    <td>67</td>
                  </tr>


                  <td>005</td>
                    <th scope="row">Enero</th>
                    <td>2024</td>
                    <td>
                      <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                    </td>
                    <td>Producto 5</td>
                    <td>#Belleza</td>
                    <td>45</td>
                  </tr>
                  
                </tbody>
              </table>

              <div class="row justify-content-center">

                <div class="col-lg-6 pt-3 d-flex justify-content-center mb-5">

                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                          <li class="page-item disabled">
                            <a class="page-link">Previous</a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                          </li>
                        </ul>
                      </nav>
                

            </div>




        </div>

            </div>

        </div>

        <div class="row justify-content-center my-2 mx-5" id="disponibility-consult" style="display:flex">

          <div class="col-lg-10">


            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Editar</th>
                  <th scope="col">Publicado</th>
                  <th scope="col" style="max-width: 200px;">Thumbnail</th>
                  <th scope="col">Nombre del producto</th>
                  <th scope="col">Categoría</th>
                  <th scope="col">Disponibles</th>
                </tr>
              </thead>
              <tbody>
                <tr>

                  
                  <td><button class="btn" data-bs-toggle="modal" data-bs-target="#edit-disp"><span><i class="bi bi-pencil-square"></i></span></button></td>
                  <th scope="row">DD/MM/YYYY</th>
                  <td>
                    <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                  </td>
                  <td>Producto 1</td>
                  <td>Categoría</td>
                  <td>10</td>
                </tr>
                <tr>

                  <td><button class="btn" data-bs-toggle="modal" data-bs-target="#edit-disp"><span><i class="bi bi-pencil-square"></i></span></button></td>
                  <th scope="row">DD/MM/YYYY</th>
                  <td>
                    <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                  </td>
                  <td>Producto 2</td>
                  <td>Categoría</td>
                  <td>122</td>
                </tr>
                <tr>


                  <td><button class="btn" data-bs-toggle="modal" data-bs-target="#edit-disp"><span><i class="bi bi-pencil-square"></i></span></button></td>
                  <th scope="row">DD/MM/YYYY</th>
                  <td>
                    <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                  </td>
                  <td>Producto 3</td>
                  <td>Categoría</td>
                  <td>14</td>
                </tr>


                <td><button class="btn" data-bs-toggle="modal" data-bs-target="#edit-disp"><span><i class="bi bi-pencil-square"></i></span></button></td>
                  <th scope="row">DD/MM/YYYY</th>
                  <td>
                    <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                  </td>
                  <td>Producto 4</td>
                  <td>Categoría</td>
                  <td>67</td>
                </tr>


                <td><button class="btn" data-bs-toggle="modal" data-bs-target="#edit-disp"><span><i class="bi bi-pencil-square"></i></span></button></td>
                  <th scope="row">DD/MM/YYYY</th>
                  <td>
                    <a href="product-view.html"><img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail"></a>
                  </td>
                  <td>Producto 5</td>
                  <td>Categoría</td>
                  <td>45</td>
                </tr>
                
              </tbody>
            </table>

            <div class="row justify-content-center">

              <div class="col-lg-6 pt-3 d-flex justify-content-center mb-5">

                  <nav aria-label="Page navigation example">
                      <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                          <a class="page-link">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">Next</a>
                        </li>
                      </ul>
                    </nav>
          </div>
      </div>

          </div>

      </div>

        <div class="row justify-content-center my-2 mx-5" id="noresults">

          <div class="col-lg-10 text-center mt-4">

              <h3><span><i class="bi bi-heartbreak-fill" style="color:red"></i></span> No se encontraron resultados</h3>

          </div>

        </div>

          
      </div>

              <!--MODAL PARA HACER CAMBIOS DE LOS POST-->

              <div class="modal fade" id="edit-disp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="edit-disp-label" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="edit-disp-label">Edición</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <div class="mb-3 d-flex justify-content-center">
                        <button class="btn bg-primary text-white border shadow-sm"  id="toggle-edit" onclick="ToggleDivs()">Editar disponibilidad</button>
                      </div>

                      <div class="col-lg-12" id="edit-post" style="display:none">
                        <form action="#" method="post">

                            <div class="mb-3">
                                <label for="product-name" class="form-label">Nombre del producto</label>
                                <input type="text" class="form-control" id="product-name" placeholder="Ej: Lavadora">
                              </div>

                              <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ej: Pet-friendly"></textarea>
                              </div>

                              <div class="row justify-content-center">

                                <label for="form-check" class="form-label">Si es cotizable, activa el campo:</label>
                                  <div class="form-check form-switch d-flex justify-content-center">
                                    
                                    <input class="form-check-input p-2 border" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                    <label class="form-check-label ms-2" for="flexSwitchCheckDefault">Cotizable</label>
                                  </div>

                                  <div class="mb-3">
                                    <label for="product-price" class="form-label">Precio del producto</label>
                                    <input type="text" class="form-control" id="product-price" placeholder="$00.00" disabled>
                                  </div>

                                  <div class="mb-3">
                                    <label for="product-stock" class="form-label">Piezas disponibles</label>
                                    <input type="text" class="form-control" id="product-stock" placeholder="# piezas">
                                  </div>

                                  <div class="mb-3">
                                    <label for="list-group" class="form-label">Métodos de pago aceptados</label>
                                    <ul class="list-group">
                                      <li class="list-group-item">
                                        <input class="form-check-input me-1" type="checkbox" value="" id="firstCheckbox" checked disabled>
                                        <label class="form-check-label" for="firstCheckbox"><span><i class="bi bi-paypal"></i></span> Paypal</label>
                                      </li>
                                      <li class="list-group-item">
                                        <input class="form-check-input me-1" type="checkbox" value="" id="secondCheckbox">
                                        <label class="form-check-label" for="secondCheckbox"><span><i class="bi bi-credit-card-fill"></i></span> Tarjetas de crédito</label>
                                      </li>
                                      <li class="list-group-item">
                                        <input class="form-check-input me-1" type="checkbox" value="" id="secondCheckbox">
                                        <label class="form-check-label" for="secondCheckbox"><span><i class="bi bi-credit-card-fill"></i></span> Tarjetas de débito</label>
                                      </li>
                                      <li class="list-group-item">
                                        <input class="form-check-input me-1" type="checkbox" value="" id="thirdCheckbox">
                                        <label class="form-check-label" for="thirdCheckbox"><span><i class="bi bi-arrow-down-up"></i></span> Transferencia electrónica</label>
                                      </li>
                                      <li class="list-group-item">
                                        <input class="form-check-input me-1" type="checkbox" value="" id="thirdCheckbox">
                                        <label class="form-check-label" for="thirdCheckbox"><span><i class="bi bi-coin"></i></span> Depósitos</label>
                                      </li>
                                      
                                    </ul>
                                  </div>



                              
                              </div>
                            
                              <div class="row justify-content-center p-2">
                                <div class="col-lg-3">
                                  <img src="./src/src/img-placeholder.png" alt="" class="img-thumbnail">
                                </div>
                                <div class="col-lg-9">
                                  <label for="thumbnail-upload" class="form-label">Miniatura</label>
                                  <input type="file" name="" id="thumbnail-upload" class="form-control">
                                </div>
                              </div>

                              <div class="row justify-content-center p-2">

                                <div class="mb-3">
                                  <label for="formFileMultiple" class="form-label">Seleccione las imágenes</label>
                                  <input class="form-control" type="file" id="formFileMultiple" multiple>
                                </div>

                                <div class="col-lg-3 col-sm-3">
                                  <img src="./src/src/img-placeholder.png" alt="image1" class="img-thumbnail p-picture1">
                                </div>

                                <div class="col-lg-3 col-sm-3">
                                  <img src="./src/src/img-placeholder.png" alt="image1" class="img-thumbnail p-picture1">
                                </div>

                                <div class="col-lg-3 col-sm-3">
                                  <img src="./src/src/img-placeholder.png" alt="image1" class="img-thumbnail p-picture1">
                                </div>

                                <div class="col-lg-3 col-sm-3">
                                  <img src="./src/src/img-placeholder.png" alt="image1" class="img-thumbnail p-picture1">
                                </div>

                              </div>

                              <div class="mb-3">
                                <label for="product-video" class="form-label"><span><i class="bi bi-link-45deg"></i></span> Enlace de vídeo</label>
                                <input type="text" class="form-control" id="product-video" placeholder="Ej: https://youtu.be/...">
                              </div>

                              <div class="mb-3">
                                <label for="category-select" class="form-label">Selecciona una categoría</label>
                                <select class="form-select" id="category-select" aria-label="Default select example" onchange="ChangeFilters()">
                                  <option selected>Categoría</option>
                                  <option value="1">Categoria 1</option>
                                  <option value="2">Categoría 2</option>
                                  <option value="3">Ninguna de las anteriores</option>
                                </select>
                              </div>

                              <!--
                              <div class="mb-3">
                                
                                <label for="trigger-cat-creator" class="form-label">¿Ninguna categoría encaja?</label>
                                <button type="button" class="btn btn-md bg-light shadow-sm ms-1 border" data-bs-toggle="modal" data-bs-target="#newCategory">Crear nueva categoría</button>
                              </div>-->
                              
                        </form>
                    </div>

                    <div class="row justify-content-center" id="edit-stock" style="display:none">
                      <div class="col-lg-10">

                        <form action="#" method="post">

                          <div class="mb-3">
                            <label for="product-stock-solo" class="form-label">Ingrese la disponibilidad</label>
                            <input type="text" class="form-control" id="product-stock-solo" value="10">
                          </div>

                        </form>

                        
                        

                      </div>
                    </div>


                      
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancelar</button>
                      <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                  </div>
                </div>
              </div>

        




      <script>

        function ChangeFilters(){

          var typeconsult=document.getElementById("consult-type").value;
          var detailedfilters=document.querySelectorAll('.detailed-input');
          var generalfilters=document.querySelectorAll('.general-input');
          var generalresults=document.getElementById("general-consult");
          var detailedresults=document.getElementById("detailed-consult");
          var dispresults=document.getElementById("disponibility-consult");
          var notfound=document.getElementById("noresults");
          var boxhide=document.getElementById("box-hide");
          

              if(typeconsult==="1"){
                boxhide.style.display="flex";
                detailedfilters.forEach(function(input){
                  input.style.display="block";
                });

                generalfilters.forEach(function(input){
                  input.style.display="none";
                });

                detailedresults.style.display="flex";
                generalresults.style.display="none";
                

                
                
              }else if(typeconsult==="2"){
                boxhide.style.display="flex";
                detailedfilters.forEach(function(input){
                  input.style.display="none";
                });

                generalfilters.forEach(function(input){
                  input.style.display="block";
                });

                detailedresults.style.display="none";
                generalresults.style.display="flex";

              }else if(typeconsult==="3"){
                detailedfilters.forEach(function(input){
                  input.style.display="none";
                });

                generalfilters.forEach(function(input){
                  input.style.display="none";
                });

                detailedresults.style.display="none";
                generalresults.style.display="none";
                dispresults.style.display="flex";
                boxhide.style.display="none";
                
              }else{
                detailedresults.style.display="none";
                generalresults.style.display="none";
                dispresults.style.display="none";
                notfound.style.display="flex";
              }
      
        }
        
        var btnpress=false;
        var stockdiv=document.getElementById("edit-post");
        var editdiv=document.getElementById("edit-stock");
        var btntoggle=document.getElementById("toggle-edit");

        function ToggleDivs(){
          btnpress=!btnpress;
          

          if(btnpress){
            stockdiv.style.display="none";
            editdiv.style.display="flex";
            btntoggle.textContent="Editar articulo completo";

          }else{
            stockdiv.style.display="flex";
            editdiv.style.display="none";
            btntoggle.textContent="Editar disponibilidad";
          }
          
        }

      </script>

      
    
</body>
</html>