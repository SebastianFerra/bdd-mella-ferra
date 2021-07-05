'''
Para cada usuario, un historial de compras hechas por este usuario ordenado por
fechas.
'''

CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
info_persona (username varchar, admin_ boolean, id_tienda int, id_carrito int, dir_compra varchar, cantidad int)
-- datos de entrada de la consulta

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



