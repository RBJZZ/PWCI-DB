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

        $usuarioID = $_GET['user_id'] ?? null;
        if ($usuarioID) {
            $conversaciones = $conv->obtenerConversaciones($usuarioID);
            echo json_encode(["success" => true, "conversations" => $conversaciones]);
        } else {
            echo json_encode(["success" => false, "message" => "Falta el ID del usuario."]);
        }

    break;

    case 'DELETE':

    break;
}

?>