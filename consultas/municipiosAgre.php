<?php

require '../database.php';

if(isset($_POST['nombre_municipio']) && isset($_POST['id_ciudad'])){
    $nombre_municipio = $_POST['nombre_municipio'];
    $id_ciudad = $_POST['id_ciudad'];

    $sql= "INSERT INTO municipios (municipio, id_ciudad) VALUES (:municipio, :id_ciudad)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':municipio', $nombre_municipio);
    $stmt->bindParam(':id_ciudad', $id_ciudad);
    $message = '';
    
    $sql2= "SELECT * FROM municipios WHERE municipio=:ciudad";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bindParam(':ciudad',$nombre_municipio);
    $stmt2->execute();
    $result = $stmt2->fetch(PDO::FETCH_ASSOC);
  

    if(!$result ){
        if($stmt->execute()){
            $message = 'Minicipio Agregado con exito';
            echo $message;
            }else{
            $message = 'Ocurrio un problema al agregar municipio';
            echo $message;
    }

    }
    
}


?>