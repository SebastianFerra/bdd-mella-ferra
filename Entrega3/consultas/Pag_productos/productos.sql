'''
Una seccion compuesta por un campo de texto y un boton en donde, luego de
ingresar el nombre de un producto y clickear el segundo componente de la seccion,

se entreguen todos los productos vendidos por dicha tienda con este nombre.

La busqueda aqui deberia ser case insensitive, y con matching parcial (i.e. con
LIKE). El sistema tambien despliega la categoría del producto (comestible o no
comestible), y su descripcion.
'''

CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
productos (id int)
-- datos de entrada de la consulta)

RETURNS BOOLEAN AS $$

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



