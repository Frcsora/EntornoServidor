<?php
    session_start();
    $usuario = ucfirst($_SESSION['usuario']);
    $inactividad = 2;
    if(isset($_SESSION["timeout"])){
        $sessionTTL= time() - $_SESSION["timeout"];
        if($sessionTTL > $inactividad){
            session_unset();
            session_destroy();
            header("Location: logout.php");
        }
    }
    $_SESSION["timeout"] = time();
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
    <input type="submit" value="Cerrar sesion">
</form>
</body>
</html>