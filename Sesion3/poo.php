<?php 
    #Clase:
    // Una clase es un modelo que se utiliza para crear objetos que comparten un mismo comportamiento, estado o identidad
    class Automovil{
        //Propiedades: Son las características que puede tener un objeto.
        public $marca;
        public $modelo;
        
        //Métodos: Es el algoritmo asociado a un objeto que indica la capacidad de lo que éste puede hacer. La úncia diferencia entre el método y función es que llamamos al método a las funciones de una  clase (en POO) miéntras que llamamos funciones a los algortimos de la programación estructurada.
        public function mostrar(){
            echo "<p> Hola soy un $this->marca, modelo $this->modelo";
        }
    }

    //Objeto: Es una entidad provista de métodos o mensajes a los cuales responde propiedades con valores concretos.
    $a = new Automovil();
    $a->marca = "Chevrolet";
    $a->modelo = "Chevy";
    $a->mostrar();

    $b = new Automovil();
    $b->marca = "Ford";
    $b->modelo = "Lobo";
    $b->mostrar();

    $c = new Automovil();
    $c->marca = "Honda";
    $c->modelo = "CRV";
    $c->mostrar();

    //Principios de la POO que se cumplen en el ejemplo presentado

    //1. Abstacción: Nuevos tipos de datos (el que quieras lo creas).
    //2. Encapsulación: Organiza el código en grupos lógicos.
    //3. Ocultamiento: Oculta detalles de implementación y expone solamente los detalles necesarios para el resto del sistema.