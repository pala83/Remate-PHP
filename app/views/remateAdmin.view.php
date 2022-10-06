<?php
require_once "./libs/smarty-4.2.1/libs/Smarty.class.php";

class vistaAdmin {

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign("tieneAcceso", true);
    }

    public function tablaGeneral($clientes, $artPorID){
        $this->smarty->assign("clientes", $clientes);
        $this->smarty->assign("artPorID", $artPorID);        
        $this->smarty->display("./templates/tablaGral-admin.tpl");
    }

    public function tablaClientes($clientes, $resultado, $cliente){
        $this->smarty->assign("clientes", $clientes);
        $this->smarty->assign("resultado", $resultado);
        $this->smarty->assign("cliente", $cliente);
        $this->smarty->display("./templates/tablaClientes-admin.tpl");
    }

    public function tablaArticulos($articulos, $clientes, $arrCliente, $resultado, $art=null){
        $this->smarty->assign("articulos", $articulos);
        $this->smarty->assign("clientes", $clientes);
        $this->smarty->assign("arrCliente", $arrCliente);
        $this->smarty->assign("art_actual", $art);
        $this->smarty->assign("imagen", base64_encode($art->imagen));
        $this->smarty->assign("resultado", $resultado);
        $this->smarty->display("./templates/tablaArticulos-admin.tpl");
    }

    public function error404(){$this->smarty->display("./templates/404.tpl");}

}
//--------------------------------------------------------------------------//
?> 