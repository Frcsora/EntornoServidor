<?php
require "vehiculo.php";
class Coche extends Vehiculo {
    private $marca;
    private $modelo;
    private $color;
    private $vMaxima;
    function __construct($marca, $modelo, $color, $vMaxima) {

        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
        $this->vMaxima = $vMaxima;
        $this->nRuedas = 4;
    }
    public function getMarca() {
        return $this->marca;
    }
    public function getModelo() {
        return $this->modelo;
    }
    public function getColor() {
        return $this->color;
    }
    public function getVMaxima() {
        return $this->vMaxima;
    }
    public function getRuedas(){
        return $this->nRuedas;
    }
    public function setMarca($marca) {
        $this->marca = $marca;
    }
    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }
    public function setColor($color) {
        $this->color = $color;
    }
    public function setVMaxima($vMaxima) {
        $this->vMaxima = $vMaxima;
    }
    public function setRuedas($nRuedas){
        $this->nRuedas = $nRuedas;
    }
    public function mostrarDetalles()
    {
        echo "Este coche es un " . $this->getMarca() . " " . $this->getModelo() . " de color " . $this->getColor() . ", con " . $this->getRuedas() . " ruedas y velocidad máxima " . $this->getVMaxima() . ".";
    }
}