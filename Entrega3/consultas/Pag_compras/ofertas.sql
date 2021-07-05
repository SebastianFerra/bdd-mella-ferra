'''
Una seccion compuesta por un campo de texto y un boton en donde, luego de
ingresar el nombre de un producto y clickear el segundo componente de la seccion,

se entreguen todos los productos vendidos por dicha tienda con este nombre.

La busqueda aqui deberia ser case insensitive, y con matching parcial (i.e. con
LIKE). El sistema tambien despliega la categoría del producto (comestible o no
comestible), y su descripcion.
'''
SELECT Productos.nombre, Productos.descripcion, Productos.tipo
FROM Productos
WHERE LOWER(Productos.nombre) LIKE LOWER('%input%') 

--

<body>
<?php
    require("../config/conexion.php");
    #input
    $producto = $_POST["producto"]; 
    $producto = strtolower($producto);

    #consulta
    $query = "SELECT Productos.nombre, Productos.descripcion, Productos.tipo
    FROM Productos WHERE LOWER(Productos.nombre) LIKE LOWER('%input%') ";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$productos = $result -> fetchAll();
?>

