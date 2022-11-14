-Para utilizar la base de datos, se debe importar el archivo que se encuentra dentro de la carpeta 'database'.

-El endpoint que se debe utilizar para así poder visualizar las listas de productos es:
 
        "http://localhost/tp_especial2/productos"

-Si se quiere ordenar, filtrar,limiatar o Paginar 
los  productos al lado de 'productos' se debe poner '?' y poner a su vez las 5 opciones :

ejemplo = "http://localhost/tp_especial2/productos?limite=2"

limite=(un número aleatorio para limitar la cantidad de productos que se ven) default: todos'.

ordenamiento(field)= (debe elegir uno de los siguientes campo: id,producto,cantidad,precio) defauld:id'

contador(offset)=(un número aleatorio para indicar la pagina del listado que se quiere ver dependiendo del límite puesto (ej: "limit=3&offset=2" muestra la segunda página del listado que fue seteado para mostrar de solo a 3 productos a la vez)) default: 0'.

campo(sort) == (asc (ascendente) o desc (descendente)) default: asc'.


nota: si se desea poner dos o mas de las siguientes a la vez se debe 
poner un '&' para seperarlas quedado asi:

    "http://localhost/tp_especial2/productos?limite=2&ordenamiento=asc"

-para añaadir un producto se debe cumplir los siguiente espacios del JSON:

{

        "producto": 

        "cantidad":

        "marcas_id": 

        "precio": 
       
}


-para seleccionar las marcas de su producto puede elegir:

    5- ilolay
    13-marolio
    15-carrefour
    16-casancrem
    24-la paulina