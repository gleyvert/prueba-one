<?php 
    require("database.php");

    if(isset($_POST['guardar_tarea'])){
        $nombre_a = $_POST['nombre_a'];
        $descripcion_a = $_POST['descripcion_a'];
        $id = $_SESSION['user_id'];

        $message = "";

        $sql = "INSERT INTO tareas (nombre, descripcion, id_usuario) VALUE (:nombre,:descripcion,:id)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre_a);
        $stmt->bindParam(':descripcion', $descripcion_a);
        $stmt->bindParam(':id',$id);

        if($stmt->execute()){
            $message='Has creado una nueva actividad';
        }else{
            $message='Lo sentimos ha ocurrido un error';
        }

        $_SESSION['message']=$message;
        $_SESSION['message_type'];
        header('Location: registrar_actividad.php');
    }
?>