<?php
    session_start();
    $users = ["francesc", "tomeu", "alan", "rafel", "ana"];
    $passwords =["1234"];

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $usuario ="";
        $pass = "";
        if(!empty($_SESSION["usuario"])){
            $usuario = $_SESSION["usuario"];
            $pass = $_SESSION["pass"];
        }else{
            $usuario = $_POST["usuario"];
            $pass = $_POST["pass"];
            $_SESSION["usuario"] = $usuario;
            $_SESSION["pass"] = $pass;
        }

        if(in_array(strtolower($usuario), $users) && in_array($pass, $passwords)){
            header("Location: intranet.php");
        }else{
            header("Location: index.php");
        }
    }else{
        header("Location: index.php");
    }



