<?php 

require 'database.php';

$message= '';


if(!empty($_POST['email']) && !empty($_POST['password'])){
	$sql = "INSERT INTO usuarios (nombre,apellido,email,edad,password, id_ciudad) VALUES (:nombre, :apellido, :email, :edad,:password, :ciudad)";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':nombre', $_POST['nombre']);
	$stmt->bindParam(':apellido', $_POST['apellido']);
	$stmt->bindParam(':email' , $_POST['email']);
	$stmt->bindParam(':edad', $_POST['edad']);
	$password= password_hash($_POST['password'], PASSWORD_BCRYPT);
	$stmt->bindParam(':ciudad' , $_POST['id_ciudad']);
	$stmt->bindParam(':password' , $password);

	$email = $_POST['email'];

	function buscaRepetido($email,$conn){
		$sql2 = "SELECT * FROM usuarios WHERE email=:email";
		$stmt2 = $conn->prepare($sql2);
		$stmt2->bindParam(':email', $email);
		$stmt2->execute();
		$resultado = $stmt2->fetchAll(PDO::FETCH_ASSOC);

		if(count($resultado) > 0){
			return 1;
		}else{
			return 0;
		}
	}

	if(buscaRepetido($email,$conn) == 1){
		$message = 'Este usuario ya existe';
		$color_alerta = 'danger';
	}else{
		if($stmt->execute()){
			$message= 'Nuevo usuario creado con exito';
			$color_alerta = 'success';
		}else {
			$message='Lo sentimos hubo un problema al crear el usuario';
			$color_alerta = 'warning';
		 }
	}

	$_SESSION['message']= $message;
	$_SESSION['message_type'] = $color_alerta;

	
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
				<form action="signup.php" method="post" class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Registro
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Ingrese su Nombre">
						<input class="input100" type="text" name="nombre" placeholder="Nombre">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Ingrese su apellido">
						<input class="input100" type="text" name="apellido" placeholder="Apellido">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "igrese Email">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf167;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Ingrese su edad">
						<input class="input100" type="text" name="edad" placeholder="Edad">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ciudad">
                        <select name="id_ciudad" required class="input100 form-select" aria-label="Default select example">
                            <option value="">Seleccione la ciudad</option>
                                <?php
                                    $records = $conn->prepare('SELECT * FROM ciudades');
                                    $records->execute();
                                    $resultado = $records->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($resultado as $row){ ?>
                            		<option class="text-dark" value="<?php echo $row['id_ciudad'] ?>"><?php echo $row['nombre'] ?></option>
                                <?php }?>
                        </select>
						<span class="focus-input100" data-placeholder="&#xf124;"></span>
                    </div>

					<div class="wrap-input100 validate-input" data-validate="Contraseña">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate="Confirme su Contraseña">
						<input class="input100" type="password" name="password2" placeholder="Confirm Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Registrar
						</button>
					</div>

					<div class="text-center p-t-30">
						<a class="txt1" href="#">
							olvidaste la contraseña?
						</a>
						<br>
                        <a class="txt1" href="login.php">
							Tienes Cuenta Entra aqui
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