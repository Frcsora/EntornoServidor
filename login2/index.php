<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    require_once "connection.php";
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

        echo getFullName(conectarBBDD(), $_SESSION["usuario"]) . " ya esta logeado <br>
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
                  <input type='text' name='nombre' placeholder='Nombre' required><br><br>
                  <label for='apellido1'>Apellido 1:</label>
                  <input type='text' name='apellido1' placeholder='Apellido 1' required><br><br>
                  <label for='apellido2'>Apellido 2:</label>
                  <input type='text' name='apellido2' placeholder='Apellido 2' required><br><br>
                  <label for='username'>Username:</label>
                  <input type='text' name='username' placeholder='username' pattern='^[^ ]+$' title='El usuario no puede contener espacios' required><br><br>
                  <label for='pass'>Password: </label>
                  <input type='password' name='pass' placeholder='Password' pattern='(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*\W).{6,14}' title='Debe tener una mayúscula, una minúscula, un número y un caracter especial' required><br><br>
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
            </form><br><br>
            <form method='POST' action='Actividad18.php'>
                <input type='text' name='buscador'>
                <input type='submit' value='Buscar usuario'>
            </form>";
            if(isset($_COOKIE["timeoutFinalizado"])){
                echo "<p>Se cerró la cuenta por inactividad. Por favor introduzca de nuevo sus credenciales.</p>";
            }elseif(isset($_COOKIE["cerrar"])){
                setcookie("cerrar", 1, time() - 60 * 10);
                echo "<p>Se cerró la sesión correctamente</p>";
            }elseif(isset($_COOKIE["incorrecto"])){
                setcookie("incorrecto", 1, time() - 60 * 10, "/");
                session_unset();
                session_destroy();
                echo "<p>Autentificación no realizada con éxito</p>";
            }elseif(isset($_COOKIE["registromal"])){
                setcookie("registromal", 1, time() - (86400 * 30), "/");
                echo "<p>Error en el registro, por favor, vuelva a intentarlo</p>";
            }elseif(isset($_COOKIE["registrobien"])){
                setcookie("registrobien", 1, time() - (86400 * 30), "/");
                echo "<p>Registro Exitoso</p>";
            }elseif(isset($_COOKIE["yaregistrado"])){
                setcookie("yaregistrado", 1, time() - (86400 * 30), "/");
                echo "<p>El nombre de usuario no está disponible</p>";
            }elseif(isset($_COOKIE["recuperacionmal"])){
                setcookie("recuperacionmal",1, time() - (86400 * 30), "/");

                echo "<p>Contraseña incorrecta, no se pudo recuperar la cuenta</p>";
            }
    }
    if(isset($_COOKIE["timeoutFinalizado"])){
        setcookie("timeoutFinalizado", 1, time() - 60 * 60);
    }
    ?>
</body>
</html>
