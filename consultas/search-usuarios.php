<?php
 require '../database.php';

 $search = $_POST['search'];
//echo $search;

 if(!empty($search)){
    
    $sql = "SELECT id_usuario, usuarios.nombre, ciudades.nombre as nombre_ciudad, apellido, email, edad, usuarios.id_ciudad, usuarios.id_rol, nombre_rol FROM usuarios LEFT JOIN ciudades ON usuarios.id_ciudad=ciudades.id_ciudad LEFT JOIN roles ON usuarios.id_rol=roles.id_rol WHERE CONCAT(apellido,' ',usuarios.nombre) LIKE '%{$search}%' OR CONCAT(usuarios.nombre,' ',apellido) LIKE '%{$search}%' ";
  //  $sql = "SELECT * FROM usuarios WHERE nombre LIKE '$search%' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $jsonstring = json_encode($results);
    echo  $jsonstring;

 }

?>
