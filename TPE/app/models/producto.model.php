<?php
require_once './app/models/db.model.php';
require_once './database/config.php';

class ProductoModel extends Model{

    function getProductos(){
        $query = $this->db->prepare('SELECT * FROM productos');
        $query->execute();
        
        $productos = $query->fetchAll(PDO::FETCH_OBJ);

        return $productos;

    }

    //Trae un producto específico por id
    public function getProducto($id){
        $query = $this->db->prepare('SELECT * FROM productos p INNER JOIN categorias c ON p.id_categoria = c.id_categoria WHERE id_producto = ?');
        $query->execute([$id]);

        $producto = $query->fetch(PDO::FETCH_OBJ);
        return $producto;
    }


    //TRAE UN LISTADO DE PRODUCTOS POR CATEGORIA
    public function getByCategoria($id_categoria){
        $query = $this->db->prepare("SELECT * FROM productos WHERE id_categoria = ?");
        $query -> execute([$id_categoria]);
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $productos;
    }

    public function deleteProducto($id_producto){
        $query = $this->db->prepare('DELETE FROM productos WHERE id_producto = ?');
        $query->execute([$id_producto]);
    }

    public function updateProducto($nombre, $cantidad, $descripcion, $precio, $id_producto, $id_categoria) {    
        $query = $this->db->prepare("UPDATE productos SET nombre = ? , cantidad = ? , descripcion = ? , precio = ?, id_categoria = ? WHERE id_producto = ?");
        $query->execute([$nombre, $cantidad, $descripcion, $precio, $id_categoria, $id_producto]);
    }

    function addProducto($nombre, $cantidad, $descripcion, $precio, $id_categoria) {

        $query = $this->db->prepare('INSERT INTO productos (nombre, cantidad, descripcion, precio, id_categoria) VALUES(?,?,?,?,?)');
        $query->execute([$nombre, $cantidad, $descripcion, $precio, $id_categoria]);
    }

}