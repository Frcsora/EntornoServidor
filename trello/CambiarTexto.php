<?php
require_once 'connector.php';
$dataJSON = file_get_contents(('php://input'));
$data = json_decode($dataJSON, true);
$conn = new connector();
$conn ->cambiarTexto($conn -> connect(), $data);
//header('location: index.php');
