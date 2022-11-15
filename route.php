<?php
include_once './app/controllers/articulos_controller.php';
include_once './app/controllers/categorias_controller.php';
include_once './app/controllers/auth_controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'index';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'index':
        $controller = new ArticulosController();
        $controller->showArticulos();
        break;
    case 'showLogin':
        $authController = new AuthController();
        $authController->showLogin();
        break;
    case 'login':
        $authController = new AuthController();
        $authController->login();
        break;
    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;
    case 'loginInvitado':
        $authController = new AuthController();
        $authController->loginInvitado();
        break;
    case 'addArticulo':
        $controller = new ArticulosController();
        $controller->addArticulo();
        break;
    case 'addCategoria':
        $controllerCat = new CategoriasController();
        $controllerCat->addCategoria();
        break;
    case 'deleteArticulo':
        $controller = new ArticulosController();
        $id = $params[1];
        $controller->deleteArticulo($id);
        break;
    case 'deleteCategoria':
        $controllerCat = new CategoriasController();
        $id = $params[1];
        $controllerCat->deleteCategoria($id);
        break;
    case 'showArticulo':
        $controller = new ArticulosController();
        $id = $params[1];
        $controller->showArticulo($id);
        break;
    case 'showCategoria':
        $controllerCat = new CategoriasController();
        $id = $params[1];
        $controllerCat->showCategoria($id);
        break;
    case 'updateArticulo':
        $controller = new ArticulosController();
        $id = $params[1];
        $controller->updateArticulo($id);
        break;
    case 'updateCategoria':
        $controllerCat = new CategoriasController();
        $id = $params[1];
        $controllerCat->updateCategoria($id);
        break;
    default:
        echo('404 page not found');
        break;
}

?>