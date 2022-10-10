<?php

require_once 'public.controller.php';

class ABMController extends PubController{
    private $helper;
    
    public function __construct() {
        parent::__construct();
        $this->helper = new AutHelper;
        $this->helper->checkLoggedIn();
    }

    public function agregarCliente(){
        $data = $this->dataFormCliente();
        if(!empty($data)){
            $this->clienteModel->insertar($data["nombre"], $data["apellido"], $data["telefono"], $data["email"]);
            header("Location: ". BASE_URL."clientes");
        }
        else{
            $this->seccionClientes('error');
        }
    }

    public function borrarCliente($id){
        if($this->clienteModel->borrar($id) == '23000'){
            $cliente = $this->clienteModel->obtenerClientePorID($id);
            $this->seccionClientes('error_fk', $cliente);
        }
        else{
            header("Location: ". BASE_URL."clientes");
        }
    }

    public function borrarFK($id){
        $articulos = $this->articuloModel->obtenerArticulosPorCliente($id);
        foreach($articulos as $articulo){
            $this->articuloModel->borrar($articulo->id_articulo);
        }
        $this->borrarCliente($id);
    }

    public function editarCliente($id){
        $cliente = $this->clienteModel->obtenerClientePorID($id);
        $this->seccionClientes('edicion', $cliente);
    }
    
    public function confirmarEdicionCliente($id){
        $data = $this->dataFormCliente();
        $this->clienteModel->editar($id, $data["nombre"], $data["apellido"], $data["telefono"], $data["email"]);
        header("Location: ". BASE_URL."clientes");
    }

    //FIN PARTE CLIENTE

    public function agregarArticulo(){
        $data = $this->dataFormArticulo();
        $this->articuloModel->insertar($data["nombre"], $data["cantidad"], $data["valorB"], $data["cliente"], $data["imagen"], $data["descripcion"]);
        header("Location: ". BASE_URL."articulos");
    }
   
    public function borrarArticulo($id){
        $this->articuloModel->borrar($id);
        header("Location: " . BASE_URL."articulos");
    }

    public function editarArticulo($id){
        $this->seccionArticulos($id, 'edicion');
    }

    public function confirmarEdicionArticulo($id){
        $data = $this->dataFormArticulo();
        $this->articuloModel->editar($id, $data["nombre"], $data["cantidad"], $data["valorB"], $data["cliente"], $data["imagen"], $data["descripcion"]);
        header("Location: ". BASE_URL."articulos");
    }

    //FIN PARTE ARTICULO

    //FUNCIONES PARA FORMULARIOS

    private function dataFormCliente(){
        $retorno = [];
        if(!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["telefono"])){
            $retorno = [
                "nombre" => $_POST['nombre'],
                "apellido" => $_POST['apellido'],
                "telefono" => (int)$_POST['telefono'],
                "email" => empty($_POST['email']) ? null : $_POST['email'],
            ];
        }
        return $retorno;
    }

    private function dataFormArticulo(){
        $retorno = [];
        if(!empty($_POST['nombre']) and !empty($_POST['cliente']) and !empty($_FILES['imagen'])){
            $retorno = [
                "nombre" => $_POST['nombre'],
                "cliente" => $_POST['cliente'],
                "imagen" => addslashes(file_get_contents($_FILES["imagen"]["tmp_name"])),
                "cantidad" => empty($_POST['cantidad']) ? 1 : $_POST['cantidad'],
                "valorB" => empty($_POST['valorB']) ? null : $_POST['valorB'],
                "descripcion" => empty($_POST['descripcion']) ? null : $_POST['descripcion'],
            ];
        }
        return $retorno;
    }
}

?>