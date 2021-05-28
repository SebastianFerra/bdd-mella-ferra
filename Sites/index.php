<?php include('templates/header.html');   ?>

<body>
  <h1 align="center">Empresa de despachos </h1>
  <p style="text-align:center;">Aquí podrás encontrar información sobre los despachos de tu empresa favorita</p>

  <br>

  <h3 align="center"> Listado con las direcciones de nuestras unidades de despacho</h3>

  <form align="center" action="consultas/consulta1.php" method="post">
    
    
    <br/><br/>
    <input type="submit" value="Mostrar todo">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> Ingrese una comuna para ver los vehículos de las uniades que se ubican allí</h3>

  <form align="center" action="consultas/consulta2.php" method="post">
    Comuna:
    <input type="text" name="comuna">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> Ingrese una comuna y seleccione un año para ver todos los vehiculos que realizaron despachos allí en ese año</h3>
  <form align="center" action="consultas/consulta3.php" method="post">
    Comuna:
    <input type="text" name="altura">
    <br/><br/>
    
  
  <?php
  #	AQUI OBTENEMOS LAS COSAS QUE NECESITAMOS COMO LOS AÑOS Y ESAS COSAS
  require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT DATE_PART('year',fecha) AS año FROM despachos ORDER BY año;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>
    Seleccinar una año:
    <select name="año">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
    </select>
	<br/><br/>
	<input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center"> Ingrese un tipo de vehiculo y 2 números para ver qué despachos fueron realizados por repartidores cuya edad está en el rango y por medio de ese tipo de vehiculo</h3>

  <form align="center" action="consultas/consulta4.php" method="post">
    Tipo de vehículo:
    <input type="text" name="vehiculo">
    <br/><br/>

  
  <?php
  #	AQUI OBTENEMOS LAS COSAS QUE NECESITAMOS COMO LOS AÑOS Y ESAS COSAS
  require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT edad FROM personal ORDER BY edad;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>
    Seleccinar año inicio:
    <select name="inicio">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
    </select>
	<br><br>
	Seleccionar año término:
	<select name="termino">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
    </select>
	<br/><br/>
	<input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>
  <h3 align="center"> Ingrese 2 comunas y vea los nombres de los jefes de las unidades que realizaron despachos a ambas comunas </h3>

  <form align="center" action="consultas/consulta5.php" method="post">
    Comuna 1:
    <input type="text" name="comuna1">
    <br/><br/>
	Comuna 2:
	<input type="text" name="comuna2">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>
  <h3 align="center"> Ingrese un tipo de vehiculop para saber que unidad maneja más vehiculos de tal tipo </h3>

  <form align="center" action="consultas/consulta6.php" method="post">
   Tipo de vehículo:
    <input type="text" name="tipo">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>
  <div>
            <img src="us.JPG" alt="us" />
        </div>
</body>
</html>