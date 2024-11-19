<?php

class Consultas{
    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion;
        if ($this->conexion->connect_error) {
            throw new Exception("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function consultarVentas($vendedorId, $categoriaId, $fechaInicio, $fechaFin, $tipoConsulta) {
        $stmt = $this->conexion->prepare("CALL sp_consultar_ventas(?, ?, ?, ?, ?)");
    
        if (!$stmt) {
            die("Error en el statement: " . $this->conexion->error);
        }
        $stmt->bind_param(
            "iissi", 
            $vendedorId, 
            $categoriaId, 
            $fechaInicio, 
            $fechaFin, 
            $tipoConsulta
        );
    
        $stmt->execute();
    
        $resultado = $stmt->get_result();
        $datos = [];
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
    
        $stmt->close();
    
        return $datos;
    }
    
    public function getProducts($vendedorId, $categoriaId = null) {
        try {
            $stmt = $this->conexion->prepare("CALL sp_fetch_forstock(?, ?)");
            $stmt->bind_param('ii', $vendedorId, $categoriaId);
            $stmt->execute();
            $result = $stmt->get_result();
    
            $productos = [];
            while ($row = $result->fetch_assoc()) {
                $productos[] = $row;
            }
    
            return $productos;
        } catch (Exception $e) {
            error_log('Error al obtener productos: ' . $e->getMessage());
            return false;
        }
    }
    
    public function obtenerPedidosCliente($customerId, $order = 'desc', $category = null) {
        $stmt = $this->conexion->prepare("CALL sp_fetch_pedidos(?, ?, ?)");
        $stmt->bind_param('iss', $customerId, $order, $category);
    
        if (!$stmt->execute()) {
            throw new Exception('Error al ejecutar el procedimiento almacenado.');
        }
    
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function rating($productId, $customerId, $rating, $comment, $status) {
        try {
            $stmt = $this->conexion->prepare("CALL sp_rating_product(?, ?, ?, ?, ?)");
            $stmt->bind_param('iiiss', $productId, $customerId, $rating, $comment, $status);
    
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception('Error al ejecutar el procedimiento almacenado.');
            }
        } catch (Exception $e) {
            error_log('Error en rating (SP): ' . $e->getMessage());
            throw $e;
        }
    }
    
}



?>