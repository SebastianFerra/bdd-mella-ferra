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

  $id_user = $_POST["id_user"];
  $old_pass = $_POST["old_pass"];
  $new_pass = $_POST["new_pass"];
  
  $query_user = "SELECT * FROM usuarios WHERE id_usuario = $id_user";
  $result_user = $db2 -> prepare($query_user);
  $result_user -> execute();
  $user = $result_user -> fetchAll();
  $user_data = $user[0];

  if ($old_pass == $user_data['pass']) {
    $query_new_pass = "UPDATE usuarios SET pass = '$new_pass' WHERE id_usuario = $id_user";
    $result_new_pass = $db2 -> prepare($query_new_pass);
    $result_new_pass -> execute();
    $result_new_pass -> fetchAll();
    echo "<h3>Tu contraseña ha sido cambiada correctamente</h3>";
    echo "<br>
          <br>
          <form action='../homepage/homepage.php' method='post'>
            <input type='hidden' name='id_user' value=$id_user>
            <button class='boton2'>Ir al homepage</button>
          </form>";
  } elseif ($old_pass != $user_data['pass']) {
    echo "<h3>Esa no es tu contraseña antigua, intentalo de nuevo</h3>";
    echo "<br>
          <br>
          <form action='../homepage/cambio_contraseña.php' method='post'>
            <input type='hidden' name='id_user' value=$id_user>
            <button class='boton2'>Volver</button>
          </form>";
  }

?>

</body>
</html>