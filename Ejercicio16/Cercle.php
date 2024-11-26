<?php
require_once "Forma.php";
class Cercle implements Forma{
    private $radio;
    function __construct($radio){
        $this->radio = $radio;
    }
    public function getRadio(){
        return $this->radio;
    }
    function calcularArea(){
        return pi() * ($this->radio ** 2);
    }
    function calcularPerimetro()
    {
        return 2 * pi() * $this->radio;
    }
}