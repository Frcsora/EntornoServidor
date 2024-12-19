<?php
    if($_SERVER['REQUEST_METHOD'] !== "POST"){
        header('location:logout.php');
        exit;
    }
    session_start();
    header('Content-Type: application/json');
    echo json_encode($_SESSION["usuario"]);
    