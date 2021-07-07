1. Muestre las direcciones de todas las unidades de la empresa de despachos.
SELECT Direcciones.dirección
FROM Unidades JOIN Direcciones ON Unidades.dirección = Direcciones.id


2.Ingrese una comuna. Muestre todos los vehculos de las unidades ubicadas en esa
comuna. 
#comuna = x
SELECT Asignado_a.vid, Unidades.id, Cobertura.comuna
FROM Asignado_a JOIN Unidades JOIN Cobertura
WHERE Cobertura.uid = Unidades.id 
AND Unidades.id = Asignado_a.uid 
AND Cobertura.comuna LIKE comuna

3. Ingrese una comuna y seleccione un año. Muestre todos los vehículos que hayan realizado
un despacho a dicha comuna durante ese año.
#comuna = x
#año = y

SELECT Despachos.vid
FROM Despachos JOIN Direcciones
WHERE Despachos.fecha LIKE "%-y" #¿? 
AND Direcciones.comuna LIKE x
AND Despachos.dir_destino = Direcciones.id

4. Ingrese un tipo de vehículo y seleccione dos numeros. Muestre todos los despachos
realizados por un vehículo del tipo ingresado, y cuyo repartidor tiene una edad entre
el rango seleccionado.
#tipo = t
#edad_1 = inf
#edad_2 = sup
SELECT Despachos.id
FROM Despachos JOIN Vehiculos JOIN Conductores JOIN Personal_reparto JOIN Personal
WHERE Despachos.vid = Vehiculos.id
AND Vehiculos.id = Conductores.vid
AND Personal_reparto.pid = Personal.id 
AND Personal_reparto.pid = Conductores.pid
AND Personal.tipo = repartidor
AND Personal.edad BETWEEN inf AND sup
AND Vehiculos.tipo LIKE t

5. Ingrese dos comunas. Encuentre los jefes de las unidades que realizan despachos a
ambas comunas.
comuna_1 = x
comunad_2 = y

SELECT Personal_admin.pid 
FROM Personal_admin JOIN Unidades JOIN Cobertura
WHERE Cobertura.comuna LIKE x
AND Personal_admin.clasificacion = administracion
INTERSECT 
SELECT Personal_admin.pid
FROM Personal_admin JOIN Unidades JOIN Cobertura
WHERE Cobertura.comuna LIKE y
AND Personal_admin.clasificacion = administracion

6. Ingrese un tipo de vehículo. Encuentre la unidad que maneja más vehículos de ese tipo.
#tipo = t
SELECT Unidades.id, COUNT(Vehiculos.id) AS n_vehiculos 
FROM Unidades JOIN Vehiculos 
WHERE Vehiculos.tipo LIKE "t%" 
AND Vehiculos.uid = Unidades.id 
GROUP BY Unidades.id 
ORDER BY n_vehiculos DESC 
LIMIT 1