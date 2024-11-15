<?php
include_once '../Models/Productos.php';
include_once '../Models/Conexion.php';
session_start();

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

}else if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['action'])&& $_GET['action']=='publicar'){


    if (isset($_SESSION['user_id'])) {
        $sellerId = $_SESSION['user_id']; 
    } else {
        echo "Error: Usuario no autenticado.";
        exit;
    }

    $productosModel->setSeller($_SESSION['user_id']);
    $productosModel->setTitle($_POST['product-name']);
    $productosModel->setDesc($_POST['product-desc']);
    $productosModel->setPrice($_POST['product-price']);
    $productosModel->setStock($_POST['product-stock']);
    $productosModel->setCat($_POST['category-select']);
    $productosModel->setQuotable(isset($_POST['quotable']) ? 1 : 0);
    $productosModel->setVideoUrl($_POST['product-video']);
    $productosModel->setStatus('Disponible');

    
    if (isset($_FILES['thumbnail-upload']) && $_FILES['thumbnail-upload']['error'] == UPLOAD_ERR_OK) {
        $thumbnailTmpPath = $_FILES['thumbnail-upload']['tmp_name'];
        $thumbnailExt = pathinfo($_FILES['thumbnail-upload']['name'], PATHINFO_EXTENSION);
        $thumbnailPath = "../Views/uploads/" . uniqid() . "." . $thumbnailExt;
        move_uploaded_file($thumbnailTmpPath, $thumbnailPath);
        $productosModel->setThumbnail($thumbnailPath);
    }

    
    $resultado = $productosModel->registroProductos($_FILES['multiple-pic-input'],$_POST['payment_methods']);

    
    echo $resultado;


} else {

    $productos=$productosModel->obtenerProductos();
    include '../Views/dashboard.php';
}


?>