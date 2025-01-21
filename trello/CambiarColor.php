<?php
require_once 'connector.php';
$dataJSON = file_get_contents(('php://input'));
$data = json_decode($dataJSON, true);
$conn = new connector();
$data["queCambiar"] ? $conn->actualizarColor($conn->connect(), $data) : $conn->actualizarColor($conn->connect(), $data, false);
