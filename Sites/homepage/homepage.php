<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Tienda Onlain TuShop </title>
    <!-- Bootstrap(CSS), Jquery (javascripts), etc... -->

    <link href ="../styles/style.css" rel="stylesheet" />

</head>

<?php

    require("../config/conexion.php");

    $id_user = $_POST["id_user"];

    $query_user = "SELECT * FROM usuarios WHERE id_usuario = $id_user";
    $result_user = $db2 -> prepare($query_user);
    $result_user -> execute();
    $user = $result_user -> fetchAll();

    $query_dir = "SELECT direcciones.nombre_direccion, direcciones.comuna 
        FROM direcciones, direcciones_usuario 
        WHERE direcciones_usuario.usuario = $id_user 
        AND direcciones.id_direccion = direcciones_usuario.direccion";
    $result_dir = $db2 -> prepare($query_dir);
    $result_dir -> execute();
    $direccion_data = $result_dir -> fetchAll();
    
    $direccion = $direccion_data[0]['nombre_direccion'];
    $comuna = $direccion_data[0]['comuna']

    $user_data = $user[0];
?>


<div id="datos_perfil">
    <h2>HOLA USUARIO :)</h2>
    <h3>INFORMACIÓN PERSONAL</h3>
    <ul>
        <?php
            echo "<li><h3>Nombre: $user_data[1]</h3></li><li><h3>Edad: $user_data[3]</h3></li><li><h3>RUT: $user_data[2]</h3></li><li><h3>Dirección: $direccion, $comuna</h3></li>";
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
