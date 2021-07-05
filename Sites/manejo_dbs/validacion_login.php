<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  
  $rut = $_POST["rut"];
  $pass = $_POST["password"];

  $query = "SELECT * FROM usuarios WHERE rut = '$rut' AND pass = '$pass'";
  $result = $db2 -> prepare($query);
  $result -> execute();
  $user_data = $result -> fetchAll();

  if (count($user_data) == 1) {

    echo 'Bien, el usuario ' + $user_data['nombre'] + ' ha sido validado'; 

  } elseif (count($user_data) == 0) {

    echo 'El rut o password son incorrectos';

  } else {
    echo 'algo raro paso';
  }


?>

<?php include('../templates/footer.html'); ?>