<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $comuna = $_POST["comuna"]; # aqui va el nombre de la variable que llamé al comienzo 
  $comuna = strtolower("$comuna")

  #Se construye la consulta como un string
 	$query = "SELECT Vehiculos.id, Unidades.id, Unidades.dirección
   FROM Vehiculos,Direcciones,Unidades 
   WHERE Unidades.id = Vehiculos.unidad 
   AND Unidades.dirección = Direcciones.id
   AND Direcciones.comuna LIKE '%$comuna%';";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$pokemones = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Vehiculo id</th>
      <th>Unidad id</th>
      <th>Unidad dirección</th>
      
    </tr>
  
      <?php
        // echo $pokemones;
        foreach ($pokemones as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>