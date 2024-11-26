<?php
require_once "Movil.php";
require_once "Tauleta.php";
$movil = new Movil("FrancescMovil", 645755219);
$tauleta = new Tauleta("FrancescTauleta", "AAA");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1><?php echo "El movil " . $movil->getNombre() . " té el número: " . $movil->getNumTelefon(); ?></h1>
<h1><?php echo "El movil " . $movil->getNombre() . ": " . $movil->ferTrucada(6666666666); ?></h1>
<h1><?php echo $movil->conectarBluetooth($movil->getNombre()); ?></h1>
<h1><?php echo $movil->getBluetoothConnect($movil->getNombre()); ?></h1>
<h1><?php echo $movil->disconnectBluetooth($movil->getNombre()); ?></h1>
<h1><?php echo $movil->getBluetoothConnect($movil->getNombre()); ?></h1>
<h1><?php echo $movil->conectarWifi($movil->getNombre()); ?></h1>
<h1><?php echo $movil->getWifiConnect($movil->getNombre()); ?></h1>
<h1><?php echo $movil->desconectarWifi($movil->getNombre()); ?></h1>
<h1><?php echo $movil->getWifiConnect($movil->getNombre()); ?></h1>
<h1><?php echo "La tauleta " . $tauleta->getNombre() . " es del model: " . $tauleta->getModel(); ?></h1>
<h1><?php echo "La tauleta " . $tauleta->getNombre() . ": " . $tauleta->llegirLlibre("Canción de hielo y fuego"); ?></h1>
<h1><?php echo $tauleta->conectarBluetooth($tauleta->getNombre()); ?></h1>
<h1><?php echo $tauleta->getBluetoothConnect($tauleta->getNombre()); ?></h1>
<h1><?php echo $tauleta->disconnectBluetooth($tauleta->getNombre()); ?></h1>
<h1><?php echo $tauleta->getBluetoothConnect($tauleta->getNombre()); ?></h1>
<h1><?php echo $tauleta->conectarWifi($tauleta->getNombre()); ?></h1>
<h1><?php echo $tauleta->getWifiConnect($tauleta->getNombre()); ?></h1>
<h1><?php echo $tauleta->desconectarWifi($tauleta->getNombre()); ?></h1>
<h1><?php echo $tauleta->getWifiConnect($tauleta->getNombre()); ?></h1>
</body>
</html>
