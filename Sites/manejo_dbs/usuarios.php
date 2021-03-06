
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("config/conexion.php");

  #Se obtiene el valor del input del usuario

  $query1 = "SELECT personal.id,personal.nombre,personal.rut,personal.edad,personal.sexo FROM personal, personal_admin WHERE personal.id = personal_admin.id_persona";
	$result1 = $db1 -> prepare($query1);
  $result1 -> execute();
	$personal_admin = $result1 -> fetchAll();

  $query2 = "SELECT * FROM usuarios";
  $result2 = $db2 -> prepare($query2);
	$result2 -> execute();
	$usuarios = $result2 -> fetchAll();

  $query3 = "SELECT * FROM direcciones_usuario";
  $result3 = $db2 -> prepare($query3);
	$result3 -> execute();
	$direcciones_usuario = $result3 -> fetchAll();

  $user_count = 0;
  foreach ($personal_admin as $p) {
    $condicion = true;
    foreach($usuarios as $u) {
      if ($u[2] == $p[2]) {
        $condicion = false;
      } 
    }
    if ($condicion) {

      $id_admin = $p[0];
      $query_dir = "SELECT unidades.dirección FROM personal_admin, unidades WHERE personal_admin.unidad = unidades.id AND personal_admin.id_persona = $id_admin";
      $result_dir = $db1 -> prepare($query_dir);
      $result_dir -> execute();
      $dir_admin = $result_dir -> fetchAll();
      
      $dir_admin = intval($dir_admin[0][0]);
      $p[0] = count($usuarios) + $user_count;
      $id_usuario = $p[0];
      $nombre = $p[1];
      $rut = $p[2];
      $edad = $p[3];
      $sexo = $p[4];
      
      $insert_usr = "INSERT INTO usuarios VALUES($id_usuario, '$nombre', '$rut', $edad, '$sexo')";
      $insert_usr_result = $db2 -> prepare($insert_usr);
      $insert_usr_result -> execute();
      $insert_usr_result -> fetchAll();

      $id_dir_usuario = count($direcciones_usuario) + $user_count;
      
      $insert_dir = "INSERT INTO direcciones_usuario VALUES($id_dir_usuario, $id_usuario, $dir_admin)";
      $insert_dir_result = $db2 -> prepare($insert_dir);
      $insert_dir_result -> execute();
      $insert_dir_result -> fetchAll();

      $user_count = $user_count + 1;
    }
  }
  ?>