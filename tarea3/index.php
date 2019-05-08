<?php

// Incluimos el archivo php que contiene la clase que se requiere
include "promedio.php";

// La variable será el arreglo que guarde alumnos
$alumnos;
// La sumatoria de los promedios
$sumProm = 0;

// Ciclo que crea 10 alumnos
for($i=0; $i<10; $i++){
    $a = new alumnotaw();
    // El nombre se crea con la nomenclatura Alumno + numero
    $a->nombre = "Alumno ".($i+1);
    // Las calificaciones se crean un un número random entre el 50 y el 100
    $a->setUnidad1(rand(50, 100));
    $a->setUnidad2(rand(50, 100));
    $a->setUnidad3(rand(50, 100));
    // Se agrega el alumno al array
    $alumnos[$i] = $a;
}

// Se ordena de mayor a menor con el método burbuja
for($i=0; $i<10; $i++){
    for($j=0; $j<10; $j++){
        if($alumnos[$i]->promedio()>$alumnos[$j]->promedio()){
            $a = $alumnos[$j];
            $alumnos[$j] = $alumnos[$i];
            $alumnos[$i] = $a;
        }
    }
}

// Se visualiza los alumnos y sus características
for($i=0; $i<10; $i++){
    echo "Alumno: ".$alumnos[$i]->nombre."<br>";
    echo "  Unidad 1: ".$alumnos[$i]->unidad1."<br>";
    echo "  Unidad 2: ".$alumnos[$i]->unidad2."<br>";
    echo "  Unidad 3: ".$alumnos[$i]->unidad3."<br>";
    echo "  Promedio: ".$alumnos[$i]->promedio()."<br>";
    echo "<br>";
    // Se suman todos los promedios
    $sumProm += $alumnos[$i]->promedio();
}

// Y se realiza la operación para el promedio de los 10 alumnos
echo "<br><br>";
echo "Promedio de todos los alumnos: ".($sumProm/10);