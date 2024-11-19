<?php
require "User.php";
session_start();
//Si hay un usuario logeado, le saludamos
if(isset($_SESSION["loggedin"])){
    echo "Hola, " . $_SESSION["loggedin"] -> saludar();
}else{
    echo "0";
}
?>
<!DOCTYPE html>
<html lang="ES-es">
<head>
    <meta charset="UTF-8" />
    <title>title</title>
</head>
<body>
    <form action="signInForm.php" method="post">
        <button type="submit">sign in</button>
    </form>
    <form action="loginForm.php" method="post">
        <button type="submit">log in</button>
    </form>
    <form action="logout.php" method="post">
        <button type="submit">log out</button>
    </form>
</body>
</html>