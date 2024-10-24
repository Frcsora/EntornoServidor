<?php
//Ejercicios8
//echo $_SERVER["REQUEST_METHOD"];//Esto era para ver con que metodo se utiliza cuando se abre el link
//Este ejercicio te creara en la ruta "./" un documento de texto llamado "numeroGuardado.txt"
//que guardará el resultado de la operación por si quieres seguir operando con el mismo.
    class NoFindOperationException extends Exception {}
    class ZeroDivisionException extends Exception {}
    function calc($n1, $operator, $n2){
        switch($operator){
            case "+": 
                return $n1 + $n2;
            case "-":
                return $n1 - $n2;
            case "*":
                return $n1 * $n2;
            case "/":
                try{
                    if($n2 == 0){
                        throw new ZeroDivisionException("Can't divide by zero");
                    }
                    return $n1 / $n2;
                }catch(ZeroDivisionException $e){
                    resetResult();
                    return $e->getMessage();
                }
            default: return null;
        }   
    }
    function resetResult(){
        file_put_contents("numeroGuardado.txt", "");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>title</title>
</head>
<body>
    <form action="index.php" method="POST">
        <label for="fNumber">First Number: </label>
        <input id="fNumber" name="fNumber" type="number" placeholder="First Number"><br><br>
        <label for="operator">Operator: </label>
        <select id="operator" name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select><br><br>
        <label for="sNumber">Second Number: </label>
        <input id="sNumber" name="sNumber" type="number" placeholder="Second Number"><br><br>
        <input type="submit" value="Submit">
        <input type="submit" name="reset" value="C" id="reset"><br><br><!---->
        <label for="result">Result: </label>
        <input id="result" name="result" value="<?php
            //https://www.php.net/reserved.variables.server
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST["reset"])){
                    resetResult();
                }else{
                    $fNumber = "";
                    $sNumber = "";
                    if(isset($_POST["fNumber"])){
                        $fNumber = $_POST["fNumber"];
                    }else{
                        if($_POST["fNumber"] == 0){
                            $fNumber = "0";
                        }else{
                            $fNumber = null;
                        }
                    }
                    if(isset($_POST["sNumber"])){
                        $sNumber = $_POST["sNumber"];
                    }else{
                        if($_POST["sNumber"] == 0){
                            $sNumber = "0";
                        }else{
                            $sNumber = null;
                        }
                    }

                    $operator = isset($_POST["operator"]) ? $_POST["operator"] : null;
                    $resultFile = file_get_contents("numeroGuardado.txt");
                    $result = "";
                    try{
                        if((!empty($fNumber) || strlen($fNumber) > 0)&& (!empty($sNumber) || strlen($sNumber) > 0)){
                            $result = calc($fNumber, $operator, $sNumber);
                        }elseif(strlen($resultFile) > 0 && empty($fNumber) && (!empty($sNumber) || strlen($sNumber) > 0)){
                            $result = calc($resultFile, $operator, $sNumber);
                        }else{
                            throw new NoFindOperationException("Operation not supported");
                        }
                    }catch(NoFindOperationException $e){
                        $result = $e->getMessage();
                        resetResult();
                    }finally{
                        echo $result;
                        if(is_numeric($result)){
                            file_put_contents("numeroGuardado.txt", $result);
                        }
                    }
                }
            }else{
                //Al refrescar la pagina se utiliza el metodo GET, por tanto se reiniciaria el resultado
                resetResult();
            }
        ?>" readonly>
    </form>
</body>
</html>