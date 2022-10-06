<?php

class ModeloCliente {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=remate;charset=utf8', 'root', '');
    }

    public function obtenerClientes() {
        $query = $this->db->prepare("SELECT * FROM cliente");
        $query->execute();
        $clientes = $query->fetchAll(PDO::FETCH_OBJ);
        return $clientes;
    }

    public function obtenerClientePorID($id) {
        $query = $this->db->prepare("SELECT * FROM cliente WHERE id_cliente = ?");
        $query->execute([$id]);
        $cliente = $query->fetch(PDO::FETCH_OBJ);
        return $cliente;
    }

    public function insertar($nombre, $apellido, $telefono, $email=null) {
        $query = $this->db->prepare("INSERT INTO cliente (nombre, apellido, telefono, email) VALUES (?, ?, ?, ?)");
        $query->execute([$nombre, $apellido, $telefono, $email]);
        echo($this->db->lastInsertId());
        return $this->db->lastInsertId();
    }

    public function existeID($id){
        $query = $this->db->prepare("SELECT * FROM cliente WHERE id_cliente = ?");
        $query->execute([$id]);
        $cliente = $query->fetchAll(PDO::FETCH_OBJ);
        return !empty($cliente);
    }

    public function borrar($id) {
        $query = $this->db->prepare("DELETE FROM cliente WHERE id_cliente = ?");
        try {$query->execute([$id]);} 
        catch (PDOException $e){}
        return $query->errorCode();
    }

    public function editar($id, $nombre, $apellido, $telefono, $email){
        $query = $this->db->prepare("UPDATE cliente SET nombre=?, apellido=?, telefono=?, email=? WHERE id_cliente=?");
        $query->execute([$nombre, $apellido, $telefono, $email, $id]);
        return $this->db->lastInsertId();
    }
}
?>