<?php

session_start();

include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = $_POST["userName"];
    $pass = $_POST["password"];

    $db = new Conexion();

    $script = $db->conn->prepare("CALL sp_login_usuario(?, ?)");
    $script->bind_param("ss", $user, $pass);
    $script->execute();

    $result = $script->get_result();
    $userlog = $result->fetch_assoc();

    if ($userlog['id'] !== null) {
        $_SESSION["user_id"] = $userlog["id"];
        $_SESSION["user_name"] = $userlog["nombre"];
        $_SESSION["user_type"] = $userlog["tipo_usuario"];
        $_SESSION["type_desc"] = $userlog["descripcion_rol"];

        echo "Valor de user_type: ";
        var_dump($_SESSION["user_type"]);
        echo "<br>";

        switch ($_SESSION["user_type"]) {
            case "admin":
                header("Location: ../admin-dashboard.php");
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
        echo "No se pudo iniciar sesión, verifique los campos";
    }

    $script->close();
} else {
    echo "Operación no válida";
}


?>