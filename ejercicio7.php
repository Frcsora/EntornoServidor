<?php
//ejercicio7
    function calcularPrecio($kw){
        $precioFinal = 0;
        $precios = [100 => 1.00, 200 => 2.00,300 => 3.00, 400 => 4.00];
        if($kw <= 0 || !is_numeric($kw)){
            return 0;
        }
        if($kw <= 100){
            $precioFinal += $kw * $precios[100];
        }elseif($kw <= 200){
            $precioFinal += 100 * $precios[100];
            $kw -= 100;
            $precioFinal += $kw * $precios[200];
        }elseif($kw <= 300){
            $precioFinal += 100 * $precios[100];
            $kw -= 100;
            $precioFinal += 100 * $precios[200];
            $kw -= 100;
            $precioFinal += $kw * $precios[300];
        }else{
            while($kw > 300){
                $precioFinal += $precios[400];
                $kw--;
            }
            while($kw > 200){
                $precioFinal += $precios[300];
                $kw--;
            }
            while($kw > 100){
                $precioFinal += $precios[200];
                $kw--;
            }
            while($kw > 0){
                $precioFinal += $precios[100];
                $kw--;
            }
        }
        return $precioFinal;

    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>title</title>
</head>
<body>
    <form action="index2.php" method="POST">
        <input name="luz" type="number" placeholder="nº of KW">
        <input type="submit"><br><br>
        <input value="
        <?php
            if(isset($_POST["luz"])){
                $kw = $_POST["luz"];
                echo calcularPrecio($kw);
            }
        ?>">
    </form>
</body>
</html>