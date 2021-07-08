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

    $query_admin = "SELECT personal.rut FROM personal, personal_admin 
    WHERE personal.id = personal_admin.id_persona 
    AND personal.rut = '$rut' 
    AND personal_admin.clasificacion = 'administracion' ";

    $result_admin = $db1 -> prepare($query_admin);
    $result_admin -> execute();
    $rut_admin = $result_admin -> fetchAll();
    # foreach ($rut_admin as $ra) {
    #   echo "<h3>print_r($ra[0])</h3>";}
?>


<div id="datos_perfil">
    <h2>Mi Perfil</h2>
    <h3>INFORMACIÓN PERSONAL</h3>
    <div class="espaciador1"></div>
    <ul>
        <?php
            echo "<li><h3>Nombre: $user_data[1]</h3></li><li><h3>Edad: $user_data[3]</h3></li><li><h3>RUT: $user_data[2]</h3></li><li><h3>Dirección: $direccion, $comuna</h3></li>";
            if (not is_null($rut_admin)) {
               echo "<li><h3> ADMINISTRATIVO <\h3><\li>" 
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
    <?php
        echo "<div class='espaciador1'></div>";
        if ($rut_admin['personal.rut'] == $rut) {
            echo "
            <form action='datos_admin.php' method='post'>
                <input type='hidden' name='id_user' value=$id_user>
                <button class='boton2'>Datos Jefe de Unidad</button>
            </form>";
        }
    ?>
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