'''
Si el usuario es jefe de una unidad de despachos (proveniente del grupo Par), entonces
la direccion de su unidad, y el listado de todos administrativos trabajando
para esta unidad.
'''




CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
check_admin (rut int)
-- datos de entrada de la consulta

RETURNS BOOLEAN AS $$

BEGIN
--VALIDAR QUE SE PUEDA COMPRAR
    IF rut IN (SELECT rut FROM usuario )
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


