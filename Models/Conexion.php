<?php

class Conexion{

    private $server="localhost";
    private $user="root";
    private $password="GreenBean2024@!";
    private $database="db_pwci";
    private $port=3306;
    public $conn;

    public function __construct()
    {
        $this->conn= new mysqli($this->server, $this->user, $this->password, $this->database, $this->port);

        if($this->conn->connect_error){
            die ("No se pudo conectar: ".$this->conn->connect_error);
        }

    }
}

?>