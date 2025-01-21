<?php
require_once 'connector.php';
$dataJSON = file_get_contents(('php://input'));
$data = json_decode($dataJSON, true);
$conn = new connector();
$conn->actualizarListaActual($conn->connect(), $data);

//header('location: index.php');