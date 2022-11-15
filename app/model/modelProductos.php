<?php
 
class modelProductos{
   
    private $db;

    function __construct ()
    {
        $this-> db = new PDO('mysql:host=localhost;'.'dbname=db_tpespecial;charset=utf8', 'root', '');
    }

    function TraerProductos($params){
        
        $query=$this->db->prepare("SELECT * FROM productos 
                                  INNER JOIN marcas 
                                  on productos.marcas_id = marcas.id_marcas
                                  order by $params[campo] $params[ordenamiento] 
                                  LIMIT $params[limite]
                                  OFFSET $params[contador]");
        $query->execute();
        $productos= $query->fetchAll(PDO::FETCH_OBJ);
     
          return $productos;
    }
    function TraerProductosId($id){
    
        $query=$this->db->prepare(" SELECT * 
                                    FROM productos 
                                    INNER JOIN marcas 
                                    on productos.marcas_id = marcas.id_marcas 
                                    WHERE id_productos = ?");
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    function TraerProductosMarca($id){
    
        $query=$this->db->prepare(" SELECT * 
                                    FROM productos 
                                    INNER JOIN marcas 
                                    on productos.marcas_id = marcas.id_marcas 
                                    WHERE id_marcas = ?");
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function insertarproductos($producto, $cantidad, $marcas, $precio){

        $query =$this->db->prepare("INSERT INTO `productos`(`producto`, `cantidad`, `marcas_id`, `precio` )
                                    VALUES(?,?,?,?)");
        $query->execute([$producto,$cantidad,$marcas,$precio]);
        
        return $this->db->lastInsertId();
    
    }
    function borrarProductos($id) {
        $query = $this->db->prepare('DELETE FROM `productos` 
                                    WHERE id_productos = ?');
        $query->execute([$id]);
    }
    function editarProductos ($producto, $cantidad,$precio,$marcas, $id){
 
        $query=$this->db->prepare ("UPDATE `productos` 
                                    SET producto = ? , cantidad = ? , precio = ? , marcas_id = ? 
                                    WHERE id_productos = ?");
        $query->execute([$producto,$cantidad,$precio,$marcas,$id]);
    }
}