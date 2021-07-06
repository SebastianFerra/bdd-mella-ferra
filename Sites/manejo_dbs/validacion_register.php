<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $query = "SELECT * FROM usuarios ";
  $result = $db2 -> prepare($query);
  $result -> execute();
  $users = $result -> fetchAll();

  $id_user = count($users);  
  $nombre = $_POST["nombre"];
  $rut = $_POST["rut"];
  $edad = $_POST["edad"];
  $direccion = $_POST["direccion"];
  $comuna = $_POST["comuna"];

  $query_addres = "SELECT * FROM direcciones WHERE nombre_direccion = '$direccion' AND comuna = '$comuna'";
  $result_addres = $db2 -> prepare($query_addres);
  $result_addres -> execute();
  $addres = $result_addres -> fetchAll();

  $query_max = "SELECT * FROM direcciones_usuario";
  $result_max = $db2 -> prepare($query_max);
  $result_max -> execute();
  $direcciones_usuario = $result_max -> fetchAll();

  $query_max_addres = "SELECT * FROM direcciones";
  $result_max_addres = $db2 -> prepare($query_max_addres);
  $result_max_addres -> execute();
  $direcciones = $result_max_addres -> fetchAll();

  $rut_exists = false;

  foreach ($users as $u) {

    if ($u['rut'] == $rut) {

      $rut_exists = true;

    }

  }

  if ($rut_exists) {

    echo "Lo sentimos pero ese rut ya existe";

  } elseif (false == $rut_exists) {

    if (count($addres) >= 1) {

      $id_direccion = $addres[0]['id_direccion'];
      $id_dir_usr = count($direcciones_usuario);

      echo $id_direccion;
      echo $id_dir_usr;

    } elseif (count($addres) == 0) {

      $id_direccion = count($direcciones);
      $id_dir_usr = count($direcciones_usuario);

      echo $id_direccion;
      echo $id_dir_usr;

      $query_insert_dir = "INSERT INTO direcciones VALUES($id_direccion, '$direccion', '$comuna')";
      $result_insert_dir = $db2 -> prepare($query_insert_dir);
      $result_insert_dir -> execute();
      $result_insert_dir -> fetchAll();

    }

    $query_insert_user = "INSERT INTO usuarios VALUES($id_user, '$nombre', '$rut', $edad, 'undefined', '$rut')";
    $result_insert_user = $db2 -> prepare($query_insert_user);
    $result_insert_user -> execute();
    $result_insert_user -> fetchAll();

    $query_user_dir = "INSERT INTO direcciones_usuario VALUES($id_dir_usr, $id_user, $id_direccion)";
    $result_user_dir = $db2 -> prepare($query_user_dir);
    $result_user_dir -> execute();
    $result_user_dir -> fetchAll();

    $check = "SELECT * FROM usuarios WHERE id_usuario = $id_user";
    $result_check = $db2 -> prepare($check);
    $result_check -> execute();
    $user_check = $result_check -> fetchAll();

    echo $user_check[0];
    if (count($user_check) == 1) {

      echo "Registro exitoso";

    }

  }
?>
<br>
<br>
<form action="../homepage/register.php" method="get">
    <input type="submit" value="Volver">
</form>
</body>

</html>