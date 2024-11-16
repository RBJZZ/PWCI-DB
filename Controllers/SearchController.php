<?php

include_once("../Models/Category.php");
include_once("../Models/Productos.php");
include_once("../Models/Conexion.php");

    $conexion = new Conexion();
    $filters = new Category($conexion->conn);
    $products = new Productos($conexion->conn);


if( isset($_GET['action']) && $_GET['action']==='advanced' && $_SERVER['REQUEST_METHOD']==='POST'){

        
    $keyword = htmlspecialchars($_POST['keyword'] ?? '');
    $categorias = $_POST['categorias'] ?? [];
    $minPrice = isset($_POST['minPrice']) ? (float)$_POST['minPrice'] : null;
    $maxPrice = isset($_POST['maxPrice']) ? (float)$_POST['maxPrice'] : null;
    $rating = 0;

    $productos = $products->buscarAvanzado($keyword, $categorias, $minPrice, $maxPrice, $rating);

    header('Content-Type: application/json');
    echo json_encode($productos);
    exit;
    
}else if(isset($_GET['c'])){

    $keyword = htmlspecialchars($_GET['c'] ?? '');
    $resultados = $products->buscarProductos($keyword);

    
    $productos = $resultados['productos'] ?? [];
    $precios = $resultados['precios'] ?? ['precio_minimo' => 0, 'precio_maximo' => 0];

    $cat = $filters->getCategories();
    
    include '../Views/advanced-search.php';

    

}else if(isset($_GET['view'])&& $_GET['view']=='buscador' && isset($_POST['keyword'])){

    $keyword = htmlspecialchars($_POST['keyword'] ?? '');
    $resultados = $products->buscarProductos($keyword);
    $productos = $resultados['productos'] ?? [];
    $precios = $resultados['precios'] ?? ['precio_minimo' => 0, 'precio_maximo' => 0];
    $cat = $filters->getCategories();
    
    include '../Views/advanced-search.php';

}else{
    
    $keyword='';
    $resultados = $products->obtenerProductos();
    $productos=$resultados['productos'];
    $precios = $resultados['precios'];
    $cat = $filters->getCategories();
    
    include '../Views/advanced-search.php';
}



?>