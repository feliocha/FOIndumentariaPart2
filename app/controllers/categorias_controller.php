<?php

include_once './app/models/articulos_model.php';
include_once './app/models/categorias_model.php';
include_once './app/views/articulos_view.php';
include_once './app/helpers/auth_helper.php';



class CategoriasController {

    private $model;
    private $view;
    private $authHelper;

    function __construct() {
        $this->model = new CategoriasModel();
        $this->modelArt = new ArticulosModel();
        $this->view = new ArticulosView();
        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLoggedIn();
    }

    function showCategorias(){
        $categorias = $this->model->getCategorias();
        $this->view->showCategorias($categorias);
    }

    function showCategoria($id){
        $categoria = $this->model->getCategoria($id);
        $articulos = $this->modelArt->getArticulosPorCat($id);
        if ($this->authHelper->itsAdmin()==true){
            $this->view->showCategoria($categoria,$articulos);
        }
        else {
            $this->view->showCategoriaGuest($categoria,$articulos);
        }
    }

    function addCategoria() {
        $nombre = $_POST['nombre'];
        if (empty($nombre)) {
            $this->view->showError('Faltan datos obligatorios.');
            die();
        }
        $id = $this->model->insertCategoria($nombre);
        
    
        header("Location: " . BASE_URL);
    
    }
    
    function deleteCategoria($id) {
        if ($this->authHelper->itsAdmin()==true){
            $articulosDeCatId = $this->modelArt->getArticulosPorCat($id);
            if ($articulosDeCatId != null) {
                $this->view->showError('La categoria tiene articulos por lo que no se puede eliminar.');
            }
            else {
                $this->model->deleteCategoria($id);
                header("Location: " . BASE_URL);
            }
        }
        else {
            $this->view->showError('Usted no tiene los permisos necesarios para realizar esta accion.');
        }
    }

    function updateCategoria($id) {
        if ($this->authHelper->itsAdmin()==true){
            $nombre = $_POST['nombre'];
            if (empty($nombre)){
                $this->view->showError('Faltan datos obligatorios.');
            }
            else {
                $this->model->updateCategoria($nombre,$id);
                header("Location: " . BASE_URL);
            }
        }
        else {
            $this->view->showError('Usted no tiene los permisos necesarios para realizar esta accion.');
        }
    }

}

?>