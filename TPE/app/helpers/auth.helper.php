<?php

class AuthHelper{

    public static function iniciarSesion() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function login($user){
        AuthHelper::iniciarSesion();
        $_SESSION['USER_ID'] = $user->id_user;
        $_SESSION['USER_NAME'] = $user->username;
        $_SESSION['IS_LOGGED'] = true;
    }

    public static function verify() {
        AuthHelper::iniciarSesion();
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . BASE_URL . '/showLogin');
            die();
        }
    }
    
    public static function esAdmin(){
        AuthHelper::iniciarSesion();
        return !empty($_SESSION["USER_ID"]);
    }
}