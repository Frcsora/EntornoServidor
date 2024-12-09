<?php

    if(isset($_POST["logout"])
    || isset($_SESSION["timeout"])){
        session_start();
        setcookie("cerrar", 1, time() + 1);
        session_unset();
        session_destroy();

    }
    header("Location: index.php");