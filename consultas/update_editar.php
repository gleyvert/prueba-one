<?php

require '../database.php';


if(isset($_POST['input_id_tarea'])){
    $nombre = $_POST['input_nombre'];
    $descripcion = $_POST['input_descripcion'];
    $id_status = $_POST['select_status'];
    $id_tarea = $_POST['input_id_tarea'];

    $sql = "UPDATE tareas SET nombre= :nombre, descripcion=:descripcion, id_status=:id_status WHERE id_tarea=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id_tarea);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':id_status', $id_status);

    $message = '';

    if($stmt->execute()){
        $message = 'La actividad se ha actualizado';
        echo $message;
    }else{
        $message = 'Hubo un error al actualizar';
        echo $message;
    }

  //  $_SESSION['message'] = $message;
   // $_SESSION['message_type']='success';
   // header('Location: registrar_actividad.php');

}
?>