<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $usuarios=[
        ["id" => 1, "nombre" => "Juan Lopez", "correo" => "juan@gmail.com"],
        ["id" => 1, "nombre" => "Ana Garcia", "correo" => "ana@gmail.com"],
        ["id" => 1, "nombre" => "Luis Martinez", "correo" => "luis@gmail.com"],
    ];

    echo json_encode($usuarios);
    //22
?>