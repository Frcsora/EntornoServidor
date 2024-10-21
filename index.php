<?php
//Ejercicio1
    function contarCadena($var1, $var2){
        $count = 0;
        for($i = 0 ; $i < strlen($var1); $i++){
            $substring = "";
            for($j = 0; $j < strlen($var2); $j++){
                $substring .= substr($var2, $j, 1);
            }
            if(substr($var1, $i, strlen($var2)) == $substring){
                $count++;
            }
        }
        return $count;
    }
    //Ejercicio2
    function contarNumeros($arrayEntrada, $int1 = 0){
        $arraySalida =[0, 0, 0];
        for($i = 0 ; $i < count($arrayEntrada) ; $i++){
            if($arrayEntrada[$i] == $int1){
                $arraySalida[0]++;
            }elseif($arrayEntrada[$i] > $int1){
                $arraySalida[1]++;
            }else{
                $arraySalida[2]++;
            }
        }
        echo "<p>$arraySalida[0] numeros de la entrada son iguales a $int1</p>";
        echo "<p>$arraySalida[1] numeros de la entrada son mayores a $int1</p>";
        echo "<p>$arraySalida[2] numeros de la entrada son menores a $int1</p>";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>title</title>
</head>
<body>
    <?php
        //echo "<p>" . contarCadena("lalallalalalalalaa", "la") . "</p>" //Ejercicio 1
        //contarNumeros([0,4,3,2,4,0,-1,5,5], 4)//Ejercicio2
    ?>
</body>
</html>