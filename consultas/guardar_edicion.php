<?php
include '../database.php';


if(isset($_POST['guardar_tarea'])){
    $id = $_GET['id'];
    $nombre_post = $_POST['nombre_a'];
    $descripcion_post = $_POST['descripcion_a'];
    $status_tarea_post = $_POST['id_status'];
    echo $descripcion_post."yes";

    $sql = "UPDATE tareas SET nombre= :nombre, descripcion=:descripcion, id_status=:id_status WHERE id_tarea=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nombre', $nombre_post);
    $stmt->bindParam(':descripcion', $descripcion_post);
    $stmt->bindParam(':id_status', $status_tarea_post);

    $message = '';

    if($stmt->execute()){
        $message = 'la actividad se ha actualizado';
    }else{
        $message = 'hubo un error al actualizar';
    }

    $_SESSION['message'] = $message;
    $_SESSION['message_type']='success';
    header('Location: registrar_actividad.php');

}

?>