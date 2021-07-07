<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Tienda Onlain TuShop </title>
    <!-- Bootstrap(CSS), Jquery (javascripts), etc... -->

    <link href ="../styles/style.css" rel="stylesheet" />

</head>

<?php
    $id_user = $_POST["id_user"];
?>

<div id="datos_usuario_nuevo">
    <form action="../manejo_dbs/validacion_new_pass.php" method="post">
        <h2>INGRESA TU CONTRSEÑA ANTIGUA Y LUEGO LA CONTRASEÑA NUEVA</h2>
        <?php
            echo "<input type='hidden' name='id_user' value=$id_user>"
        ?>
        <label for="nombre"><h3>Contraseña Antigua:</h3></label>
        <input type="text" name="old_pass"> 
        <label for="rut"><h3>Nueva Contraseña:</h3></label>
        <input type="text" name="new_pass"> 
        <br>
        <br>
        <br>
        <button class="boton2">ACEPTAR</button>
    </form>
</div>