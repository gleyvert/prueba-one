<?php 
    require("../database.php");
    
    if(isset($_POST['id_tarea'])){
        $id = $_POST['id_tarea'];
        $sql = "DELETE FROM tareas WHERE id_tarea=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);

        $message = '';

        if($stmt->execute()){
            $message = 'has eliminado la actividad correctamente';
            $jsonstring = json_encode($message);
            echo $jsonstring;
        }else{
            $message = 'ha ocurrido un error al eliminar actividad';
            $jsonstring = json_encode($message);
            echo $jsonstring;
        }
    
    }


?>