<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="login.php" method="post">
    <label for="usuario">User:</label>
    <input type="text" name="usuario" id="usuario"><br><br>
    <label for="pass">Password:</label>
    <input type="password" name="pass" id="pass"><br><br>
    <input type="submit" value="Login">
    <?php
    if(isset($_SERVER["HTTP_REFERER"]) && $_SERVER["HTTP_REFERER"]=="http://localhost/ejercicio-login/index.php"){
        echo "<p>Autentificación no realizada con exito</p>";
    }elseif(isset($_SERVER["HTTP_REFERER"]) && $_SERVER["HTTP_REFERER"]=="http://localhost/ejercicio-login/intranet.php"){
        echo "<p>Se cerró la sesión correctamente</p>";
    }
    ?>
</form>
</body>
</html>