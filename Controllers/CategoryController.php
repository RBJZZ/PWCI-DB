<?php
include_once '../Models/Category.php';
include_once '../Models/Conexion.php';


    $conexion = new Conexion();
    $category = new Category($conexion->conn);
    $cat = $category->getCategories();



    if (isset($_GET['view']) && $_GET['view'] === 'buscador') {
        include '../Views/advanced-search.php';
    } else if(isset($_GET['view'])&& $_GET['view']==='publicar') {
        include '../Views/publish-product.php';
    }

    



?>