<?php
    header("Content-Type:application/json");

    if($_SERVER['REQUEST_METHOD'] !== 'DELETE'){
       http_response_code(405);
       echo json_encode(['error' => 'Solo método DELETE es permitido']);
       exit();

    }
   //conectar a la BD sakila
   require 'conexionSakila.php';

   $input = json_decode(file_get_contents('php://input'), true);
   $actor_id = intval($input["actor_id"]);

   $query = "DELETE FROM actor WHERE actor_id = ?";

   $st = $conn->prepare($query);
    if(!$st){
       http_response_code(500);
       echo json_encode(["error" => "Ocurrió un error en la consulta" . $conn->error()]);
       exit();
    }

    $st->bind_param("i", $actor_id);
    $st->execute();

    if($st->affected_rows > 0){
        echo json_encode(["mensaje" => "Actor eliminado con éxito"]);
    }else{
        http_response_code(404);
        echo json_encode(["error" => "No se encontró el actor con ID $actor_id"]);
    }
    $st->close();
    $conn->close();

    //9
?>