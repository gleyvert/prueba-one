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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

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
                    <h1 class="mt-4">Registrar Ciudades</h1>
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
                                <form class="needs-validation" novalidate action="guardar_ciudad.php" method="POST">
                                    <div class="form-group bg-primary bg-opacity-25 mt-2 border border-primary rounded">
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
                                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                                        <div class="mt-3">
                                            <div class="">
                                                <button type="button" class="btn btn-outline-success btn-block" id="guardar_usuario" require name="" data-toggle="modal" data-target="#ModalAgregarCiudad">agregar ciudad</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group bg-success bg-opacity-25 mt-2 border border-success rounded">
                                        <label for="id_municipio">Municipio</label>
                                        <select name="id_municipio" id="id_municipio" required class="form-select" aria-label="Default select example">
                                            <option value="">Seleccione el municipio</option>


                                        </select>
                                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                                        <div class="mt-3">
                                            <div class="">
                                                <button type="button" class="btn btn-outline-dark btn-block" id="guardar_usuario" require name="" data-toggle="modal" data-target="#ModalAgregarMunicipio">agregar Municipio</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <table id="tabla-ciudades" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Fecha de Creacion</th>
                                        <th>Estatus</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla-tr">
                                    
                                </tbody>
                              
                            </table>

                        </div>
                    </div>
                </div>
            </main>
            <!-- Modal Agregar ciudad-->
            <div class="modal fade" id="ModalAgregarCiudad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar ciudad</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="">
                                <form id="form-ciudades" class="form">
                                    <div class="form-group">
                                        <input type="hidden" id="id_tarea">
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre_ciudad">Ciudad</label>
                                        <input type="text" id="nombre_ciudad" value="" class="form-control">
                                    </div>
                                    <div class="form-group">

                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" id="button" class="btn btn-primary">Guardar Ciudad</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Agregar Municipio-->
            <div class="modal fade" id="ModalAgregarMunicipio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Municipio</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="">
                                <form class="form">
                                    <div class="form-group">
                                        <input type="hidden" id="id_tarea">
                                    </div>
                                    <div id="divSelect" class="form-group mt-2">
                                        <label for="id_ciudad2">Ciudad</label>
                                        <select name="id_ciudad" id="id_ciudad2" required class="form-select" aria-label="Default select example">
                                            <option value="">Seleccione la ciudad</option>
                                            <?php
                                            $records = $conn->prepare('SELECT * FROM ciudades');
                                            $records->execute();
                                            $resultado = $records->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($resultado as $row) { ?>
                                                <option value="<?php echo $row['id_ciudad'] ?>"><?php echo $row['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="invalid-feedback">Ingrese la ciudad primero para agregar municipio</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Municipio</label>
                                        <input type="text" id="nombre_municipio" value="" class="form-control">
                                        <div class="invalid-feedback">Ingrese municipio</div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" id="button2" class="btn btn-primary">Guardar Municipio</button>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/scripts2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="assets/demo/chart-pie-demo.js"></script>
    <script src="./vendor/sweetAlert2/sweetalert2.all.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/validacion.js"></script>
    <script src="js/ciudades.js"></script>
</body>

</html>