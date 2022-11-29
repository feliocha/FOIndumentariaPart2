<?php

class ArticulosModel {

    private function getDB() {
        $db = new PDO('mysql:host=localhost;'.'dbname=FOIndumentaria;charset=utf8', 'root', '');
        return $db;
    }
    
    function getArticulos() {
        $db = $this->getDB();
        $query = $db->prepare("SELECT * FROM articulos");
        $query->execute();
        $articulos = $query->fetchAll(PDO::FETCH_OBJ);
        return $articulos;
    }

    //Tengo en claro que no se deben pasar variables directo a la secuencia SQL por seguridad de la BBDD
    //pero al no encontrar solucion preferí checkear posibles filtraciones en el controller
    
    function getArticulosSort($sortBy,$order){
        $db = $this->getDB();
        $query = $db->prepare("SELECT * FROM articulos ORDER BY $sortBy $order");
        $query->execute();
        $articulos = $query->fetchAll(PDO::FETCH_OBJ);
        return $articulos;
    }

    function getArticulo($id) {
        $db = $this->getDB();
        $query = $db->prepare("SELECT * FROM articulos WHERE id = ?");
        $query->execute([$id]);
        $articulo = $query->fetch(PDO::FETCH_OBJ);
        return $articulo;
    }

    function insertArticulo($nombre, $precio, $id_categoria) {
        $db = $this->getDB();
        $query = $db->prepare("INSERT INTO articulos (nombre, precio, id_categoria) VALUES (?, ?, ?)");
        $query->execute([$nombre, $precio, $id_categoria]);
        return $db->lastInsertId();
    }
}





?>