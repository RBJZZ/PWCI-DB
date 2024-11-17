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
}
?>