<?php

namespace librociencia;

class Libro
{
    private $titulo;
    private $anio;

    public function __construct($titulo, $anio){
        $this->titulo = $titulo;
        $this->anio = $anio;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function getAno(){
        return $this->anio;
    }
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    public function setAnio($anio){
        $this->anio = $anio;
    }
    public function mostrarDetalles(){
        echo `Titulo: ${this->titulo}
             Año: ${this->anio}`;
    }
}