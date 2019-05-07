<?php
    // Incluir la clase
    include "persona.php";

    // Instanciar la clase
    $persona = new persona();

    // Asignar valores a las propiedades del objeto
    $persona->setEdad(30);
    $persona->setAltura(1.80);
    $persona->setPeso(80);

    // Imprimir resultados 
    echo "<br>Edad: ".$persona->getEdad();
    echo "<br>Altura: ".$persona->getAltura();
    echo "<br>Peso: ".$persona->getPeso();
    echo "<br>IMC: ".$persona->imc();