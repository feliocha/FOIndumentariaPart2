<?php
require_once './libs/Router.php';
require_once './app/controllers/api_controller.php';

// crea el router
$router = new Router();

// defina la tabla de ruteo
$router->addRoute('articulos', 'GET', 'ApiController', 'getArticulos');
$router->addRoute('articulos/:ID', 'GET', 'ApiController', 'getArticulo');
$router->addRoute('articulos', 'POST', 'ApiController', 'insertArticulo');

// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
