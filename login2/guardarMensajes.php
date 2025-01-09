<?php
if($_SERVER['REQUEST_METHOD'] !== "POST"){
    header('location:logout.php');
    exit;
}
require_once "connection.php";
header('Content-type: application/json');
$datos = json_decode(file_get_contents("php://input"));
$usuario = $datos->usuario;
$mensaje = $datos->mensaje;
$conn = conectarBBDD();
guardarMensaje($conn, $usuario, $mensaje);
echo json_encode("Mensaje introducido con éxito");