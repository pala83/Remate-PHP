<?php
require_once './app/controllers/remate.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// instancio el unico controller que existe por ahora
$ctrl = new Controlador();

// tabla de ruteo
switch ($params[0]) {
    case 'home':
        isset($params[1]) ? $ctrl->mostrarHome($params[1]) : $ctrl->mostrarHome();
        break;
    case 'vendedores':
        $ctrl->seccionVendedores();
        break;
    case 'articulos':
        isset($params[1]) ? $ctrl->seccionArticulos($params[1]) : $ctrl->seccionArticulos();
        break;
    case 'login':
        $ctrl->login();
        break;
    case 'admin':
        if(isset($params[1])){
            if(isset($params[2])){
                switch ($params[2]){
                    case 'add':
                        $ctrl->agregarCliente();
                        break;
                    case 'borrar':
                        $id = isset($params[3]) ? (int)$params[3] : null;
                        $ctrl->borrarCliente($id);
                        break;
                    case 'borrarFK':
                        $ctrl->borrarFK($params[3]);
                        break;
                    case 'edit':
                        $ctrl->editarCliente($params[3]);
                        break;
                    case 'confirmar':
                        $ctrl->confirmarEdicionCliente($params[3]);
                        break;
                    case 'articulos':
                        if(isset($params[3])){
                            switch ($params[3]){
                                case 'add':
                                    $ctrl->agregarArticulo();
                                    break;
                                case 'borrar':
                                    $id = isset($params[4]) ? (int)$params[4] : null;
                                    $ctrl->borrarArticulo($id);
                                    break;
                                case 'edit':
                                    $ctrl->editarArticulo($params[4]);
                                    break;
                                case 'confirmar':
                                    $ctrl->confirmarEdicionArticulo($params[4]);
                                    break;
                                default:
                                    if(!$ctrl->adminArticulos($params[3]))
                                        $ctrl->error404(true);
                                    break;
                            }
                        }
                        else{
                            $ctrl->adminArticulos();
                        }
                        break;
                    default:
                        $ctrl->error404(true);
                        break;
                }
            }
            else{
                $params[1] == 'clientes' ? $ctrl->adminClientes() : $ctrl->error404(true);
            }
        }
        else
            $ctrl->seccionAdmin();
        break;
    default:
        $ctrl->error404(false);
        break;
}
?>