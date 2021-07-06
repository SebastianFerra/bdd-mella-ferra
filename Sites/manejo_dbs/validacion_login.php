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
  $users = $result -> fetchAll();

  if (count($users) == 1) {
    $user_data = $users[0];
    $nombre = $user_data['nombre'];
    echo "Bien, el usuario $nombre ha sido validado";
    echo '<br>
          <br>
          <form action="../homepage/homepage.php" method="get">
            <input type="submit" value="Ir al homepage">
          </form>
          </body>
          </html>'; 
  } elseif (count($users) == 0) {
    echo 'El rut o password son incorrectos';
    echo '<br>
          <br>
          <form action="../homepage/login.php" method="get">
            <input type="submit" value="Volver">
          </form>
          </body>
          </html>';
  } else {
    echo 'algo raro paso';
    echo '<br>
          <br>
          <form action="../homepage/login.php" method="get">
            <input type="submit" value="Volver">
          </form>
          </body>
          </html>';
  }
?>