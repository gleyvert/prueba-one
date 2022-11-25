<?php

require("database.php");
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM usuarios WHERE id_usuario=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);

        $message = '';

        if($stmt->execute()){
            $message = 'has eliminado el usuario correctamente';
        }else{
            $message = 'ha ocurrido un error al eliminar usuario';
        }
    
        $_SESSION['message']=$message;
        $_SESSION['message_type']='success';

        header('Location: registrar_usuario.php');
    }
?>