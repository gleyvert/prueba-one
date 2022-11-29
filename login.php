<?php
	
	require 'database.php';
	if(isset($_SESSION['user_id'])){
		header('Location: ../prueba-one');
	}

	if(!empty($_POST['email']) && !empty($_POST['password'])){
		$records= $conn->prepare('SELECT id_usuario, nombre, apellido, email, edad, password FROM usuarios WHERE email=:email');
		$records->bindParam(':email', $_POST['email']);
		$records->execute();
		$results= $records->fetch(PDO::FETCH_ASSOC);

		$message='';

		if(is_countable($results) && count($results) > 0  && password_verify($_POST['password'], $results['password'])){
			$_SESSION['user_id'] = $results['id_usuario'];
			header('Location: ../prueba-one');
		}else if(is_countable($results) && count($results) > 0 && !password_verify($_POST['password'], $results['password'])) {
			$message='Clave incorrecta';
			
		}else{
			$message='Datos incorrectos';
		}

		$_SESSION['message']=$message;
		$_SESSION['message_type']='danger';
		//header('Location: login.php');
		

	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">

			<?php if(isset($_SESSION['message']) && $_SESSION['message'] != '') {
                $message = $_SESSION['message'];
            	 $_SESSION['message'] = '';
                ?>
                <div class="alert alert-<?php echo $_SESSION['message_type']?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?= $message ?>
                </div>
                <?php }  ?>

				<form action="login.php" method="post" class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Ingresa
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Ingrese el email">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingrese contraseña">
						<input class="input100" type="password" name="password" placeholder="Contraseña">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Entrar
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Olvido su contraseña?
						</a>
						<a class="txt1" href="signup.php">
							Registrate
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>