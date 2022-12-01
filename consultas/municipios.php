<?php
    require '../database.php';
        if(isset($_POST['id_ciudad'])){
            $id_ciudad= $_POST['id_ciudad'];
            $records = $conn->prepare('SELECT * FROM municipios WHERE id_ciudad=:id_ciudad ');
            $records->bindParam(':id_ciudad', $id_ciudad);
            $records->execute();
            $resultado = $records->fetchAll(PDO::FETCH_ASSOC);
           
            $jsonstring = json_encode($resultado);
            echo  $jsonstring ;
        }                                                
?>