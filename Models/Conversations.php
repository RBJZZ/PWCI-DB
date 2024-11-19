<?php 
class Conversations{

    private $conexion;

    public function __construct($conexion){
        $this->conexion=$conexion;
    }

    public function buscarConversacion($usuario1, $usuario2, $producto) {
        $stmt = $this->conexion->prepare("CALL sp_buscar_conversacion(?, ?, ?)");
        $stmt->bind_param("iii", $usuario1, $usuario2, $producto);
        $stmt->execute();

        $result = $stmt->get_result();
        $conversacion = $result->fetch_assoc();

        $stmt->close(); 
        return $conversacion;
    }

    public function crearConversacion($usuario1, $usuario2, $producto) {
        $stmt = $this->conexion->prepare("CALL sp_crear_conversacion(?, ?, ?)");
        $stmt->bind_param("iii", $usuario1, $usuario2, $producto);
        $stmt->execute();

        $result = $stmt->get_result();
        $chatId = null;
        if ($row = $result->fetch_assoc()) {
            $chatId = $row['chat_id']; 
        }

        $stmt->close();
        return $chatId;
    }
    public function obtenerConversaciones($usuarioID) {
        $stmt = $this->conexion->prepare("CALL sp_obtener_conversaciones(?)");
        $stmt->bind_param("i", $usuarioID);
        $stmt->execute();

        $result = $stmt->get_result();
        $conversaciones = [];
        while ($row = $result->fetch_assoc()) {
            $conversaciones[] = $row;
        }

        $stmt->close();
        return $conversaciones;
    }

    public function listarConversaciones($userId) {
        $stmt = $this->conexion->prepare("
            SELECT c.chat_ID, u.us_user AS username, u.us_pfp AS user_profile, 
                   (SELECT COUNT(*) FROM MENSAJES WHERE chat_ID = c.chat_ID AND chat_read = 0) AS unread_messages
            FROM CONVERSACIONES c
            JOIN USUARIOS u ON c.chat_us2 = u.us_ID
            WHERE c.chat_us1 = ? OR c.chat_us2 = ?
        ");
        $stmt->bind_param("ii", $userId, $userId);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $conversations = [];
        while ($row = $result->fetch_assoc()) {
            $conversations[] = $row;
        }
    
        $stmt->close();
        return $conversations;
    }
    
    public function listarConversacionesVendedor($sellerId) {
        $stmt = $this->conexion->prepare("
            SELECT c.chat_ID, u.us_user AS username, u.us_pfp AS user_profile, 
                   p.prod_name AS product_name, p.prod_ID AS product_id, 
                   (SELECT COUNT(*) FROM MENSAJES WHERE chat_ID = c.chat_ID AND chat_read = 0) AS unread_messages
            FROM CONVERSACIONES c
            JOIN USUARIOS u ON c.chat_us1 = u.us_ID
            JOIN PRODUCTOS p ON c.chat_product = p.prod_ID
            WHERE c.chat_us2 = ?
        ");
        $stmt->bind_param("i", $sellerId);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $conversations = [];
        while ($row = $result->fetch_assoc()) {
            $conversations[] = $row;
        }
    
        $stmt->close();
        return $conversations;
    }
    
}
?>