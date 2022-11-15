<?php 
    require_once './libs/Router.php';
    require_once './app/controller/controllerProductos.php';

    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $router = new Router();
    //obtengo los productos 
     $router->addRoute('productos', 'GET', 'controllerProductos', 'getProductos');
     //elimino los productos por id
     $router->addRoute('productos/:ID', 'DELETE', 'controllerProductos', 'deleteProductos');
     //obtengo los productos por id
     $router->addRoute('productos/:ID', 'GET', 'controllerProductos', 'getProductosid');
     //inserto los productos por id
     $router->addRoute('productos', 'POST', 'controllerProductos', 'insertProductos');



    //ejecucion de la ruta
     $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);