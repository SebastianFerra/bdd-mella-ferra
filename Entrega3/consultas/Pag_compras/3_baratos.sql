'''
la funcionalidad de generar la compra (y validar si el producto se vende, y
se puede entregar) (el tercer boton descrito para la pagina de las compras) debe ser ejecutada
por medio de un procedimiento almacenado en lenguaje PL/pgSQL: en php se debe invocar
a ese procedimiento con los datos de entrada de la consulta (ademas de otros necesarios, como
el id del usuario), y el procedimiento debe ejecutar e insertar las tuplas a las tablas de su base
de datos. Adicionalmente, deberan desplegar la informacion de la compra que se genera.

3. Genera una nueva compra para este producto (y lo inserta en la tabla compras,
y todas tablas intermedia que quizas han generado en el grupo Impar).
Notar que aqui estamos generando compra para solo un producto.
'''

CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
generar_compra (id int, pid int, id_tienda int, id_carrito int, dir_compra varchar, cantidad int)
-- datos de entrada de la consulta?

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

            INSERT INTO compras values(idmax + 1, id_carrito, pid, cantidad);

            RETURN TRUE

        ELSE
            RETURN FALSE
        END IF
    ELSE
        RETURN FALSE
    END IF


END
$$ language plpgsql



