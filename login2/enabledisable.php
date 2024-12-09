<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    require_once "connection.php";
    if(isset($_POST["baja"])){
        //Caso darse de baja
        darseDeBaja(conectarBBDD(), $_SESSION["usuario"]);
        session_unset();
        session_destroy();
    }elseif(isset($_POST["passalta"])){
        if(password_verify(htmlspecialchars($_POST["passalta"]), getPassword(conectarBBDD(), getUserFromID(conectarBBDD(), $_SESSION["usuario"])))){
            //Caso recuprar cuenta bien
            darseDeAlta(conectarBBDD(), $_SESSION["usuario"]);
            header("location:intranet.php");
            exit;
        }else{
            //Caso recuperar cuenta mal
            setcookie("recuperacionmal",1, time() + (86400 * 30), "/");
            session_unset();
            session_destroy();
        }
    }elseif(isset($_POST["passchange"])){
        //Caso cambiar password
        cambiarPassword(conectarBBDD(), $_SESSION["usuario"], password_hash($_POST["passchange"], PASSWORD_DEFAULT));
    }
}
header("location:logout.php");
