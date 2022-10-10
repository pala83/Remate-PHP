<?php

class AutHelper {
    
    public function __construct() {
        session_start();
    }

    public function inicSesion($user) {
        $_SESSION['USER_EMAIL'] = $user->email;
        $_SESSION['IS_LOGGED'] = true;
        header('Location: '. BASE_URL);
    }

    public function tieneAcceso(){
        if($_SESSION['IS_LOGGED'])
            return true;
        return false;
    }

    public function logout() {
        session_destroy();
    }

    public function checkLoggedIn() {
        if (!isset($_SESSION['IS_LOGGED'])) {
            header('Location: ' .BASE_URL.'sesion');
            die();
        }       
    }

    public function getLoggedUserName() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        return $_SESSION['USERNAME'];
    }
}
?>