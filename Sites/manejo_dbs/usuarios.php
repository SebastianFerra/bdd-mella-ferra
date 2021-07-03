<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario

  $query1 = "SELECT personal.id,personal.nombre,personal.rut,personal.edad,personal.sexo FROM personal, personal_admin WHERE personal.id = personal_admin.id_persona";
	$result1 = $db1 -> prepare($query1);
	$result1 -> execute();
	$personal_admin = $result1 -> fetchAll();

  $query2 = "SELECT * FROM usuarios";
  $result2 = $db2 -> prepare($query2);
	$result2 -> execute();
	$usuarios = $result2 -> fetchAll();

  $query3 = "SELECT personal_admin.id_persona, unidades.dirección FROM personal_admin, unidades WHERE personal_admin.unidad = unidades.id";
  $result3 = $db1 -> prepare($query3);
	$result3 -> execute();
	$direcciones_personal = $result3 -> fetchAll();

  $query4 = "SELECT usuario, direccion FROM direcciones_usuario";
  $result4 = $db2 -> prepare($query4);
	$result4 -> execute();
	$direcciones_usuario = $result4 -> fetchAll();

  $count = 0;
  $new_direcciones = array();
  foreach ($personal_admin as $p) {
    foreach($direcciones_personal as $d) {
      if ($d[0] == $p[0]) {
        $replace = array(0 => count($usuarios) + $count);
        $new_d = array_replace($d, $replace);
        array_push($new_direcciones, $new_d);
      } 
    }
    $count = $count + 1;
  }
  $direcciones_personal = $new_direcciones;

  $user_count = 0;
  foreach ($personal_admin as $p) {
    if (false == in_array($p, $usuarios)) {
      $p[0] = count($usuarios) + $user_count;
      $id_usuario = $p[0];
      $nombre = $p[1];
      $rut = $p[2];
      $edad = $p[3];
      $sexo = $p[4];
      $insert = "INSERT INTO usuarios(id_usuario, nombre, rut, edad, sexo) VALUES($id_usuario, $nombre, $rut, $edad, $sexo)";
      $insert_result = $db2 -> prepare($insert);
      $insert_result -> execute();
      $insert_result -> fetchAll();
      $user_count = $user_count + 1;
    }
  }
  
  $dir_count = 0;
  foreach ($direcciones_personal as $d) {
    if (false == in_array($d, $direcciones_usuario)) {
      $new_d = array(count($direcciones_usuario) + $dir_count, $d[0], $d[1]);
      $id_dir_usuario = $new_d[0];
      $usuario = $new_d[2];
      $direccion = $new_d[3];
      $insert_d = "INSERT INTO direcciones_usuario(id_dir_usuario, usuario, direccion) VALUES($id_dir_usuario, $usuario, $direccion)";
      $insert_d_result = $db2 -> prepare($insert_d);
      $insert_d_result -> execute();
      $insert_d_result -> fetchAll();
      $dir_count = $dir_count + 1;
    }
  }

  $query5 = "SELECT * FROM usuarios";
  $result5 = $db2 -> prepare($query5);
	$result5 -> execute();
	$usuarios_changed = $result5 -> fetchAll();

  $query6 = "SELECT * FROM direcciones_usuario";
  $result6 = $db2 -> prepare($query6);
	$result6 -> execute();
	$direcciones_changed = $result6 -> fetchAll();
  ?>

  <div>
    <table style="float: left">
      <tr>
        <th>id</th>
        <th>nombre</th>
        <th>rut</th>
        <th>edad</th>
        <th>sexo</th>
      </tr>
      <?php
        foreach ($usuarios_changed as $u) {
          echo "<tr><td>$u[0]</td><td>$u[1]</td><td>$u[2]</td><td>$u[3]</td><td>$u[4]</td></tr>";
      }
      ?>
    </table>
    <table style="float: left">
      <tr>
        <th>id direccion usuario</th>
        <th>id usuario</th>
        <th>id direccion</th>
      </tr>
      <?php
        foreach ($direcciones_changed as $per) {
          echo "<tr><td>$per[0]</td><td>$per[1]</td><td>$per[2]</td></tr>";
      }
      ?>
    </table>
  </div>

<?php include('../templates/footer.html'); ?>