<?php 
include_once '../Models/Conexion.php';
include_once '../Models/Carrito.php';
$conexion=new Conexion();
$carrito=new Carrito($conexion->conn);

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        $input = json_decode(file_get_contents("php://input"), true);

        if (!$input) {
            error_log("Cuerpo de la solicitud vacío o mal formateado.");
            echo json_encode(["success" => false, "message" => "Cuerpo de la solicitud vacío o mal formateado."]);
            http_response_code(400);
            exit();
        }

        error_log("Datos recibidos: " . print_r($input, true));
        $productId = $input['product_id'] ?? null;
        $buyerId = $input['buyer_id'] ?? null;
        $cantidad = $input['cantidad'] ?? null;
        $precio = $input['precio'] ?? null;

        if (!$productId || !$buyerId || !$cantidad || !$precio) {
            echo json_encode(["success" => false, "message" => "Datos incompletos."]);
            exit();
        }

        $resultado = $carrito->agregarProducto($buyerId, $productId, $cantidad, $precio);

        if ($resultado) {
            echo json_encode(["success" => true, "message" => "Producto agregado al carrito.", "product_name" => $resultado]);
        } else {
            echo json_encode(["success" => false, "message" => "No se pudo agregar el producto al carrito."]);
        }
    break;
}

?>