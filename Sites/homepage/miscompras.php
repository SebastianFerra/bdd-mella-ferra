<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Tienda Onlain TuShop </title>
    <!-- Bootstrap(CSS), Jquery (javascripts), etc... -->

    <link href ="../styles/style.css" rel="stylesheet" />

</head>

<?php
    require("../config/conexion.php");

    $id_user = $_POST["id_user"];
   
    $query = "SELECT Compras.producto, Compras.cantidad
    FROM Compras, Carritos, Usuarios
    WHERE usuarios.id_usuario = Carritos.comprador
    AND Carritos.id = Compras.carrito
    AND usuarios.id_usuario = $id_user
    ";
    $result = $db2 -> prepare($query);
    $result -> execute();
    $compras = $result -> fetchAll();
    
?>

<table>
  <tr>
    <td><h3>Producto</h3></td>
    <td><h3>Cantidad</h3></td>
  </tr>

    <?php
      // echo $pokemones;
      foreach ($compras as $p) {
        $producto = $p[0];
        $cantidad = $p[1];
        echo "<tr><td><h3>$producto</h3></td><td><h3>$cantidad</h3></td></tr>";
      }
    ?>
      
</table>

