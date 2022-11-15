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
        //se agrega cosas por default para que no un haya error
        $params=[ 
            "field"=>"id_productos",
            "sort"=>"asc",
            "where"=> "productos.marcas_id",
            "limit"=>"18446744073709551610",
            "offset"=> "0",
        ]; 
        if(isset($_GET["field"])){
            $params["field"]= $_GET["field"];
        }
        if(isset($_GET["sort"])){
            $params["sort"]= $_GET["sort"];
        }
        if (isset($_GET['limit'])){
            $params["limit"] = $_GET['limit'];
            if (isset($_GET['offset'])){
                $page = (($_GET['offset']-1)*$params["limit"]);
                $params["offset"] = $page;
            }
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
        $this->view->response ("el producto del id=$id no existe", 404);
    }
    public function deleteProductos($params = null){
        $id = $params[':ID'];

        $productos=$this->model->TraerProductosId($id);
        if($productos){
            $this->model->borrarProductos($id);
            $this->view->response($productos);
        }
        else
        $this->view->response ("el producto del id=$id no existe", 404);
    }
   
        public function insertProductos(){
            $productos = $this->getData();

            if (empty($productos->producto) || empty($productos->cantidad) || empty($productos->marcas_id) || empty($productos->precio)) {
                $this->view->response("Complete los datos", 400);
            } else {
                $id = $this->model->insertarproductos($productos->producto, $productos->cantidad,$productos->marcas_id,$productos->precio);
                $productos = $this->model->TraerProductosId($id);
                $this->view->response($productos, 201);
            }
    }
    

}