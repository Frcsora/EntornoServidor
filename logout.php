<?php
    session_start();
    if(isset($_POST["logout"])
    || isset($_SESSION["timeout"]) && !isset($_POST["disconnect"])){
        session_unset();
        session_destroy();
        header("Location: index.php");
    }else{
        header("Location: index.php");
    }
