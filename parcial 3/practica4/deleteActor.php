<?php
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] !== 'DELETE'){
        http_response_code(405);
        echo json_encode(['error' => 'Solo metodo DELETE es permitido']);
    }

    require 'conexionSakila.php';

    $input = json_decode(file_get_contents('php://input'), true);   
    $actor_id = intval($input["actor_id"]);

    $query = "DELETE FROM actor WHERE actor_id =?";

    $st = $conn->prepare($query);
    
    if(!$st){
        http_response_code(500);
        echo json_encode(["error" => "Error en la consulta" - $conn->error]);
        exit();
    }
    
    $st->bind_param("i", $actor_id);
    $st->execute();

    if($st->affected_rows > 0){
        echo json_encode(["message" => "Actor eliminado correctamente"]);
    }else{
        http_response_code(404);
        echo json_encode(["error" => "No se encontro el actor con id: $actor_id"]);
    }
    $st->close();
?>