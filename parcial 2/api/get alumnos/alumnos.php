<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $usuario=[
        ["id" => 1, "nombre" => " leon", "correo" => "@gmail.com"],
        ["id" => 1, "nombre" => "nunez soto", "correo" => "nosuvogordas666@gmail.com"],
        ["id" => 1, "nombre" => "venom snake", "correo" => "venom@gmail.com"],
    ];

    echo json_encode($usuarios);

?>
