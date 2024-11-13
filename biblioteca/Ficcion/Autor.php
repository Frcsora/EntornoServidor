<?php

namespace autorficcion;

class Autor
{
    private $nombre;
    private $nacionalidad;
    public function __construct($nombre, $nacionalidad){
        $this->nombre = $nombre;
        $this->nacionalidad = $nacionalidad;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getNacionalidad(){
        return $this->nacionalidad;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setNacionalidad($nacionalidad){
        $this->nacionalidad = $nacionalidad;
    }
    public function mostrarDetalles(){
        echo "Nombre: "  . $this->getNombre() .
            "<br>Nacionalidad: ". $this->getNacionalidad();
    }
}