<?php
require_once "connection.php";
header('Content-type: application/json');
$datos = json_decode(file_get_contents("php://input"));
$usuario = $datos->usuario;
$mensaje = $datos->mensaje;
$conn = conectarBBDD();
guardarMensaje($conn, $usuario, $mensaje);
header("location:logout.php");
