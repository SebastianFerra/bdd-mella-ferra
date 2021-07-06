<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Tienda Onlain TuShop </title>
    <!-- Bootstrap(CSS), Jquery (javascripts), etc... -->

    <link href ="../styles/style.css" rel="stylesheet" />

</head>

<?php
    $id_user = $_POST["id_user"];
    echo "$id_user";

    $query_user = "SELECT * FROM usuarios WHERE id_usuario = $id_user";
    $result_user = $db2 -> prepare($query_user);
    $result_user -> execute();
    $user = $result_user -> fetchAll();

    #$query_dir = "SELECT direcciones.nombre_direccion, direcciones.comuna 
    #    FROM direcciones, direcciones_usuario 
    #    WHERE direcciones_usuario.usuario = $id_user 
    #    AND direcciones.id_direccion = direcciones_usuario.direccion";
    #$result_dir = $db2 -> prepare($query_dir);
    #$result_dir = $db2 -> execute();
    #$direccion = $result_dir -> fetchAll();
    
    #$direccion_data = $direccion[0];
    #$user_data = $user[0];
?>


<div id="datos_perfil">
    <h2>HOLA USUARIO :)</h2>
    <h3>INFORMACIÓN PERSONAL</h3>
    <ul>
        <?php
            #echo "<li>Nombre: $user_data[1]</li><li>Edad: $user_data[3]</li><li>RUT: $user_data[2]</li><li>Dirección: $direccion_data[1], $direccion_data[2]</li>";
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
