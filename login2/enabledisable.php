<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    require_once "connection.php";
    if(isset($_POST["baja"])){
        darseDeBaja(conectarBBDD(), $_SESSION["usuario"]);
        session_unset();
        session_destroy();
    }
    if(isset($_POST["passalta"])){
        if(password_verify(htmlspecialchars($_POST["passalta"]), getPassword(conectarBBDD(), getUserFromID(conectarBBDD(), $_SESSION["usuario"])))){
            darseDeAlta(conectarBBDD(), $_SESSION["usuario"]);
            header("location:intranet.php");
            exit;
        }else{
            setcookie("recuperacionmal",1, time() + (86400 * 30), "/");
            session_unset();
            session_destroy();
        }

    }
}
header("location:logout.php");