<?php 
    require('database.php');

    if(isset($_GET['id'])){
        $id_usuario = $_GET['id'];
        $sql = "SELECT * FROM usuarios WHERE id_usuario=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id_usuario);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $usuario = null;

        if(count($result) > 0 ){
            $usuario = $result;
            $nombre = $usuario['nombre'];
            $apellido = $usuario['apellido'];
            $email = $usuario['email'];
            $edad = $usuario['edad'];
            $ciudad = $usuario['id_ciudad'];
            $rol=$usuario['id_rol'];
        }
       
        if(isset($_POST['actualizar'])){
            $id = $_GET['id'];
            $nombre_post = $_POST['nombre'];
            $apellido_post = $_POST['apellido'];
            $email_post = $_POST['email'];
            $edad_post = $_POST['edad'];
            $ciudad_post = $_POST['id_ciudad'];
            $rol_post = $_POST['id_rol'];
            $password_post = $_POST['password'];

            $sql = "UPDATE usuarios SET nombre=:nombre, apellido=:apellido, email=:email, edad=:edad, password=:clave, id_ciudad=:ciudad, id_rol=:rol WHERE id_usuario=:id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nombre', $nombre_post);
            $stmt->bindParam(':apellido', $apellido_post);
            $stmt->bindParam(':email', $email_post);
            $stmt->bindParam(':edad', $edad_post);
            $stmt->bindParam(':ciudad', $ciudad_post);
            $stmt->bindParam(':rol', $rol_post);
            $password = password_hash($password_post, PASSWORD_BCRYPT);
            $stmt->bindParam(':clave', $password);
            
            $message= "";

            if(print_r($stmt->execute())){
                $message = "Se ha actualizado correctamente el usuario";
            }else{
                $message = "Ocurrio un error al actualizar base de datos";
            }

            $_SESSION['message']= $message;
            $_SESSION['message_type']='success';

            header('Location: registrar_usuario.php');
            
        }


    }


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Charts - SB Admin</title>
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

        <link href="./css/styles2.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    </head>
    <body class="sb-nav-fixed">
        <?php require 'partials/navbar.php' ?>
        <div id="layoutSidenav">
            <?php require 'partials/nav.php' ?>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
                <h1 class="mt-4">Editar Usuario</h1>
                <div class="row">
                            <div class="col-md-4">
                                <?php  echo $nombre_post ?? '' ?>
                                <?php  echo $apellido_post ?? '' ?>
                                <?php  echo $email_post ?? '' ?>
                                <?php  echo $edad_post ?? '' ?>
                                <?php  echo $ciudad_post ?? '' ?>
                                <?php  echo $password_post ?? '' ?>

                                <div class="card card-body bg-success p-2 bg-opacity-50" >
                                <form action="editar_usuario.php?id=<?php echo $id_usuario ?>" method="POST">
                                        <div class="form-group mt-2">
                                            <input type="text" required name="nombre" class="form-control" value="<?php echo $nombre ?>" placeholder="Ingrese el nombre de usuario" autofocus>
                                        </div>
                                        <div class="form-group mt-2">
                                            <input type="text" required name="apellido" class="form-control" value="<?php echo $apellido ?>" placeholder="Ingrese el apellido">
                                        </div>
                                        <div class="form-group mt-2">
                                            <input type="emai" required name="email" class="form-control" value="<?php echo $email ?>" placeholder="Ingrese el email">
                                        </div>
                                        <div class="form-group mt-2">
                                            <input type="text" required name="edad" class="form-control" value="<?php echo $edad ?>" placeholder="Ingrese la edad">
                                        </div>
                                        <div class="form-group mt-2">
                                            <select name="id_rol" required class="form-select" aria-label="Default select example">
                                            <option value="">Seleccione el rol</option>
                                            <?php
                                                $records = $conn->prepare('SELECT * FROM roles');
                                                $records->execute();
                                                $resultado = $records->fetchAll(PDO::FETCH_ASSOC);

                                                foreach($resultado as $row){ ?>
                                                <option value="<?php echo $row['id_rol'] ?>" <?php if($row['id_rol'] == $rol) echo 'selected' ?>><?php echo $row['nombre_rol'] ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group mt-2">
                                            <select name="id_ciudad" required class="form-select" aria-label="Default select example">
                                            <option value="">Seleccione la ciudad</option>
                                            <?php
                                                $records = $conn->prepare('SELECT * FROM ciudades');
                                                $records->execute();
                                                $resultado = $records->fetchAll(PDO::FETCH_ASSOC);

                                                foreach($resultado as $row){ ?>
                                                <option value="<?php echo $row['id_ciudad'] ?>" <?php if($row['id_ciudad'] == $ciudad) echo 'selected' ?>><?php echo $row['nombre'] ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" required name="password" class="form-control" placeholder="Ingrese la contraseña">
                                        </div>
                                        <div class="d-grid gap-2">
                                             <button class="btn btn-success mt-2" require name="actualizar">Actualizar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="./js/scripts2.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>
    </body>
</html>
