<?php
require_once 'connector.php';
$dataJSON = file_get_contents(('php://input'));
$data = json_decode($dataJSON, true);
$conn = new connector();
foreach ($data as $key => $value) {
    echo $key.": ".$value."<br>";
}
$conn->actualizarPosicion($conn->connect(), $data);
