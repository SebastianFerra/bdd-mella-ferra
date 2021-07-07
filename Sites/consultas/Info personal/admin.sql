'''
Si el usuario es jefe de una unidad de despachos (proveniente del grupo Par), entonces
la direccion de su unidad, y el listado de todos administrativos trabajando
para esta unidad.
'''
    IF rut IN (
        SELECT rut 
        FROM Personal 
        JOIN Personal_admin 
        ON Personal.id = Personal_admin.id_persona
        WHERE Personal_admin.clasificacion = 'administracion'
        AND Personal.rut = rut
        )
    {
        X
        
    }

