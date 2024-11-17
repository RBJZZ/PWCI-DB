<?php
/*
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once("../Models/Carrito.php");
include_once("../Models/Conexion.php");

$conexion = new Conexion();
$carrito = new Carrito($conexion->conn);

if(isset($_GET['cart']) && $_GET['cart']==='addItem' && $_SERVER['REQUEST_METHOD']==="POST"){
    $data = json_decode(file_get_contents('php://input'), true);

    if ($data === null) {
        header('Content-Type: application/json');
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Formato de datos inválido']);
        exit;
    }

        $productoId = $data['producto_id'] ?? null;
        $cantidad = $data['cantidad'] ?? 1;
        $userid = $data['usuario'] ?? null;

    if (!$productoId || !$userid) {
        header('Content-Type: application/json');
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Datos incompletos']);
        exit;
    }

    $resultado=$carrito->AddToCart($userid, $productoId, $cantidad);

    if ($resultado) {
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Error al agregar al carrito']);
    }
}
*/
?>