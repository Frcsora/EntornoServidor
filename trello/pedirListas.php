<?php
require_once 'connector.php';
$conn = new connector();
$_SESSION['listas'] = $conn -> selectList();
