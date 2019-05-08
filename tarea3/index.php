<?php

// Incluimos el archivo php que contiene la clase que se requiere
include "promedio.php";

$alumnos;
$sumProm = 0;
for($i=0; $i<10; $i++){
    $a = new alumnotaw();
    $a->nombre = "Alumno ".($i+1);
    $a->setUnidad1(rand(50, 100));
    $a->setUnidad2(rand(50, 100));
    $a->setUnidad3(rand(50, 100));
    $alumnos[$i] = $a;
}

for($i=0; $i<10; $i++){
    echo "Alumno: ".$alumnos[$i]->nombre."<br>";
    echo "  Unidad 1: ".$alumnos[$i]->unidad1."<br>";
    echo "  Unidad 2: ".$alumnos[$i]->unidad2."<br>";
    echo "  Unidad 3: ".$alumnos[$i]->unidad3."<br>";
    echo "  Promedio: ".$alumnos[$i]->promedio()."<br>";
    echo "<br>";
    $sumProm += $alumnos[$i]->promedio();
}

echo "<br><br>";
echo "Promedio de todos los alumnos: ".($sumProm/10);