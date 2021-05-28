<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $inicio = $_POST["inicio"]; # aqui va el nombre de la variable que llamé al comienzo 
  $inicio = intval($inicio);
  $termino = $_POST["termino"];
  $termino = intval($termino);
  $tipo = $_POST["vehiculo"];
  $tipo = strtolower($tipo);
  #Se construye la consulta como un string
 	$query = "SELECT Despachos.id FROM Despachos , Vehiculos , Conductores , Personal_reparto ,Personal WHERE Despachos.vehiculo = Vehiculos.id AND Vehiculos.id = Conductores.vehículo AND Personal_reparto.id_persona = Personal.id  AND Personal_reparto.id_persona = Conductores.id_conductor  AND Personal.tipo = 'repartidor' AND Personal.edad BETWEEN ($inicio AND $termino) AND Vehiculos.tipo LIKE '%$tipo%';";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$pokemones = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Despacho id</th>
      
    </tr>
  
      <?php
        // echo $pokemones;
        foreach ($pokemones as $p) {
          echo "<tr><td>$p[0]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>