<?php

    require('database.php');

 if(isset($_GET)){
    $numero1 = $_GET['numero1'];
    $numero2 = $_GET['numero2'];
    
    if(isset($_GET['+'])){
    
        $result = $numero1 + $numero2;
    } 

    if(isset($_GET['-'])){
        $result = $numero1 - $numero2;
    }

    if(isset($_GET['*'])){
        $result = $numero1 * $numero2;
    }

    if(isset($_GET['/'])){
        $result = $numero1 / $numero2;
    }
    
    $_SESSION['result']=$result;
    $_SESSION['result_type']='success';
    header('Location: calculadora.php');


echo $result;

 }

?>