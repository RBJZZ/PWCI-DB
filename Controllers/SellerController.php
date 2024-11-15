<?php 
include_once '../Models/Usuario.php';
include_once '../Models/Productos.php';
include_once '../Models/Conexion.php';

$conexion = new Conexion();
$usuario = new Usuario($conexion->conn);
$productos = new Productos($conexion->conn);

if(isset($_GET['id'])){

    $seller = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        
        if ($seller === false) {
            
            die("ID de vendedor no válido");
        }
        if($usuario->getSeller($seller)){

            $publicaciones = $productos->getProductosPorVendedor($seller);

            include '../Views/profile-seller.php';
        }

}else if (isset($_GET['view']) && $_GET['view'] === 'sellerpf') {
    if (isset($_GET['uid'])) {
        
        $seller = filter_var($_GET['uid'], FILTER_VALIDATE_INT);
        
        if ($seller === false) {
            
            die("ID de vendedor no válido");
        }

        

        if($usuario->getSeller($seller)){

            $publicaciones = $productos->getProductosPorVendedor($seller);

            include '../Views/preview-seller.php';
        }
        
    } else {
        
        die("ID de vendedor no especificado");
    }
}

?>


