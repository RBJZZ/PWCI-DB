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

    public function CreateCategory(){

    }
}

?>