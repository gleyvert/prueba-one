<?php 
    require('database.php');
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM tareas WHERE id_tarea=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);

        $actividad = null;

        if(count($results) > 0){
            $actividad = $results;
            $nombre= $actividad['nombre'];
            $descripcion = $actividad['descripcion'];
            $id_actividad = $actividad['id_tarea'];
            $status_tarea = $actividad['id_status'];
        }

        if(isset($_POST['guardar_tarea'])){
            $id = $_GET['id'];
            $nombre_post = $_POST['nombre_a'];
            $descripcion_post = $_POST['descripcion_a'];
            $status_tarea_post = $_POST['id_status'];
            echo $descripcion_post."yes";

            $sql = "UPDATE tareas SET nombre= :nombre, descripcion=:descripcion, id_status=:id_status WHERE id_tarea=:id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nombre', $nombre_post);
            $stmt->bindParam(':descripcion', $descripcion_post);
            $stmt->bindParam(':id_status', $status_tarea_post);

            $message = '';

            if($stmt->execute()){
                $message = 'la actividad se ha actualizado';
            }else{
                $message = 'hubo un error al actualizar';
            }

            $_SESSION['message'] = $message;
            $_SESSION['message_type']='success';
            header('Location: registrar_actividad.php');

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
                <h1 class="mt-4">Editar Actividad</h1>
                <div class="row">
                            <div class="col-md-4">
                                <div class="card card-body bg-success p-2 bg-opacity-50" >
                                    <form action="editar.php?id=<?php echo $id_actividad ?>" method="POST">
                                        <div class="form-group mt-2">
                                            <input type="text" name="nombre_a" class="form-control" value="<?php echo $nombre ?>" placeholder="Ingrese el nombre de la actividad" autofocus>
                                        </div>
                                        <div class="form-group mt-2">
                                            <textarea name="descripcion_a" rows="2" class="form-control" placeholder="Ingrese la descripcion de la actividad"><?php echo $descripcion ?></textarea>
                                        </div>
                                        <div class="form-group mt-2">
                                            <select name="id_status" required class="form-select" aria-label="Default select example">
                                            <option value="">Seleccione el status</option>
                                            <?php
                                                $records = $conn->prepare('SELECT * FROM status_tareas');
                                                $records->execute();
                                                $resultado = $records->fetchAll(PDO::FETCH_ASSOC);

                                                foreach($resultado as $row){ ?>
                                                <option value="<?php echo $row['id_status'] ?>" <?php if($row['id_status'] == $status_tarea) echo 'selected' ?>><?php echo $row['nombre'] ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="d-grid gap-2">
                                             <button class="btn btn-success mt-2" name="guardar_tarea">Actualizar</button>
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
