<?php
    if(isset($_POST["logout"])){
        session_destroy();
        header("Location: index.php");
    }else{
        header("Location: index.php");
    }

