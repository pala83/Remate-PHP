<?php
require_once "./libs/smarty-4.2.1/libs/Smarty.class.php";

class Login {

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign("tieneAcceso", true);
    }

    public function mostrar(){
        $this->smarty->display("./templates/login.tpl");
    }

}