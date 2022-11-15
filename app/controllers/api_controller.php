<?php
require_once './app/models/articulos_model.php';
require_once './app/views/api_view.php';

class ApiController {
    private $model;
    private $view;

    private $data;

    public function __construct() {
        $this->model = new ArticulosModel();
        $this->view = new ApiView();
        
        // lee el body del request
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getArticulos($params = null) {
        $sort = null;
        $order = null;
        //obtengo valores de sort y order en el caso que no sean nulos (si son nulos retorno todo sin filtrado)
        if (!empty($_GET['sort'])){
            //en el caso de encontrar un sort, especifico cuales son mis posibles columnas a filtrar
            //para evitar filtraciones de secuencias SQL pasadas por url
            if($_GET['sort']!='nombre'&&$_GET['sort']!='precio'&&$_GET['sort']!='id_categoria'){
                //en el caso que el parametro incluido en la url no sea una columna la variable sort es null
                $sort = null;
            }
            else {
                //si el parametro coincide con una columna de mi tabla lo obtengo
                $sort = $_GET['sort'];
            }
        }
        //en el caso de order realizo el mismo procedimiento que con sort
        if (!empty($_GET['order'])){
            if($_GET['order']!='ASC'&&$_GET['order']!='DESC'){
                $order = null;
            }
            else {
                $order = $_GET['order'];
            }
        }
        if ($sort != null && $order != null){
            $articulos = $this->model->getArticulosSort($sort,$order);
        }
        else {
            $articulos = $this->model->getArticulos();
        }
        $this->view->response($articulos);
    }

    public function getArticulo($params = null) {
        // obtengo el id del arreglo de params
        $id = $params[':ID'];
        $articulo = $this->model->getArticulo($id);

        // si no existe devuelvo 404
        if ($articulo){
            $this->view->response($articulo);
        }
        else {
            $this->view->response("La tarea con el id=$id no existe", 404);
        }
    }

    public function deleteArticulo($params = null) {
        $id = $params[':ID'];

        $articulo = $this->model->getArticulo($id);
        if ($articulo) {
            $this->model->deleteArticulo($id);
            $this->view->response($articulo);
        } 
        else 
            $this->view->response("La tarea con el id=$id no existe", 404);
    }

    public function insertArticulo($params = null) {
        $articulo = $this->getData();

        if (empty($articulo->nombre) || empty($articulo->precio) || empty($articulo->id_categoria)) {
            $this->view->response("Complete los datos", 400);
        } 
        else {
            $id = $this->model->insertArticulo($articulo->nombre, $articulo->precio, $articulo->id_categoria);
            $this->view->response("La tarea se insertó con éxito con el id=$id", 201);
        }
    }

}
