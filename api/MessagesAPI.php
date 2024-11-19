<?php 
include_once '../Models/Conexion.php';
include_once '../Models/Mensaje.php';

$conexion=new Conexion();
$message=new Mensaje($conexion->conn);

$method=$_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'POST':
        $input = json_decode(file_get_contents("php://input"), true);
        $chatId = $input['chat_id'];
        $remitenteId = $input['sender_id'];
        $contenido = $input['content'];

    
    $resultado = $message->enviarMensaje($chatId, $remitenteId, $contenido);

    if ($resultado) {
        echo json_encode(["success" => true, "message" => "Mensaje enviado."]);
    } else {
        echo json_encode(["success" => false, "message" => "No se pudo enviar el mensaje."]);
    }
    break;

    case 'GET':
        $chatId = $_GET['chat_id'] ?? null;

        if (!$chatId) {
            echo json_encode(["success" => false, "message" => "ID de conversación no proporcionado."]);
            exit();
        }
    
        $mensajes = $message->obtenerMensajes($chatId);
        echo json_encode(["success" => true, "messages" => $mensajes]);
        
    break;

    case 'DELETE':

    break;

}
?>