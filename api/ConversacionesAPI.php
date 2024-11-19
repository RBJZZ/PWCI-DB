<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../Models/Conexion.php';
include_once '../Models/Conversations.php';

$conexion=new Conexion();
$conv=new Conversations($conexion->conn);

$method=$_SERVER['REQUEST_METHOD'];

header("Content-Type: application/json; charset=UTF-8");

switch($method){
    case 'POST':

        $input = json_decode(file_get_contents("php://input"), true);
        $usuario1 = $input['chat_us1'];
        $usuario2 = $input['chat_us2'];
        $producto = $input['chat_product'];

    $existente = $conv->buscarConversacion($usuario1, $usuario2, $producto);

    if ($existente) {
        echo json_encode(["success" => true, "chat_id" => $existente['chat_ID']]);
    } else {

        $chatId = $conv->crearConversacion($usuario1, $usuario2, $producto);
        if ($chatId) {
            echo json_encode(["success" => true, "chat_id" => $chatId]);
        } else {
            echo json_encode(["success" => false, "message" => "No se pudo crear la conversación."]);
        }
    }

    break;

    case 'GET':
        if (isset($_GET['list_conversations'])) {
            $userId = $_GET['user_id'] ?? null;
            if (!$userId) {
                echo json_encode(["success" => false, "message" => "ID de usuario no proporcionado."]);
                exit();
            }
    
            $conversations = $conv->listarConversaciones($userId);
    
            echo json_encode([
                "success" => true,
                "conversations" => $conversations
            ]);
            exit();

        }
        
        if(isset($_GET['seller_id'])) {
            $sellerId = $_GET['seller_id'] ?? null;
    
            if (!$sellerId) {
                echo json_encode(["success" => false, "message" => "ID del vendedor no proporcionado."]);
                exit();
            }
    
            $conversations = $conv->listarConversacionesVendedor($sellerId);
    
            echo json_encode([
                "success" => true,
                "conversations" => $conversations
            ]);
            exit();
        }
    

    case 'DELETE':

    break;
}

?>