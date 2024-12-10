<?php
//Resultado del buscador del index.php
    require_once "connection.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(conectarBBDD()){
            echo "Se conectó correctamente<br><br>";
            $buscado = getIfUserExists(conectarBBDD(), strtolower(trim($_POST["buscador"]))) ? strtolower(trim($_POST["buscador"])):null;
            if(isset($buscado)){
                $id = getUserByName(conectarBBDD(),$buscado);
                echo "El usuario " . $buscado . " existe y se llama " . getFullName(conectarBBDD(), $id) . "<br><br>";
            }else{
                echo "El usuario " . $buscado . " no existe<br><br>";
            }
        }
        echo "<form method='POST' action='logout.php'>
                <input type='submit' value='Volver'>
              </form>";

    }else{
        header("location:logout.php");
    }

?>
