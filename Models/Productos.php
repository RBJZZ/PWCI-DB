<?php

class Productos{
    private $conexion;

    public function __construct($conexion){
        $this->conexion=$conexion;
    }

    public function obtenerProductos() {
        $productos = [];
        $stmt = $this->conexion->prepare("CALL sp_FetchProductos()");
        
        if ($stmt) {
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $productos[] = $row;
                }
                $result->free();
            } else {
                echo "Error al obtener resultados: " . $this->conexion->error;
            }
    
            $stmt->close();
        } else {
            echo "Error en la preparación de la consulta: " . $this->conexion->error;
        }
    
        return $productos;
    }

    public function previewProductos($id){

        $stmt = $this->conexion->prepare("CALL sp_productopreview(?)");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $producto['dt']= $result->fetch_assoc();
        $result->free();
        $stmt->close();
        $this->conexion->next_result();

        $stmt=$this->conexion->prepare("CALL sp_previewimgs(?)");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $producto['imgs']= $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        $stmt->close();
        $this->conexion->next_result();

        $stmt=$this->conexion->prepare("CALL sp_previewmp(?)");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $producto['mp']= $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        $stmt->close();


        return $producto;
    }
    
}


?>