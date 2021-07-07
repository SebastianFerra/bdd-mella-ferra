'''
Para todos los usuarios: su informacion personal: nombre, edad, rut, direccion.
'''

SELECT *
FROM usuarios
WHERE id_usuario LIKE LOWER('%input%') 


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


