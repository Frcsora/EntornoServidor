<?php
require_once "Dispositiu.php";
require_once "Wifi.php";
require_once "Bluetooth.php";
class Tauleta extends Dispositiu
{
    use Wifi;
    use Bluetooth;
    private $model;
    public function __construct($nombre, $model){
        parent::__construct($nombre);
        $this->model = $model;
    }
    function getModel(){
        return $this->model;
    }
    function llegirLlibre($llibre){
        return "Llegint el llibre: $llibre";
    }
}