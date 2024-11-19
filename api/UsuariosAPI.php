<?php 
include_once '../Models/Conexion.php';
include_once '../Models/Usuario.php';

$conexion= new Conexion();
$user=new Usuario($conexion->conn);
session_start();
$method=$_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        $userId = $_SESSION['user_id'];
        $username=$_POST['user-profile'];
        $email=$_POST['email-profile'];
        $nombre = $_POST['name-profile'];
        $apellidoP = $_POST['ln1-profile'];
        $apellidoM = $_POST['ln2-profile'];
        $password = $_POST['pass-profile'];
        $passwordConfirm = $_POST['passconfirm-profile'];
        $bday = $_POST['bday-profile'];
        $gender = $_POST['gender'];
        $image = $_FILES['picture-profile'] ?? null;
    
        if (!empty($password) && $password !== $passwordConfirm) {
            echo json_encode(["success" => false, "message" => "Las contraseñas no coinciden."]);
            exit();
        }
        $user->setEmail($email); 
        $user->setUsername($username);
        $user->setName($nombre);
        $user->setLname($apellidoP);
        $user->setFname($apellidoM);
        $user->setPassword($password); 
        $user->setBday($bday);
        $user->setGender($gender);
    
        $resultado = $user->editarUsuario($userId, $image);
    
        if ($resultado === "Usuario actualizado exitosamente.") {
            session_destroy();
            echo json_encode(["success" => true, "message" => $resultado, "logout" => true]);
        } else {
            echo json_encode(["success" => false, "message" => $resultado]);
        }
    

    break;

    case 'DELETE':
        $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['user_id'])) {
        echo json_encode(["success" => false, "message" => "ID de usuario no proporcionado."]);
        exit();
    }

    $userId = $input['user_id'];

    try {
        $resultado = $user->desactivarUsuario($userId);

        if ($resultado === "Usuario desactivado exitosamente.") {
            echo json_encode(["success" => true, "message" => $resultado]);
        } else {
            echo json_encode(["success" => false, "message" => $resultado]);
        }
    } catch (Exception $e) {
        echo json_encode(["success" => false, "message" => "Error al desactivar el usuario: " . $e->getMessage()]);
    }

    break;

}


?>