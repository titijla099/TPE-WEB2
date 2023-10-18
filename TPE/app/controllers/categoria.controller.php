<?php
require_once './app/models/categoria.model.php';
require_once './app/views/categoria.view.php';

class CategoriaController{
    private $model;
    private $view;

    public function __construct(){
        
        $this->model = new CategoriaModel();
        $this->view = new CategoriaView();
    }

    public function showCategorias(){
        $categorias = $this->model->getCategorias();
        $this->view->showCategorias($categorias);   
    }

    public function deleteCategoria($id){
        AuthHelper::verify();

        try{
            $this->model->deleteCategoria($id);
            header('Location: ' . BASE_URL . "showCategorias");
        }
        catch(Exception){
            $this->view->showError("No se puede eliminar una categoria con productos cargados");
        }
    }

    public function formAddCategoria(){
        AuthHelper::verify();

        $categorias = $this->model->getCategorias();
        $this->view->showFormAdd($categorias);   
    }

    public function addCategoria(){
        AuthHelper::verify();

        $nombre = $_POST["nombre"];
        $precauciones = $_POST["precauciones"];

        if(!empty($nombre) || !empty($precauciones)){
            $this->model->addCategoria($nombre, $precauciones);
            header('Location: ' . BASE_URL . "showCategorias");
        } else{
            $this->view->showError("Complete todos los campos.");
            
        }
    }

    public function formUpdateCategoria($id){
        AuthHelper::verify();

        $categoria = $this->model->getCategoria($id);
        $this->view->showFormUpdate($categoria);   
    }

    public function updateCategoria($id){
        AuthHelper::verify();

        $nombre = $_POST["nombre"];
        $precauciones = $_POST["precauciones"];

        if(!empty($nombre) || !empty($precauciones)){
            $this->model->updateCategoria($nombre, $precauciones, $id);
            header('Location: ' . BASE_URL . "showCategorias");
        } else{
            $this->view->showError("Complete todos los campos.");
        }
    }
}