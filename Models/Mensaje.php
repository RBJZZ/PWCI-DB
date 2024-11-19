<?php
class Mensaje {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion; 
    }

    public function enviarMensaje($chatID, $remitenteID, $contenido) {
        $stmt = $this->conexion->prepare("CALL sp_enviar_mensaje(?, ?, ?)");
        $stmt->bind_param("iis", $chatID, $remitenteID, $contenido); 
        $resultado = $stmt->execute();
        $stmt->close();
        return $resultado; 
    }

    public function obtenerMensajes($chatID) {
        $stmt = $this->conexion->prepare("CALL sp_obtener_mensajes(?)");
        $stmt->bind_param("i", $chatID);
        $stmt->execute();
    
        $result = $stmt->get_result();
        $mensajes = [];
    
        while ($row = $result->fetch_assoc()) {
            $mensajes[] = $row;
        }
    
        
        $stmt->next_result(); 
        $result = $stmt->get_result();
        $infoExtra = $result->fetch_assoc();
    
        $stmt->close();
        return ["mensajes" => $mensajes, "infoExtra" => $infoExtra];
    }
}
?>