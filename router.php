<?php
require_once './app/controllers/abm.controller.php';
require_once './app/controllers/public.controller.php';
require_once './app/controllers/autenticacion.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

$ctrlPub = new PubController();
$ctrlAut = new AutController();

// tabla de ruteo
switch ($params[0]) {
    case 'home':
        isset($params[1]) ? $ctrlPub->mostrarHome($params[1]) : $ctrlPub->mostrarHome();
        break;
    case 'clientes':
        if(isset($params[1])){
            $ctrlABM = new ABMController();
            switch($params[1]){
                case 'add':
                    $ctrlABM->agregarCliente();
                    break;
                case 'borrar':
                    $id = isset($params[2]) ? (int)$params[2] : null;
                    $ctrlABM->borrarCliente($id);
                    break;
                case 'borrarFK':
                    $ctrlABM->borrarFK($params[2]);
                    break;
                case 'edit':
                    $ctrlABM->editarCliente($params[2]);
                    break;
                case 'confirmar':
                    $ctrlABM->confirmarEdicionCliente($params[2]);
                    break;
                default:
                    $ctrlPub->error404();
                    break;
            }
        }
        else{
            $ctrlPub->seccionClientes();
        }
        break;
    case 'articulos':
        if(isset($params[1])){
            if($ctrlPub->seccionArticulos($params[1])){
                break;
            }
            else{
                $ctrlABM = new ABMController();
                switch($params[1]){
                    case 'add':
                        $ctrlABM->agregarArticulo();
                        break;
                    case 'borrar':
                        $id = isset($params[2]) ? (int)$params[2] : null;
                        $ctrlABM->borrarArticulo($id);
                        break;
                    case 'edit':
                        $ctrlABM->editarArticulo($params[2]);
                        break;
                    case 'confirmar':
                        $ctrlABM->confirmarEdicionArticulo($params[2]);
                        break;
                    default:
                        $ctrlPub->error404();
                        break;
                }
            }
        }
        else{
            $ctrlPub->seccionArticulos();
        }
        break;
    case 'sesion':
        $ctrlAut->autForm();
        break;
    case 'validateLogin':
        $ctrlAut->validarUsuario();
        break;
    case 'register':
        $ctrlAut->autForm(true);
        break;
    case 'validateRegister':
        $ctrlAut->registrarUsuario();
        break;
    case 'cerrarSesion':
        $ctrlAut->cerrarSesion();
    default:
        $ctrlPub->error404();
        break;
}
?>