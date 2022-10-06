<?php

class ModeloUsuario {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=remate;charset=utf8', 'root', '');
    }

    public function getUser($usuario){
        $query = $this->db->prepare("SELECT * FROM usuario WHERE email=?");
        $sentencia->execute(array($usuario));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

}

?>