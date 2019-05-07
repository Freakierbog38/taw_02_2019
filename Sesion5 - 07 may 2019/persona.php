<?php
    // Definir la clase persona
    class persona{
        // Definir propiedades
        public $edad;
        public $altura;
        public $peso;

        // Definir método obtención de datos
        // Getters
        public function getEdad(){
            return $this->edad;
        }
        public function getPeso(){
            return $this->peso;
        }
        public function getAltura(){
            return $this->altura;
        }

        // Definir métodos asignación de datos
        // Setters
        public function setEdad($valor){
            $this->edad = $valor;
        }
        public function setPeso($valor){
            $this->peso = $valor;
        }
        public function setAltura($valor){
            $this->altura = $valor;
        }

        // Método de cálculo de IMC mediante los métodos get
        public function imc2(){
            return $this->getPeso() / ($this->getAltura() * $this->getAltura());
        }

        // Método de cálculo de IMC accediendo a las propiedades
        public function imc(){
            return $this->peso / ($this->altura * $this->altura);
        }
    }