<?php

class AutHelper {
    
    public function __construct() {
        if(!isset($_SESSION)){
            session_start(); 
        }
    }

    public function inicSesion($user) {
        $_SESSION['USER_EMAIL'] = $user->email;
        $_SESSION['IS_LOGGED'] = true;
        header('Location: '. BASE_URL);
    }

    public function tieneAcceso(){
        if(isset($_SESSION['IS_LOGGED']))
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
}
?>