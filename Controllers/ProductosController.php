<?php
include_once '../Models/Productos.php';
include_once '../Models/Conexion.php';

$conexion=new Conexion();
$productosModel=new Productos($conexion->conn);

if (isset($_GET['id'])) {
    $product_id = htmlspecialchars($_GET['id']);
    $producto = $productosModel->previewProductos($product_id);

    if ($producto) {
        
        include '../Views/product-view.php';
        
    } else {
        echo 'No se encontró el producto :(';
    }

} else {

    $productos=$productosModel->obtenerProductos();
    include '../Views/dashboard.php';
}







?>