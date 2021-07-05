<?php
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require("config/conexion.php");

    $query_usrs = "SELECT * FROM usuarios";
    $result_usrs = $db2 -> prepare($query_usrs);
    $result_usrs -> execute();
    $usuarios = $result_usrs -> fetchAll();
    echo $usuarios[0];

    if (count($usuarios[0]) == 5) {
        $query_alter = "ALTER TABLE usuarios ADD pass VARCHAR";
        $result_alter = $db2 -> prepare($query_alter);
        $result_alter -> execute();
        $result_alter -> fetchAll();

        foreach ($usuarios as $user) {
            $user_id = $user[0];
            $password = $user[2];
            $query_pass = "UPDATE usuarios SET pass = $password WHERE id_usuario = $user_id";
            $result_pass = $db2 -> prepare($query_pass);
            $result_pass -> execute();
            $result_pass -> fetchAll();
        }
    }
?>