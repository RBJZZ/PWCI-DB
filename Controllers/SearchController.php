<?php

include_once("../Models/Category.php");
include_once("../Models/Productos.php");
include_once("../Models/Conexion.php");

    $conexion = new Conexion();
    $filters = new Category($conexion->conn);
    $products = new Productos($conexion->conn);

if(isset($_GET['c'])){
        $keyword= htmlspecialchars($_GET['c']);
        $productos = $products->buscarProductos($keyword);
        $cat = $filters->getCategories();
        include '../Views/advanced-search.php';
    
}else if(isset($_GET['view'])&& $_GET['view']=='buscador' && isset($_POST['keyword'])){

    $keyword = htmlspecialchars($_POST['keyword']);
    $productos = $products->buscarProductos($keyword);
    $cat = $filters->getCategories();
    
    include '../Views/advanced-search.php';

}else{
    $productos = $products->obtenerProductos();
    $cat = $filters->getCategories();
    include '../Views/advanced-search.php';
}


?>