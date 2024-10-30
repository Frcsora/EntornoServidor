<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>title</title>
</head>
<body>
    <?php
    session_start();
    $numero = 0;
    $cuenta = isset($_SESSION["cuenta"]) ? $_SESSION["cuenta"] : 0;
    $suma = isset($_SESSION["sumatorio"]) ? $_SESSION["sumatorio"] : 0;
    if(isset($_POST["numero"])){
        $numero = $_POST["numero"];
        $suma += $numero;
        $_SESSION["sumatorio"] = $suma;
        $cuenta++;
        $_SESSION["cuenta"] = $cuenta;
        $media = (float)$suma / (float)$cuenta;
    }

    if(!isset($_SESSION["sumatorio"]) || !isset($_POST["suma"]) || $_SESSION["sumatorio"] < 100000){
        echo
        "<form action=\"ejercicio10.php\" method=\"post\">
            <label for=\"numero\">Introduce un numero:</label>
            <input id=\"numero\" type=\"number\" name=\"numero\"><br><br>
            <input type=\"submit\" value=\"Enviar\"><br><br>
            <input type=\"number\" value=\"$suma\" name=\"suma\" readonly><br><br>
        </form>";
    }else{
        echo "
        Total: $suma <br>
        Total numeros: $cuenta <br>
        Media: $media";
        if(isset($_COOKIE["sumatorio"])){
            setcookie("sumatorio", $_POST["suma"], time() - (86400), "/");
            unset($_COOKIE["sumatorio"]);
        }
        if(isset ($_COOKIE["cuenta"])){
            setcookie("cuenta", $_POST["cuenta"], time() - (86400), "/");
            unset($_COOKIE["cuenta"]);
        }
        session_unset();
        session_destroy();
    }
    ?>
</body>
</html>