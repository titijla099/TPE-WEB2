<?php
    require_once './app/models/user.model.php';
    require_once './app/views/auth.view.php';
    require_once './app/helpers/auth.helper.php';   
    
    class AuthController{
    
    private $model;
    private $view;

    public function __construct(){
        $this->model = new userModel();
        $this->view = new authView();
    }

    public function showLogin(){
        $this->view->showLogin();
    }

    public function validate(){

        if(!empty($_POST["username"]) || !empty($_POST["password"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $user = $this->model->getUser($username);

            //busco el usuario en la db
            if($user && password_verify($password, $user->password)){
                //si existe lo autentico
                AuthHelper::login($user);
                header("location:".BASE_URL);

            }else {
                $this->view->showError('Usuario inválido');
            }
    
        }
        else{
            $this->view->showError("Complete todos los campos para poder ingresar");
            return;
        }
    }

    public function logout(){
        AuthHelper::iniciarSesion();
        session_destroy();
        header("location:".BASE_URL);
    }

}