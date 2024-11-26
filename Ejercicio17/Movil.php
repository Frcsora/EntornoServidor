<?php
require_once "Dispositiu.php";
require_once "Wifi.php";
require_once "Bluetooth.php";
class Movil extends Dispositiu
{
    use Wifi;
    use Bluetooth;
    private $numTelefon;
    function __construct($nombre, $numTelefon){
        parent::__construct($nombre);
        $this->numTelefon = $numTelefon;
    }
    function getNumTelefon(){
        return $this->numTelefon;
    }
    function ferTrucada($numTelefon){
        return "Trucant al $numTelefon";
    }
}