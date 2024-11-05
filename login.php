<?php
    session_start();
    $users = ["francesc", "tomeu", "alan", "rafel", "ana"];
    $passwords =["1234"];

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $usuario ="";
        $pass = "";
        if(isset($_POST["usuario"])){
            $usuario = $_POST["usuario"];
            $pass = $_POST["pass"];
        }else{
            $usuario = $_SESSION["usuario"];
            $pass = $_SESSION["pass"];
        }
        if(in_array(strtolower($usuario), $users) && in_array($pass, $passwords)){
            $_SESSION["usuario"] = $usuario;
            $_SESSION["pass"] = $pass;
            header("Location: intranet.php");
        }else{
            header("Location: logout.php");
        }
    }else{
        header("Location: logout.php");
    }



