<?php
class ProductoView{
     
    public function showProductos($productos, $categorias){
        require('./templates/productos.phtml');
    }
    
    public function showDetalle($producto, $categorias){
        require('./templates/detalleProducto.phtml');
    }

    public function showByCategoria($productos){
        require('./templates/productosByCategoria.phtml');
    }

    public function showFormAdd($categorias){
        require('./templates/formAddProducto.phtml');
    }

    public function showError($error){
        require 'templates/error.phtml';
    }
}