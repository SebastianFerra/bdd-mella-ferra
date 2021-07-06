<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Tienda Onlain TuShop </title>
    <!-- Bootstrap(CSS), Jquery (javascripts), etc... -->

    <link href ="../styles/style.css" rel="stylesheet" />

</head>

<div id="datos_usuario_nuevo">
    <form action="../manejo_dbs/validacion_register.php" method="post">
        <h2>INGRESA TUS DATOS PARA CREAR TU CUENTA:)</h2>
        <label for="nombre"><h3>Nombre:</h3></label>
        <input type="text" name="nombre"> 
        <label for="rut"><h3>RUT:</h3></label>
        <input type="text" name="rut"> 
        <label for="edad"><h3>Edad:</h3></label>
        <input type="text" name="edad"> 
        <label for="direccion"><h3>Dirección:</h3></label>
        <input type="text" name="direccion">
        <label for="direccion"><h3>Comuna:</h3></label>
        <input type="text" name="comuna">  
        <br>
        <br>
        <br>
        <button class="boton2">ACEPTAR</button>
    </form>
</div>