<?php
include '../database.php';



    $usuario = $_SESSION['user_id'];
    $records = $conn->prepare('SELECT nombre, descripcion, id_tarea, creado_en FROM tareas WHERE id_usuario=:usuario ');
    $records->bindParam(':usuario', $usuario);
    $records->execute();
    $results = $records->fetchAll(PDO::FETCH_ASSOC);

    $jsonstring = json_encode($results);
    echo $jsonstring;

?>