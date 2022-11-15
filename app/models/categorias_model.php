<?php

class CategoriasModel {

    private function getDB() {
        $db = new PDO('mysql:host=localhost;'.'dbname=FOIndumentaria;charset=utf8', 'root', '');
        return $db;
    }
    
    function getCategorias() {
        $db = $this->getDB();
        $query = $db->prepare("SELECT * FROM categorias");
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);
        return $categorias;
    }

    function getCategoria($id) {
        $db = $this->getDB();
        $query = $db->prepare("SELECT * FROM categorias WHERE id = ?");
        $query->execute([$id]);
        $categoria = $query->fetch(PDO::FETCH_OBJ);
        return $categoria;
    }

    function insertCategoria($nombre) {
        $db = $this->getDB();
        $query = $db->prepare("INSERT INTO categorias (nombre) VALUES (?)");
        $query->execute([$nombre]);
        return $db->lastInsertId();
    }
    
    function deleteCategoria($id) {
        $db = $this->getDB();
        $query = $db->prepare("DELETE FROM categorias WHERE id = ?");
        $query->execute([$id]);
    }

    function updateCategoria($nombre,$id) {
        $db = $this->getDB();
        $query = $db->prepare("UPDATE categorias SET nombre=? WHERE id=?");
        $query->execute([$nombre,$id]);
    }

}