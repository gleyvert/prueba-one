<?php
include '../database.php';



    $usuario = $_SESSION['user_id'];
    //$records = $conn->prepare('SELECT nombre, descripcion, id_tarea, creado_en, id_status FROM tareas WHERE id_usuario=:usuario ');
    $records = $conn->prepare('SELECT tareas.nombre, descripcion, id_tarea, creado_en, status_tareas.id_status, status_tareas.nombre as nombre_status FROM tareas LEFT JOIN status_tareas ON  tareas.id_status=status_tareas.id_status WHERE id_usuario=:usuario ORDER BY tareas.id_status ASC');
    $records->bindParam(':usuario', $usuario);
    $records->execute();
   
    while($row = $records->fetch(PDO::FETCH_ASSOC)){
        $status = array(
            'pendiente'=>'danger',
            'en_curso' =>'warning',
            'realizada'=>'success'
        );
        $clase= $status[$row['nombre_status']];
        $nombre_status=$row['nombre_status'];
        $id_status = $row['id_status'];
        $id = $row['id_tarea'];
        $button = '<button class="btn btn-primary btn-sm btnEditar" data-toggle="modal" data-target="#ModalEditar" onclick="editarTarea('.$id.')">Editar</button>';
        $button2 = '<button class="btn btn-danger btn-sm btnEliminar" onclick="eliminarTarea('.$id.')">Eliminar</button>';
        $span  =  '<span class="badge badge-'.$clase.'">' .$nombre_status.'</span>';
        $output['data'][] = array(
            $row['id_tarea'],
            $row['nombre'],
            $row['descripcion'],
            $row['creado_en'],
            $span,
            $button,
            $button2
        );
    }

    $data = $output;

    print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS

  /*

    $usuario = $_SESSION['user_id'];
    $records = $conn->prepare('SELECT tareas.nombre, descripcion, id_tarea, creado_en, status_tareas.nombre as nombre_status FROM tareas LEFT JOIN status_tareas ON  tareas.id_status=status_tareas.id_status WHERE id_usuario=:usuario ORDER BY tareas.id_status ASC');
    $records->bindParam(':usuario', $usuario);
    $records->execute();
    $results = $records->fetchAll(PDO::FETCH_ASSOC);

    foreach($results as $row){ 
        $status = array(
            'pendiente'=>'danger',
            'en_curso' =>'warning',
            'realizada'=>'success'
        );
        $clase= $status[$row['nombre_status']];
        ?>
        <tr>
            <td><?php echo $row['nombre'] ?></td>
            <td><?php echo $row['descripcion'] ?></td>
            <td><?php echo $row['creado_en'] ?></td>
            <td><span class="badge badge-<?php echo $clase?>"><?php echo $row['nombre_status'] ?></span></td>
            <td>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-outline-success" href="editar.php?id=<?php echo $row['id_tarea'] ?>">Editar<i class=""></i></a>
                <a class="btn btn-outline-danger" href="eliminar.php?id=<?php echo $row['id_tarea'] ?>">Eliminar</a>
            </td>
            </div>
        </tr>

  <?php  } ?>

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