<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $comuna= $_POST["comuna"]; # aqui va el nombre de la variable que llamé al comienzo 
  $comuna = strtolower($comuna);
  $año = $_POST["año"];

  #Se construye la consulta como un string
 	$query = "SELECT Despachos.id FROM Despachos,Direcciones WHERE DATE_PART('year', Despachos.fecha) = '$año' AND Direcciones.comuna LIKE '%$comuna%' AND Despachos.dir_destino = Direcciones.id;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$pokemones = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Despachos id</th>
    </tr>
  
      <?php
        // echo $pokemones;
        foreach ($pokemones as $p) {
          echo "<tr><td>$p[0]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>