<?php
require "User.php";
session_start();
//Si el metodo es post creamos un usuario con la informacion y lo añadimos al array de session de "user"
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $person = $_POST["person"];
    $key = $_POST["key"];
    //la contraseña la guardamos con un hash
    $user = new User($person, password_hash($key, PASSWORD_DEFAULT));
    $_SESSION['user'][] = $user;
    header("location:index.php");
}else{
    header("location: index.php");
}
