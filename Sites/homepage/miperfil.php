<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Tienda Online </title>
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
    $comuna = $direccion_data[0]['comuna'];
    $user_data = $user[0];
    $rut = strval($user_data['rut']);

    $query_jefe = "SELECT personal.rut, unidades.id 
    FROM personal, unidades
    WHERE personal.id = unidades.jefe
    AND personal.rut = '$rut' ";

    $result_jefe = $db1 -> prepare($query_jefe);
    $result_jefe -> execute();
    $jefe = $result_jefe -> fetchAll();

    $rut_jefe = $jefe[0]['rut'];
    $unidad_jefe = $jefe[0]['id'];
?>


<div id="datos_perfil">
    <h2>Mi Perfil</h2>
    <h3>INFORMACIÓN PERSONAL</h3>
    <div class="espaciador1"></div>
    <ul>
        <?php
            echo "<li><h3>Nombre: $user_data[1]</h3></li><li><h3>Edad: $user_data[3]</h3></li><li><h3>RUT: $user_data[2]</h3></li><li><h3>Dirección: $direccion, $comuna</h3></li>";
            if (! is_null($rut_jefe)) {
               echo "<li><h3> JEFE DE UNIDAD: $unidad_jefe </h3></li>"; 
               echo "<li><h4> Personal Administrativo de la unidad  </h4></li>";
               
               
               $administracion = 'administracion'
               $query_admin = "SELECT personal.nombre, personal.rut 
               FROM personal, unidades, personal_admin
               WHERE personal.id = personal_admin.id_persona 
               AND personal_admin.unidad = $unidad_jefe
               AND personal_admin.clasificacion = $administracion ";
               
               $result_admin = $db1 -> prepare($query_admin);
               $result_admin -> execute();
               $admin = $result_admin -> fetchAll();

               $nombre_jefe = $admin[0]['nombre'];
               $rut_admin = $admin[0]['rut'];
                foreach ($admin as $d) {
                    echo "<li><h4> $nombre_jefe | $rut_admin</h4></li>";
                  }
            }
        ?>
    </ul>
    <div class="espaciador1"></div>
    <form action='cambio_contraseña.php' method='post'>
        <?php
            echo "<input type='hidden' name='id_user' value=$id_user>";
        ?>
        <button class="boton2">Cambiar Contraseña</button>
    </form>
    
    <div class="espaciador1"></div>
    <form action='miscompras.php' method='post'>
        <?php
            echo "<input type='hidden' name='id_user' value=$id_user>";
        ?>
        <button class="boton2">Historial de compras</button>
    </form>
    <div class="espaciador1"></div>
    <?php
        echo "<br>
            <form action='homepage.php' method='post'>
                <input type='hidden' name='id_user' value=$id_user>
                <button class='boton2'>Volver al homepage</button>
            </form>";
    ?>
    <div class="espaciador1"></div>
    <form action='../index.php' method='get'>
        <button class="boton2">Cerrar sesión</button>
    </form>

</div>