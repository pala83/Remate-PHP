<?php
require_once './app/models/articulo.model.php';
require_once './app/models/cliente.model.php';
require_once './app/views/remate.view.php';
require_once './app/views/sesion.view.php';
require_once './app/helpers/aut.helper.php';

class PubController {
    protected $articuloModel;
    protected $clienteModel;
    protected $view;
    private $acceso;

    public function __construct() {
        $this->articuloModel = new ModeloArticulo();
        $this->clienteModel = new ModeloCliente();
        $this->view = new Vista();
        $helper = new AutHelper();
        $this->acceso = $helper->tieneAcceso();
    }
    
    public function mostrarHome($id=null) {
        $clientes = $this->clienteModel->obtenerClientes();
        $articulos = $this->articuloModel->obtenerArticulosPorCliente($id);
        $this->view->mostrarHome($clientes, $articulos, $id, $this->acceso);
    }

    public function seccionClientes($mensaje=null, $cliente_actual=null) {
        $clientes = $this->clienteModel->obtenerClientes();
        $this->view->mostrarClientes($clientes, $this->acceso, $mensaje, $cliente_actual);
    }

    public function seccionArticulos($id=null, $resultado=null){
        $art = $this->articuloModel->obtenerArticuloPorID($id);
        if(isset($id) and !$art)
            return false;
        $articulos = $this->articuloModel->obtenerArticulos();
        $clientes = $this->clienteModel->obtenerClientes();
        $arrClientes = $this->nombresClientePorArticulo($articulos);
        $this->view->mostrarArticulos($articulos, $clientes, $arrClientes, $resultado, $art, $this->acceso);
        return true;
    }
/*---------------------------------------------------------------------------------------------*/

    public function error404(){
        $this->view->error404();
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