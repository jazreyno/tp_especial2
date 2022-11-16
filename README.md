-Para utilizar la base de datos, se debe importar el archivo que se encuentra dentro de la carpeta 'database'.

-El endpoint que se debe utilizar para así poder visualizar las listas de productos es:
 
        "http://localhost/tp_especial2/productos"

-Si se quiere ordenar, filtrar,limitar o Paginar 
los  productos al lado de 'productos' se debe poner '?' y poner a su vez las 5 opciones :

ejemplo = "http://localhost/tp_especial2/productos?limit=2"

(where)= Se filtra para mostrar estudiantes que pertenecen a una carrera especificando la id de la misma.

(limit)=(un número aleatorio para limitar la cantidad de productos que se ven en nuestra pagina) default: todos'.

(field)= (debe elegir uno de los siguientes campos: id,producto,cantidad,precio) defauld:id'.(lo que hace es indicar el campo por el cual se desea ordenar)

(offset)=(un número aleatorio para indicar la pagina del listado que se quiere ver dependiendo del límite puesto (ej: "limit=3&offset=2" muestra la segunda página del listado que fue seteado para mostrar de solo a 3 productos a la vez)) default: 0'.(Debe ser usado en conjunto con limit)

(sort) == (asc (ascendente) o desc (descendente)) default: asc'.


nota: si se desea poner dos o mas de las siguientes a la vez se debe 
poner un '&' para seperarlas quedado asi:

    "http://localhost/tp_especial2/productos?limit=2&sort=asc"
    "http://localhost/tp_especial2/productos?sort=asc&field=precio"

-para añadir un producto se debe completar los siguiente espacios del JSON:

{

        "producto": "",

        "cantidad": ,

        "marcas_id": ,

        "precio": 
       
}


-para seleccionar las marcas de su producto puede elegir:
    id |  marca    
    5  | ilolay
    13 | marolio
    15 | carrefour
    16 | casancrem
    24 | la paulina

codigos de error 
         200 => "OK",
          201 => "Created",
          400 => "Bad request",
          401 => "Unauthorized",
          403 => "Forbidden",
          404 => "Not found",
          500 => "Internal Server Error"