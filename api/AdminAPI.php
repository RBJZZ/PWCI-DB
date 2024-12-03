<?php 
include_once '../Models/Conexion.php';
include_once '../Models/Productos.php';
require_once '../Middlewares/AuthMiddleware.php';

$conexion=new Conexion();
$posts=new Productos($conexion->conn);
session_start();

$method=$_SERVER["REQUEST_METHOD"];

switch($method){

    case 'POST':

        AuthMiddleware::verificarUsuario('admin');

        header('Content-Type: application/json'); 

        $input = json_decode(file_get_contents('php://input'), true);

        if (isset($input['productID'])) {
            $productID = intval($input['productID']);
    
            if ($productID <= 0) {
                http_response_code(400);
                echo json_encode(['error' => 'ID del producto inválido']);
                exit;
            }
    
            try {
                $result = $posts->aprobarProducto($productID);
    
                if ($result) {
                    echo json_encode(['status' => 'success', 'message' => 'Producto verificado exitosamente']);
                } else {
                    http_response_code(404);
                    echo json_encode(['status' => 'error', 'message' => 'Producto no encontrado o no se pudo verificar']);
                }
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['status' => 'error', 'message' => 'Error del servidor: ' . $e->getMessage()]);
            }
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'ID del producto es obligatorio']);
        }

    break;
        

    case 'GET':


        if (isset($_GET["count"])) {
            try {
                $unapprovedCount = $posts->contarProductosNoAprobados();
    
                echo json_encode(['status' => 'success', 'count' => $unapprovedCount]);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['status' => 'error', 'message' => 'Error del servidor: ' . $e->getMessage()]);
            }

        }else if(isset($_GET['id'])){
            $productId = isset($_GET['id']) ? intval($_GET['id']) : null;

            if (!$productId) {
                http_response_code(400);
                echo json_encode(['error' => 'ID del producto es obligatorio']);
                exit;
            }
    
        
            try {
        
                $result = $posts->obtenerProductoID_ADMIN($productId);
        
                if ($result) {
                    echo json_encode($result);
                } else {
                    http_response_code(404);
                    echo json_encode(['error' => 'Producto no encontrado']);
                }
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => 'Error del servidor: ' . $e->getMessage()]);
            }
            
        }else if (isset($_GET["admin"]) && $_GET["admin"] === "auth") {
            try {
                $data = $posts->fetchPostsForApproval();

                echo json_encode(["status" => "success", "data" => $data]);
            } catch (Exception $e) {
                echo json_encode(["status" => "error", "message" => $e->getMessage()]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Parámetro inválido."]);
        }
        break;


    default:
        echo json_encode(["status" => "error", "message" => "Método no permitido."]);
        break;
}
?>