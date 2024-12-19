<?php

    if($_SERVER["REQUEST_METHOD"] == "POST" || isset($_COOKIE["registrobien"])){
        require_once "connection.php";
        session_start();
        $usuario ="";
        if(!isset($_SESSION["usuario"])){
            $usuario = getUserByName(conectarBBDD(), htmlspecialchars(trim(strtolower($_POST["usuario"]))));
        }else{
            $usuario = $_SESSION["usuario"];
        }

        if(getIfUserExists(conectarBBDD(), getUserFromID(conectarBBDD(), $usuario))){
            if(isset($_COOKIE["registrobien"]) || $_POST["entrar"] || password_verify(htmlspecialchars($_POST["pass"]), getPassword(conectarBBDD(), getUserFromID(conectarBBDD(), $usuario)))){
                $_SESSION["usuario"] = $usuario;
                header("location: intranet.php");
                exit;
            }else{
                setcookie("incorrecto", 1, time() + 60 * 10, "/");
            }
        }else{
            setcookie("incorrecto", 1, time() + 60 * 10, "/");
        }
    }
    echo $_SESSION["usuario"];
    header("Location: logout.php");


