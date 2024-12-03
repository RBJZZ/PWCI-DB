<?php

include_once '../Models/Usuario.php';
include_once '../Models/Conexion.php';
include_once '../Models/Lista.php';
include_once '../Middlewares/AuthMiddleware.php';

$conexion=new Conexion();
$usuario=new Usuario($conexion->conn);
$lista=new Lista($conexion->conn);

/////////////////////////// PERFIL DE OTROS USUARIOS
if (isset($_GET['action']) && $_GET['action'] === 'view' && isset($_GET['id'])) {
    $userId = intval($_GET['id']);

    $usuario = $usuario->obtenerDetallesUsuario($userId);
    $listas = $lista->obtenerListas($userId);

    include '../Views/profile-other.php';
}



/////////////////////////////////// REGISTRO
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['action']) && $_GET['action'] == 'registrar') {
    $conexion = new Conexion;
    $usuario = new Usuario($conexion->conn);

    $usuario->setUsername($_POST['username-register']);
    $usuario->setPassword( $_POST['password-register']);
    $usuario->setRole($_POST['role-selection']);
    $usuario->setName($_POST['name-register']);
    $usuario->setFname($_POST['fname-register']);
    $usuario->setLname($_POST['lname-register']);
    $usuario->setEmail($_POST['email-register']);
    $usuario->setBday($_POST['date-register']);
    $usuario->setGender($_POST['gender-register']);

    
    $resultado = $usuario->registrarUsuario($_FILES['pic-register']);

    if ($resultado) {
        header("Location: ../Views/index.php");
        exit();
    } else {
        echo 'No se registró correctamente el usuario.';
        exit();
    }
}

////////////////////////////////// LOGIN

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['action']) && $_GET['action'] == 'login') {
    $conexion = new Conexion();
    $usuario = new Usuario($conexion->conn);

    if(isset($_POST['key'])){
        $clave=$_POST['key'];

        if (filter_var($clave, FILTER_VALIDATE_EMAIL)) {
           
            $resultado=$usuario->loginE($clave, $_POST["password"]);
            //si es correo
          
        } else {
           //no es correo
            $resultado = $usuario->login($clave, $_POST["password"]);
        }
    }

    

    if ($resultado === "admin") {

        AuthMiddleware::verificarUsuario('admin');
        header("Location: ../Views/admin-dashboard.php");
        exit();
    } elseif ($resultado === "user") {
        AuthMiddleware::verificarUsuario('user');
        header("Location: ../Controllers/ProductosController.php");
        exit();
    } elseif ($resultado === "seller") {
        AuthMiddleware::verificarUsuario('seller');
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $id=$_SESSION['user_id'];
        header("Location: ../Controllers/SellerController.php?id=$id");
        exit();
    } else {
        echo $resultado;
    }

    exit();

} 




?>