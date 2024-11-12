<?php

use libroficcion\Libro as libroficcion;
use autorficcion\Autor as autorficcion;
use librociencia\Libro as librociencia;
use autorciencia\Autor as autorciencia;
$libroFiccion = new libroficcion("El señor de los anillos", "Tolkien");
$autorFiccion = new autorficcion("Tolkien", "UK");
$libroCiencia = new librociencia("La especie elegida", "JL Arsuaga");
$autorCiencia = new autorciencia("Juan Luis Arsuaga", "España");

echo "Ciencia: <br>";
echo $libroCiencia->mostrarDetalles() . "<br>";
echo $autorCiencia->mostrarDetalles() . "<br>";
echo "Ficcion: <br>";
echo $libroFiccion->mostrarDetalles() . "<br>";
echo $autorFiccion->mostrarDetalles() . "<br>";
