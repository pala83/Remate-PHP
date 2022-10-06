<?php
require_once './app/models/articulo.model.php';
require_once './app/models/cliente.model.php';
require_once './app/views/rematePublico.view.php';
require_once './app/views/remateAdmin.view.php';
require_once './app/views/login.view.php';

/*
select a.id_articulo,
       a.nombre_art,
       a.cantidad,
       a.valor_base,
       a.descripcion,
       a.imagen,
       a.id_cliente,
       c.nombre,
       c.apellido
    from articulo a 
    join cliente c on c.id_cliente = a.id_cliente;
*/

class Controlador {
    private $articuloModel;
    private $clienteModel;
    private $publicView;
    private $adminView;
    private $loginView;

    public function __construct() {
        $this->articuloModel = new ModeloArticulo();
        $this->clienteModel = new ModeloCliente();
        $this->publicView = new vistaPublico();
        $this->adminView = new vistaAdmin();
        $this->loginView = new Login();
    }
    
    public function mostrarHome($id=null) {
        $clientes = $this->clienteModel->obtenerClientes();
        $articulos = $this->articuloModel->obtenerArticulosPorCliente($id);
        $this->publicView->mostrarHome($clientes, $articulos, $id);
    }

    public function seccionVendedores() {
        $clientes = $this->clienteModel->obtenerClientes();
        $this->publicView->mostrarVendedores($clientes);
    }

    public function seccionArticulos($id=null){
        $articulos = $this->articuloModel->obtenerArticulos();
        $art = $this->articuloModel->obtenerArticuloPorID($id);
        $clientes = $this->nombresClientePorArticulo($articulos);
        $this->publicView->mostrarArticulos($articulos, $clientes, $art);
    }

    //FIN PARTE PUBLICA

    public function seccionAdmin(){
        $clientes = $this->clienteModel->obtenerClientes();
        $artPorID = [];
        foreach($clientes as $cliente)
            $artPorID[$cliente->id_cliente] = $this->articuloModel->obtenerArticulosPorCliente($cliente->id_cliente);
        $this->adminView->tablaGeneral($clientes, $artPorID);
    }

    public function adminClientes($resultado=null, $clientefk=null){
        $clientes = $this->clienteModel->obtenerClientes();
        $this->adminView->tablaClientes($clientes, $resultado, $clientefk);
    }

    public function agregarCliente(){
        //mejorar verificacion de datos
        if(!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["telefono"])){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = (int)$_POST['telefono'];
            $email = empty($_POST['email']) ? null : $_POST['email'];
            $this->clienteModel->insertar($nombre, $apellido, $telefono, $email);
            //$this->adminView->consultaCliente('exito');
            header("Location: ". BASE_URL."admin/clientes");
        }
        else{
            $this->adminClientes('error');
        }
    }

    public function borrarCliente($id){
        if($this->clienteModel->borrar($id) == '23000'){
            $cliente = $this->clienteModel->obtenerClientePorID($id);
            $this->adminClientes('error_fk', $cliente);
        }
        else{
            header("Location: ". BASE_URL."admin/clientes");
        }
    }

    public function borrarFK($id){
        $articulos = $this->articuloModel->obtenerArticulosPorCliente($id);
        foreach($articulos as $articulo){
            $this->articuloModel->borrarArticuloPorId($articulo->id_articulo);
        }
        $this->borrarCliente($id);
    }

    public function editarCliente($id){
        $cliente = $this->clienteModel->obtenerClientePorID($id);
        $this->adminClientes('edicion', $cliente);
    }
    
    public function confirmarEdicionCliente($id){
        if(!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["telefono"])){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = (int)$_POST['telefono'];
            $email = empty($_POST['email']) ? null : $_POST['email'];
            $this->clienteModel->editar($id, $nombre, $apellido, $telefono, $email);
        }
        header("Location: ". BASE_URL."admin/clientes");
    }

    //FIN PARTE CLIENTE

    public function adminArticulos($id=null, $resultado=null){
        $art = $this->articuloModel->obtenerArticuloPorID($id);
        if(isset($id) and !$art)
            return false;
        $articulos = $this->articuloModel->obtenerArticulos();
        $clientes = $this->clienteModel->obtenerClientes();
        $arrClientes = $this->nombresClientePorArticulo($articulos);
        $this->adminView->tablaArticulos($articulos, $clientes, $arrClientes, $resultado, $art);
        return true;
    }

    public function agregarArticulo() {
        if(!empty($_POST['nombre']) and !empty($_POST['cliente']) and !empty($_FILES['imagen'])){
            $nombre = $_POST['nombre'];
            $cliente = $_POST['cliente'];
            $imagen = addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));
            $cantidad = empty($_POST['cantidad']) ? 1 : $_POST['cantidad'];
            $valorB = empty($_POST['valorB']) ? null : $_POST['valorB'];
            $descripcion = empty($_POST['descripcion']) ? null : $_POST['descripcion'];
            $this->articuloModel->insertar($nombre, $cantidad, $valorB, $cliente, $imagen, $descripcion);
        }
        header("Location: ". BASE_URL."admin/clientes/articulos");
    }
   
    public function borrarArticulo($id) {
        $this->articuloModel->borrar($id);
        header("Location: " . BASE_URL."admin/clientes/articulos");
    }

    public function editarArticulo($id){
        $this->adminArticulos($id, 'edicion');
    }

    public function confirmarEdicionArticulo($id){
        if(!empty($_POST["nombre"]) and !empty($_POST["cliente"]) and !empty($_FILES["imagen"])){
            $nombre = $_POST['nombre'];
            $cliente = $_POST['cliente'];
            $imagen = addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));
            $cantidad = empty($_POST['cantidad']) ? 1 : $_POST['cantidad'];
            $valorB = empty($_POST['valorB']) ? null : $_POST['valorB'];
            $descripcion = empty($_POST['descripcion']) ? null : $_POST['descripcion'];
            $this->articuloModel->editar($id, $nombre, $cantidad, $valorB, $cliente, $imagen, $descripcion);
        }
        header("Location: ". BASE_URL."admin/clientes/articulos");
    }
    
    //FIN PARTE ARTICULOS

    public function error404($esAdmin){
        $esAdmin ? $this->adminView->error404() : $this->publicView->error404();
    }

    private function nombresClientePorArticulo($articulos){
        $retorno = [];
        foreach($articulos as $articulo){
            $cliente = $this->clienteModel->obtenerClientePorID($articulo->id_cliente);
            $retorno[$articulo->id_articulo] = $cliente->nombre." ".$cliente->apellido;
        }
        return $retorno;
    }

    public function login(){
        $this->loginView->mostrar();
    }
}
?>