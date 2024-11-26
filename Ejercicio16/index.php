<?php
/*
 * Activitat 16) Converteix la classe abstracta Forma de
 * l'exercici anterior (activitat 15) una interface i implementa
 * per a aconseguir les àrees. Afegeix un nou mètode a l’interface
 * calcularPerimetre(). Lliurar en diferents fitxers: forma.php,
 * cercle.php, rectangle.php, triangle.php i index.php.
 * */
require_once "Cercle.php";
require_once "Rectangle.php";
require_once "Triangle.php";
$cercle = new Cercle(5);
$rectangle = new Rectangle(5, 5);
$triangle = new Triangle(5, 5);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1><?php
    echo "L'area d'un cercle amb radi " . $cercle->getRadio() . " es de: " . $cercle->calcularArea() . " i el seu perimetre de: " . $cercle->calcularPerimetro();
    ?></h1>
<h1><?php
    echo "L'area d'un rectangle amb base " . $rectangle->getBase() . " i alçada " . $rectangle->getAltura() ." es de: " . $rectangle->calcularArea() . " i el seu perimetre de: " . $rectangle->calcularPerimetro();
    ?></h1>
<h1><?php
    echo "L'area d'un triangle amb base " . $triangle->getBase() . " i alçada " . $triangle->getAltura() ." es de: " . $triangle->calcularArea() . " i el seu perimetre de: " . $triangle->calcularPerimetro();
    ?></h1>
</body>
</html>