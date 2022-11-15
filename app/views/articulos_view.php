<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';


class ArticulosView {

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showArticulos($articulos,$categorias) {
        $this->smarty->assign('articulos', $articulos);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->display('listaArticulos.tpl');
    }

    function showArticulosGuest($articulos,$categorias) {
        $this->smarty->assign('articulos', $articulos);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->display('listaArticulosGuest.tpl');
    }

    function showArticulo($articulo, $categoria, $categorias) {
        $this->smarty->assign('articulo', $articulo);
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->display('articuloEspecifico.tpl');
    }

    function showArticuloGuest($articulo, $categoria) {
        $this->smarty->assign('articulo', $articulo);
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->display('articuloEspecificoGuest.tpl');
    }

    function showCategoria($categoria, $articulos) {
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->assign('articulos', $articulos);
        $this->smarty->display('categoriaEspecifica.tpl');
    }

    function showCategoriaGuest($categoria, $articulos) {
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->assign('articulos', $articulos);
        $this->smarty->display('categoriaEspecificaGuest.tpl');
    }

    function showError($msg) {
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('errorMsg.tpl');
    }

}


?>