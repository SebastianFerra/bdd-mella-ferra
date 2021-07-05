<?php
  try {
    $user = 'grupo36';
    $password = 'mellaferra';
    $databaseName = 'grupo36e3';
    $db1 = new PDO("pgsql:dbname=$databaseName;host=localhost;port=5432;user=$user;password=$password");
    $user2 = 'grupo85';
    $password2 = '1234cinco';
    $databaseName2 = 'grupo85e3';
    $db2 = new PDO("pgsql:dbname=$databaseName2;host=localhost;port=5432;user=$user2;password=$password2");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }
?>