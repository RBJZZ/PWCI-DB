<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
class Carrito{

    private $conexion;

    public function __construct($conexion) {
            $this->conexion = $conexion;
            if ($this->conexion->connect_error) {
                throw new Exception("Error de conexión: " . $this->conexion->connect_error);
            }
    }

    public function AddToCart($uid, $pid, $quantity){
        
        $stmt=$this->conexion->prepare("CALL sp_addtocart (?,?,?)");
        $stmt->bind_param("iii", $uid, $pid, $quantity); 
        return $stmt->execute([$uid, $pid, $quantity]);

    }

    public function FetchItems($uid){
        $stmt=$this->conexion->prepare("CALL sp_fetch_cart_items(?)");
        $stmt->bind_param("i", $uid);
        $stmt->execute();

        $result = $stmt->get_result();
        $items = $result->fetch_all(MYSQLI_ASSOC);

        foreach ($items as &$item) {
            $item['prod_price'] = (float) $item['prod_price'];
        }

        $stmt->close();
        return $items;
    }

    public function removeItems($cartDetailIds) {
        try {
            // Convertir los IDs en cadena separada por comas
            $ids = implode(',', array_map('intval', $cartDetailIds)); // Sanitizar los IDs
            error_log('IDs enviados al procedimiento: ' . $ids); // Depuración
    
            // Llamar al procedimiento almacenado
            $query = "CALL sp_removefromcart_batch('$ids')"; // Incluir los IDs directamente
            $stmt = $this->conexion->prepare($query);
    
            return $stmt->execute();
        } catch (Exception $e) {
            error_log('Error al eliminar ítems: ' . $e->getMessage()); // Registrar errores
            return false;
        }
    }
    
   
}

?>