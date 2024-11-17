<?php
include_once("../Models/Lista.php");
include_once("../Models/Conexion.php");

$conexion= new Conexion();
$lista=new Lista($conexion->conn);

if(isset($_GET['list']) && $_GET['list']==='addItem' && $_SERVER['REQUEST_METHOD']==='POST'){
    $productoId=$_POST['producto_id'];
    $listaId=$_POST['lista_id'];
    $userid=$_POST['usuario'];

    $resultado=$lista->addToList($productoId,$listaId,$userid);
    echo json_encode(['success'=>$resultado]);
}

?>