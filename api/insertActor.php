<?php
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        http_response_code(405);
        echo json_encode(['error'=> 'Solo metodo POST es permitido']);
    }

    //conectar a la BD sakila 
    require 'conexionSakila.php';

    $data = json_decode(file_get_contents('php://imput'), true);
    $first_name = $data['first_name'];
    $last_name = $data['last_name'];

    $quary = $mysqli ->prepare("INSERT INTO actor (first_name, last_name) VALUES (?, ?)");

    if($quary){
        http_response_code(500);
        echo json_encode(["error" => "Ocurrio un error"]);
        exit;
    }

    $quary->bind_param('s', $first_name, $last_name);

    if($quary->execute()){
        echo json_encode(["mensaje" => "Actor insertado correctamente", "actor_id" => $quary->actor_id]);
    }else{}
        http_response_code(500);
        echo json_encode(["error" => "Fallo la insersion" . $quary->error]);
    

    $quary -> close();
    $mysql -> close();
?>
