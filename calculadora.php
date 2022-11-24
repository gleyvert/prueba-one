<?php require('database.php') ?>

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
                        <h1 class="mt-4">Registros</h1>
                      
                        <div class="row">
                              
                            <div class="col-md-11">
                            <?php if(isset($_SESSION['result']) && $_SESSION['result'] != '') {
                                    $result = $_SESSION['result'];
                                    $_SESSION['result'] = '';
                                ?>
                                    <div class="col-md-3 alert alert-<?php echo $_SESSION['result_type']?> alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <?= $result ?>
                                    </div>
                                    <?php }  ?>
                                <form action="calcular.php" method="GET">
                                <div class="form-group">
                                    <input type="text" name="numero1" required>
                                </div>
                                <div class="form-group col-md-3">

                                 </div>
                                <div class="form-group">
                                    <input type="text" name="numero2" required>
                                </div>
                                <button class="btn btn-success" name="+">
                                    Sumar
                                </button>
                                <button class="btn btn-success" name="-">
                                    Restar
                                </button>
                                <button class="btn btn-success" name="*">
                                    Multiplicar
                                </button>
                                <button class="btn btn-success" name="/">
                                    Dividir
                                </button>
                                </form>
                                <div class="col-md-3">
                                
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
