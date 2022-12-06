<?php
include '../database.php';


    $id = $_POST['id_tarea'];
    $records = $conn->prepare('SELECT nombre, descripcion, id_tarea, creado_en, id_status FROM tareas WHERE id_tarea=:id ');
    $records->bindParam(':id', $id);
    $records->execute();
    $resultado = $records->fetchAll(PDO::FETCH_ASSOC);

    $jsonstring = json_encode($resultado);
    echo  $jsonstring;
    
   //echo 'hola';


?>