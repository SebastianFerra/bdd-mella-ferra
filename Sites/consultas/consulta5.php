<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $comuna1 = strtolower($_POST["comuna1"]); # aqui va el nombre de la variable que llamé al comienzo 
  $comuna2 = strtolower($_POST["comuna2"]);

  #Se construye la consulta como un string
 	$query = "SELECT Personal.nombre 
   FROM Personal_admin, Unidades,Cobertura, Personal 
   WHERE Cobertura.comuna_cobertura LIKE '%$comuna1%' 
   AND Unidades.id = Cobertura.id_unidad 
   AND Personal.id = Personal_admin.id_persona
   AND Unidades.jefe = Personal_admin.id_persona
   INTERSECT 
   SELECT Personal.nombre   
   FROM Personal_admin , Unidades ,Cobertura,Personal
   WHERE Cobertura.comuna_cobertura LIKE '%$comuna2%' 
   AND Unidades.id = Cobertura.id_unidad 
   AND Personal.id = Personal_admin.id_persona
   AND Unidades.jefe = Personal_admin.id_persona ;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$pokemones = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Nombre jefe</th>

    </tr>
  
      <?php
        // echo $pokemones;
        foreach ($pokemones as $p) {
          echo "<tr><td>$p[0]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>