<?php
    require_once "connection.php";
    session_start();
    //En la sesion ["usuario"] esta guardada la id del usuario en la base de datos
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
    $status = getStatus(conectarBBDD(), $_SESSION["usuario"]);
    $usuario = getFullName(conectarBBDD(), $_SESSION["usuario"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if($status === "alta"){
        echo "<p>Esta es la intranet de $usuario</p>";
        echo "<form method='POST' action='enabledisable.php'>
                <input value='Darse de baja' name='baja' type='submit'>
              </form><br>";
    }elseif(isset($_POST["dandoalta"])){
        echo "<form method='POST' action='enabledisable.php'>
                <label>Confirme su contraseña para recuperar su cuenta: </label>
                <input type='password' name='passalta' required><br>
                <input value='Recuperar cuenta' name='alta' type='submit'>
              </form>";
    }else{
        echo "<p>Este usuario se ha dado de baja</p>";
        echo "<form method='POST' action='intranet.php'>
                <input value='Darse de alta' name='dandoalta' type='submit'>
              </form><br>";
    }
?>
<?php
    if(!isset($_POST["dandoalta"])){ ?>
        <form action="logout.php" method="post">
            <input type="submit" name="logout" value="Cerrar sesion">
            <input type="submit" name="disconnect" value="Desconectar">
        </form>
<?php } ?>

</body>
</html>