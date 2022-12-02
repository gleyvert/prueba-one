<?php

require '../database.php';

$search = $_POST['search_tarea'];
//echo $search;

if(!empty($search)){
    $usuario = $_SESSION['user_id'];
  // $sql = "SELECT id_usuario, usuarios.nombre, ciudades.nombre as nombre_ciudad, apellido, email, edad, usuarios.id_ciudad, usuarios.id_rol, nombre_rol FROM usuarios LEFT JOIN ciudades ON usuarios.id_ciudad=ciudades.id_ciudad LEFT JOIN roles ON usuarios.id_rol=roles.id_rol WHERE usuarios.nombre LIKE '$search%'";
  //$sql = "SELECT * FROM tareas WHERE nombre LIKE '$search%' ";
   $sql= "SELECT tareas.nombre, descripcion, id_tarea, creado_en, status_tareas.nombre as nombre_status FROM tareas LEFT JOIN status_tareas ON  tareas.id_status=status_tareas.id_status WHERE id_usuario=:usuario AND tareas.nombre LIKE '$search%'  ORDER BY tareas.id_status ASC";
   $stmt = $conn->prepare($sql);
   $stmt->bindParam(':usuario', $usuario);
   $stmt->execute();
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

   $jsonstring = json_encode($results);
   echo  $jsonstring;

}
?>