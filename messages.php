<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/messages.css">
    <link rel="stylesheet" href="./src/css/main.css">
    <link rel="stylesheet" href="./src/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="./src/js/bootstrap.js"></script>
    <link rel="icon" href="./src/src/logo1.png" type="image/x-icon">
    <title>Mensajes</title>
</head>
<body>

    
    <?php include 'navbar.php';?>

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
                    <h4 class="p-3 text-center">TEST</h4>
                </div>
                <div class="row justify-content-center">
                    <ul class="list-group p-2 m-2 d-flex flex-column" id="message-list">
                        <li class="list-group-item m-2 p-2 rounded-pill balloon balloon-left">Buenas tardes</li>
                        <li class="list-group-item m-2 p-2 rounded-pill balloon balloon-left">Me gustaría solicitar cotización de <span style="text-decoration: underline;"><a href="./product-view.html">este producto</a></span></li>
                        <li class="list-group-item m-2 p-2 rounded-pill balloon balloon-right">Claro, ¿para cuántas piezas?</li>
                        <li class="list-group-item m-2 p-2 rounded-pill balloon balloon-left">Serían 20, ¿se encuentran disponibles?</li>
                        <li class="list-group-item m-2 p-2 rounded-pill balloon balloon-right">Sí, claro.</li>
                        <li class="list-group-item m-2 p-2 rounded-pill balloon balloon-right">El costo por pieza sería de $1900</li>
                        <li class="list-group-item m-2 p2 rounded-pill balloon balloon-left">Perfecto, ¿cuáles son sus métodos de pago?</li>
                        <li class="list-group-item m-2 p2 rounded-pill balloon balloon-right">Aceptamos Paypal y transferencias.</li>
                        <li class="list-group-item m-2 p2 rounded-pill balloon balloon-left">Será por medio de Paypal.</li>
                        <li class="list-group-item m-2 p2 rounded-pill balloon balloon-left">De único favor, me gustaría una factura, por favor.</li>
                        <li class="list-group-item m-2 p2 rounded-pill balloon balloon-right">Claro, sin problema. Quedo al pendiente del pago para procesar envío.</li>
                        <li class="list-group-item m-2 p2 rounded-pill balloon balloon-left">Gracias, me estaré comunicando.</li>

                    </ul>

                    <div class="input-container">
                      <div class="container">
                          <div class="row">
                              <div class="col-lg-10 col-sm-6">
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

    <script src="./src/js/messages.js"></script>
</body>
</html>