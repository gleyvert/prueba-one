<?php 
    require("database.php");
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM tareas WHERE id_tarea=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);

        $message = '';

        if($stmt->execute()){
            $message = 'has eliminado la actividad correctamente';
        }else{
            $message = 'ha ocurrido un error al eliminar actividad';
        }
    
        $_SESSION['message']=$message;
        $_SESSION['message_type']='success';

        header('Location: registrar_actividad.php');
    }


?>