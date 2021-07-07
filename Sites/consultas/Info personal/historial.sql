'''
Para cada usuario, un historial de compras hechas por este usuario ordenado por
fechas.
'''

SELECT Compras.producto, Compras.cantidad
FROM Compras JOIN Carritos JOIN Usuarios
WHERE id_usuario = Carritos.comprador
AND Carritos.id = Compras.carrito


