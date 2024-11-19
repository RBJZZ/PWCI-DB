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

    
}
?>