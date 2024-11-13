<?php
include "Ciencia/Libro.php";
include "Ciencia/Autor.php";
include "Ficcion/Libro.php";
include "Ficcion/Autor.php";
/*
 * He decidido usar include porque en caso de fallar a la hora de mostrarnos alguna de las informaciones que queremos
 * no significa que no pueda mostrarnos las demas.
*/
use libroficcion\Libro as libroficcion;
use autorficcion\Autor as autorficcion;
use librociencia\Libro as librociencia;
use autorciencia\Autor as autorciencia;
$libroFiccion = new libroficcion("El señor de los anillos", "1954");
$autorFiccion = new autorficcion("Tolkien", "UK");
$libroCiencia = new librociencia("La especie elegida", "1998");
$autorCiencia = new autorciencia("Juan Luis Arsuaga", "España");

echo "Ciencia: <br>";
echo $libroCiencia->mostrarDetalles() . "<br>";
echo $autorCiencia->mostrarDetalles() . "<br><br>";
echo "Ficcion: <br>";
echo $libroFiccion->mostrarDetalles() . "<br>";
echo $autorFiccion->mostrarDetalles() . "<br>";
