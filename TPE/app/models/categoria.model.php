<?php
require_once './app/models/db.model.php';
require_once './database/config.php';

class CategoriaModel extends Model{

    public function getCategorias(){
        //envio la consulta
        $query = $this->db->prepare("SELECT * FROM categorias");
        $query->execute();

        //$categorias es un arreglo de categorias
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorias;
    }

    public function getCategoria($id){
        $query = $this->db->prepare("SELECT * FROM categorias WHERE id_categoria = ?");
        $query->execute([$id]);

        $categoria = $query->fetch(PDO::FETCH_OBJ);

        return $categoria;
    }

    public function deleteCategoria($id){
        $query = $this->db->prepare('DELETE FROM categorias WHERE id_categoria = ?');
        $query->execute([$id]);
    }

    public function addCategoria($nombre, $precauciones){
        $query = $this->db->prepare('INSERT INTO categorias (nombreCat, precauciones) VALUES (?,?)');
        $query->execute([$nombre, $precauciones]);
    }

    public function updateCategoria($nombre, $precauciones, $id){
        $query = $this->db->prepare('UPDATE categorias SET nombreCat = ? , precauciones = ? WHERE id_categoria = ?');
        $query->execute([$nombre, $precauciones, $id]);
    }
}