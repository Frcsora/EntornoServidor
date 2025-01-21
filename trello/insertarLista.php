<?php
require_once 'connector.php';
$conn = new connector();
$data = json_encode($_POST);
$conn -> insertList($conn -> connect(), $data);
header("location:index.php");