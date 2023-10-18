<?php

    class DataBaseHelper{

        public static function crearDB($host, $username, $password, $nombreDb){
            $pdo = new PDO("mysql:host=$host", $username, $password);
            $query = "CREATE DATABASE IF NOT EXISTS $nombreDb";
            $pdo->exec($query); 
        }
    }