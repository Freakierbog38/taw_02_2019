<?php

class Conexion{
	public function conectar(){
    $link = new PDO("mysql:host=localhost;dbname=examen","root","taw123");
    return $link;
	}
}

?>