<?php
    //Variable numérica
    $numero = 5;
    echo "Esto es un numero: $numero<br>";
    var_dump($numero);
    echo "<br><br>";

    //Palabra
    $palabra = "ITI";
    echo "Esto es una palabra: $palabra <br>";
    var_dump($palabra);
    echo "<br><br>";

    //Boolean
    $boleana = True;
    echo "Esto es una variable booleana: $boleana <br>";
    var_dump($boleana);
    echo "<br><br>";

    //Arreglos unidimiensionales
    $array = array("rojo", "amarillo");
    echo "Esto es una variable de array: $array <br>";
    var_dump($array);
    echo "<br><br>";

    //Variable arreglo con propiedades
    $arrayVerduras = array("verdura1" => "lechuga", "verdura2"=>"cebolla");
    echo "Esto es un array con propiedades: $arrayVerduras <br>";
    var_dump($array);
    echo "<br><br>";

    //Variables tipo objeto
    $frutas = (object)["fruta1"=>"pera", "fruta2"=>"manzana"];
    echo "Esto es una variable de tipo objeto: $frutas <br>";
    var_dump($frutas);
    echo "<br><br>";
?>