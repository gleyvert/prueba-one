<?php
require 'database.php';

$message= '';

if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['id_ciudad'])){
	$sql = "INSERT INTO usuarios (nombre,apellido,email,edad,password,id_ciudad) VALUES (:nombre, :apellido, :email, :edad,:password,:ciudad)";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':nombre', $_POST['nombre']);
	$stmt->bindParam(':apellido', $_POST['apellido']);
	$stmt->bindParam(':email' , $_POST['email']);
	$stmt->bindParam(':edad', $_POST['edad']);
	$password= password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':ciudad' , $_POST['id_ciudad']);
	$stmt->bindParam(':password' , $password);
    

	if($stmt->execute()){
		$message= 'Nuevo usuario creado con exito';
	}else {
		$message='Lo sentimos no se pudo crear el usuario';
	}

    $_SESSION['message']=$message;
    $_SESSION['message_type']='success';

    header('Location: registrar_usuario.php');

}else{
    echo 'no se cumple el if';
}


?>