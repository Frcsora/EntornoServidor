<?php
    require("connection.php");
    header('Content-type: application/json');
    $datos = json_decode(file_get_contents("php://input"));
    $id = $datos->ultimaID;
    $conn = conectarBBDD();
    $result = selectMensajes($conn, $id);
    echo json_encode($result);
    header("location:logout.php");