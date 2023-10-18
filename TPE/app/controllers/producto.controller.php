<?php
require_once './app/models/producto.model.php';
require_once './app/views/producto.view.php';
require_once './app/models/categoria.model.php';

class ProductoController{
    private $model;
    private $view;
    private $categoriaModel;


    public function __construct(){
        $this->model = new ProductoModel();
        $this->view = new ProductoView();
        $this->categoriaModel = new CategoriaModel();
    }

    public function showProductos(){
        //traigo los productos de la db
        $productos = $this->model->getProductos(); 
        $categorias = $this->categoriaModel->getCategorias();
        //mando el arreglo $productos a la view y los muestro
        $this->view->showProductos($productos, $categorias);
    }

    public function showDetalle($id){
        $producto = $this->model->getProducto($id);
        $categorias = $this->categoriaModel->getCategorias();
        $this->view->showDetalle($producto, $categorias);
    }

    public function showByCategoria($id_categoria){
        $productos = $this->model->getByCategoria($id_categoria);
        $this->view->showByCategoria($productos);
    }

    public function deleteProducto($id_producto){
        AuthHelper::verify();
        $this->model->deleteProducto($id_producto);
        header('Location: ' . BASE_URL);
    }

    public function updateProducto(){
        AuthHelper::verify();

         $id_producto = $_POST['id_producto'];
         $nombre = $_POST['nombre'];
         $cantidad = $_POST['cantidad'];
         $descripcion = $_POST['descripcion'];
         $precio = $_POST['precio'];
         $id_categoria = $_POST['categoria'];

        // validaciones
        if (!isset($nombre) || !isset($cantidad) || !isset($descripcion) || !isset($precio) || !isset($id_categoria)) {
            $this->view->showError("Debe completar todos los campos");
            die;
        } else {
            $this->model->updateProducto($nombre, $cantidad, $descripcion, $precio, $id_producto, $id_categoria);
            header("Location: " . BASE_URL . "showDetalle/" . $id_producto);
        }
    }

    public function formAddProducto(){
        AuthHelper::verify();
        $categorias = $this->categoriaModel->getCategorias();
        $this->view->showFormAdd($categorias);
    }

    public function addProducto(){ 
        AuthHelper::verify();

        $nombre = $_POST['nombre'];
        $cantidad = $_POST['cantidad'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $id_categoria = $_POST['categoria'];

        //validaciones para que no venga nada vacio

        if (empty($nombre)||empty($cantidad)||empty($descripcion)||empty($precio)||empty($id_categoria)){
            $this->view->showError("Complete todos los campos para continuar.");
        } else {
            $this->model->addProducto($nombre, $cantidad, $descripcion, $precio, $id_categoria); 
            header("Location: " . BASE_URL);
        }

    }
}