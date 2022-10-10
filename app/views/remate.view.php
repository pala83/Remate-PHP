<?php
require_once "./libs/smarty-4.2.1/libs/Smarty.class.php";

class Vista{

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }

    public function mostrarHome($clientes, $articulos, $id, $acceso){
        $this->smarty->assign("clientes", $clientes);
        $this->smarty->assign("articulos", $articulos);
        $this->smarty->assign("tieneAcceso", $acceso);
        $this->smarty->assign("id", $id);
        $this->smarty->display("./templates/tablaGral.tpl");
    }

    public function mostrarClientes($clientes, $acceso, $resultado=null, $cliente_actual=null){
        $this->smarty->assign("clientes", $clientes);
        $this->smarty->assign("tieneAcceso", $acceso);
        $this->smarty->assign("cActual", $cliente_actual);
        $this->smarty->assign("resultado", $resultado);
        $this->smarty->display("./templates/tablaClientes.tpl");
    }

    public function mostrarArticulos($articulos, $clientes, $arrCliente, $resultado, $art=null, $acceso){
        $this->smarty->assign("articulos", $articulos);
        $this->smarty->assign("clientes", $clientes);
        $this->smarty->assign("arrCliente", $arrCliente);
        $this->smarty->assign("resultado", $resultado);
        $this->smarty->assign("art_actual", $art);
        $this->smarty->assign("tieneAcceso", $acceso);
        $this->smarty->assign("imagen", base64_encode($art->imagen));
        $this->smarty->display("./templates/tablaArticulos.tpl");
    }
    
    public function error404(){
        $this->smarty->display("./templates/404.tpl");
    }
}
?>