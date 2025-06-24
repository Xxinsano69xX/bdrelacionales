<?php
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        http_response_code(405);
        echo json_encode(['error' => 'Solo metodo POST es permitido']);
    }



    require 'conexion_cod_zombies.php';

    $data = json_decode(file_get_contents('php://input'), true);
    $Zombies_tipo = $data['Zombies_tipo'];
    $Damage = intval($data['Damage']);
    $Damage_type = $data['Damage_type'];
    $Salud = intval($data['Salud']);
    $Velocidad = intval($data['Velocidad']);

    $query = $conn->prepare("INSERT INTO zombies (Zombies_tipo, Damage, Damage_type, Salud, Velocidad) VALUES (?, ?, ?, ?, ?)");

    if(!$query){
        http_response_code(500);
        echo json_encode(["error" => "Ocurrio un error"]);
        exit;
    }

    $query->bind_param("sisii", $Zombies_tipo, $Damage, $Damage_type, $Salud, $Velocidad);

    if($query->execute()){
        echo json_encode(["mensaje" => "Dato insertado correctamente", "id" => $query->id]);
    } else{
        http_response_code(500);
        echo json_encode(["error" => "Fallo la insercion" . $query->error]);
    }
    $query->close();
    $conn->close();

?>