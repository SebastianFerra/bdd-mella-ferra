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

          #    AQUI OBTENEMOS LAS COSAS QUE NECESITAMOS COMO LOS AÑOS Y ESAS COSAS
          require("config/conexion.php");
          $result = $db2 -> prepare("SELECT nombre FROM Tiendas ORDER BY nombre;");
          $result -> execute();
          $data = $result -> fetchAll();

      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
            foreach ($data as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
    </select>
        <button class="boton2">Consultar tienda</button>
    </form>
    <form action='../index.php' method='get'>
        <button class="boton2">Cerrar sesión</button>
    </form>

</div>

