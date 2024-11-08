<?php

    include 'Conexion.php';
if (isset($_GET['id'])) {

    $product_id = $_GET['id'];
    $product_id = htmlspecialchars($product_id);

    $db=new Conexion;

    $view=$db->conn->prepare("CALL sp_productopreview(?)");
    $view->bind_param("s", $product_id);
    $view->execute();

    $result=$view->get_result();
    $product=$result->fetch_assoc();

    if($product){
        
    }


}else{
    echo 'No se encontró el producto:(';
}






?>