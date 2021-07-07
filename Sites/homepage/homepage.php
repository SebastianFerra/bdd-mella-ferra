<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Tienda Onlain TuShop </title>
    <!-- Bootstrap(CSS), Jquery (javascripts), etc... -->

    <link href ="../styles/style.css" rel="stylesheet" />

</head>

<?php
    $id_user = $_POST["id_user"];
?>


<div id="datos_perfil">
    <h2>HOLA BIENVENIDO Al HOMEPAGE DE MARISTAZO UNIMARC</h2>
    <br>
    <form action='miperfil.php' method='post'>
        <?php
        echo "<input type='hidden' name='id_user' value=$id_user>";
        ?>
        <button class="boton2">Mi Perfil</button>
    </form>
        <div class="espaciador1"></div>
    <form action='compras.php' method='post'>
        <?php
        echo "<input type='hidden' name='id_user' value=$id_user>";
        ?>
        <select name="tiendas">
        <?php

            #AQUI OBTENEMOS LAS COSAS QUE NECESITAMOS COMO LOS AÑOS Y ESAS COSAS
            require("../config/conexion.php");
            $result = $db2 -> prepare("SELECT id_tienda, nombre FROM Tiendas ORDER BY nombre;");
            $result -> execute();
            $data = $result -> fetchAll();

            #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
            foreach ($data as $d) {
                $id_tienda = $d['id_tienda'];
                $nombre_tienda = $d['nombre'];

                echo "<option value='$id_tienda'> $id_tienda $nombre_tienda </option>";
            }
        ?>
    </select>
        <button class="boton2">Consultar tienda</button>
    </form>
    <form action='../index.php' method='get'>
        <button class="boton2">Cerrar sesión</button>
    </form>

</div>

