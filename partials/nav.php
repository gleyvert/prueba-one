<?php 


echo $_SESSION['user_id']; 



?>


<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="./index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-biohazard"></i></div>
                                Inicio
                            </a>  
                            <a class="nav-link" href="./registrar_actividad.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-broom"></i></div>
                                Registrar actividad
                            </a> 
                           
                            <?php 
                                require 'roles.php';
                                if($id_rol == 3) { ?>
                            <a class="nav-link" href="./registrar_usuario.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-broom"></i></div>
                                Registrar Usuario 
                            </a>
                               <?php } ?>
                            <a class="nav-link" href="./charts.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Graficos de actividades
                            </a>
                            <a class="nav-link" href="tabla_registros.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Registros
                            </a>
                            <a class="nav-link" href="calculadora.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Calculo
                            </a>
                            <a class="nav-link" href="./logout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Salir
                            </a>  
                        </div>
                    </div>
                </nav>
            </div>