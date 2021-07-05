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

  $rut_exists = false;
  foreach ($users as $u) {
    if ($u['rut'] == $rut) {
        $rut_exists = true;
    }
  }

  if ($rut_exists) {
    echo "Lo sentimos pero ese rut ya existe"; 
  } elseif (false == $rut_exists) {
    if (count($addres) == 1) {
      $id_direccion = $addres[0]['id_direccion'];
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