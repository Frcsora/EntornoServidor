<?php
require "User.php";
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_POST['person'];
    $pass = $_POST['key'];
    //comprobamos si en la session de usuarios esta el nuestro
    foreach($_SESSION["user"] as $value){
        if($value instanceof User &&//verificamos que sea un usuario
            $value -> getUserName() == $user &&//que el nombre sea el mismo
            password_verify($pass, $value -> getPassword())){//que el hash de la contraseña sea correcto
            $_SESSION["loggedin"] = $value;
            header("location: index.php");
            exit;
        }
    }
}
header("location: index.php");
