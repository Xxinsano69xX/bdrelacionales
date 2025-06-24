<?php
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] !== 'PUT'){
        http_response_code(405);
        echo json_encode(['error' => 'Solo metodo PUT es permitido']);
    }

    require 'conexion_cod_zombies.php';

    $input = json_decode(file_get_contents('php://input'), true);   
    $id = intval($input["id"]);
    $Zombies_tipo = $conn->real_escape_string($input['Zombies_tipo']);
    $Damage = intval($input['Damage']);
    $Damage_type = $conn->real_escape_string($input['Damage_type']);
    $Salud = intval($input['Salud']);
    $Velocidad = intval($input['Velocidad']);

    $query = "UPDATE zombies SET Zombies_tipo = ?, Damage = ?, Damage_type = ?, Salud = ?, Velocidad = ?, last_update = NOW() WHERE id = ?";

    $st = $conn->prepare($query);

    if(!$st){
        http_response_code(500);
        echo json_encode(["error" => "Error en la consulta" - $conn->error]);
        exit();
    }
    
    $st->bind_param("sisiii", $Zombies_tipo, $Damage, $Damage_type, $Salud, $Velocidad, $id);

    if($st->execute()){
        if($st->affected_rows > 0){
            echo json_encode(["message" => "id actualizado correctamente"]);
        }else{
            http_response_code(500);
            echo json_encode(["error" => "No se encontro el zombie con id: $id"]);
        }
    }else{
        http_response_code(500);
        echo json_encode(["error" => "ERROR al ejecutar" - $st->error]);
    }
    $st->close();
?>