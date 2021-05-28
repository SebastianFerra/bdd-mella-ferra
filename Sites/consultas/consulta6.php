<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $tipo = strtolower($_POST["tipo"]); # aqui va el nombre de la variable que llamé al comienzo 
  

  #Se construye la consulta como un string
 	$query = "SELECT Unidades.id, COUNT(Vehiculos.id) AS n_vehiculos 
   FROM Unidades, Vehiculos 
   WHERE Vehiculos.tipo LIKE '%$tipo%' 
   AND Vehiculos.unidad = Unidades.id 
   GROUP BY Unidades.id 
   ORDER BY n_vehiculos DESC 
   LIMIT 1;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$pokemones = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>ID unidad</th>
      <th>Cantidad</th>
  
    </tr>
  
      <?php
        // echo $pokemones;
        foreach ($pokemones as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>