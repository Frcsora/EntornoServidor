<?php
require_once "Forma.php";
class Triangle implements Forma{
    private $base;
    private $altura;
    function __construct($base, $altura){
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
    function calcularPerimetro()
    {
        return $this->base * 3;
    }
}