<?php
    //Funcion sin parámetros
    function saludo(){
        echo "Hola<br>";
    }
    saludo();

    //Funciones con parámetros
    function despedida($adios){
        echo $adios."<br>";
    }
    despedida("Adios salida");

    //Función con retorno
    function retorno($retornar){
        return $retornar;
    }
    echo retorno("Eso es un retorno<br>");
?>