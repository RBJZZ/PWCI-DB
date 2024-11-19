<?php

class Usuario{
    private $conexion;
    private $id;
    private $log;
    private $username;
    private $email;
    private $password;
    private $role;
    private $name;
    private $lname;
    private $fname;
    private $bday;
    private $gender;
    private $status;
    private $pfp;
    private $posts;

    public function __construct($conexion){
        $this->conexion=$conexion;
    }
    ///////////////////////////////////////// REGISTRO /////////////////////////////////////////////////////////
    public function registrarUsuario($file){
        $status=1;
        $this->pfp = "path/to/default-profile.png"; 

        
        if (isset($file) && $file['error'] == UPLOAD_ERR_OK) {
            $img_tmp = $file['tmp_name'];
            $img_ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $img_name = $this->username . "_" . uniqid() . "." . $img_ext;
            $this->pfp = "../Views/userprofiles/" . $img_name;
    
            if (!move_uploaded_file($img_tmp, $this->pfp)) {
                $this->pfp = "path/to/default-profile.png";
            }
        } elseif (isset($file)) {
            switch ($file['error']) {
                case UPLOAD_ERR_NO_FILE:
                    break;
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    return "El archivo es demasiado grande.";
                default:
                    return "Error desconocido al subir el archivo.";
            }
        }
    
        $this->pfp = str_replace("../Views/", "../", $this->pfp);
        $stmt = $this->conexion->prepare("CALL sp_registro_usuario(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT); 
        $stmt->bind_param(
            "ssisssssssi",
            $this->username,
            $hashedPassword,
            $this->role,
            $this->pfp,
            $this->name,
            $this->lname,
            $this->fname,
            $this->email,
            $this->bday,
            $this->gender,
            $status
        );
    
        if ($stmt->execute()) {
            $stmt->close();
            return "Usuario registrado exitosamente.";
        } else {
            $error = "Error al registrar el usuario: " . $stmt->error;
            $stmt->close();
            return $error;
        }
    }

    public function editarUsuario($userId, $file = null) {
        
        $query = $this->conexion->prepare("SELECT us_pfp FROM USUARIOS WHERE us_ID = ?");
        $query->bind_param("i", $userId);
        $query->execute();
        $result = $query->get_result();
        
        
        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $this->pfp = $user['us_pfp']; 

        } else {
            
            throw new Exception("Usuario no encontrado.");
        }
    
        if (isset($file) && $file['error'] == UPLOAD_ERR_OK) {
            $img_tmp = $file['tmp_name'];
            $img_ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $img_name = $this->username . "_" . uniqid() . "." . $img_ext;
            $this->pfp = "../Views/userprofiles/" . $img_name;
    
            if (!move_uploaded_file($img_tmp, $this->pfp)) {
                $this->pfp = $user['us_pfp'];
            }
        }
    
        if (empty($this->password)) {
            $query = $this->conexion->prepare("SELECT us_pass FROM USUARIOS WHERE us_ID = ?");
            $query->bind_param("i", $userId);
            $query->execute();
            $result = $query->get_result();

            if ($result && $result->num_rows > 0) {
                $user = $result->fetch_assoc();
                $hashedPassword = $user['us_pass'];
            } else {
                
                throw new Exception("Usuario no encontrado.");
            }
        } else {
            $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT); 
        }
    
        $stmt = $this->conexion->prepare("CALL sp_editar_usuario(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "issssssssi",
            $userId,
            $this->username,
            $hashedPassword,
            $this->pfp,
            $this->name,
            $this->lname,
            $this->fname,
            $this->email,
            $this->bday,
            $this->gender
        );
    
        if ($stmt->execute()) {
            $stmt->close();
            return "Usuario actualizado exitosamente.";
        } else {
            $error = "Error al actualizar el usuario: " . $stmt->error;
            $stmt->close();
            return $error;
        }
    }
    
    public function desactivarUsuario($userId) {
        $stmt = $this->conexion->prepare("CALL sp_delete_usuario(?)");
        $stmt->bind_param("i", $userId);
    
        if ($stmt->execute()) {
            $stmt->close();
            return "Usuario desactivado exitosamente.";
        } else {
            $error = "Error al desactivar el usuario: " . $stmt->error;
            $stmt->close();
            return $error;
        }
    }
    
    //////////////////////////////////////// LOGIN ////////////////////////////////////////////////////////////
    public function login($key, $password) {
        $stmt = $this->conexion->prepare("CALL sp_login_usuario(?)");
        $stmt->bind_param("s", $key);
        $stmt->execute();
        $result = $stmt->get_result();
        $userlog = $result->fetch_assoc();

        if ($userlog && $userlog['us_estatus'] == 1) {
            if (password_verify($password, $userlog['us_pass'])) {
                
                session_start();
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
                $_SESSION["usergender"] = $userlog["user_gender"];

                $stmt->close();
                return $_SESSION["user_type"];
            } else {
                $stmt->close();
                return "Contraseña incorrecta. Verifique sus datos.";
            }
        } else {
            $stmt->close();
            return "No se pudo iniciar sesión. Verifique sus credenciales.";
        }
    }

    public function loginE($key, $password) {
        $stmt = $this->conexion->prepare("CALL sp_login_email(?)");
        $stmt->bind_param("s", $key);
        $stmt->execute();
        $result = $stmt->get_result();
        $userlog = $result->fetch_assoc();

        if ($userlog && $userlog['us_estatus'] == 1) {
            if (password_verify($password, $userlog['us_pass'])) {
                
                session_start();
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
                $_SESSION["usergender"] = $userlog["user_gender"];

                $stmt->close();
                return $_SESSION["user_type"];
            } else {
                $stmt->close();
                return "Contraseña incorrecta. Verifique sus datos.";
            }
        } else {
            $stmt->close();
            return "No se pudo iniciar sesión. Verifique sus credenciales.";
        }
    }


    public function getSeller($id){
        $stmt=$this->conexion->prepare("CALL sp_sellerpf(?)");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result();
        $seller=$result->fetch_assoc();

        if($seller && $seller["seller_status"]==1){
            $stmt->close();
           
            $this->username=$seller['seller_usname'];
            $this->id=$seller['seller_id'];
            $this->name=$seller['seller_name'];
            $this->email=$seller['seller_email'];
            $this->pfp=$seller['us_pic'];
            $this->log=$seller['seller_log'];
            $this->status=$seller['seller_status'];
            $this->role=$seller['seller_role'];
            $this->posts=$seller['total_productos'];

            return true;
        }else{
            $stmt->close();
            echo "No se encontró el usuario.";
            return false;
        }
    }


   ////////////////////////////////////////////////////////// MÉTODOS GETTERS /////////////////////////////////
    
    public function getId(){
        return $this->id;
    }
   
    public function getUsername(){
        return $this->username;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getRole(){
        return $this->role;
    }
    public function getName(){
        return $this->name;
    }
    public function getLname(){
        return $this->lname;
    }
    public function getFname(){
        return $this->fname;
    }
    public function getBday(){
        return $this->bday;
    }
    public function getGender(){
        return $this->gender;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getPfp(){
        return $this->pfp;
    }
    public function getLog(){
        return $this->log;
    }
    public function getPosts(){
        return $this->posts;
    }

    ///////////////////////////////////////////////////////////////// MÉTODOS SETTERS ////////////////////////
    
    public function setUsuario($username, $email, $password, $role, $name, $fname, $lname, $bday, $gender, $pfp, $status){
        $this->username=$username;
        $this->email=$email;
        $this->password=$password;
        $this->role=$role;
        $this->name=$name;
        $this->fname=$fname;
        $this->lname=$lname;
        $this->bday=$bday;
        $this->gender=$gender;
        $this->pfp=$pfp;
        $this->status=$status;
    }

    public function setId($id){
        $this->id=$id;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setRole($role){
        $this->role = $role;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setLname($lname){
        $this->lname = $lname;
    }
    public function setFname($fname){
        $this->fname = $fname;
    }
    public function setBday($bday){
        $this->bday = $bday;
    }
    public function setGender($gender){
        $this->gender = $gender;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function setPfp($pfp){
        $this->pfp = $pfp;
    }
    public function setLog($log){
        $this->log = $log;
    }
    public function setPosts($posts){
        $this->posts = $posts;
    }

}


?>