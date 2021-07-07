<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Tienda Onlain TuShop </title>
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


<div id="datos_perfil">
    <?php
        echo "<h2>Tienda: $id_tienda </h2>"
    ?>
    <a>
        <div class="boton1">IR A LISTA DE COMPRAS</div>
    </a>
      <div class="espaciador1"></div>
    <a>
        <div class="boton1">¿ERES JEFE DE UNIDAD? AQUI HAY MAS INFORMACIÓN</div>
    </a>

</div>
