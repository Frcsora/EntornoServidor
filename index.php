<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="login.php" method="post">
    <?php
    session_start();
    if(!empty($_SESSION['usuario'])){
        echo "El usuario $_SESSION[usuario] ya esta logeado <br>
            <form action='login.php' method='post'>
                <input type='submit' name='entrar' value='Entrar'>
            </form>
            <form action='logout.php' method='post'>
                <input type='submit' name='logout' value='Cerrar Sesion'>
            </form>
            ";
    }else{
        echo "
            <label for=\"usuario\">User:</label>
            <input type=\"text\" name=\"usuario\" id=\"usuario\"><br><br>
            <label for=\"pass\">Password:</label>
            <input type=\"password\" name=\"pass\" id=\"pass\"><br><br>
            <input type=\"submit\" value=\"Login\">";
            
            if(isset($_SERVER["HTTP_REFERER"]) && $_SERVER["HTTP_REFERER"]=="http://localhost/ejercicio-login/index.php"){
                echo "<p>Autentificación no realizada con exito</p>";
            }elseif(isset($_SERVER["HTTP_REFERER"]) && $_SERVER["HTTP_REFERER"]=="http://localhost/ejercicio-login/intranet.php"){
                echo "<p>Se cerró la sesión correctamente</p>";
            };
    }

    ?>
</form>
</body>
</html>