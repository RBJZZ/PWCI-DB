<?php 
/*Rebeca Evangelista Jasso
David Aguilar Acosta*/
require_once '../Models/Carrito.php';
require_once '../Models/Conexion.php';
session_start();
$conexion=new Conexion();
$carrito=new Carrito($conexion->conn);

$method=$_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $userId = $_SESSION['user_id'] ?? null;

        if (!$userId) {
            header('Content-Type: application/json');
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Usuario no autenticado']);
            exit;
        }
    
        try {
            $items = $carrito->FetchItems($userId);
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'data' => $items]);
        } catch (Exception $e) {
            header('Content-Type: application/json');
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
       
    break;

    case 'POST':

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

    break;

    case 'DELETE':

        $data = json_decode(file_get_contents('php://input'), true);

        if (!isset($data['ids']) || !is_array($data['ids'])) {
            header('Content-Type: application/json');
            http_response_code(400); 
            echo json_encode(['success' => false, 'message' => 'Faltan los IDs de los detalles del carrito']);
            exit;
        }

        $cartDetailIds = $data['ids'];

        $resultado = $carrito->removeItems($cartDetailIds);

        header('Content-Type: application/json');
        if ($resultado) {
            echo json_encode(['success' => true, 'message' => 'Ítems eliminados']);
        } else {
            http_response_code(500); 
            echo json_encode(['success' => false, 'message' => 'Error al eliminar los ítems']);
        }

    break;

    default:
    http_response_code(405);
    echo json_encode(['success'=>false,'message'=>'Método no permitido']);
}


?>