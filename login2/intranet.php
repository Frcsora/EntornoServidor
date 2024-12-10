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
    if(isset($_POST["change"])){
        echo "<form method='POST' action='disable.php'>
                <label>Nueva contraseña: </label>
                <input type='password' name='passchange' placeholder='Password' pattern='(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*\W).{6,14}' title='Debe tener una mayúscula, una minúscula, un número y un caracter especial' required>
                <input type='submit' value='Cambiar contraseña'>
             </form>";
    }elseif($status === "alta"){
        echo "<p>Esta es la intranet de $usuario</p>";
        echo "<form method='POST' action='disable.php'>
                <input value='Darse de baja' name='baja' type='submit'>
              </form><br>
              <form method='POST' action='intranet.php'>
                <input type='submit' value='Cambiar contraseña' name='change'><br><br>
              </form>";
    }elseif(isset($_POST["dandoalta"])){
        echo "<form method='POST' action='disable.php'>
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