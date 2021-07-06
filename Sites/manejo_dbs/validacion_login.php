<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Tienda Onlain TuShop </title>
    <!-- Bootstrap(CSS), Jquery (javascripts), etc... -->

    <link href ="../styles/style.css" rel="stylesheet" />

</head>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  
  $rut = $_POST["rut"];
  $pass = $_POST["password"];

  $query = "SELECT * FROM usuarios WHERE rut = '$rut' AND pass = '$pass'";
  $result = $db2 -> prepare($query);
  $result -> execute();
  $users = $result -> fetchAll();

  if (count($users) == 1) {
    $user_data = $users[0];
    $nombre = $user_data['nombre'];
    $id_user = $user_data['id_usuario'];
    echo "<h3>Se ha iniciado sesión correctamente</h3>";
    echo "<br>
          <br>
          <form action='../homepage/homepage.php' method='post'>
            <input type='hidden' name='id_user' value=$id_user>
            <button class='boton2'>Ir al homepage</button>
          </form>"; 
  } elseif (count($users) == 0) {
    echo "<h3>El rut o password son incorrectos</h3>";
    echo "<br>
          <br>
          <form action='../homepage/login.php' method='get'>
            <button class='boton2'>Volver</button>
          </form>";
  } else {
    echo "<h3>algo raro paso</h3>";
    echo "<br>
          <br>
          <form action='../homepage/login.php' method='get'>
            <button class='boton2'>Volver</button>
          </form>";
  }
?>

</body>
</html>