<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    session_start();
    if(!empty($_SESSION["usuario"])){
        $inactividad = 100;
        if(isset($_SESSION["timeout"])){
            $sessionTTL= time() - $_SESSION["timeout"];
            if($sessionTTL > $inactividad){
                setcookie("timeoutFinalizado", 1, time() + 60 * 10);
                header("Location: logout.php");
                exit;
            }
        }
        $_SESSION["timeout"] = time();

        echo "El usuario " . ucfirst(strtolower($_SESSION["usuario"])) . " ya esta logeado <br>
            <br>
            <form action='login.php' method='POST'>
                <input type='submit' name='entrar' value='Entrar'>
            </form><br>
            <form action='logout.php' method='post'>
                <input type='submit' name='logout' value='Cerrar Sesion'>
            </form>
            ";

    }elseif(isset($_POST["signin"])){
        echo "<form method='post' action='register.php'>
                  <label for='nombre'>Nombre:</label>
                  <input type='text' name='nombre' placeholder='Nombre'><br><br>
                  <label for='pass'>Password:</label>
                  <input type='password' name='pass' placeholder='Password'><br><br>
                  <label for='apellido1'>Apellido 1:</label>
                  <input type='text' name='apellido1' placeholder='Apellido 1'><br><br>
                  <label for='apellido2'>Apellido 2:</label>
                  <input type='text' name='apellido2' placeholder='Apellido 2'><br><br>
                  <label for='username'>Username:</label>
                  <input type='text' name='username' placeholder='username'><br><br>
                  <input type='submit' value='Entrar'>
              </form>";
    }else{
        echo "
            <form action='login.php' method='POST'>
                <label for='usuario'>User:</label>
                <input type='text' name='usuario' id='usuario'><br><br>
                <label for='pass'>Password:</label>
                <input type='password' name='pass' id='pass'><br><br>
                <input type='submit' value='Login'>
            </form><br><br>
            <form action='index.php' method='POST'>
                <input type='submit' name='signin' value='Registro'>
            </form>";
            if(isset($_COOKIE["timeoutFinalizado"])){
                echo "<p>Se cerró la cuenta por inactividad. Por favor introduzca de nuevo sus credenciales.</p>";
            }elseif(isset($_COOKIE["cerrar"])){
                setcookie("cerrar", 1, time() - 60 * 10);
                echo "<p>Se cerró la sesión correctamente</p>";
            }elseif(isset($_COOKIE["incorrecto"])){
                setcookie("incorrecto", 1, time() - 60 * 10, "/");
                echo "<p>Autentificación no realizada con exito</p>";
            }
    }
    if(isset($_COOKIE["timeoutFinalizado"])){
        setcookie("timeoutFinalizado", 1, time() - 60 * 60);
    }
    ?>
</body>
</html>
