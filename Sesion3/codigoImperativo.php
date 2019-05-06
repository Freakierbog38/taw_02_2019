<?php
    // Código imperativo  Espaguetti
    $automovil1 = (object)["marca"=>"Chevrolet", "modelo"=>"Chevy"];
    $automovil2 = (object)["marca"=>"Ford", "modelo"=>"Lobo"];
    $automovil3 = (object)["marca"=>"Honda", "modelo"=>"CRV"];

    // Función con parametros para imprimir determinado automovil
    function mostrar($auto){
        echo "<p> Hola soy un $auto->marca, modelo $auto->modelo";
    }

    mostrar($automovil1);
    mostrar($automovil2);
    mostrar($automovil3);