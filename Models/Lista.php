<?php 
class Lista{
    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion;
            if ($this->conexion->connect_error) {
                throw new Exception("Error de conexión: " . $this->conexion->connect_error);
            }
    }

    public function addToList($pid, $uid, $lid){
        $stmt= $this->conexion->prepare("CALL sp_agregar_a_lista(?,?,?)");
        $stmt->bindParam("iii",$pid, $uid, $lid);
        return $stmt->execute([$pid, $uid, $lid]);

    }

    public function crearLista($usuarioId, $nombre, $descripcion, $privacidad) {
        try {
            
            $query = "CALL sp_crear_lista(?, ?, ?, ?)";
            $stmt = $this->conexion->prepare($query);
    
            if (!$stmt) {
                throw new Exception('Error al preparar la consulta: ' . $this->conexion->error);
            }
    
            $stmt->bind_param("isss", $usuarioId, $nombre, $descripcion, $privacidad);
           
            $resultado = $stmt->execute();
            $stmt->close();
    
            return $resultado;
        } catch (Exception $e) {
            error_log('Error al crear la lista: ' . $e->getMessage());
            return false;
        }
    }

    public function obtenerListas($usuarioId) {
        try {
    
            $query = "CALL sp_fetch_lists(?)";
            $stmt = $this->conexion->prepare($query);
            $stmt->bind_param("i", $usuarioId);
            $stmt->execute();
    
           
            $result = $stmt->get_result();
            $listas = [];
            while ($row = $result->fetch_assoc()) {
                $listas[] = $row;
            }
    
            return $listas;
        } catch (Exception $e) {
            error_log('Error al obtener listas: ' . $e->getMessage());
            return false;
        }
    }
    

    public function agregarItemALaLista($usuarioId, $listaId, $productoId) {
        try {
            
            $query = "CALL sp_addlistitem(?, ?, ?)";
            $stmt = $this->conexion->prepare($query);
    
            if (!$stmt) {
                throw new Exception('Error al preparar la consulta: ' . $this->conexion->error);
            }
    
            $stmt->bind_param('iii', $usuarioId, $listaId, $productoId);
    
            $resultado = $stmt->execute();
    
            $stmt->close();
    
            return $resultado;
        } catch (Exception $e) {
            error_log('Error al agregar ítem a la lista: ' . $e->getMessage());
            return false;
        }
    }

    public function obtenerItemsDeLista($usuarioId, $listaId) {
        try {
            $query = "CALL sp_fetch_itemslists(?, ?)";
            $stmt = $this->conexion->prepare($query);
            $stmt->bind_param('ii', $usuarioId, $listaId);
            $stmt->execute();
    
            $result = $stmt->get_result();
            $items = [];
            while ($row = $result->fetch_assoc()) {
                $items[] = $row;
            }
    
            return $items;
        } catch (Exception $e) {
            error_log('Error al obtener ítems de la lista: ' . $e->getMessage());
            return false;
        }
    }

    public function eliminarItemsDeLista($usuarioId, $itemIds) {
        try {
            $ids = implode(',', array_map('intval', $itemIds)); 
    
            $query = "CALL sp_deletelistitems(?, ?)";
            $stmt = $this->conexion->prepare($query);
            $stmt->bind_param('is', $usuarioId, $ids);
    
            return $stmt->execute();
        } catch (Exception $e) {
            error_log('Error al eliminar ítems de la lista: ' . $e->getMessage());
            return false;
        }
    }
    
    public function eliminarLista($usuarioId, $listaId) {
        try {
            $query = "CALL sp_delete_list(?, ?)";
            $stmt = $this->conexion->prepare($query);
            $stmt->bind_param('ii', $usuarioId, $listaId);
            return $stmt->execute();
        } catch (Exception $e) {
            error_log('Error al eliminar la lista: ' . $e->getMessage());
            return false;
        }
    }

    
    public function verificarPerfilPublico($usuarioId) {
        $query = "CALL sp_perfil_publico(?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $usuarioId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        if($row['us_visible']==0){
            http_response_code(403);
            echo json_encode(['success'=>false, 'message'=>'Este perfil es privado']);
            exit;
        }
    }
    
    
}
?>