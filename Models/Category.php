<?php

class Category {

    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
        if ($this->conexion->connect_error) {
            throw new Exception("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function getCategories() {
        $categorias = [];
        $stmt = $this->conexion->prepare("CALL sp_obtener_categorias()");

        if ($stmt) {
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $categorias[] = $row;
                }
                $result->free();
            } else {
                error_log("Error al obtener resultados: " . $this->conexion->error);
                throw new Exception("Error al obtener resultados.");
            }

            $stmt->close();
        } else {
            error_log("Error en la preparación de la consulta: " . $this->conexion->error);
            throw new Exception("Error en la preparación de la consulta.");
        }

        return $categorias;
    }

    public function CreateCategory($title, $description, $author){
        try {
            
            $query = "CALL sp_crear_categoría(?, ?, ?)";
            $stmt = $this->conexion->prepare($query);
    
            
            $stmt->bind_param("ssi", $title, $description, $author); 
    
            
            if ($stmt->execute()) {
                return true;
                
            } else {
                error_log("No se pudo crear la categoría: " . $stmt->error);
                return false;
            }

           
        } catch (Exception $e) {
            error_log("Excepción al crear la categoría: " . $e->getMessage());
            return false;
        }
        

    }
}

?>