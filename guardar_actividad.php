<?php
    require("database.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $id_usuario = $_SESSION['user_id'];

    $sql_usuario = "SELECT nombre, apellido, email FROM usuarios WHERE id_usuario=:id_usuario";
    $stmt_usuario = $conn->prepare($sql_usuario);
    $stmt_usuario->bindParam(':id_usuario', $id_usuario);
    $stmt_usuario->execute();
    $resultado_usuario = $stmt_usuario->fetch(PDO::FETCH_ASSOC);



    $message= '';
    $message2 = '';
    $nombre = $resultado_usuario['nombre'];
    $apellido = $resultado_usuario['apellido'];
    $nombreYapellido = $nombre . ' ' . $apellido;
    $destinatario = $resultado_usuario['email'];


    $tarea_nombre = $_POST['nombre_a'];
    $tarea_descripcion = $_POST['descripcion_a'];
    
    $asunto = 'APLICACION TAREA';
    $mensaje_correo = 'Has creado una cuenta satisfactoriamente. Pasate por la pagina para agradecerte <a href="http://localhost/prueba-one/registrar_usuario.php" class="">Ingresa aqui</a>';


    if(isset($_POST['guardar_tarea'])){
        $nombre_a = $_POST['nombre_a'];
        $descripcion_a = $_POST['descripcion_a'];
        $id = $_SESSION['user_id'];
        $id_status = $_POST['id_status'];


        $sql = "INSERT INTO tareas (nombre, descripcion, id_status, id_usuario) VALUE (:nombre,:descripcion,:id_status,:id)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre_a);
        $stmt->bindParam(':descripcion', $descripcion_a);
        $stmt->bindParam(':id_status',$id_status);
        $stmt->bindParam(':id',$id);


        if($stmt->execute()){
            $message='Has creado una nueva actividad';
            $color_alerta='success';
            
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
				$mail->Subject = 'HAS CREADO UNA TAREA NUEVA';
				$mail->Body    = 'HOLA  <b>' . $nombreYapellido . ' Has creado una tarea nueva  </b> <br/> 
                                    <h2>Titulo: ' . $tarea_nombre  . '</h2>
                                    <h3>Descripcion: </h3> ' . $tarea_descripcion . '
                                    ';
				//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				$mail->send();
				$message2 = "El e-mail se ha enviado satisfactoriamente al usuario.";
				$color_alerta2 = 'primary';
			} catch (Exception $e) {
				$message2 =  "Ocurrio un error al enviar correo: {$mail->ErrorInfo}";
				$color_alerta2 = 'danger';
			}


        }else{
            $message='Lo sentimos ha ocurrido un error';
        }

        //   ALERTA1
        $_SESSION['message']=$message;
        $_SESSION['message_type']=$color_alerta;

        //   ALERTA2
        $_SESSION['message2']=$message2;
        $_SESSION['message_type2']=$color_alerta2;

        header('Location: registrar_actividad.php');
    }
?>