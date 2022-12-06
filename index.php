<?php

require 'database.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id_usuario, nombre, apellido, email,edad, password FROM usuarios WHERE id_usuario=:id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;
    if (count($results) > 0) {
        $user = $results;
    }
}

?>

<?php if (!empty($user)) : ?>
    <?php require 'partials/header.php'; ?>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Registros</h1>
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

            <div class="col-md-11">
                <table id="tabla-ajax" class="table table-striped table-bordered" style="width:100%">
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
                    <!--
                                        <tbody id="tabla-php">
                                        <?php
                                        // $usuario = $_SESSION['user_id'];
                                        //$records = $conn->prepare('SELECT nombre, descripcion, id_tarea, creado_en FROM tareas WHERE id_usuario=:usuario ');
                                        // $records->bindParam(':usuario', $usuario);
                                        // $records->execute();
                                        // $results = $records->fetchAll(PDO::FETCH_ASSOC);

                                        //foreach($results as $row){ 
                                        ?>
                                                <tr>
                                                    <td><?php //echo $row['nombre'] 
                                                        ?></td>
                                                    <td><?php //echo $row['descripcion'] 
                                                        ?></td>
                                                    <td><?php //echo $row['creado_en'] 
                                                        ?></td>
                                                    <td>
                                                        <a href="editar.php?id=<?php //echo $row['id_tarea'] 
                                                                                ?>">Editar<i class="fa-address-card-o"></i></a>
                                                        <a href="eliminar.php?id=<?php //echo $row['id_tarea'] 
                                                                                    ?>">Eliminar</a>
                                                    </td>
                                                </tr>

                                          <?php // } 
                                            ?>
                                    </tbody>
                                   */ -->
                </table>

            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Launch demo modal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
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
                                    <div class="form-group">
                                        <label for="">Nombre de tarea</label>
                                        <input type="text" id="nombre_tarea" value="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Descripcion de tarea</label>
                                        <input type="text" id="descripcion_tarea" value="" class="form-control">
                                    </div>
                                    <div class="form-group mt-2">
                                            <select name="id_status" id="option" required class="form-select" aria-label="Default select example">
                                            <option  value="">Seleccione el status</option>
                                            <?php
                                                $records = $conn->prepare('SELECT * FROM status_tareas');
                                                $records->execute();
                                                $resultado = $records->fetchAll(PDO::FETCH_ASSOC);

                                                foreach($resultado as $row){ ?>
                                                <option  value="<?php echo $row['id_status'] ?>"><?php echo $row['nombre'] ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="guardarTarea()">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require 'partials/footer2.php'; ?>
<?php else : ?>
    <?php require 'partials/body.php';
    ?>
<?php endif; ?>