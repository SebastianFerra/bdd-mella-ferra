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

    foreach ($personal_admin as $p) {

      $count = 1

        if (false == in_array($p, $usuarios)) {
          $p[0] = $p[0] + 364 + $count
          array_push($usuarios, $p);
          $count = $count + 1 
        }

    }
  ?>

  <table>
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

<?php include('../templates/footer.html'); ?>