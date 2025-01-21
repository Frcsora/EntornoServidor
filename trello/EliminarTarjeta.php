<?php
require_once 'connector.php';
$dataJSON = file_get_contents(('php://input'));
$id = json_decode($dataJSON, true);
$conn = new connector();
$conn -> deleteTarjeta($conn -> connect(), $id);
//header('location: index.php');