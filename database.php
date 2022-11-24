<?php
    session_start();

    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'db_prueba_one';

    try {
        $conn = new PDO("mysql:host=$server; dbname=$database;", $username, $password);
    }catch(PDOException $e){
        die('Conexion fallida: ' .$e->getMessage());

    }

?>