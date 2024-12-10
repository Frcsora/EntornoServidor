<?php

    if(isset($_POST["logout"])){
        session_start();
        setcookie("cerrar", 1, time() + 1);
        session_unset();
        session_destroy();

    }
    if(isset($_COOKIE["timeoutFinalizado"])){
        session_start();
        session_unset();
        session_destroy();
    }
    header("Location: index.php");