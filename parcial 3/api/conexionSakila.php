<?php

    $host = '192.168.1.21';
    $user = 'sakila_user';
    $pass = 'sakila';
    $dbname = 'sakila';

    //Crear conexion
    $conn = new mysqli($host, $user, $pass, $dbname);

    //verificar conexion 
    if ($conn->connect_error) {
        http_response_code(500);
        echo json_encode(['error'=> 'Error de conexion' . $conn->connect_error]);
        exit;
    }
?>
