<?php
session_start();

$count = isset($_SESSION['count']) ? $_SESSION['count'] : 0;
$count++;
$_SESSION['count'] = $count;
setcookie("count", $count, time() + 3600);
if(isset($_POST["reset"])){
    session_unset();
    session_destroy();
    header("location: ejercicio11.php");
    exit;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $_SESSION["color"] = $_POST["color"];
    $_SESSION["bcolor"] = $_POST["bcolor"];
}
if($count <= 1){
    $color = isset($_SESSION['color']) ? $_SESSION['color'] : "black";
    $bcolor = isset($_SESSION['bcolor']) ? $_SESSION['bcolor'] : "white";
}else{
    $color = isset($_SESSION['color']) ? $_SESSION['color'] : "blue";
    $bcolor = isset($_SESSION['bcolor']) ? $_SESSION['bcolor'] : "yellow";
}

$inactividad = 50;
if(isset($_SESSION["timeout"])){
    $sessionTTL= time() - $_SESSION["timeout"];
    if($sessionTTL > $inactividad){
        setcookie($color, $_COOKIE[$color], time() - 3600);
        setcookie($bcolor, $_COOKIE[$bcolor], time() - 3600);
        session_unset();
        header("location: ejercicio11.php");
        exit;
    }
}
$_SESSION["timeout"] = time();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>title</title>
    <style>
        body{
            background-color:<?php echo "$bcolor" ?>;
            color: <?php echo "$color" ?>
        }
    </style>
</head>
<body>
<form action="ejercicio11.php" method="POST">
    <label for="color">Elige el color de la letra: </label>
    <select id="color" name="color">
        <option value="red" <?php if($color === "red") echo "selected";?>>Rojo</option>
        <option value="blue" <?php if($color === "blue") echo "selected";?>>Azul</option>
        <option value="green" <?php if($color === "green") echo "selected";?>>Verde</option>
        <option value="purple" <?php if($color === "purple") echo "selected";?>>Morado</option>
        <option value="yellow" <?php if($color=== "yellow") echo "selected";?>>Amarillo</option>
    </select><br><br>
    <label for="bcolor">Elige el color del fondo: </label>
    <select id="bcolor" name="bcolor">
        <option value="red" <?php if($bcolor === "red") echo "selected";?>>Rojo</option>
        <option value="blue" <?php if($bcolor === "blue") echo "selected";?>>Azul</option>
        <option value="green" <?php if($bcolor === "green") echo "selected";?>>Verde</option>
        <option value="purple" <?php if($bcolor === "purple") echo "selected";?>>Morado</option>
        <option value="yellow" <?php if($bcolor=== "yellow") echo "selected";?>>Amarillo</option>
    </select><br><br>
    <input type="submit" value="Enviar">
    <input type="submit" name="reset" value="reset">
</form>
</body>
</html>