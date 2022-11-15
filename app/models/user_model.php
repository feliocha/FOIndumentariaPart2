<?php

class UserModel {

    private function getDB() {
        $db = new PDO('mysql:host=localhost;'.'dbname=FOIndumentaria;charset=utf8', 'root', '');
        return $db;
    }
    
    function getUsuarios() {
        $db = $this->getDB();
        $query = $db->prepare("SELECT * FROM usuarios");
        $query->execute();
        $usuarios = $query->fetchAll(PDO::FETCH_OBJ);
        return $usuarios;
    }

    function getUsuarioPorEmail($email) {
        $db = $this->getDB();
        $query = $db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $query->execute([$email]);
        $usuario = $query->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }

    function insertArticulo($email, $password) {
        $db = $this->getDB();
        $query = $db->prepare("INSERT INTO usuarios (email, pass) VALUES (?, ?)");
        $query->execute([$email, $password]);
        return $db->lastInsertId();
    }

}

?>