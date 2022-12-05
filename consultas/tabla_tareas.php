<?php
include '../database.php';



    $usuario = $_SESSION['user_id'];
    $records = $conn->prepare('SELECT nombre, descripcion, id_tarea, creado_en FROM tareas WHERE id_usuario=:usuario ');
    $records->bindParam(':usuario', $usuario);
    $records->execute();
   
    while($row = $records->fetch(PDO::FETCH_ASSOC)){
        $id = $row['id_tarea'];
        $button = '<button class="btn btn-primary btn-sm btnEditar" data-toggle="modal" data-target="#ModalEditar" onclick="editarTarea('.$id.')">Editar</button>';
        $button2 = '<button class="btn btn-primary btn-sm btnEditar" data-toggle="modal" data-target="#ModalEditar" onclick="editarTarea('.$id.')">Editar</button>';

        $output['data'][] = array(
            $row['id_tarea'],
            $row['nombre'],
            $row['descripcion'],
            $row['creado_en'],
            $button,
            $button2
        );
    }

    $data = $output;

    print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS

  

/*
    $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        //$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        while($row = $resultado->fetch(PDO::FETCH_ASSOC) ){
            $id=$row['id_grupo'];
            $button= '<button class="btn btn-primary btn-sm btnEditar" data-toggle="modal" data-target="#ModalEditar" onclick="editarRegistroGrupo('.$id.')">Editar</button>';
        $output['data'][] = array( 
            $row['id_grupo'],
            $row['nombre_grupo'],
            $row['nombre_exportadora'], 
            $row['observaciones'],
            $button         
            );  
    }
        $data=$output;


    break;




print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS


$conexion = NULL;

*/
?>