<?php

require_once '../Models/Lista.php';
require_once '../Models/Conexion.php';
session_start();
$conexion=new Conexion();
$lista=new Lista($conexion->conn);

$method=$_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':

        $data = json_decode(file_get_contents('php://input'), true);

        if (!isset($_SESSION['user_id'])) {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Usuario no autenticado']);
            exit;
        }

        if (!isset($data['nombre'], $data['descripcion'], $data['privacidad'])) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Datos incompletos']);
            exit;
        }

        $usuarioId = $_SESSION['user_id'];
        $nombre = $data['nombre'];
        $descripcion = $data['descripcion'];
        $privacidad = $data['privacidad'];

        $resultado = $lista->crearLista($usuarioId, $nombre, $descripcion, $privacidad);

        header('Content-Type: application/json');
        if ($resultado) {
            echo json_encode(['success' => true, 'message' => 'Lista creada exitosamente']);
        } else {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Error al crear la lista']);
        }
    break;

    case 'GET':

        if (!isset($_SESSION['user_id'])) {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Usuario no autenticado']);
            exit;
        }
    
        $usuarioId = $_SESSION['user_id'];
        
        if (isset($_GET['id'])) {
          
            $listaId = intval($_GET['id']);
            $items = $lista->obtenerItemsDeLista($usuarioId, $listaId);
    
            header('Content-Type: application/json');
            if ($items) {
                echo json_encode(['success' => true, 'data' => $items]);
            } else {
                http_response_code(404);
                echo json_encode(['success' => false, 'message' => 'Lista no encontrada o sin ítems']);
            }
        } else {
           
            $listas = $lista->obtenerListas($usuarioId);

            header('Content-Type: application/json');
            if ($listas) {
                echo json_encode(['success' => true, 'data' => $listas]);
            } else {
                http_response_code(404);
                echo json_encode(['success' => false, 'message' => 'No se encontraron listas']);
            }
        }

    break;

    case 'PUT':

        if (!isset($_SESSION['user_id'])) {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Usuario no autenticado']);
            exit;
        }
    
        $data = json_decode(file_get_contents('php://input'), true);
    
        
        if (!isset($data['lista_id'], $data['producto_id'])) {
            http_response_code(400); 
            echo json_encode(['success' => false, 'message' => 'Datos incompletos']);
            exit;
        }
    
        $usuarioId = $_SESSION['user_id']; 
        $listaId = $data['lista_id'];
        $productoId = $data['producto_id'];
    
        $resultado = $lista->agregarItemALaLista($usuarioId, $listaId, $productoId);
    
        header('Content-Type: application/json');
        if ($resultado) {
            echo json_encode(['success' => true, 'message' => 'Producto agregado a la lista']);
        } else {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Error al agregar el producto a la lista']);
        }
        
    break;

    case 'DELETE':

        if (!isset($_SESSION['user_id'])) {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Usuario no autenticado']);
            exit;
        }
    
        $data = json_decode(file_get_contents('php://input'), true);

        if (isset($data['id'])) {
            $listaId = intval($data['id']);
            $usuarioId = $_SESSION['user_id'];
    
            $resultado = $lista->eliminarLista($usuarioId, $listaId);
    
            header('Content-Type: application/json');
            if ($resultado) {
                echo json_encode(['success' => true, 'message' => 'Lista eliminada exitosamente']);
            } else {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Error al eliminar la lista']);
            }
            exit;
        }
    
       
        if (isset($data['ids']) && is_array($data['ids'])) {
            $usuarioId = $_SESSION['user_id'];
            $itemIds = $data['ids'];
    
            $resultado = $lista->eliminarItemsDeLista($usuarioId, $itemIds);
    
            header('Content-Type: application/json');
            if ($resultado) {
                echo json_encode(['success' => true, 'message' => 'Ítems eliminados exitosamente']);
            } else {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Error al eliminar los ítems']);
            }
            exit;
        }
    
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Solicitud inválida']);


    break;

    default:
    http_response_code(405);
    echo json_encode(['success'=>false,'message'=>'Método no permitido']);
}




?>