<?php 
include_once '../Models/Conexion.php';
include_once '../Models/Consultas.php';

$conexion=new Conexion();
$consultas=new Consultas($conexion->conn);

session_start();

$method=$_SERVER['REQUEST_METHOD'];

switch($method){

    case 'POST':

        if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'user') {
            http_response_code(401);
            echo json_encode(['error' => 'No autorizado']);
            exit;
        }
    
        $customerId = $_SESSION['user_id'];
        $productId = $_POST['product-id'] ?? null;
        $rating = $_POST['rating'] ?? null;
        $comment = $_POST['comment'] ?? '';
        $status = $_POST['status'] ?? 'pending';
    
        if (!$productId || !$rating) {
            http_response_code(400);
            echo json_encode(['error' => 'Producto y calificación son obligatorios']);
            exit;
        }
    
        try {
            $resultado = $consultas->rating($productId, $customerId, $rating, $comment, $status);
            echo json_encode(['message' => 'Calificación guardada con éxito']);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Error al guardar calificación: ' . $e->getMessage()]);
        }
    
        break;
    
    
        case 'GET':
            
            if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'user') {
                http_response_code(401); 
                header('Content-Type: application/json');
                echo json_encode(['error' => 'No autorizado']);
                exit;
            }
        
            
            $customerId = $_SESSION['user_id'];
            $order = $_GET['order'] ?? 'desc';
            $category = $_GET['category'] ?? null;
        
            
            $order = strtolower($order);
            if (!in_array($order, ['asc', 'desc'])) {
                http_response_code(400); 
                header('Content-Type: application/json');
                echo json_encode(['error' => 'El parámetro "order" debe ser "asc" o "desc".']);
                exit;
            }
        
            if ($category !== null && !is_numeric($category)) {
                http_response_code(400); 
                header('Content-Type: application/json');
                echo json_encode(['error' => 'El parámetro "category" debe ser un número.']);
                exit;
            }
        
            try {
               
                $pedidos = $consultas->obtenerPedidosCliente($customerId, $order, $category);
        
              
                if (!empty($pedidos)) {
                    header('Content-Type: application/json');
                    echo json_encode(['pedidos' => $pedidos]);
                } else {
                    http_response_code(404); 
                    header('Content-Type: application/json');
                    echo json_encode(['error' => 'No se encontraron pedidos.']);
                }
            } catch (Exception $e) {
                http_response_code(500); 
                header('Content-Type: application/json');
                echo json_encode(['error' => 'Error al obtener pedidos: ' . $e->getMessage()]);
            }
            break;
        

    default:

    

    break;


}

?>