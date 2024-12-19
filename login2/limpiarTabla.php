<?php
    require_once "connection.php";
    $conn = conectarBBDD();
    truncateTable($conn);