<?php
    if($_SERVER['REQUEST_METHOD'] !== "POST"){
        header('location:logout.php');
        exit;
    }
    require_once "connection.php";
    header('Content-type: application/json');
    $conn = conectarBBDD();
    truncateTable($conn);
