head>
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
      <th>Historial de compras</th>
    </tr>
  
      <?php
        // echo $pokemones;
        foreach ($compras as $p) {
          echo "<tr><td>$p[0]</td></tr>";
      }
      ?>
      
  </table>

