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
  $name = $_POST["nombre"];
  $rut = $_POST["rut"];
  $age = $_POST["edad"];
  $addres = $_POST["direccion"];

  $rut_exists = false;
  foreach ($users as $u) {
    if ($u['rut'] == $rut) {
        $rut_exists = true;
    }
  }

  if ($rut_exists) {
    echo "Lo sentimos pero ese rut ya existe"; 
  } elseif (false == $rut_exists) {
    ;
  }
?>
<br>
<br>
<form action="../homepage/register.php" method="get">
    <input type="submit" value="Volver">
</form>
</body>

</html>