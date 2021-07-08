<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Tienda Online </title>
    <!-- Bootstrap(CSS), Jquery (javascripts), etc... -->

    <link href ="../styles/style.css" rel="stylesheet" />

</head>

<?php

    require("../config/conexion.php");

    $id_user = $_POST["id_user"];
    $id_tienda = $_POST["id_tienda"]

    $result = $db2 -> prepare("SELECT nombre FROM Tiendas ORDER BY nombre;");
    $result -> execute();
    $data = $result -> fetchAll();

?>


<div id="datos_tienda">
    <?php
        echo "<h2>Tienda: $id_tienda </h2>"
    ?>
    <a>
        <div class="boton1">Top 3 Productos más baratos</div>
    </a>
      <div class="espaciador1"></div>
    <a>
        <div class="boton1">Generar compra</div>
    </a>
      <div class="espaciador1"></div>
    <a>
        <div class="boton1">Generar compra</div>
    </a>

</div>
