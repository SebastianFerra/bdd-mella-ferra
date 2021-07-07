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

?>


<div id="datos_perfil">
    <h2>HOLA USUARIO :)</h2>
    <h3>INFORMACIÓN PERSONAL</h3>
    <ul>
        <?php
            echo "<li><h3>Nombre: $user_data[1]</h3></li>
            <li><h3>Edad: $user_data[3]</h3></li><li><h3>RUT: $user_data[2]</h3></li>
            <li><h3>Dirección: $direccion, $comuna</h3></li>";
        ?>
    </ul>
    <a>
        <div class="boton1">IR A LISTA DE COMPRAS</div>
    </a>
      <div class="espaciador1"></div>
    <a>
        <div class="boton1">¿ERES JEFE DE UNIDAD? AQUI HAY MAS INFORMACIÓN</div>
    </a>

</div>
