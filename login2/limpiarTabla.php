<?php
    require_once "connection.php";
    header('Content-type: application/json');
    $conn = conectarBBDD();
    truncateTable($conn);
