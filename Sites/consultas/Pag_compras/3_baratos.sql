'''
Un boton que al hacer click, nos despliega los 3 productos mas baratos para
cada categorIa de productos vendidos por la tienda (No Comestible/Comestible).
Deben separar visualmente los productos por categoría. Si una de las dos macro
categoras no tiene productos, deben desplegar el header de dicha categoría de
todas formas.
'''

SELECT Productos.nombre
FROM Productos JOIN Stock 
ON Stock.producto = Producto.id
WHERE Producto.tipo = 'congelado' OR Producto.tipo = 'conserva' OR Producto.tipo = 'fresco'
AND Tiendas.id = id_tienda
ORDER BY Productos.precio
LIMIT 3

SELECT Productos.nombre
FROM Productos JOIN Stock 
ON Stock.producto = Producto.id
WHERE Producto.tipo = 'no comestible'
AND Tiendas.id = id_tienda
ORDER BY Productos.precio
LIMIT 3

--

<body>
<?php
    require("../config/conexion.php");
    #input
    $categoria = $_POST["categoria"]; 
    $categoria = int($categoria);
    
    -- $id_tienda =  -- !!!! 

    #consulta
    if $categoria = 'comestible' {
            $query =    "SELECT Productos.nombre
                        FROM Productos JOIN Stock 
                        ON Stock.producto = Producto.id
                        WHERE Producto.tipo = 'congelado' OR Producto.tipo = 'conserva' OR
                        AND Tiendas.id = $id_tienda  -- !!!!
                        Producto.tipo = 'fresco' 
                        ORDER BY Productos.precio
                        LIMIT 3";
        }
    elseif $categoria = 'no comestible' {
            $query =    "SELECT Productos.nombre
                        FROM Productos JOIN Stock 
                        ON Stock.producto = Producto.id
                        WHERE Producto.tipo = 'no comestible'
                        AND Tiendas.id = $id_tienda -- !!!!
                        ORDER BY Productos.precio
                        LIMIT 3";
    }
    

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$3_baratos = $result -> fetchAll();
?>




