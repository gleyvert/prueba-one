<?php

require '../database.php';

if(isset($_POST['nombre_ciudad'])){
    $nombre_ciudad = $_POST['nombre_ciudad'];

    $sql= "INSERT INTO ciudades (nombre) VALUES (:ciudad)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ciudad',$nombre_ciudad);
    $message = '';
    
    $sql2= "SELECT * FROM ciudades WHERE nombre=:ciudad";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bindParam(':ciudad',$nombre_ciudad);
    $stmt2->execute();
    $result = $stmt2->fetch(PDO::FETCH_ASSOC);
  

    if(!$result ){
        if($stmt->execute()){
            $message = 'Ciudad Agregada con exito';
            echo $message;
            }else{
            $message = 'Ocurrio un problema al agregar ciudad';
            echo $message;
    }

    }
    
}


?>