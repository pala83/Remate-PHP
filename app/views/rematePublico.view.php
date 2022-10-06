<?php
require_once "./libs/smarty-4.2.1/libs/Smarty.class.php";

class vistaPublico {

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }

    public function mostrarHome($clientes, $articulos, $id){
        $this->smarty->assign("clientes", $clientes);
        $this->smarty->assign("articulos", $articulos);
        $this->smarty->assign("id", $id);
        $this->smarty->display("./templates/remate-public.tpl");
    }

    public function mostrarVendedores($clientes){
        $this->smarty->assign("clientes", $clientes);
        $this->smarty->display("./templates/tablaClientes-public.tpl");
    }

    public function mostrarArticulos($articulos, $clientes, $art){
        $this->smarty->assign("articulos", $articulos);
        $this->smarty->assign("clientes", $clientes);
        $this->smarty->assign("imagen", base64_encode($art->imagen));
        $this->smarty->assign("art_actual", $art);
        $this->smarty->display("./templates/tablaArticulos-public.tpl");
    }
    
    public function error404(){$this->smarty->display("./templates/404.tpl");}
}
?>