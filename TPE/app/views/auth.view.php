<?php

class authView{

    public function showLogin(){
        require_once './templates/logIn.phtml';
    }

    public function showError($error){
        require_once './templates/error.phtml';
    }
}