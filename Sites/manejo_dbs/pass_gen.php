<?php
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion.php");

    $query_usrs = "SELECT * FROM usuariuos";
    $result_usrs = $db2 -> prepare($query_usrs);
    $result_usrs -> execute();
    $usuarios = $result_usrs -> fetchAll();

    


?>