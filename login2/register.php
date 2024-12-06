<?php
require_once 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nombre = !empty($_POST["nombre"]) ? $_POST["nombre"]: "";
    echo $nombre;
    $apellido1 = !empty($_POST["apellido"]) ? $_POST["apellido1"]: "";
    $apellido2 = !empty($_POST["apellido2"]) ? $_POST["apellido2"]: "";
    $nickname = !empty($_POST["nickname"]) ? $_POST["nickname"]: "";
    $pass = !empty($_POST["pass"]) ? password_hash($_POST["pass"], PASSWORD_DEFAULT) : "";

    /*if($nombre = "" || $apellido1 = "" || $nickname = "" || $pass = "" || $nickname = "") {
        header("location: logout.php");

    }else{
        insertarUsuario(conectarBBDD(), $nombre, $apellido1, $apellido2, $nickname, $pass);
        header("location: logout.php");
    }*/

}else{
    //header("location: logout.php");
}
