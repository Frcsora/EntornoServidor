<?php
    session_start();
    $users = ["francesc"=>"1234", "tomeu"=>"1234", "alan"=>"1234", "rafel"=>"1234", "ana"=>"1234"];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $usuario ="";
        $pass = "";
        if(!isset($_SESSION["usuario"])){
            $usuario = $_POST["usuario"];
            $pass = $_POST["pass"];
        }else{
            $usuario = $_SESSION["usuario"];
            $pass = $_SESSION["pass"];
        }

        if($users[$usuario] === $pass){
            $_SESSION["usuario"] = $usuario;
            $_SESSION["pass"] = $pass;
            header("Location: intranet.php");
        }else{
            setcookie("incorrecto", 1, time() + (86400 * 30), "/");
            header("Location: logout.php");
        }
    }else{
        header("Location: logout.php");
    }



