<?php
session_start();
include_once '../Models/Category.php';
include_once '../Models/Conexion.php';


    $conexion = new Conexion();
    $category = new Category($conexion->conn);
    $cat = $category->getCategories();



    if (isset($_GET['view']) && $_GET['view'] === 'buscador') {
        include '../Views/advanced-search.php';
    } else if(isset($_GET['view'])&& $_GET['view']==='publicar') {
        include '../Views/publish-product.php';
    }else if(isset($_GET['view']) && $_GET['view']==='consultas'){
        include '../Views/consult-sales.php';
    }else if(isset($_GET['view']) && $_GET['view']=='pedidos'){
        include '../Views/consult-client.php';
    }



    if (isset($_GET['action']) && $_GET['action'] === 'getCategories') {

        $cat = $category->getCategories();
        header('Content-Type: application/json');
        echo json_encode($cat);
        exit;
    }
    
    
    
    if (isset($_GET['action']) && $_GET['action'] === 'registro' && $_SERVER['REQUEST_METHOD'] === 'POST') {

        $seller=NULL;
     
        if(isset($_SESSION["user_id"]) && $_SESSION["user_type"]==="seller"){
            $seller=$_SESSION["user_id"];
        }else{
            echo "No hay usuario";
        }
        $catName = isset($_POST['cat-title']) ? $_POST['cat-title'] : '';
        $catDesc = isset($_POST['cat-description']) ? $_POST['cat-description'] : '';
    
        if (!empty($catName) && !empty($catDesc) && !empty($seller)) {
   
            if ($category->CreateCategory($catName, $catDesc, $seller)) {
                echo "Categoría registrada exitosamente.";
            } else {
                echo "Error al registrar la categoría.";
            }
        } else {
            echo "Por favor, completa todos los campos.";
        }
    }

    



?>