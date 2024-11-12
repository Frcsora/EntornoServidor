<?php
abstract Class Vehiculo{
    protected $nRuedas;

    function __construct(){

    }

    abstract protected function mostrarDetalles();
}