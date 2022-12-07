<?php
require('database.php');
require 'partials/roles.php';

if (isset($_SESSION['user_id']) && $id_rol == 3 or $id_rol == 2) {
} else {
    header('Location: 404.php');
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
                    <h1 class="mt-4">Registrar Usuario</h1>
                    <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                            <li class="breadcrumb-item active">Registrar Actividad</li>
                        </ol> -->

                    <!-- <div class="card mb-4">
                            <div class="card-body">
                                Chart.js is a third party plugin that is used to generate the charts in this template. The charts below have been customized - for further customization options, please visit the official
                                <a target="_blank" href="https://www.chartjs.org/docs/latest/">Chart.js documentation</a>
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Area Chart Example
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Pie Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                        </div> -->
                    <div class="row">
                        <div class="col-md-4">
                            <!-- ALERTA 1 -->
                            <?php if (isset($_SESSION['message']) && $_SESSION['message'] != '') {
                                $message = $_SESSION['message'];
                                $_SESSION['message'] = '';
                            ?>
                                <div class="alert alert-<?php echo $_SESSION['message_type'] ?> alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <?= $message ?>
                                </div>
                            <?php }  ?>
                            <!-- ALERTA 2 -->
                            <?php if (isset($_SESSION['message2']) && $_SESSION['message2'] != '') {
                                $message = $_SESSION['message2'];
                                $_SESSION['message2'] = '';
                            ?>
                                <div class="alert alert-<?php echo $_SESSION['message_type2'] ?> alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <?= $message ?>
                                </div>
                            <?php }  ?>
                            <div class="card card-body p-2 text-white bg-dark bg-opacity-75 mb-3">
                                <form class="was-validated" action="guardar_usuario.php" method="POST">
                                    <div class="form-row mt-2">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" id="nombre" required name="nombre" class="form-control is-invalid" placeholder="Ingrese el nombre de usuario" autofocus>
                                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="apellido">Apellido</label>
                                        <input type="text" id="apellido" required name="apellido" class="form-control" placeholder="Ingrese el apellido">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="email">Email</label>
                                        <input type="emai" id="email" required name="email" value="" class="form-control" placeholder="Ingrese el email">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="edad">Edad</label>
                                        <input type="text" id="edad" required name="edad" class="form-control" placeholder="Ingrese la edad">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="rol">Rol</label>
                                        <select name="id_rol" id="rol" required class="form-select" aria-label="Default select example">
                                            <option value="">Seleccione el rol</option>
                                            <?php
                                            $records = $conn->prepare('SELECT * FROM roles');
                                            $records->execute();
                                            $resultado = $records->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($resultado as $row) { ?>
                                                <option value="<?php echo $row['id_rol'] ?>"><?php echo $row['nombre_rol'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="id_ciudad">Ciudad</label>
                                        <select name="id_ciudad" id="id_ciudad" required class="form-select" aria-label="Default select example">
                                            <option value="">Seleccione la ciudad</option>
                                            <?php
                                            $records = $conn->prepare('SELECT * FROM ciudades');
                                            $records->execute();
                                            $resultado = $records->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($resultado as $row) { ?>
                                                <option value="<?php echo $row['id_ciudad'] ?>"><?php echo $row['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="id_municipio">Municipio</label>
                                        <select name="id_municipio" id="id_municipio" required class="form-select" aria-label="Default select example">
                                            <option value="">Seleccione el municipio</option>


                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Constraseña</label>
                                        <input type="password" id="password" required name="password" class="form-control" placeholder="Ingrese la contraseña">
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-outline-primary" id="guardar_usuario" require name="guardar_Usuario">Guardar Usuario</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>Edad</th>
                                        <th>Ciudad</th>
                                        <th>Rol del Usuario</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyId">

                                </tbody>
                                <tbody id="bodyId2">
                                    <?php
                                    $usuario = $_SESSION['user_id'];
                                    $records = $conn->prepare('SELECT id_usuario, usuarios.nombre, ciudades.nombre as nombre_ciudad, apellido, email, edad, usuarios.id_ciudad, usuarios.id_rol, nombre_rol FROM usuarios LEFT JOIN ciudades ON usuarios.id_ciudad=ciudades.id_ciudad LEFT JOIN roles ON usuarios.id_rol=roles.id_rol');
                                    //$records->bindParam(':usuario', $usuario);
                                    $records->execute();
                                    $results = $records->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($results as $row) { ?>
                                        <tr>
                                            <td><?php echo $row['nombre'] ?></td>
                                            <td><?php echo $row['apellido'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['edad'] ?></td>
                                            <td><?php echo $row['nombre_ciudad'] ?></td>
                                            <td><?php echo $row['nombre_rol'] ?></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a class="btn btn-outline-success" href="editar_usuario.php?id=<?php echo $row['id_usuario'] ?>">Editar<i class="fa-address-card-o"></i></a>
                                                    <a class="btn btn-outline-danger" href="eliminar_usuario.php?id=<?php echo $row['id_usuario'] ?>">Eliminar</a>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php  } ?>
                                </tbody>
                            </table>
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
    <script src="js/app.js"></script>
    <!--<script src="js/validacion.js"></script>-->
</body>

</html>