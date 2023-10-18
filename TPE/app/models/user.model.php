<?php
require_once './app/models/db.model.php';
require_once './database/config.php';

class UserModel extends Model{

    public function getUser($username){
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE username = ?");
        $query->execute([$username]);

        $user = $query->fetch(PDO::FETCH_OBJ);
        
        return $user;
    }
}