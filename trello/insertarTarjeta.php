<?php
session_start();
require_once 'connector.php';
$data = file_get_contents("php://input");
$request = json_decode($data, true);
$conn = new connector();
$id = $conn -> ultimatarjetalista($request['id_lista']);
$id = (int) $id;
$id += 2;
$conn->insertarTarjeta($conn->connect(), $request, $id);
