<?php
session_start();
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $db = new Conexion();


    $username = $_POST['username-register'];
    $password = password_hash($_POST['password-register'], PASSWORD_BCRYPT);
    $role = $_POST['role-selection'];
    $name = $_POST['name-register'];
    $lname = $_POST['fname-register'];
    $fname = $_POST['lname-register'];
    $email=$_POST['email-register'];
    $bday = $_POST['date-register'];
    $gender = $_POST['gender-register'];
    $estatus = 1;


    if (isset($_FILES['pic-register']) && $_FILES['pic-register']['error'] == UPLOAD_ERR_OK) { 
        $img_tmp = $_FILES['pic-register']['tmp_name'];
        $img_ext = pathinfo($_FILES['pic-register']['name'], PATHINFO_EXTENSION);
        $img_name = $username . "_" . uniqid() . "." . $img_ext; 
        $img_dest = "../userprofiles/" . $img_name;
    
        //PRUEBAS PARA SUBIR IMAGEN
        if (move_uploaded_file($img_tmp, $img_dest)) {
            echo "Imagen subida exitosamente.";
        } else {
            echo "Error al mover la imagen al destino.";
            $img_dest = "path/to/default-profile.png";
        }
    } else {
        
        switch ($_FILES['pic-register']['error']) {
            case UPLOAD_ERR_NO_FILE:
                echo "No se ha seleccionado ningún archivo.";
                break;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo "El archivo es demasiado grande.";
                break;
            default:
                echo "Error desconocido al subir el archivo.";
        }
    
        $img_dest = "path/to/default-profile.png";
    }

    
    $user_register = $db->conn->prepare("CALL sp_registro_usuario(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $user_register->bind_param(
        "ssisssssssi",
        $username, 
        $password, 
        $role, 
        $img_dest, 
        $name, 
        $lname, 
        $fname, 
        $email,
        $bday, 
        $gender, 
        $estatus
    );

    
    if ($user_register->execute()) {
        echo "Usuario registrado exitosamente.";
    } else {
        echo "Error al registrar el usuario: " . $user_register->error;
    }

    
    $user_register->close();
    $db->conn->close();
} else {
    echo "Método de solicitud no válido.";
}
?>
