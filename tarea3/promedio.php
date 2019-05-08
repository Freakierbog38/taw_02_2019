<?php

// Creando la clase AlumnoTAW
class alumnotaw{
    // Atributos de la clase
    public $nombre;
    public $unidad1;
    public $unidad2;
    public $unidad3;

    // Métodos de asignación de valores
    // Setter
    public function setUnidad1($valor){
        if($valor < 0){
            $this->unidad1 = 0;
        }
        elseif($valor > 100){
            $this->unidad1 = 100;
        }
        else{
            $this->unidad1 = $valor;
        }
    }
    public function setUnidad2($valor){
        if($valor < 0){
            $this->unidad2 = 0;
        }
        elseif($valor > 100){
            $this->unidad2 = 100;
        }
        else{
            $this->unidad2 = $valor;
        }
    }
    public function setUnidad3($valor){
        if($valor < 0){
            $this->unidad3 = 0;
        }
        elseif($valor > 100){
            $this->unidad3 = 100;
        }
        else{
            $this->unidad3 = $valor;
        }
    }

    // Funcion que regresa el promedio, basasdo en las 3 unidades
    public function promedio(){
        if($this->unidad1 <= 60 || $this->unidad2 <= 60 || $this->unidad3 <= 60){
            return 60;
        }
        else{
            $sum = $this->unidad1 + $this->unidad2 + $this->unidad3;
            return $sum / 3;
        }
    }
}