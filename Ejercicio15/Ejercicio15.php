<?php
/*
 * Activitat 15) Crea un programa que calculi l'àrea de diferents formes geomètriques.


Passos:
Crea una classe abstracta:
Defineix una classe abstracta anomenada Forma. No afegeixis atributs.
Afegeix un mètode abstracte calcularArea().
Implementa subclasses:
Crea subclasses com Cercle, Rectangle i Triangle.
Cada subclasse ha d'implementar el mètode calcularArea().
Fes un script tal que:
Instancia objectes de Cercle, Rectangle i Triangle.
Passa els paràmetres corresponents al mètode calcularArea() (el radi per al Cercle, l'amplada i l'altura per al Rectangle, base i altura pero al triangle).
Mostra les àrees calculades.
Lliurar tot a un únic .php

 * */
abstract class Forma{
    function __construct(){}

    abstract function calcularArea();
}
class Cercle extends Forma{
    private $radio;
    function __construct($radio){
        parent::__construct();
        $this->radio = $radio;
    }
    public function getRadio(){
        return $this->radio;
    }
    function calcularArea(){
        return pi() * ($this->radio ** 2);
    }
}
class Rectangle extends Forma{
    private $base;
    private $altura;
    function __construct($base, $altura){
        parent::__construct();
        $this->base = $base;
        $this->altura = $altura;
    }
    public function getBase(){
        return $this->base;
    }
    public function getAltura(){
        return $this->altura;
    }
    function calcularArea(){
        return $this->base * $this->altura;
    }
}
class Triangle extends Forma{
    private $base;
    private $altura;
    function __construct($base, $altura){
        parent::__construct();
        $this->base = $base;
        $this->altura = $altura;
    }
    public function getBase(){
        return $this->base;
    }
    public function getAltura(){
        return $this->altura;
    }
    function calcularArea(){
        return ($this->base * $this->altura) / 2;
    }
}
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
    echo "L'area d'un cercle amb radi " . $cercle->getRadio() . " es de: " . $cercle->calcularArea();
    ?></h1>
<h1><?php
    echo "L'area d'un rectangle amb base " . $rectangle->getBase() . " i alçada " . $rectangle->getAltura() ." es de: " . $rectangle->calcularArea();
    ?></h1>
<h1><?php
    echo "L'area d'un triangle amb base " . $triangle->getBase() . " i alçada " . $triangle->getAltura() ." es de: " . $triangle->calcularArea();
    ?></h1>
</body>
</html>