<?php
require_once './app/views/sesion.view.php';
require_once './app/models/usuario.model.php';
require_once './app/helpers/aut.helper.php';

class AutController {
    private $view;
    private $model;
    private $helper;
    
    public function __construct() {
        $this->view = new VistaAutForm();
        $this->model = new ModeloUsuario();
        $this->helper = new AutHelper();
    }

    public function autForm($registro=null){
        $this->view->mostrar($registro);
    }

    public function validarUsuario(){
        if(isset($_POST["email"]) and isset($_POST["pass"])){
            $email = $_POST["email"];
            $pass = $_POST["pass"];
            $usuario = $this->model->obtenerUsuarioPorEmail($email);
            if(!empty($usuario) and password_verify($pass, $usuario->pass)){
                $this->helper->inicSesion($usuario);
            }
            else{
                $this->view->mostrar(false, "error");
            }
        }
    }

    public function registrarUsuario(){
        if(isset($_POST["email"]) and isset($_POST["pass"])){
            $email = $_POST["email"];
            $pass = $_POST["pass"];
            $this->model->insertar($email, password_hash($pass, PASSWORD_BCRYPT));
        }
        header("Location: ". BASE_URL."sesion");
    }

    public function cerrarSesion() {
        $this->helper->logout();
        header("Location: " . BASE_URL);
    }
}
?>