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
    <form action='tiendas.php' method='post'>
        <?php
        echo "<input type='hidden' name='id_user' value=$id_user>";
        ?>
        <button class="boton2">Tiendas Disponibles</button>
    </form>
        <div class="espaciador1"></div>
    <form action='../index.php' method='get'>
        <button class="boton2">Cerrar sesión</button>
    </form>

</div>

