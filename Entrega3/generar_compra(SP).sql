'''
Una seccion compuesta por un campo de texto o un dropdown y un boton en
donde, luego de ingresar un determinado ID de producto (o seleccionar en el
dropdown) que se desea comprar y hacer click en el segundo componente de esta,
ocurra el siguiente proceso:

1. verifica que la tienda vende el producto (si no lo vende se muestra un mensaje)
2. verifica que la tienda tiene la cobertura para la comuna donde vive el usuario
realizando la compra (si no, se muestra un mensaje que la compra no puede
proceder)
3. Genera una nueva compra para este producto (y lo inserta en la tabla compras,
y todas tablas intermedia que quizas han generado en el grupo Impar).
Notar que aqui estamos generando compra para solo un producto.

Laa funcionalidad de generar la compra (y validar si el producto se vende, y
se puede entregar) (el tercer boton descrito para la pagina de las compras) debe ser ejecutada
por medio de un procedimiento almacenado en lenguaje PL/pgSQL: en php se debe invocar
a ese procedimiento con los datos de entrada de la consulta (ademas de otros necesarios, como
el id del usuario), y el procedimiento debe ejecutar e insertar las tuplas a las tablas de su base
de datos. Adicionalmente, deberan desplegar la informacion de la compra que se genera.

'''

CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
generar_compra (id int, pid int, id_tienda int, id_carrito int, dir_compra varchar, cantidad int)
-- datos de entrada de la consulta

RETURNS BOOLEAN AS $$

DECLARE
idmax int;

BEGIN
--VALIDAR QUE SE PUEDA COMPRAR
    IF pid IN (SELECT producto FROM Stock WHERE tienda = id_tienda) THEN
    --VALIDAR QUE DIRECCION ESTÁ EN COBERTURA
        IF dir_compra IN (SELECT comuna_de_cobertura FROM Cobertura_tiendas WHERE tienda = id_tienda) THEN 
        --GENERAR NUEVA COMPRA
            
            SELECT INTO idmax
            MAX(id)
            FROM compras;

            INSERT INTO compras values(idmax + 1, id_carrito, producto_id, cantidad);

            RETURN TRUE

        ELSE
            RETURN FALSE
        END IF
    ELSE
        RETURN FALSE
    END IF


END
$$ language plpgsql



