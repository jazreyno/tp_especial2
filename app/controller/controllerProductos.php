<?php 
require_once "app/view/view.php";
require_once "app/model/modelProductos.php";

class controllerProductos{
    
    private $view;
    private $model;
   


    function __construct()
    {
        $this->view = new view ();
        $this->model= new  modelProductos();

    }
    public function getProductos ($params = null){
        $productos=$this->model->TraerProductos();
        $this->view->response($productos);
    }


    public function getProductosid ($params = null){
        $id = $params[':ID'];
        $productos=$this->model->TraerProductosId($id);
       
       if($productos)
        $this->view->response($productos);
        else
        $this->view->response ("la tarea del id=$id no existe", 404);
    }
    public function deleteProductos($params = null){
        $id = $params[':ID'];

        $productos=$this->model->TraerProductosId($id);
        if($productos){
            $this->model->borrarProductos($id);
            $this->view->response($productos);
        }
        else
        $this->view->response ("la tarea del id=$id no existe", 404);
    }
   /* public function insertProductos(){


        $this->model->insertarproductos($producto, $cantidad,$marcas,$precio);
    }*/

}