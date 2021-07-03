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

  $query3 = "SELECT personal_admin.id_persona, unidades.direccion FROM personal_admin, unidades WHERE personal_admin.uid = unidades.uid";
  $result3 = $db1 -> prepare($query3);
	$result3 -> execute();
	$direcciones_personal = $result3 -> fetchAll();

  $query4 = "SELECT usuario, direccion FROM direcciones_usuario";
  $result4 = $db2 -> prepare($query4);
	$result4 -> execute();
	$direcciones_usuario = $result4 -> fetchAll();

  $query5 = "SELECT * FROM direcciones_usuario";
  $result5 = $db2 -> prepare($query5);
	$result5 -> execute();
	$direcciones_usuario_full = $result5 -> fetchAll();

  $count = 1;
  foreach ($personal_admin as $p) {
    foreach($direcciones_personal as $d) {
      if ($d[0] == $p[0]) {
        $d[0] = 364 + $count;
      } 
    }
    $count = $count + 1;
  }

  $user_count = 1;
  foreach ($personal_admin as $p) {
    if (false == in_array($p, $usuarios)) {
      $p[0] = 364 + $user_count;
      array_push($usuarios, $p);
      $user_count = $user_count + 1;
    }
  }
  
  $dir_count = 1;
  foreach ($direcciones_personal as $d) {
    if (false == in_array($d, $direcciones_usuario)) {
      $new_d = array(938 + $dir_count, $d[0], $d[1]);
      array_push($direcciones_usuario_full, $new_d);
      $dir_count = $dir_count + 1;
    }
  }
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
        foreach ($usuarios as $u) {
          echo "<tr><td>$u[0]</td><td>$u[1]</td><td>$u[2]</td><td>$u[3]</td><td>$u[4]</td></tr>";
      }
      ?>
    </table>
    <table style="float: left">
      <tr>
        <th>id usuario</th>
        <th>id direccion</th>
      </tr>
      <?php
        foreach ($direcciones_personal as $u) {
          echo "<tr><td>$u[0]</td><td>$u[1]</td></tr>";
      }
      ?>
      
    </table>
  </div>

<?php include('../templates/footer.html'); ?>