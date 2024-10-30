<?php
    session_start();
    $count = isset($_SESSION["cookieCount"]) ? $_SESSION["cookieCount"] : 0;
    $count++;
    $_SESSION["cookieCount"] = $count;
    if(isset($_SESSION["cookieCount"]) &&
    $_SESSION["cookieCount"] >= 50){
        setcookie("cookieCount", $count, time() - (86400 * 30), "/");
        session_unset();
        session_destroy();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>title</title>
</head>
<body>
    <p>Has entrado <?php echo $count?> veces</p>
</body>
</html>