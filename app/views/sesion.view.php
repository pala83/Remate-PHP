<?php
require_once "./libs/smarty-4.2.1/libs/Smarty.class.php";

class VistaAutForm {

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign("tieneAcceso", true);
    }

    public function mostrar($registro, $mensaje=null){
        $this->smarty->assign("registro", $registro);
        $this->smarty->assign("mensaje", $mensaje);
        $this->smarty->display("./templates/form-autenticacion.tpl");
    }
}