<?php

class Usuario{
    private $conexion;
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
    //////////////////////////////////////// LOGIN ////////////////////////////////////////////////////////////
    public function login($username, $password) {
        $stmt = $this->conexion->prepare("CALL sp_login_usuario(?)");
        $stmt->bind_param("s", $username);
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

   ////////////////////////////////////////////////////////// MÉTODOS GETTERS /////////////////////////////////
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

}


?>