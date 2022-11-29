<?php

class CategoriasModel {

    private function getDB() {
        $db = new PDO('mysql:host=localhost;'.'dbname=FOIndumentaria;charset=utf8', 'root', '');
        return $db;
    }

    function getCategoria($id) {
        $db = $this->getDB();
        $query = $db->prepare("SELECT * FROM categorias WHERE id = ?");
        $query->execute([$id]);
        $categoria = $query->fetch(PDO::FETCH_OBJ);
        return $categoria;
    }
}