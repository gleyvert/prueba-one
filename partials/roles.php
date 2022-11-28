<?php 


$usuario_id = $_SESSION['user_id'];

if(isset($_SESSION['user_id'])){
    $sql = "SELECT id_rol FROM usuarios WHERE id_usuario=:usuario";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usuario',$usuario_id);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    $id_rol = $resultado['id_rol'];
   // echo $resultado['id_rol'];

}

?>