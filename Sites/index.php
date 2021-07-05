<!DOCTYPE html>

<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Tienda Onlain TuShop </title>
    <!-- Bootstrap(CSS), Jquery (javascripts), etc... -->

    <link href ="styles/mystyles.css" rel="stylesheet" />
  
  </head>
  <body>
    <!-- Migracion de personal admin y generacion de passwords -->
    <?php
      require("manejo_dbs/usuarios.php");
      require("manejo_dbs/pass_gen.php");
    ?>


    <div id="inicio">
      <div id="titulo_portada">
        <h1>MARISTAZO UNIMARC</h1>
      </div>
      <div id="botones1">
        <a href="homepage/login.php">
          <div class="boton1">INICIAR SESION</div>
        </a>
        <div class="espaciador1"></div>
        <a href="homepage/register.php">
          <div class="boton1">REGISTRATE</div>
        </a>
      </div>
    </div>

    <?php
      $query_test = 'SELECT * FROM usuarios';
      $test_result = $db2 -> prepare($query_test);
      $test_result -> execute();
      $usuarios = $test_result -> fetchAll();
    ?>
    
  <table>
    <tr>
      <th>id</th>
      <th>nombre</th>
      <th>rut</th>
      <th>edad</th>
      <th>sexo</th>
      <th>pass</th>
    </tr>
  
      <?php
        foreach ($usuarios as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td><td>$p[3]</td><td>$p[4]</td><td>$p[5]</td></tr>";
      }
      ?>
  </table>
  </body>
</html>

