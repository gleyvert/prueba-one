<?php
require 'database.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$message= '';
$message2 = '';
$nombre = $_POST['nombre'];
$nombreYapellido=$_POST['nombre'] . ' ' . $_POST['apellido'];
$destinatario = $_POST['email'];
$asunto = 'APLICACION TAREA';
$mensaje_correo = 'Has creado una cuenta satisfactoriamente. Pasate por la pagina para agradecerte <a href="http://localhost/prueba-one/registrar_usuario.php" class="">Ingresa aqui</a>';


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
		
			//Load Composer's autoloader
			require 'vendor/autoload.php';

			//Create an instance; passing `true` enables exceptions
			$mail = new PHPMailer(true);

			try {
				//Server settings
				$mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
				$mail->isSMTP();                                            //Send using SMTP
				$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
				$mail->Username   = 'gleyvertlagos@gmail.com';                     //SMTP username
				$mail->Password   = 'jjrbuzpqpshgnrbk';                               //SMTP password
				$mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
				$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

				//Recipients
				$mail->setFrom('gleyvertlagos@gmail.com', 'APLICACION TAREA');
				$mail->addAddress($destinatario, $nombre);     //Add a recipient


				//Attachments
			//  $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
			//  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

				//Content
				$mail->isHTML(true);                                  //Set email format to HTML
				$mail->Subject = 'APLICACION TAREA';
				$mail->Body    = 'HOLA  <b>' . $nombreYapellido . '  </b>';
				//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				$mail->send();
				$message2 = "El e-mail se ha enviado satisfactoriamente al usuario.";
				$color_alerta2 = 'primary';
			} catch (Exception $e) {
				$message2 =  "Ocurrio un error al enviar correo: {$mail->ErrorInfo}";
				$color_alerta2 = 'danger';
			}

		}else {
			$message='Lo sentimos no se pudo crear el usuario';
			$color_alerta = 'warning';
		}
	}
	
	$_SESSION['message']=$message;
	$_SESSION['message2'] = $message2;
    $_SESSION['message_type']=$color_alerta;
	$_SESSION['message_type2']=$color_alerta2;
	
	
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