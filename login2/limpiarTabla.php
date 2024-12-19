<?php
    require_once "connection.php";
    $conn = conectarBBDD();
    truncateTable($conn);
    header("location:logout.php");