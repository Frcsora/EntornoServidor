<?php
    session_start();
    $inactividad = 10;
    if(isset($_SESSION["timeout"])){
        $sessionTTL= time() - $_SESSION["timeout"];
        if($sessionTTL > $inactividad){
            setcookie("timeoutFinalizado", 1, time() + 60 * 10);
            header("Location: logout.php");
            exit;
        }
    }
    $_SESSION["timeout"] = time();
    $usuario = ucfirst(strtolower($_SESSION["usuario"]));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p><?php echo "Esta es la intranet de $usuario" ?></p>
<form action="logout.php" method="post">
    <input type="submit" name="logout" value="Cerrar sesion">
    <input type="submit" name="disconnect" value="Desconectar">
</form>
</body>
</html>