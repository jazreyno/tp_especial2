<?php 
    require_once './libs/Router.php';
    require_once './app/controller/controllerProductos.php';

    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $router = new Router();

     $router->addRoute('productos', 'GET', 'controllerProductos', 'getProductos');
     $router->addRoute('productos/:ID', 'DELETE', 'controllerProductos', 'deleteProductos');
     $router->addRoute('productos/:ID', 'GET', 'controllerProductos', 'getProductosid');
     $router->addRoute('productos', 'POST', 'controllerProductos', 'insertProductos');



     //run
        $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);