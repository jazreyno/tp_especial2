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

        $this->data = file_get_contents("php://input");

    }
    private function getData() {
        return json_decode($this->data);
    }

    public function getProductos ($params = null){
        $params=[ 
            "campo"=>"id_productos",
            "ordenamiento"=>"asc"
        ];
        if(isset($_GET["campo"])){
            $params["campo"]= $_GET["campo"];
        }
        if(isset($_GET["ordenamiento"])){
            $params["ordenamiento"]= $_GET["ordenamiento"];
        }

        $productos=$this->model->TraerProductos($params);
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
        public function insertProductos(){
            $productos = $this->getData();

            if (empty($productos->producto) || empty($productos->cantidad) || empty($productos->marcas_id) || empty($productos->precio)) {
                $this->view->response("Complete los datos", 400);
            } else {
                $id = $this->model->insertarproductos($productos->producto, $productos->cantidad,$productos->marcas_id,$productos->precio);
                $productos = $this->model->TraerProductos($id);
                $this->view->response($productos, 201);
            }
    }
    

}