<?php
require 'database.php';



$message= '';

	

if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['id_ciudad'])){
	$sql = "INSERT INTO usuarios (nombre,apellido,email,edad,password,id_ciudad, id_rol) VALUES (:nombre, :apellido, :email, :edad,:password,:ciudad,:rol)";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':nombre', $_POST['nombre']);
	$stmt->bindParam(':apellido', $_POST['apellido']);
	$stmt->bindParam(':email' , $_POST['email']);
	$stmt->bindParam(':edad', $_POST['edad']);
	$password= password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':ciudad' , $_POST['id_ciudad']);
    $stmt->bindParam(':rol', $_POST['id_rol']);
	$stmt->bindParam(':password' , $password);
    
	$email = $_POST['email'];

	

	function buscaRepetido($email, $conn){
		$sql2 = "SELECT * FROM usuarios WHERE email=:email";
		$stmt2 = $conn->prepare($sql2);
		$stmt2->bindParam(':email', $email);
		$stmt2->execute();
		$resultado= $stmt2->fetchAll(PDO::FETCH_ASSOC);		
		
		if(count($resultado) > 0){
			return 1;
		}else{
			return 0;
		}
	 
	}

	if(buscaRepetido($email,$conn)== 1){
		$message = 'Este usuario ya existe';
		$color_alerta = 'danger';
	}else{
		if($stmt->execute()){
			$message= 'Nuevo usuario creado con exito';
			$color_alerta = 'success';
		}else {
			$message='Lo sentimos no se pudo crear el usuario';
			$color_alerta = 'warning';
		}
	}
	
	$_SESSION['message']=$message;
    $_SESSION['message_type']=$color_alerta;
	
	header('Location: registrar_usuario.php');
	
	/* INTENTO FALLIDO DE CODIGO DE VALIDACION
	foreach($resultado as $row){
		echo $row['email'];
		if($row['email'] == $_POST['email']){
			$message = 'Este email ya esta registrado';
			$color_alerta = 'danger';
			die();
			if($message){
				$message= 'holaaaaaaaa';
				echo $message;
				
			}
			
		}
	}


		*/
	
	
	
			

	


    //header('Location: registrar_usuario.php');

}else{
    echo 'no se cumple el if';
}


?>