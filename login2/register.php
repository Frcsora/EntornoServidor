<?php
require_once 'connection.php';
//Aquí dentro recojo la información del formulario de registro y hago el insert
if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    foreach ($_POST as $key => $value) {
        if(empty($value)){
            setcookie("registromal", 1, time() + (86400 * 30), "/");
            header("location: logout.php");
            exit;
        }
        if($key = "username" && getIfUserExists(conectarBBDD(), $_POST["username"])){
            setcookie("yaregistrado", 1, time() + (86400 * 30), "/");
            header("location: logout.php");
            exit;
        }
    }
    $nombre =  htmlspecialchars(strtolower(trim($_POST["nombre"])));
    $apellido1 = htmlspecialchars(strtolower(trim($_POST["apellido1"])));
    $apellido2 = htmlspecialchars(strtolower(trim($_POST["apellido2"])));
    $username = htmlspecialchars(strtolower(trim($_POST["username"])));
    $pass = password_hash(htmlspecialchars($_POST["pass"]), PASSWORD_BCRYPT);
    echo "nombre: " . $nombre . "<br>";
    echo "apellido1: " . $apellido1 . "<br>";
    echo "apellido2: " . $apellido2 . "<br>";
    echo "username: " . $username . "<br>";
    echo $pass;
    insertarUsuario(conectarBBDD(), $nombre, $apellido1, $apellido2, $username, $pass);
    setcookie("registrobien", 1, time() + (86400 * 30), "/");
    $_SESSION["usuario"] = getUserByName(conectarBBDD(), $username);
}
header("location: login.php");
