<?php

include_once './app/models/articulos_model.php';
include_once './app/models/categorias_model.php';
include_once './app/views/articulos_view.php';
include_once './app/helpers/auth_helper.php';



class ArticulosController {

    private $model;
    private $modelcat;
    private $view;
    private $authHelper;

    function __construct() {
        $this->view = new ArticulosView();
        $this->model = new ArticulosModel();
        $this->modelcat = new CategoriasModel();
        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLoggedIn();
    }


    //PREGUNTAR SI DEBERIA SER "showHome()"
    function showArticulos(){
        $articulos = $this->model->getArticulos();
        $categorias = $this->modelcat->getCategorias();
        if ($this->authHelper->itsAdmin()==true){
            $this->view->showArticulos($articulos,$categorias);
        }
        else {
            $this->view->showArticulosGuest($articulos,$categorias);
        }
    }

    function showArticulo($id){
        $articulo = $this->model->getArticulo($id);
        $categoriaArticulo = $this->modelcat->getCategoria($articulo->id_categoria);
        $categorias = $this->modelcat->getCategorias();
        if ($this->authHelper->itsAdmin()==true){
            $this->view->showArticulo($articulo,$categoriaArticulo,$categorias);
        }
        else {
            $this->view->showArticuloGuest($articulo,$categoriaArticulo);
        }
    }

    function addArticulo() {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $id_categoria = $_POST['id_categoria'];
        if (empty($nombre)||empty($precio)||empty($id_categoria)){
            $this->view->showError('Faltan datos obligatorios.');
            die();
        }
        else {
            $id = $this->model->insertArticulo($nombre, $precio, $id_categoria);
        }
    
        header("Location: " . BASE_URL);
    
    }
    
    function deleteArticulo($id) {
        if ($this->authHelper->itsAdmin()==true){
            $this->model->deleteArticulo($id);
            header("Location: " . BASE_URL);
        }
        else {
            $this->view->showError('Usted no tiene los permisos necesarios para realizar esta accion.');
        }
    }

    function updateArticulo($id) {
        if ($this->authHelper->itsAdmin()==true){
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $id_categoria = $_POST['id_categoria'];
            if (empty($nombre)||empty($precio)||empty($id_categoria)){
                $this->view->showError('Faltan datos obligatorios.');
            }
            else {
                $this->model->updateArticulo($nombre,$precio,$id_categoria,$id);
                header("Location: " . BASE_URL);
            }
        }
        else {
            $this->view->showError('Usted no tiene los permisos necesarios para realizar esta accion.');
        }
    }

}

?>