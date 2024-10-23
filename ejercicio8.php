<?php
//Ejercicios8
    function calculadora($n1, $operator, $n2){
        switch($operator){
            case "+": 
                return $n1 + $n2;
            case "-":
                return $n1 - $n2;
            case "*":
                return $n1 * $n2;
            case "/":
                return $n2 <= 0 ? "No puedo llevar a cabo esa operacion" : $n1 / $n2;
        }   
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>title</title>
</head>
<body>
    <form action="index.php" method="POST">
        <label for="fNumber">First Number: </label>
        <input name="fNumber" type="number"><br><br>
        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select><br><br>
        <label for="sNumber">Second Number: </label>
        <input name="sNumber" type="number"><br><br>
        <input type="submit"><br><br>
        <input name="result" value="<?php
            $resultado = file_get_contents("numeroGuardado.txt");
            if(isset($_POST["fNumber"])){
                echo "hola";
            }
            if(isset($_POST["fNumber"]) && isset($_POST["sNumber"])){

                $fNumber = $_POST['fNumber'];
                $sNumber = $_POST["sNumber"];
                $operator = $_POST["operator"];
                $result = calculadora($fNumber, $operator, $sNumber);
                echo $result;
                file_put_contents("numeroGuardado.txt", $result);;

            }/*elseif(!isset($_POST["fNumber"]) && !isset($_POST["sNumber"])){
                
                file_put_contents("numeroGuardado.txt", "");
            
            }*/elseif(!isset($_POST["fNumber"]) && isset($_POST["sNumber"])){
                
                $fNumber = $resultado;
                $sNumber = $_POST["sNumber"];
                $operator = $_POST["operator"];
                $result = calculadora($fNumber, $operator, $sNumber);
                echo $result;
                file_put_contents("numeroGuardado.txt", $result);

            }
        ?>">
    </form>
    <?php
    
    ?>
</body>
</html>