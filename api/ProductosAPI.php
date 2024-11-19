<?php
include_once '../Models/Conexion.php';
include_once '../Models/Productos.php';

$conexion=new Conexion();
$productosapi=new Productos($conexion->conn);
session_start();

$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case 'POST':
        header('Content-Type: application/json');

        if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'seller') {
            http_response_code(401);
            echo json_encode(['error' => 'No autorizado']);
            exit;
        }

        $data = $_POST;
        $productId = $data['product-id'] ?? null;


        if (!$productId) {
            http_response_code(400);
            echo json_encode(['error' => 'ID del producto es obligatorio']);
            exit;
        }

        try {
 
            $productosapi->setProductId($productId);
            $productosapi->setTitle($data['product-name']);
            $productosapi->setDesc($data['product-desc']);
            $productosapi->setPrice($data['product-price']);
            $productosapi->setStock($data['product-stock']);
            $productosapi->setCat($data['category-select']);
            $productosapi->setQuotable(isset($data['quotable']) ? 1 : 0);
            $productosapi->setVideoUrl($data['product-video']);

            if (isset($_FILES['thumbnail-upload']) && $_FILES['thumbnail-upload']['error'] == UPLOAD_ERR_OK) {
                $thumbnailTmpPath = $_FILES['thumbnail-upload']['tmp_name'];
                $thumbnailExt = pathinfo($_FILES['thumbnail-upload']['name'], PATHINFO_EXTENSION);
                $thumbnailPath = "../Views/uploads/" . uniqid() . "." . $thumbnailExt;
                if (move_uploaded_file($thumbnailTmpPath, $thumbnailPath)) {
                    $productosapi->setThumbnail($thumbnailPath);
                } else {
                    throw new Exception("Error al subir la miniatura.");
                }
            }

            $productosapi->editarProducto($data['payment_methods']);

            if (isset($_FILES['multiple-pic-input']) && is_array($_FILES['multiple-pic-input']['tmp_name'])) {
                $productosapi->actualizarImagenes($_FILES['multiple-pic-input']);
            }

            echo json_encode(['message' => 'Producto actualizado con éxito']);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Error al actualizar el producto: ' . $e->getMessage()]);
        }
    break;

    case 'GET':

        $productId = isset($_GET['id']) ? intval($_GET['id']) : null;

        if (!$productId) {
            http_response_code(400);
            echo json_encode(['error' => 'ID del producto es obligatorio']);
            exit;
        }
    
        if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'seller') {
            http_response_code(401);
            echo json_encode(['error' => 'No autorizado']);
            exit;
        }
    
        try {
            
    
            $result = $productosapi->obtenerProductoID($productId, $_SESSION['user_id']);
    
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
    break;

    case 'DELETE':
        
    break;

    default:
    http_response_code(405);
    echo json_encode(['success'=>false,'message'=>'Método no permitido']);
}
?>