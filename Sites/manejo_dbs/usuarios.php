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

    $query2 = "SELECT * FROM usuarios"
    $result2 = $db2 -> prepare($query2);
	$result2 -> execute();
	$usuarios = $result2 -> fetchAll();

    foreach ($personal_admin

  ?>

  <table>
    <tr>
      <th>Dirección unidad</th>
      <th></th>
      <th></th>
    </tr>
  
      <?php
        // echo $pokemones;
        foreach ($pokemones as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>