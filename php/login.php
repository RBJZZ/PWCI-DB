<?php

session_start();

include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = $_POST["userName"];
    $pass = $_POST["password"];

    $db = new Conexion();

    $login = $db->conn->prepare("CALL sp_login_usuario(?)");
    $login->bind_param("s",$user);
    $login->execute();

    $result = $login->get_result();
    $userlog = $result->fetch_assoc();

    if ($userlog && $userlog['us_estatus'] == 1) {
 
        if (password_verify($pass, $userlog['us_pass'])) {
            $_SESSION["user_id"] = $userlog["id"];
            $_SESSION["user_name"] = $userlog["nombre"];
            $_SESSION["user_AP"] = $userlog["apellidoP"];
            $_SESSION["user_AM"] = $userlog["apellidoM"];
            $_SESSION["user_bday"] = $userlog["bday"];
            $_SESSION["user_email"] = $userlog["email"];
            $_SESSION["user_type"] = $userlog["tipo_usuario"];
            $_SESSION["type_desc"] = $userlog["descripcion_rol"];
            $_SESSION["user_logdate"] = $userlog["us_fecha"];
            $_SESSION["user_pic"] = $userlog["photo_path"];
            $_SESSION["username"] = $userlog["username"];
            $_SESSION["usergender"]=$userlog["user_gender"];
            

            switch ($_SESSION["user_type"]) {
                case "admin": 
                    header("Location:../admin-dashboard.php");
                    break;
                case "user":
                    header("Location: ../dashboard.php");
                    break;
                case "seller":
                    header("Location: ../profile-seller.php");
                    break;
                default:
                    header("Location: ../index.php");
                    break;
            }
            exit();
        } else {

            echo "Contraseña incorrecta. Verifique sus datos.";
        }
    } else {
        echo "No se pudo iniciar sesión. Verifique sus credenciales.";
    }
    $login->close();
    $db->conn->close();
} else {
    echo "Operación no válida";
}


?>