<?php

include_once '../Models/Usuario.php';
include_once '../Models/Conexion.php';

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
    echo $resultado;
}

////////////////////////////////// LOGIN

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['action']) && $_GET['action'] == 'login') {
    $conexion = new Conexion();
    $usuario = new Usuario($conexion->conn);

    $resultado = $usuario->login($_POST["userName"], $_POST["password"]);

    if ($resultado === "admin") {
        header("Location: ../Views/admin-dashboard.php");
    } elseif ($resultado === "user") {
        header("Location: ../Controllers/ProductosController.php");
    } elseif ($resultado === "seller") {
        header("Location: ../Views/profile-seller.php");
    } else {
        echo $resultado; // Mostrar mensaje de error como "Contraseña incorrecta" o "No se pudo iniciar sesión"
    }

    exit();
} else {
    echo "Operación no válida.";
}

?>