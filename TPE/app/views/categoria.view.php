<?php

class CategoriaView{

    public function showCategorias($categorias){
        $count = count($categorias);
        require './templates/categorias.phtml';
    }

    public function showFormAdd($categorias){
        require './templates/formAddCategoria.phtml';
    }

    public function showFormUpdate($categoria){
        require './templates/formUpdateCategoria.phtml';
    }

    public function showError($error){
        require './templates/error.phtml';
    }

}